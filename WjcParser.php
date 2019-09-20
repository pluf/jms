<?php
namespace Pluf\Jms;

use Symfony\Component\Yaml\Yaml;
use Pluf_Graphql;

class WjcParser
{

    public static function write(Job $job): string
    {
        $graphql = new Pluf_Graphql();
        $data = $graphql->render($job, '{id,name,description,priority,image,when, loggers{id,url,period,template}}');
        $data['id'] = $job->id;

        // TODO: read from config
        $resourceHost = 'http://worker-resources';

        // attahcments
        $attachments = $job->get_attachments_list();
        $data['attachments'] = array();
        foreach ($attachments as $attachment){
            $data['attachments'][] = array(
                'id' => $attachment->id,
                'name' => $attachment->file_name,
                'extract' => $attachment->extract,
                'url' => $resourceHost.'/api/v2/jms/attachments/'.$attachment->id.'/content'
            );
        }

        // attributs
        $atributes = $job->get_attributes_list();
        $data['variables'] = array();
        foreach ($atributes as $atr){
            $data['variables'][$atr->name] = $atr->value;
        }

        // scrits
        $data['script'] = array();
        $fn = fopen($job->getAbsloutPath(),"r");
        while(! feof($fn))  {
            $val  = fgets($fn);
            if(!$val){
                continue;
            }
            $data['script'][] = trim($val);
        }


        $code = Yaml::dump($data, 2);
        return $code;
    }
}

