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
  '<style> #ch_0 img { width:100%; height:auto; } </style>';

  function save_layout(){
    global $path_save; 
    global $st; 
    $data = trim($_POST['data']);
    `echo "$st$data" > $path_save`;
     $a = strlen(`cat $path_save`);
     $b =  strlen(`echo "$st$data"`);
     if ("$a" == "$b"){
       echo 'save';
     }
  }

  switch ($_POST['action'])
  {
    case 'save'  : save_layout();  break;
  }
?>
