<?php

namespace Lean;

/**
 * PHP_FIG PSR-7
 */
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
/**
 * Current implementations by matthew weier o'phinney
 */
use Phly\Conduit\MiddlewarePipe;
use Phly\Http\Response;
use Phly\Http\Server;
use Phly\Http\ServerRequestFactory;

class App
{
    /** @var Server */
    private $server;
    /** @var MiddlewarePipe */
    private $pipe;

    /**
     * App constructor.
     */
    public function __construct()
    {
        $this->pipe = new MiddlewarePipe();
    }

    /**
     * Main app runner
     */
    public function listen()
    {
        $request = ServerRequestFactory::fromGlobals();
        $this->server = Server::createServerFromRequest($this->pipe, $request);
        $this->server->listen();
    }

     /**
     * Request handler, enabling unit testing the App class
     *
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request)
    {
        /** @var ResponseInterface $response */
        $response = new Response();
        $response = call_user_func($this->pipe, $request, $response);
        return $response;
    }
}
