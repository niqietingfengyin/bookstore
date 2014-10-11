<?php
session_start();
if(isset($_SESSION['adm']))
{
 header("Location:hello.php");
 exit;
}
$nickname=$_POST['username'];
$password=$_POST['password'];
if(($nickname=="admin")&&($password=="123456"))
{
  session_register("adm");
  $adm=$nickname;
 
  header("Location:hello.php");
}
else
{
 echo "<table width='100%' align=center><tr><td align=center>";
 echo "密码或用户名错误，或者管理员账户错误哦<br><br>";
 echo "<font color=red><h1 align=center>管理员登陆错误</h1></font><br><a href='session.php'>请重试<a>";
 echo "</td></tr></table>";

}

?>