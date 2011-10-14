/*Add-Edit-Group*/
function add_group(){
  var g = jQuery.trim($('#group_name').val());
  if(g.length < 1 || g =='Undefined Group')return false;
  $.post('control/group.php',{action:'add',group_name: g},function(result){
    if(result != ''){
      $('#group_name').val('');
      $('#group').prepend(result);
    }else if(result == 'logout'){ window.location = 'index.php';
    }else { apprise('Add failed!') ; return false; }
  $('#group_name').select();
  });
}

function cf_edit_group(id){
  $('#tg_'+id).prop('readonly', false);
  $('#be_'+id).val('Save');
  $('#bd_'+id).val('Cancel');
  $('#tg_'+id).select();
return false;  
}

function cf_del_group(id){
  $('#tg_'+id).prop('disabled', true);
  $('#be_'+id).val('Delete?');
  $('#bd_'+id).val('Cancel');
return false;
}

function cancel_group(id){
  $('#tg_'+id).val($('#gn_'+id).val());
  $('#tg_'+id).prop('readonly', true);
  $('#tg_'+id).prop('disabled', false);
  $('#be_'+id).val('Edit');
  $('#bd_'+id).val('Delete');
return false;
}

function del_group(id){
  $.post('control/group.php',{action:'del',group_name: $('#gn_'+id).val()},function(result){
    if(result == 'deleted'){
      $('#dg_'+id).remove();
      return false;
    }else if(result == 'logout'){ window.location = 'index.php';
    }else { apprise('Delete failed!') ; return false; }
  });
}

function edit_group(id){
  $.post('control/group.php',{action:'edit',group_name: $('#tg_'+id).val()
  ,group_name_old: $('#gn_'+id).val()},function(result){
    if(result == 'edited'){
      $('#gn_'+id).val($('#tg_'+id).val());
      $('#tg_'+id).prop('readonly', true);
      $('#be_'+id).val('Edit');
      $('#bd_'+id).val('Delete');
      return false;
    }else if(result == 'logout'){ window.location = 'index.php';
    }else { $('#tg_'+id).select(); return false; }
  });
}

/*Add-Edit-Video*/
function cf_add_video(){
  var id = $('input:radio[name=mode]:checked').val();
  $.post('control/video.php',{action:'get_num'},function(result){
    if(result.length == 2){
      $('#tc_'+id).val('CAMERA '+result);
      $('#tp_'+id).val('100'+result);
    }else if(result == 'logout'){ window.location = 'index.php';
    }else { apprise('Load failed!'); }
  });
  $('#dev_id').prop('disabled', true);
  $('#ip_id').prop('disabled', true);
  $('#b_av').hide();
  $('#dt_'+id).hide().fadeIn();
}

function cancel_add_video(id){
  $('#dev_id').prop('disabled', false);
  $('#ip_id').prop('disabled', false);
  $('#b_av').show();
  $('#f_'+id)[0].reset();
  $('#dt_'+id).hide(50).fadeOut();
}

function add_video(id){
  if(jQuery.trim($('#name_'+id).val())==""){
    $('#name_'+id).select();
    return false;
  }
  var data = $('#f_'+id).serialize();
  $.post('control/video.php',data,function(result){
    if(result != ''){
      $('#video').prepend(result);
      $('#dev_id').prop('disabled', false);
      $('#ip_id').prop('disabled', false);
      $('#b_av').show();
      $('#dt_'+id).hide();
      $('#f_'+id)[0].reset();
      checkbox_on();
    }else if(result == 'logout'){ window.location = 'index.php';
    }else { apprise('Add failed!') ; }
  });
}

function cf_edit_video(id,t) {
  var g = $('#tg_'+id).val();
  $.post('control/video.php',{action: 'cf_edit',id: id,t: t,g:g},function(result){
    if(result != ''){
      $('#de_'+id).html(result);
      checkbox_on();
    }else if(result == 'logout'){ window.location = 'index.php';
    }else { apprise('Load failed!') ;}
  });
}

function cf_del_video(id) {
  apprise('<b>Delete Video ?</b><br />Name : CAMERA '+ id ,
  {'verify':true, 'textYes':'Delete!', 'textNo':'Cancel'},
   function(r) {
     if(r) { 
       $.post('control/video.php',{action: 'del',video_id: id},function(result){
         if(result == 'deleted'){
           $('#dv_'+id).remove();
         }else if(result == 'logout'){ window.location = 'index.php';
         }else { apprise('Delete failed!') ;}
       });
     }
   });
}

function edit_video (f_id,id) {
  var data = $('#'+f_id).serialize();
  var port = $('input:text[name=port]','#'+f_id).val();
  var input = $('[name=dev_ip]','#'+f_id).val();
  var group = $('select[name=group]','#'+f_id).val();
  $.post('control/video.php',data,function(result){
    if(result == 'edited'){
       $('#tv_'+id).attr('title', input+' , port:'+port);
       $('#tg_'+id).attr('title', input+' , port:'+port);
       $('#tg_'+id).val(group);
       $('#'+f_id).remove();
    }else if(result == 'logout'){ window.location = 'index.php';
    }else { apprise('Edit failed!') ;}
  });
}

/*layout save*/
function save_layout(){
 var data = $('#main_layout').html();
 $.post('control/layout.php',{action:'save',data: data },function(result){
    if(result == 'save'){
      apprise(':: Save setting ::');
    }else if(result == 'logout'){ window.location = 'index.php';
    }else { apprise('Save failed!') ;}
  });
}

/*file tree*/
function file_tree(){
    $('#filetree').fileTree({ root: '../../Surveillance/', script: 'control/jqueryFileTree.php' }, function(file) { 
      if(file.substring(file.length - 3) == 'jpg'){
         apprise('<img width="250" height="auto" src="'+file+'">', 
         {'verify':true, 'textYes':'View full size', 'textNo':'Exit!'},function(r) {
           if(r){
             myWindow=window.open(file,'','width=auto,height=auto');
             myWindow.focus();
           }
        });
      }else{
             myWindow=window.open(file,'','width=auto,height=auto');
             myWindow.focus();
      }
    });
}
