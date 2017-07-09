<?php 
function getstamp($rdate){

$x=substr($rdate,0,2);
$y=substr($rdate,3,2);
$z=substr($rdate,6,4);
$rdate=$z.$y.$x;
return $rdate;


}

function datereverse($date){
$a=substr($date,0,2);
$b=substr($date,3,2);
$c=substr($date,6,4);
$d=$c.'/'.$b.'/'.$a;
return $d;  
}

function dateprint($date){
$a=substr($date,0,4);
$b=substr($date,5,2);
$c=substr($date,8,2);
$d=$c.'/'.$b.'/'.$a;
return $d;	
}
function getuser($user){
     $resulta =mysql_query("select * from users where name='".$user."' limit 0,1");
     $row=mysql_fetch_array($resulta);
     return stripslashes($row['fullname']);
}

?>