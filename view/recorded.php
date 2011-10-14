<?php
session_start();
        if ( $_SESSION['session_mwap_id'] <> session_id() ){
                header("location:logout.html");
        exit();
        }
?>
<h2>File Recorded</h2>
<div id="filetree" class="file_tree">
  <ul class="jqueryFileTree" style="">
   <li class="directory collapsed">
      <a href="" onclick="file_tree() ; return false">File Recorded.</a>
   </li>
  </ul>
</div>

