<?php

namespace Citizen\Contracts;

interface TransportContract
{
    public function send(ServiceInstanceContract $instance, string $method, array $parameters = []): mixed;

    public function sendAsync(ServiceInstanceContract $instance, string $method, array $parameters = []): mixed;
}
