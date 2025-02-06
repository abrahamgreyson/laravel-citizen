<?php

namespace Citizen\Discovery;

use Citizen\Contracts\ServiceDiscoveryContract;

/**
 * stub
 */
class NacosClient{
    public function getServices(string $service): array
    {
        return [];
    }
}

class NacosServiceDiscovery implements ServiceDiscoveryContract
{
    protected ?NacosClient $client;
    
    public function discover(string $service): array
    {
        return $this->client->getServices($service);
    }

    public function services(): array
    {
        return $this->client->getServices('');
    }
}