<?php
include('config.php');
  /*Check login!*/
  session_start();
  if ( $_SESSION['session_mwap_id'] <> session_id() ){
    echo 'logout';
    exit();
  }

  function set_config($msg,$new,$old){
    global $FILE_CONF;
    $new = trim($new);
    $old = trim($old);
    if( $new <> $old ) {
      `sed -i "s/^$msg$old$/$msg$new/g" $FILE_CONF`;
    }
  }

  function save_onoff() {
    if (isset($_POST['alert_on'])){
      $alert_on = $_POST['alert_on'];
      $intrude_on = $_POST['intrude_on'];
      $powerdown_on = $_POST['powerdown_on'];
      $sms_on = $_POST['sms_on'];
      $twitter_on = $_POST['twitter_on'];
      $alert_on_old = $_POST['alert_on_old'];
      $intrude_on_old = $_POST['intrude_on_old'];
      $powerdown_on_old = $_POST['powerdown_on_old'];
      $sms_on_old = $_POST['sms_on_old'];
      $twitter_on_old = $_POST['twitter_on_old'];
      set_config('ALERT_ON=',$alert_on,$alert_on_old);
      set_config('INTRUDE_ON=',$intrude_on,$intrude_on_old);
      set_config('POWERDOWN_ON=',$powerdown_on,$powerdown_on_old);
      set_config('SMS_ON=',$sms_on,$sms_on_old);
      set_config('TWITTER_ON=',$twitter_on,$twitter_on_old);
      echo 'save';
    }
  }

  switch ($_POST['action'])
  {
    case 'save'  : save_onoff();  break;
  }
?>
