<?php
$customerid=$_POST['customerid'];

if(!(isset($customerid)))
  die("custmerid isn't exist!");
  if(empty($customerid))
  die("no customerid submitted");
  
 $conn=mysql_connect("localhost","root","101389");
 mysql_select_db("books")or die("can't connect to the database".mysql_error());
  
  $result=mysql_query("select customerid from customerinfo where customerid=\"".$customerid."\"");
  if($row=mysql_fetch_array($result))
  {
  $sql1="delete from customerinfo where customerid='".$customerid."'";
  $result1=mysql_query($sql1)or die("delete data from customerinfo failed");
   if($result1)
   echo "customer record deleted from customerinfo table sucessfully<br>";
 
    $sql2="delete from login where customerid='".$customerid."'";
    $result2=mysql_query($sql2)or die("delete data from login failed".mysql_error());
    if($result2)
     echo "customer record deleted from login table sucessfully<br>";
    
	$sql3="delete from newsmail where customerid='".$customerid."'";
    $result3=mysql_query($sql3)or die("delete data from newsmail failed");
    if($result3)
    echo "customer record deleted from newsmail table sucessfully<br>";
    }
	else
	   echo "no customer found!";
	echo "<br><br>";
	echo  "<p></p>";
	echo "<p>To return to Admin Page<br>";
	echo "<b><a href=\"admin.php\">Click Here</a></b></p>";
	
?>