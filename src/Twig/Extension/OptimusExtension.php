<?php

namespace Jaam\Silex\Twig\Extension;

use Jenssegers\Optimus\Optimus;

class OptimusExtension extends \Twig_Extension {

    private $optimus;

    public function __construct(Optimus $optimus) {
        $this->optimus = $optimus;
    }

    public function getFilters() {
        return [
            new \Twig_SimpleFilter('optimus', [$this, 'encode'])
        ];
    }

    public function encode($id) {
        return $this->optimus->encode($id);
    }

    public function getName() {
        return 'optimus';
    }

}