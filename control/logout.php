<?php
session_start();
unset($_SESSION['session_mwap_id']);
session_destroy();
header('location:../login.php');
exit();
?>
