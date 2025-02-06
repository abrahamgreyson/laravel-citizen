<?php

namespace Citizen;

use Citizen\Commands\CitizenCommand;
use Citizen\Contracts\ServiceDiscoveryContract;
use Citizen\Contracts\ServiceRegistryContract;
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

    public function registeringPackage()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/citizen.php', 'citizen');

        // discovery 
        $this->app->singleton(ServiceDiscoveryContract::class, function ($app) {
            $driver = config('citizen.discovery.driver');
            $config = config("citizen.discovery.drivers.{$driver}");

            return new $config['driver']($config);
        });

        // registry
        $this->app->singleton(ServiceRegistryContract::class, function($app){

            return new class {};
        });

        $this->app->singleton(ServiceManager::class, function ($app) {
            return new ServiceManager(
                $app->make(ServiceDiscoveryContract::class),
                $app->make(ServiceRegistryContract::class)
            );
        });
    }
}
