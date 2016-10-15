<?php
	print "use db/db-init.php<br>";
	
	include('db-link.php');
	
	function dbinit_database($host, $super_user, $super_user_password, $app_user, $app_user_password, $app_database)
	{
		$ret = false;
		$super_dblink = new dblink($host, $super_user, $super_user_password);
		
		$sql = "drop database if exists $app_database";
		$ret = $super_dblink->exec_sql($sql);
		if(!$ret)
		{
			print "[dbinit_database] drop database '$app_database' - fail<br>";
		}
		else
		{
			// create app database
			$sql = "create database if not exists $app_database";
			$ret = $super_dblink->exec_sql($sql);
		
			if($ret)
			{
				print "[dbinit_database] create database '$app_database' - ok<br>";
				// create app user
				$sql = "grant all privileges on $app_database.* to $app_user@$host identified by '$app_user_password'";
				$ret = $super_dblink->exec_sql($sql);
			
				if($ret)
				{
					print "[dbinit_database] create $app_user@$host - ok<br>";
					$ret = dbinit_tables($host, $app_user, $app_user_password, $app_database);
					if($ret)
					{
						print "[dbinit_database] create tables - ok<br>";
						$ret = dbinit_data($host, $app_user, $app_user_password, $app_database);
						if($ret)
						{
							print "[dbinit_database] insert data - ok<br>";
						}
						else
						{
							print "[dbinit_database] insert data - fail<br>";
						}
					}
					else
					{
						print "[dbinit_database] create tables - fail<br>";
					}
				}
				else
				{
					print "[dbinit_database] create $app_user@$host - fail<br>";
				}
			}
			else
			{
				print "[dbinit_database] create database '$app_database' - fail<br>";
			}
		}
		
		return $ret;
	}
	
	function dbinit_tables($host, $app_user, $app_user_password, $app_database)
	{
		$ret = false;
		
		$tables['admin_access'] = "create table if not exists `admin_access`(
			`aa_id` int(11) not null auto_increment, 
			`aa_username` varchar(255) not null, 
			`aa_password` varchar(255) not null, 
			primary key(`aa_id`)
			) 
			engine=myisam 
			default charset=utf8 
			auto_increment=2";
		
		$tables['cases'] = "create table if not exists `cases`(
			`c_id` int(11) not null auto_increment,
			`c_name` varchar(255) not null,
			`c_desc` text not null,
			`c_result` text not null,
			`c_status` tinyint(4) not null default '0',
			`c_global` tinyint(4) not null default '0',
			primary key(`c_id`)
			)
			engine=myisam 
			default charset=utf8
			auto_increment=1";

		$tables['comments'] = "create table if not exists `comments`(
			`c_id` int(11) not null auto_increment,
			`c_r_id` int(11) not null default '0',
			`c_u_id` int(11) not null default '0',
			`c_text` text not null,
			`c_date` datetime not null default '2016-01-01 00:00:00',
			`c_question` tinyint(4) not null default '0',
			primary key(`c_id`)
			)
			engine=myisam 
			default charset=utf8
			auto_increment=1";
		
		$tables['components'] = "create table if not exists `components`(
			`c_id` int(11) not null auto_increment,
			`c_name` varchar(255) not null,
			`c_global` tinyint(4) not null default '0',
			primary key(`c_id`)
			)
			engine=myisam 
			default charset=utf8
			auto_increment=1";
		
		$tables['export_fields'] = "create table if not exists `export_fields` (
			`ef_id` int(11) not null auto_increment,
			`ef_name` varchar(255) not null default '',
			`ef_uid` int(11) not null default '0',
			`ef_description` tinyint(4) not null default '0',
			`ef_project` tinyint(4) not null default '0',
			`ef_subproject` tinyint(4) not null default '0',
			`ef_release` tinyint(4) not null default '0',
			`ef_test_case` tinyint(4) not null default '0',
			`ef_stakeholder` tinyint(4) not null default '0',
			`ef_glossary` tinyint(4) not null default '0',
			`ef_state` tinyint(4) not null default '0',
			`ef_type` tinyint(4) not null default '0',
			`ef_priority` tinyint(4) not null default '0',
			`ef_assign_to` tinyint(4) not null default '0',
			`ef_rid` tinyint(4) not null default '0',
			`ef_version` tinyint(4) not null default '0',
			`ef_component` tinyint(4) not null default '0',
			`ef_source` tinyint(4) not null default '0',
			`ef_risk` tinyint(4) not null default '0',
			`ef_complexity` tinyint(4) not null default '0',
			`ef_weight` tinyint(4) not null default '0',
			`ef_open_points` tinyint(4) not null default '0',
			`ef_keywords` tinyint(4) not null default '0',
			`ef_satisfaction` tinyint(4) not null default '0',
			`ef_dissatisfaction` tinyint(4) not null default '0',
			`ef_depends` tinyint(4) not null default '0',
			`ef_conflicts` tinyint(4) not null default '0',
			`ef_author` tinyint(4) not null default '0',
			`ef_url` tinyint(4) not null default '0',
			`ef_parent` tinyint(4) not null default '0',
			`ef_position` tinyint(4) not null default '0',
			`ef_userfields` tinyint(4) not null default '0',
			`ef_creation_date` tinyint(4) not null default '0',
			`ef_last_change` tinyint(4) not null default '0',
			`ef_accepted_date` tinyint(4) not null default '0',
			`ef_accepted_user` tinyint(4) not null default '0',
			`ef_comments` tinyint(4) not null default '0',
			primary key  (`ef_id`)
			) 
			engine=myisam
			default charset=utf8
			auto_increment=1";
			
		$tables['glossary'] = "create table if not exists `glossary` (
			`g_id` int(11) not null auto_increment,
			`g_name` varchar(255) not null,
			`g_term` varchar(255) not null,
			`g_abbreviation` varchar(255) not null,
			`g_desc` text not null,
			`g_global` tinyint(4) not null default '0',
			primary key (`g_id`)
			)
			engine=myisam  default charset=utf8 auto_increment=1";

		$tables['keywords'] = "create table if not exists `keywords` (
			`k_id` int(11) not null auto_increment,
			`k_name` varchar(255) not null,
			`k_global` tinyint(4) not null default '0',
			primary key  (`k_id`)
			) engine=myisam  default charset=utf8 auto_increment=1";

		$tables['keywords'] = "create table if not exists `projects` (
			`p_id` int(11) not null auto_increment,
			`p_name` varchar(255) not null,
			`p_desc` text not null,
			`p_phase` tinyint(1) not null default '0',
			`p_status` tinyint(1) not null default '0',
			`p_leader` int(11) not null default '0',
			`p_date` date not null default '2016-01-01',
			`p_template` tinyint(1) not null default '0',
			`p_req_del` tinyint(4) not null default '1',
			primary key  (`p_id`)
			) engine=myisam  default charset=utf8 auto_increment=1";

		$tables['project_cases'] = "create table if not exists `project_cases` (
			`pc_id` int(11) not null auto_increment,
			`pc_p_id` int(11) not null default '0',
			`pc_c_id` int(11) not null default '0',
			primary key  (`pc_id`)
			) engine=myisam  default charset=utf8 auto_increment=1";

		$tables['project_components'] = "create table if not exists `project_components` (
			`pco_id` int(11) not null auto_increment,
			`pco_p_id` int(11) not null default '0',
			`pco_c_id` int(11) not null default '0',
			primary key  (`pco_id`)
			) engine=myisam default charset=utf8 auto_increment=1";

		$tables['project_glossary'] = "create table if not exists `project_glossary` (
			`pg_id` int(11) not null auto_increment,
			`pg_p_id` int(11) not null default '0',
			`pg_g_id` int(11) not null default '0',
			primary key  (`pg_id`)
			) engine=myisam  default charset=utf8 auto_increment=1";

		$tables['project_keywords'] = "create table if not exists `project_keywords` (
			`pk_id` int(11) not null auto_increment,
			`pk_p_id` int(11) not null default '0',
			`pk_k_id` int(11) not null default '0',
			primary key  (`pk_id`)
			) engine=myisam default charset=utf8 auto_increment=1";

		$tables['project_releases'] = "create table if not exists `project_releases` (
			`pr_id` int(11) not null auto_increment,
			`pr_p_id` int(11) not null default '0',
			`pr_r_id` int(11) not null default '0',
			primary key  (`pr_id`)
			) engine=myisam  default charset=utf8 auto_increment=1";

		$tables['project_stakeholders'] = "create table if not exists `project_stakeholders` (
			`ps_id` int(11) not null auto_increment,
			`ps_p_id` int(11) not null default '0',
			`ps_s_id` int(11) not null default '0',
			primary key  (`ps_id`)
			) engine=myisam  default charset=utf8 auto_increment=1";

		$tables['project_users'] = "create table if not exists `project_users` (
			`pu_id` int(11) not null auto_increment,
			`pu_p_id` int(11) not null default '0',
			`pu_u_id` int(11) not null default '0',
			primary key  (`pu_id`)
			) engine=myisam  default charset=utf8 auto_increment=1";

		$tables['releases'] = "create table if not exists `releases` (
			`r_id` int(11) not null auto_increment,
			`r_name` varchar(255) not null,
			`r_date` date not null default '2016-01-01',
			`r_released_date` date not null default '2016-01-01',
			`r_global` tinyint(4) not null default '0',
			primary key  (`r_id`)
			) engine=myisam  default charset=utf8 auto_increment=1";

		$tables['release_cases'] = "create table if not exists `release_cases` (
			`rc_id` int(11) not null auto_increment,
			`rc_r_id` int(11) not null default '0',
			`rc_c_id` int(11) not null default '0',
			primary key  (`rc_id`)
			) engine=myisam  default charset=utf8 auto_increment=1";

		$tables['requirements'] = "create table if not exists `requirements` (
			`r_id` int(11) not null auto_increment,
			`r_p_id` int(11) not null default '-1',
			`r_release` varchar(255) not null,
			`r_c_id` varchar(255) not null,
			`r_s_id` varchar(255) not null,
			`r_stakeholder` varchar(255) not null,
			`r_glossary` varchar(255) not null,
			`r_keyword` varchar(255) not null,
			`r_u_id` int(11) not null default '0',
			`r_assigned_u_id` int(11) not null default '0',
			`r_name` varchar(255) not null,
			`r_desc` text not null,
			`r_state` tinyint(4) not null default '0',
			`r_type_r` tinyint(4) not null default '0',
			`r_priority` smallint(6) not null default '0',
			`r_valid` tinyint(4) not null default '0',
			`r_link` varchar(255) not null,
			`r_satisfaction` tinyint(4) not null default '0',
			`r_dissatisfaction` tinyint(4) not null default '0',
			`r_conflicts` text not null,
			`r_depends` text not null,
			`r_component` varchar(255) not null,
			`r_source` varchar(255) not null,
			`r_risk` tinyint(4) not null default '0',
			`r_complexity` tinyint(4) not null default '0',
			`r_weight` mediumint(9) not null default '0',
			`r_points` text not null,
			`r_creation_date` datetime not null default '2016-01-01 00:00:00',
			`r_change_date` datetime not null default '2016-01-01 00:00:00',
			`r_accept_date` datetime not null default '2016-01-01 00:00:00',
			`r_accept_user` int(11) not null default '0',
			`r_version` int(11) not null default '1',
			`r_parent_id` int(11) default '0',
			`r_pos` int(11) default '1',
			`r_stub` tinyint(1) not null default '0',
			`r_keywords` text not null,
			`r_userfield1` varchar(255) not null,
			`r_userfield2` varchar(255) not null,
			`r_userfield3` varchar(255) not null,
			`r_userfield4` varchar(255) not null,
			`r_userfield5` varchar(255) not null,
			`r_userfield6` varchar(255) not null,
			primary key  (`r_id`)
			) engine=myisam  default charset=utf8 auto_increment=1";

		$tables['requirements_history'] = "create table if not exists `requirements_history` (
			`r_id` int(11) not null auto_increment,
			`r_parent_id` int(11) not null default '0',
			`r_p_id` int(11) not null default '-1',
			`r_release` varchar(255) not null,
			`r_c_id` varchar(255) not null,
			`r_s_id` varchar(255) not null,
			`r_stakeholder` varchar(255) not null,
			`r_glossary` varchar(255) not null,
			`r_keyword` varchar(255) not null,
			`r_u_id` int(11) not null default '0',
			`r_assigned_u_id` int(11) not null default '0',
			`r_name` varchar(255) not null,
			`r_desc` text not null,
			`r_state` tinyint(4) not null default '0',
			`r_type_r` tinyint(4) not null default '0',
			`r_priority` smallint(6) not null default '0',
			`r_valid` tinyint(4) not null default '0',
			`r_link` varchar(255) not null,
			`r_satisfaction` tinyint(4) not null default '0',
			`r_dissatisfaction` tinyint(4) not null default '0',
			`r_conflicts` text not null,
			`r_depends` text not null,
			`r_component` varchar(255) not null,
			`r_source` varchar(255) not null,
			`r_risk` tinyint(4) not null default '0',
			`r_complexity` tinyint(4) not null default '0',
			`r_weight` mediumint(9) not null default '0',
			`r_points` text not null,
			`r_creation_date` datetime not null default '2016-01-01 00:00:00',
			`r_change_date` datetime not null default '2016-01-01 00:00:00',
			`r_accept_date` datetime not null default '2016-01-01 00:00:00',
			`r_accept_user` int(11) not null default '0',
			`r_released_date` date not null default '2016-01-01',
			`r_version` int(11) not null default '0',
			`r_save_date` datetime not null default '2016-01-01 00:00:00',
			`r_save_user` int(11) not null default '0',
			`r_parent_id2` int(11) not null default '0',
			`r_pos` int(11) not null default '1',
			`r_stub` tinyint(1) not null default '0',
			`r_keywords` text not null,
			`r_userfield1` varchar(255) not null,
			`r_userfield2` varchar(255) not null,
			`r_userfield3` varchar(255) not null,
			`r_userfield4` varchar(255) not null,
			`r_userfield5` varchar(255) not null,
			`r_userfield6` varchar(255) not null,
			primary key  (`r_id`)
			) engine=myisam  default charset=utf8 auto_increment=1";

		$tables['reviews'] = "create table if not exists `reviews` (
			`r_id` int(11) not null auto_increment,
			`r_p_id` int(11) not null,
			`r_name` varchar(255) not null,
			`r_desc` text not null,
			`r_date` date not null,
			`r_status` int(11) not null,
			primary key  (`r_id`)
			) engine=myisam  default charset=utf8 auto_increment=1";

		$tables['review_comments'] = "create table if not exists `review_comments` (
			`rc_id` int(11) not null auto_increment,
			`rc_rev_id` int(11) not null,
			`rc_req_id` int(11) not null,
			`rc_text` text not null,
			`rc_comment` int(11) not null,
			`rc_date` datetime not null,
			`rc_u_id` int(11) not null,
			primary key  (`rc_id`)
			) engine=myisam  default charset=utf8 auto_increment=1";

		$tables['review_requirements'] = "create table if not exists `review_requirements` (
			`rr_id` int(11) not null auto_increment,
			`rr_rev_id` int(11) not null,
			`rr_req_id` int(11) not null,
			primary key  (`rr_id`)
			) engine=myisam  default charset=utf8 auto_increment=1";

		$tables['review_users'] = "create table if not exists `review_users` (
			`ru_id` int(11) not null auto_increment,
			`ru_r_id` int(11) not null,
			`ru_u_id` int(11) not null,
			primary key  (`ru_id`)
			) engine=myisam  default charset=utf8 auto_increment=1";

		$tables['stakeholders'] = "create table if not exists `stakeholders` (
			`s_id` int(11) not null auto_increment,
			`s_name` varchar(255) not null,
			`s_function` varchar(255) not null,
			`s_email` varchar(255) not null,
			`s_interests` text not null,
			`s_global` tinyint(4) not null default '0',
			primary key  (`s_id`)
			) engine=myisam  default charset=utf8 auto_increment=1";

		$tables['subprojects'] = "create table if not exists `subprojects` (
			`s_id` int(11) not null auto_increment,
			`s_name` varchar(255) not null,
			`s_desc` text not null,
			`s_p_id` int(11) not null default '0',
			primary key  (`s_id`)
			) engine=myisam  default charset=utf8 auto_increment=1";

		$tables['tree_history'] = "create table if not exists `tree_history` (
			`th_id` int(11) not null auto_increment,
			`th_r_id` int(11) not null default '0',
			`th_u_id` int(11) not null default '0',
			`th_p_id` int(11) not null default '0',
			`th_parent_old` int(11) not null default '0',
			`th_parent_old_pos` int(11) not null default '0',
			`th_parent_new` int(11) not null default '0',
			`th_parent_new_pos` int(11) not null default '0',
			`th_rh_id` int(11) not null default '0',
			`th_date` datetime not null default '2016-01-01 00:00:00',
			`th_current` int(11) not null default '0',
			primary key  (`th_id`)
			) engine=myisam  default charset=utf8 auto_increment=1";

		$tables['users'] = "create table if not exists `users` (
			`u_id` int(11) not null auto_increment,
			`u_username` varchar(255) not null,
			`u_password` varchar(255) not null,
			`u_email` varchar(255) not null,
			`u_name` varchar(255) not null,
			`u_rights` tinyint(1) not null default '0',
			primary key  (`u_id`)
			) engine=myisam  default charset=utf8 auto_increment=3";

		$tables['user_fields'] = "create table if not exists `user_fields` (
			`uf_id` int(11) not null auto_increment,
			`uf_name_en` varchar(255) not null,
			`uf_name_de` varchar(255) not null,
			`uf_name_fr` varchar(255) not null,
			`uf_name_it` varchar(255) not null,
			`uf_type` tinyint(1) not null default '0',
			`uf_text_en` varchar(255) not null,
			`uf_text_fr` varchar(255) not null,
			`uf_text_de` varchar(255) not null,
			`uf_text_it` varchar(255) not null,
			`uf_values` text not null,
			primary key  (`uf_id`)
			) engine=myisam  default charset=utf8 auto_increment=1";

		$app_dblink = new dblink($host, $app_user, $app_user_password, $app_database);
		// create table
		foreach($tables as $table=>$sql)
		{
			$ret = $app_dblink->exec_sql($sql);
			if($ret)
			{
				print "[dbinit_tables] create table '$table' - ok<br>";
			}
			else
			{
				print "[dbinit_tables] create table '$table' - fail<br>";
				break;
			}
		}

		return $ret;
	}
	
	function dbinit_data($host, $app_user, $app_user_password, $app_database)
	{
		$ret = false;
		
		$records[0] = "insert into `admin_access` values(1, 'admin', '61c9fc7e8c467e24a094f825d7be087212992c75')";
		$records[1] = "insert into `users` values(1, 'admin', '61c9fc7e8c467e24a094f825d7be087212992c75', 'admin@reqheap.com', 'admin', 5)";
		$records[2] = "insert into `users` values(2, 'guest', '7d0dcf3f185967102c90353f141884426596e63c', 'guest@reqheap.com', 'guest', 0)";
		$records[3] = "insert into `user_fields` (`uf_id`, `uf_name_en`, `uf_name_de`,
						`uf_name_fr`, `uf_name_it`, `uf_type`, `uf_text_en`, `uf_text_fr`,
						`uf_text_de`, `uf_text_it`, `uf_values`) values
						(1, '', '', '', '', 0, '', '', '', '', ''),
						(2, '', '', '', '', 0, '', '', '', '', ''),
						(3, '', '', '', '', 0, '', '', '', '', ''),
						(4, '', '', '', '', 0, '', '', '', '', ''),
						(5, '', '', '', '', 0, '', '', '', '', ''),
						(6, '', '', '', '', 0, '', '', '', '', '')";
		
		$app_dblink = new dblink($host, $app_user, $app_user_password, $app_database);
		// insert data
		foreach($records as $seq=>$sql)
		{
			$ret = $app_dblink->exec_sql($sql);
			if($ret)
			{
				print "[dbinit_data] insert data '$seq' - ok<br>";
			}
			else
			{
				print "[dbinit_data] insert data '$seq' - fail<br>";
				break;
			}
		}
		
		return $ret;
	}
?>
