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
use Pluf;
use Pluf\Exception;
use Pluf_HTTP_Request;
use Pluf_Migration;
use Pluf_Tenant;
use User_Account;
use User_Credential;
use User_Role;
use Pluf\Test\Client;

class JobLogggerRestTest extends TestCase
{

    /**
     *
     * @beforeClass
     */
    public static function installApps()
    {
        $cfg = include __DIR__ . '/conf/config.php';
        $cfg['multitenant'] = false;
        Pluf::start($cfg);
        $m = new Pluf_Migration(Pluf::f('installed_apps'));
        $m->install();

        // Test tenant
        $tenant = new Pluf_Tenant();
        $tenant->domain = 'localhost';
        $tenant->subdomain = 'www';
        $tenant->validate = true;
        if (true !== $tenant->create()) {
            throw new \Pluf\Exception('Faile to create new tenant');
        }

        $m->init($tenant);

        if (! isset($GLOBALS['_PX_request'])) {
            $GLOBALS['_PX_request'] = new Pluf_HTTP_Request('/');
        }
        $GLOBALS['_PX_request']->tenant = $tenant;

        // Test user
        $user = new User_Account();
        $user->login = 'test';
        $user->is_active = true;
        if (true !== $user->create()) {
            throw new \Pluf\Exception();
        }
        // Credential of user
        $credit = new User_Credential();
        $credit->setFromFormData(array(
            'account_id' => $user->id
        ));
        $credit->setPassword('test');
        if (true !== $credit->create()) {
            throw new \Pluf\Exception();
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
    public function gettingModelSchema()
    {
        // we have to init client for eny test
        $client = new Client();
        $client->clean();

        // login
        $response = $client->get('/jms/job-loggers/schema');
        $this->assertResponseNotNull($response, 'Find result is empty');
        $this->assertResponseStatusCode($response, 200, 'Find status code is not 200');
    }

    /**
     *
     * @test
     */
    public function gettingListOfAllArtifacts()
    {
        // we have to init client for eny test
        $client = new Client();
        $client->clean();

        // 1- Login
        $response = $client->post('/user/login', array(
            'login' => 'test',
            'password' => 'test'
        ));
        $this->assertResponseStatusCode($response, 200, 'Fail to login');

        $response = $client->get('/jms/job-loggers');
        $this->assertResponseNotNull($response, 'Find result is empty');
        $this->assertResponseStatusCode($response, 200, 'Find status code is not 200');
        $this->assertResponsePaginateList($response, 'Find result is not JSON paginated list');
    }

    /**
     *
     * @test
     */
    public function gettingNonEmptyArtifacts()
    {
        // we have to init client for eny test
        $client = new Client();
        $client->clean();

        $pipeline = new Pluf\Jms\Pipeline();
        $pipeline->title = 'New tilte';
        $pipeline->create();

        $job = new Pluf\Jms\Job();
        $job->pipeline_id = $pipeline;
        $job->create();

        $logger = new Pluf\Jms\JobLogger();
        $logger->template = '{test} name is {id}';
        $logger->job_id = $job;
        $logger->create();

        // 1- Login
        $response = $client->post('/user/login', array(
            'login' => 'test',
            'password' => 'test'
        ));
        $this->assertResponseStatusCode($response, 200, 'Fail to login');

        $response = $client->get('/jms/job-loggers');
        $this->assertResponseNotNull($response, 'Find result is empty');
        $this->assertResponseStatusCode($response, 200, 'Find status code is not 200');
        $this->assertResponsePaginateList($response, 'Find result is not JSON paginated list');
    }
}
