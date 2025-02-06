<?php

namespace Citizen;

use Citizen\Commands\CitizenCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CitizenServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-citizen')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_citizen_table')
            ->hasCommand(CitizenCommand::class);
    }
}
