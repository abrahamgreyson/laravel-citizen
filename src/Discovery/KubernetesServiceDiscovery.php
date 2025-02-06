<?php

namespace Citizen\Discovery;

use Citizen\Contracts\ServiceDiscoveryContract;

class KubernetesServiceDiscovery implements ServiceDiscoveryContract
{
    public function services(): array
    {
        return [];
    }

    public function discover($name): array
    {
        return [];
    }
}