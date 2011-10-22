$(function() {
  /*Clock*/ 
  $('.jclock').jclock();
  /*Hide Menu*/
  function hide_menu() {
    if ($('#btn_menu').val() == "Hide-Menu" ){
      $('#menu').removeAttr("style").show().fadeOut();
      $('#btn_menu').val('Show-Menu');
    }else{
      $('#menu').removeAttr("style").hide().fadeIn();
      $('#btn_menu').val('Hide-Menu');
    }
  };

  $('#btn_menu').click(function() { hide_menu(); return false; });

  /*Data Picker*/
  $('#datepicker').datepicker({ inline: true });
 
  /*Logout*/
  $('#btn_logout').click(function() { 
    $.post('control/logout.php',function(result) {logout(result);});
    return false;
  });
});

/*Loading Status*/
function loading(bool){
  if(bool){ $('#loading').show(); }else{ $('#loading').delay(500).fadeOut(200).hide(0); }
}

function loadXMLDoc(url)
{
  loading(true);
var xmlhttp;
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("page").innerHTML=xmlhttp.responseText;
    checkbox_on();    
    }
  }
xmlhttp.open("GET",url,true);
xmlhttp.send();
loading(false);
}

/*Check Logout*/
function logout(result){
  if(result == 'logout'){ window.location = 'index.php'; }
}
/*Set Page*/
function set_page(result){
  $('#page').fadeOut(0).delay(100).html(result).fadeIn(300); 
}

/*Load Page*/
function load_page(url){
  loading(true);
  $.post(url, function(result){ logout(result);
      if(result != ''){ set_page(result); }else { apprise('Load failed!'); }
  checkbox_on();    
  loading(false); });
}

/*Even calendar*/
function even(year,month,day){
  loading(true);
  $.post('control/even.php',{action:'gen_group', year:year,
    month:((month+1) < 10 ? "0"+(month+1) : (month+1)), day:(day<10?"0"+day:day)},
    function(result){ logout(result);
      if(result != ''){ set_page(result); }else { apprise('Load failed!'); }
  loading(false); });
return false;
}

function even_view(group,date){
  loading(true);
  $.post('control/even.php',{action:'even_view', group:group, date:date},
    function(result){ logout(result);
      if(result != ''){ set_page(result); }else { apprise('Load failed!'); }
  loading(false); });
}

/*zoom in*/
function zoom_in() {
  var origin = $('#tb_zoom').width();
  var size = $('#zoom').width();
  var new_size = ((size * 100) / origin) + 10;
  if(new_size > 100){new_size = 100;}
  $('#zoom').width(new_size + '%');
}

/*zoom out*/
function zoom_out() {
  var origin = $('#tb_zoom').width();
  var size = $('#zoom').width();
  var new_size = ((size * 100) / origin) - 10;
  if(new_size > 30){ $('#zoom').width(new_size + '%'); } 
}
