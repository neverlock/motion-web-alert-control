<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Motion Web Alert Control :: Passwoed-Gen</title>
<link rel="stylesheet" type="text/css" href="css/login.css" >
<link rel="stylesheet" type="text/css" href="css/popup.css" >
<script type="text/javascript" language="Javascript" SRC="javascript/pass_gen.js"></script>
<script type="text/javascript" language="Javascript" SRC="javascript/jquery/1.4.1/jquery.min.js"></script>
<script type="text/javascript" language="Javascript" SRC="javascript/jquery/1.4.1/popup_ready.js"></script>
</head>
<body>
<form autocomplete="off" onsubmit="return password_gen()">
	<h1>Motion Web Alert Control System</h1>
	<p>
		<label for="pass_gen">PASSWORD :</label>
		<input id="pass_gen" name="pass_gen" type="text">
	<p>
		<input type="submit" value="Password-Gen">
		<a href="#?w=500" rel="pass_make" class="poplight">
		<input id="btnGen_pass" type="button" value="GenPass" style="display:none;">
		</a>
	</p>
</form>
<!--POPUP START-->
<div id="pass_make" class="popup_block">
<center>
	<pre>Password in System Configuration</pre><br />
	<strong><div id="password_gen"></div></strong>
</center>
</div>
<!--POPUP END-->
<p id="credits"><strong>Motion Web Alert Control System Project Co-operative at NECTEC 2011.</strong><br>
By : Chagridsada Boonthus | Supervisor : Chanchai Junlouchai.</p>
</body></html>
