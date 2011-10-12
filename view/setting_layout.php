<?php
$layout_current = ' class="current"';
include('setting_menu.php');
include('setting_function.php');
?>
<?
/*
  if (isset($_GET['short_url_user'])){
     $short_url_user = $_GET['short_url_user'];
     set_config('IMGUR_KEY=',$imgur_key,$imgur_key_old);
     }
	$imgur_key = load_config('IMGUR_KEY=');
*/
?>
<div class="setting_div" >
<fieldset class="fieldset_setting">
<legend class="legend_setting">Layout Setting</legend>
<table width="400" height="350" class="layout">
  <tr>
    <td height="300">
      <table id="ch_0"class="normal">
      </table>
    </td>
  </tr>
  <tr>
     <td>
         <a href="" onclick="$('#ch_0').html($('#1ch').html());init_1ch();return false">
           <table id="1ch" class="layout_list">
             <tr><td id="1c1">
             </td></tr>
           </table>
         </a>
         <a href="" onclick="$('#ch_0').html($('#3ch').html())init_3ch();return false">
           <table id="3ch" class="layout_list">
             <tr><td id="3c1"colspan="2"></td></tr>
             <tr><td id="3c2"></td><td id="3c3"></td></tr>
           </table>
         </a>
         <a href="" onclick="$('#ch_0').html($('#4ch').html());return false">
           <table id="4ch" class="layout_list">
             <tr><td width="50%" height="50%"></td><td></td></tr>
             <tr><td></td><td></td></tr>
           </table>
           </a>
         <a href="" onclick="$('#ch_0').html($('#6ch').html());return false">
         <table id="6ch" class="layout_list">
             <tr><td></td><td></td></tr>
             <tr><td></td><td></td></tr>
             <tr><td></td><td></td></tr>
           </table>
         </a>
         <a href="" onclick="$('#ch_0').html($('#9ch').html());return false">
           <table id="9ch" class="layout_list">
             <tr><td></td><td></td><td></td></tr>
             <tr><td></td><td></td><td></td></tr>
             <tr><td></td><td></td><td></td></tr>
           </table>
           </a>
         <a href="" onclick="$('#ch_0').html($('#6ch_2').html());return false">
         <table id="6ch_2" class="layout_list">
             <tr><td colspan="2" rowspan="2"></td><td></td></tr>
             <tr><td></td></tr>
             <tr><td></td><td></td><td></td></tr>
           </table>
           </a>
         <a href="" onclick="$('#ch_0').html($('#10ch').html());return false">
         <table id="10ch" class="layout_list">
             <tr><td colspan="2" rowspan="2"></td><td colspan="2" rowspan="2"></td></tr>
             <tr></tr>
             <tr><td></td><td></td><td></td><td></td></tr>
             <tr><td></td><td></td><td></td><td></td></tr>
           </table>
         </a>
         <a href="" onclick="$('#ch_0').html($('#16ch').html());return false">
           <table id="16ch" class="layout_list">
             <tr><td></td><td></td><td></td><td></td></tr>
             <tr><td></td><td></td><td></td><td></td></tr>
             <tr><td></td><td></td><td></td><td></td></tr>
             <tr><td></td><td></td><td></td><td></td></tr>
           </table>
           </a>
         <a href="" onclick="$('#ch_0').html($('#25ch').html());return false">
         <table id="25ch" class="layout_list">
             <tr><td></td><td></td><td></td><td></td><td></td></tr>
             <tr><td></td><td></td><td></td><td></td><td></td></tr>
             <tr><td></td><td></td><td></td><td></td><td></td></tr>
             <tr><td></td><td></td><td></td><td></td><td></td></tr>
             <tr><td></td><td></td><td></td><td></td><td></td></tr>
           </table>
         </a>
     </td>
  </tr>
</table>
<table width="180" height="350" class="layout">
  <tr><td>
    <ul class="camera_list">
        <li><b>Undefined Group</b></li>
        <ul class="camera_list_in">
           <li onclick="return false"><a href="camera:http://localhost:10001/">CAMERA 01</a></li>
           <li>CAMERA 2</li>
           <li>CAMERA 3</li>
           <li>CAMERA 4</li>
           <li>CAMERA 5</li>
        </ul>
        <li><b>GROUP_2</b></li>
        <ul class="camera_list_in">
           <li>CAMERA 1</li>
           <li>CAMERA 2</li>
           <li>CAMERA 3</li>
        </ul>
        <li><b>GROUP_1</b></li>
        <ul class="camera_list_in">
           <li>CAMERA 1</li>
           <li>CAMERA 2</li>
           <li>CAMERA 3</li>
           <li>CAMERA 4</li>
           <li>CAMERA 5</li>
        </ul>
        <li><b>GROUP_1</b></li>
        <ul class="camera_list_in">
           <li>CAMERA 1</li>
           <li>CAMERA 2</li>
           <li>CAMERA 3</li>
           <li>CAMERA 4</li>
           <li>CAMERA 5</li>
        </ul>
    </ul>
  </td></tr>
</table>
<input style="margin-left:140px" class="button black medium" value="   Save Setting   " type="button">
</fieldset>
</div>
