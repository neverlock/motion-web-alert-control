<?php
include("control/authentication.php");
?>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Motion Web Alert Control :: Login</title>
<link rel="stylesheet" type="text/css" href="css/login.css" >
<script type="text/javascript" language="Javascript" SRC="javascript/login.js"></script>
</head>
<body>
<form id="start" action="login.php" method="post" autocomplete="off" onsubmit="return login_validate()">
	<h1>Motion Web Alert Control System</h1>
	<p>
		<label for="name_mwap">USERNAME :</label>
		<input id="name_mwap" name="user_mwap" type="text">
	</p>
	<p>
		<label for="password_mwap">PASSWORD :</label>
		<input id="password_mwap" name="pass_mwap" type="password">
	</p>
	<p>
		<input type="submit" name="btnLogin" value="Login">
	</p>
	<div id="error">
		<div id="msg_error"><font color="red" >* Authentication Failed !</font></div>
	</div>
</form>
<p id="credits"><strong>Motion Web Alert Control System Project Co-operative at NECTEC 2011.</strong><br>
By : Chagridsada Boonthus | Supervisor : Chanchai Junlouchai.</p>
</body></html>
