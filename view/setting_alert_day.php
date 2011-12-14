<?php
$alert_current = ' class="current" ';
include('setting_menu.php');
include('setting_function.php');
?>
<?	
function h($name,$select,$dis){
  $dis = ("$dis" == "1" ? "" : "disabled=\"disabled\"");
  $hr = "<select id=\"$name\" $dis>";
  for($i=0;$i<=2;$i++){
    for($j=0;$j<=9;$j++){
      if($select == "$i$j"){
        $hr .= "\n<option value='$i$j' SELECTED>$i$j</option>"; 
      }else{
        $hr .= "\n<option value='$i$j'>$i$j</option>";
      }
      if("$i$j" == "23"){
        $hr .= "\n</select>";
        return $hr;
      }
    }
  }
}

function m($name,$select,$dis){
  $dis = ("$dis" == "1" ? "" : "disabled=\"disabled\"");
  $hr = "<select id=\"$name\" $dis>";
  for($i=0;$i<=5;$i++){
    for($j=0;$j<=9;$j++){
      if($select == "$i$j"){
        $hr .= "\n<option value='$i$j' SELECTED>$i$j</option>"; 
      }else{
        $hr .= "\n<option value='$i$j'>$i$j</option>";
      }
      if("$i$j" == "59"){
        $hr .= "\n</select>";
        return $hr;
      }
    }
  }
}

function day($day_full,$day,$val_day,$time_all,$time){
 $html = 
 ' <tr>
    <td>
      <input id="'.$day.'" type="checkbox" safari=1 '.$val_day.' 
onclick="document.getElementsByName(\''.$day.'_time\')[0].disabled = (this.checked ? true : false);
document.getElementsByName(\''.$day.'_time\')[1].disabled = (this.checked ? true : false);
document.getElementById(\'hr_'.$day.'_start\').disabled = (this.checked ? true : (document.getElementsByName(\''.$day.'_time\')[0].checked ? true : false));
document.getElementById(\'hr_'.$day.'_end\').disabled = (this.checked ? true : (document.getElementsByName(\''.$day.'_time\')[0].checked ? true : false));
document.getElementById(\'min_'.$day.'_start\').disabled = (this.checked ? true : (document.getElementsByName(\''.$day.'_time\')[0].checked ? true : false));
document.getElementById(\'min_'.$day.'_end\').disabled = (this.checked ? true : (document.getElementsByName(\''.$day.'_time\')[0].checked ? true : false));
">
      <label>'.$day_full.'</label>
    </td>
    <td width="10"></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td>
      <input type="hidden" id="'.$day.'_time_all_old" value="'.$time_all.'">
      <input value="all" name="'.$day.'_time" type="radio" safari=1 '.("$time_all" == "1" ? "checked" : "").' 
	'.("$val_day" == "checked" ? "" : "disabled").' 
onchange="
document.getElementById(\'hr_'.$day.'_start\').disabled = true;
document.getElementById(\'hr_'.$day.'_end\').disabled = true;
document.getElementById(\'min_'.$day.'_start\').disabled = true;
document.getElementById(\'min_'.$day.'_end\').disabled = true;
">
      <label>all times</label>
    </td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td>
      <input type="hidden" id="'.$day.'_time_old" value="'.$time.'">
      <input value="cus" name="'.$day.'_time" type="radio" safari=1 '.("$time_all" != "1" ? "checked" : "").' 
	'.("$val_day" == "checked" ? "" : "disabled").'
onchange="
document.getElementById(\'hr_'.$day.'_start\').disabled = false;
document.getElementById(\'hr_'.$day.'_end\').disabled = false;
document.getElementById(\'min_'.$day.'_start\').disabled = false;
document.getElementById(\'min_'.$day.'_end\').disabled = false;
">';

  list($start,$end) = split('[-.-]', $time);
  list($hr_start,$min_start) = split('[:.-]', $start);
  list($hr_end,$min_end) = split('[:.-]', $end);

  $time_all = ($val_day == "checked" ? ($time_all == "1" ? "1" : "0") : "1"); 
  $html .= h('hr_'.$day.'_start',$hr_start,!$time_all).' : '.m('min_'.$day.'_start',$min_start,!$time_all).' <-> ';
  $html .= h('hr_'.$day.'_end',$hr_end,!$time_all).' : '.m('min_'.$day.'_end',$min_end,!$time_all) ;  
$html .= '</td>
  </tr> ';
return $html;
}
  if (isset($_GET['mo'])){

     $mo = ($_GET['mo'] == "true" ? "Mon," : "");
     $tu = ($_GET['tu'] == "true" ? "Tue," : "");
     $we = ($_GET['we'] == "true" ? "Wed," : "");
     $th = ($_GET['th'] == "true" ? "Thu," : "");
     $fr = ($_GET['fr'] == "true" ? "Fri," : "");
     $sa = ($_GET['sa'] == "true" ? "Sat," : "");
     $su = ($_GET['su'] == "true" ? "Sun"  : "");

     $mo_time_all_old = $_GET['mo_time_all_old'];
     $tu_time_all_old = $_GET['tu_time_all_old'];
     $we_time_all_old = $_GET['we_time_all_old'];
     $th_time_all_old = $_GET['th_time_all_old'];
     $fr_time_all_old = $_GET['fr_time_all_old'];
     $sa_time_all_old = $_GET['sa_time_all_old'];
     $su_time_all_old = $_GET['su_time_all_old'];

     $mo_time_all = ($_GET['mo_time'] == "true" ? "1" : "0"); 
     $tu_time_all = ($_GET['tu_time'] == "true" ? "1" : "0"); 
     $we_time_all = ($_GET['we_time'] == "true" ? "1" : "0"); 
     $th_time_all = ($_GET['th_time'] == "true" ? "1" : "0"); 
     $fr_time_all = ($_GET['fr_time'] == "true" ? "1" : "0"); 
     $sa_time_all = ($_GET['sa_time'] == "true" ? "1" : "0"); 
     $su_time_all = ($_GET['su_time'] == "true" ? "1" : "0"); 

     $mo_time_old = $_GET['mo_time_old'];
     $tu_time_old = $_GET['tu_time_old'];
     $we_time_old = $_GET['we_time_old'];
     $th_time_old = $_GET['th_time_old'];
     $fr_time_old = $_GET['fr_time_old'];
     $sa_time_old = $_GET['sa_time_old'];
     $su_time_old = $_GET['su_time_old'];

     $alert_day = $_GET['alert_day'];

     $mo_time = $_GET['hr_mo_start'].":".$_GET['min_mo_start']."-".$_GET['hr_mo_end'].":".$_GET['min_mo_end'];
     $tu_time = $_GET['hr_tu_start'].":".$_GET['min_tu_start']."-".$_GET['hr_tu_end'].":".$_GET['min_tu_end'];
     $we_time = $_GET['hr_we_start'].":".$_GET['min_we_start']."-".$_GET['hr_we_end'].":".$_GET['min_we_end'];
     $th_time = $_GET['hr_th_start'].":".$_GET['min_th_start']."-".$_GET['hr_th_end'].":".$_GET['min_th_end'];
     $fr_time = $_GET['hr_fr_start'].":".$_GET['min_fr_start']."-".$_GET['hr_fr_end'].":".$_GET['min_fr_end'];
     $sa_time = $_GET['hr_sa_start'].":".$_GET['min_sa_start']."-".$_GET['hr_sa_end'].":".$_GET['min_sa_end'];
     $su_time = $_GET['hr_su_start'].":".$_GET['min_su_start']."-".$_GET['hr_su_end'].":".$_GET['min_su_end'];

     set_config('ALERT_DAY=',"$mo$tu$we$th$fr$sa$su",$alert_day);

     set_config('MO_ALL_TIME=',"$mo_time_all",$mo_time_all_old);
     set_config('TU_ALL_TIME=',"$tu_time_all",$tu_time_all_old);
     set_config('WE_ALL_TIME=',"$we_time_all",$we_time_all_old);
     set_config('TH_ALL_TIME=',"$th_time_all",$th_time_all_old);
     set_config('FR_ALL_TIME=',"$fr_time_all",$fr_time_all_old);
     set_config('SA_ALL_TIME=',"$sa_time_all",$sa_time_all_old);
     set_config('SU_ALL_TIME=',"$su_time_all",$su_time_all_old);

     set_config('MO_TIME=',"$mo_time",$mo_time_old);
     set_config('TU_TIME=',"$tu_time",$tu_time_old);
     set_config('WE_TIME=',"$we_time",$we_time_old);
     set_config('TH_TIME=',"$th_time",$th_time_old);
     set_config('FR_TIME=',"$fr_time",$fr_time_old);
     set_config('SA_TIME=',"$sa_time",$sa_time_old);
     set_config('SU_TIME=',"$su_time",$su_time_old);
     
     }
	$mo_all_time = load_config('MO_ALL_TIME=');
	$tu_all_time = load_config('TU_ALL_TIME=');
	$we_all_time = load_config('WE_ALL_TIME=');
	$th_all_time = load_config('TH_ALL_TIME=');
	$fr_all_time = load_config('FR_ALL_TIME=');
	$sa_all_time = load_config('SA_ALL_TIME=');
	$su_all_time = load_config('SU_ALL_TIME=');

	$alert_day = load_config('ALERT_DAY=');
	$mo_val_day = (`cat $path_conf | grep ALERT_DAY= | grep Mon` == "" ? "" : "checked"); 
	$tu_val_day = (`cat $path_conf | grep ALERT_DAY= | grep Tue` == "" ? "" : "checked"); 
	$we_val_day = (`cat $path_conf | grep ALERT_DAY= | grep Wed` == "" ? "" : "checked"); 
	$th_val_day = (`cat $path_conf | grep ALERT_DAY= | grep Thu` == "" ? "" : "checked"); 
	$fr_val_day = (`cat $path_conf | grep ALERT_DAY= | grep Fri` == "" ? "" : "checked"); 
	$sa_val_day = (`cat $path_conf | grep ALERT_DAY= | grep Sat` == "" ? "" : "checked"); 
	$su_val_day = (`cat $path_conf | grep ALERT_DAY= | grep Sun` == "" ? "" : "checked"); 

	$mo_time = load_config('MO_TIME=');
	$tu_time = load_config('TU_TIME=');
	$we_time = load_config('WE_TIME=');
	$th_time = load_config('TH_TIME=');
	$fr_time = load_config('FR_TIME=');
	$sa_time = load_config('SA_TIME=');
	$su_time = load_config('SU_TIME=');

?>
<form autocomplete="off" onsubmit="loadXMLDoc(
'view/setting_alert_day.php' +
load_alert1() +
'' ); apprise(':: Save Setting ::'); return false">
<div class="setting_div" >
<fieldset class="fieldset_setting">
<legend class="legend_setting">Date of Alert Setting</legend>

<input type="hidden" id="alert_day" value="<? echo $alert_day;?>">
<table class="table_setting1">
<!--day--!>
<?
echo day("Monday","mo",$mo_val_day,$mo_all_time,$mo_time);
echo '<tr><td colspan="3"><hr class="hr_alert_day"></td></tr>';
echo day("Tuesday","tu",$tu_val_day,$tu_all_time,$tu_time);
echo '<tr><td colspan="3"><hr class="hr_alert_day"></td></tr>';
echo day("Wednesday","we",$we_val_day,$we_all_time,$we_time);
echo '<tr><td colspan="3"><hr class="hr_alert_day"></td></tr>';
echo day("Thursday","th",$th_val_day,$th_all_time,$th_time);
echo '<tr><td colspan="3"><hr class="hr_alert_day"></td></tr>';
echo day("Friday","fr",$fr_val_day,$fr_all_time,$fr_time);
echo '<tr><td colspan="3"><hr class="hr_alert_day"></td></tr>';
echo day("Saturday","sa",$sa_val_day,$sa_all_time,$sa_time);
echo '<tr><td colspan="3"><hr class="hr_alert_day"></td></tr>';
echo day("Sunday","su",$su_val_day,$su_all_time,$su_time);
?>
<!--/day--!>
</table>
<!--/end_day!--!>
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
