<?php
  /*Check login!*/
  session_start();
  if ( $_SESSION['session_mwap_id'] <> session_id() ){
    echo 'logout';
    exit();
  }
?>
<h2 style="margin-left:20px">View File Recorded</h2>
<div id="filetree" class="file_tree">
  <ul class="jqueryFileTree" style="">
   <li class="directory collapsed">
      <a href="File Recorded" onclick="file_tree() ; return false">File Recorded.</a>
   </li>
  </ul>
</div>

