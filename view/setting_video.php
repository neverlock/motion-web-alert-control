<?php
$video_current = ' class="current"';
include('setting_menu.php');
include('setting_function.php');
?>
<?
function m($name,$select,$dis){
  $dis = ("$dis" == "1" ? "" : "disabled=\"disabled\"");
  $m = "<select id=\"$name\" $dis>";
  for($i=0;$i<=5;$i++){
    for($j=0;$j<=9;$j++){
      if($select == "$i$j"){
        $m .= "\n<option value='$i$j' SELECTED>$i$j</option>";
      }else{
        $m .= "\n<option value='$i$j'>$i$j</option>";
      }
      if("$i$j" == "59"){
        $m .= "\n</select>";
        return $m;
      }
    }
  }
}

  if (isset($_GET['waits'])){

     set_config('WAIT=',$_GET['waits'],$_GET['waits_old']);
     set_config('REMOVE_DAY=',$_GET['days'],$_GET['days_old']);
     set_config('REMOVE_SIZE=',$_GET['size'],$_GET['size_old']);
     }
	$waits = load_config('WAIT=');
	$days = load_config('REMOVE_DAY=');
	$size = load_config('REMOVE_SIZE=');
?>
<form autocomplete="off" onsubmit="loadXMLDoc(
'view/setting_video.php' +
'?waits=' + encodeURIComponent(document.getElementById('waits').value) +
'&waits_old=' + encodeURIComponent(document.getElementById('waits_old').value) +
'&days=' + encodeURIComponent(document.getElementById('days').value) +
'&days_old=' + encodeURIComponent(document.getElementById('days_old').value) +
'&size=' + encodeURIComponent(document.getElementById('size').value) +
'&size_old=' + encodeURIComponent(document.getElementById('size_old').value) +
 ''); alert(':: Save Setting ::'); return false">
<div class="setting_div" >
<fieldset class="fieldset_setting">
<legend class="legend_setting">Video Setting</legend>
<table class="table_setting">
  <tr>
    <td width="150" class="td_right"></td>
    <td width="10" ></td>
    <td>
    <div class="example_post">
    <font color="black" size="1"><b>Waits.</b><br />Waits For Detect motion <font color="red">(Second)</font> Default=30<br />
    </div>
    </td>
  </tr>
  <tr>
    <td class="td_right">Waits</td>
    <td>:</td>
    <td height="30">
      <input type="hidden" id="waits_old" value="<? echo $waits;?>">
      <? echo m('waits',$waits,'1'); ?> <label> sec.</label>
    </td>
  </tr>
<tr><td></td><td colspan="2"><hr class="hr_alert_day"></td></tr>
  <tr>
    <td width="150" class="td_right"></td>
    <td width="10" ></td>
    <td>
    <div class="example_post">
    <font color="black" size="1"><b>Days.</b><br />Day Of Remove Video <font color="red">(Days)</font> Default=90<br />
    </div>
    </td>
  </tr>
  <tr>
    <td class="td_right">Days</td>
    <td>:</td>
    <td height="30">
      <input type="hidden" id="days_old" value="<? echo $days;?>">
      <input id="days" type="text" size="7"  value="<? echo $days; ?>"> <label> Days.</label>
    </td>
  </tr>
<tr><td></td><td colspan="2"><hr class="hr_alert_day"></td></tr>
  <tr>
    <td width="150" class="td_right"></td>
    <td width="10" ></td>
    <td>
    <div class="example_post">
    <font color="black" size="1"><b>Size.</b><br />Size Of Remove Video when Minimum Hard disk size<font color="red">(MB)</font> Default=100<br />
    </div>
    </td>
  </tr>
  <tr>
    <td class="td_right">Size</td>
    <td>:</td>
    <td height="30">
      <input type="hidden" id="size_old" value="<? echo $size;?>">
      <input id="size" type="text" size="7"  value="<? echo $size; ?>"> <label> MB.</label>
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
