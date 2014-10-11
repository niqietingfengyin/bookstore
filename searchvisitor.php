<?php
extract($_POST);
extract($_GET);
?>
<html>
<head>
<title>search_page</title>
</head>
<body bgcolor="#FFFFF" TEXT="#00000">
<?php
$search=$_POST['search'];
if(!isset($_POST['search']))
   { print "no search submitted!";
   }
 if(empty($search))
   print  "search data empty!";
   
if(!isset($searchfor))
   print "search criteria not submitted!";
if(empty($searchfor)) 
   print "search criteria empty!";
   
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
   $result=mysql_query($sql);
   while($row=mysql_fetch_array($result))
   { //判断搜索的条件是标题，作者或是全部
     if($searchfor=="title")
	  {
	    if(stristr($row["name"],$search))
	       {
		   echo "<tr>";
		   echo "<td>".$row["productid"]."</td>";
		   echo "<td>".$row["name"]."</td>";
		   echo "<td>".$row["author"]."</td>";
		   echo "<td>".$row["description"]."</td>";
		   echo "<td>".$row["price"]."</td>";
		   //根据category号到表category中找相应的name,然后输出该类别名，且链接上主页；
		   $s1="select name from category where categoryid='".$row["category"]."'";
	       $re1=mysql_query($s1);
		   if($row1=mysql_fetch_array($re1))
		     {
			    echo "<td><a href=\"personal.php?category=".$row["category"]."\">".$row1["name"]."</a></td>";
			  }
		    else
			 { echo "<td>category missing!</td>"; 
			  }
			  echo "</tr>";
		   }
	
	   }
      elseif($searchfor=="author")
        {
		   if(stristr($row["author"],$search))
		      {
			    echo "<tr>";
				echo "<td>".$row["productid"]."</td>";
				echo "<td>".$row["name"]."</td>";
				echo "<td>".$row["author"]."</td>";
				echo "<td>".$row["description"]."</td>";
				echo "<td>".$row["price"]."</td>";
				$s2="select name from category where categoryid='".$row["category"]."'";
			     $re2=mysql_query($s2);
				 if($row2=mysql_fetch_array($re2))
			     {
				   echo "<td><a href=\"personal.php?category=".$row["category"]."\">".$row2["name"]."</a></td>";
				 }
				 else
				  echo "category missing!!!";
				  echo "</tr>";
			  }
		
		}
		elseif($searchfor="all")
		{
		   if((stristr($row["name"],$search))||(stristr($row["author"],$search))||(stristr($row["description"],$search)))
		    {
			   echo "<tr>";
			   echo "<td>".$row["productid"]."</td>";
			   echo "<td>".$row["name"]."</td>";
			   echo "<td>".$row["author"]."</td>";
			   echo "<td>".$row["description"]."</td>";
			   echo "<td>".$row["price"]."</td>";
			   $s3="select name from category where categoryid='".$row["category"]."'";
			   $re3=mysql_query($s3);
			   if($row3=mysql_fetch_array($re3))
			     {
				   echo "<td><a href=\"personal.php?category=".$row["category"]."\">".$row3["name"]."</a></td>";
				 }
				 else
				 echo "<td>category missing!!</td>";
				 echo "</tr>";
			   
			}
		}
   }  
   
?>
</body>
</html>