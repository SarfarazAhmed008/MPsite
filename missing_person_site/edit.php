<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$person_id = $_POST['id'];
	$date_id = $_POST['id'];
	$contact_id = $_POST['id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$age = $_POST['age'];
	$gender = $_POST['gender'];
	$height = $_POST['height'];
	$haircolor = $_POST['haircolor'];
	$facetype = $_POST['facetype'];
	$physique = $_POST['physique'];
	$date = $_POST['missingdate'];
	$contact = $_POST['contact'];
		
	//updating the table
	$result = "UPDATE person SET Person_ID='$person_id', First_Name='$firstname', Last_Name='$lastname', 
						Age='$age', Gender='$gender', Height='$height', Hair_Color='$haircolor', Face_Type='$facetype', Physique='$physique'
			   WHERE Person_ID=$person_id";
	
	$result = mysqli_query($conn, $result);
	
	$result1 = "UPDATE contact SET Contact_ID='$contact_id', Phone_Number='$contact' 
			   WHERE Contact_ID=$contact_id";
	
	
	$result1 = mysqli_query($conn, $result1);
	
	$result2 = "UPDATE date SET Date_ID='$date_id', Date='$date'
			   WHERE Date_ID=$date_id";
	
	$result2 = mysqli_query($conn, $result2);
	

	
	//redirectig to the display page. In our case, it is index.php
	header("Location: index.php");
}

?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = "SELECT P.Person_ID, P.First_Name, P.Last_Name, P.Age, P.Gender, P.Height, P.Hair_Color, P.Face_Type, 
				P.Physique, D.Date_ID , D.Date, C.Contact_ID , C.Phone_Number , M.MP_ID, M.IsFound
		FROM person P JOIN Date D ON (P.Person_ID = D.Date_ID ) JOIN Contact C ON (D.Date_ID = C.Contact_ID) JOIN missing_person M ON (P.Person_ID = M.MP_ID)
		WHERE M.IsFound='miss' AND Person_ID='$id'
		ORDER BY Person_ID	ASC";
$result = mysqli_query($conn, $result);

while($res = mysqli_fetch_array($result))
{
	$firstname = $res['First_Name'];
	$lastname = $res['Last_Name'];
	$age = $res['Age'];
	$gender = $res['Gender'];
	$height = $res['Height'];
	$haircolor = $res['Hair_Color'];
	$facetype = $res['Face_Type'];
	$physique = $res['Physique'];
	$date = $res['Date'];
	$contact = $res['Phone_Number'];
}
?>
<html>
<head>	
	<title>Edit Post</title>
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
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<fieldset>
<legend align="center"> <h2>Edit Post</h2> </legend>
<table border="3" bordercolor="black" cellpadding="30" align="center">
<tr><td align="center"><strong>First Name: </strong></td> <td><input type="text" name="firstname" size="40" value=<?php echo $firstname;?> placeholder="Enter First Name" autofocus> </td></tr>
<tr><td align="center"><strong>Last Name: </strong></td> <td><input type="text" name="lastname" value=<?php echo $lastname;?> placeholder="Enter Last Name"  size="40"> </td></tr>
<tr><td align="center"><strong>Age: </strong></td> <td><input type="text" name="age" value=<?php echo $age;?> placeholder="Enter Age" size="40"> </td></tr>
<tr><td align="center"><strong>Gender: </strong></td> <td><input type="text" name="gender"  value=<?php echo $gender;?> placeholder="Enter Gender" size="40"> </td></tr>
<tr><td align="center"><strong>Height: </strong></td> <td><input type="text" name="height" value=<?php echo $height;?> placeholder="Enter Height"  size="40"> </td></tr>
<tr><td align="center"><strong>Hair Color: </strong></td> <td><input type="text" name="haircolor" value=<?php echo $haircolor;?> placeholder="Enter Hair Color"  size="40"> </td></tr>
<tr><td align="center"><strong>Face Type: </strong></td> <td><input type="text" name="facetype" value=<?php echo $facetype;?> placeholder="Enter Face Type"  size="40"> </td></tr>

<tr><td align="center"><strong>Physique: </strong></td> <td><input type="text" name="physique" value=<?php echo $physique;?> placeholder="Enter Physique"  maxlength="40" size="40"> </td></tr>
<tr><td align="center"><strong>Missing Or Found Date: </strong></td> <td><input type="text" name="missingdate" value=<?php echo $date;?> placeholder="Enter Date"  maxlength="40" size="40"> </td></tr>
<tr><td align="center"><strong>Contact: </strong></td> <td><input type="text" name="contact" value=<?php echo $contact;?> placeholder="Enter Contact"  maxlength="40" size="40"> </td></tr>

<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td colspan="2" align="right"><input type="submit" name="update" value="Update"></td>
</tr>


</table>
</fieldset>
			
	</form>
</body>
</html>
