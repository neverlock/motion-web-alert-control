<?php
$sms_current = ' class="current"';
include('setting_menu.php');
include('setting_function.php');
?>
<?
  if (isset($_GET['url'])){
     $url = $_GET['url'];
     $p_data = $_GET['p_data'];
     $user = $_GET['user'];
     $pass = $_GET['pass'];
     $url_old = $_GET['url_old'];
     $p_data_old = $_GET['p_data_old'];
     $user_old = $_GET['user_old'];
     $pass_old = $_GET['pass_old'];

     set_config('SMS_GATEWAY_URL=',$url,$url_old);
     set_config('SMS_GATEWAY_POST=',$p_data,$p_data_old);
     set_config('SMS_GATEWAY_USER=',$user,$user_old);
     set_config('SMS_GATEWAY_PASSWORD=',$pass,$pass_old);

     }
	$url = load_config('SMS_GATEWAY_URL=');
	$p_data = load_config('SMS_GATEWAY_POST=');
	$user = load_config('SMS_GATEWAY_USER=');
	$pass = load_config('SMS_GATEWAY_PASSWORD=');
?>
<form autocomplete="off" onsubmit="loadXMLDoc(
'view/setting_sms.php?url=' +
 encodeURIComponent(document.getElementById('sms_gateway_url').value) +
'&p_data=' + encodeURIComponent(document.getElementById('sms_gateway_postdata').value) +
'&user=' + encodeURIComponent(document.getElementById('sms_gateway_user').value) +
'&pass=' + encodeURIComponent(document.getElementById('sms_gateway_password').value) +
'&url_old=' +  encodeURIComponent(document.getElementById('sms_gateway_url_old').value) +
'&p_data_old=' + encodeURIComponent(document.getElementById('sms_gateway_postdata_old').value) +
'&user_old=' + encodeURIComponent(document.getElementById('sms_gateway_user_old').value) +
'&pass_old=' + encodeURIComponent(document.getElementById('sms_gateway_password_old').value)
 ); apprise(':: Save Setting ::'); return false">
<div class="setting_div" >
<fieldset class="fieldset_setting">
<legend class="legend_setting">SMS-Gateway Setting</legend>
<table class="table_setting">
  <tr>
    <td width="150" class="td_right">URL</td>
    <td width="10">:</td>
    <td>
      <input type="hidden" id="sms_gateway_url_old" value="<? echo $url;?>">
      <textarea id="sms_gateway_url"rows="2" cols="50"><? echo $url;?></textarea> 
    </td>
  </tr>
  <tr>
    <td class="td_right">Post Data</td>
    <td>:</td>
    <td>
      <input type="hidden" id="sms_gateway_postdata_old" value="<? echo $p_data;?>"> 
      <textarea id="sms_gateway_postdata" rows="3" cols="50"><? echo $p_data;?></textarea> 
    </td>
  </tr>
  <tr>
    <td class="td_right"></td>
    <td></td>
    <td>
    <div class="example_post">
    <font color="black" size="1"><b>Post Data Example.</b><br />Username=<font color="red">$USERNAME</font>&Password=<font color="red">$PASSWORD</font>&Text=<font color="red">$MESSAGE</font><br />&PhoneNumber=<font color="red">$PhoneNO</font>&SMSMode=E&SName=CCTV</font><br />
    </div>
    </td>
  </tr>
  <tr>
    <td class="td_right">User</td>
    <td>:</td>
    <td>
      <input id="sms_gateway_user_old" type="hidden" value="<? echo $user; ?>"> 
      <input id="sms_gateway_user" type="text" value="<? echo $user; ?>"> 
      <font color="black" size="1" >$USERNAME</font>
    </td>
  </tr>
  <tr>
    <td class="td_right">Password</td>
    <td>:</td>
    <td>
      <input id="sms_gateway_password_old" type="hidden" value="<? echo $pass; ?>"> 
      <input id="sms_gateway_password" type="password" value="<? echo $pass; ?>"> 
      <font color="black" size="1" >$PASSWORD</font>
    </td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td>
      <br /><br /><input id="btn_save_setting" type="submit" class="button black medium" value="   Save Setting   ">
    </td>
  </tr>
</table>
</fieldset>
</div>
</form>
