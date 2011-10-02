function login_validate()
{
    msg = "";
    user = document.getElementById('name_mwap').value;
    pass = document.getElementById('password_mwap').value;  
    if (user.length < 1)
    {
        msg = msg + "* Username is required ";
        document.getElementById('name_mwap').focus();
    }
    if(pass.length < 1)
    {
        msg = msg + "* Password is required ";
        if (user.length > 0)
        {
            document.getElementById('password_mwap').focus();
        }
    }
    if (msg != "")
    {
	document.getElementById('msg_error').innerHTML = msg;
	document.getElementById('error').style.display  = "block";
	return false;
    }
}

window.onload = function(){
	document.getElementById('name_mwap').focus();
};
