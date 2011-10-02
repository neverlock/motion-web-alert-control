<?php
include('control/check_login.php');
?>
<html>
<head>
<?php include('view/head.php');?>
</head>
<body>
<!-- main -->
<div id="main">
	<!-- Header -->
	<?php include('view/header.php');?>
	<!-- /header -->
	<?php include('view/topmenu.php');?>
	<!-- box-center -->
	<div id="col-top"></div>
	<div id="col" class="box">
		<!-- menu-page -->
		<table><tr>
			<td>
			    <div id="menu">
				<?php include('view/menu.php');?>
			    <div>
			</td>
			<td class="v_top">
			    <div id="page" class="col1" >
		                <?php include('view/page.php');?>
              		    </div>
			</td>
		</tr></table>
		
		<!-- /menu-page -->
	</div>
	<div id="col-bottom"></div>
	<!-- /box-center -->
<!-- Footer -->
    <div id="footer">
     <?php include('view/footer.php');?>
    </div> <!-- /footer -->
</div>
<!-- /main -->
</body>
</html>
