<?php
session_start();
        if ( $_SESSION['session_mwap_id'] <> session_id() ){
                header("location:logout.html");
	exit();
        }
?>
<ul id="nav_setting_menu" class="setting_menu">
	<li class="current"><a> :: Setting :: </a></li>
	<li<? echo $alert_current; ?>><a href="#" onclick="loadXMLDoc('view/setting_alert.php') ; return false">Alert</a>
		<ul>
			<li><a href="#" onclick="loadXMLDoc('view/setting_alert_intrude.php') ; return false">Intrude</a></li>
			<li><a href="#" onclick="loadXMLDoc('view/setting_alert_powerdown.php') ; return false">PowerDown</a></li>
		</ul>
	</li>
	<li<? echo $video_current; ?>><a href="#" onclick="loadXMLDoc('view/setting_video.php') ; return false">Video</a>
		<ul>
			<li><a href="#">Add Group</a></li>
			<li><a href="#">Add Video</a></li>
		</ul>
	</li>	
	<li<? echo $layout_current; ?>><a href="#" onclick="loadXMLDoc('index.html') ; return false">Layout</a></li>
	<li<? echo $short_url_current; ?>><a href="#" onclick="loadXMLDoc('view/setting_short_url.php') ; return false">Short-URL</a></li>
	<li<? echo $sms_current; ?>><a href="#" onclick="loadXMLDoc('view/setting_sms.php') ; return false">SMS-Gateway</a></li>
</ul>
