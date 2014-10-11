<?php
extract ($_POST);
extract ($_GET);
?>

<html>
<head>
<title>products to be deleted</title>
</head>
<body>
<table align=center border="1" cellspacing="1" cellpadding="1">
<br>
<br>
<br>
<tr>
<td width="15%"><b>Product ID</b></td>
<td width="25%"><b>Name</b></td>
<td width="25%"><b>Description</b></td>
<td><b>Price</b></td>
<td><b>Category</b></td>
<td>&nbsp;</td>
</tr>
<?php
  //此时$productid变量还不存在，$categorynum有值；
  if(!empty($productid))
  {
  $conn=mysql_connect("localhost","root","101389");
  $db=mysql_select_db("books");
  $sq1="delete from products where productid='".$productid."'";
  $re1=mysql_query($sq1) or die("delete failed".mysql_error()); 
  }
  else
  echo "";
   
  $conn=mysql_connect("localhost","root","101389");
  $db=mysql_select_db("books");
  $sql="select productid,name,description,price,category from products where category='".$categorynum."'";
  $result=mysql_query($sql) or die("wrong!!!".mysql_error());
  while($row=mysql_fetch_array($result))
  {
    echo "<tr><td>".$row["productid"]."</td>";
	echo "<td>".$row["name"]."</td>";
	echo "<td>".$row["description"]."</td>";
	echo "<td>".$row["price"]."</td>";
	echo "<td>".$row["category"]."</td>";
	//每个delete选项 传递给本页面的参数是该书的productid和categorynum(类别)；
	echo "<td><a href=\"catprobrowser.php?productid=".$row["productid"]."&categorynum=".$categorynum."\">delete</a></td>";
  }
   //echo "<input type='hidden' name=\"categorynum\"  value='".$categorynum."'>";
?>
</table>
<center>
<br>
<br>
<td>&nbsp;</td>
<p>If you want to Admin Page</p>
<p><b><a href="admin.php">Click here!</a></b></p>
</center>
</body>
</html>

