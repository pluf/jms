<?php
return array(
    /**
     * **************************************************************
     * Pipelines
     * **************************************************************
     */
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

    /**
     * **************************************************************
     * Pipelines/Jobs
     * **************************************************************
     */
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
    /**
     * **************************************************************
     * Jobs
     * **************************************************************
     */
    array(
        'regex' => '#^/jobs/schema$#',
        'model' => 'Pluf\Jms\Views\JobView',
        'method' => 'getSchema',
        'http-method' => 'GET',
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

    /**
     * **************************************************************
     * Artifacts
     * **************************************************************
     */
    array(
        'regex' => '#^/artifacts/schema$#',
        'model' => 'Pluf\Jms\Views\ArtifactView',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'Pluf\Jms\Artifact'
        )
    ),
    array(
        'regex' => '#^/artifacts$#',
        'model' => 'Pluf\Jms\Views\ArtifactView',
        'method' => 'findObject',
        'http-method' => 'GET',
        'precond' => array(
            'User_Precondition::ownerRequired'
        ),
        'params' => array(
            'model' => 'Pluf\Jms\Artifact'
        )
    ),
    array(
        'regex' => '#^/artifacts/(?P<modelId>\d+)$#',
        'model' => 'Pluf\Jms\Views\ArtifactView',
        'method' => 'getObject',
        'http-method' => 'GET',
        'precond' => array(
            'User_Precondition::ownerRequired'
        ),
        'params' => array(
            'model' => 'Pluf\Jms\Artifact'
        )
    ),

    /**
     * **************************************************************
     * Attachments
     * **************************************************************
     */
    array(
        'regex' => '#^/attachments/schema$#',
        'model' => 'Pluf\Jms\Views\AttachmentView',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'Pluf\Jms\Attachment'
        )
    ),
    array(
        'regex' => '#^/attachments$#',
        'model' => 'Pluf\Jms\Views\AttachmentView',
        'method' => 'findObject',
        'http-method' => 'GET',
        'precond' => array(
            'User_Precondition::ownerRequired'
        ),
        'params' => array(
            'model' => 'Pluf\Jms\Attachment'
        )
    ),
    array(
        'regex' => '#^/attachments/(?P<modelId>\d+)$#',
        'model' => 'Pluf\Jms\Views\AttachmentView',
        'method' => 'getObject',
        'http-method' => 'GET',
        'precond' => array(
            'User_Precondition::ownerRequired'
        ),
        'params' => array(
            'model' => 'Pluf\Jms\Attachment'
        )
    ),
    array(
        'regex' => '#^/attachments/(?P<modelId>\d+)/content$#',
        'model' => 'Pluf\Jms\Views\AttachmentView',
        'method' => 'downloadObjectBinary',
        'http-method' => 'GET',
        'precond' => array(
            'User_Precondition::ownerRequired'
        ),
        'params' => array(
            'model' => 'Pluf\Jms\Attachment'
        )
    ),

    /**
     * **************************************************************
     * attributes
     * **************************************************************
     */
    array(
        'regex' => '#^/attributes/schema$#',
        'model' => 'Pluf\Jms\Views\AttributeView',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'Pluf\Jms\Attribute'
        )
    ),
    array(
        'regex' => '#^/attributes$#',
        'model' => 'Pluf\Jms\Views\AttributeView',
        'method' => 'findObject',
        'http-method' => 'GET',
        'precond' => array(
            'User_Precondition::ownerRequired'
        ),
        'params' => array(
            'model' => 'Pluf\Jms\Attribute'
        )
    ),
    array(
        'regex' => '#^/attributes/(?P<modelId>\d+)$#',
        'model' => 'Pluf\Jms\Views\AttributeView',
        'method' => 'getObject',
        'http-method' => 'GET',
        'precond' => array(
            'User_Precondition::ownerRequired'
        ),
        'params' => array(
            'model' => 'Pluf\Jms\Attribute'
        )
    ),


    /**
     * **************************************************************
     * Labels
     * **************************************************************
     */
    array(
        'regex' => '#^/labels/schema$#',
        'model' => 'Pluf\Jms\Views\LabelView',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'Pluf\Jms\Label'
        )
    ),
    array(
        'regex' => '#^/labels$#',
        'model' => 'Pluf\Jms\Views\LabelView',
        'method' => 'findObject',
        'http-method' => 'GET',
        'precond' => array(
            'User_Precondition::ownerRequired'
        ),
        'params' => array(
            'model' => 'Pluf\Jms\Label'
        )
    ),
    array(
        'regex' => '#^/labels/(?P<modelId>\d+)$#',
        'model' => 'Pluf\Jms\Views\LabelView',
        'method' => 'getObject',
        'http-method' => 'GET',
        'precond' => array(
            'User_Precondition::ownerRequired'
        ),
        'params' => array(
            'model' => 'Pluf\Jms\Label'
        )
    ),


    /**
     * **************************************************************
     * job logs
     * **************************************************************
     */
    array(
        'regex' => '#^/job-logs/schema$#',
        'model' => 'Pluf\Jms\Views\JobLogView',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'Pluf\Jms\Label'
        )
    ),
    array(
        'regex' => '#^/job-logs$#',
        'model' => 'Pluf\Jms\Views\JobLogView',
        'method' => 'findObject',
        'http-method' => 'GET',
        'precond' => array(
            'User_Precondition::ownerRequired'
        ),
        'params' => array(
            'model' => 'Pluf\Jms\Label'
        )
    ),
    array(
        'regex' => '#^/job-logs/(?P<modelId>\d+)$#',
        'model' => 'Pluf\Jms\Views\JobLogView',
        'method' => 'getObject',
        'http-method' => 'GET',
        'precond' => array(
            'User_Precondition::ownerRequired'
        ),
        'params' => array(
            'model' => 'Pluf\Jms\Label'
        )
    ),

    /**
     * **************************************************************
     * job logger
     * **************************************************************
     */
    array(
        'regex' => '#^/job-loggers/schema$#',
        'model' => 'Pluf\Jms\Views\JobLoggerView',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'Pluf\Jms\JobLogger'
        )
    ),
    array(
        'regex' => '#^/job-loggers$#',
        'model' => 'Pluf\Jms\Views\JobLoggerView',
        'method' => 'findObject',
        'http-method' => 'GET',
        'precond' => array(
            'User_Precondition::ownerRequired'
        ),
        'params' => array(
            'model' => 'Pluf\Jms\JobLogger'
        )
    ),
    array(
        'regex' => '#^/job-loggers/(?P<modelId>\d+)$#',
        'model' => 'Pluf\Jms\Views\JobLoggerView',
        'method' => 'getObject',
        'http-method' => 'GET',
        'precond' => array(
            'User_Precondition::ownerRequired'
        ),
        'params' => array(
            'model' => 'Pluf\Jms\JobLogger'
        )
    ),

    /**
     * **************************************************************
     * Worker
     * **************************************************************
     */
    array(
        'regex' => '#^/workers/schema$#',
        'model' => 'Pluf\Jms\Views\WorkerView',
        'method' => 'getSchema',
        'http-method' => 'GET',
        'params' => array(
            'model' => 'Pluf\Jms\Worker'
        )
    ),
    array(
        'regex' => '#^/workers$#',
        'model' => 'Pluf\Jms\Views\WorkerView',
        'method' => 'findObject',
        'http-method' => 'GET',
        'precond' => array(
            'User_Precondition::ownerRequired'
        ),
        'params' => array(
            'model' => 'Pluf\Jms\Worker'
        )
    ),
    array(
        'regex' => '#^/workers/(?P<modelId>\d+)$#',
        'model' => 'Pluf\Jms\Views\WorkerView',
        'method' => 'getObject',
        'http-method' => 'GET',
        'precond' => array(
            'User_Precondition::ownerRequired'
        ),
        'params' => array(
            'model' => 'Pluf\Jms\Worker'
        )
    )
);