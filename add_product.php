<html>
<head>
<title>add_product</title>
</head>
<body bgcolor="#EEEEEE" text="#000000">
<form name=form11 method="POST" action="add.php?type=product" width="40%">
  <table width="20%" align=center cellpadding="1" cellspacing="1" border="1" >
    <tr bgcolor="#000000">
	<td colspan="2" align="center" width="35%"><font color="white">ADD PRODUCT</font>
	</td>
	</tr>
	<tr>
	<td align="middle"><b>Name</b>
	</td>
	<td >
	<div >
	<input type="text" name="name" size="30" maxlength="25">
	</div>
	</td>
	</tr>
	<tr>
	<td align="middle"><b>Author</b>
	</td>
	<td>
	<input type="text" name="author" size="30" maxlength="30">
	</td>
	</tr>
	<tr>
	<td align="middle"><b>Describe</b>
	</td>
	<td>
	<input type="text" name="describe" size="30" maxlength="30">
	</td>
	</tr>
	<tr>
	<td align="middle"><b>Price</b>
	</td>
	<td>
	<input type="text" name="price" size="30" maxlength="30">
	</td>
	</tr>
	<tr>
	<td align="middle"><b>Product Category</b>
	</td>
	<td >
	<div align="center" >
	<?php 
	  
		$conn=mysql_connect("localhost","root","101389")or die("wrong datebase");
		$db=mysql_select_db("books");
		$sql="select categoryid,name from category";
		$result=mysql_query($sql);
	    
		echo "<select name=\"parentcategory\">";
	    echo "<option>Select product category</option>";
	    while($row=mysql_fetch_array($result))
	   { 
	     echo "<option value=\"".$row[categoryid]."\">".$row["name"]."</option>";
        }
		echo "</select>";
	?>
	</div>
	</td>
	</tr>
	<tr>
	<td colspan="2" align=center>
	<input type="submit" value="submit" name="submit1">
	</td>
	</tr>
	</table>
	</form>
	
</body>

</html>