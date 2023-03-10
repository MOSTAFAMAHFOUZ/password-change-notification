<?php

namespace ven\PasswordChangeNotification;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PasswordChangeNotificationServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('password-change-notification')
            ->hasConfigFile()
            ->hasViews();
    }
}
