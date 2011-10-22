<?php
include('config.php');
  /*Check login!*/
  session_start();
  if ( $_SESSION['session_mwap_id'] <> session_id() ){
    echo 'logout';
    exit();
  }

  function html_group($name,$date){
    return '<input type="button" class="button white" value="'.$name.'" style="margin:10px"
             onclick="even_view(\''.$name.'\',\''.$date.'\')">';
  }

  function gen_group(){ 
    global $FILE_GROUP;
    $year = $_POST['year']; $month = $_POST['month']; $day = $_POST['day'];
    $file =  `cat $FILE_GROUP`;
    $html_group = '<div style="margin:20px"><center>';
    $html_group .= '<h2>'."$day-$month-$year".' , Please select Group.</h2>';
    foreach (split("\n",$file) as $val){
      $val = trim($val);
      if ($val != ""){
         $html_group .= html_group($val,"$year-$month-$day");
      }
    }
    $html_group .= html_group('Undefined Group',"$year-$month-$day");
    $html_group .= '</center></div>';
    echo $html_group;
  }
  
  function find_camera($group){
    global $FILE_GROUP_THREAD;
    $camera = `cat $FILE_GROUP_THREAD | grep '$group' | awk -F'=' '{print $1}'`;
    $c = ''; $ca = '';
    foreach (split("\n",$camera) as $val){
      $val = trim($val);
      if ($val != ""){
        $ca .= $c.'CAMERA'.((int)$val); $c = '|';
      }
    }
    return $ca;
  }

  function format_size($size) {
    $sizes = array(" B", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
    if($size == 0) { return('n/a'); } else {
      return (round($size/pow(1024, ($i = floor(log($size, 1024)))), 2). $sizes[$i]); }
  }

  function even_view(){
    global $PATH_VIDEO;
    $group = $_POST['group']; $date = $_POST['date'];
    $html = '<h2 style="margin:20px">'."$group , $date".'</h2>';
    $camera = explode('|',find_camera($group));
    if(strlen($camera[0]) == 0){ $camera[0] = 'not'; } 
    $video = array();
    foreach($camera as $val){
      $key = $val.'_'.$date;
      $find_avi = `find "$PATH_VIDEO/" -type f|grep "$key"|awk -F"$key" '{print $2}'|grep .avi|awk -F"." '{print $1}'|sort`;
      foreach( split("\n",$find_avi) as $avi){
        $avi = trim($avi);
        if ($avi != '') { $video["$key$avi"] = 0; }
      }
      $find_alert = `find "$PATH_VIDEO/" -type f|grep "$key"|grep "INTRU"|awk -F"$key" '{print $2}'|grep .jpg|awk -F"." '{print $1}'`;
      foreach( split("\n",$find_alert) as $alert){
        $alert = trim($alert);
        if ($alert != '') { $video["$key$alert"] = 1; }
      }
      $find_power = `find "$PATH_VIDEO/" -type f|grep "$key"|grep "POWER"|awk -F"$key" '{print $2}'|grep .txt|awk -F"." '{print $1}'`;
      foreach( split("\n",$find_power) as $power){
        $power = trim($power);
        if ($power != '') { $video["$key$power"] += 2; }
      }
      $ar_pic = array(); $i = 0;
      $find_pic  = `find "$PATH_VIDEO/" -type f|grep "$key"|grep "PIC"|awk -F"$key" '{print $2}' | sort`;
      foreach( split("\n",$find_pic) as $pic){
        $pic = trim($pic);
        if ($pic != '') { $ar_pic[$i] = ",$key$pic"; $i++; }
      }
      $i = 0;
      foreach($video as $key=>$value){
       $video[$key] .= $ar_pic[$i]; $i++;
      }
    }
    for($i=0;$i<3;$i++){
      for($j=0;$j<10;$j++){
        $html .= "<label style=\"margin:20px\">@ $i$j:00 - $i$j:59</label><br />"; 
        $html .= '<table class="table_rec"><tr><td>';
        foreach($video as $key=>$value){
          $time = split('-',$key); $sec = $time[3]; $time = split('_',$time[2]);
          if($time[1] == "$i$j"){
            $value = split(',',$value);
            $cam = split('_',$key);
            $cam = split('CAMERA',$cam[0]);
            $cam = (((int)$cam[1]) <10 ? "0$cam[1]" : $cam[1]) ;
            $pf = $PATH_VIDEO.'/'.str_replace('-','/',$date);
            $img = (trim($value[1]) == '' ? 'images/recording.jpg' : $pf.'/PICT/'.$value[1]);
            $avi = $pf.'/'.$key.'.avi';
            $html .= '<a href="even_view"> <div class="even_'.$value[0].'" onclick="view_file(\''.$avi.'\');return false">';
            $html .= '<table class="table_even">';
	    $html .= '	<tr> <td width="150"><img src="'.$img.'"></td> <td> <table class="table_even1"> <tr><td><b>CAMERA:</b> '.$cam.'</td></tr> <tr><td><b>Time:</b> '.$time[1].':'.$sec.'</td></tr> <tr><td><b>Size:</b> '.format_size(filesize($avi)).'</td></tr> </table> </td> </tr> <tr> <td colspan="2"><b>File:</b> '.$key.'.avi</td> </tr>';
            $html .= '</table></div></a>';
          }
        }
        $html .= '</td></tr></table>'; 
        if("$i$j" == "23"){ break; }
      }
    }
    echo $html;
  }

  switch ($_POST['action'])
  {
    case 'gen_group'  : gen_group();  break;
    case 'even_view'  : even_view();  break;
  }
?>
