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

case 7:
$data=array();
$param=$_GET['param'];
 $result =mysql_query("select * from reserve where startstamp<='".date('Ymd')."'  and endstamp>='".date('Ymd')."' and regn like '%".$param."%'  order by regn");                                  
while ($row=mysql_fetch_array($result)){
 $data[]=$row;
}
echo json_encode($data);
break;

case 8:


                 $resultx =mysql_query("select * from parking where status=1");
                 $curtick = mysql_num_rows($resultx);

                 $resultx =mysql_query("select * from parking where checkinstamp='".date('Ymd')."'");
                 $todtick = mysql_num_rows($resultx);

                 $todamount=0;
                 $resulta =mysql_query("select SUM(amount) as amount from parking where checkoutstamp='".date('Ymd')."' and status=2");
                 $rowa=mysql_fetch_array($resulta);
                 $todamount+=stripslashes($rowa['amount']);

                 $resultx =mysql_query("select * from parking where checkinstamp>='".date('Ym')."01' and checkinstamp<='".date('Ym')."31'");
                 $montick = mysql_num_rows($resultx);

                 $monamount=0;
                 $resulta =mysql_query("select SUM(amount) as amount from parking where checkoutstamp>='".date('Ym')."01' and checkoutstamp<='".date('Ym')."31' and status=2");
                 $rowa=mysql_fetch_array($resulta);
                 $monamount+=stripslashes($rowa['amount']);

                 $uncleared=0;
                  $result =mysql_query("select * from parking where status=1 and reserved=0");
                  $num_results = mysql_num_rows($result);
                  for ($i=0; $i <$num_results; $i++) {
                    $row=mysql_fetch_array($result);

                       $from_time = strtotime(stripslashes($row['checkintimestamp']));
                       $to_time = strtotime(date('YmdHi'));
                       $minutes= round(abs($to_time - $from_time) / 60,2);



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

                      $uncleared+=$amount;

                  }

                  $data=number_format($curtick).'-'.number_format($todtick).'-'.number_format($todamount, 2, ".", "," ).'-'.number_format($montick).'-'.number_format($monamount, 2, ".", "," ).'-'.number_format($uncleared, 2, ".", "," );

                  echo json_encode($data);

break;

case 9:

//dashboard figures
		//line
        $seslinear='';
        $pre=array();
        $result =mysql_query("select * from parking order by id desc limit 0,3000");
        $num_results = mysql_num_rows($result);
        for ($i=0; $i <$num_results; $i++) {
          $row=mysql_fetch_array($result);
          $pre[]=stripslashes($row['checkindate']);
        }
        $pre = array_unique($pre);$pre=array_slice($pre,0,10); $pre=array_reverse($pre);
        foreach ($pre as $key => $val) {
        $result =mysql_query("select * from parking where checkindate='".$val."'");
        $num_results = mysql_num_rows($result);
        $tot=0;
          for ($i=0; $i <$num_results; $i++) {
                  $row=mysql_fetch_array($result);
                $tot+=1;
          }
          $date=$val;
          $tot=round($tot);
          $seslinear.='{y: '.$tot.', label: "'.$date.'"},';
        }
  

        $len=strlen($seslinear);
        $len=$len-1;
        $seslinear=substr($seslinear,0,$len);
        

              
       echo json_encode($seslinear);

      
  break;


  case 10:



        //bar
        $sesbararr='';
        $pre=array();
        $result =mysql_query("select * from parking where status=2 order by id desc limit 0,3000");
        $num_results = mysql_num_rows($result);
        for ($i=0; $i <$num_results; $i++) {
          $row=mysql_fetch_array($result);
          $pre[]=stripslashes($row['checkoutdate']);
          }
        $pre = array_unique($pre);$pre=array_slice($pre,0,10); $pre=array_reverse($pre);
        foreach ($pre as $key => $val) {
        $result =mysql_query("select * from parking where checkoutdate='".$val."' and status=2");
        $num_results = mysql_num_rows($result);
        $tot=0;
          for ($i=0; $i <$num_results; $i++) {
                  $row=mysql_fetch_array($result);
                $tot+=preg_replace('~,~', '', stripslashes($row['amount']));
          }
          $date=$val;
          $tot=round($tot);
          $sesbararr.='{y: '.$tot.', label: "'.$date.'"},';
        }
  

        $len=strlen($sesbararr);
        $len=$len-1;
        $sesbararr=substr($sesbararr,0,$len);
       

              
       echo json_encode($sesbararr);

      
  break;



  case 11:



       
        //dougnut
          $sesdougnut='';
          $result =mysql_query("select * from parking");
          $totparking = mysql_num_rows($result);
          

          $result =mysql_query("select * from rates");
          $num_results = mysql_num_rows($result);
          for ($i=0; $i <$num_results; $i++) {
            $row=mysql_fetch_array($result);
            $code=stripslashes($row['id']);
            $name=stripslashes($row['desc']);

            $resultx =mysql_query("select * from parking where parkcateg='".$code."'");
            $count = mysql_num_rows($resultx);
            if($count>0){
              $per=($count/$totparking)*100;$per=round($per,2);$perlabel=$name.' '.round($per).'%';
              $sesdougnut.='{  y: '.$per.', legendText:"'.$perlabel.'", indexLabel: "'.$perlabel.'" },';
            }
            

          }


        $len=strlen($sesdougnut);
        $len=$len-1;
        $sesdougnut=substr($sesdougnut,0,$len);

              
       echo json_encode($sesdougnut);

      
  break;




}
?>