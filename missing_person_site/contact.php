<html>
<head>
<title> Contact </title>
</head>
<body background="img/background.jpg">
<div>
              <table align="center" cellpadding="10">
                <tr><td><a href="index.php">HOME</a></td>
			     <td><a href="index.php" title="Missing person">MISSING PERSON</a></td>
			     <td><a href="index.php" title="Found person">FOUND PERSON</a></td>
			     <td><a href="contact.php" title="Contact us">CONTACT US</a></td></tr>
              </table>

			</div>
<h1 align="center"> Contact Us </h1>
<form action="contact.php" method="post" name="form2">
<table border="2" bordercolor="black" cellpadding="20" align="center">
<caption> <font size="4"> <b>SEND US A MESSAGE</b> </font> </caption>
<tr><td> <input type="email" name="youremail" placeholder="Your Email Address" size="40" autocomplete autofocus ></td></tr>
<tr><td> <textarea name="message" rows="20" cols="40" placeholder="Message..." ></textarea></td></tr>
<tr><td align="right"> <input type="submit" name="Submit" value="Submit"></td></tr>

</table>
</form>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$youremail = $_POST['youremail'];
	$message = $_POST['message'];
	
	
				
	$result = "INSERT  INTO message(MEmail, MField) 
								VALUES('$youremail', '$message')";
								
	
	$result = mysqli_query($conn, $result);
	
	header("Location: index.php");
		
	}

?>





</body>


</html>