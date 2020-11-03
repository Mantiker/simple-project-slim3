<?php


namespace App\Middlewares;


use Monolog\Logger;
use Psr\Container\ContainerInterface;

class DefaultMiddleware
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Default middleware for any visitor
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $request  PSR7 request
     * @param  \Psr\Http\Message\ResponseInterface      $response PSR7 response
     * @param  callable                                 $next     Next middleware
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke($request, $response, $next)
    {
        // before
        /** @var Logger $logger */
        $logger = $this->container->get('logger');

        $logger->addDebug("Start app");
        $logger->addDebug("URL: {$request->getUri()->getPath()}; Arguments: " . json_encode($request->getQueryParams(), JSON_UNESCAPED_UNICODE));

        $response = $next($request, $response);

        // after

        return $response;
    }
}
