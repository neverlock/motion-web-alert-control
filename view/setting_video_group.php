<?php
$video_current = ' class="current"';
include('setting_menu.php');
?>
<?
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
    <legend class="legend_setting">Add / Edit Group Setting</legend>
      <fieldset class="fieldset_setting" style="width:90%">
        <!--Add group--!>
        <div class="div_in_leg">
          <label><b>New Group.</b></label><br />
          <label>Input : Group Name</label><br />
            <input id="group_name" type="text" size="30">
            <input type="button" class="button green small" value="Add Group" onclick="add_group()">
        </div>
        <!--/Add group--!>
      </fieldset>
      <fieldset class="fieldset_setting" style="width:90%">
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
