<?php

namespace App\Filament\Pages;

use App\Settings\KaryaSetting;
use Filament\Pages\SettingsPage;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;

class ManageSetting extends SettingsPage {
    
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationGroup = 'Settings';

    protected static string $settings = KaryaSetting::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Site Information')->columns(1)->schema([
                    TextInput::make('site_name')
                        ->label('Site Name')
                        ->required(),
                    Toggle::make('site_active')
                        ->label('Site Active'),
                    Toggle::make('registration_enabled')
                        ->label('Registration Enabled'),
                    Toggle::make('password_reset_enabled')
                        ->label('Password Reset Enabled'),
                    Toggle::make('sso_enabled')
                        ->label('SSO Enabled'),
                ]),
            ]);
    }
}
