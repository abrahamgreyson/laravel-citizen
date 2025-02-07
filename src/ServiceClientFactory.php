<?php

namespace Citizen;

use stdClass;

class ServiceClientFactory
{
    public function create(string $transport = 'http')
    {
        // 根据传入的 transport 参数创建并返回对应的 ServiceClientContract 实现
        return new stdClass();
    }
}