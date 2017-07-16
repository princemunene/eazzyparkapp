 <?php 
    header("Access-Control-Allow-Origin: *");
 	$db = mysql_connect('localhost', 'qetcoke_qet', 'qet@123+',true) or die(mysql_error());
	mysql_select_db('qetcoke_eazzy2',$db);

	//$db = mysql_connect('localhost', 'root', 'admin@123+',true) or die(mysql_error());
	//mysql_select_db('eazzypark',$db);
?>