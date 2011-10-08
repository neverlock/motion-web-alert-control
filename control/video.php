<?php
  /*Check login!*/
  session_start();
  if ( $_SESSION['session_mwap_id'] <> session_id() ){
    echo 'logout';
    exit();
  }
  /*global*/
  $group_thread_conf = "/etc/motion-web-alert-plugin/group/group-thread.conf ";
  $thread_path = "/etc/motion-web-alert-plugin/thread";
  $group_conf = "/etc/motion-web-alert-plugin/group/group.conf";

  function rep_spc($str){
    $tmp = '';
    for ($i=0;$i<strlen($str);$i++){
      switch ($str[$i]){
        case '/' : $tmp .= '\/'; break;
        case '&' : $tmp .= '\&'; break;
        case '!' : $tmp .= '\!'; break;
        case '@' : $tmp .= '\@'; break;
        case '#' : $tmp .= '\#'; break;
        case '$' : $tmp .= '\$'; break;
        case '%' : $tmp .= '\%'; break;
        case '^' : $tmp .= '\^'; break;
        case '*' : $tmp .= '\*'; break;
        case '=' : $tmp .= '\='; break;
        case '[' : $tmp .= '\['; break;
        case '`' : $tmp .= '\`'; break;
        default  : $tmp .= $str[$i];
      }
    }
    return $tmp;
  }

  function number_video(){
    global $group_thread_conf;
    $read = `cat $group_thread_conf | awk -F'=' '{print $1}' | sort | tail -1`;
    $num = intval($read) + 1;
    $num = ($num < 10 ? "0$num" : "$num");
    echo trim($num);
  }
/*
  function set_config($old,$new){
    global $group_conf;
    $new = trim($new);
    $old = trim($old);
    if( $new <> $old ) {
      $old = rep_spc($old);
      $new = rep_spc($new);
      `sed -i "s/^$old$/$new/g" $group_conf`;
    }
  }
*/
  function gen_video($id,$group,$type,$dt,$on,$u,$p){
   $gen_val =
     '<div id="dv_'.$id.'">
      <hr class="no_show">
      <input id="tv_'.$id.'" type="text" size="10" value="CAMERA '.$id.'" readonly="readonly" 
        title="'.$dt.' , Port:100'.$id.'">
      <input id="tg_'.$id.'" type="text" size="20" value="'.$group.'" readonly="readonly"
        title="'.$dt.' , Port:100'.$id.'">
      <input id="cv_'.$id.'" type="checkbox" '.$on.' disabled>
      <input id="be_'.$id.'" type="button" value="Edit" class="button blue small"
        onclick="cf_edit_video(\''.$id.'\',\''.$type.'\',\''.$group.'\',\''.trim($dt).'\',\''.$on.'\',\''.trim($u).'\',\''.trim($p).'\')">
      <input id="bd_'.$id.'" type="button" value="Delete" class="button red small"
        onclick="cf_del_video(\''.$id.'\')">
      <div id="de_'.$id.'"></div></div>';
    return $gen_val;
  }

  function sg($name,$select){
    global $group_conf;
    $sg_val = "<select name=\"$name\">";
    $sg_val .= "\n<option value='Undefined Group'>Undefined Group</option>";
    $file =  `cat $group_conf`;
    foreach (split("\n",$file) as $val){
      $val = trim($val);
      if ($val != ""){
          if($val == $select){
            $sg_val .= "\n<option value='$val' SELECTED>$val</option>";
          }else{
            $sg_val .= "\n<option value='$val'>$val</option>";
          }
      }
    }
    $sg_val .= "\n</select>";
    return $sg_val;
  }

  function cf_edit_video(){
    $id  = $_POST['id'];
    $type  = $_POST['t'];
    $group  = $_POST['g'];
    $dt  = $_POST['n'];
    $on  = $_POST['on'];
    $u  = $_POST['u'];
    $p  = $_POST['p'];
    if($type == "dev"){
      $html = 
	'<form id="f_dev_'.$id.'">
          <input type="hidden" name="type" value="dev">
          <input type="hidden" name="action" value="edit">
          <table class="table_0">
            <tr>
              <td class="td_right"><label>device</label></td>
              <td height="20">:</td>
              <td>
                <input id="name_dev_'.$id.'" name="dev_ip" type="text" value="'.$dt.'">
                <b>  ex. </b>
                <font color="red"> /dev/video0</font>
              </td>
            </tr>
            <tr>
              <td class="td_right"><label>group</label></td>
              <td height="25">:</td>
              <td>'.sg("group",$group).'</td>
            </tr>
            <tr>
              <td class="td_right"><label>alert</label></td>
              <td height="20">:</td>
              <td><input name="alert" type="checkbox" '.$on.'></td>
            </tr>
            <tr>
              <td class="td_right"><label>name</label></td>
              <td height="20">:</td>
              <td><input  name="name" type="text" value="CAMERA '.$id.'" size="15" readonly></td>
            </tr>
            <tr>
              <td class="td_right"><label>port</label></td>
              <td height="20">:</td>
              <td><input  name="port" type="text" value="100'.$id.'" size="7" readonly></td>
            </tr>
            <tr>
              <td height="20" colspan="2"></td>
              <td>
                <input type="button" class="button green small" value="Save" onclick="edit_video(\''.$id.'\')">
                <input type="button" class="button red small" value="Cancel" onclick="$(\'#f_dev_'.$id.'\').remove()">
              </td>
            </tr>
          </table> 
        </form>';
    }else if($type == "ip"){
       $html = 
	 '<form id="f_ip_'.$id.'">
          <input type="hidden" name="type" value="ip">
          <input type="hidden" name="action" value="add">
          <table class="table_0">
            <tr>
              <td class="td_right_top"><label>url</label></td>
              <td height="20" class="td_top">:</td>
              <td>
                <textarea id="name_ip_'.$id.'" name="dev_ip"rows="2" cols="50">'.$dt.'</textarea>
              </td>
            </tr>
            <tr>
              <td class="td_right"><label>user</label></td>
              <td height="20">:</td>
              <td><input name="user" type="text" value="'.$u.'" size="15"></td>
            </tr>
            <tr>
            <tr>
              <td class="td_right"><label>password</label></td>
              <td height="20">:</td>
              <td><input name="password" type="password" value="'.$p.'" size="15"></td>
            </tr>
            <tr>
            <tr>
              <td class="td_right"><label>group</label></td>
              <td height="25">:</td>
              <td>'.sg("group",$group).'</td>
            </tr>
            <tr>
              <td class="td_right"><label>alert</label></td>
              <td height="20">:</td>
              <td><input name="alert" type="checkbox" '.$on.'></td>
            </tr>
            <tr>
              <td class="td_right"><label>name</label></td>
              <td height="20">:</td>
              <td><input  name="name" type="text" value="CAMERA '.$id.'" size="15"  readonly></td>
            </tr>
            <tr>
              <td class="td_right"><label>port</label></td>
              <td height="20">:</td>
              <td><input  name="port" type="text" value="100'.$id.'" size="7"  readonly></td>
            </tr>
            <tr>
              <td height="20" colspan="2"></td>
              <td>
                <input type="button" class="button green small" value="Save" onclick="edit_video(\''.$id.'\')">
                <input type="button" class="button red small" value="Cancel" onclick="$(\'#f_ip_'.$id.'\').remove()">
              </td>
            </tr>
          </table> 
        </form>';
    }else{ exit();}
  echo $html;
  }

  function add_video(){
    global $group_thread_conf;
    global $thread_path;
    $type  = trim($_POST['type']);
    $d_ip  = trim($_POST['dev_ip']);
    $name  = trim($_POST['name']);
    $port  = trim($_POST['port']);
    $user  = trim($_POST['user']);
    $pass  = trim($_POST['password']);
    $group = trim($_POST['group']); 

    $user_pass = ($user == '' && $pass == '' ? "#netcam_userpass :" : "netcam_userpass $user:$pass");
    $text  = ($type == "dev" ? 'videodevice '.$d_ip."\n" : 'netcam_url '.$d_ip."\n".$user_pass."\n");
    $text .= 'text_left '.$name."\n";
    $text .= 'webcam_port '.$port."\n";
    $text .= (isset($_POST['alert']) ? 'on_movie_start /usr/local/bin/motion-web-alert-plugin/alert.sh %f'
           : '#on_movie_start /usr/local/bin/motion-web-alert-plugin/alert.sh %f');

    $num = split(' ',$name);
    $num = $num[1];
    if (`cat $group_thread_conf | cut -b1-2 | grep "^$num$"` != ''){
      exit();
    }
    $msg = "$num=$group"; 
    `echo "$msg" >> $group_thread_conf`;
    `echo "$text" > $thread_path/thread$num.conf`;
    echo gen_video($num,$group,$type,$d_ip,(isset($_POST['alert'])? 'checked' : ''),$user,$pass);
  }

  function del_video(){
    global $group_thread_conf;
    global $thread_path; 
    $id = $_POST['video_id'];
    $time = time(); 
    `cat $group_thread_conf | grep -v "^$id=" > /tmp/$time`;
    `cat /tmp/$time > $group_thread_conf`;
    `rm /tmp/$time`;
    `rm $thread_path/thread$id.conf`; 
     if (`cat $group_thread_conf | grep "^$id="` == ''){
       echo 'deleted';
     }
  }
/*
  function edit_group(){
    global $group_conf;
    $g_n = $_POST['group_name'];
    $g_n_o = $_POST['group_name_old'];
    $id = time(); 
    if ((`cat $group_conf | grep "^$g_n_o$"` == '') || (`cat $group_conf | grep "^$g_n$"` != '')){
      exit();
    }
    set_config($g_n_o,$g_n);
    if (`cat $group_conf | grep "^$g_n$"` != ''){
      echo 'edited';
    }
  } 
*/
  switch ($_POST['action'])
  {
    case 'get_num'  : number_video();  break;
    case 'add'  : add_video();  break;
    case 'cf_edit'  : cf_edit_video();  break;
    case 'edit'  : edit_video();  break;
    case 'del'  : del_video();  break;
  }
?>
