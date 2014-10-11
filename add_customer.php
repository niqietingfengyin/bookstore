<?PHP
extract($_POST);
extract($_GET);
?>
<?php
if(empty($name))
  die( " your name left blank!<br>");
 if(empty($email))
  die("your email left blank!<br>");
  if(empty($password))
  die("your password left blank!<br>");
  if(empty($gender))
  die("your gender left blank!<br>");
  if(empty($year))
  die("year left blank!<br>");
  
  $conn=mysql_connect("localhost","root","101389"); //newsmail表应该存在，且保存注册邮箱的；
  mysql_select_db("books",$conn);
  //验证注册邮箱是否重复
   $result=mysql_query("select email from newsmail where email='".$email."'");
   if($row=mysql_fetch_array($result))  
   {
   print("sorry that user ".$email."  already exists!<br>");
   }
   //如果邮箱不重复，则属于有效信息，分别插入customerinfo,login和newsmail三张表中；
   else
   {
   //确定新的 customerid;
   $sql="select max(customerid) as customerid from customerinfo";
   $result=mysql_query($sql);
   /*if($result)
      {
	    $row1=mysql_fetch_array($result);
		echo ++$row1['customerid'];
	  
	  }*/
   if($row=mysql_fetch_array($result))
   {
      $customerid=++$row["customerid"];
	 // echo $customerid;
	  //echo $row["customerid"];
   }
   else
   {  print "something wrong with the customerinfo table!";
   }
  
 
  //把个人信息插入 表customerinfo；
  $bob=$year."-".$month."-".$day;
   $sql="insert into customerinfo values('".$customerid."','".$name."','".$bob."','".$gender."','".$email."')";
   $result=mysql_query($sql)or die("insert failed".mysql_error());
   if(!($result))   
   {
     die("user personal information could not be stored.<br>");
   }
  //把验证信息插入 表login；
  
   $sql="insert into login values('".$customerid."','".$password."','')";
    $result=mysql_query($sql)or die("login failed".mysql_error());
    if(!($result))
	{
	  die("user authentication information could not be stored.<br>");
	}
	//把邮箱信息插入 表newsmail;
	$sql="insert into newsmail values('".$email."','".$customerid."','".$password."','".$name."')";
	$result=mysql_query($sql)or die("newsamil insert failed".mysql_error());
	if(!($result))
	{
	  echo "user e-mail information could not be stored.<br>";
	}
	echo "<center><h2>New User Added Sucessfully</h2></center>";
	
	
	echo "<br><br><hr />";
	echo "Customerid/Login ID:".$customerid."<br>";
	if($gender=='m')
      echo  "Name: MR ".$name."<br>";
     else 
      echo  "Name: MS ".$name."<br>";
    echo "email: ".$email."<br>";
    echo "Password: ******<br>";
	}
    echo "<a href='login.php'>Forced to login page</a>";	
    	  	
   ?>