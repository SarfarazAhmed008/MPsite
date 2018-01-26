<html>
<head>
<title> Create Post </title>
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
<h1 align="center">  </h1>

<form action="post.php" method="post" name="form1">
<fieldset>
<legend align="center"> <h2>Create New Post</h2> </legend>
<table border="3" bordercolor="black" cellpadding="30" align="center">

<tr><td align="center"><strong>Post Type: </strong></td> <td><input type="radio" name="type" value="miss" checked>Missing Post 
					      <input type="radio" name="type" value="found">Found Post </td></tr>

<tr><td align="center"><strong>First Name: </strong></td> <td><input type="text" name="firstname" size="40" placeholder="Enter First Name" autofocus > </td></tr>
<tr><td align="center"><strong>Last Name: </strong></td> <td><input type="text" name="lastname" placeholder="Enter Last Name"  size="40"> </td></tr>
<tr><td align="center"><strong>Age: </strong></td> <td><input type="text" name="age" placeholder="Enter Age"  size="40"> </td></tr>
<tr><td align="center"><strong>Gender: </strong></td> <td><input type="text" name="gender" placeholder="Enter Gender" size="40"> </td></tr>
<tr><td align="center"><strong>Height: </strong></td> <td><input type="text" name="height" placeholder="Enter Height" size="40"> </td></tr>
<tr><td align="center"><strong>Hair Color: </strong></td> <td><input type="text" name="haircolor" placeholder="Enter Hair Color"  size="40"> </td></tr>
<tr><td align="center"><strong>Face Type: </strong></td> <td><input type="text" name="facetype" placeholder="Enter Face Type"  size="40"> </td></tr>

<tr><td align="center"><strong>Physique: </strong></td> <td><input type="text" name="physique" placeholder="Enter Physique"  maxlength="40" size="40"> </td></tr>
<tr><td align="center"><strong>Missing Or Found Date: </strong></td> <td><input type="text" name="missingdate" placeholder="Enter Date"  maxlength="40" size="40"> </td></tr>
<tr><td align="center"><strong>Contact: </strong></td> <td><input type="text" name="contact" placeholder="Enter Contact"  maxlength="40" size="40"> </td></tr>
<tr><td colspan="2" align="right"><input type="submit" name="Submit" value="Create Post"></td></tr>


</table>
</fieldset>
</form>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$type = $_POST['type'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$height = $_POST['height'];
	$haircolor = $_POST['haircolor'];
	$facetype = $_POST['facetype'];
	$physique = $_POST['physique'];
	$missingdate = $_POST['missingdate'];
	//$missinglocation = $_POST['missinglocation'];
	$contact = $_POST['contact'];
	
				
	$result = "INSERT  INTO person(First_Name, Last_Name, Age, Gender, Height, Hair_Color, Face_Type, Physique) 
								VALUES('$firstname', '$lastname', '$age', '$gender', '$height', '$haircolor','$facetype', '$physique')";
								
	$result1 = "INSERT INTO date(Date) VALUES('$missingdate')";

	$result2 = "INSERT INTO contact(Phone_Number) VALUES('$contact')";
	
	$result3 = "INSERT INTO missing_person(IsFound) VALUES('$type')";
	
	$result = mysqli_query($conn, $result);
	$result1 = mysqli_query($conn, $result1);
	$result2 = mysqli_query($conn, $result2);
	$result3 = mysqli_query($conn, $result3);
	
	header("Location: index.php");
		
	}

?>



</body>


</html>