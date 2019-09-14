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


class Pipeline extends \Pluf_Model {

// @Entity
// @Table(name = "jms_pipelines")
//     /**
//      *
//      */
//     @JsonIgnore
//     @XmlTransient
//     private static final long serialVersionUID = WebpichCoreVersion.SERIAL_VERSION_UID;

//     public static final String STATUS_NEW = "new";
//     public static final String STATUS_WAIT = "ready";
//     public static final String STATUS_IN_PROGRESS = "in-progress";
//     public static final String STATUS_STOPPED = "stopped";
//     public static final String STATUS_ERROR = "error";
//     public static final String STATUS_COMPLETE = "done";

//     @MaxLength(256)
//     @Column(name = "title")
//     @JsonProperty(value = "title", //
// 	    access = Access.READ_WRITE, //
// 	    defaultValue = "title", //
// 	    required = false, //
// 	    index = 0)
//     @JsonPropertyDescription("Pipeline title")
//     @JsonPropertyTitle("title")
//     @GraphQLField
//     @GraphQLName("title")
//     private String title;

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

//     @MaxLength(64)
//     @Column(name = "status", //
// 	    nullable = false)
//     @JsonProperty(value = "status", //
// 	    access = Access.READ_WRITE, //
// 	    defaultValue = "init", //
// 	    required = true, //
// 	    index = 0)
//     @JsonPropertyDescription("Pipeline state")
//     @JsonPropertyTitle("Status")
//     @GraphQLField
//     @GraphQLName("status")
//     private String status = "init";

//     @JsonIgnore
//     @ManyToMany(fetch = FetchType.LAZY, //
// 	    cascade = { CascadeType.ALL })
//     @JoinTable(name = "jms_pipeline_label_assoc", //
// 	    joinColumns = @JoinColumn(name = "pipeline_id"), //
// 	    inverseJoinColumns = @JoinColumn(name = "label_id"))
//     @GraphQLField
//     @GraphQLName("labels")
//     private Set<Label> labels = new HashSet<>();

//     @JsonIgnore
//     @OneToMany(fetch = FetchType.LAZY, //
// 	    cascade = CascadeType.ALL, //
// 	    mappedBy = "pipeline")
//     @GraphQLField
//     @GraphQLName("jobs")
//     private Set<Job> jobs = new HashSet<>();

}
