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
namespace Pluf\Backup\Tests;

require_once 'Pluf.php';

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\IncompleteTestError;
use Pluf;
use Pluf_Tenant;
use Pluf_Migration;
use Test_Client;
use Test_Assert;
use User_Role;
use User_Account;
use User_Credential;
use CMS_Content;
use CMS_Term;
use CMS_TermTaxonomy;

/**
 *
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class RestTest extends TestCase
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
            throw new Pluf_Exception('Faile to create new tenant');
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
            throw new Exception();
        }
        // Credential of user
        $credit = new User_Credential();
        $credit->setFromFormData(array(
            'account_id' => $user->id
        ));
        $credit->setPassword('test');
        if (true !== $credit->create()) {
            throw new Exception();
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
    public function gettingSnapshotSchema()
    {
        // we have to init client for eny test
        $client = new Test_Client(array(
            array(
                'app' => 'Backup',
                'regex' => '#^/backup#',
                'base' => '',
                'sub' => Pluf\Backup\Module::urls
            ),
            array(
                'app' => 'User',
                'regex' => '#^/user#',
                'base' => '',
                'sub' => include 'User/urls-v2.php'
            )
        ));
        $client->clean();

        // login
        $response = $client->get('/backup/snapshots/schema');
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);
    }

    /**
     *
     * @test
     */
    public function loadTemplate()
    {
        // we have to init client for eny test
        $client = new Test_Client(array(
            array(
                'app' => 'Backup',
                'regex' => '#^/backup#',
                'base' => '',
                'sub' => Pluf\Backup\Module::urls
            ),
            array(
                'app' => 'User',
                'regex' => '#^/user#',
                'base' => '',
                'sub' => include 'User/urls-v2.php'
            )
        ));
        $client->clean();

        // login
        $response = $client->post('/user/login', array(
            'login' => 'test',
            'password' => 'test'
        ));
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);

        // create snapshot
        $response = $client->post('/backup/snapshots', array(
            'title' => 'test',
            'description' => 'test'
        ));
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);
    }

    /**
     *
     * @test
     */
    public function dowloadTheSnapshot()
    {
        // we have to init client for eny test
        $client = new Test_Client(array(
            array(
                'app' => 'Backup',
                'regex' => '#^/backup#',
                'base' => '',
                'sub' => Pluf\Backup\Module::urls
            ),
            array(
                'app' => 'User',
                'regex' => '#^/user#',
                'base' => '',
                'sub' => include 'User/urls-v2.php'
            )
        ));
        $client->clean();

        // login
        $response = $client->post('/user/login', array(
            'login' => 'test',
            'password' => 'test'
        ));
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);

        // create snapshot
        $response = $client->post('/backup/snapshots', array(
            'title' => 'test',
            'description' => 'test'
        ));
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);

        $actual = json_decode($response->content, true);

        // download snapshot
        $response = $client->get('/backup/snapshots/' . $actual['id'] . '/content');
        $this->assertNotNull($response);
        $this->assertEquals($response->status_code, 200);
    }
}
