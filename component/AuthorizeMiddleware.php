<?php

namespace Potievdev\SlimRbacApp\Component;

use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class UserMiddleware
 * @package Potievdev\SlimRbacApp\Component
 */
class AuthorizeMiddleware
{
    /** @var  EntityManager $em */
    private $em;

    /**
     * UserMiddleware constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Check access
     * @param  ServerRequestInterface                   $request  PSR7 request
     * @param  ResponseInterface                        $response PSR7 response
     * @param  callable                                 $next     Next middleware
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke($request, $response, $next)
    {
        /**
         * Implement user authorization logic.
         * After set user identifier in $request as userId
         */

        $detectedUserId = 2;

        $request = $request->withAttribute('userId', $detectedUserId);

        $response = $next($request, $response);

        return $response;
    }
}