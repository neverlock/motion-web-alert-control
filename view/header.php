<div id="header">
<h1 id="logo"><a href="./main.php" title="Motion Web Alert Control System :: MAIN"><img src="images/nectec_logo.png" alt="" /></a><font size="3">Today : <?php echo date("D d-M-Y"); ?>  &nbsp;&nbsp;<b id="time"></b></font></h1>
<script>
<!--
function show(){
var Digital=new Date()
var hours=Digital.getHours()
var minutes=Digital.getMinutes()
var seconds=Digital.getSeconds()
var dn="AM" 
if (hours>=12)
dn="PM"
if (hours>12)
hours=hours-12
if (hours==0)
hours=12
if (minutes<=9)
minutes="0"+minutes
if (seconds<=9)
seconds="0"+seconds
document.getElementById('time').innerHTML = hours+":"+minutes+":"
+seconds+" "+dn
setTimeout("show()",1000)
}
show()
//-->

</script>
<hr class="noscreen" />
<!-- Navigation -->
<div id="nav">
<input id="btn_menu" class="button white medium" value="Hide-Menu" type="button"> <span>|</span>
<a id="btn_logout" href="#" class="button red medium">Logout</a>
</div> <!-- /nav -->
</div> 
