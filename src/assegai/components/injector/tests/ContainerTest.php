<?php

namespace assegai\components\injector\tests;

use assegai\components\injector;
use assegai\components\injector\exceptions;

// Test classes; nothing to it.
class TestDep1 {
    
}
class TestDep2 {
    public $test1;
    
    function setTest1(TestDep1 $test1)
    {
        $this->test1 = $test1;
    }
}

// And the real unit tests.
class ContainerTest extends \PHPUnit_Framework_TestCase
{
    function testBasicInjection()
    {
        $c = new injector\Container();
        $c->register(new injector\Definition('test1', __NAMESPACE__ . '\\TestDep1'));
        
        $thing = $c->give('test1');
        $this->assertEquals(__NAMESPACE__ . '\\TestDep1', get_class($thing));
    }
    
    function testDependencies()
    {
        $c = new injector\Container();
        $c->register(new injector\Definition('test1', __NAMESPACE__ . '\\TestDep1'));
        $c->register(new injector\Definition('test2', __NAMESPACE__ . '\\TestDep2', ['test1']));
        
        $thing = $c->give('test2');
        $this->assertEquals(__NAMESPACE__ . '\\TestDep1', get_class($thing->test1));
    }
    
    /**
     * @expectedException assegai\components\injector\exceptions\UnknownDefinitionException
     */
    function testUnknownDefinition()
    {
        $c = new injector\Container();
        $c->give('foo');
    }
}
