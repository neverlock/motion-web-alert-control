<?php
$video_current = ' class="current"';
include('setting_menu.php');
?>
<?
  /*global*/
  $group_thread_conf = "/etc/motion-web-alert-plugin/group/group-thread.conf";
  $thread_path = "/etc/motion-web-alert-plugin/thread";
  $group_conf = "/etc/motion-web-alert-plugin/group/group.conf";

  function sg($name){
    global $group_conf;
    $sg_val = "<select name=\"$name\">";
    $sg_val .= "\n<option value='Undefined Group' SELECTED>Undefined Group</option>";
    $file =  `cat $group_conf`;
    foreach (split("\n",$file) as $val){
      $val = trim($val);
      if ($val != ""){
          $sg_val .= "\n<option value='$val'>$val</option>";
      }
    }
    $sg_val .= "\n</select>";
    return $sg_val;
  }

  function gen_video($id,$group,$type,$dt1,$dt2,$on,$u,$p){
   $gen_val =
     '<div id="dv_'.$id.'">
      <hr class="no_show">
      <input id="tv_'.$id.'" type="text" size="10" value="CAMERA '.$id.'" readonly="readonly" 
        title="'.$dt2.' , Port:100'.$id.'">
      <input id="tg_'.$id.'" type="text" size="20" value="'.$group.'" readonly="readonly"
        title="'.$dt2.' , Port:100'.$id.'">
      <input id="cv_'.$id.'" type="checkbox" '.$on.' disabled>
      <input id="be_'.$id.'" type="button" value="Edit" class="button blue small"
        onclick="cf_edit_video(\''.$id.'\',\''.$type.'\',\''.$group.'\',\''.trim($dt2).'\',\''.$on.'\',\''.trim($u).'\',\''.trim($p).'\')">
      <input id="bd_'.$id.'" type="button" value="Delete" class="button red small"
        onclick="cf_del_video(\''.$id.'\')">
      <div id="de_'.$id.'"></div></div>';
    return $gen_val;
  }

  $file = `cat $group_thread_conf`;
  $video = ''; 
  $sp = split("\n",$file); 
  for ($i=count($sp)-1 ; $i >= 0 ; $i--){
    $val = trim($sp[$i]);
    if ($val != ""){
       $id_g = split('=',$val);
       $id = $id_g[0];
       $dt = `cat $thread_path/thread$id.conf | head -1`;
       $on = `cat $thread_path/thread$id.conf | grep "#on_movie_start"`;
       $on = ($on == '' ? 'checked' : '');
       $dt_val = split(' ',$dt);
       $type = ($dt_val[0] == "videodevice" ? "dev" : "ip");
       $user_pass = `cat $thread_path/thread$id.conf | grep netcam_userpass | awk -F' ' '{print $2}'`;
       $u_p = split(':',$user_pass);
       $video .= gen_video($id,$id_g[1],$type,$dt_val[0],$dt_val[1],$on,$u_p[0],$u_p[1]);
    }
  }
?>
<div class="setting_div" >
  <font size="2">
  <fieldset class="fieldset_setting">
    <legend class="legend_setting">Add / Edit Video Setting</legend>
      <fieldset class="fieldset_setting">
        <!--Add video--!>
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
          <input type="hidden" name="action" value="add">
          <table class="table_0">
            <tr>
              <td class="td_right"><label>device</label></td>
              <td height="20">:</td>
              <td>
                <input id="name_dev" name="dev_ip" type="text">
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
                <input type="button" class="button green small" value="Add Video" onclick="add_video('dev')">
                <input type="button" class="button red small" value="Cancel" onclick="cancel_add_video('dev')">
              </td>
            </tr>
          </table> 
        </form>
        </div>
        <div id="dt_ip" class="div_in_leg" style="display:none">
	<form id="f_ip">
          <input type="hidden" name="type" value="ip">
          <input type="hidden" name="action" value="add">
          <table class="table_0">
            <tr>
              <td class="td_right_top"><label>url</label></td>
              <td height="20" class="td_top">:</td>
              <td>
                <textarea id="name_ip" name="dev_ip"rows="2" cols="50"></textarea>
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
                <input type="button" class="button green small" value="Add Video" onclick="add_video('ip')">
                <input type="button" class="button red small" value="Cancel" onclick="cancel_add_video('ip')">
              </td>
            </tr>
          </table> 
        </form>
        </div>
        <!--/Add video--!>
      </fieldset>
      <fieldset class="fieldset_setting">
        <legend class="legend_setting">All Video</legend>
          <!--Group--!>
          <div id="video">
           <? echo $video; ?>
          </div>
          <!--/Group--!>
      </fieldset>
  </fieldset>
  </font>
</div>
