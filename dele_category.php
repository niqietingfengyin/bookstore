<html>
<head>
<title>deletecategories</title>
<meta http-quiv="content-type" content="text/html;charset=gb2312" >
</head>
<body>
  <form name="form31" method="POST" action="dcategory.php">
    <table border="1" width="40%" align="center" cellspacing="1" cellpadding="1">
    <p>&nbsp;</p>
	<tr bgcolor="#000000" >
	<td colspan="2" align=center><font color="#FFFFFF">Choose a CATEGORY  which is to be deleted</font></td>
	</tr>
	<tr bgcolor="#CCCCCC">
	<td width="70%" align=center>
	<?php
	  $conn=mysql_connect("localhost","root","101389");
	  $db=mysql_select_db("books");
	  $sql="select name,categoryid from category";
	  $result=mysql_query($sql)or die("wrongla!");
	  echo "<select name='categorynum'>";
	  echo "<option>Select Product Category</option>";
	  while($row=mysql_fetch_array($result))
	  {
	   echo "<option value=\"".$row["categoryid"]."\">".$row["name"]."</option>";
	  }
	?>
	</td>
	<td align=center>
    <input type="submit" name="submit31" value="BROSER">
    </td>	
	</tr>
	</form>
	</body>
	</html>