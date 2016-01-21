<?php

/**
 * Default application resolver
 *
 * @package Core
 * @author  Vasily Zorin <maintainer@daemon.io>
 */
class MyAppResolver extends \PHPDaemon\Core\AppResolver {

    /**
     * Routes incoming request to related application. Method is for overloading.
     * @param object Request.
     * @param object AppInstance of Upstream.
     * @return string Application's name.
     */
    public function getRequestRoute($req, $upstream) {
        return '\PHPDaemon\Test\Test';
    }
}

return new MyAppResolver;