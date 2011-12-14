<?php
include('config.php');
session_start();
if (isset($_POST['btnLogin']))
{
	$user = $_POST['user_mwap'];
	$pass = $_POST['pass_mwap'];
	$config_user = `cat $FILE_CONF | grep WEB | awk -F "WEB_USER=" '{print $2}'`;
	$config_pass = `cat $FILE_CONF | grep WEB | awk -F "WEB_PASSWORD=" '{print $2}'`;

	if (( strcmp($user,trim($config_user)) == 0) && (strcmp(md5($pass),trim($config_pass)) == 0)) {
		$_SESSION['session_mwap_id'] = session_id();
		header("location:main.php");
	exit();	
	}else{
		header("location:login.php#error");	
	}
}
if ( $_SESSION['session_mwap_id'] == session_id() ){
	header("location:main.php");
	exit();
}
?>
