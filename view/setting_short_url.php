<?php
$short_url_current = ' class="current"';
include('setting_menu.php');
include('setting_function.php');
?>
<?
  if (isset($_GET['short_url_user'])){
     $short_url_user = $_GET['short_url_user'];
     $short_url_key = $_GET['short_url_key'];
     $short_url_user_old = $_GET['short_url_user_old'];
     $short_url_key_old = $_GET['short_url_key_old'];

     set_config('SHORT_URL_USER=',$short_url_user,$short_url_user_old);
     set_config('SHORT_URL_KEY=',$short_url_key,$short_url_key_old);

     }
	$short_url_user = load_config('SHORT_URL_USER=');
	$short_url_key = load_config('SHORT_URL_KEY=');
?>
<form autocomplete="off" onsubmit="loadXMLDoc(
'view/setting_short_url.php' +
'?short_url_user=' +  encodeURIComponent(document.getElementById('short_url_user').value) +
'&short_url_key=' + encodeURIComponent(document.getElementById('short_url_key').value) +
'&short_url_user_old=' +  encodeURIComponent(document.getElementById('short_url_user_old').value) +
'&short_url_key_old=' + encodeURIComponent(document.getElementById('short_url_key_old').value)
 ); alert(':: Save Setting ::'); return false">
<div class="setting_div" >
<fieldset class="fieldset_setting">
<legend class="legend_setting">API Short-URL bit.ly Setting</legend>
<table class="table_setting">
  <tr>
    <td width="150" class="td_right"></td>
    <td></td>
    <td>
    <div class="example_post">
    <font color="black" size="1"><b>Register API</b><br />Your can register api bit.ly now&nbsp;&nbsp;<a href="http://bit.ly" target="_bank" ><font color="red">http://bit.ly</font></a><br />
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
