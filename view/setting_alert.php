<?php
$alert_current = ' class="current" ';
include('setting_menu.php');
include('setting_function.php');
?>
<?	
  if (isset($_GET['alert_on'])){

     $alert_on = ($_GET['alert_on'] == "true" ? "1" : "0");
     $intrude_on = ($_GET['intrude_on'] == "true" ? "1" : "0");
     $powerdown_on = ($_GET['powerdown_on'] == "true" ? "1" : "0");
     $sms_on = ($_GET['sms_on'] == "true" ? "1" : "0");
     $twitter_on = ($_GET['twitter_on'] == "true" ? "1" : "0");

     $alert_on_old = ($_GET['alert_on_old'] == "checked" ? "1" : "0");
     $intrude_on_old = ($_GET['intrude_on_old'] == "checked" ? "1" : "0");
     $powerdown_on_old = ($_GET['powerdown_on_old'] == "checked" ? "1" : "0");
     $sms_on_old = ($_GET['sms_on_old'] == "checked" ? "1" : "0");
     $twitter_on_old = ($_GET['twitter_on_old'] == "checked" ? "1" : "0");

     set_config('ALERT_ON=',$alert_on,$alert_on_old);
     set_config('INTRUDE_ON=',$intrude_on,$intrude_on_old);
     set_config('POWERDOWN_ON=',$powerdown_on,$powerdown_on_old);
     set_config('SMS_ON=',$sms_on,$sms_on_old);
     set_config('TWITTER_ON=',$twitter_on,$twitter_on_old);
     }
	$alert_on = (load_config('ALERT_ON=') == 1 ? "checked":"");
	$disabled = ($alert_on == "" ? "disabled " : "");
	$intrude_on = (load_config('INTRUDE_ON=') == 1 ? "$disabled"."checked":"$disabled");
	$powerdown_on = (load_config('POWERDOWN_ON=') == 1 ? "$disabled"."checked":"$disabled");
	$sms_on = (load_config('SMS_ON=') == 1 ? "$disabled"."checked":"$disabled");
	$twitter_on = (load_config('TWITTER_ON=') == 1 ? "$disabled"."checked":"$disabled");

?>
<form autocomplete="off" onsubmit="loadXMLDoc(
'view/setting_alert.php' +
load_alert() +
'' ); apprise(':: Save Setting ::'); return false">
<div class="setting_div" >
<fieldset class="fieldset_setting">
<legend class="legend_setting">On/Off Setting</legend>
<table class="table_setting">
  <tr>
    <td height="30" width="150" class="td_right">System Alert</td>
    <td width="10">:</td>
    <td>
      <input type="hidden" id="alert_on_old" value="<? echo $alert_on;?>">
      <input id="alert_on" type="checkbox" <? echo $alert_on;?> onclick="jQuery('#intrude_on').attr('disabled', (this.checked) ? true : false) ;
 jQuery('#powerdown_on').attr('disabled', (this.checked) ? true : false);
 jQuery('#twitter_on').attr('disabled', (this.checked) ? true : false);
 jQuery('#sms_on').attr('disabled', (this.checked) ? true : false) " > 
    </td>
    <td height="30" width="150" class="td_right">SMS Alert</td>
    <td>:</td>
    <td>
      <input type="hidden" id="sms_on_old" value="<? echo $sms_on;?>"> 
      <input id="sms_on" type="checkbox" <? echo $sms_on;?>>
    </td>
  </tr>
  <tr>
    <td height="30" class="td_right">Intrude Alert</td>
    <td>:</td>
    <td>
      <input type="hidden" id="intrude_on_old" value="<? echo $intrude_on;?>"> 
      <input id="intrude_on" type="checkbox" <? echo $intrude_on;?>>
    </td>
    <td height="30" class="td_right">Twitter Alert</td>
    <td>:</td>
    <td>
      <input type="hidden" id="twitter_on_old" value="<? echo $twitter_on;?>"> 
      <input id="twitter_on" type="checkbox" <? echo $twitter_on;?>>
    </td>
  </tr>
  <tr>
    <td height="30" class="td_right">PowerDown Alert</td>
    <td>:</td>
    <td>
      <input type="hidden" id="powerdown_on_old" value="<? echo $powerdown_on;?>"> 
      <input id="powerdown_on" type="checkbox" <? echo $powerdown_on;?>>
    </td>
  </tr>
</table>
<table>
  <tr>
    <td width="200"></td>
    <td>
      <input id="btn_save_setting" type="submit" class="button black medium" value="   Save Setting   ">
    </td>
  </tr>
</table>
</fieldset>
</div>
</form>
