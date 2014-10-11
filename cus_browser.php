
<?php
    echo "<table width='700' border='1' align=center cellpadding='1' cellspacing='1'>";
	echo "<p>&nbsp;</p>";
	echo "<p>&nbsp;</p>";
	echo "<p>&nbsp;</p>";
    echo "<tr>";
    echo  "<td width=200><b><center>Categoryid</center></b></td>";
    echo  "<td width=200><b><center>Name</center></b></td>";
    echo  "<td width=200><b><center>Bob</center></b></td>";
    echo  "<td width=200><b><center>Gender</center></b></td>";
    echo  "<td width=200><b><center>E-mail</center></b></td>";  
    echo "</tr>";
  $conn=mysql_connect("localhost","root","101389");
   mysql_select_db("books",$conn);
  
   $sql="select * from customerinfo";
   $result=mysql_query($sql)or  die("customers search failed".mysql_error());
   while($row=mysql_fetch_array($result))
   {
           echo "<tr>";
		   echo "<td>".$row["customerid"]."</td>";
		   echo "<td>".$row["name"]."</td>";
		   echo "<td>".$row["bob"]."</td>";
		   echo "<td>".$row["gender"]."</td>";
		   echo "<td>".$row["email"]."</td></tr>";
   }
   echo "</table><br><br>";
   echo "<p><center>";
   echo "If you want to Admin Page<br><br>";
   echo "<a href='admin.php'>Click Here</a></center></p>";
  
  ?>