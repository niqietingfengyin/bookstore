<?php

session_start("logo");
if(!($_SESSION["logo"]))
{
session_unset();
session_destroy();
header("Location:login.php");
//echo "<center><a href='login.php'>Login Please</a></center>";
//exit();
}
?>


<html>
<head>
<title>Administration quantity</title>
</head>
<body>
<center>
<h1 align="center">Administrator Page</h1>
<br><br>
<table  align="center" width="50%"  border="0" cellspacing="1" cellpadding="1">
<tr ><td colspan="1"><font size="4"><b>PRODUCTS</b></font></td></tr>
<td>&nbsp;</td>
<tr>
<td ><a href="add_product.php" style="text-decoration:none">Add Products,</a>
<a href="dele_product.php" style="text-decoration:none">Remove Products,</a>
<a href="pro_browser.php" style="text-decoration:none">Product Browser </a></td>
</tr>
<td>&nbsp;</td>

<tr><td><font size="4"><b>CATEGORIES</b></font></td></tr>
<td>&nbsp;</td>
<tr>
<td><a href="add_category.php" style="text-decoration:none">Add Categories, </a>
<a href="dele_category.php" style="text-decoration:none">Remove Categoies,</a>
<a href="cate_browser.php" style="text-decoration:none">Category Browser  </a></td>
</tr>
<td>&nbsp;</td>

<tr><td><font size="4"><b>CUSTOMERS</b></font></td></tr>
<td>&nbsp;</td>
<tr>
<td><a href="register.php" style="text-decoration:none">Add Customers, </a>
<a href="dele_customer.php" style="text-decoration:none">Remove Customers, </a>
<a href="cus_browser.php" style="text-decoration:none">Customer Browser</a></td>
</tr>
</table>
</center>
<p align='center'>
<a href="personal.php"><font color="red"><b>Return to Homepage</b></font></a>
</p>

</body>
</html>