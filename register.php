<html>
<head>
<title>register</title>
</head>
<body>
<h1 align="center">User Registration form</h1>
<hr />
<form name="registration" bgcolor="#CCCCCC" method="POST"  action="confirm.php" enctype="multipart/form-data">
   <table width="50%" border="1"  align=center cellspacing="0" cellpadding="5" bgcolor="#CCCCCC">
   <tr>
     <td width="45%" align="right">
     full name
     </td>
     <td colspan="2" >
	 <input type="text" name="name" size="25" maxlength="25">
	 </td>
	</tr>
	<tr>
	 <td width="45%" align="right">
	 email
	 </td>
	 <td>
	 <input type="text" name="email" size="25" maxlength="25">
	 </td>
	 </tr>
	<tr>
	 <td width="45%" align="right">
	 password
	 </td>
	 <td>
	 <input type="password" name="password" size="25" maxlength="25">
	 </td>
	 </tr>
	<tr>
	 <td width="45%" align="right">
	 confirm password
	 </td>
	 <td>
	 <input type="password" name="cpassword" size="25" maxlength="25">
	 </td>
	 </tr>
	<tr>
	<td width="45%" align="right">
	date of birth
	</td>
	<td >
	   <table width="100%" border="0" bordercolor=blue  cellspacing="1" cellpadding="3">
	      <select name="month">
		    <option value=1>January</option>
			<option selected value=2>Februay</option>
			<option value=3>March</option>
			<option value=4>April</option>
			<option value=5>May</option>
			<option value=6>June</option>
			<option value=7>July</option>
			<option value=8>August</option>
			<option value=9>September</option>
			<option value=10>October</option>
			<option value=11>November</option>
			<option value=12>December</option>
			</select>
		  <select name="day">
		    <option selected value=1>01</option>
			<option value=2>02</option>
			<option value=3>03</option>
			<option value=4>04</option>
			</select>
		  <input type="text" name="year" size="4" maxlength="4">(1999)
		  </table>
     </td>
    </tr>
	<tr>
	  <td width="45%" align="right">gender
      </td>
      <td>
        <table border="0"  cellspacing="3" cellpadding="3">
          <td height="2" width="25%">
            <input type="radio" name="gender" value=m>Male
            </td>
          <td width="27%">
            <input type="radio" name="gender" value=f>female
            </td>
          </table>
        </td>
    </tr>
	<tr>
	 <td width="45%" align="right">
	 please choose topics of interest
     </td>
	 <td height="4">
	   <table border="0" bordercolor='black' width="100%">
	    <tr>
		<td width="20%">
		<input type="checkbox" name="fiction" value="fiction">fiction
		</td>
		<td width="20%">
		<input type="checkbox" name="horror">horror
		</td>
	    </tr>
		<tr>
		<td width="20%">
		<input type="checkbox" name="action" value="action">action
		</td>
		<td width="20%">
		<input type="checkbox" name="comedy">comedy
		</td>
	    </tr>
	    <tr>
		<td width="20%">
		<input type="checkbox" name="thriller" value="fiction">thrillers
		</td>
		<td >
		</td>
	    </tr>
	    </table>
	  </td>
	</tr>
	<tr>
	 <td width="45%" height="40" align="right">
	 <p>select hobbies</p>
	 <p>(select multiple choices by holding the ctrl key and clicking on them by one)</p>
	  </td>
	  <td align="center" >
        <select name="hobbies[]"  size="7" multiple>
                <option value="outdoor sports">outerdoor sport</option>
                <option selected value="pop music">pop music</option>
				<option   value="adventure sports">adventure sports</option>
                <option value="rock music">rock music</option>
		</select>
		</td>
    </tr>
  
	<tr>
     <td colspan="3" align="center">
      <input type="submit" name="submit" value="submit">
     </td>
	</tr>
	</table>
	</form>
	</body>
	</html>
     	 