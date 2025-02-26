<?php

namespace Citizen\Contracts;

/**
 * Represent a service.
 */
interface ServiceInstanceContract
{
    // 基本信息
    public function getId(): string;
    public function getServiceName(): string;

    // 连接
    public function getHost(): string;
    public function getPort(): int;
    public function getEndpoints(): array;
    public function getEndpoint(string $protocol = null): ?array;

    // 元数据
    public function getMetaData(): array;
    public function getMetaDataValue(string $key): mixed;

    // 健康
    public function getWeight(): int;
    public function isEnabled(): bool;
    public function getHealthCheckEndpoint(): string;

    // 集群
    public function getCluster(): string;

    // 版本
    public function getVersion(): string;

    // 标签
    public function getTags(): array;
}
