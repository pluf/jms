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

use Pluf_Model;

class Pipeline extends Pluf_Model
{

    /**
     * Initialize the data model
     *
     * @see \Pluf_Model::init()
     */
    function init()
    {
        $this->_a['table'] = 'jms_pipelines';
        $this->_a['cols'] = array(
            // Identifier
            'id' => array(
                'type' => 'Pluf_DB_Field_Sequence',
                'is_null' => false,
                'editable' => false
            ),
            // Fields
            'title' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'is_null' => true,
                'size' => 256,
                'unique' => false,
                'editable' => true
            ),
            'description' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'is_null' => true,
                'size' => 2048,
                'unique' => false,
                'editable' => true
            ),
            'status' => array(
                'type' => 'Pluf_DB_Field_Varchar',
                'is_null' => false,
                'size' => 64,
                'default' => PipelineState::init,
                'unique' => false,
                'editable' => true
            ),
            // Relations
            'labels' => array(
                'type' => 'Pluf_DB_Field_Manytomany',
                'model' => '\Pluf\Jms\Label',
                'is_null' => true,
                'editable' => false,
                'name' => 'labels',
                'graphql_name' => 'labels',
                'relate_name' => 'pipelines'
            )
        );
        $this->_a['idx'] = array();
    }

    public function run()
    {
        /*
         * Runs the pipeline if it is in ready state
         */
        if (! $this->canStart()) {
            throw new \Pluf_Exception('Pipeline is not in stat to run');
        }
        $this->status = PipelineState::inProgress;
        $this->update();
        $this->runNextLevelOfJobs();
    }

    /**
     * Run jobs if eny exist
     */
    public function runNextLevelOfJobs()
    {
        /*
         * Runs ready jobs of the pipeline
         */
        $jobs = $this->get_jobs_list();
        $anyJobFail = false;

        // Getting list of waited job
        $jobsToRun = array();
        $anyJobFail = false;
        $anyJobRun = false;
        foreach ($jobs as $job) {
            switch($job->status) {
                case JobState::wait:
                    $jobsToRun[] = $job;
                case JobState::init:
                case JobState::inProgress:
                case JobState::stopped:
                    $anyJobRun = true;
                    break;
                case JobState::error:
                    $anyJobFail = true;
                    break;
                case JobState::complete:
                    break;
            }
        }
        /*
         * TODO: Create dependency graph and runs first level
         */

        // Run jobs
        foreach ($jobsToRun as $job) {
            // READ from configs
            try {
                Service::pushToQueue($job);
                $job->status = JobState::inProgress;
            } catch (Exception $ex) {
                $job->status = JobState::error;
                continue;
            }
            $job->update();
        }

        // check any job fail
        if(!$anyJobRun){
            $this->status = $anyJobFail ? PipelineState::error : PipelineState::complete;
            $this->update();
        }
    }

    /**
     * Checks if it is possible to run the pipeline
     *
     * @return boolean
     */
    public function canStart(): bool
    {
        return $this->status === PipelineState::wait;
    }
}
