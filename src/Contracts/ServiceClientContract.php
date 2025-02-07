<?php

namespace Citizen\Contracts;

interface ServiceClientContract
{
    /**
     * 发送请求到目标服务
     */
    public function call(string $service, string $method, array $parameters = []): mixed;

    /**
     * 异步发送请求到目标服务
     */
    public function callAsync(string $service, string $method, array $parameters = []): mixed;
}
