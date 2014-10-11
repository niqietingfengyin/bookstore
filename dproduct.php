<?php
extract ($_POST);

?>

<html>
<head>
<title>products to be deleted</title>
</head>
<body>
<table align=center border="1" cellspacing="1" cellpadding="1">
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
  echo $_POST["categorynum"];
  $conn=mysql_connect("localhost","root","101389");
  $db=mysql_select_db("books");
 
  $sq1="delete from products where productid='".$productid."'";
   $re1=mysql_query($sq1) or die("delete failed".mysql_error()); 
   
  $sq2="select productid,name,description,price,category from products where category='".$categorynum."'";
  $re2=mysql_query($sq2) or die("wrong!!!".mysql_error());
  while($row=mysql_fetch_array($re2))

  {
    echo "<tr><td>".$row["productid"]."</td>";
	echo "<td>".$row["name"]."</td>";
	echo "<td>".$row["description"]."</td>";
	echo "<td>".$row["price"]."</td>";
	echo "<td>".$row["category"]."</td>";
	echo "<td><a href=\"dproduct.php\">delete</td>";
  }
?>
</body>
</html>

