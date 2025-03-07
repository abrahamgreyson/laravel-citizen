<?php

namespace Citizen\Contracts;

interface RegistryContract
{
    /**
     * Register service to service registry.
     */
    public function register(string $service, string $host, array $metadata = []);

    /**
     * Deregister service from service registry.
     */
    public function deregister(string $service);
}
