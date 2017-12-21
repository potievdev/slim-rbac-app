<?php

namespace Potievdev\SlimRbacApp\Component;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class AuthenticationMiddleware
 * @package Potievdev\SlimRbacApp\Component
 */
class AuthenticationMiddleware
{
    /**
     * Authentication user
     * @param  ServerRequestInterface                   $request  PSR7 request
     * @param  ResponseInterface                        $response PSR7 response
     * @param  callable                                 $next     Next middleware
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke($request, $response, $next)
    {
        /**
         * Here you must release authentication logic.
         */

        $exampleAuthenticatedUserId = 2;

        $request = $request->withAttribute('userId', $exampleAuthenticatedUserId);

        $response = $next($request, $response);

        return $response;
    }
}