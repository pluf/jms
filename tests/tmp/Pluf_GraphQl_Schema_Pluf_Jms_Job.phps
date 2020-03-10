<?php
// Import
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\GraphQL;
use GraphQL\Type\Schema;
/**
 * Render class of GraphQl
 */
class Pluf_GraphQl_Schema_Pluf_Jms_Job {
    public function render($rootValue, $query) {
        // render object types variables
         $Pluf_Jms_Job = null;
         $Pluf_Jms_Pipeline = null;
         $Pluf_Jms_Label = null;
         $Pluf_Jms_Attachment = null;
         $Pluf_Jms_Attribute = null;
         $Pluf_Jms_JobLogger = null;
        // render code
         //
        $Pluf_Jms_Job = new ObjectType([
            'name' => 'Pluf\Jms\Job',
            'fields' => function () use (&$Pluf_Jms_Pipeline, &$Pluf_Jms_Attachment, &$Pluf_Jms_Attribute, &$Pluf_Jms_JobLogger){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [is_null] =>     [editable] => )
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //mime_type: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [size] => 64    [default] => application/octet-stream    [editable] => 1)
                    'mime_type' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->mime_type;
                        },
                    ],
                    //file_name: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] =>     [size] => 250    [default] => unknown    [editable] => )
                    'file_name' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->file_name;
                        },
                    ],
                    //file_size: Array(    [type] => Pluf_DB_Field_Integer    [is_null] =>     [editable] => )
                    'file_size' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->file_size;
                        },
                    ],
                    //modif_dtime: Array(    [type] => Pluf_DB_Field_Datetime    [blank] => 1    [editable] => )
                    'modif_dtime' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->modif_dtime;
                        },
                    ],
                    //name: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [size] => 64    [editable] => 1)
                    'name' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->name;
                        },
                    ],
                    //description: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [size] => 2048    [editable] => 1)
                    'description' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->description;
                        },
                    ],
                    //priority: Array(    [type] => Pluf_DB_Field_Integer    [is_null] =>     [default] => 0    [editable] => 1)
                    'priority' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->priority;
                        },
                    ],
                    //status: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] =>     [size] => 64    [default] => new    [editable] => 1)
                    'status' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->status;
                        },
                    ],
                    //image: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [size] => 256    [editable] => 1)
                    'image' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->image;
                        },
                    ],
                    //when: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [size] => 64    [default] => on_success    [editable] => 1)
                    'when' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->when;
                        },
                    ],
                    //Foreinkey value-pipeline_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => Pluf\Jms\Pipeline    [is_null] =>     [name] => pipeline    [graphql_name] => pipeline    [relate_name] => jobs    [editable] => )
                    'pipeline_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->pipeline_id;
                            },
                    ],
                    //Foreinkey object-pipeline_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => Pluf\Jms\Pipeline    [is_null] =>     [name] => pipeline    [graphql_name] => pipeline    [relate_name] => jobs    [editable] => )
                    'pipeline' => [
                            'type' => $Pluf_Jms_Pipeline,
                            'resolve' => function ($root) {
                                return $root->get_pipeline();
                            },
                    ],
                    // relations: forenkey
                    
                    //Foreinkey list-job_id: Array()
                    'attachments' => [
                            'type' => Type::listOf($Pluf_Jms_Attachment),
                            'resolve' => function ($root) {
                                return $root->get_attachments_list();
                            },
                    ],
                    //Foreinkey list-job_id: Array()
                    'attributes' => [
                            'type' => Type::listOf($Pluf_Jms_Attribute),
                            'resolve' => function ($root) {
                                return $root->get_attributes_list();
                            },
                    ],
                    //Foreinkey list-job_id: Array()
                    'loggers' => [
                            'type' => Type::listOf($Pluf_Jms_JobLogger),
                            'resolve' => function ($root) {
                                return $root->get_loggers_list();
                            },
                    ],
                    
                ];
            }
        ]); //
        $Pluf_Jms_Pipeline = new ObjectType([
            'name' => 'Pluf\Jms\Pipeline',
            'fields' => function () use (&$Pluf_Jms_Label, &$Pluf_Jms_Job){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [is_null] =>     [editable] => )
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //title: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [size] => 256    [unique] =>     [editable] => 1)
                    'title' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->title;
                        },
                    ],
                    //description: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [size] => 2048    [unique] =>     [editable] => 1)
                    'description' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->description;
                        },
                    ],
                    //status: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] =>     [size] => 64    [default] => new    [unique] =>     [editable] => 1)
                    'status' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->status;
                        },
                    ],
                    //Foreinkey value-labels: Array(    [type] => Pluf_DB_Field_Manytomany    [model] => Pluf\Jms\Label    [is_null] => 1    [editable] =>     [name] => labels    [graphql_name] => labels    [relate_name] => pipelines)
                    'labels' => [
                            'type' => Type::listOf($Pluf_Jms_Label),
                            'resolve' => function ($root) {
                                return $root->get_labels_list();
                            },
                    ],
                    // relations: forenkey
                    
                    //Foreinkey list-pipeline_id: Array()
                    'jobs' => [
                            'type' => Type::listOf($Pluf_Jms_Job),
                            'resolve' => function ($root) {
                                return $root->get_jobs_list();
                            },
                    ],
                    
                ];
            }
        ]); //
        $Pluf_Jms_Label = new ObjectType([
            'name' => 'Pluf\Jms\Label',
            'fields' => function () use (&$Pluf_Jms_Pipeline){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [is_null] =>     [editable] => )
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //name: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] =>     [size] => 1024    [default] => name    [editable] => 1)
                    'name' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->name;
                        },
                    ],
                    // relations: forenkey
                    
                    
                    //Foreinkey list-labels: Array()
                    'pipelines' => [
                            'type' => Type::listOf($Pluf_Jms_Pipeline),
                            'resolve' => function ($root) {
                                return $root->get_pipelines_list();
                            },
                    ],
                ];
            }
        ]); //
        $Pluf_Jms_Attachment = new ObjectType([
            'name' => 'Pluf\Jms\Attachment',
            'fields' => function () use (&$Pluf_Jms_Job){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [is_null] =>     [editable] => )
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //mime_type: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [size] => 64    [default] => application/octet-stream    [editable] => 1)
                    'mime_type' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->mime_type;
                        },
                    ],
                    //file_name: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] =>     [size] => 250    [default] => unknown    [editable] => )
                    'file_name' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->file_name;
                        },
                    ],
                    //file_size: Array(    [type] => Pluf_DB_Field_Integer    [is_null] =>     [editable] => )
                    'file_size' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->file_size;
                        },
                    ],
                    //modif_dtime: Array(    [type] => Pluf_DB_Field_Datetime    [blank] => 1    [editable] => )
                    'modif_dtime' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->modif_dtime;
                        },
                    ],
                    //extract: Array(    [type] => Pluf_DB_Field_Boolean    [is_null] =>     [default] =>     [editable] => )
                    'extract' => [
                        'type' => Type::boolean(),
                        'resolve' => function ($root) {
                            return $root->extract;
                        },
                    ],
                    //Foreinkey value-job_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => Pluf\Jms\Job    [is_null] =>     [name] => job    [relate_name] => attachments    [graphql_name] => job    [editable] => 1)
                    'job_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->job_id;
                            },
                    ],
                    //Foreinkey object-job_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => Pluf\Jms\Job    [is_null] =>     [name] => job    [relate_name] => attachments    [graphql_name] => job    [editable] => 1)
                    'job' => [
                            'type' => $Pluf_Jms_Job,
                            'resolve' => function ($root) {
                                return $root->get_job();
                            },
                    ],
                    // relations: forenkey
                    
                    
                ];
            }
        ]); //
        $Pluf_Jms_Attribute = new ObjectType([
            'name' => 'Pluf\Jms\Attribute',
            'fields' => function () use (&$Pluf_Jms_Job){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [is_null] =>     [editable] => )
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //name: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] =>     [size] => 64    [default] => name    [editable] => 1)
                    'name' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->name;
                        },
                    ],
                    //value: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [size] => 2048    [default] => application/octet-stream    [editable] => 1)
                    'value' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->value;
                        },
                    ],
                    //Foreinkey value-job_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => Pluf\Jms\Job    [is_null] =>     [name] => job    [relate_name] => attributes    [graphql_name] => job    [editable] => 1)
                    'job_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->job_id;
                            },
                    ],
                    //Foreinkey object-job_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => Pluf\Jms\Job    [is_null] =>     [name] => job    [relate_name] => attributes    [graphql_name] => job    [editable] => 1)
                    'job' => [
                            'type' => $Pluf_Jms_Job,
                            'resolve' => function ($root) {
                                return $root->get_job();
                            },
                    ],
                    // relations: forenkey
                    
                    
                ];
            }
        ]); //
        $Pluf_Jms_JobLogger = new ObjectType([
            'name' => 'Pluf\Jms\JobLogger',
            'fields' => function () use (&$Pluf_Jms_Job){
                return [
                    // List of basic fields
                    
                    //id: Array(    [type] => Pluf_DB_Field_Sequence    [is_null] =>     [editable] => )
                    'id' => [
                        'type' => Type::int(),
                        'resolve' => function ($root) {
                            return $root->id;
                        },
                    ],
                    //url: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [size] => 1024    [editable] => 1)
                    'url' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->url;
                        },
                    ],
                    //period: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [size] => 256    [editable] => 1)
                    'period' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->period;
                        },
                    ],
                    //template: Array(    [type] => Pluf_DB_Field_Varchar    [is_null] => 1    [size] => 1024    [editable] => 1)
                    'template' => [
                        'type' => Type::string(),
                        'resolve' => function ($root) {
                            return $root->template;
                        },
                    ],
                    //Foreinkey value-job_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => Pluf\Jms\Job    [is_null] =>     [name] => job    [relate_name] => loggers    [graphql_name] => job    [editable] => 1)
                    'job_id' => [
                            'type' => Type::int(),
                            'resolve' => function ($root) {
                                return $root->job_id;
                            },
                    ],
                    //Foreinkey object-job_id: Array(    [type] => Pluf_DB_Field_Foreignkey    [model] => Pluf\Jms\Job    [is_null] =>     [name] => job    [relate_name] => loggers    [graphql_name] => job    [editable] => 1)
                    'job' => [
                            'type' => $Pluf_Jms_Job,
                            'resolve' => function ($root) {
                                return $root->get_job();
                            },
                    ],
                    // relations: forenkey
                    
                    
                ];
            }
        ]);$rootType =$Pluf_Jms_Job;
        try {
            $schema = new Schema([
                'query' => $rootType
            ]);
            $result = GraphQL::executeQuery($schema, $query, $rootValue);
            return $result->toArray();
        } catch (Exception $e) {
            throw new Pluf_Exception_BadRequest($e->getMessage());
        }
    }
}
