<?php
 $result=mail("1053220130@qq.com","hello miss yu","this is a test.");
 if($result)
  echo "E-mail sent sucessfully";
  else
  echo "Failed!.<br>";
 echo date("l d \of F Y h:i A");
 echo "<br>";
 $t=getdate(date("U"));
  echo $t[year];//year,mon,mday,hours,minutes,seconds; weekday,month;
  
?>