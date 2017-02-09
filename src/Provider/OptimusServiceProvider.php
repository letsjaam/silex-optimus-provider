<?php

namespace Jaam\Silex\Provider;

use Jaam\Silex\Twig\Extension\OptimusExtension;
use Jenssegers\Optimus\Optimus;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class OptimusServiceProvider implements ServiceProviderInterface {

    public function register(Container $pimple) {
        $pimple['optimus'] = function($pimple) {
            $config = $pimple['optimus.options'];

            return new Optimus(
                $config['prime'],
                $config['inverse'],
                $config['random']
            );
        };

        if ( isset($pimple['twig']) ) {
            // Twig extension
            $pimple->extend('twig', function($twig) use ($pimple) {
                $twig->addExtension( new OptimusExtension($pimple['optimus']) );
                return $twig;
            });
        }
    }

}