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

class Module extends \Pluf\Module
{

    const moduleJsonPath = __DIR__ . '/module.json';

    /**
     * All data model relations
     */
    const relations = array(
        '\Pluf\Jms\Pipeline' => array(
            'relate_to_many' => array(
                '\Pluf\Jms\Label'
            )
        ),
        '\Pluf\Jms\Attachment' => array(
            'relate_to' => array(
                '\Pluf\Jms\Job'
            )
        ),
        '\Pluf\Jms\Attribute' => array(
            'relate_to' => array(
                '\Pluf\Jms\Job'
            )
        ),
        '\Pluf\Jms\JobLogger' => array(
            'relate_to' => array(
                '\Pluf\Jms\Job'
            )
        ),
        '\Pluf\Jms\Job' => array(
            'relate_to' => array(
                '\Pluf\Jms\Pipeline'
            )
        )
    );

    public function init(\Pluf $bootstrap): void
    {
        // TODO: maso, 2020: load module
    }
}
