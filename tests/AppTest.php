<?php

namespace Lean;

class AppTest extends \PHPUnit_Framework_TestCase {

    public function testAppShouldResponse404WithoutRoutes ()
    {
        $app = new App();

        $response = $app->handle(null);

        assertEquals(404,$response->getStatusCode());
    }
}
