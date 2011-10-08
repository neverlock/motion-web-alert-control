<?php
  /*Check login!*/
  session_start();
  if ( $_SESSION['session_mwap_id'] <> session_id() ){
    echo 'logout';
    exit();
  }
  /*global*/
  $group_conf = "/etc/motion-web-alert-plugin/group/group.conf";
  $group_thread_conf = "/etc/motion-web-alert-plugin/group/group-thread.conf ";

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

  function add_group(){
    global $group_conf;
    $g_n = $_POST['group_name'];
    if (`cat $group_conf | grep "^$g_n$"` != ''){
      exit();
    }
    `echo $g_n >> $group_conf`;
    if (`cat $group_conf | grep "^$g_n$"` == ''){
      exit();
    } 
    $id = time(); 
    $html = gen_group($id,$g_n);
    echo $html;
  }

  function del_group(){
    global $group_conf;
    global $group_thread_conf;
    $g_n = trim($_POST['group_name']);
    $id = time(); 
    if (`cat $group_conf | grep "^$g_n$"` == ''){
      exit();
    }
    `cat $group_conf | grep -v "^$g_n$" > /tmp/$id`;
    `cat /tmp/$id > $group_conf`;
    `rm /tmp/$id`;
     $old = rep_spc($g_n);
     $new = "Undefined Group";  
    `sed -i "s/$old$/$new/g" $group_thread_conf`;
    if (`cat $group_conf | grep "^$g_n$"` == ''){
      echo 'deleted';
    }
  }

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

  switch ($_POST['action'])
  {
    case 'add'  : add_group();  break;
    case 'del'  : del_group();  break;
    case 'edit' : edit_group(); break;
  }
?>
