<?php
extract($_POST);
extract($_GET);

session_start("logo");
if(!($_SESSION["logo"]))
{
session_unset();
session_destroy();
header("Location:login.php");
//echo "<center><a href='login.php'>Login Please</a></center>";
//exit();
}
?>
<html>
<head>
<title>removefromcart</title>
</head>
<body>
<?php
$conn=mysql_connect("localhost","root","101389");
$db=mysql_select_db("books");

   //先查询是否存在要删除的数据；
   $sql1="select * from neworder where customerid='".$customerid."' and productid='".$productid."'";
   $result1=mysql_query($sql1)or die("wrong!".mysql_error());
  if($result1=mysql_fetch_array($result1))
  {
    $sql2="delete from neworder where customerid='".$customerid."' and productid='".$productid."'";
	$result2=mysql_query($sql2)or die("failed.".mysql_error());
    if($result2)
	 echo "Delete product sucessfully!";  
    else
      echo "Deleter failed";
   }
   else
    {  echo "NO relevant productid in the table neworder.";}
  
	echo "<p><a href='personal.php'>Back</a></p>";
	
?>
</body>
<html>