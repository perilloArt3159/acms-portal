<?php

if(!isset($_SESSION)) 
    { 
        session_start();
    }
    
	$host = 'localhost';
	$username = 'acmsorgp_admin';
	$password = 'UUd=!l,1ZZK{';
	$database = 'acmsorgp_acms';

	$mysqli = new mysqli($host,$username,$password,$database) or die(mysql_error($mysqli));

?>