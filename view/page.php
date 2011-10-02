<?php
session_start();
        if ( $_SESSION['session_mwap_id'] <> session_id() ){
                header("location:logout.html");
        exit();
        }

echo "<center> page.php </center>";
?>
