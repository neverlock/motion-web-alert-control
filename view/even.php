<?php
session_start();
        if ( $_SESSION['session_mwap_id'] <> session_id() ){
                header("location:logout.html");
        exit();
        }
$year = $_GET['y'];
$month = $_GET['m'];
$day = $_GET['d'];
?>
<center>
  <?php echo $year."-".$month."-".$day; ?>
</center>

