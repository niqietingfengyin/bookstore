<?php

$conn=mysql_connect("localhost","root","101389");
mysql_select_db("books",$conn);
$sql1="insert into products values('2','php开发实例','国安','describe the basic knowledge of php','39.0','1')";
$sql2="insert into category values('1','tool','used to assist engineer','1')";
$sql3="insert into category values('2','fiction','interesing stories')";
 $result1=mysql_query($sql1,$conn);
 $result2=mysql_query($sql2,$conn);
 $result3=mysql_query($sql3,$conn);
 if(!($result1))
  echo "插入表products失败";
  if (!($result2))
  echo "插入表category失败";
  if (!($result3))
  echo "插入表category又失败啦";
  else 
  echo "OK,sucessed!";
?>