<?php
     $dele=$_GET['dele_categoryid'];
     //echo $dele;
    $conn=mysql_connect("localhost","root","101389");
	$db=mysql_select_db("books",$conn);
     $sql3="delete from category where categoryid='".$dele."'";
     $result3=mysql_query($sql3)or die("delete category failed!".mysql_error());
	 if($result3)
	 echo "<b><center>category has been deleted sucessfully!<center></b>";
?>
<html>
<body>
<center>
<br>
<br>
<td>&nbsp;</td>
<p>If you want to Admin Page</p>
<p><b><a href="admin.php">Click Here!</a></b></p>
</center>
</body>
</html>