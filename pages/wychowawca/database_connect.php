<?php
	@mysql_connect("localhost", "root", "admin") or die("Could not connect");
	@mysql_select_db("swos") or die("Could not select database");  
	mysql_query("SET NAMES 'utf8'");
?>	