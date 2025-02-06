<?php

namespace Citizen;

use Citizen\Contracts\ServiceClientContract;
use Citizen\Contracts\TransportContract;

class ServiceClientFactory
{
    public function create(string $transport = 'http'): ServiceClientContract
    {
        // 根据配置创建对应的客户端实现
    }
}