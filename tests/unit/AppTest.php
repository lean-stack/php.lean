<?php

namespace Lean;

use Phly\Http\ServerRequest;
use Phly\Http\ServerRequestFactory;

class AppTest extends \PHPUnit_Framework_TestCase {

    public function testAppShouldResponse404WithoutRoutes ()
    {
        $app = new App();

        $request = (new ServerRequest())->withRequestTarget('/');
        $response = $app->handle($request);

        $this->assertEquals(404,$response->getStatusCode());
    }
}
