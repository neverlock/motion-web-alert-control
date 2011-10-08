<?php
session_start();
	if ( $_SESSION['session_mwap_id'] <> session_id() ){
		header("location:login.php");
		exit();	
	}
?>
