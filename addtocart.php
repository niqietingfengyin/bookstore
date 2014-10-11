<?php
/*$customerid=$_POST['customerid'];
$productid=$_POST['productid'];
$customerid=$_POST['customerid'];
*/
extract($_POST);
extract($_GET);



session_start();
if(!isset($_SESSION["logo"]))
{
session_unset();
session_destroy();
echo "<center><a href='login.php'>Login Please</a></center>";
exit();
}
?>
<html>
<head>
<title>addtocart</title>
</head>
<body>
<?php
$conn=mysql_connect("localhost","root","101389");
$db=mysql_select_db("books");
//保证不能重复添加，所以先检测是否同一个customerid是否已添加同一本productid;
$sql="select * from neworder where customerid='".$customerid."' and productid='".$productid."'";
$result=mysql_query($sql)or die("wrong!".mysql_error());
 if($row=mysql_fetch_array($result))
  print "This product has been already in your shopping cart!" ;
   
else{ 
      //添加进neworder表单，存进数据库；
     $sql2="insert into neworder (customerid,productid)values('".$customerid."','".$productid."')";
      $result2=mysql_query($sql2)or die("insert failed.".mysql_error());
   
   //输出成功添加产品的信息；
   $sql3="select * from products where productid='".$productid."'";
   $result3=mysql_query($sql3)or die("failed".mysql_error());
   if($row3=mysql_fetch_array($result3))
    {
	 echo "<table align=\"center\" border='1' cellspacing='1' cellpadding='1'>";
	 echo "<tr><td><b>Title</b></td>";
     echo "<td>".$row3["name"]."</td></tr>";	
     echo "<tr><td><b>Author</b></td>";
     echo "<td>".$row3["author"]."</td></tr>";
     echo "<tr><td><b>Description</b></td>";
     echo "<td>".$row3["description"]."</td></tr>";
     echo "<tr><td><b>Price</b></td>";	 
	 echo "<td>".$row3["price"]."</td></tr>";
	 echo "</table>";
	 echo "<center><p>Add to cart sucessfully!</p>";
	 }  
	
   }
  echo "<p><a href='personal.php'>Back</a></p></center>";
	
?>
</body>
<html>