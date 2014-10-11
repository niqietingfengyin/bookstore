<?PHP
extract($_POST);
extract($_GET);
?>
<html>
<head>
<title>information confirm</title>
</head>
<body>
  <p align="center">the following information is going to be confirmed and<br> pressed by the following php<p>
  <h1 align="center">User register confirm form</h1>
  <hr />
  <form  name="registration" method="POST" action="add_customer.php" >
  <table border="1" width="45%" align="center" bordercolor=green cellspacing="1" cellpadding="15" bgcolor="#EEEEEE">
     <tr>
	   <td width="40%" align="right">	   
	   full name:
	   </td>
	  <td valign="bottom">
	  <h2>
	   <?php
	       if(empty($name))
		    { print("no name submitted!"); }
			 elseif((strlen($name)<1)||(strlen($name)>50))
			  { print("invalid name !");
			  }
			   else
			    { echo $name;}
	   ?>
	   </h2>
	   </td>
	   </tr>
	   <tr> 
	     <td  align="right">
		 email:
		 </td>
		 <td >
		 <h2>
         <?php
		  if(empty($_POST['email']))
			 { print("no email submitted!");}
			  elseif((strlen($_POST['email'])<1)||(strlen($_POST['email'])>50))
			   {print("invalid email address!");}
			   //elseif(!ereg("@",$_POST['email']))
			   elseif(!preg_match("/@/",$_POST['email']))
			    {print("invalid email :no @ symbol found!");}
				else
			   {	echo $_POST['email'];}
		 ?>	
         </h2>		 
	   </td>
	   </tr>
	  <tr>
	    <td  align="right">
		 password:
		 </td>
		 <td height="2">
		 <h2>
		 <?php
		   if(empty($password)||empty($cpassword))
		   {
		     print("no password submitted");
		   }
		   elseif(!($password==$cpassword))
		   {
		     print("password do not match!");
		   }
		   else
		  { echo $password; }
		 
		 ?>
		 </h2>
		 </td>
		 </tr>
		<tr>
		<td  align="right">
		 date of birth:
		 </td>
		 <td>
		<h3>
		 <?php
		   if(empty($month)||empty($day)||empty($year))
		  {  print("date of birth not submitted or incomplete.");}
          if(($year>2014)||($year<1900))
           { print("invalid year:  out of our mind.");}
           else
           {echo $year."-".$month."-".$day;	}	
		 ?>
		 <h3>
		</td>
		</tr> 
		<tr>
		<td align="right">
		  gender:
		  </td>
		  <td>
		  <h3>
		  <?php
		     if(empty($gender))
			    print "please input gender completely!";
			  switch($gender)
			  {case 'm':print "male";
			    break;
			    case 'f': print "female";
			  break;
			  default: break;
			  }
		  ?>
		  <h3>
		  </td>
         </tr>		
		<tr>
          <td  align="right">
		   your interests:
		  </td> 
		  <td colspan="3" >
		  <h3>
		  <?php
		  if(isset($fiction))
		    echo "fiction<br>";
			else
		      echo "&nbsp;";
		  if(isset($horror))
		    echo "horror<br>";
			else
		     echo "&nbsp;";
		  if(isset($action))
		    echo "action<br>";
			else
		     echo "&nbsp;";
		  if(isset($comedy))
		    echo "comedy<br>";
			else
		     echo "&nbsp;";
		  if(isset($thrillers))
		   echo "thrillers<br>"; 
		   else
		     echo "&nbsp;";
		   ?>
          </h3>		   
		   </td>
		</tr>
		<tr>
		 <td   align="right">
		you like:
        </td>
	     <td  height="20">
		 <h3>
	      <?php
		    if(count($hobbies))
		    { for($i=0;$i<count($hobbies);$i++)
			   echo $hobbies[$i]."<br>";
			 }
             else
             print "really?? you don't like anything??"			 
		  ?>
		  </h3>
	   </td>
	   </tr>
	   <tr>
	   <td colspan="2" align=center>
	    <input type="submit" name="confirm" value="confirm>>">
		</td>
		</tr >
		<tr>
		<td colspan="2">
		<a href="register.php">Çë·µ»Ø</a>
		</td>
		</tr>
		<tr>
		<?php
		echo "<input type=hidden name=\"name\" value=\"".$name."\">";
		echo "<input type=hidden name=\"email\" value=\"".$email."\">";
		echo "<input type=hidden name=\"password\" value=\"".$password."\">";
		echo "<input type=hidden name=\"gender\" value=\"".$gender."\">";
		echo "<input type=hidden name=\"month\" value=\"".$month."\">";
		echo "<input type=hidden name=\"day\" value=\"".$day."\">";
		echo "<input type=hidden name=\"year\" value=\"".$year."\">";
		?>
		
		</tr>
        </table>
	</form>
	</body>
	
	   </html>