<?php

/**
 * Configuration class, a read-only dictionary.
 *
 * This file is part of Assegai
 *
 * Copyright (c) 2013 - 2014 Guillaume Pasquet
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace assegai\components\config;

class Config implements IConfig
{
    protected $settings;
    
    public function loadFile($path, $varname = 'conf') {
        if(!file_exists($path)) {
            throw new \Exception("File `$path' doesn't exist.");
        }

        $conf = array();
        require($path);

        return $this->addArray($$varname);
    }

    public function get($defname, $default = null)
    {
        if(isset($this->settings[$defname])) {
            return $this->settings[$defname];
        } else {
            return $default;
        }
    }
    
    public function set($defname, $value)
    {
        $this->settings[$defname] = $value;
    }

    public function getAll()
    {
        return $this->settings;
    }
    
    public function setAll(array $definitions)
    {
        $this->settings = $definitions;
    }
}