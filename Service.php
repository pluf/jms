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

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use Pluf_Exception;

/**
 * General view of Jms
 *
 * @author maso
 *
 */
class Service
{

    public const QUEUE_JOBS_NAME = "wp-jms-jobs-queue";

    public const EXCHANGE_JOBS_NAME = "wp-jms-jobs";

    public const QUEUE_COMMANDS_NAME = "wp-jms-commands-queue";

    public const EXCHANGE_COMMANDS_NAME = "wp-jms-commands";

    public const QUEUE_EVENTS_NAME = "wp-jms-events-queue";

    public const EXCHANGE_EVENTS_NAME = "wp-jms-events";

    /**
     * Push the $job ito the Job Queu
     *
     * @param unknown $job
     */
    public static function pushToQueue($job): void
    {
        $rabbitmqHost = 'rabbitmq';
        $rabbitmqPort = 5672;
        $rabbitmqUser = 'gazmeh';
        $rabbitmqPass = 'gazmeh';
        $rabbitmqVhost = 'gazmeh';

        $connection = new AMQPStreamConnection($rabbitmqHost, $rabbitmqPort, $rabbitmqUser, $rabbitmqPass, $rabbitmqVhost);
        $channel = $connection->channel();

        try {
            $msg = new AMQPMessage(WjcParser::write($job));
            $channel->basic_publish($msg, self::EXCHANGE_JOBS_NAME, self::getRouteK($job));
        } catch (Exception $ex) {
            throw new Pluf_Exception('Fail to send the job into the que', 50048, $ex);
        }
        $channel->close();
        $connection->close();
    }

    public static function getRouteK(Job $job): string
    {
        $routeKey = $job->name;
        if (isset($routeKey)) {
            $routeKey = sprintf("jms.%d.%d", $job->pipeline_id, $job->id);
        }
        return $routeKey;
    }
}
