<?php

namespace src\middlewares;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

class RedirectIfLogged
{
    public function __invoke(Request $request, RequestHandler $handler)
    {
        $response = $handler->handle($request);

        if (isset($_SESSION['logged'])) {
            return $response->withHeader('Location', '/')->withStatus(302);
        }

        return $response;
    }
}