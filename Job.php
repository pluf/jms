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

class Job extends ModelBinary {

// // @Entity
// // @Table(name = "jms_jobs")

//     @MaxLength(64)
//     @Column(name = "name", //
// 	    nullable = false)
//     @JsonProperty(value = "name", //
// 	    access = Access.READ_WRITE, //
// 	    defaultValue = "job", //
// 	    required = true, //
// 	    index = 0)
//     @JsonPropertyDescription("Job name")
//     @JsonPropertyTitle("Name")
//     @GraphQLField
//     @GraphQLName("name")
//     private String name;

//     @MaxLength(2048)
//     @Column(name = "description")
//     @JsonProperty(value = "description", //
// 	    access = Access.READ_WRITE, //
// 	    defaultValue = "description", //
// 	    required = false, //
// 	    index = 0)
//     @JsonPropertyDescription("Job description")
//     @JsonPropertyTitle("description")
//     @GraphQLField
//     @GraphQLName("description")
//     private String description;

//     @Column(name = "priority")
//     @JsonProperty(value = "priority", //
// 	    access = Access.READ_WRITE, //
// 	    defaultValue = "0", //
// 	    required = false, //
// 	    index = 0)
//     @JsonPropertyDescription("Job priority")
//     @JsonPropertyTitle("priority")
//     @GraphQLField
//     @GraphQLName("priority")
//     private int priority;

//     @MaxLength(64)
//     @Column(name = "status", //
// 	    nullable = false)
//     @JsonProperty(value = "status", //
// 	    access = Access.READ_WRITE, //
// 	    defaultValue = STATUS_INIT, //
// 	    required = true, //
// 	    index = 0)
//     @JsonPropertyDescription("Job state")
//     @JsonPropertyTitle("Status")
//     @GraphQLField
//     @GraphQLName("status")
//     private String status = STATUS_INIT;

//     @MaxLength(64)
//     @Column(name = "image", //
// 	    nullable = false)
//     @JsonProperty(value = "image", //
// 	    access = Access.READ_WRITE, //
// 	    defaultValue = "opensuse", //
// 	    required = true, //
// 	    index = 0)
//     @JsonPropertyDescription("Job base image")
//     @JsonPropertyTitle("Image")
//     @GraphQLField
//     @GraphQLName("image")
//     private String image;

//     /**
//      *
//      * Here is list of possible
//      * <ul>
//      * <li>on_success - execute job only when all jobs from prior stages succeed.
//      * This is the default.</li>
//      * <li>on_failure - execute job only when at least one job from prior stages
//      * fails.</li>
//      * <li>always - execute job regardless of the status of jobs from prior
//      * stages.</li>
//      * <li>manual - execute job manually (added in GitLab 8.10). Read about manual
//      * actions below.</li>
//      * </ul>
//      */
//     @MaxLength(64)
//     @Column(name = "when", //
// 	    nullable = false)
//     @JsonProperty(value = "when", //
// 	    access = Access.READ_WRITE, //
// 	    defaultValue = "on_success", //
// 	    required = true, //
// 	    index = 0)
//     @JsonPropertyDescription("Job when")
//     @JsonPropertyTitle("when")
//     @GraphQLField
//     @GraphQLName("when")
//     private String when = "on_success";

//     @ManyToOne(fetch = FetchType.LAZY)
//     @JoinColumn(name = "pipeline_id", //
// 	    updatable = false, //
// 	    insertable = false, //
// 	    nullable = false)
//     @JsonIgnore
//     @GraphQLField
//     @GraphQLName("pipeline")
//     private Pipeline pipeline;

//     @Column(name = "pipeline_id", //
// 	    nullable = false)
//     @JsonProperty(value = "pipeline_id", //
// 	    defaultValue = "", //
// 	    access = Access.READ_WRITE, //
// 	    required = true)
//     @JsonPropertyDescription("pipeline id")
//     @GraphQLField
//     @GraphQLName("pipeline_id")
//     private Long pipelineId;

//     @JsonIgnore
//     @OneToOne(mappedBy = "job", //
// 	    cascade = CascadeType.ALL, //
// 	    fetch = FetchType.LAZY, //
// 	    optional = true)
//     @GraphQLField
//     @GraphQLName("log")
//     private Log log;

//     @JsonIgnore
//     @OneToMany(fetch = FetchType.LAZY, //
// 	    cascade = { CascadeType.ALL }, //
// 	    mappedBy = "job")
//     @GraphQLField
//     @GraphQLName("artifacts")
//     private Set<Artifact> artifacts = new HashSet<>();

//     @JsonIgnore
//     @OneToMany(fetch = FetchType.LAZY, //
// 	    cascade = { CascadeType.ALL }, //
// 	    mappedBy = "job")
//     @GraphQLField
//     @GraphQLName("attachments")
//     private Set<Attachment> attachments = new HashSet<>();

//     @JsonIgnore
//     @ManyToMany(fetch = FetchType.LAZY, //
// 	    cascade = { CascadeType.ALL })
//     @JoinTable(name = "jms_job_prerequisite_assoc", //
// 	    joinColumns = @JoinColumn(name = "job_id"), //
// 	    inverseJoinColumns = @JoinColumn(name = "prerequisite_id"))
//     @GraphQLField
//     @GraphQLName("prerequisites")
//     private Set<Job> prerequisites = new HashSet<>();

//     @JsonIgnore
//     @ManyToMany(mappedBy = "prerequisites")
//     @GraphQLField
//     @GraphQLName("prerequisite_of")
//     private Set<Job> prerequisitesOf = new HashSet<>();

//     @JsonIgnore
//     @ManyToMany(fetch = FetchType.LAZY, //
// 	    cascade = { CascadeType.ALL })
//     @JoinTable(name = "jms_job_label_assoc", //
// 	    joinColumns = @JoinColumn(name = "job_id"), //
// 	    inverseJoinColumns = @JoinColumn(name = "label_id"))
//     @GraphQLField
//     @GraphQLName("labels")
//     private Set<Label> labels = new HashSet<>();

//     @JsonIgnore
//     @OneToMany(mappedBy = "job", //
// 	    fetch = FetchType.LAZY)
//     @GraphQLField
//     @GraphQLName("attributes")
//     private Set<Attribute> attributes = new HashSet<>();

//     @JsonIgnore
//     @OneToMany(mappedBy = "job", //
// 	    fetch = FetchType.LAZY)
//     @GraphQLField
//     @GraphQLName("loggers")
//     private Set<JobLogger> loggers = new HashSet<>();

}
