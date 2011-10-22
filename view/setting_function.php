<?php
$path_conf='/etc/motion-web-alert-plugin/motion-web-alert-plugin.conf';

function url_rep($str){
  $tmp = '';
  for ($i=0;$i<strlen($str);$i++){
    switch ($str[$i]){
	case '/' : 
		$tmp .= '\/';
		break;
	case '&' :
		$tmp .= '\&';
		break;
	case '!' :
		$tmp .= '\!';
		break;
	case '@' :
		$tmp .= '\@';
		break;
	case '#' :
		$tmp .= '\#';
		break;
	case '$' :
		$tmp .= '\$';
		break;
	case '%' :
		$tmp .= '\%';
		break;
	case '^' :
		$tmp .= '\^';
		break;
	case '*' :
		$tmp .= '\*';
		break;
	case '=' :
		$tmp .= '\=';
		break;
	default : 
		$tmp .=  $str[$i];
    }
  }
 return $tmp;
}

function set_config($msg,$new,$old){
global $path_conf;
  $new = trim($new);
  $old = trim($old);
  if( $new <> $old ) {
    $old = url_rep($old);
    $new = url_rep($new);
    `sed -i "s/$msg$old/$msg$new/g" $path_conf`;
  }
}

function load_config($msg){
global $path_conf;
  return trim(`cat $path_conf | grep $msg | awk -F "$msg" '{print $2}'`);
}

?>
