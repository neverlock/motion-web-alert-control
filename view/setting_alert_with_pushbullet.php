<?php
  /*Check login!*/
  session_start();
  if ( $_SESSION['session_mwap_id'] <> session_id() ){
    echo 'logout';
    exit();
  }
$alert_current = ' class="current" ';
include('setting_menu.php');
include('setting_function.php');
?>
<?	
  $dis = array('disabled="disabled"','');
  $check = array('','checked="checked"');

  $alert_on = load_config('ALERT_ON=');
  $intrude_on = load_config('INTRUDE_ON=');
  $powerdown_on = load_config('POWERDOWN_ON=');
  $sms_on = load_config('SMS_ON=');
  $twitter_on = load_config('TWITTER_ON=');
  $pushbullet_on = load_config('PUSHBULLET_ON=');
?>
<form id="onoff_system">
<div class="setting_div" >
<fieldset class="fieldset_setting">
<legend class="legend_setting">On/Off Setting</legend>
<table class="table_setting">
  <tr>
    <td height="30" width="150" class="td_right">System Alert</td>
    <td width="10">:</td>
    <td>
      <input type="hidden" name="action" value="save">
      <input name="alert_on_old" type="hidden" value="<? echo $alert_on;?>"> 
      <input name="alert_on" type="hidden" value="<? echo $alert_on;?>"> 
      <input id="alert_on" type="checkbox" <? echo $check[$alert_on];?>
 onclick="$('#intrude_on').attr('disabled', (this.checked) ? true : false);
 $('#powerdown_on').attr('disabled', (this.checked) ? true : false);
 $('#twitter_on').attr('disabled', (this.checked) ? true : false);
 $('#sms_on').attr('disabled', (this.checked) ? true : false);
 $('#pushbullet_on').attr('disable', (this.checked) ? true: false);
 $('[name=alert_on]').val(this.checked ? '0' : '1'); "> 
    </td>
    <td height="30" width="150" class="td_right">SMS Alert</td>
    <td>:</td>
    <td>
      <input name="sms_on_old" type="hidden" value="<? echo $sms_on;?>"> 
      <input name="sms_on" type="hidden" value="<? echo $sms_on;?>"> 
      <input id="sms_on" type="checkbox" <? echo $check[$sms_on].' '.$dis[$alert_on];?>
      onclick=" $('[name=sms_on]').val(this.checked ? '0' : '1'); "> 
    </td>
  </tr>
  <tr>
    <td height="30" class="td_right">Intrude Alert</td>
    <td>:</td>
    <td>
      <input name="intrude_on_old" type="hidden" value="<? echo $intrude_on;?>"> 
      <input name="intrude_on" type="hidden" value="<? echo $intrude_on;?>"> 
      <input id="intrude_on" type="checkbox" <? echo $check[$intrude_on].' '.$dis[$alert_on];?>
      onclick=" $('[name=intrude_on]').val(this.checked ? '0' : '1'); "> 
    </td>
    <td height="30" class="td_right">Twitter Alert</td>
    <td>:</td>
    <td>
      <input name="twitter_on_old" type="hidden" value="<? echo $twitter_on;?>"> 
      <input name="twitter_on" type="hidden" value="<? echo $twitter_on;?>"> 
      <input id="twitter_on" type="checkbox" <? echo $check[$twitter_on].' '.$dis[$alert_on];?>
      onclick=" $('[name=twitter_on]').val(this.checked ? '0' : '1'); "> 
    </td>
  </tr>
  <tr>
    <td height="30" class="td_right">PowerDown Alert</td>
    <td>:</td>
    <td>
      <input name="powerdown_on_old" type="hidden" value="<? echo $powerdown_on;?>"> 
      <input name="powerdown_on" type="hidden" value="<? echo $powerdown_on;?>"> 
      <input id="powerdown_on" type="checkbox" <? echo $check[$powerdown_on].' '.$dis[$alert_on];?>
      onclick=" $('[name=powerdown_on]').val(this.checked ? '0' : '1'); "> 
    </td>
  </tr>
  <tr>
    <td height="30" class="td_right">Pushbullet Alert</td>
    <td>:</td>
    <td>
      <input name="pushbullet_on_old" type="hidden" value="<? echo $pushbullet_on;?>"> 
      <input name="pushbullet_on" type="hidden" value="<? echo $pushbullet_on;?>"> 
      <input id="pushbullet_on" type="checkbox" <? echo $check[$pushbullet_on].' '.$dis[$alert_on];?>
      onclick=" $('[name=pushbullet_on]').val(this.checked ? '0' : '1'); "> 
    </td>
  </tr>

</table>
<table>
  <tr>
    <td width="200"></td>
    <td>
      <div class="button black medium" onclick="save_onoff()">Save Setting</div>
    </td>
  </tr>
</table>
</fieldset>
</div>
</form>
