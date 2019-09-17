/*************************************************
 * Job management system
 * 
 * Author: Mohammad Hadi Mansouri
 * Author: Mostafa Barmshory
 * Date  :
 *************************************************/
/*
 * Job artifact
 */
CREATE TABLE `jms_artifacts` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	/* Model */
	`path` varchar(1024),
	/* File model */
	`mime_type` varchar(64),
	`file_name` varchar(254),
	`file_path` varchar(1024),
	`file_size` bigint,
	`modif_dtime` datetime,
	/* Relation */
	`job_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*
 * Job attachment
 */
CREATE TABLE `jms_attachments` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	/* Model */
	`extract` tinyint(1) NOT NULL DEFAULT 0,
	/* File model */
	`mime_type` varchar(64),
	`file_name` varchar(254),
	`file_path` varchar(1024),
	`file_size` bigint,
	`modif_dtime` datetime,
	/* Relation */
	`job_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*
 * Job attribute
 */
CREATE TABLE `jms_attributes` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	/* Model */
	`name` varchar(64) NOT NULL,
	`value` varchar(2048),
	/* Relation */
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
	/* Model */
	`name` varchar(64) NOT NULL DEFAULT 'job',
	`description` varchar(2048) NOT NULL,
	`priority` int NOT NULL DEFAULT 0,
	`status` varchar(64) NOT NULL DEFAULT 'init',
	`image` varchar(256),
	`when` varchar(64) NOT NULL DEFAULT 'on_success',
	/* File model */
	`mime_type` varchar(64),
	`file_name` varchar(254),
	`file_path` varchar(1024),
	`file_size` bigint,
	`modif_dtime` datetime,
	/* Relation */
	`pipeline_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `jms_job_loggers` (
    `id` bigint NOT NULL AUTO_INCREMENT,
    /* Model */
    `url` varchar(1024),
    `period` varchar(256),
    `template` varchar(1024),
	/* Relation */
	`job_id` bigint NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*
 * Job labels
 * 
 * Labels are used to categorized jobs. For example a killed job will be labed as KILLED.
 */
CREATE TABLE `jms_labels` (
    `id` bigint NOT NULL AUTO_INCREMENT,
	/* Model */
	`name` varchar(64) NOT NULL DEFAULT 'name',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `jms_logs` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	/* Model */
	/* File model */
	`mime_type` varchar(255),
	`file_name` varchar(255),
	`file_path` varchar(255),
	`file_size` bigint,
	`modif_dtime` datetime,
	/* Relation */
	`job_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `jms_pipelines` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	/* Model */
	`title` varchar (256) DEFAULT 'pipeline',
	`description` varchar (2048),
	`status` varchar (64) NOT NULL DEFAULT 'init',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `jms_workers` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	/* Model */
	`title` varchar (256) DEFAULT 'worker',
	`description` varchar (2048),
	`token` varchar (2048),
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


/*=====================Relations=========================*/

CREATE TABLE `jms_labels_jms_pipelines_assoc` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`pipeline_id` bigint NOT NULL,
	`label_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `jms_jobs_jms_labels_assoc` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`job_id` bigint NOT NULL,
	`label_id` bigint NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `jms_jobs_jms_jobs_assoc` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`job_id` bigint NOT NULL,
	`prerequisite_id` bigint NOT NULL,
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


