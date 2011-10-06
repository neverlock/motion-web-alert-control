/*Add-Edit-Group*/
function add_group(){
  var g = jQuery.trim($('#group_name').val());
  if(g.length < 1 || g =='Undefined Group')return false;
  $.post('control/group.php',{action:'add',group_name: g},function(result){
    if(result != ''){
      $('#group_name').val('');
      $('#group').prepend(result);
    }
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
    }else { return false; }
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
    }else { return false; }
  });
  $('#dev_id').prop('disabled', true);
  $('#ip_id').prop('disabled', true);
  $('#b_av').hide();
  $('#dt_'+id).show(250);
  return false;
}

function cancel_add_video(id){
  $('#dev_id').prop('disabled', false);
  $('#ip_id').prop('disabled', false);
  $('#b_av').show();
  $('#f_'+id)[0].reset();
  $('#dt_'+id).hide(200);
return false;
}

function add_video(form){
  if(jQuery.trim($('[name=dev_ip]',form).val())==""){
    $('[name=dev_ip]',form).focus();
    return false;
  }
var str = $(form).serialize();
alert(str);
return false;
}
