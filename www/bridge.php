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
$rcptno=$_GET['rcptno'];
$result =mysql_query("select * from parking where ticketno='".$rcptno."'");
while ($row=mysql_fetch_array($result)){
 $data[]=$row;
}
echo json_encode($data);
break;






}
?>