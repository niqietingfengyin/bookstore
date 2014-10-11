<?php

$email=$_POST['email'];
$password=$_POST['password'];

if(empty($_POST['email'])||empty($_POST['password']))
{ 
 die("no email or password input!<br>");
 }
$conn=mysql_connect("localhost","root","101389");
$db=mysql_select_db("books");
$sql1="select * from newsmail where email='".$email."'";
$result1=mysql_query($sql1)or die("search failed!".mysql_error());
if($row1=mysql_fetch_array($result1))
{
   if($password==$row1["password"])
      {
       
		echo "welcome you to the website ".$row1["name"];
		//session_name();
		session_start();
		$_SESSION["logo"]=$row1["name"];
		//session_register("logo");
		//$logo=$row1["name"];
		header("Location:personal.php?PHPSESSID=".$PHPSESSID);//PHPSESSID是每个session唯一的随机的id，标识session，也是浏览器端保持的cookie的名字；
		
		//session_destroy("email");
		
	  }
  
    else
	{
	  echo "<center>password wrong<br>";
	  echo "<a href='login.php'>login again</a><center>";
	}

}
else
   {
   echo "no customer found.<br>";
   echo "<a href='login.php'>login again</a><center>";
   }



?>