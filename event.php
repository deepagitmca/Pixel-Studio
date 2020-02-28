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
             <table width="1000" border="0" cellspacing="0" cellpadding="10">
              <tbody>
                <tr>
                  <td><h2 style="color:#730608; text-align:center"><span style="text-align: center">Welcome <?php echo  $_SESSION['auname']; ?><br>
                    <br>
                    List of Events </span>
                    </h2>
                    <p style="color:#730608; text-align:center">
                      <?php if(isset($_REQUEST["msg"]) )echo $_REQUEST["msg"]; ?>
                      <br>
                      <?php
						include("myconn.php");
						$sql="SELECT *from event";
						$uname=$_SESSION["auname"];
						$result=$conn->query($sql);
						if($result->num_rows==0)
						{
							echo "No Records Found";
						}
						else
						{
					?> 
                    <table width="800" border="0" align="center" cellpadding="10" cellspacing="0">
                      <tbody>
                        <tr bgcolor="#82E8AD" style="text-align: center">
                          <th width="109"> Username</th>
                          <th width="106">Full Name</th>
                          <th width="156">Email</th>
                          <th width="121">Mobile No.</th>
                          <th width="91">Event Type</th>
                          <th width="91">Event Date</th>
                          <th width="128">Venue</th>
                          <th width="128">City</th>
                          <th width="128">Timing</th>
                          
                        </tr>
                        <?php 
							while($row=$result->fetch_assoc())
							{
								$fullname=$row["name"];
						    ?>
                        <tr>
                          <td style="border-bottom:2px solid #82E8AD" height="42"><?php echo $row["username"];?></td>
                          <td style="border-bottom:2px solid #82E8AD" height="42"><?php echo $row["name"];?></td>
                          <td style="border-bottom:2px solid #82E8AD"><?php echo $row["email"];?></td>
                          <td style="border-bottom:2px solid #82E8AD" height="42"><?php echo $row["mobile"];?></td>
                          <td style="border-bottom:2px solid #82E8AD"><?php echo $row["event"];?></td>
                          <td style="border-bottom:2px solid #82E8AD"><?php echo $row["eventdate"];?></td>
                          <td style="border-bottom:2px solid #82E8AD"><?php echo $row["venue"];?></td>
                          <td style="border-bottom:2px solid #82E8AD"><?php echo $row["city"];?></td>
                          <td style="border-bottom:2px solid #82E8AD"><?php echo $row["timing"];?></td>
                          
                        </tr>
                        <?php
                         }
						}
                            ?>
                      </tbody>
                    </table>
                    <p>&nbsp;</p>
                  <p>&nbsp;</p></td>
                  </tr>
                </tbody>
              </table></td>
        </tr>
         <tr>
            <td bgcolor="#FFFFFF"> <?php include("footer.php"); ?></td>
          </tr>
        </tbody>
      </table>
   </div>
  </body>
 </html>
 
  