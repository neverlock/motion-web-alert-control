<?php
  /*Check login!*/
  session_start();
  if ( $_SESSION['session_mwap_id'] <> session_id() ){
    echo 'logout';
    exit();
  }
  /*global*/
  $path_save = "../view/layout.php";

 $st = 
  '<style> #ch_0 { margin:0px; padding:0px; border-width:0px; border-spacing:5px; border-collapse: separate; empty-cells:hide;} #ch_0 td {border-width:1px; margin:0px; padding:0px; border-style:dotted; border-color:#aaaaaa;} #ch_0 img { width:100%; height:auto; } </style>';
 $z = '<table id="tb_zoom" class="button_zoom"><tr><td><b>ZOOM : </b><a class=\'button orange small\' onclick=\'zoom_out()\'>-</a><a class=\'button orange medium\' onclick=\'zoom_in()\'>+</a></td></tr></table>';
 $z .= '<table id="zoom" class="table_zoom"><tr><td>';
 $_z = '</td></tr></table>';
  function save_layout(){
    global $path_save; 
    global $st; global $z; global $_z;
    $data = trim($_POST['data']);
    `echo "$st$z$data$_z" > $path_save`;
     $a = strlen(`cat $path_save`);
     $b =  strlen(`echo "$st$z$data$_z"`);
     if ("$a" == "$b"){
       echo 'save';
     }
  }

  switch ($_POST['action'])
  {
    case 'save'  : save_layout();  break;
  }
?>
