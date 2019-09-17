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

class Job extends \Pluf_Model
{

    /**
     * Initialize the data model
     *
     * @see Pluf_Model::init()
     */
    function init()
    {
        $this->_a['table'] = 'jms_jobs';
        $this->_a['cols'] = array(
            // Identifier
            'id' => array(
                'type' => 'Pluf_DB_Field_Sequence',
                'is_null' => false,
                'editable' => false
            ),
            // Fields
            'name' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'is_null' => true,
                'size' => 64,
                'editable' => true
            ),
            'description' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'is_null' => true,
                'size' => 2048,
                'editable' => true
            ),
            'priority' => array(
                'type' => 'Pluf_DB_Field_Integer',
                'is_null' => false,
                'default' => 0,
                'editable' => true
            ),
            'status' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'is_null' => false,
                'size' => 64,
                'default' => 'init',
                'editable' => true
            ),
            'image' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'is_null' => true,
                'size' => 256,
                'editable' => true
            ),
            'when' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'is_null' => true,
                'size' => 64,
                'default' => 'on_success',
                'editable' => true
            ),
            // File
            'mime_type' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'is_null' => true,
                'size' => 64,
                'default' => 'application/octet-stream',
                'editable' => true
            ),
            'file_name' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'is_null' => false,
                'size' => 254,
                'default' => 'unknown',
                'verbose' => 'file name',
                'help_text' => 'Content file name',
                'editable' => true
            ),
            'file_path' => array(
                'type' => 'Pluf_DB_Field_File',
                'is_null' => false,
                'size' => 1024,
                'verbose' => 'File path',
                'help_text' => 'Content file path',
                'editable' => false,
                'readable' => false
            ),
            'file_size' => array(
                'type' => 'Pluf_DB_Field_Integer',
                'is_null' => false,
                'default' => 'no title',
                'verbose' => 'file size',
                'help_text' => 'content file size',
                'editable' => false
            ),
            'modif_dtime' => array(
                'type' => 'Pluf_DB_Field_Datetime',
                'blank' => true,
                'verbose' => 'creation',
                'help_text' => 'content modification time',
                'editable' => false
            ),
            // relations
            'job_id' => array(
                'type' => 'Pluf_DB_Field_Foreignkey',
                'model' => 'Pluf\Jms\Job',
                'is_null' => false,
                'name' => 'job',
                'relate_name' => 'attachments',
                'graphql_name' => 'job',
                'editable' => true
            )
        );
        $this->_a['idx'] = array();
    }
}
