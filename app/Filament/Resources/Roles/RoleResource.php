<?php

declare(strict_types=1);

namespace App\Filament\Resources\Roles;

use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use App\Filament\Resources\Roles\Pages\CreateRole;
use App\Filament\Resources\Roles\Pages\EditRole;
use App\Filament\Resources\Roles\Pages\ListRoles;
use App\Filament\Resources\Roles\Pages\ViewRole;
use BezhanSalleh\FilamentShield\Support\Utils;
use BezhanSalleh\FilamentShield\Traits\HasShieldFormComponents;
use BezhanSalleh\PluginEssentials\Concerns\Resource as Essentials;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Facades\Filament;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Panel;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Support\Icons\Heroicon;
use BackedEnum;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Unique;
use Override;

class RoleResource extends Resource
{
    use Essentials\BelongsToParent;
    use Essentials\BelongsToTenant;
    use Essentials\HasGlobalSearch;
    use Essentials\HasLabels;
    use Essentials\HasNavigation;
    use HasShieldFormComponents;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getNavigationGroup(): ?string
    {
        return 'Access Control';
    }

    public static function getNavigationIcon(): string | BackedEnum | null
    {
        return Heroicon::OutlinedShieldCheck;
    }

    public static function getNavigationSort(): ?int
    {
        return 2;
    }

    public static function getNavigationLabel(): string
    {
        return 'Roles & Permissions';
    }

    #[Override]
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make()
                    ->schema([
                        Section::make()
                            ->schema([
                                TextInput::make('name')
                                    ->label(__('filament-shield::filament-shield.field.name'))
                                    ->unique(
                                        ignoreRecord: true, /** @phpstan-ignore-next-line */
                                        modifyRuleUsing: fn (Unique $rule): Unique => Utils::isTenancyEnabled() ? $rule->where(Utils::getTenantModelForeignKey(), Filament::getTenant()?->id) : $rule
                                    )
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('guard_name')
                                    ->label(__('filament-shield::filament-shield.field.guard_name'))
                                    ->default(Utils::getFilamentAuthGuard())
                                    ->nullable()
                                    ->maxLength(255),

                                Select::make(config('permission.column_names.team_foreign_key'))
                                    ->label(__('filament-shield::filament-shield.field.team'))
                                    ->placeholder(__('filament-shield::filament-shield.field.team.placeholder'))
                                    /** @phpstan-ignore-next-line */
                                    ->default(Filament::getTenant()?->id)
                                    ->options(fn (): array => in_array(Utils::getTenantModel(), [null, '', '0'], true) ? [] : Utils::getTenantModel()::pluck('name', 'id')->toArray())
                                    ->visible(fn (): bool => static::shield()->isCentralApp() && Utils::isTenancyEnabled())
                                    ->dehydrated(fn (): bool => static::shield()->isCentralApp() && Utils::isTenancyEnabled()),
                                static::getSelectAllFormComponent(),

                            ])
                            ->columns([
                                'sm' => 2,
                                'lg' => 3,
                            ])
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
                static::getShieldFormComponents(),
            ]);
    }

    public static function getShieldFormComponents(): \Filament\Schemas\Components\Component
    {
        $resourceComponents = \Agroezinger\FilamentShieldEnhanced\Forms\EnhancedResourcePermissionsForm::make();
        $resourceCount      = array_sum(array_map('count', \Agroezinger\FilamentShieldEnhanced\Forms\EnhancedResourcePermissionsForm::getResourcePermissionFields()));

        $pageComponents = \Agroezinger\FilamentShieldEnhanced\Forms\EnhancedPagePermissionsForm::make();
        $pageCount      = array_sum(array_map('count', \Agroezinger\FilamentShieldEnhanced\Forms\EnhancedPagePermissionsForm::getPagePermissionFields()));

        $componentComponents = \Agroezinger\FilamentShieldEnhanced\Forms\EnhancedComponentPermissionsForm::make();
        $componentCount      = array_sum(array_map('count', \Agroezinger\FilamentShieldEnhanced\Forms\EnhancedComponentPermissionsForm::getComponentPermissionFields()));

        $tabs = [
            static::getTabFormComponentForWidget(),
            static::getTabFormComponentForCustomPermissions(),
        ];

        if (! empty($resourceComponents)) {
            $tabs[] = \Filament\Schemas\Components\Tabs\Tab::make('resources')
                ->label('Resources')
                ->badge($resourceCount ?: null)
                ->schema($resourceComponents);
        }

        if (! empty($pageComponents)) {
            $tabs[] = \Filament\Schemas\Components\Tabs\Tab::make('pages')
                ->label('Pages')
                ->badge($pageCount ?: null)
                ->schema($pageComponents);
        }

        if (! empty($componentComponents)) {
            $tabs[] = \Filament\Schemas\Components\Tabs\Tab::make('components')
                ->label('Components')
                ->badge($componentCount ?: null)
                ->schema($componentComponents);
        }

        return \Filament\Schemas\Components\Tabs::make('Permissions')
            ->contained()
            ->tabs($tabs)
            ->columnSpan('full');
    }

    #[Override]
    public static function table(Table $table): Table
    {
        return $table
            ->contentGrid([
                'sm' => 1,
                'md' => 2,
                'xl' => 3,
            ])
            ->columns([
                \Filament\Tables\Columns\Layout\Stack::make([
                    \Filament\Tables\Columns\Layout\Split::make([
                        TextColumn::make('name')
                            ->weight(FontWeight::Bold)
                            ->size('lg')
                            ->label(__('filament-shield::filament-shield.column.name'))
                            ->formatStateUsing(fn (string $state): string => Str::headline($state))
                            ->icon('heroicon-o-shield-check')
                            ->searchable(),
                        TextColumn::make('guard_name')
                            ->badge()
                            ->color('warning')
                            ->label(__('filament-shield::filament-shield.column.guard_name')),
                    ]),
                    \Filament\Tables\Columns\Layout\Split::make([
                        TextColumn::make('permissions_count')
                            ->badge()
                            ->label(__('filament-shield::filament-shield.column.permissions'))
                            ->counts('permissions')
                            ->color('primary')
                            ->suffix(' perms'),
                        TextColumn::make('updated_at')
                            ->label(__('filament-shield::filament-shield.column.updated_at'))
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
                EditAction::make()->slideOver(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
    }

    #[Override]
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRoles::route('/'),
            'create' => CreateRole::route('/create'),
            'view' => ViewRole::route('/{record}'),
            'edit' => EditRole::route('/{record}/edit'),
        ];
    }

    #[Override]
    public static function getModel(): string
    {
        return Utils::getRoleModel();
    }

    public static function getSlug(?Panel $panel = null): string
    {
        return Utils::getResourceSlug();
    }

    public static function getCluster(): ?string
    {
        return Utils::getResourceCluster();
    }

    public static function getEssentialsPlugin(): ?FilamentShieldPlugin
    {
        return FilamentShieldPlugin::get();
    }
}
