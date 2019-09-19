<?php
namespace Pluf\Jms;

class JobUtils
{

    public static function setContent($job, $body)
    {
        $dest = $job->getAbsloutPath();
        $fp = fopen($dest, 'w');
        fwrite($fp, $body);
        fclose($fp);
    }
}