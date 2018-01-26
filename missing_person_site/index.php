<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = "SELECT P.Person_ID, P.First_Name, P.Last_Name, P.Age, P.Gender, P.Height, P.Hair_Color, P.Face_Type, 
				P.Physique, D.Date_ID , D.Date, C.Contact_ID , C.Phone_Number , M.MP_ID, M.IsFound
		FROM person P JOIN Date D ON (P.Person_ID = D.Date_ID ) JOIN Contact C ON (D.Date_ID = C.Contact_ID) JOIN missing_person M ON (P.Person_ID = M.MP_ID)
		WHERE M.IsFound='miss'
		ORDER BY Person_ID	ASC";
$result = mysqli_query($conn, $result);
$result1 = "SELECT P.Person_ID, P.First_Name, P.Last_Name, P.Age, P.Gender, P.Height, P.Hair_Color, P.Face_Type, 
				P.Physique, D.Date_ID , D.Date, C.Contact_ID , C.Phone_Number , M.MP_ID, M.IsFound
		FROM person P JOIN Date D ON (P.Person_ID = D.Date_ID ) JOIN Contact C ON (D.Date_ID = C.Contact_ID) JOIN missing_person M ON (P.Person_ID = M.MP_ID)
		WHERE M.IsFound='miss'
		ORDER BY Person_ID	ASC";

$result1 = mysqli_query($conn, $result1);


$result2 = "SELECT P.Person_ID, P.First_Name, P.Last_Name, P.Age, P.Gender, P.Height, P.Hair_Color, P.Face_Type, 
				P.Physique, D.Date_ID , D.Date, C.Contact_ID , C.Phone_Number , M.MP_ID, M.IsFound
		FROM person P JOIN Date D ON (P.Person_ID = D.Date_ID ) JOIN Contact C ON (D.Date_ID = C.Contact_ID) JOIN missing_person M ON (P.Person_ID = M.MP_ID)
		WHERE M.IsFound='found'
		ORDER BY Person_ID	ASC";

$result2 = mysqli_query($conn, $result2);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Missing person site</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>
    <div class="header_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="logo_sections">
                        <ul id="logo_sec">
                            <li>
                                <a href="#"><img src="img/logo.png" alt=""></a>
                            </li>         
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="nav_area text-right">
                        <nav class="nav_section">
                            <ul id="nav">
                                 <li><a class="current" href="#">HOME</a></li>	
			                     <li><a href="#Missing" title="Missing person">MISSING PERSON</a></li>
			                     <li><a href="#Found" title="Found person">FOUND PERSON</a></li>
                                 <li><a href="post.php" title="Create post">CREATE POST</a></li>
			                     <li><a href="contact.php" title="Contact us">CONTACT US</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="welcome_row">
                <div class="col-lg-6">
                    <div class="total_paragraph">
                        <div class="welcome">
                            <h1>Welcome To Our MISSING PERSON SITE</h1>
                        </div>
                        <div class="paragraph">
                            <p>You can search your missing persons and also can post for missing.</p>
                            
                        </div>
                        <div class="create"><a href="post.php" title="Create Post">CREATE POST</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container_post">
           <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="feature_details">
                    <h1>Recent Missing Posts</h1>
        
					
					
	

	<table width='100%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Age</td>
		<td>Gender</td>
		<td>Height</td>
		<td>Hair Color</td>
		<td>Face Type</td>
		<td>Physique</td>
		<td>Missing Date</td>
		<td>Contact</td>
		<td>Update</td>
	</tr>
	<?php 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['First_Name']."</td>";
		echo "<td>".$res['Last_Name']."</td>";
		echo "<td>".$res['Age']."</td>";
		echo "<td>".$res['Gender']."</td>";
		echo "<td>".$res['Height']."</td>";
		echo "<td>".$res['Hair_Color']."</td>";
		echo "<td>".$res['Face_Type']."</td>";
		echo "<td>".$res['Physique']."</td>";
		echo "<td>".$res['Date']."</td>";
		echo "<td>".$res['Phone_Number']."</td>";
			
		
		echo "<td><a href=\"edit.php?id=$res[Person_ID]\">Edit</a> | <a href=\"delete.php?id=$res[Person_ID]\"
					onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
                </div>
                   <div class="missing">
                    <section id="Missing">
                        <h1>List of missing persons</h1>
					
<?php
	 
	while($res1 = mysqli_fetch_array($result1)) { 		
	
	?>
	
	<table>
	<tr><td>First Name: </td> <td><?php echo $res1['First_Name'];?> </td></tr>
	<tr><td>Last Name: </td> <td><?php echo $res1['Last_Name'];?> </td></tr>
	<tr><td>Age: </td><td><?php echo $res1['Age'];?></td></tr>
	<tr><td>Gender: </td><td> <?php echo $res1['Gender'];?> </td></tr>
	<tr><td>Height: </td><td><?php echo $res1['Height'];?> </td></tr>
	<tr><td>Hair Color: </td><td><?php echo $res1['Hair_Color'];?> </td></tr>
	<tr><td>Face Type: </td><td><?php echo $res1['Face_Type'];?> </td></tr>
	<tr><td>Physique: </td><td><?php echo $res1['Physique'];?> </td></tr>
	<tr><td>Missing Date:  </td><td><?php echo $res1['Date'];?> </td></tr>
    <tr><td>Contact: </td><td><?php echo $res1['Phone_Number'];?> </td></tr>
		<tr></tr>
		<tr></tr>
	</table>
    <div> <p>--------------------------------------------------</p>
	</div>	
		
	 
      <?php
	}
	
	
?>
                    </section>
                    </div>
                    <div class="found">
                    <section id="Found">
                        <h1>List of Found persons</h1>
	
<?php
	 
	while($res2 = mysqli_fetch_array($result2)) { 		
	
	?>
	
	<table>
	<tr><td>First Name: </td> <td><?php echo $res2['First_Name'];?> </td></tr>
	<tr><td>Last Name: </td> <td><?php echo $res2['Last_Name'];?> </td></tr>
	<tr><td>Age: </td><td><?php echo $res2['Age'];?></td></tr>
	<tr><td>Gender: </td><td> <?php echo $res2['Gender'];?> </td></tr>
	<tr><td>Height: </td><td><?php echo $res2['Height'];?> </td></tr>
	<tr><td>Hair Color: </td><td><?php echo $res2['Hair_Color'];?> </td></tr>
	<tr><td>Face Type: </td><td><?php echo $res2['Face_Type'];?> </td></tr>
	<tr><td>Physique: </td><td><?php echo $res2['Physique'];?> </td></tr>
	<tr><td>Missing Date:  </td><td><?php echo $res2['Date'];?> </td></tr>
    <tr><td>Contact: </td><td><?php echo $res2['Phone_Number'];?> </td></tr>
		<tr></tr>
		<tr></tr>
	</table>
   <div> <p>--------------------------------------------------</p>
	</div>		
		
	 
      <?php
	}
	
	
?>

	<table width='100%' border=0>

	<?php 
	while($res2 = mysqli_fetch_array($result2)) { 		
		echo "<tr>";
	    echo "<td>".$res2['First_Name']."</td>";
		echo "<td>".$res2['Last_Name']."</td>";
		echo "<td>".$res2['Age']."</td>";
		echo "<td>".$res2['Gender']."</td>";
		echo "<td>".$res2['Height']."</td>";
		echo "<td>".$res2['Hair_Color']."</td>";
		echo "<td>".$res2['Face_Type']."</td>";
		echo "<td>".$res2['Physique']."</td>";
		echo "<td>".$res2['Date']."</td>";
		echo "<td>".$res2['Phone_Number']."</td>";
				
	}
	?>
	
	</table>
						
                    </section>
                    </div>
                  </div>
                </div>   
               </div>   
       
       <div class="footer">
           <div class="footer wrapper">
              <ul>
                <li><a class="current" href="#">HOME</a></li>	
			     <li><a href="#Missing" title="Missing person">MISSING PERSON</a></li>
			     <li><a href="#Found" title="Found person">FOUND PERSON</a></li>
                 <li><a href="post.php" title="Create post">CREATE POST</a></li>
			     <li><a href="contact.php" title="Contact us">CONTACT US</a></li>
              </ul>

			</div>
          </div>
    <script rel="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>