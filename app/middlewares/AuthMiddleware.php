<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
/**
 * Middleware: AuthMiddlewareMiddleware
 * 
 * Automatically generated via CLI.
 */
class AuthMiddleware
{
    /**
     * Handle the incoming request
     *
     * @param Closure $next
     * @return mixed
     */
    public function handle(Closure $next)
    {
        if (!isset($_SESSION['logged_in'])) {
            header("Location: /login");
            exit();
        }

        return $next();
    }
}
