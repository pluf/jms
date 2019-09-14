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
class ServiceTest extends TestCase
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
    public function createBackupTest()
    {
        // we have to init client for eny test
        $client = new Test_Client(array());
        $client->clean();

        $name = 'test-content-' . rand();

        $c = new CMS_Content();
        $c->file_path = Pluf_Tenant::storagePath() . '/test.txt';
        $c->mime_time = 'text/plain';
        $c->name = $name;
        $c->create();

        $term = new CMS_Term();
        $term->name = "my term";
        $term->create();

        $termtaxo = new CMS_TermTaxonomy();
        $termtaxo->term_id = $term;
        $termtaxo->taxonomy = "test";
        $termtaxo->create();

        $termtaxo->setAssoc($c);

        // create file
        $myfile = fopen($c->file_path, "w") or die("Unable to open file!");
        $txt = "John Doe\n";
        fwrite($myfile, $txt);
        $txt = "Jane Doe\n";
        fwrite($myfile, $txt);
        fclose($myfile);

        $zipFilePath = __DIR__ . '/tmp/backupfile' . rand() . '.zip';
        Pluf\Backup\Service::storeData($zipFilePath);
        Test_Assert::assertTrue(file_exists($zipFilePath), 'Backup file is not created');

        $termtaxo->delete();
        $term->delete();
        $c->delete();

        Pluf\Backup\Service::loadData($zipFilePath);

        Pluf::loadFunction('CMS_Shortcuts_GetNamedContentOr404');
        $c = CMS_Shortcuts_GetNamedContentOr404($name);
        Test_Assert::assertFalse($c->isAnonymous());
        $list = $c->get_term_taxonomies_list();

        $zipFilePath2 = __DIR__ . '/tmp/backupfile2-' . rand() . '.zip';
        Pluf\Backup\Service::storeData($zipFilePath2);
        Test_Assert::assertTrue(file_exists($zipFilePath2), 'Backup file is not created');
    }

    /**
     *
     * @test
     */
    public function loadTemplate()
    {
        // we have to init client for eny test
        $client = new Test_Client(array());
        $client->clean();

        Pluf\Backup\Service::loadData(__DIR__ . '/template-001.zip');

        $zipFilePath2 = __DIR__ . '/tmp/templateback-' . rand() . '.zip';
        Pluf\Backup\Service::storeData($zipFilePath2);
        Test_Assert::assertTrue(file_exists($zipFilePath2), 'Backup file is not created');
    }
}
