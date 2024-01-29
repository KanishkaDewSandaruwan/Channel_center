<?php
include 'dashboard/connection.php';

session_start();
	session_destroy();
	session_unset();

	header('location:dashboard/login.php');
?>