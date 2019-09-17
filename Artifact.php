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

class Artifact extends \Pluf_Model
{

    /**
     * Initialize the data model
     *
     * @see Pluf_Model::init()
     */
    function init()
    {
        $this->_a['table'] = 'jms_artifacts';
        $this->_a['cols'] = array(
            // Identifier
            'id' => array(
                'type' => 'Pluf_DB_Field_Sequence',
                'is_null' => false,
                'editable' => false
            ),
            // Model
            'path' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'is_null' => false,
                'default' => '/',
                'size' => 1024,
                'editable' => true,
                'help' => "Path of artifacts in working directory"
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
                'relate_name' => 'artifacts',
                'graphql_name' => 'job',
                'editable' => true
            )
        );
        $this->_a['idx'] = array();
    }

    /**
     * Loads basic informations of the artifact
     *
     * @param boolean $create
     *            the state of the workFs
     */
    function preSave($create = false)
    {
        $this->modif_dtime = gmdate('Y-m-d H:i:s');
        $path = $this->getAbsloutPath();
        // file size
        if (file_exists($path)) {
            $this->file_size = filesize($path);
        } else {
            $this->file_size = 0;
        }
        // mime type (based on file name)
        $mime_type = $this->mime_type;
        if (! isset($mime_type) || $mime_type === 'application/octet-stream') {
            $fileInfo = Pluf_FileUtil::getMimeType($this->file_name);
            $this->mime_type = $fileInfo[0];
        }
    }

    /**
     * Delete file content
     */
    function preDelete()
    {
        // remove related file
        $filename = $this->getAbsloutPath();
        if (is_file($filename)) {
            unlink($filename);
        }
    }

    /**
     * مسیر کامل محتوی را تعیین می‌کند.
     * این مسیر حاوی اسم فایل هم هست.
     *
     * @return string
     */
    public function getAbsloutPath()
    {
        return $this->file_path;
    }
}
