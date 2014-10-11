<?php
if(!isset($_COOKIE['vi']))
{ //$_COOKIE['visits']的初值如果正确确定，就简单啦
  
  //setcookie("visits",1);
  $_COOKIE['vi']=0;
  echo "<br><b>欢迎你第<font color=red>".$_COOKIE['vi']."</font>次光临我的主页</b><br>";
  
}
else
{
 
 $visits=$_COOKIE['vi']+1;
 setcookie("vi",$visits,time()+3600);//等价于 $_COOKIE['vi']=$visits;及$visits改变之后再付给$_COOKIE['vi']
  //$_COOKIE['vi']和$visits关系类似把B+1赋给A，再把A付给B；
 echo "<br><b>这是第<font color=red>".$visits."</font>次光临我的主页</b><br>";
}
?>