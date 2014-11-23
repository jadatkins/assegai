<?php

namespace assegai\components\config\tests;

use assegai\components\config;

class ConfigTest extends \PHPUnit_Framework_TestCase
{
    public function testSetAll()
    {
        $config = new config\Config();
        $config->setAll([
            'foo' => 'bar',
            'baz' => 'qux',
        ]);
        
        $this->assertEquals('bar', $config->get('foo'));
        $this->assertEquals('qux', $config->get('baz'));
    }
    
    public function testSetAndGet()
    {
        $config = new config\Config();
        $config->set('foo', 'bar');
        $this->assertEquals('bar', $config->get('foo'));
        
        $config->set('foo', 'baz');
        $this->assertEquals('baz', $config->get('foo'));
    }
    
    public function testGetAll()
    {
        $config = new config\Config();
        $config->setAll([
            'foo' => 'bar',
            'baz' => 'qux',
        ]);
        $array1 = $config->getAll();
        
        $config->set('zip', 'bang');
        $array2 = $config->getAll();
        
        $this->assertCount(2, $array1);
        $this->assertCount(3, $array2);
    }
}
