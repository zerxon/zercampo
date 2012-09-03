<?php
session_start();
session_destroy();

if(isset($_COOKIE['user']))
	setcookie('user','');

header("location:/");
exit(0);
?>