<?php

namespace Citizen\Contracts;

/**
 * Represent a service.
 */
interface ServiceInstanceContract
{
    public function getHost(): string;
    public function getPort(): int;
    public function getWeight(): int;
    public function getMetaData(): array;
    public function getUri(): string;
    public function getVersion(): string;
    public function getHealthCheckEndpoint(): string;
    public function getTags(): array;
}