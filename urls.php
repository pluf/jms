<?php
return array(
    /****************************************************************
     * Pipelines
     ****************************************************************/
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
        'method' => 'findObject',
        'http-method' => 'GET',
        'precond' => array(
            'User_Precondition::ownerRequired'
        ),
        'params' => array(
            'model' => 'Pluf\Jms\Pipeline'
        )
    ),
//     array(
//         'regex' => '#^/pipelines$#',
//         'model' => 'Pluf\Jms\Views\PipelineView',
//         'method' => 'createPipeline',
//         'http-method' => 'POST',
//         'precond' => array(
//             'User_Precondition::ownerRequired'
//         ),
//     'params' => array(
//         'model' => 'Pluf\Jms\Pipeline'
//     )
//     ),
//     array(
//         'regex' => '#^/pipelines$#',
//         'model' => 'Pluf\Jms\Views\PipelineView',
//         'method' => 'deletePipeline',
//         'http-method' => 'DELETE',
//         'precond' => array(
//             'User_Precondition::ownerRequired'
//         ),
//     'params' => array(
//         'model' => 'Pluf\Jms\Pipeline'
//     )
//     ),
    /*
     * Snapshot itmes
     */
    array(
        'regex' => '#^/pipelines/(?P<modelId>\d+)$#',
        'model' => 'Pluf\Jms\Views\PipelineView',
        'method' => 'getObject',
        'http-method' => 'GET',
        'precond' => array(
            'User_Precondition::ownerRequired'
        ),
        'params' => array(
            'model' => 'Pluf\Jms\Pipeline'
        )
    ),
//     array(
//         'regex' => '#^/pipelines/(?P<modelId>\d+)$#',
//         'model' => 'Pluf\Jms\Views\PipelineView',
//         'method' => 'create',
//         'http-method' => 'POST',
//         'precond' => array(
//             'User_Precondition::ownerRequired'
//         )
//     ),
//     array(
//         'regex' => '#^/pipelines/(?P<modelId>\d+)$#',
//         'model' => 'Pluf\Jms\Views\PipelineView',
//         'method' => 'method',
//         'http-method' => 'DELETE',
//         'precond' => array(
//             'User_Precondition::ownerRequired'
//         )
//     ),

    /****************************************************************
     * Pipelines/Jobs
     ****************************************************************/
    array(
        'regex' => '#^/pipelines/(?P<parentId>\d+)/jobs/schema$#',
        'model' => 'Pluf\Jms\Views\PipelineView',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'parent' => 'Pluf\Jms\Pipeline',
            'parentKey' => 'pipeline_id',
            'model' => 'Pluf\Jms\Job'
        )
    ),
    /*
     * pipelines
     */
    array(
        'regex' => '#^/pipelines/(?P<parentId>\d+)/jobs$#',
        'model' => 'Pluf\Jms\Views\PipelineView',
        'method' => 'findManyToOne',
        'http-method' => 'GET',
        'precond' => array(
            // TODO: maso
        ),
        'params' => array(
            'parent' => 'Pluf\Jms\Pipeline',
            'parentKey' => 'pipeline_id',
            'model' => 'Pluf\Jms\Job'
        )
    ),
//     array(
//         'regex' => '#^/pipelines/(?P<parentId>\d+)/jobs$#',
//         'model' => 'Pluf\Jms\Views\PipelineView',
//         'method' => 'createManyToOne',
//         'http-method' => 'POST',
//         'precond' => array(
//             // TODO: maso
//         ),
//         'params' => array(
//             'parent' => 'Pluf\Jms\Pipeline',
//             'parentKey' => 'pipeline_id',
//             'model' => 'Pluf\Jms\Job'
//         )
//     ),
//     array(
//         'regex' => '#^/pipelines/(?P<parentId>\d+)/jobs$#',
//         'model' => 'Pluf\Jms\Views\PipelineView',
//         'method' => 'clearManyToOne',
//         'http-method' => 'DELETE',
//         'precond' => array(
//             // TODO: maso
//         ),
//         'params' => array(
//             'parent' => 'Pluf\Jms\Pipeline',
//             'parentKey' => 'pipeline_id',
//             'model' => 'Pluf\Jms\Job'
//         )
//     ),
    array(
        'regex' => '#^/pipelines/(?P<parentId>\d+)/jobs/(?P<modelId>\d+)$#',
        'model' => 'Pluf\Jms\Views\PipelineView',
        'method' => 'getManyToOne',
        'http-method' => 'GET',
        'params' => array(
            'parent' => 'Pluf\Jms\Pipeline',
            'parentKey' => 'pipeline_id',
            'model' => 'Pluf\Jms\Job'
        )
    ),
//     array( // Update item
//         'regex' => '#^/pipelines/(?P<parentId>\d+)/jobs/(?P<modelId>\d+)$#',
//         'model' => 'Pluf\Jms\Views\PipelineView',
//         'method' => 'updateManyToOne',
//         'http-method' => array(
//             'POST',
//             'PUT'
//         ),
//         'precond' => array(
//             'CMS_Precondition::authorRequired'
//         ),
//         'params' => array(
//             'parent' => 'Pluf\Jms\Pipeline',
//             'parentKey' => 'pipeline_id',
//             'model' => 'Pluf\Jms\Job'
//         )
//     ),
//     array( // delete item
//         'regex' => '#^/pipelines/(?P<parentId>\d+)/jobs/(?P<modelId>\d+)$#',
//         'model' => 'Pluf\Jms\Views\PipelineView',
//         'method' => 'deleteManyToOne',
//         'http-method' => 'DELETE',
//         'precond' => array(
//             'CMS_Precondition::authorRequired'
//         ),
//         'params' => array(
//             'parent' => 'Pluf\Jms\Pipeline',
//             'parentKey' => 'pipeline_id',
//             'model' => 'Pluf\Jms\Job'
//         )
//     ),
    /****************************************************************
     * Jobs
     ****************************************************************/
    array(
        'regex' => '#^/jobs/schema$#',
        'model' => 'Pluf\Jms\Views\JobView',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'Pluf\Jms\Job'
        ),
        'params' => array(
            'model' => 'Pluf\Jms\Job'
        )
    ),
    /*
     * pipelines
     */
    array(
        'regex' => '#^/jobs$#',
        'model' => 'Pluf\Jms\Views\JobView',
        'method' => 'findObject',
        'http-method' => 'GET',
        'precond' => array(
            'User_Precondition::ownerRequired'
        ),
        'params' => array(
            'model' => 'Pluf\Jms\Job'
        )
    ),
//     array(
//         'regex' => '#^/jobs$#',
//         'model' => 'Pluf\Jms\Views\JobView',
//         'method' => 'createPipeline',
//         'http-method' => 'POST',
//         'precond' => array(
//             'User_Precondition::ownerRequired'
//         )
//     ),
//     array(
//         'regex' => '#^/jobs$#',
//         'model' => 'Pluf\Jms\Views\JobView',
//         'method' => 'deletePipeline',
//         'http-method' => 'DELETE',
//         'precond' => array(
//             'User_Precondition::ownerRequired'
//         )
//     ),
    /*
     * Snapshot itmes
     */
    array(
        'regex' => '#^/jobs/(?P<modelId>\d+)$#',
        'model' => 'Pluf\Jms\Views\JobView',
        'method' => 'getObject',
        'http-method' => 'GET',
        'precond' => array(
            'User_Precondition::ownerRequired'
        ),
        'params' => array(
            'model' => 'Pluf\Jms\Job'
        )
    ),
//     array(
//         'regex' => '#^/pipelines/(?P<modelId>\d+)$#',
//         'model' => 'Pluf\Jms\Views\PipelineView',
//         'method' => 'create',
//         'http-method' => 'POST',
//         'precond' => array(
//             'User_Precondition::ownerRequired'
//         )
//     ),
//     array(
//         'regex' => '#^/pipelines/(?P<modelId>\d+)$#',
//         'model' => 'Pluf\Jms\Views\PipelineView',
//         'method' => 'method',
//         'http-method' => 'DELETE',
//         'precond' => array(
//             'User_Precondition::ownerRequired'
//         )
//     ),

);