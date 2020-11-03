<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Http\Stream;

class IndexController
{
    /**
     * @var ContainerInterface
     */
    private $container;

    private $view;

    /**
     * IndexController constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Main (index) page
     *
     * @return mixed
     */
    public function index()
    {
        /** @var ServerRequestInterface $request */
        $request = $this->container->get('request');

        /** @var ResponseInterface $response */
        $response = $this->container->get('response');

        return $response->getBody()->write($this->container->get('view')->render('front/index'));
    }

    /**
     * Page contacts
     *
     * @return mixed
     */
    public function contacts()
    {
        /** @var ServerRequestInterface $request */
        $request = $this->container->get('request');

        /** @var ResponseInterface $response */
        $response = $this->container->get('response');

        return $response->getBody()->write($this->container->get('view')->render('front/contacts'));
    }
}
