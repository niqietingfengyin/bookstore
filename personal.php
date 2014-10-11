<?php
extract($_POST);
extract($_GET);

session_start();
if(!isset($_SESSION["logo"]))
{
session_unset();
session_destroy();
echo "<center><a href='login.php'>Login Please</a></center>";
exit();
}
$logo=$_SESSION['logo'];
//$category=$_POST['category'];
?>
<html>
<head>
<title> logined</title>
<meta http-equiv="Content-Type" content="text/html; charset=GB-2312">

</head>
<body bgcolor="#FFFFFF" text="#000000" id='body'>
<p>Welcom to the webset <?php echo $logo; ?></p>

<?php 
$conn=mysql_connect("localhost","root","101389") or die("不能连接服务器".mysql_error());
$x2=mysql_select_db("books",$conn) or die("不能连接指定数据库".mysql_error());
if(!isset($category))
{
 $category=6;
}
$childval=$category;   //保持category的值不变；找出的所属类别存在catname数组和catid数组里
$query="select categoryid,name,parentcategoryid  from category where categoryid=\"".$childval."\"";
$result=mysql_query($query);
if($row=mysql_fetch_array($result))
{
  $catid[1]=$row["categoryid"];
  $catname[1]=$row["name"];
  $childval=$row["parentcategoryid"];//把父类id赋给变量，再寻找变量对应的一行
  }
//左上角的进度>>
while(($childval)!=0)

{ 
  $sql="select categoryid,name,parentcategoryid from category where categoryid=\"".$childval."\"";
  $result=mysql_query($sql);
  if($row=mysql_fetch_array($result))
   {
     $catid[]=$row["categoryid"];
	 $catname[]=$row["name"];
	 $childval=$row["parentcategoryid"]; 
   }
} 

// echo "<p>&nbsp;</p>";
for($i=count($catname);$i>0;$i--)
{ 
 //echo $i; 
 echo "<font size=5><a href=\"personal.php?category=".$catid[$i]."\">".$catname[$i].">></a></font> ";

}

?>

<!--右上角的搜索部分><!-->

<p>&nbsp;</p>
<table align=center width="90%" height="10%"    cellpadding="1" cellspacing="1">
<tr>
<td>
<form name="form1" method="post" action="searchvisitor.php" >
<div align="right" >Search
<input type="text" name="search" size="30" maxlength="20">

<select name="searchfor">
<option value="all">all</option>
<option value="title">titiles</option>
<option value="author">authors</option>
</select>

<?php
//echo "<input type=\"hidden\" name=\"category\" value=\"".$category."\">";
?>
<input type="submit" name="submit" value="submit" >
</div>
</form>
</td>
</tr>
</table>

<hr/>
<!--左上角sub categories 表单><!-->
<table align=center width="90%"   border="1" bordercolor='#abc'  cellspacing="1" cellpadding="1">
<td >
<h2 >Categories:</h2>

<table width="100%" height="88" border="0" bordercolor="#bbb" cellspacing="1" cellpadding="1">
<?php
$conn=mysql_connect("localhost","root","101389") or die("不能连接服务器".mysql_error());
$x2=mysql_select_db("books",$conn) or die("不能连接指定数据库".mysql_error());

$query="select categoryid,name,description,parentcategoryid from category";
$result=mysql_query($query)or die("worong".mysql_error());
while($row=mysql_fetch_array($result))
{
  echo "<tr><td >";
  echo "<p><a href=\"personal.php?category=".$row["categoryid"]."\">".$row["name"]."</a></p>";
  echo "</td>";
  echo "<td >";
  echo "<p>".$row["description"]."</p>";
  echo "</td></tr>";

}

?>
</table>

<!--中间的蓝框的表格，用来确定从searchvisitor页面返回的category值；每次点击将向更高的类别改变；><!-->
<table  width="100%" height="40" border="2" bordercolor='#56abde' cellspacing="1" cellpadding="3" >
<!--php语言编写sub categories下的内容>-->
<?php
$query="select categoryid,name,description,parentcategoryid from category where categoryid=\"".$category."\"";
$result=mysql_query($query);
while($row=mysql_fetch_array($result))
{
  echo "<tr>";
  echo "<td width='35%' >";//下面一句话链接主页，但是传递的category值变成父id，所以点击将向上一类别；
  //echo "<p><b><a href=\"personal.php?category=".$row["parentcategoryid"]."\">>>".$row["name"]."</a></b></p>";
  echo "<p><b>>>".$row["name"]."</b></p>";
  echo "</td>";
  echo "<td width=\"400\" height=\"10\">";
  echo "<p><b>".$row["description"]."</b></p>";
  echo "</td>";
  echo "</tr>";
} 
?>
</table>


<!--左下角category products表单><!-->
<h2>Category Products:</h2>
<table width="100%"  border="3"  cellspacing="1" cellpadding="3">
<tr>
<td><b>productname</b></td>
<td><b>author</b></td>
<td><b>description</b></td>
<td><b>price</b></td>
<td colspan="2"><b>action</b></td>
</tr>
<!--category product表单下的内容显示><！-->
<?php 
   $sql4="select customerid from newsmail where name='".$logo."'";
   $result4=mysql_query($sql4)or die("search customerid failed".mysql_error());
   $row4=mysql_fetch_array($result4);


$query="select productid,name,author,description,price from products where category=\"".$category."\"";
$result=mysql_query($query);
//echo $category;
while($row=mysql_fetch_array($result))
{
  echo "<tr><td>";
  echo "<p><b>".$row['name']."</b></p>";
  echo "</td>";
  echo "<td>";
  echo "<p><b>".$row['author']."</b></p>";
  echo "</td>";
  echo "<td>";
  echo "<p><b>".$row['description']."</b></p>";
  echo "</td>";
  echo "<td>";
  echo "<p><b>".$row['price']."</b></p>";
  echo "</td>";
  echo "<td width=50%>";
  echo "<a href=\"addtocart.php?customerid=".$row4["customerid"]." & productid=".$row["productid"]."\">add to cart</a>";
  echo "</td>";
  echo "<td width=50%>";
  echo "<a href=\"removefromcart.php?customerid=".$row4["customerid"]."&productid=".$row["productid"]."\">remove from cart</a>";
  echo "</td>";
  echo "</tr>";

} 
?>
</table>
</td>

<!--右下角登陆界面><!-->
<td width="210" >
<p align="center"><b><a href="admin.php" style="text-decoration:none">Administation Login</a></b></p>
<br>
<p align="center"><b><a href="viewcart.php?customerid=2" style="text-decoration:none">Viewing your Cart!</a></b></p>
<br>
<p align="center"><b><a href="logout.php" style="text-decoration:none">Log out</a></b></p>


</td>


</table>


</body>
</html>