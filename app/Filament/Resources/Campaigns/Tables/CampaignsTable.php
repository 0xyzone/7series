<?php

namespace App\Filament\Resources\Campaigns\Tables;

use App\Mail\NewsletterMailable;
use App\Models\Subscriber;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Mail;

class CampaignsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->contentGrid([
                'sm' => 1,
                'md' => 2,
                'xl' => 3,
            ])
            ->columns([
                Stack::make([
                    Split::make([
                        TextColumn::make('subject')
                            ->searchable()
                            ->weight('bold')
                            ->size('base')
                            ->icon('heroicon-o-megaphone')
                            ->wrap(),
                    ]),

                    Split::make([
                        TextColumn::make('sent_at')
                            ->label('Status')
                            ->formatStateUsing(fn ($state) => $state ? 'Sent on ' . $state->format('M d, Y · h:i A') : 'Draft / Unsent')
                            ->badge()
                            ->color(fn ($record) => $record->sent_at ? 'success' : 'warning'),
                        TextColumn::make('created_at')
                            ->dateTime('M d, Y')
                            ->color('gray')
                            ->size('xs'),
                    ]),
                ])->space(3),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('send')
                    ->label('Send to All')
                    ->icon('heroicon-o-paper-airplane')
                    ->color('success')
                    ->requiresConfirmation()
                    ->hidden(fn ($record) => $record->sent_at !== null)
                    ->action(function ($record) {
                        $subscribers = Subscriber::all();

                        if ($subscribers->isEmpty()) {
                            Notification::make()
                                ->title('No subscribers found')
                                ->danger()
                                ->send();
                            return;
                        }

                        foreach ($subscribers as $subscriber) {
                            Mail::to($subscriber->email)->queue(new NewsletterMailable($record, $subscriber));
                        }

                        $record->update(['sent_at' => now()]);

                        Notification::make()
                            ->title('Newsletter queued and dispatched!')
                            ->success()
                            ->send();
                    }),
                ViewAction::make()->slideOver(),
                EditAction::make()->slideOver(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
