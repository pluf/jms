<?php
/*
 * This file is part of Pluf Framework, a simple PHP Application Framework.
 * Copyright (C) 2010-2020 Phoinex Scholars Co. (http://dpq.co.ir)
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
namespace Pluf\Jms;

use Pluf_Model;

class Worker extends Pluf_Model
{

    /**
     * Initialize the data model
     *
     * @see Pluf_Model::init()
     */
    function init()
    {
        $this->_a['table'] = 'jms_workers';
        $this->_a['cols'] = array(
            // Identifier
            'id' => array(
                'type' => 'Sequence',
                'is_null' => false,
                'editable' => false
            ),
            // Fields
            'title' => array(
                'type' => 'Varchar',
                'is_null' => true,
                'size' => 256,
                'unique' => false,
                'editable' => true
            ),
            'description' => array(
                'type' => 'Varchar',
                'is_null' => true,
                'size' => 2048,
                'unique' => false,
                'editable' => true
            ),
            'token' => array(
                'type' => 'Varchar',
                'is_null' => false,
                'size' => 2048,
                'unique' => false,
                'editable' => true
            )
        );
        $this->_a['idx'] = array();
    }
}
