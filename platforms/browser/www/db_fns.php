 <?php 
    header("Access-Control-Allow-Origin: *");
 	$server='localhost';
	$db = mysql_connect($server, 'root', 'admin@123+',true) or die(mysql_error());
	mysql_select_db('eazzypark',$db);
?>