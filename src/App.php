<?php

namespace Lean;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class App
{
    /**
     * Main app runner
     */
    public function listen()
    {

    }

    /**
     * Request handler
     *
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request)
    {
        /** @var ResponseInterface $response */
        $response = null;

        return $response;
    }
}
