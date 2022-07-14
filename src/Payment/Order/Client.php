<?php

namespace EasyTiktok\Payment\Order;

use EasyTiktok\Payment\Kernel\BaseClient;
use EasyTiktok\Kernel\Exceptions\HttpException;
use EasyTiktok\Kernel\Exceptions\InvalidConfigException;
use GuzzleHttp\Exception\GuzzleException;

/**
 *
 * @author mormu <596129221@qq.com>
 */
class Client extends BaseClient {

    protected $needAccessToken = false;
    protected $postAccessToken = false;
    /**
     * Get session info by code.
     * @return array
     * @throws GuzzleException
     * @throws HttpException
     * @throws InvalidConfigException
     */
    public function create(array $params) {


        $params['app_id'] = $this->app['config']['app_id'];
        $params['notify_url'] = $params['notify_url'] ?? $this->app['config']['notify_url'] ?? '';
        $params['sign'] = $this->sign($params,$this->app['config']['salt']);//获取签名
        return $this->httpPostJson('apps/ecpay/v1/create_order', $params);
    }
}
