<?php

namespace App\Providers\Filament;

use App\Filament\Resources\UserResource;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use App\Settings\KaryaSetting;
use App\Filament\Pages\Login;
use Illuminate\Support\Facades\Schema;
use Filament\Widgets;
use Filament\Forms\Components\FileUpload;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use App\Filament\Resources\AssessmentResource;
use App\Filament\Resources\RoleResource;
use App\Filament\Resources\WorkResource;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider {

    public function panel(Panel $panel): Panel {
        // Cek apakah tabel settings sudah ada sebelum memanggil KaryaSetting
        $settings = null;
        try {
            if (Schema::hasTable('settings')) {
                $settings = app(KaryaSetting::class);
            }
        } catch (\Exception $e) {
            $settings = null;
        }
    
        return $panel
            ->default()
            ->id('admin')
            ->path('admin') // Gunakan path yang jelas
            ->when($this->settings->login_enabled ?? true, 
                   fn($panel) => 
                   $panel->login(Login::class)
                  )
            ->when($this->settings->registration_enabled ?? true, 
                   fn($panel) => $panel->registration()
                  )
            ->when($this->settings->password_reset_enabled ?? true, 
                   fn($panel) => $panel->passwordReset()
                  )
            ->emailVerification()
            ->colors([
                'primary' => Color::Rose,
            ])
            ->resources([
                UserResource::class,
                WorkResource::class,
                RoleResource::class,
                AssessmentResource::class,
            ])
            // Coba nonaktifkan discoverResources dulu jika tidak yakin
            // ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->sidebarCollapsibleOnDesktop(true)
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
            ->plugins($this->getPlugins())
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
    private function getPlugins(): array {
        $plugins = [
            FilamentShieldPlugin::make(),
            BreezyCore::make()
                ->myProfile(
                    shouldRegisterUserMenu: true, // Sets the 'account' link in the panel User Menu (default = true)
                    shouldRegisterNavigation: true, // Adds a main navigation item for the My Profile page (default = false)
                    navigationGroup: 'Settings', // Sets the navigation group for the My Profile page (default = null)
                    hasAvatars: true, // Enables the avatar upload form component (default = false)
                    slug: 'my-profile'
                )
                ->avatarUploadComponent(fn($fileUpload) => $fileUpload->disableLabel())
                // OR, replace with your own component
                ->avatarUploadComponent(
                    fn() => FileUpload::make('avatar_url')
                        ->image()
                        ->disk('public')
                )
                ->enableTwoFactorAuthentication(),
        ];

        return $plugins;
    }
}