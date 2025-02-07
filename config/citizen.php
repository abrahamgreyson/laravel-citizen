<?php

// config/citizen.php
return [
    'discovery' => [
        'driver' => env('SERVICE_DISCOVERY_DRIVER', 'local'),

        'drivers' => [
            'local' => [
                'driver' => \Citizen\Discovery\LocalServiceDiscovery::class,
            ],
            'nacos' => [
                'driver' => \Citizen\Discovery\NacosServiceDiscovery::class,
                'host' => env('NACOS_HOST'),
                'port' => env('NACOS_PORT'),
            ],
            'kubernetes' => [
                'driver' => \Citizen\Discovery\KubernetesServiceDiscovery::class,
                'namespace' => env('K8S_NAMESPACE', 'default'),
            ],
        ],
    ],

    // 本地开发服务配置
    'services' => [
        'user-service' => env('USER_SERVICE_HOST', 'http://localhost:8001'),
        'order-service' => env('ORDER_SERVICE_HOST', 'http://localhost:8002'),
        'payment-service' => env('PAYMENT_SERVICE_HOST', 'http://localhost:8003'),
    ],
];
