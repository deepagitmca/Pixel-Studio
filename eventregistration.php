<?php 
session_start();
ob_start();
if(!isset($_SESSION["cuname"]))
{
	header("location:customerlogin.php");
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
	  <link href="jquery.ui.core.min.css" rel="stylesheet" type="text/css">
	  <link href="jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
	  <link href="jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
  <script src="jquery-1.11.1.min.js" type="text/javascript"></script>
  <script src="jquery.ui-1.10.4.datepicker.min.js" type="text/javascript"></script>
  <script>
  function datedifference(date1) {
	dt1 = new Date(date1);
	dt2 = new Date();
	return Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate()) ) /(1000 * 60 * 60 * 24));
	}
	
	function datedifference1(date1,date2) {
	dt1 = new Date(date1);
	dt2 = new Date(date2);
	return Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate()) ) /(1000 * 60 * 60 * 24));
	}
	
	function validate()
	{
		var hostdate=document.getElementById("hostdate");
		var time=document.getElementById("time");
		if(datedifference(hostdate.value)>0)
		{
			alert('Registration date cannot be less than today');
			alert('Insert Today date');
			hostdate.focus();
			return false;
		}
		else if(datedifference(hostdate.value)<0)
		{
			alert('Registration date cannot be more than today');
			alert('Insert Today date');
			hostdate.focus();
			return false;
		}
	}
	
	function validate1()
	{
		var eventdate=document.getElementById("eventdate");
		if(datedifference(eventdate.value)>0)
		{
			alert('Eventdate cannot be less than today');
			alert('Event date should be more than today');
			eventdate.focus();
			return false;
		}
	}
	</script>
  </head>
  <?php 
    $fullname="";
	$email="";
    $mobno="";
	$uname=$_REQUEST["uname"];
	// $uname=$_SESSION["cuname"]; // fetch username from session variable
	// Establish connection with database
	include("myconn.php");
	// Execute the query
	$sql="Select *from customer where username = '$uname'";
	$result = $conn->query($sql);
	// Check if it has returned atleast one row
		if($result->num_rows > 0 )
		{
			// fetch 1 by 1 record from the result and store it in $row array.
			while($row=$result->fetch_assoc())
			{
				$fullname=$row["name"];
				$email=$row["email"];
				$mobno=$row["mobile"];
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
          <td bgcolor="#FFFFFF"> <?php include("customermenu.php"); ?> </td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF">
             <table width="1000" border="0" cellspacing="0" cellpadding="10">
              <tbody>
                <tr>
                  <td><h2 style="color:#730608; text-align:center"><span style="text-align: center">Welcome <?php echo  $_SESSION['cuname']; ?><br>
                   </span>
                    </h2>
                    <form method="post" enctype="multipart/form-data" name="form1" id="form1" onSubmit="return validate(),validate1()">
                    <table width="500" border="0" align="center" cellpadding="10" cellspacing="4">
                      <tbody>
                        <tr style="text-align: center">
                          <td width="460" bgcolor="#14EF3A"><h2>Register for Event</h2></td>
                        </tr>
                        <tr>
                          <td bgcolor="#65F7C2" style="text-align: left">Username</td>
                        </tr>
                        <tr>
                          <td style="text-align: left"><input name="username" type="text" required id="username" value="<?php echo "$uname";?>" size="52" readonly ></td>
                        </tr>
                        <tr>
                          <td bgcolor="#65F7C2" style="text-align: left">Full Name</td>
                        </tr>
                        <tr>
                          <td style="text-align: left"><input name="fullname" type="text" required id="fullname" value="<?php echo "$fullname";?>" size="52" readonly></td>
                        </tr>
                        <tr>
                          <td bgcolor="#65F7C2" style="text-align: left">Email</td>
                        </tr>
                        <tr>
                          <td bgcolor="#FFFFFF" style="text-align: left"><input name="email" type="email" required id="email" value="<?php echo "$email";?>" readonly></td>
                        </tr>
                        <tr>
                          <td bgcolor="#65F7C2" style="text-align: left">Phone No.</td>
                        </tr>
                        <tr>
                          <td bgcolor="#FFFFFF" style="text-align: left"><input name="mobileno" type="text" required value="<?php echo "$mobno";?>" readonly requiredid="mobileno"></td>
                        </tr>
                        <tr>
                          <td bgcolor="#65F7C2" style="text-align: left">Select an event</td>
                        </tr>
                        <tr style="text-align: left">
                          <td><select name="eventtype" required id="eventtype">
                            <option value="-1">Select Type</option>
                            <option value="Pre Wedding photo shoot">Pre Wedding photo shoot</option>
                            <option value="Wedding ceremony photo shoot">Wedding ceremony photo shoot</option>
                            <option value="Post Wedding photo shoot">Post Wedding photo shoot</option>
                            <option value="House opening ceremony ">House opening ceremony </option>
                            <option value="Baby Shower photo shoot">Baby Shower photo shoot</option>
                            <option value="Baby Photoshoot">Baby Photoshoot</option>
                            <option value="Anniversary photo shoot">Anniversary photo shoot</option>
                            <option value="Naming ceremony photo shoot">Naming ceremony photo shoot</option>
                            <option value="Engagement photo shoot ceremony">Engagement photo shoot ceremony</option>
                            <option value="Birthday party photo shoot">Birthday party photo shoot</option>
                          </select>
                        </tr>
                        <tr style="text-align: left">
                          <td bgcolor="#65F7C2">Venue</td>
                        </tr>
                        <tr style="text-align: left">
                          <td><textarea name="eventvenue" required id="eventvenue"></textarea></td>
                        </tr>
                        <tr style="text-align: left">
                          <td bgcolor="#65F7C2">Event Date</td>
                        </tr>
                        <tr style="text-align: left">
                          <td><input type="text" name="eventdate" required id="eventdate"></td>
                        </tr>
                        <tr>
                          <td bgcolor="#65F7C2" style="text-align: left">City</td>
                        </tr>
                        <tr>
                          <td style="text-align: left"><select name="city" required id="city">
                            <option value="-1">Select Type</option>
                            <option value="Belagavi">Belagavi</option>
                            <option value="Hubballi">Hubballi</option>
                            <option value="Dharawad">Dharawad</option>
                            <option value="Panaji">Panaji</option>
                            <option value="Kolhapur">Kolhapur</option>
                          </select></td>
                        </tr>
                        <tr>
                          <td bgcolor="#65F7C2" style="text-align: left">Registration Date</td>
                        </tr>
                        <tr>
                          <td style="text-align: left"><input type="text" name="hostdate" required id="hostdate"></td>
                        </tr>
                        <tr>
                          <td bgcolor="#65F7C2" style="text-align: left">Timing</td>
                        </tr>
                        <tr>
                          <td style="text-align: left"><input name="time" type="text" required id="time" pattern="\d{1,2}:\d{2}([ap]m)?" title="Time in 00:00am/pm format"></td>
                        </tr>
                        <tr bgcolor="#DAC6E5" style="text-align: center">
                          <td bgcolor="#FFFFFF"><input type="submit" name="submit" id="submit" value="Submit"></td>
                        </tr>
                      </tbody>
                    </table>  
                    </form>                  
                  </td>
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
  <script type="text/javascript">
$(function() {
	$( "#hostdate" ).datepicker({
		dateFormat:"yy-mm-dd"
	}); 
});
$(function() {
	$( "#eventdate" ).datepicker({
		dateFormat:"yy-mm-dd"
	}); 
});
  </script>
  </body>
 </html>
 
 <?php 
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{		
		$fullname=$_REQUEST["fullname"];
		$email=$_REQUEST["email"];
		$mobno=$_REQUEST["mobileno"];
		$uname=$_REQUEST["username"];
		$etype=$_REQUEST["eventtype"];
		$evenue=$_REQUEST["eventvenue"];
		$edate=$_REQUEST["eventdate"];
		$city=$_REQUEST["city"];
		$time=$_REQUEST["time"];
		$hostdate = $_REQUEST["hostdate"];
				
		include("myconn.php");
		
		 $sql="Select *from event where eventdate='$edate'";
		$result = $conn->query($sql);
		//if($resultl->num_rows >=1 )
		//if($conn->query($sql)===TRUE)
		// if($result===TRUE)
		if($result->num_rows >=1 )
		{
			echo "<script> alert('Sorry dear customer This day slot is already booked.') </script>";
		}
		else if($result->num_rows == 0)
		{
		
			$insertquery = "INSERT INTO event(username,name,email,mobile,event,venue,eventdate,city,hostdate,timing) values('$uname','$fullname','$email','$mobno','$etype','$evenue','$edate','$city','$hostdate','$time')";
				   
			if($conn->query($insertquery)===TRUE)
			{
				echo "<script> if(confirm('Event registered successfully')) window.location='customerdashboard.php';</script>";
			}
			else
			{
				echo "Error : " . $insertquery . "<br>" . $conn->error;
			}
		
		}
		else
		{
			echo "Error : " . $sql . "<br>" . $conn->error;
		}
		
	$conn->close();
	
	}
?>
 
  