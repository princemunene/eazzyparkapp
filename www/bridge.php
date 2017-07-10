<?php 
include "db_fns.php";
$id=$_GET['id'];
switch($id){
case 1:
$data=array();
$user=$_GET['user'];
$result =mysql_query("select * from users where name='".$user."'");
while ($row=mysql_fetch_array($result)){
 $data[]=$row;
}
echo json_encode($data);
break;

case 2:
$data=array();
$result =mysql_query("select * from accesstbl");
while ($row=mysql_fetch_array($result)){
 $data[]=$row;
}
echo json_encode($data);
break;


case 3:
$data=array();
$result =mysql_query("select * from company");
while ($row=mysql_fetch_array($result)){
 $data[]=$row;
}
echo json_encode($data);
break;

case 4:
$data=array();
$ticketno=$_GET['ticketno'];
$result =mysql_query("select * from parking where ticketno='".$ticketno."' limit 0,1");
while ($row=mysql_fetch_array($result)){
 $data[]=$row;
}
echo json_encode($data);
break;

case 5:
$data=array();
$param=$_GET['param'];
$result =mysql_query("select * from parking where status=1 and regn like '%".$param."%'  order by regn");
while ($row=mysql_fetch_array($result)){
 $data[]=$row;
}
echo json_encode($data);
break;

case 6:
$ticketno=$_GET['ticketno'];
$result =mysql_query("select * from parking where ticketno='".$ticketno."' limit 0,1");
$row=mysql_fetch_array($result);
$data=array();

 $from_time = strtotime(stripslashes($row['checkintimestamp']));
$to_time = strtotime(date('YmdHi'));

$minutes= round(abs($to_time - $from_time) / 60,2);

$timediff='';
$datetime1 = new DateTime(stripslashes($row['checkintimestamp']));
$datetime2 = new DateTime(date('YmdHi'));
$interval = $datetime1->diff($datetime2);
if($interval->format('%d')>0){$timediff.=$interval->format('%d')." Days ";}
if($interval->format('%h')>0){$timediff.=$interval->format('%h')." Hours ";}
if($interval->format('%i')>0){$timediff.=$interval->format('%i')." Minutes ";}


if($minutes>240){

$min=$minutes-240;
$hours=ceil($min/60);
$amount=150+($hours*50);
$parkcateg=6;


}else{
$resultx =mysql_query("select * from rates where upper>='".$minutes."' and lower<='".$minutes."' limit 0,1");
$rowx=mysql_fetch_array($resultx);
$amount=stripslashes($rowx['amount']);
$parkcateg=stripslashes($rowx['id']);
}

//if(stripslashes($row['naivas'])==1&&$minutes<=30){$amount=0;}
if(stripslashes($row['reserved'])==1){$amount=0;echo"<script>$('#reservediv').show();</script>";}

echo"<script>
 $('#regn').val('".stripslashes($row['regn'])."');
 $('#checkintimestamp').val('".stripslashes($row['checkintimestamp'])."');
 $('#checkintimestamp2').val('".stripslashes($row['checkindate'])." ".stripslashes($row['checkintime'])."');
 $('#checkout').val('".date('d/m/Y')." ".date('h:i A')."');
 $('#checkoutdate').val('".date('d/m/Y')."');
 $('#checkouttime').val('".date('h:i A')."');
 $('#parkcateg').val('".$parkcateg."');
 $('#checkouttimestamp').val('".date('YmdHi')."');
 $('#timediff').val('".$timediff."');
 $('#amount').val('".number_format($amount, 2, ".", "," )."');
 
</script>";




break;





}
?>