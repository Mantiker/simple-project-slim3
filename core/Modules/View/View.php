<?php

namespace Core\Modules\View;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\RequestInterface;

class View
{
    /**
     * @var array
     */
    private $settings;

    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->settings = $container['settings']['view'];
    }

    public function render($filename)
    {
        ob_start();
        $request = $this->container->get('request')->getQueryParams();

        include("../{$this->settings['path']}/{$filename}.php");
        $html = ob_get_clean();

        return $html;
    }
}
