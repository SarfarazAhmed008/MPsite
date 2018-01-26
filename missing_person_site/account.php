<html>
<head>
<title> Create Account </title>
</head>
<body background="img/background.jpg">
<h1 align="center">  </h1>

<form action="account.php" method="post" name="form3">
<fieldset>
<legend align="center"> <h2>Create New Account</h2> </legend>
<table border="3" bordercolor="black" cellpadding="30" align="center">
<tr><td align="center"><strong>First Name: </strong></td> <td><input type="text" name="firstname" size="40" placeholder="Enter First Name" autofocus required> </td></tr>
<tr><td align="center"><strong>Last Name: </strong></td> <td><input type="text" name="lastname" placeholder="Enter Last Name" required size="40"> </td></tr>
<tr><td align="center"><strong>Email Address: </strong></td> <td><input type="email" name="email" placeholder="Enter Email Address" required size="40"> </td></tr>
<tr><td align="center"><strong>User Name: </strong></td> <td><input type="text" name="username" placeholder="Choose User Name" required maxlength="10" size="40"> </td></tr>
<tr><td align="center"><strong>Password: </strong></td> <td><input type="password" name="password" placeholder="Choose Password" required maxlength="10" size="40"> </td></tr>
<tr><td colspan="2" align="right"><input type="submit" name="Submit" value="Create Account"></td></tr>

</table>
</fieldset>
</form>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	
				
	$result = "INSERT  INTO membership(FName, LName, Email, Username, Password) 
								VALUES('$firstname', '$lastname', '$email', '$username', '$password')";
								
	$result = mysqli_query($conn, $result);
	header("Location: index.php");
		
	}

?>



</body>


</html>