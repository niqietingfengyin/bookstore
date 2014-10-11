<html>
<head>
<title>add_product</title>
</head>
<body bgcolor="#EEEEEE" text="#000000">
<form name=form12 method="POST" action="add.php?type=category" width="40%">
  <table width="30%" bgcolor="#CCCCCC" align=center cellpadding="1" cellspacing="1" border="1" >
    <tr bgcolor="#000000">
	<td colspan="2" align="center" height="30" width="35%"><font color="red">ADD CATEGORY</font>
	</td>
	</tr>
	<p>&nbsp;</p>
    <tr >
	<td align="middle"><b>Name</b>
	</td>
	<td >
	<div align=center>
	<input type="text" name="catname" size="40" maxlength="40">
	</div>
	</td>
	</tr>
	<tr>
	<td align="middle"><b>Description</b>
	</td>
	<td>
	<input type="text" name="catdescribe" size="40" maxlength="40">
	</td>
	</tr>
	
	<tr>
	<td align="middle"><b>Parent Category</b>
	</td>
	<td >
	<?php 
	    $conn=mysql_connect("localhost","root","101389")or die("wrong datebase");
		$db=mysql_select_db("books");
		$sql="select categoryid,name from category";
		$result=mysql_query($sql);
	    echo "<div align=\"center\"  width=55>";
		echo "<select name=\"pcategory\">";
	    echo "<option>Select parent category</option>";
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
	<input type="submit" value="submit" name="submit2">
	</td>
	</tr>
	</table>
	
	</form>
	
</body>

</html>