<?php

namespace Citizen\Discovery;

use Citizen\Contracts\ServiceDiscoveryContract;

class LocalServiceDiscovery implements ServiceDiscoveryContract
{
    /**
     * Cached services list.
     *
     * @var array
     */
    protected $services = [];

    public function __construct()
    {
        $this->services = config('citizen.services', []);
    }

    /**
     * Get service list by service name.
     *
     * @return array{
     *     host: string,
     *     port: int,
     *     weight?: int,
     *     tags?: array<string>,
     *     metadata?: array<string, mixed>
     * }
     */
    public function discover(string $serviceName): array
    {
        return $this->services[$serviceName] ?? [];
    }

    /**
     * Get all services.
     *
     * @return array<string, array{
     *     host: string,
     *     port: int,
     *     weight?: int,
     *     tags?: array<string>,
     *     metadata?: array<string, mixed>
     * }>
     */
    public function services(): array
    {
        return [];
    }
}
