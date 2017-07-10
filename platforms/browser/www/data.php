<?php include('db_fns.php'); 
$id=$_GET['id'];


switch($id){
	 
case 1:

$regn=strtoupper($_GET['regn']);
$naivas=$_GET['naivas'];
$reserved=$_GET['reserved'];
$username=$_GET['user'];

if($reserved==1){
//check if vehicle is reserved
	$result =mysql_query("select * from reserve where regn='".$regn."' and startstamp<='".date('Ymd')."'  and endstamp>='".date('Ymd')."' limit 0,1");
	$num_results = mysql_num_rows($result);
	if($num_results==0){

		echo '<script>swal("Error", "The vehicle does not have a current reservation!", "error");</script>';

	}

}



$resulty = mysql_query("select * from parking order by ticketno desc limit 0,1");
$rowy=mysql_fetch_array($resulty);
$ticketno=stripslashes($rowy['ticketno'])+1;

$result = mysql_query("INSERT INTO parking (id, ticketno, regn, naivas, checkindate,checkintime,  checkinstamp, checkintimestamp, checkinuser, status, reserved) VALUES ('0','".$ticketno."','".$regn."','".$naivas."','".date('d/m/Y')."','".date('h:i A')."','".date('Ymd')."','".date('YmdHi')."','".$username."','1','".$reserved."')");
if($result){
$resulta = mysql_query("insert into log values('0','".$username." generates ticket no-".$ticketno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");                         
$resultb = mysql_query("insert into vehiclelog values('0','".$regn." checks into the parking lot using ticket no-".$ticketno."','".$regn."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");                         

echo"<script>window.location.href = \"ticket.html?id=2&rcptno=".$ticketno.";\";</script>";
}
else{
	echo '<script>swal("Error", "Your Ticket has not been saved.", "error");</script>';
}



break;


case 2:

$ticketno=$_GET['ticketno'];

$resulty = mysql_query("select * from parking order by rcptno desc limit 0,1");
$rowy=mysql_fetch_array($resulty);
$rcptno=stripslashes($rowy['rcptno'])+1;

$resulty = mysql_query("select * from parking where ticketno='".$ticketno."' limit 0,1");
$rowy=mysql_fetch_array($resulty);
$regn=stripslashes($rowy['regn']);


$result = mysql_query("update parking set rcptno='".$rcptno."',parkcateg='".$_GET['parkcateg']."',checkoutdate='".$_GET['checkoutdate']."',checkouttime='".$_GET['checkouttime']."',checkoutstamp='".getstamp($_GET['checkoutdate'])."',checkouttimestamp='".$_GET['checkouttimestamp']."',checkoutuser='".$username."',timediff='".$_GET['timediff']."',amount='".$_GET['amount']."',paymode='Cash',status=2 WHERE ticketno='".$ticketno."'")  or die (mysql_error());
                                    
if($result){
$resulta = mysql_query("insert into log values('0','".$username." generates receipt no-".$rcptno."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");                         
$resultb = mysql_query("insert into vehiclelog values('0','".$regn." checks out of the parking lot using receipt no-".$rcptno."','".$regn."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");                         

echo"<script>window.location.href = \"main.php\";</script>";
echo"<script>window.open('report.php?id=2&rcptno=".$rcptno."');</script>";
}
else{
    echo '<script>swal("Error", "Your Receipt has not been saved.", "error");</script>';
}



break;

case 3:
                            
$userid=$_GET['userid'];
$opass=$_GET['opass'];
$npass=$_GET['npass'];
$cpass=$_GET['cpass'];
$resultx =mysql_query("select * from users where userid=".$userid."");
$row=mysql_fetch_array($resultx);
$kpass=stripslashes($row['password']);
$sopass=sha1($opass);

if($sopass!=$kpass){
echo '<script>swal("Error", "Your old password is wrong!", "error");</script>';

exit;
}
if($cpass!=$npass){
echo '<script>swal("Error", "Your New password does not match the confirmation detail!", "error");</script>';
exit;
}
else if($opass==$npass){
echo '<script>swal("Error", "Your old password cannot be the same as your new password!", "error");</script>';
exit;
}
else if((strlen($npass) > 16) || (strlen($npass) < 6)){
echo '<script>swal("Error", "Password length must be between 6 and 16 characters!", "error");</script>';
exit;
}
else {
$pass= sha1($npass);
$result = mysql_query("update users set password='".$pass."' where userid=".$userid."");

if($result){
$resulta = mysql_query("insert into log values('','".$username." updates login details.','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");  

echo '<script>swal("Success!", "Credentials updated!", "success");</script>';       

}
else{
echo '<script>swal("Error", "Details not updated!", "error");</script>';
}
}
break;

case 4:
$user=$_GET['user'];
$pos=$_GET['pos'];
$pass=$_GET['pass'];
$name=$_GET['name'];
$pass=sha1($pass);

$resultc = mysql_query("select * from users where name='".$name."'");
if(mysql_num_rows($resultc)>0){
echo '<script>swal("Error", "User name already exists!", "error");</script>';
exit;
}


$result = mysql_query("insert into users values('0','".$user."','".$pos."','".$pass."','".$name."')") or die (mysql_error());        
if($result){
$resulta = mysql_query("insert into log values('0','".$username." inserts new User into System.User NAME:".$name."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");   

echo'<script>setTimeout(function() {adduser();},500);</script>';
echo '<script>swal("Success!", "User Created!", "success");</script>';
}
else {
echo '<script>swal("Error", "User not Created!", "error");</script>';
}

break;

case 5:
                            
$user=strtoupper($_GET['user']);
$pos=$_GET['pos'];
$name=$_GET['name'];
$userid=$_GET['userid'];
$rec=$_GET['respass'];



if($rec==1){
$result = mysql_query("update users set password = sha1('password') where userid='".$userid."'")  or die (mysql_error());
}


$result = mysql_query("update users set position='".$pos."',name='".$user."',fullname='".$name."' where userid='".$userid."'");
if($result){
$resulta = mysql_query("insert into log values('0','".$username."  updates user data.User Id:".$user."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");   
echo '<script>swal("Success!", "Details updated!", "success");</script>';
}
else {
echo '<script>swal("Error", "Details not updated!", "error");</script>';
}

break;


case 6:
$categ=$_GET['categ'];
$code=$_GET['code'];
$rght=$_GET['rght'];


$result = mysql_query("update accesstbl set ".$categ."='".$rght."' where AccessCode='".$code."'");

if($result){
$resulta = mysql_query("insert into log values('0','".$username." updates user rights .User Id:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')"); 
}

break;

case 7:
$code=$_GET['code'];
$amount=$_GET['amount'];


$result = mysql_query("update rates set amount='".$amount."' where id='".$code."'");

if($result){
$resulta = mysql_query("insert into log values('0','".$username." updates rates table .Id:".$code."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')"); 
echo '<img src="images/checked.png" alt="" title="" /><script>swal("Success!", "Details updated!", "success");</script>';
}
else {
echo '<img src="images/checked.png" alt="" title="" /><script>swal("Error", "Details not updated!", "error");</script>';
}

break;

case 8:
$regn=strtoupper($_GET['regn']);
$tenant=$_GET['tenant'];
$from=$_GET['from'];
$to=$_GET['to'];
$unitno=$_GET['unitno'];
$amount=$_GET['amount'];

$result = mysql_query("insert into reserve values('0','".$regn."','".$tenant."','".$unitno."','".$from."','".getstamp($from)."','".$to."','".getstamp($to)."','".$amount."','".date('d/m/Y')."','".date('Ymd')."',1,'".$username."')") or die (mysql_error());        
if($result){
$resulta = mysql_query("insert into log values('0','".$username." inserts reserves vehicle parking.Regn:".$regn."','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");   
echo"<script>window.location.href = \"main.php\";</script>";
echo '<script>swal("Success!", "Vehicle Reserved!", "success");</script>';
}
else {
echo '<script>swal("Error", "Vehicle not Reserved!", "error");</script>';
}

break;


}
	