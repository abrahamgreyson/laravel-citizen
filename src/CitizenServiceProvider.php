<?php

namespace Citizen;

use Citizen\Commands\CitizenCommand;
use Citizen\Contracts\DiscoveryContract;
use Citizen\Contracts\RegistryContract;
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
        $this->mergeConfigFrom(__DIR__.'/../config/citizen.php', 'citizen');

        $driver = config('citizen.driver');
        $config = config("citizen.drivers.{$driver}");

        // discovery
        $this->app->singleton(DiscoveryContract::class, function ($app) use ($config) {
            return new $config['discovery_driver']($config);
        });

        // registry
        $this->app->singleton(RegistryContract::class, function ($app) use ($config) {
            return new $config['registry_driver']($config);
        });

        $this->app->singleton(ServiceManager::class, function ($app) {
            return new ServiceManager(
                $app->make(DiscoveryContract::class),
                $app->make(RegistryContract::class)
            );
        });
    }
}
