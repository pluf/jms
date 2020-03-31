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

use Pluf_ModelBinary;

class Artifact extends Pluf_ModelBinary
{

    /**
     *
     * {@inheritdoc}
     * @see Pluf_ModelBinary::init()
     */
    function init()
    {
        parent::init();
        $this->_a['table'] = 'jms_artifacts';
        $this->_a['cols'] = array_merge($this->_a['cols'], array(
            'path' => array(
                'type' => 'Varchar',
                'is_null' => false,
                'default' => '/',
                'size' => 1024,
                'editable' => true
            ),
            // relations
            'job_id' => array(
                'type' => 'Foreignkey',
                'model' => '\Pluf\Jms\Job',
                'is_null' => false,
                'name' => 'job',
                'relate_name' => 'artifacts',
                'graphql_name' => 'job',
                'editable' => true
            )
        ));
    }
}
