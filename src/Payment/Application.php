<?php

namespace EasyTiktok\Payment;

use EasyTiktok\Kernel\ServiceContainer;
use EasyTiktok\Kernel\Traits\ResponseCastable;

/**
 * Class Application.
 * @property Base\Client $base
 * @property Order\Client $order
 * @author mormu <596129221@qq.com>
 */
class Application extends ServiceContainer {

    use ResponseCastable;

    /**
     * @var array
     */
    protected $providers = [
        Base\ServiceProvider::class,
        Order\ServiceProvider::class,
    ];

    /**
     * 初始化支付的基础接口
     * @var array|\string[][]
     */
    protected $defaultConfig = [
        'http' => [
            'base_uri' => 'https://developer.toutiao.com/api/',
        ],
    ];

    /**
     * Handle dynamic calls.
     *
     * @param string $method
     * @param array $args
     *
     * @return mixed
     */
    public function __call(string $method, array $args) {
        return $this->base->$method(...$args);
    }
}
