<?php


namespace EasyTiktok\Payment\Order;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider.
 *
 * @author mormu <596129221@qq.com>
 */
class ServiceProvider implements ServiceProviderInterface {
    /**
     * {@inheritdoc}.
     */
    public function register(Container $pimple): void {
        !isset($pimple['order']) && $pimple['order'] = static function($app) {

            return new Client($app);
        };
    }
}
