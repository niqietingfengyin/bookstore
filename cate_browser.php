<html>
<head>
<title>categorybrowser</title>
</head>
<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<center>
<table width="80%" border="1" cellspacing="1" cellpadding="1">
<tr>
<td align="center"><b>Category ID</B></td>
<td align=center><b>Name</B></td>
<td align=center><b>Description</b></td>
<td align=center><b>Parent Category</b></td>
<td align=center><b>Products</b></td>
<td>&nbsp;</td>
</tr>

<?php
  $conn=mysql_connect("localhost","root","101389");
  $db=mysql_select_db("books")or die("connect with database failed".mysql_error());
  $sql="select * from category";
  $result=mysql_query($sql)or die("failed".mysql_error());
  while($row=mysql_fetch_array($result))
  {
    echo "<tr><td>".$row["categoryid"]."</td>";
	echo "<td>".$row["name"]."</td>";
	echo "<td>".$row["description"]."</td>";
	echo "<td>".$row["parentcategoryid"]."</td>";
	echo "<td><a href=\"catprobrowser.php?categorynum=".$row["categoryid"]."\">Products</a></td>";
    echo "<td><a href=\"dcategory.php?categorynum=".$row["categoryid"]."\">delete</a></td></tr>";  
  }
?>
</table>
<center>
<p>&nbsp;</p>
<p>Return to Admin Page</p>
<p><a href="admin.php">Click Here!</a></p>
</center>
</body>
</html>