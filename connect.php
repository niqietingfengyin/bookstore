<?php
$conn=mysql_connect("localhost","root","101389")or die("不能连接服务器".mysql_error());
   mysql_select_db("test",$conn)or die("不能选择特定数据库".mysql_error());
   $result=mysql_query("select * from users",$conn);
//以上两句等价于mysql_db_query();
//$result=mysql_db_query("test","select *from users",$conn) or die("不能正常连接数据库或者查询语句出错：".mysql_error());
print "connect to mysql database sucessfully.<br>";
echo "<br>";

while($row=mysql_fetch_array($result))
{
   print "name:".$row[name];
   print "<br>id:".$row[id];
   print "<br>tel:".$row[tel];
   echo "<br><br>";
}//mysql_create_db(dbname,$conn);创建数据库
//mysql_drop_db(dbname,$conn);删除数据库
//mysql_list_dbs($conn);获得所有数据库数组；
//mysql_list_tables(dbname);获得所有表数组；
//mysql_list_fields(dbname,tablename,$conn);获得所有字段；
//mysql_tablename();显示数据库或者表或者字段名；
$insert="insert into users(name,tel)values('王倩','10010')";//用php实现mysql的插入、删除、更新操作；
mysql_query($insert,$conn)or die("插入操作失败！".mysql_error());
print "最后插入的记录的id:".mysql_insert_id();
?>