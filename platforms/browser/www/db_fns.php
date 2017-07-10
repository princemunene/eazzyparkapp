 <?php 
    header("Access-Control-Allow-Origin: *");
 	$db = mysql_connect('localhost', 'qetcoke_qet', 'qet@123+',true) or die(mysql_error());
	mysql_select_db('qetcoke_eazzy',$db);
?>