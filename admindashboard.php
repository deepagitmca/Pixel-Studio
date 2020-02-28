<?php 
session_start();
ob_start();
if(!isset($_SESSION["auname"]))
{
	header("location:adminlogin.php");
}

?>
<!doctype html>
 <html>
  <head>
   <meta charset="utf-8">
    <title> Index </title>
	 <link href="menustyle.css" rel="stylesheet" type="text/css">
	  <style type="text/css">
	   body 
	   {
			background-color: #A08A8A;
			text-align: justify;
			background-image: url(4.jpg);
	   }
	  </style>
  </head>
  <?php 
	$uname=$_SESSION["auname"]; // fetch username from session variable
	// Establish connection with database
	include("myconn.php");
	// create a select query
	$sql="Select *from admin where username = '$uname'";
	// Execute the query
	$result = $conn->query($sql);
	// Check if it has returned atleast one row
		if($result->num_rows > 0 )
		{
			// fetch 1 by 1 record from the result and store it in $row array.
			while($row=$result->fetch_assoc())
			{
				$uname=$row["username"];
			}
		}
		else
		{
			echo "<script> alert('Invalid user. Please login to access the feature ') </script>";
		}
				
  ?>
  

  <body>
    <div class="container">
      <table align="center" width="1000" border="0" cellspacing="0" cellpadding="0">
       <tbody>
        <tr>
          <td bgcolor="#FFFFFF"> <?php include("header.php"); ?> </td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"> <?php include("adminmenu.php"); ?> </td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF">
             <h2 style="color:#730608; text-align:center"><span style="text-align: center">
             <p>Welcome <?php echo  $_SESSION['auname']; ?><br>
             </p>
             <p>&nbsp;</p>
             <p>&nbsp;</p>
             <p>&nbsp;</p>
             <p>&nbsp;</p>
             <p>               <br>
             </p>
                   </td>
                  </tr>
         <tr>
            <td bgcolor="#FFFFFF"> <?php include("footer.php"); ?></td>
          </tr>
        </tbody>
      </table>
   </div>
  </body>
 </html>
 
  