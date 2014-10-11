<?php

extract ($_POST);
extract ($_GET);
?>
<?php

session_start();
$logo=$_SESSION['logo'];
if(!($_SESSION['logo']))
//if(!(session_is_registered("logo")))
{
session_unset();
session_destroy();
echo "<center><a href='login.php'>Login Please</a></center>";
exit();
}
else
 echo "Welcome ".$logo;
?>


<html>
<head>
<title>viewing cart</title>
</head>
<body>
<form name="form1" action="viewcart.php">
<table align='center' border="1" bordercolor='#abc' cellspacing="1" cellpadding="1">
<tr bgcolor="#EEEEEE">
<td><b>Serial NO.</b></td>
<td><b>Product ID</b></td>
<td><b>Title</b></td>
<td><b>Author</b></td>
<td><b>Description</b></td>
<td><b>Price</b></td>
<td><b>Action</b></td>
</tr>


<?php
  
  $conn=mysql_connect("localhost","root","101389");
   $db=mysql_select_db("books");
   
   $sql4="select customerid from newsmail where name='".$logo."'";
   $result4=mysql_query($sql4)or die("search customerid failed".mysql_error());
   $row4=mysql_fetch_array($result4);

  //当选中Remove复选框删除时，有两种方法提交被选中项目，先在数据库删除选中的项目，再读取剩下记录显示；
    if(!empty($del_me))
	 {
	   if(count($del_me)>0)
           { 
		      foreach($del_me as $i)
			    {
				    $sql3="delete from neworder where customerid=".$row4["customerid"]." and productid='".$i."'";
                    $result3=mysql_query($sql3)or die(" delete wrong!".mysql_error()); 
				
				}
		   
		   
		   }	 
	 }
   /* 
      $sql3="select productid from neworder where customerid='".$row4["customerid"]."'";
     $result3=mysql_query($sql3)or die("failed".mysql_error());
     while($row3=mysql_fetch_array($result3))
     {  
	  
		
		 //??????????????????
		 //如果productid属性定义为varchar变量型，则$row["productid"]读取的数字可以当成变量再次赋值，即是$$row["productid"],同时来标志每个产品；
		 //由于productid属性为int类型，因此$row["productid"]得到的是一个整数值，不能当做变量再来赋值；
		 //解决：每个productid作为数组的下标，因此该数组可用对应的productid来标识remove的操作，用数组$a["productid"]判断remove是否选中；
	  $i=$row3["productid"];
		   if($a[$i]==5)
		  { 
		    //echo 1;
		    $sql3="delete from neworder where customerid=".$row4["customerid"]." and productid='".$i."'";
            $result3=mysql_query($sql3)or die("wrong!".mysql_error());
		    }
		
	}  */
			
   $se=0;
   $money=0;
   $sql1="select productid from neworder where customerid='".$row4["customerid"]."'";
   $result1=mysql_query($sql1)or die("search productid failed.".mysql_error());
  
   while($row1=mysql_fetch_array($result1))
   {
      
     $sql2="select productid,name,author,description,price from products where productid='".$row1["productid"]."'";
      $result2=mysql_query($sql2)or die("search product failed.".mysql_error());
	 if($row2=mysql_fetch_array($result2))
	    {
		 
		  echo "<tr><td>".++$se."</td>"; 
		  echo "<td>".$row2["productid"]."</td>";
		  echo "<td>".$row2["name"]."</td>";
		  echo "<td>".$row2["author"]."</td>";
		  echo "<td>".$row2["description"]."</td>";
		  echo "<td>".$row2["price"]."</td>";
		  $money=$money+$row2["price"];
		  //$a=array();
		  //echo "<td><input type='checkbox' name='a[".$row2["productid"]."]'  value=5>Remove</td></tr>";
		  echo "<td><input type='checkbox' name='del_me[]' value='".$row2['productid']."'>Remove</td></tr>";
          }
		
		 
   }
   
   echo "<tr><td colspan='4'></td>";
   echo "<td><b>Total</b></td>";
   echo "<td colspan='2'><b>".$money."</b></td></tr>";
   echo "<tr><td colspan='7' align=\"right\">";
  // echo "<input type='submit' name='submit' value='Make Changes'></td></tr>";
  echo "<a href='#' onClick='form1.submit()'>Make Change</a></td></tr>"
  
  
 
?>
</table>
<p><center><a href="personal.php"><b>Back to the homepage.</b></a></center></p>
</form>
</body>
</html>