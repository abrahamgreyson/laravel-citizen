<?php

namespace Citizen\Contracts;

interface DiscoveryContract
{
    /**
     * Get services list that match the given service name.
     * todo scope...
     */
    public function discover(string $serviceName): array;

    /**
     * Get all services.
     */
    public function services(): array;
}
