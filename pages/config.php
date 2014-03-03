<?php
	session_start();
	$host = "localhost"; //host bazy danych
	$user = "pgrzesik_swos"; //nazwa użytkownika bazy danych
	$pass = "admin"; //hasło użytkownika bazy danych
	$baza = "pgrzesik_swos"; //baza danych
	$polaczenie = mysql_connect($localhost, $user, $pass) or die("Błąd serwera bazy danych: " . mysql_error());
	$baza = mysql_select_db($baza)or die("Błąd bazy danych: " . mysql_error());	
	//error_reporting(0);
?>