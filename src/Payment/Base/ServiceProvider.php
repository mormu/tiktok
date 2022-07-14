<?php



namespace EasyTiktok\Payment\Base;

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
        $pimple['base'] = static function($app) {
            return new Client($app);
        };
    }
}
