<?php

namespace Citizen;

use Citizen\Contracts\ServiceClientContract;
use Citizen\Contracts\ServiceDiscoveryContract;
use Citizen\Contracts\TransportContract;

class ServiceClient implements ServiceClientContract
{
    public function __construct(
        protected ServiceDiscoveryContract $discovery,
        protected TransportContract $transport,
        protected $loadBalancer
    ) {}

    public function call(string $service, string $method, array $parameters = []): mixed
    {
        $instance = $this->loadBalancer->select(
            $this->discovery->discover($service)
        );
        
        return $this->transport->send($instance, $method, $parameters);
    }

    public function callAsync(string $service, string $method, array $parameters = []): mixed
    {
        $instance = $this->loadBalancer->select(
            $this->discovery->discover($service)
        );
        
        return $this->transport->sendAsync($instance, $method, $parameters);
    }
}