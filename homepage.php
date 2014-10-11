
<html>
<head>
<title>homepage</title>
<meta http-equiv="Content-Type" content="text/html; charset=GB-2312">
<style>

#body {background-image: url(./images/book.jpg);
       }

</style>
</head>
<body bgcolor="#FFFFFF" text="#000000" id='body'>
<?php 
extract($_POST);
extract($_GET);

$conn=mysql_connect("localhost","root","101389") or die("不能连接服务器".mysql_error());
$x2=mysql_select_db("books",$conn) or die("不能连接指定数据库".mysql_error());
if(!isset($category))
{
 $category=6;
}
$childval=$category;
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
  
 echo "<font size=5 ><a href=\"homepage.php?category=".$catid[$i]."\">".$catname[$i].">></a></font> ";

} 

?>

<!--右上角的搜索部分><!-->

<p>&nbsp;</p>

<table class="search" >
<style type="text/css">
.search{ 
        
		 padding:1px 1px 1px 20px;
         width:90%;
         height:10%;
		
		 }
.search div{text-align:right;}
.search #in:focus{
             background-color:yellow;
           
          }
</style>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>

<td>
<form name="form1" method="post" action="searchvisitor.php" >
<div >Search
<input id="in" type="text" name="search" size="30" maxlength="20">

<select name="searchfor">
<option value="all">all</option>
<option value="title">titiles</option>
<option value="author">authors</option>
</select>

<input type="submit" name="submit" value="submit" >
</div>
</form>
</td>
</tr>
</table>

<hr/>
<table  width="90%"   border="0" bordercolor='green'  cellspacing="1" cellpadding="1">

<!--左上角sub categories 表单><!-->
<tr>
<td >
<h2 >Sub categories:</h2>

<table width="100%" class="sub_cat" height="88" >
<style type="text/css">
.sub_cat a:link {   text-decoration:none;
                    color:blue;}
.sub_cat a:visited {color:red;}
.sub_cat a:hover {font-size:18px;
                   background-color:green;}
.sub_cat { 
           border:#cccccc dashed thin;
           border-collapse:separate;
           border-spacing:2px 1px;
                 padding:3px;
				 line-height:1.2em;
                 }
.sub_cat tr td{ width:30px;
                padding-left:3px;}
</style>
<?php

$conn=mysql_connect("localhost","root","101389") or die("不能连接服务器".mysql_error());
$x2=mysql_select_db("books",$conn) or die("不能连接指定数据库".mysql_error());

$query="select categoryid,name,description,parentcategoryid from category";
$result=mysql_query($query);
while($row=mysql_fetch_array($result))
{
  echo "<tr><td >";
  echo "<p><a href=\"homepage.php?category=".$row["categoryid"]."\">".$row["name"]."</a></p>";
  echo "</td>";
  echo "<td >";
  echo "<p>".$row["description"]."</p>";
  echo "</td></tr>";

} 

?>
</table>

<!--中间的蓝框的表格，用来确定从searchvisitor页面返回的category值；每次点击将向更高的类别改变；><!-->
<table  width="100%" height="40" border="1" bordercolor='green' cellspacing="1" cellpadding="3" >
<!--php语言编写sub categories下的内容><!-->
<?php  
$query="select categoryid,name,description,parentcategoryid from category where categoryid=\"".$category."\"";
$result=mysql_query($query)or die("connect failed.".mysql_error());
while($row=mysql_fetch_array($result))
{
  echo "<tr>";
  echo "<td width='35%' >";//下面一句话链接主页，但是传递的category值变成父id，所以点击将向上一类别；
  echo "<p><font size='5'><i>".$row["name"]."</i></b></font></p>";
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
<table class="cat_pro" width="100%"  border="1" bordercolor='green' cellspacing="1" cellpadding="3">
<style type="text/css">
.cat_pro a:hover{
                  color:red;
         }
</style>
<thead>


<tr>
<td><b>productname</b></td>
<td><b>author</b></td>
<td><b>description</b></td>
<td><b>price</b></td>
<td colspan="2"><b>action</b></td>
</tr>
</thead>

<!--category product表单下的内容显示><！-->
<?php 

$query="select productid,name,author,description,price from products where category=\"".$category."\"";
$result=mysql_query($query)or die("connect failed".mysql_error());
while($row=mysql_fetch_array($result))
{
  echo "<tbody><tr><td>";
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
  echo "<td width=\"120\">";
  echo "<a href=\"addtocart.php?customerid=2&productid=".$row["productid"]."\">add to cart</a>";
  echo "</td>";
  echo "<td width=\"120\">";
  echo "<a href=\"removefromcart.php?customerid=2&productid=".$row["productid"]."\">remove from cart</a>";
  echo "</td>";
  echo "</tr></tbody>";

} 
?>  
</table>
</td>

<!--右下角登陆界面><!-->
<td width="310" >
<center>
<form name="form1"  method="post" action="loginmsg.php">
<table width="200"  cellspacing="3" cellpadding="1" border="1" bordercolor='green'>
<tr>
<td colspan="2" bgcolor="#000000"> 
<div align="center"><font color="white"><b>LOGIN</b></font></div>
</td>
</tr>

<tr bgcolor="#EEEEEE">
<td>
<div align="right"><b>e_mail</b></div>
</td>
<td>
<div align="center">
<input type="text" name="email" size="15" maxlength="100">
</div>
</td>
</tr>

<tr bgcolor="#EEEEEE">
<td>
<div align="right"><b>password</b></div>
</td>
<td>
<div align="center">
<input type="text" name="password" size="15" maxlength="15">
</div>
</td>
</tr>

<tr bgcolor="#EEEEEE">
<td colspan="2">
<center>
<input type="submit" name="submit" value="submit">
</center>
</td>
</tr>

</table>
</form>

<center>
<p></p>
<br />
<p > <b>If you don't have a username/password<br /><br /><br/><a href="register.php">click here</a></b></p>

</center>
</tr>
</center>
</td>

</table>

</body>
</html>