<?php

namespace Citizen;

use Citizen\Contracts\ServiceDiscoveryContract;
use Citizen\Contracts\ServiceRegistryContract;
use Illuminate\Support\Facades\Http;

class ServiceManager
{
    private string $callThrough = 'http';

    public function __construct(
        protected ServiceDiscoveryContract $discovery,
        protected ServiceRegistryContract $registry
    )
    {
    }
    
    public function getServiceUrl(string $serviceName): ?string
    {
        return $this->discovery->discover($serviceName)['host'];
    }

    public function call(string $serviceName, string $path, array $params = []): mixed
    {
        $url = $this->getServiceUrl($serviceName);
        return Http::baseurl($url)->get($path, $params);
    }
}