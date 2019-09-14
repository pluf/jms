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

class Module
{

    const moduleJsonPath = __DIR__ . '/module.json';

    /**
     * All data model relations
     */
    const relations = array();

    const urls = array(
        array(
            'regex' => '#^/pipelines/schema$#',
            'model' => 'Pluf\Jms\Views\PipelineView',
            'method' => 'getSchema',
            'http-method' => 'GET',
            'params' => array(
                'model' => 'Pluf\Jms\Pipeline'
            )
        ),
        /*
         * pipelines
         */
        array(
            'regex' => '#^/pipelines$#',
            'model' => 'Pluf\Jms\Views\PipelineView',
            'method' => 'find',
            'http-method' => 'GET',
            'precond' => array(
                'User_Precondition::ownerRequired'
            )
        ),
        array(
            'regex' => '#^/pipelines$#',
            'model' => 'Pluf\Jms\Views\PipelineView',
            'method' => 'createPipeline',
            'http-method' => 'POST',
            'precond' => array(
                'User_Precondition::ownerRequired'
            )
        ),
        array(
            'regex' => '#^/pipelines$#',
            'model' => 'Pluf\Jms\Views\PipelineView',
            'method' => 'deletePipeline',
            'http-method' => 'DELETE',
            'precond' => array(
                'User_Precondition::ownerRequired'
            )
        ),
        /*
         * Snapshot itmes
         */
        array(
            'regex' => '#^/pipelines/(?P<modelId>\d+)$#',
            'model' => 'Pluf\Jms\Views\PipelineView',
            'method' => 'method',
            'http-method' => 'GET',
            'precond' => array(
                'User_Precondition::ownerRequired'
            )
        ),
        array(
            'regex' => '#^/pipelines/(?P<modelId>\d+)$#',
            'model' => 'Pluf\Jms\Views\PipelineView',
            'method' => 'create',
            'http-method' => 'POST',
            'precond' => array(
                'User_Precondition::ownerRequired'
            )
        ),
        array(
            'regex' => '#^/pipelines/(?P<modelId>\d+)$#',
            'model' => 'Pluf\Jms\Views\PipelineView',
            'method' => 'method',
            'http-method' => 'DELETE',
            'precond' => array(
                'User_Precondition::ownerRequired'
            )
        )
    );
}
