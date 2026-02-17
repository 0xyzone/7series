<?php

namespace App\Filament\Resources\Campaigns\Tables;

use App\Models\Subscriber;
use Filament\Tables\Table;
use Filament\Actions\Action;
use App\Mail\NewsletterMailable;
use Filament\Actions\EditAction;
use Illuminate\Support\Facades\Mail;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Notifications\Notification;

class CampaignsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('subject')
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('sent_at')
                    ->dateTime()
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                    ->hidden(fn($record) => $record->sent_at !== null)
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
                            Mail::to($subscriber->email)->queue(new NewsletterMailable($record));
                        }

                        $record->update(['sent_at' => now()]);

                        Notification::make()
                            ->title('Newsletter sent successfully!')
                            ->success()
                            ->send();
                    }),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
