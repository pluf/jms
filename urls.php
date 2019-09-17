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
    )
);