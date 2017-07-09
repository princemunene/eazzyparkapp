<?php 
require_once('db_fns.php');
if(isset($_POST['username'])){
$username = $_POST['username'];
}
if(isset($_POST['passwd'])){
$password = $_POST['passwd'];}
$result = mysql_query("select * from users  where name='".$username."'  and password = sha1('".$password."')");
$num_results = mysql_num_rows($result);
if($num_results>0){
$_SESSION['valid_user']=strtoupper($username);
$result = mysql_query("insert into log values('','".$username." logs into system','".$username."','".date('YmdHi')."','".date('H:i')."','".date('d/m/Y')."','1')");	
echo 1;
}
else echo 0;
     
	 ?>
        