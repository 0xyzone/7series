<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Width;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class MukhiyaPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('mukhiya')
            ->path('mukhiya')
            ->login()
            ->passwordReset()
            ->maxContentWidth(Width::Full)
            ->sidebarCollapsibleOnDesktop()
            ->collapsibleNavigationGroups()
            ->spa(true, hasPrefetching: true)
            ->spaUrlExceptions([
                url('/'),
            ])
            ->colors([
                'primary' => [
                    50 => '#fef2f2',
                    100 => '#fee2e2',
                    200 => '#fecaca',
                    300 => '#fca5a5',
                    400 => '#f87171',
                    500 => '#E51E2B',
                    600 => '#dc2626',
                    700 => '#b91c1c',
                    800 => '#991b1b',
                    900 => '#7f1d1d',
                    950 => '#450a0a',
                ],
                'gray' => Color::Stone,
            ])
            ->font('Plus Jakarta Sans', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=Space+Grotesk:wght@500;600;700&display=swap')
            ->brandLogo(fn () => asset('images/brand/logo-light.png'))
            ->darkModeBrandLogo(fn () => asset('images/brand/logo-dark.png'))
            ->brandLogoHeight('2.2rem')
            ->favicon(fn () => \App\Helpers\FaviconHelper::getFaviconPngUrl())
            ->renderHook(
                \Filament\View\PanelsRenderHook::HEAD_END,
                fn () => new \Illuminate\Support\HtmlString('
                    <link rel="stylesheet" href="' . asset('css/filament-theme.css') . '?v=' . filemtime(public_path('css/filament-theme.css')) . '">
                    <script src="' . asset('js/filament-card-3d.js') . '?v=' . filemtime(public_path('js/filament-card-3d.js')) . '" defer></script>' .
                    (app()->environment('local') ? '
                    <script src="' . asset('js/dev-reloader.js') . '?v=' . filemtime(public_path('js/dev-reloader.js')) . '" defer></script>' : '') . '
                    <script>
                    (function() {
                        var h = window.location.hostname;
                        var isLocal = ' . (\App\Helpers\FaviconHelper::isLocal() ? 'true' : 'false') . ' || h === "localhost" || h === "127.0.0.1" || h === "7series" || h.endsWith(".test") || h.endsWith(".local") || h.startsWith("192.168.");
                        var targetPng = isLocal ? "' . asset('favicon-white.png') . '" : "' . asset('favicon.png') . '";
                        var targetIco = isLocal ? "' . asset('favicon-white.ico') . '" : "' . asset('favicon.ico') . '";
                        var links = document.querySelectorAll("link[rel*=\'icon\']");
                        if (links.length === 0) {
                            var l = document.createElement("link");
                            l.rel = "icon";
                            l.href = targetPng;
                            document.head.appendChild(l);
                        } else {
                            links.forEach(function(l) {
                                if (l.getAttribute("type") === "image/x-icon" || l.href.indexOf(".ico") !== -1) {
                                    l.href = targetIco;
                                } else {
                                    l.href = targetPng;
                                }
                            });
                        }
                    })();
                </script>')
            )
            ->renderHook(
                \Filament\View\PanelsRenderHook::USER_MENU_BEFORE,
                fn () => view('filament.components.reverb-topbar')
            )
            ->renderHook(
                \Filament\View\PanelsRenderHook::BODY_END,
                fn () => view('filament.components.mobile-dock')
            )
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->navigationItems([
                \Filament\Navigation\NavigationItem::make('Homepage')
                    ->url(fn () => url('/'))
                    ->icon(\Filament\Support\Icons\Heroicon::OutlinedGlobeAlt)
                    ->sort(-10),
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                \App\Filament\Widgets\ThreeJsDaemonWidget::class,
                \App\Filament\Widgets\WholesaleStatsWidget::class,
                \App\Filament\Widgets\RecentInquiriesWidget::class,
            ])
            ->navigationGroups([
                \Filament\Navigation\NavigationGroup::make('B2B Operations'),
                \Filament\Navigation\NavigationGroup::make('Apparel & Catalog'),
                \Filament\Navigation\NavigationGroup::make('Marketing & Growth'),
                \Filament\Navigation\NavigationGroup::make('Access Control'),
            ])
            ->plugins([
                \BezhanSalleh\FilamentShield\FilamentShieldPlugin::make()
                    ->navigationGroup('Access Control')
                    ->navigationSort(2)
                    ->navigationIcon(\Filament\Support\Icons\Heroicon::OutlinedShieldCheck),
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
