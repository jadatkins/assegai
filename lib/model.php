<?php

namespace assegai;

/**
 * The basic implementation of a Model.
 *
 * This file is part of Assegai
 *
 * Assegai is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * Assegai is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Assegai.  If not, see <http://www.gnu.org/licenses/>.
 */
class Model
{
    /** Modules that were loaded by the application. */
    protected $modules;
    
    /**
     * Instanciates the model.
     * @param ModuleContainer $modules is a container of modules
     * instanciated by the application.
     */
    public function __construct(ModuleContainer $modules)
    {
        $this->modules = $modules;
        $this->_init();
    }

    /**
     * Method to be implemented by the user that is called at the end
     * of the constructor.. Avoids having to overload the constructor
     * and care about the parent constructor's logic.
     */
    protected function _init()
    {
    }
}

?>