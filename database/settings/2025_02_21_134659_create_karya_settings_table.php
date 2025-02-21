<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('KaryaSetting.site_name', 'Spatie');
        $this->migrator->add('KaryaSetting.site_active', true);
        $this->migrator->add('KaryaSetting.registration_enabled', true);
        $this->migrator->add('KaryaSetting.login_enabled', true);
        $this->migrator->add('KaryaSetting.password_reset_enabled', true);
        $this->migrator->add('KaryaSetting.sso_enabled', true);
    }
};