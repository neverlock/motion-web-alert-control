<?php
$layout_current = ' class="current"';
include('setting_menu.php');
include('setting_function.php');
?>
<?
  $group_thread_conf = '/etc/motion-web-alert-plugin/group/group-thread.conf';
  $only_group = `cat $group_thread_conf | awk -F'=' '{print $2}'`;
  $file = `cat $group_thread_conf`;
  $sp_g = split("\n",$file);
  $list = '';
  foreach (split("\n",$only_group) as $val){
    $t_val = trim($val);
    if ($t_val != ""){
      $group[] = $t_val;
    }
  }
  $group = array_unique($group); 
  foreach($group as $val){
     $list .= '<li><b>'.$val.'</b></li><ul class="camera_list_in">';
    foreach($sp_g as $g){
      $g_val = split('=',$g);
      if($val == $g_val[1]){
         $list .= '<li onclick="return false"><a href="camera:http://localhost:100'.$g_val[0].'/">CAMERA '.$g_val[0].'</a></li>';  
      } 
    }
    $list .= '</ul>';
  }
?>
<div class="setting_div">
<fieldset class="fieldset_setting">
<legend class="legend_setting">Layout Setting</legend>
<table width="400" height="350" class="layout">
  <tr>
    <td id="main_layout" height="300">
      <table id="ch_0" class="normal">
      </table>
    </td>
  </tr>
  <tr>
     <td>
         <a href="" onclick="$('#ch_0').html($('#1ch').html());init_1ch();return false">
           <table id="1ch" class="layout_list">
             <tr><td id="c1-1"></td></tr>
           </table>
         </a>
         <a href="" onclick="$('#ch_0').html($('#3ch').html());init_3ch();return false">
           <table id="3ch" class="layout_list">
             <tr><td id="c3-1"colspan="2" height="60%"></td></tr>
             <tr><td id="c3-2" width="50%"></td><td id="c3-3"></td></tr>
           </table>
         </a>
         <a href="" onclick="$('#ch_0').html($('#4ch').html());init_4ch();return false">
           <table id="4ch" class="layout_list">
             <tr><td id="c4-1" width="50%" height="50%"></td><td id="c4-2"></td></tr>
             <tr><td id="c4-3"></td><td id="c4-4"></td></tr>
           </table>
         </a>
         <a href="" onclick="$('#ch_0').html($('#6ch').html());init_6ch();return false">
           <table id="6ch" class="layout_list">
             <tr><td id="c6-1" width="50%" height="34%"></td><td id="c6-2"></td></tr>
             <tr><td id="c6-3" height="33%"></td><td id="c6-4"></td></tr>
             <tr><td id="c6-5"></td><td id="c6-6"></td></tr>
           </table>
         </a>
         <a href="" onclick="$('#ch_0').html($('#9ch').html());init_9ch();return false">
           <table id="9ch" class="layout_list">
             <tr><td id="c9-1" width="34%"></td><td id="c9-2" width="33%"></td><td id="c9-3"></td></tr>
             <tr><td id="c9-4" height="33%"></td><td id="c9-5"></td><td id="c9-6"></td></tr>
             <tr><td id="c9-7" height="33%"></td><td id="c9-8"></td><td id="c9-9"></td></tr>
           </table>
         </a>
         <a href="" onclick="$('#ch_0').html($('#10ch').html());init_10ch();return false">
           <table id="10ch" class="layout_list">
             <tr><td colspan="2" rowspan="2" id="c10-1"></td><td colspan="2" rowspan="2" id="c10-2"></td></tr>
             <tr></tr>
             <tr height="25%"><td id="c10-3" width="25%"></td><td id="c10-4" width="25%"></td><td id="c10-5" width="25%"></td><td id="c10-6"></td></tr>
             <tr height="25%"><td id="c10-7"></td><td id="c10-8"></td><td id="c10-9"></td><td id="c10-10"></td></tr>
           </table>
         </a>
         <a href="" onclick="$('#ch_0').html($('#16ch').html());init_16ch();return false">
           <table id="16ch" class="layout_list">
             <tr height="25%"><td id="c16-1" width="25%"></td><td id="c16-2" width="25%"></td><td id="c16-3" width="25%"></td><td id="c16-4" width="25%"></td></tr>
             <tr height="25%"><td id="c16-5"></td><td id="c16-6"></td><td id="c16-7"></td><td id="c16-8"></td></tr>
             <tr height="25%"><td id="c16-9"></td><td id="c16-10"></td><td id="c16-11"></td><td id="c16-12"></td></tr>
             <tr height="25%"><td id="c16-13"></td><td id="c16-14"></td><td id="c16-15"></td><td id="c16-16"></td></tr>
           </table>
         </a>
         <a href="" onclick="$('#ch_0').html($('#25ch').html());init_25ch();return false">
           <table id="25ch" class="layout_list">
             <tr height="20%"><td id="c25-1" width="20%"></td><td id="c25-2" width="20%"></td><td id="c25-3" width="20%"></td><td id="c25-4" width="20%"></td><td id="c25-5" width="20%"></td></tr>
             <tr height="20%"><td id="c25-6"></td><td id="c25-7"></td><td id="c25-8"></td><td id="c25-9"></td><td id="c25-10"></td></tr>
             <tr height="20%"><td id="c25-11"></td><td id="c25-12"></td><td id="c25-13"></td><td id="c25-14"></td><td id="c25-15"></td></tr>
             <tr height="20%"><td id="c25-16"></td><td id="c25-17"></td><td id="c25-18"></td><td id="c25-19"></td><td id="c25-20"></td></tr>
             <tr height="20%"><td id="c25-21"></td><td id="c25-22"></td><td id="c25-23"></td><td id="c25-24"></td><td id="c25-25"></td></tr>
           </table>
         </a>
     </td>
  </tr>
</table>
<table width="180" height="350" class="layout">
  <tr><td>
    <ul class="camera_list">
     <? echo $list; ?>
    </ul>
  </td></tr>
</table>
<input style="margin-left:140px" class="button black medium" value="   Save Setting   " type="button" onclick="save_layout()">
</fieldset>
</div>
