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
  <body>
   <p>&nbsp;</p>
    <div class="container">
      <table align="center" width="1000" border="0" cellspacing="0" cellpadding="0">
       <tbody>
        <tr>
          <td bgcolor="#FFFFFF"> <?php include("header.php"); ?> </td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF"> <?php include("navmenu.php"); ?> </td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF">
                <form id="form1" name="form1" method="post">
                  <p>&nbsp;</p>
                  <table width="400" border="0" align="center" cellpadding="10" cellspacing="2">
                    <tbody>
                      <tr>
                        <td colspan="2" bgcolor="#81FE93" style="text-align: center"> <h2>Admin Login Form </h2></td>
                        </tr>
                      <tr>
                        <td>Username</td>
                        <td> <input name="username" type="text" required="required" id="username"> </td>
                        </tr>
                      <tr>
                        <td>Password</td>
                        <td> <input name="password" type="password" required="required" id="password"> </td>
                        </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td><input name="submit" type="submit" id="submit" value="Submit"></td>
                        </tr>
                      
                      </tbody>
                    </table>
                  <p>&nbsp;</p>
                </form></td>
        </tr>
         <tr>
            <td bgcolor="#FFFFFF"> <?php include("footer.php"); ?></td>
          </tr>
        </tbody>
      </table>
   </div>
  </body>
 </html>