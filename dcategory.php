<?php
extract ($_POST);
extract ($_GET);

?>
<?php
 /* $conn=mysql_connect("localhost","root","101389");
  $db=mysql_select_db("books"); 
  $sqldele="select * from category where categoryid='".$dele_categoryid."'";
  //$sqldele="select * from category where categoryid='".$categorynum."'";
  $resultdele=mysql_query($sqldele)or die("chaxun failed.".mysql_error());
  if($rowdele=mysql_fetch_array($resultdele))
  {
      $sqldele2="delete from category where categoryid='".$rowdele["categoryid"]."'";
	  $resultdele2=mysql_query($sqldele2)or die("delete failed".mysql_error());
	       
  }
  else
     echo "no category exist.";
   */
?>

<html>
<head>
<title>category to be deleted</title>
</head>
<body>
<table align="center" border="1" cellspacing="1" cellpadding="1">
<br>
<br>
<br>
<tr>
<td width="15%"><b>Category ID</b></td>
<td width="25%"><b>Name</b></td>
<td width="25%"><b>Description</b></td>
<td><b>Parentcategory ID</b></td>
</tr>

<?php
   $conn=mysql_connect("localhost","root","101389");
  $db=mysql_select_db("books"); 
   $sql="select categoryid,name,description,parentcategoryid from category where categoryid='".$categorynum."'";
  $result=mysql_query($sql) or die("wrong!!!".mysql_error());
 if($row=mysql_fetch_array($result))
  {
    echo "<tr><td>".$row["categoryid"]."</td>";
	echo "<td>".$row["name"]."</td>";
	echo "<td>".$row["description"]."</td>";
	echo "<td>".$row["parentcategoryid"]."</td></tr>";
	$cateid=$row["categoryid"];
	$parentcategoryid=$row["parentcategoryid"];
	$sql2="select * from category where parentcategoryid='".$categorynum."'";
	$result2=mysql_query($sql2)or die("This category has no childcategory.".mysql_error);
	while($row2=mysql_fetch_array($result2))
	  {
	    $sql3="update category set parentcategoryid='".$parentcategoryid."' where categoryid='".$row2["categoryid"]."'";
		$result3=mysql_query($sql3)or die("修改(将要被删除的类的)子类的父类ID出错！".mysql_error());
	  }
   }
   ?>
 
</table>
<?php
echo "<p><center><font color='red' size='10'>";
echo "<a href=\"ddcategory.php?dele_categoryid=".$cateid."\">delete</a></font></center></p>";
echo $cateid;


?>

</body>
</html>

