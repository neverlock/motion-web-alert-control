$(function(){
    // Datepicker
    $('#datepicker').datepicker({
      inline: true
    });
  });

$(function() {
	function hide_menu() {
		if ( document.getElementById('btn_menu').value  == "Hide-Menu" ){
			$( "#menu" ).removeAttr( "style" ).show().fadeOut();
			document.getElementById('btn_menu').value = "Show-Menu";
		}else{
			$( "#menu" ).removeAttr( "style" ).hide().fadeIn();
			document.getElementById('btn_menu').value  = "Hide-Menu"	
		}
	};

	$( "#btn_menu" ).click(function() {
		hide_menu();
		return false;
	});

	$('#datepicker').datepicker({
		inline: true
	});

	$( "#btn_logout" ).click(function() {
        	$.post("control/logout.php");
		window.location = './'       
	});

});

function loadXMLDoc(url)
{
document.getElementById("page").innerHTML='<h2><font color=red>&nbsp;&nbsp;<img src="images/loader.gif">&nbsp;&nbsp;Loading....</font></h2>';
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
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
}

function load_page(year,month,day) {
	var str_url = 'view/even.php?y='+year+'&m='+((month+1)<10?"0"+(month+1):(month+1))+'&d='+(day<10?"0"+day:day);
	loadXMLDoc(str_url);
	return false;
};
