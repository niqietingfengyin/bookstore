
<?php
    echo "<table width='1000' border=1 align=center>";
    echo "<tr>";
    echo  "<td width=200><b><center>Productid</center></b></td>";
    echo  "<td width=200><b><center>Name</center></b></td>";
    echo  "<td width=200><b><center>Author</center></b></td>";
    echo  "<td width=200><b><center>Description</center></b></td>";
    echo  "<td width=200><b><center>Price</center></b></td>";  
    echo  "<td width=100><b><center>Category</center></b></td>";
    echo "</tr>";
  $conn=mysql_connect("localhost","root","101389");
   mysql_select_db("books",$conn);
  
   $sql="select * from products";
   $result=mysql_query($sql)or  die("failed".mysql_error());
   while($row=mysql_fetch_array($result))
   {
           echo "<tr>";
		   echo "<td>".$row["productid"]."</td>";
		   echo "<td>".$row["name"]."</td>";
		   echo "<td>".$row["author"]."</td>";
		   echo "<td>".$row["description"]."</td>";
		   echo "<td>".$row["price"]."</td>";
           echo "<td>".$row["category"]."</td></tr>";
   }
   echo "</table><br><br>";
   echo "<p><center>";
   echo "If you want to Admin Page<br><br>";
   echo "<a href='admin.php'>Click Here</a></center></p>";
  
  ?>