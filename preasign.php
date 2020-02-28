<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<script src="jquery-1.11.1.min.js" type="text/javascript"></script>
</head>

<body>
<form method="post">
<table width="424" border="0" align="center" cellpadding="5" cellspacing="10">
  <tbody>
    <tr>
      <td bgcolor="#FFFFFF" style="text-align: center"><h2>Customer Registration Form</h2></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" style="text-align: left">Full Name</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" style="text-align: left"><input name="fullname" type="text" required="required" id="fullname" pattern="[a-zA-Z\s]+" title="Accepts lowercase,uppercase &amp; space"></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" style="text-align: left">Email</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" style="text-align: left"><input name="email" type="email" required="required" id="email" title="Please enter proper email format"></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" style="text-align: left">Mobile No. </td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" style="text-align: left"><input name="mobileno" type="tel" required id="mobileno" pattern="(9|8|7)\d{9}" title="Phone number should contain 10 digits starting with 9, 8 or 7"></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" style="text-align: left">Address</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" style="text-align: left"><textarea name="address" required id="address"></textarea></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" style="text-align: left">Username</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" style="text-align: left"><input name="username" type="text" required="required" id="username" pattern="[a-z]{1,15}" title="only lowercase min 1 &amp; max 20 characters" maxlength="15"></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" style="text-align: left">Password</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" style="text-align: left"><input name="password" type="password" required="required" id="password" pattern="[a-zA-Z0-9@$#!]{8,20}" title="Lowercase, Uppercase @,$,! special symbols min 8 and max 20 characters" maxlength="20"></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" style="text-align: left">Confirm Password</td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" style="text-align: left"><input name="confirmpassword" type="password" required="required" id="confirmpassword" pattern="[a-zA-Z0-9@$#!]{8,20}" title="Lowercase, Uppercase @,$,! special symbols min 8 and max 20 characters"></td>
    </tr>
    <tr  style="text-align: center">
      <td bgcolor="#FFFFFF"><input type="submit" name="submit" id="submit" value="submit"></td>
    </tr>
  </tbody>
</table>
</form>
</body>
</html>

<?php 
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$fullname=$_REQUEST["fullname"];
		$dob=$_REQUEST["dateofbirth"];
		$email=$_REQUEST["email"];
		$mobno=$_REQUEST["mobileno"];
		$address=$_REQUEST["address"];
		$uname=$_REQUEST["username"];
		$pass=$_REQUEST["password"];
		$cpass=$_REQUEST["confirmpassword"];
	
		include("myconn.php");
		

		
		
				$insertquery = "INSERT INTO predata(name,email,mobile,address,username,password) values('$fullname','$email','$mobno','$address','$uname','$pass')";
				   
				if($conn->query($insertquery)===TRUE)
				{
					echo "<script> if(confirm('Registration successful'))</script>";
				}
				else
				{
					echo "Error : " . $sql . "<br>" . $conn->error;
				}
		
	$conn->close();
	}
?>