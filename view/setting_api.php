<?php
$api_current = ' class="current"';
include('setting_menu.php');
include('setting_function.php');
?>
<?
  if (isset($_GET['short_url_user'])){
     $short_url_user = $_GET['short_url_user'];
     $short_url_key = $_GET['short_url_key'];
     $short_url_user_old = $_GET['short_url_user_old'];
     $short_url_key_old = $_GET['short_url_key_old'];
     $imgur_key = $_GET['imgur_key'];
     $imgur_key_old = $_GET['imgur_key_old'];

     set_config('SHORT_URL_USER=',$short_url_user,$short_url_user_old);
     set_config('SHORT_URL_KEY=',$short_url_key,$short_url_key_old);
     set_config('IMGUR_KEY=',$imgur_key,$imgur_key_old);

     }
	$short_url_user = load_config('SHORT_URL_USER=');
	$short_url_key = load_config('SHORT_URL_KEY=');
	$imgur_key = load_config('IMGUR_KEY=');
?>
<form autocomplete="off" onsubmit="loadXMLDoc(
'view/setting_api.php' +
'?short_url_user=' +  encodeURIComponent(document.getElementById('short_url_user').value) +
'&short_url_key=' + encodeURIComponent(document.getElementById('short_url_key').value) +
'&short_url_user_old=' +  encodeURIComponent(document.getElementById('short_url_user_old').value) +
'&short_url_key_old=' + encodeURIComponent(document.getElementById('short_url_key_old').value) +
'&imgur_key_old=' + encodeURIComponent(document.getElementById('imgur_key_old').value) +
'&imgur_key=' + encodeURIComponent(document.getElementById('imgur_key').value) +
 ''); alert(':: Save Setting ::'); return false">
<div class="setting_div" >
<fieldset class="fieldset_setting">
<legend class="legend_setting">API / Add-on Setting</legend>
<table class="table_setting">
  <tr>
    <td width="150" class="td_right"></td>
    <td></td>
    <td>
    <div class="example_post">
    <font color="black" size="1"><b>Short Url API bit.ly</b><br />To get started, you'll need a free bitly user account and apiKey at :<br /><a href="http://bitly.com/a/sign_up" target="_bank" ><font color="red">http://bitly.com/a/sign_up</font></a><br />
<br />If you already have an account, you can find your apiKey at:<br /> <a href="http://bitly.com/a/your_api_key" target="_bank" ><font color="red">http://bitly.com/a/your_api_key</font></a><br />
    </div>
    </td>
  </tr>
  <tr>
    <td class="td_right">User</td>
    <td>:</td>
    <td>
      <input id="short_url_user_old" type="hidden" value="<? echo $short_url_user; ?>"> 
      <input id="short_url_user" type="text" value="<? echo $short_url_user; ?>"> 
    </td>
  </tr>
  <tr>
    <td class="td_right">API-Key</td>
    <td>:</td>
    <td>
      <input id="short_url_key_old" type="hidden" value="<? echo $short_url_key; ?>"> 
      <input id="short_url_key" type="text" size="35" value="<? echo $short_url_key; ?>"> 
    </td>
  </tr>
<tr><td></td><td colspan="2"><hr class="hr_alert_day"></td></tr>
  <tr>
    <td></td>
    <td></td>
    <td>
    <div class="example_post">
    <font color="black" size="1"><b>Images Upload API Imgur</b><br />The API Developer Key allows imgur to keep track of everyone that's using the API to upload images :<br /><a href="http://imgur.com/register/api_anon" target="_bank" ><font color="red">http://imgur.com/register/api_anon</font></a><br />
    </div>
    </td>
  </tr>
  <tr>
    <td class="td_right">API-Key</td>
    <td>:</td>
    <td>
      <input id="imgur_key_old" type="hidden" value="<? echo $imgur_key; ?>"> 
      <input id="imgur_key" type="text" size="35" value="<? echo $imgur_key; ?>"> 
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
