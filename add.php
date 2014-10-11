<?php
extract ($_POST);
extract ($_GET);
?>
<html>
<head>
<title>add product or category</title>
</head>
<body bgcolor="#FFFFFF" >
<?php
$conn=mysql_connect("localhost","root","101389");
$db=mysql_select_db("books");

 if($type=="product")
 { 
   $s1="select max(productid) as productid from products";
   $re1=mysql_query($s1);
   if($row1=mysql_fetch_array($re1))
     $productid=++$row1["productid"];
   $sql="INSERT into products VALUES('".$name."','".$author."','".$describe."','".$price."','".$parentcategory."','".$productid."')";
   $result=mysql_query($sql)or die("insert  wrong!"); 
  
 ?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<center>
<table  border="1" bordercolor=red cellspacing="1" cellpadding="1" >
  <tr>
    <td width="40%">Product category</td>
	<td><?php echo $_POST["parentcategory"] ; ?></td>
	</tr>
  <tr>
     <td>Name</td>
	 <?php 
	 if(empty($name))
	 echo "<td>&nbsp;</td>"; 
	 else
	 echo "<td>".$name."</td>";
	 ?>
	 
	 </tr>
  <tr>
     <td>Author</td>
	 <td><?php echo $author;?></td>
	 </tr>
   <tr>
     <td>Description</td>
	 <td><?php echo $describe;?></td>
	 </tr>
   <tr>
     <td>Price</td>
	 <td><?php echo $price;?></td>
	 </tr>
	 
	</table>
	<p ><b>Add product sucessfully!<b></p>
	<p><b>To return to the  Admin page</b></p>
	<b><a href="admin.php">click here</b></a>
	</center>
	</body>
	</html>
	<?php
	}
	elseif($type=="category")
	{ 
	    if(empty($catname)||empty($pcategory)||empty($catdescribe))
		{
		print ("input incompeted!");

		}
     else
     {	 $s2="select max(categoryid) as categoryid from category";
      $re2=mysql_query($s2);
      if($row2=mysql_fetch_array($re2))
      $categoryid=++$row2["categoryid"];
       $sql="insert into category values('".$catname."','".$catdescribe."','".$pcategory."','".$categoryid."')";
	  $result=mysql_query($sql)or die("insert into category failed."); 
	 
	  //echo $_POST["pcategory"];
	 
	  echo "<p>&nbsp;</p>";
	  echo "<table align=\"center\" border=1 bordercolor=red>";
	  echo "<tr><td width=\"40%\">parent category</td>";
	  echo "<td>".$pcategory."</td></tr>";
	  echo "<tr><td>name</td>";
	  echo "<td>".$catname."</td></tr>";
	  echo "<tr><td>description</td>";
	  echo "<td>".$catdescribe."</td></tr>";
	  echo "</table><br><br>";
	  echo "<center><p>If you want to admin page<br>";
	  echo "<a href=\"admin.php\">click here</a></p></center>";
	 
	 }
	}
	
	?>