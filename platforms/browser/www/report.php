<?php include('db_fns.php');
include('functions.php'); 
date_default_timezone_set('Africa/Nairobi'); 
if(isset($_SESSION['valid_user'])){
$username=$_SESSION['valid_user'];
$result =mysql_query("select * from users where name='".$username."'");
$row=mysql_fetch_array($result);
$usertype=stripslashes($row['position']);
$userid=stripslashes($row['userid']);
}
else{echo"<script>window.location.href = \"index.php\";</script>";}

?>

<?php
$id=$_GET['id'];
if(isset($_GET['rcptno'])){
$rcptno=$_GET['rcptno'];}
$result =mysql_query("select * from company");
$row=mysql_fetch_array($result);
$comname=stripslashes($row['CompanyName']);
$tel=stripslashes($row['Tel']);
$comadd=$Add=stripslashes($row['Address']);
$web=stripslashes($row['Website']);
$email=stripslashes($row['Email']);
$logo=stripslashes($row['Logo']);
switch($id){
  case 1:
  $title='EazzyPark Parking Ticket';
  break;
  case 2:
  $title='EazzyPark Payment Receipt';
  break;

  case 3:
  $title='EazzyPark Tickets Reports';
  break;

  case 4:
  $title='EazzyPark Receipts Reports';
  break;

  case 5:
  $title='EazzyPark Vehicle Parking Log Reports';
  break;

  case 6:
  $title='EazzyPark Audit Trail Reports';
  break;

   case 7:
  $title='EazzyPark Reservations Reports';
  break;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title ?></title>
<link rel="shortcut icon" href="images/favicon.png">
<link rel="stylesheet" href="css/framework7.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/blue.css">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/my-app.js"></script>
<script src="js/excellentexport.js"></script>
<script type="text/javascript" src="js/connectcode-javascript-code39.js"></script>
<style>
@media print {
    footer {page-break-after: always;}
    html,body{min-height:100%;}
}
</style>
</head>

<body style="background:#fff;overflow:auto">
<?php 
switch($id){


case 1:
$result =mysql_query("select * from parking where ticketno='".$rcptno."'");
$row=mysql_fetch_array($result);
$regn=stripslashes($row['regn']);
?>
<style>
@font-face { font-family: Merchant; src: url('merchant.ttf'); } 
body,p{
font-family: Merchant; font-size:18px; font-weight:normal; text-transform:uppercase
}
</style>

<div style="width:270px;min-height:200px; border:0px solid #333" id="selectable" onclick="CopyToClipboard('selectable')">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:75px; margin:0px 5px 5px 75px"/>
<div style="clear:both"></div>
<p style="text-align:center;font-size:26px; font-weight:normal; margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both;"></div>
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px; font-size:18px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?></p><div style="clear:both"></div>
<div style="clear:both;border-bottom:1px dashed #333"></div>
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px;font-size:22PX">PARKING TICKET</p>
<div style="clear:both;border-bottom:1px dashed #333;margin-bottom:5px"></div>

<p style="text-align:left;   font-weight:normal; margin:0 0 0 10px; font-size:18px">Ticket No: <b><?php  echo $rcptno ?></b></p>
<p style="text-align:left;   font-weight:normal; margin:0 0 0 10px; font-size:18px">Check-in Date: <b><?php  echo stripslashes($row['checkindate']) ?></b></p>
<p style="text-align:left;   font-weight:normal; margin:0 0 0 10px; font-size:18px">Check-in Time: <b><?php  echo stripslashes($row['checkintime']) ?></b></p>
<p style="text-align:left;   font-weight:normal; margin:0 0 0 10px; font-size:28px">Regn: <b><?php  echo stripslashes($row['regn']) ?></b></p>
<div style="clear:both;border-bottom:1px dashed #333;margin-top:5px;margin-bottom:5px"></div>

<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px; font-size:17px">Officer: <b><?php  echo getuser($row['checkinuser']) ?></b></p>
<p style="text-align:center;font-size:17px; font-weight:normal;margin:0 0 0 0px">System Developers: QET SYSTEMS</p>
<div style="clear:both;border-bottom:1px dashed #333"></div>
</div>

<script type="text/javascript">
   function CopyToClipboard(containerid) {
if (document.selection) { 
    var range = document.body.createTextRange();
    range.moveToElementText(document.getElementById(containerid));
    range.select().createTextRange();
    document.execCommand("Copy"); 

} else if (window.getSelection) {
    var range = document.createRange();
     range.selectNode(document.getElementById(containerid));
     window.getSelection().addRange(range);
     document.execCommand("Copy");

}}
</script>


<?php 
break;


case 2:
$result =mysql_query("select * from parking where rcptno='".$rcptno."'");
$row=mysql_fetch_array($result);
$regn=stripslashes($row['regn']);
?>
<style>
@font-face { font-family: Merchant; src: url('merchant.ttf'); } 
body,p{
font-family: Merchant; font-size:18px; font-weight:normal; text-transform:uppercase
}
</style>

<div style="width:270px;min-height:200px; border:0px solid #333"  id="selectable" onclick="CopyToClipboard('selectable')">
<div style="clear:both; margin-bottom:10px"></div>
<img src="<?php echo $logo ?>" style="max-height:75px; margin:0px 5px 5px 75px"/>
<div style="clear:both"></div>
<p style="text-align:center;font-size:40px; font-weight:bold; margin:0 0 0 0px">PAID</p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:26px; font-weight:normal; margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both;"></div>
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px; font-size:18px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?></p><div style="clear:both"></div>
<div style="clear:both;border-bottom:1px dashed #333"></div>
<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px;font-size:22PX">CASH PAYMENT RECEIPT</p>
<div style="clear:both;border-bottom:1px dashed #333;margin-bottom:5px"></div>

<p style="text-align:left;   font-weight:normal; margin:0 0 0 10px; font-size:18px">Receipt No: <b><?php  echo $rcptno ?></b></p>
<p style="text-align:left;   font-weight:normal; margin:0 0 0 10px; font-size:18px">Check-in Time: <b><?php  echo stripslashes($row['checkindate']) ?> <?php  echo stripslashes($row['checkintime']) ?></b></p>
<p style="text-align:left;   font-weight:normal; margin:0 0 0 10px; font-size:18px">CheckOut Time: <b><?php  echo stripslashes($row['checkoutdate']) ?> <?php  echo stripslashes($row['checkouttime']) ?></b></p>
<p style="text-align:left;   font-weight:normal; margin:0 0 0 10px; font-size:18px">Time Spent: <b><?php  echo stripslashes($row['timediff']) ?></b></p>
<p style="text-align:left;   font-weight:normal; margin:0 0 0 10px; font-size:18px">Amount Paid: <b><?php  echo number_format($row['amount'], 2, ".", "," ) ?></b></p>
<p style="text-align:left;   font-weight:normal; margin:0 0 0 10px; font-size:18px">In Words: <b><script>document.writeln(toWords(<?php echo $row['amount'] ?>));</script>KES only.</b></p>
<p style="text-align:left;   font-weight:normal; margin:0 0 0 10px; font-size:28px">Regn: <b><?php  echo stripslashes($row['regn']) ?></b></p>
<div style="clear:both;border-bottom:1px dashed #333;margin-top:5px;margin-bottom:5px"></div>


<p style="text-align:center;   font-weight:normal; margin:0 0 0 0px; font-size:17px">Officer: <b><?php  echo getuser($row['checkinuser']) ?></b></p>
<p style="text-align:center;font-size:17px; font-weight:normal;margin:0 0 0 0px">System Developers: QET SYSTEMS</p>
<div style="clear:both;border-bottom:1px dashed #333"></div>
</div>

<script type="text/javascript">
   function CopyToClipboard(containerid) {
if (document.selection) { 
    var range = document.body.createTextRange();
    range.moveToElementText(document.getElementById(containerid));
    range.select().createTextRange();
    document.execCommand("Copy"); 

} else if (window.getSelection) {
    var range = document.createRange();
     range.selectNode(document.getElementById(containerid));
     window.getSelection().addRange(range);
     document.execCommand("Copy");

}}
</script>

<?php 
break;



case 3:

function loopticket($rowa,$i,$status){
$aa=$i+1;
$sent='';
if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
if($status==2){$statcol='#37BC9B';$stat='Paid';}else{$statcol='#F6BB42';$stat='Pending';}
if(stripslashes($rowa['naivas'])==1){$categ='Naivas';}else{$categ='Other';}
echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
?>
<td  style="width:4%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><?php  echo $aa ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><?php  echo stripslashes($rowa['ticketno']) ?></td>
<td  style="width:11%;border-width:0.5px; border-color:#666; border-style:solid;padding:5pxpadding:5px "><?php  echo $categ ?></td>
<td  style="width:30%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><?php  echo stripslashes($rowa['regn']) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><?php  echo stripslashes($rowa['checkindate']).' '.stripslashes($rowa['checkintime']) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><?php  echo stripslashes($rowa['checkoutdate']).' '.stripslashes($rowa['checkouttime']) ?></td>
<td  style="width:11%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px; background:<?php  echo $statcol ?>"><?php  echo $stat ?></td>
</tr>

<?php } 

$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else {$name=0;}
$code=$_GET['code'];
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='tickets_reports';

?>
<div  style="width:98%;min-height:260px;margin:1%; border:1px solid #ccc">
<div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;max-width:105px;position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">TICKETS REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } 
 if($code==1){?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">DAILY SUMMARY REPORT</p>
<?php } else if($code==2){?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">DAILY UNPAID TICKETS REPORT</p>
<?php } else if($code==3){?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">ALL TICKETS REPORT</p>
<?php }  else if($code==4){?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">ALL UNPAID TICKETS REPORT</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="images/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:98%;text-align:center;font-size:11px; font-weight:bold; padding:0;margin:0 1%" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:4%;padding:5px">No.</td>
        <td  style="width:10%;padding:5px">Ticket No</td>
        <td  style="width:11%;padding:5px">Category</td>
        <td  style="width:30%;padding:5px">Regn No</td>
        <td  style="width:15%;padding:5px">Check in Time</td>
        <td  style="width:15%;padding:5px">Check out Time</td>
        <td  style="width:11%;padding:5px">Status</td>
    
    </tr>


<?php
  switch($code){
  case 1:

  
  $result =mysql_query("select * from parking  where checkinstamp>='".date('Ymd')."' and checkinstamp<='".date('Ymd')."'");
  

  break;

   case 2:
  
 $result =mysql_query("select * from parking  where checkinstamp>='".date('Ymd')."' and checkinstamp<='".date('Ymd')."' and status=1 and reserved=0");

  break;

   case 3:
  
  if($d1==0){
  $result =mysql_query("select * from parking");

  }
  else{
  $result =mysql_query("select * from parking  where checkinstamp>='".$d1."' and checkinstamp<='".$d2."'");
  }

  break;

   case 4:
  
  if($d1==0){
  $result =mysql_query("select * from parking where status=1 and reserved=0");

  }
  else{
  $result =mysql_query("select * from parking  where checkinstamp>='".$d1."' and checkinstamp<='".$d2."' and  status=1  and reserved=0");
  }

  break;

  }
  
 

  $a=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $status=stripslashes($row['status']);
  $a+=1;
  loopticket($row,$i,$status);
  }




?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Tickets:<?php  echo $a ?></p>

</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
<div style="clear:both; margin-bottom:10px"></div>
</div>
<?php 
break;


case 4:

function loopreceipt($rowa,$i,$status){
$aa=$i+1;
$sent='';
if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
if($status==2){$statcol='#37BC9B';$stat='Paid';}else{$statcol='#F6BB42';$stat='Pending';}
if(stripslashes($rowa['naivas'])==1){$categ='Naivas';}else{$categ='Other';}
echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
?>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><?php  echo $aa ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><?php  echo stripslashes($rowa['ticketno']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><?php  echo stripslashes($rowa['rcptno']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;padding:5pxpadding:5px "><?php  echo $categ ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><?php  echo stripslashes($rowa['regn']) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><?php  echo stripslashes($rowa['checkindate']).' '.stripslashes($rowa['checkintime']) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><?php  echo stripslashes($rowa['checkoutdate']).' '.stripslashes($rowa['checkouttime']) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><?php  echo stripslashes($rowa['timediff']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><script>document.writeln(( <?php  echo stripslashes($rowa['amount'])  ?>).formatMoney(2, '.', ','));</script></td>
</tr>

<?php } 

$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else {$name=0;}
$code=$_GET['code'];
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='receipts_reports';

?>
<div  style="width:98%;min-height:260px;margin:1%; border:1px solid #ccc">
<div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;max-width:105px;position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">INCOME REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } 
 if($code==1){?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">DAILY INCOME REPORT</p>
<?php } else if($code==2){?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">INCOME REPORT OVERTIME</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="images/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:98%;text-align:center;font-size:11px; font-weight:bold; padding:0;margin:0 1%" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;padding:5px">No.</td>
        <td  style="width:10%;padding:5px">Ticket No</td>
        <td  style="width:10%;padding:5px">Receipt No</td>
        <td  style="width:10%;padding:5px">Category</td>
        <td  style="width:10%;padding:5px">Regn No</td>
        <td  style="width:15%;padding:5px">Check in Time</td>
        <td  style="width:15%;padding:5px">Check out Time</td>
        <td  style="width:15%;padding:5px">Time Spent</td>
        <td  style="width:10%;padding:5px">Amount</td>
        
    </tr>


<?php
  switch($code){
  case 1:

  
  $result =mysql_query("select * from parking  where checkoutstamp>='".date('Ymd')."' and checkoutstamp<='".date('Ymd')."'  and  status=2 and amount>0");
  

  break;

   case 2:
  
  
  if($d1==0){
  $result =mysql_query("select * from parking where status=2 and amount>0");

  }
  else{
  $result =mysql_query("select * from parking  where checkoutstamp>='".$d1."' and checkoutstamp<='".$d2."' and  status=2 and amount>0");
  }

  break;

  }
  
 

  $a=0;$b=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $status=stripslashes($row['status']);
  $a+=1;
  $b+=stripslashes($row['amount']);
  loopreceipt($row,$i,$status);
  }




?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Receipts:<?php  echo $a ?></p>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Amount:<script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
<div style="clear:both; margin-bottom:10px"></div>
</div>
<?php 
break;


case 5:

function loopvlog($rowa,$i,$status){
$aa=$i+1;
if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
?>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><?php  echo $aa ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><?php  echo stripslashes($rowa['regn']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><?php  echo stripslashes($rowa['date']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><?php  echo stripslashes($rowa['time']) ?></td>
<td  style="width:65%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><?php  echo stripslashes($rowa['activity']) ?></td>

</tr>

<?php } 

$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else {$name=0;}
$code=$_GET['code'];
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='parking_log_reports';

?>
<div  style="width:98%;min-height:260px;margin:1%; border:1px solid #ccc">
<div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;max-width:105px;position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">VEHICLE PARKING LOG REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } 
?>
<?php $d1=preg_replace('~/~', '', $d1).'0000'; $d2=preg_replace('~/~', '', $d2).'2359';?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="images/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:98%;text-align:center;font-size:11px; font-weight:bold; padding:0;margin:0 1%" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;padding:5px">No.</td>
        <td  style="width:10%;padding:5px">Regn</td>
        <td  style="width:10%;padding:5px">Date</td>
        <td  style="width:10%;padding:5px">Time</td>
        <td  style="width:65%;padding:5px">Description</td>
        
    </tr>


<?php

  if($d1==0){
  $result =mysql_query("select * from vehiclelog");

  }
  else{
  $result =mysql_query("select * from vehiclelog  where stamp>='".$d1."' and stamp<='".$d2."'");
  }


 

  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $status=1;
  loopvlog($row,$i,$status);
  }




?>

</tbody>
</table>



<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
<div style="clear:both; margin-bottom:10px"></div>
</div>
<?php 
break;


case 6:

function loopaudit($rowa,$i,$status){
$aa=$i+1;
if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
?>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><?php  echo $aa ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><?php  echo stripslashes($rowa['username']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><?php  echo stripslashes($rowa['date']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><?php  echo stripslashes($rowa['time']) ?></td>
<td  style="width:65%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><?php  echo stripslashes($rowa['activity']) ?></td>

</tr>

<?php } 

$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else {$name=0;}
$code=$_GET['code'];
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='audit_trail_reports';

?>
<div  style="width:98%;min-height:260px;margin:1%; border:1px solid #ccc">
<div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;max-width:105px;position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">SYSTEM ACTIVITY LOG REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } 
?>
<?php $d1=preg_replace('~/~', '', $d1).'0000'; $d2=preg_replace('~/~', '', $d2).'2359';?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="images/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:98%;text-align:center;font-size:11px; font-weight:bold; padding:0;margin:0 1%" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;padding:5px">No.</td>
        <td  style="width:10%;padding:5px">Username</td>
        <td  style="width:10%;padding:5px">Date</td>
        <td  style="width:10%;padding:5px">Time</td>
        <td  style="width:65%;padding:5px">Description</td>
        
    </tr>


<?php

  if($d1==0){
  $result =mysql_query("select * from log");

  }
  else{
  $result =mysql_query("select * from log  where stamp>='".$d1."' and stamp<='".$d2."'");
  }


 

  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $status=1;
  loopaudit($row,$i,$status);
  }




?>

</tbody>
</table>



<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
<div style="clear:both; margin-bottom:10px"></div>
</div>
<?php 
break;


case 7:

function loopreserve($rowa,$i,$status){
$aa=$i+1;
$sent='';
if($i%2==0){$col='#fff';}else{$col='#f0f0f0';}
echo'<tr style="width:100%; height:20px;padding:0; background:'.$col.'; font-weight:normal  ">';    
?>
<td  style="width:5%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><?php  echo $aa ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><?php  echo stripslashes($rowa['date']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><?php  echo stripslashes($rowa['regn']) ?></td>
<td  style="width:25%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><?php  echo stripslashes($rowa['tenant']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><?php  echo stripslashes($rowa['unitno']) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><?php  echo stripslashes($rowa['from']) ?></td>
<td  style="width:15%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><?php  echo stripslashes($rowa['to']) ?></td>
<td  style="width:10%;border-width:0.5px; border-color:#666; border-style:solid;padding:5px "><script>document.writeln(( <?php  echo stripslashes($rowa['amount'])  ?>).formatMoney(2, '.', ','));</script></td>
</tr>

<?php } 

$date=date('Y/m/d');
if(isset($_GET['name'])){
  $name=$_GET['name'];
}else {$name=0;}
$code=$_GET['code'];
if(isset($_GET['d1'])){
  $d1=datereverse($_GET['d1']);
}else $d1=0;
if(isset($_GET['d2'])){
  $d2=datereverse($_GET['d2']);
}else $d2=0;
$fname='reservations_reports';

?>
<div  style="width:98%;min-height:260px;margin:1%; border:1px solid #ccc">
<div style="clear:both; margin-bottom:10px;"></div>
<img src="<?php echo $logo ?>" style="max-height:105px; margin:0px 10px 0 10px;max-width:105px;position:absolute;"/>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px"><?php  echo $comname ?></p>
<div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">P.O Box <?php  echo $Add ?><br/>Tel: <?php  echo $tel ?>
<br/>Website: <?php  echo $web ?><br/>Email: <?php  echo $email ?></p><div style="clear:both"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">VEHICLE RESERVATIONS REPORT
<br/><strong style="font-size:11px">Date:<?php  echo date('d/m/Y') ?></strong></p>
<?php if($d1!=0){?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">From:&nbsp;&nbsp;<?php  echo dateprint($d1) ?>&nbsp;&nbsp;To:&nbsp;<?php  echo dateprint($d2) ?></p>
<?php } 
else {?>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">FULL STATEMENT</p>
<?php } ?>
<?php $d1=preg_replace('~/~', '', $d1); $d2=preg_replace('~/~', '', $d2);?>

<div style="clear:both; margin-bottom:10px"></div>


<p><a download="<?php  echo $fname ?>.xls" href="data:application/vnd.ms-excel;base64,PGh0bWwgeG1sbnM6bz0idXJuOnNjaGVtYXMtbWljcm9zb2Z0LWNvbTpvZmZpY2U6b2ZmaWNlIiB4bWxuczp4PSJ1cm46c2NoZW1hcy1taWNyb3NvZnQtY29tOm9mZmljZTpleGNlbCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnL1RSL1JFQy1odG1sNDAiPjxoZWFkPjxtZXRhIGh0dHAtZXF1aXY9IkNvbnRlbnQtVHlwZSIgY29udGVudD0idGV4dC9odG1sOyBjaGFyc2V0PVVURi04Ij48IS0tW2lmIGd0ZSBtc28gOV0+PHhtbD48eDpFeGNlbFdvcmtib29rPjx4OkV4Y2VsV29ya3NoZWV0cz48eDpFeGNlbFdvcmtzaGVldD48eDpOYW1lPnVuZGVmaW5lZDwveDpOYW1lPjx4OldvcmtzaGVldE9wdGlvbnM+PHg6RGlzcGxheUdyaWRsaW5lcy8+PC94OldvcmtzaGVldE9wdGlvbnM+PC94OkV4Y2VsV29ya3NoZWV0PjwveDpFeGNlbFdvcmtzaGVldHM+PC94OkV4Y2VsV29ya2Jvb2s+PC94bWw+PCFbZW5kaWZdLS0+PC9oZWFkPjxib2R5Pjx0YWJsZT4KICAgIDx0Ym9keT48dHI+CiAgICAgICAgPHRkPjEwMDwvdGQ+CiAgICAgICAgPHRkPjIwMDwvdGQ+CiAgICAgICAgPHRkPjMwMDwvdGQ+CiAgICA8L3RyPgogICAgPHRyPgogICAgICAgIDx0ZD40MDA8L3RkPgogICAgICAgIDx0ZD41MDA8L3RkPgogICAgICAgIDx0ZD42MDA8L3RkPgogICAgPC90cj4KPC90Ym9keT48L3RhYmxlPjwvYm9keT48L2h0bWw+" onclick="return ExcellentExport.excel(this, 'datatable', 'Sheet Name Here');"><img src="images/excel.png" style="30px; height:30px; float:right; margin-right:10px"  title="Convert to Excel"/></a></p>
<img src="images/adobe.png" style="30px; height:30px; float:right; margin-right:10px; cursor:pointer" onclick="window.print() " title="Convert to Pdf"/>
<div style="clear:both; margin-bottom:10px"></div>

<table id="datatable"  style="width:98%;text-align:center;font-size:11px; font-weight:bold; padding:0;margin:0 1%" >
<tbody>
<tr style="width:100%; height:20px;color:#fff; background:#333; padding:0">
        <td  style="width:5%;padding:5px">No.</td>
        <td  style="width:10%;padding:5px">Date</td>
        <td  style="width:10%;padding:5px">Regn No</td>
        <td  style="width:25%;padding:5px">Tenant Name</td>
        <td  style="width:10%;padding:5px">Unit No</td>
        <td  style="width:15%;padding:5px">Start Date</td>
        <td  style="width:15%;padding:5px">End Date</td>
        <td  style="width:10%;padding:5px">Amount</td>
        
    </tr>


<?php
  
  
  
  if($d1==0){
  $result =mysql_query("select * from reserve");

  }
  else{
  $result =mysql_query("select * from reserve  where stamp>='".$d1."' and stamp<='".$d2."'");
  }

  

  $a=0;$b=0;
  $num_results = mysql_num_rows($result);
  for ($i=0; $i <$num_results; $i++) {
  $row=mysql_fetch_array($result);
  $status=1;
  $a+=1;
  $b+=stripslashes($row['amount']);
  loopreserve($row,$i,$status);
  }




?>

</tbody>
</table>

<div style="clear:both; margin-bottom:20px"></div>
<div style="float:left">
<div style="clear:both; margin-bottom:0px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 10px 0 10px">General Summary</p>
<div style="clear:both; margin-bottom:5px; border-bottom:1px dashed #333"></div>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Reservations:<?php  echo $a ?></p>
<p style="text-align:left;font-size:11px; font-weight:bold;margin:0 0 0 10px">Total Amount:<script>document.writeln(( <?php  echo $b ?>).formatMoney(2, '.', ','));</script></p>
</div>

<div style="clear:both; margin-bottom:20px"></div>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Thank You for your Partnership.</p>
<p style="text-align:center;font-size:11px; font-weight:bold;margin:0 0 0 0px">Report Pulled By <?php  echo $username ?>.</p>
<div style="clear:both; margin-bottom:10px"></div>
</div>
<?php 
break;

}