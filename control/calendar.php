<?php
$ym = $_GET['year_month'];
if ($ym != ""){
$normal= `find /var/www/Surveillance/ -type f|grep "$ym" | awk -F"/" '{print $7}' | tr "\n" "|"`;
$intru = `find /var/www/Surveillance/ -type f|grep "$ym" | grep "/INTRU/" | awk -F"/" '{print $7}' | tr "\n" "|"`;
$power = `find /var/www/Surveillance/ -type f|grep "$ym" | grep "/POWER/" | awk -F"/" '{print $7}' | tr "\n" "|"`;
$_normal = implode("-",array_unique(explode("|", $normal)));
$_intru = implode("-",array_unique(explode("|", $intru)));
$_power = implode("-",array_unique(explode("|", $power)));
$ar_normal = explode("-",$_normal);
$ar_intru = explode("-",$_intru);
$ar_power = explode("-",$_power);
$day = array(-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1);
for($i=0;$i<count($ar_normal)-1;$i++){
	$day[(int)($ar_normal[$i])] = 0;
}
for($i=0;$i<count($ar_intru)-1;$i++){
        $day[(int)($ar_intru[$i])] += 1;
}
for($i=0;$i<count($ar_power)-1;$i++){
        $day[(int)($ar_power[$i])] += 5;
}
$g=""; $y=""; $b=""; $r="";
for($i=1;$i<=31;$i++){
	switch ($day[$i]){
		case 0:
			$n = $n.",".$i;
			break;
		case 1: 
                        $y = $y.",".$i;  
                        break;

		case 4: 
                        $b = $b.",".$i;  
                        break;

		case 5: 
                        $b = $b.",".$i;  
                        break;

		case 6: 
                        $r = $r.",".$i;  
                        break;
	}
}
echo $n; echo "|"; echo $y; echo "|"; echo $b; echo "|"; echo $r;
}
?>
