<?php

namespace assegai\components\injector;
use \assegai\components\injector\exceptions;

class Definition
{
    protected $name;
    protected $class;
    protected $dependencies;
    protected $mother = null;

    function __construct($name, $class, array $dependencies = null, $mother = '')
    {
        $this->name = $name;
        $this->class = $class;
        if(!$dependencies) {
            $this->dependencies = array();
        }
        else {
            $this->dependencies = $dependencies;
        }
        $this->mother = $mother;
    }

    // Accessors.
    function getName()
    {
        return $this->name;
    }

    function setName($val)
    {
        $this->name = $val;
        return $this;
    }

    function getClass()
    {
        return $this->class;
    }

    function setClass($val)
    {
        $this->class = $val;
        return $this;
    }

    function getDependencies()
    {
        return $this->dependencies ?: array();
    }

    function setDependencies($val)
    {
        $this->dependencies = $val;
        return $this;
    }

    function getMother()
    {
        return $this->mother;
    }

    function setMother($val)
    {
        $this->mother = $val;
        return $this;
    }
}
