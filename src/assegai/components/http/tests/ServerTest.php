<?php

namespace assegai\components\http\tests;

use assegai\components\http;

class ServerTest extends \PHPUnit_Framework_TestCase
{
    public function testRoute()
    {
        $s = new http\Server();
        $s->parsevars([
            'REQUEST_URI' => '/foo/bar',
        ]);
        
        $this->assertEquals('/foo/bar', $s->getRoute());
        
        $s->setPrefix('/foo');
        $this->assertEquals('/bar', $s->getRoute());
    }
}
