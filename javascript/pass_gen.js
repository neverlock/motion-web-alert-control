var obj_option = false;
if (window.XMLHttpRequest) {
	obj_option = new XMLHttpRequest();
} else if (window.ActiveXObject) {
	obj_option = new ActiveXObject();
}
function password_gen() {
	pass = document.getElementById('pass_gen').value;
	if (obj_option) {
		obj_option.open("GET", "control/pass_gen.php?pass="+encodeURIComponent(pass));
                    obj_option.onreadystatechange = function () {
                        if (obj_option.readyState == 4 && obj_option.status == 200) {
                            document.getElementById('password_gen').innerHTML = obj_option.responseText;
                        }
                    }
                    obj_option.send(null);
                }
	document.getElementById('btnGen_pass').click();
//	document.getElementById('pass_gen').focus();
return false;
}
