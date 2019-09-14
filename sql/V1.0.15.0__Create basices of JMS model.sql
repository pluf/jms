/**************************************************************
 * JOB MANAGEMENT SYSTEM
 * 
 **************************************************************/
/*
 * Job artifact
 */
CREATE TABLE `jms_artifacts` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`path` varchar(255),
	`mime_type` varchar(255),
	`file_name` varchar(255),
	`file_path` varchar(255),
	`file_size` bigint,
	`modif_dtime` datetime,
	`job_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*
 * Job attachment
 */
CREATE TABLE `jms_attachments` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`extract` tinyint(1) NOT NULL DEFAULT 0,
	`mime_type` varchar(255),
	`file_name` varchar(255),
	`file_path` varchar(255),
	`file_size` bigint,
	`modif_dtime` datetime,
	`job_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*
 * Job attribute
 */
CREATE TABLE `jms_attributes` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`name` varchar(64) NOT NULL,
	`value` varchar(2048),
	`job_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*
 * Job
 * 
 *  This is main part of a job system. Each job store in the DB and
 * track by the system.
 */
CREATE TABLE `jms_jobs` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`name` varchar(64) NOT NULL DEFAULT 'job',
	`description` varchar(2048) NOT NULL,
	`priority` int NOT NULL DEFAULT 0,
	`status` varchar(64) NOT NULL DEFAULT 'init',
	`image` varchar(256),
	`when` varchar(64) NOT NULL DEFAULT 'on_success',
	`mime_type` varchar(255),
	`file_name` varchar(255),
	`file_path` varchar(255),
	`file_size` bigint,
	`modif_dtime` datetime,
	`pipeline_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `jms_jobs_jms_labels_assoc` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`job_id` bigint NOT NULL,
	`label_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `jms_jobs_jms_prerequisites_assoc` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`job_id` bigint NOT NULL,
	`prerequisite_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `jms_labels` (
    `id` bigint NOT NULL AUTO_INCREMENT,
	`name` varchar(64) NOT NULL DEFAULT 'name',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `jms_logs` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`mime_type` varchar(255),
	`file_name` varchar(255),
	`file_path` varchar(255),
	`file_size` bigint,
	`modif_dtime` datetime,
	`job_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `jms_pipelines` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`title` varchar (256) DEFAULT 'pipeline',
	`description` varchar (2048),
	`status` varchar (64) NOT NULL DEFAULT 'init',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `jms_labels_jms_pipelines_assoc` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`pipeline_id` bigint NOT NULL,
	`label_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `jms_workers` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`title` varchar (256) DEFAULT 'worker',
	`description` varchar (2048),
	`token` varchar (2048),
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*************************************************
 * Job management system
 * 
 * Author: Mohammad Hadi Mansouri
 * Author: Mostafa Barmshory
 * Date  :
 *************************************************/
CREATE TABLE `jms_loggers` (
    `id` bigint NOT NULL AUTO_INCREMENT,
    `url` varchar(1024),
    `period` varchar(256),
    `template` varchar(1024),
	`job_id` bigint NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `jms_loggers` 
   ADD CONSTRAINT `fk__jms_job__rJ8C4h` 
   FOREIGN KEY (`job_id`) 
   REFERENCES `jms_jobs` (`id`);

#
# Table: jms_attributes
#
ALTER TABLE `jms_attributes` 
   ADD CONSTRAINT `fk__jms_job__r03f4h` 
   FOREIGN KEY (`job_id`) 
   REFERENCES `jms_jobs` (`id`);

#
# Table: jms_attachments
#
ALTER TABLE `jms_attachments` 
   ADD CONSTRAINT `fk__jms_job__u93f4h` 
   FOREIGN KEY (`job_id`) 
   REFERENCES `jms_jobs` (`id`);


