<?php
session_name();
session_start("adm");
if($_SESSION["logo"])
{
  session_unset();
  session_destroy();
  header("Location:login.php");
}
else
 die("only logged in users can be thrown out!");


?>