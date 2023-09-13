<?php
session_start();
// $_SESSION["uid"];
// $_SESSION["username"];

if(empty($_SESSION["username"]))
{
	
	header('location: login.php');
}
?>