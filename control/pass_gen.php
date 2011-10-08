<?php
$pass = $_GET['pass'];
if ( $pass != "" ){
echo md5($pass);
}else{
echo "";
}
?>
