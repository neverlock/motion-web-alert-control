<?php
$alert_current = ' class="current"';
include('setting_menu.php');
include('setting_function.php');
?>
<?
  if (isset($_GET['sms_on'])){
     $sms_on = $_GET['sms_on']; 
     $sms_msg = $_GET['sms_msg']; 
     $sms_phone = $_GET['sms_phone']; 
     $twitter_on = $_GET['tweet_on'];
     $twitter_msg = $_GET['tweet_msg'];
     $twitter_user = $_GET['tweet_user'];
     $twitter_pass = $_GET['tweet_pass'];
     $sms_on_old = $_GET['sms_on_old']; 
     $sms_msg_old = $_GET['sms_msg_old']; 
     $sms_phone_old = $_GET['sms_phone_old']; 
     $twitter_on_old = $_GET['tweet_on_old'];
     $twitter_msg_old = $_GET['tweet_msg_old'];
     $twitter_user_old = $_GET['tweet_user_old'];
     $twitter_pass_old = $_GET['tweet_pass_old'];

     $sms_on = ("$sms_on" == "true" ? "1" : "0");
     $sms_on_old = ($sms_on_old == "checked" ? "1" : "0");
     $twitter_on = ("$twitter_on" == "true" ? "1" : "0");
     $twitter_on_old = ($twitter_on_old == "checked" ? "1" : "0");

     set_config('POWERDOWN_SMS_ON=',$sms_on,$sms_on_old);
     set_config('POWERDOWN_SMS_MSG=',$sms_msg,$sms_msg_old);
     set_config('POWERDOWN_SMS_PHONE=',$sms_phone,$sms_phone_old);
     set_config('POWERDOWN_TWITTER_ON=',$twitter_on,$twitter_on_old);
     set_config('POWERDOWN_TWITTER_MSG=',$twitter_msg,$twitter_msg_old);
     set_config('POWERDOWN_TWITTER_USER=',$twitter_user,$twitter_user_old);
     set_config('POWERDOWN_TWITTER_PASS=',$twitter_pass,$twitter_pass_old);
  }
  $sms_on = (load_config('POWERDOWN_SMS_ON=') == 1 ? "checked":"");
  $sms_msg = load_config('POWERDOWN_SMS_MSG=');
  $sms_phone = load_config('POWERDOWN_SMS_PHONE=');
  $twitter_on = (load_config('POWERDOWN_TWITTER_ON=') == 1 ? "checked":"");
  $twitter_msg = load_config('POWERDOWN_TWITTER_MSG=');
  $twitter_user = load_config('POWERDOWN_TWITTER_USER=');
  $twitter_pass = load_config('POWERDOWN_TWITTER_PASS=');
?>
<form autocomplete="off" onsubmit="loadXMLDoc(
'view/setting_alert_powerdown.php' +
'?sms_on=' + encodeURIComponent(document.getElementById('sms_on').checked) +
'&sms_msg=' + encodeURIComponent(document.getElementById('sms_msg').value) +
'&sms_phone=' + encodeURIComponent(document.getElementById('sms_phone').value) +
'&tweet_on=' +  encodeURIComponent(document.getElementById('tweet_on').checked) +
'&tweet_msg=' + encodeURIComponent(document.getElementById('tweet_msg').value) +
'&tweet_user=' + encodeURIComponent(document.getElementById('tweet_user').value) +
'&tweet_pass=' + encodeURIComponent(document.getElementById('tweet_pass').value) +
'&sms_on_old=' + encodeURIComponent(document.getElementById('sms_on_old').value) +
'&sms_msg_old=' + encodeURIComponent(document.getElementById('sms_msg_old').value) +
'&sms_phone_old=' + encodeURIComponent(document.getElementById('sms_phone_old').value) +
'&tweet_on_old=' +  encodeURIComponent(document.getElementById('tweet_on_old').value) +
'&tweet_msg_old=' + encodeURIComponent(document.getElementById('tweet_msg_old').value) +
'&tweet_user_old=' + encodeURIComponent(document.getElementById('tweet_user_old').value) +
'&tweet_pass_old=' + encodeURIComponent(document.getElementById('tweet_pass_old').value)
 ); alert(':: Save Setting ::'); return false">
<div class="setting_div" >
<h3>Alert PowerDown Setting</h3>
  <fieldset class="fieldset_alert">
    <legend class="legend_setting">SMS</legend>
      <table class="table_setting">
        <tr>
          <td height="25" width="150" class="td_right">Status</td>
          <td width="10">:</td>
          <td>
            <input type="hidden" id="sms_on_old" value="<? echo $sms_on;?>">
            <input id="sms_on" type="checkbox" <? echo $sms_on;?>> 
          </td>
      </tr>
    <tr>
    <td height="25" class="td_right">Massage</td>
    <td>:</td>
    <td>
      <input id="sms_msg_old" type="hidden" value="<? echo $sms_msg; ?>"> 
      <input id="sms_msg" type="text" size="35" maxlength="75" value="<? echo $sms_msg; ?>"> 
    </td>
  </tr>
  <tr>
    <td height="25" class="td_right">Phone number</td>
    <td>:</td>
    <td>
      <input id="sms_phone_old" type="hidden" value="<? echo $sms_phone; ?>"> 
      <input id="sms_phone" type="text" size="25" value="<? echo $sms_phone; ?>"> 
    </td>
  </tr>
  <tr>
    <td class="td_right"></td>
    <td></td>
    <td>
    <div class="example_post">
    <font color="black" size="1"><b>Phone number Example.</b><br /><font color="red">085XXXXXXX</font>&nbsp;&nbsp;OR&nbsp;&nbsp;<font color="red">097XXXXXXX,089XXXXXXX</font><br />
    </div>
    </td>
  </tr>
</table>
  </fieldset>
  <fieldset class="fieldset_alert">
    <legend class="legend_setting">Twitter</legend>
      <table class="table_setting">
        <tr>
          <td height="25" width="150" class="td_right">Status</td>
          <td width="10">:</td>
          <td>
            <input type="hidden" id="tweet_on_old" value="<? echo $twitter_on;?>">
            <input id="tweet_on" type="checkbox" <? echo $twitter_on;?>> 
          </td>
      </tr>
    <tr>
    <td height="25" class="td_right">Massage</td>
    <td>:</td>
    <td>
      <input type="hidden" id="tweet_msg_old" value="<? echo $twitter_msg;?>">
      <textarea id="tweet_msg"rows="2" maxlength="200" cols="50"><? echo $twitter_msg;?></textarea>
    </td>
  </tr>
  <tr>
    <td height="25" class="td_right">User</td>
    <td>:</td>
    <td>
      <input id="tweet_user_old" type="hidden" value="<? echo $twitter_user; ?>"> 
      <input id="tweet_user" type="text" value="<? echo $twitter_user; ?>"> 
    </td>
  </tr>
  <tr>
    <td height="25" class="td_right">Password</td>
    <td>:</td>
    <td>
      <input id="tweet_pass_old" type="hidden" value="<? echo $twitter_pass; ?>"> 
      <input id="tweet_pass" type="password" value="<? echo $twitter_pass; ?>"> 
    </td>
  </tr>
</table>
</fieldset>
<table>
  <tr>
    <td width="195">
    </td>
    <td>
      <input id="btn_save_setting" type="submit" class="button black medium" value="   Save Setting   ">
    </td>
  </tr>
</table>
</div>
</form>
