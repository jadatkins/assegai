<?php

namespace assegai\components\eventsystem\tests;

use assegai\components\eventsystem;
use assegai\components\eventsystem\events;

class DispatcherTest extends \PHPUnit_Framework_TestCase
{
    protected $has_run = false;
    protected $handler_run = false;
    
    // This is used to test method handlers.
    public function handler()
    {
        $this->handler_run = true;
    }
    
    public function testClosure()
    {
        $es = new eventsystem\Dispatcher();
        $es->register('event', function(events\IEvent $e) {
            $this->has_run = true;
        });
        
        $this->has_run = false;
        $es->trigger(new events\Event());
        $this->assertTrue($this->has_run);
    }
    
    public function testMedhod()
    {
        $es = new eventsystem\Dispatcher();
        $es->register('event', [$this, 'handler']);
        
        $this->handler_run = false;
        $es->trigger(new events\Event());
        $this->assertTrue($this->handler_run);
    }
    
    public function testSequentialRun()
    {
        $es = new eventsystem\Dispatcher();
        $this->handler_run = false;
        $this->has_run = false;
        
        $es->register('event', function(events\IEvent $e) {
            $this->has_run = true;
        });
        $es->register('event', [$this, 'handler']);
        
        $es->trigger(new events\Event());
        $this->assertTrue($this->handler_run);
        $this->assertTrue($this->has_run);
    }
    
    public function testStopPropagation()
    {
        $es = new eventsystem\Dispatcher();
        $this->handler_run = false;
        $this->has_run = false;
        
        $es->register('event', function(events\IEvent $e) {
            $this->has_run = true;
            return true;
        });
        $es->register('event', [$this, 'handler']);
        
        $es->trigger(new events\Event());
        $this->assertTrue($this->has_run);
        $this->assertFalse($this->handler_run);
    }
}
