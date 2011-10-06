<?php
$video_current = ' class="current"';
include('setting_menu.php');
?>
<?

  function sg($name){
    $sg_val = "<select name=\"$name\">";
    $sg_val .= "\n<option value='Undefined Group' SELECTED>Undefined Group</option>";
    $file =  `cat /etc/motion-web-alert-plugin/group/group.conf`;
    foreach (split("\n",$file) as $val){
      $val = trim($val);
      if ($val != ""){
          $sg_val .= "\n<option value='$val'>$val</option>";
      }
    }
    $sg_val .= "\n</select>";
    return $sg_val;
  }

  function gen_group($id,$name){
   $gen_val =
     '<div class="div_tab50" id="dg_'.$id.'">
      <hr class="no_show">
      <input id="gn_'.$id.'" type="hidden" value="'.$name.'">
      <input id="tg_'.$id.'" type="text" size="30" value="'.$name.'" readonly="readonly">
      <input id="be_'.$id.'" type="button" value="Edit" class="button blue small"
        onclick="return (this.value == \'Edit\' ? cf_edit_group(\''.$id.'\') : 
        (this.value == \'Save\' ? edit_group(\''.$id.'\') : del_group(\''.$id.'\')))">
      <input id="bd_'.$id.'" type="button" value="Delete" class="button red small"
        onclick="return (this.value == \'Delete\' ? cf_del_group(\''.$id.'\') : cancel_group(\''.$id.'\'))">
      </div>';
    return $gen_val;
  }
  $file =  `cat /etc/motion-web-alert-plugin/group/group.conf`; 
  $group = ''; $i=0;
  $id = time();
  foreach (split("\n",$file) as $val){
    $val = trim($val);
    if ($val != ""){
       $group .= gen_group($id-$i,$val);
       $i--;
    }
  }
?>
<div class="setting_div" >
  <font size="2">
  <fieldset class="fieldset_setting">
    <legend class="legend_setting">Add / Edit Video Setting</legend>
      <fieldset class="fieldset_setting">
        <!--Add group--!>
        <div class="div_in_leg">
          <label><b>New Video.</b></label><br />
          <label>Select video mode : </label>
          <input id="dev_id" value="dev" name="mode" type="radio" safari=1 checked>
          <label>Device</label>
          <input id="ip_id" value="ip" name="mode" type="radio" safari=1>
          <label>Ip</label>
          <input id="b_av" type="button" class="button green small" value="Add Video" onclick="cf_add_video()">
        </div>
        <div id="dt_dev" class="div_in_leg" style="display:none">
	<form id="f_dev">
          <input type="hidden" name="type" value="dev">
          <table class="table_0">
            <tr>
              <td class="td_right"><label>device</label></td>
              <td height="20">:</td>
              <td>
                <input name="dev_ip" type="text">
                <b>  ex. </b>
                <font color="red"> /dev/video0</font>
              </td>
            </tr>
            <tr>
              <td class="td_right"><label>group</label></td>
              <td height="25">:</td>
              <td><? echo sg('group'); ?></td>
            </tr>
            <tr>
              <td class="td_right"><label>alert</label></td>
              <td height="20">:</td>
              <td><input name="alert" type="checkbox"></td>
            </tr>
            <tr>
              <td class="td_right"><label>name</label></td>
              <td height="20">:</td>
              <td><input id="tc_dev" name="name" type="text" value="" size="15"  readonly></td>
            </tr>
            <tr>
              <td class="td_right"><label>port</label></td>
              <td height="20">:</td>
              <td><input id="tp_dev" name="port" type="text" value="" size="7"  readonly></td>
            </tr>
            <tr>
              <td height="20" colspan="2"></td>
              <td>
                <input type="button" class="button green small" value="Add Video" onclick="add_video(f_dev)">
                <input type="button" class="button red small" value="Cancel" onclick="cancel_add_video('dev')">
              </td>
            </tr>
          </table> 
        </form>
        </div>
        <div id="dt_ip" class="div_in_leg" style="display:none">
	<form id="f_ip">
          <input type="hidden" name="type" value="ip">
          <table class="table_0">
            <tr>
              <td class="td_right_top"><label>url</label></td>
              <td height="20" class="td_top">:</td>
              <td>
                <textarea name="dev_ip"rows="2" cols="50"></textarea>
              </td>
            </tr>
            <tr>
              <td class="td_right"><label>user</label></td>
              <td height="20">:</td>
              <td><input name="user" type="text" size="15"></td>
            </tr>
            <tr>
            <tr>
              <td class="td_right"><label>password</label></td>
              <td height="20">:</td>
              <td><input name="password" type="password" size="15"></td>
            </tr>
            <tr>
            <tr>
              <td class="td_right"><label>group</label></td>
              <td height="25">:</td>
              <td><? echo sg('group'); ?></td>
            </tr>
            <tr>
              <td class="td_right"><label>alert</label></td>
              <td height="20">:</td>
              <td><input name="alert" type="checkbox"></td>
            </tr>
            <tr>
              <td class="td_right"><label>name</label></td>
              <td height="20">:</td>
              <td><input id="tc_ip" name="name" type="text" value="" size="15"  readonly></td>
            </tr>
            <tr>
              <td class="td_right"><label>port</label></td>
              <td height="20">:</td>
              <td><input id="tp_ip" name="port" type="text" value="" size="7"  readonly></td>
            </tr>
            <tr>
              <td height="20" colspan="2"></td>
              <td>
                <input type="button" class="button green small" value="Add Video" onclick="add_video(f_ip)">
                <input type="button" class="button red small" value="Cancel" onclick="cancel_add_video('ip')">
              </td>
            </tr>
          </table> 
        </form>
        </div>
        <!--/Add group--!>
      </fieldset>
      <fieldset class="fieldset_setting">
        <legend class="legend_setting">All Group</legend>
          <!--Group--!>
          <div id="group">
           <? echo $group; ?>
          </div>
          <!--/Group--!>
          <!--Undefined Group--!>
          <div class="div_tab50">
            <hr class="no_show">
            <input type="text" size="30" value="Undefined Group" readonly>
            <label><b>default Group</b></label>
          </div>
          <!--/Undefined Group--!>
      </fieldset>
  </fieldset>
  </font>
</div>
