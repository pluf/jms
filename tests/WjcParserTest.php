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
namespace Pluf\Jms\Tests;

use Pluf\Test\TestCase;
use Pluf\Jms\Pipeline;
use Pluf\Jms\Job;
use Pluf\Jms\WjcParser;
use Pluf\Jms\Attachment;
use Pluf\Jms\Attribute;
use Pluf\Jms\JobLogger;

use Pluf;
use Pluf_Exception;
use Pluf_HTTP_Request;
use Pluf_Migration;
use Pluf_Tenant;
use User_Account;
use User_Credential;
use User_Role;

/**
 *
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class WjcParserRestTest extends TestCase
{

    /**
     *
     * @beforeClass
     */
    public static function installApps()
    {
        Pluf::start(__DIR__ . '/conf/config.php');
        $m = new Pluf_Migration();
        $m->install();
        $m->init();

        // Test user
        $user = new User_Account();
        $user->login = 'test';
        $user->is_active = true;
        if (true !== $user->create()) {
            throw new Pluf_Exception();
        }
        // Credential of user
        $credit = new User_Credential();
        $credit->setFromFormData(array(
            'account_id' => $user->id
        ));
        $credit->setPassword('test');
        if (true !== $credit->create()) {
            throw new Pluf_Exception();
        }

        $per = User_Role::getFromString('tenant.owner');
        $user->setAssoc($per);
    }

    /**
     *
     * @afterClass
     */
    public static function uninstallApps()
    {
        $m = new Pluf_Migration(Pluf::f('installed_apps'));
        $m->unInstall();
    }

    /**
     *
     * @test
     */
    public function writeTheSimplestJob()
    {
        $pipeline = new Pipeline();
        $pipeline->name = 'Name';
        $pipeline->create();

        $job = new Job();
        $job->pipeline_id = $pipeline;
        $job->name = 'name';
        $job->description = '';
        $job->priority = 10;
        $job->image = 'opensuse';
        $job->when = 'On faile';
        $job->file_path = __DIR__ . '/data/script.txt';
        $job->create();

        for ($i = 0; $i < 3; $i ++) {
            $attachment = new Attachment();
            $attachment->url = '';
            $attachment->job_id = $job;
            $attachment->create();
        }

        for ($i = 0; $i < 3; $i ++) {
            $attr = new Attribute();
            $attr->name = 'name.' . $i;
            $attr->value = $i . '-value';
            $attr->job_id = $job;
            $attr->create();
        }

        for ($i = 0; $i < 3; $i ++) {
            $logger = new JobLogger();
            $logger->url = 'url.' . $i;
            $logger->period = 'period.' . $i;
            $logger->template = $i . '-template';
            $logger->job_id = $job;
            $logger->create();
        }

        $str = WjcParser::write($job);
        echo $str;
        $this->assertNotNull($str);
    }
}
