<!DOCTYPE html>
<html>
<head>
	<?php include ('phptemps/head.php');?>
	<title>Confirmation</title>
</head>
<body>
	<div class="wrapper menu">
		<header>
			<?php include ('phptemps/header.php');?>
		</header>
		<div class="flex-content" id="food-menu">
			<span id="back-button"><a href="makereservation.php" class="button">Back</a></span>
			<div class="menu-content">	
				<?php
					//make short variable names
					$eventType = $_POST['eventType'];
					$dt = \DateTime::createFromFormat('m/d/Y', $_POST['resDate']);
					$resDate = $dt->format('Y-m-d');
					$name = $_POST['name'];
					$email = $_POST['email'];
					$eventLocation = $_POST['eventLocation'];
					$city = $_POST['city'];
					$partySize = $_POST['partySize'];

					if (!$eventType|| !$resDate || !$name || !$email || !$eventLocation || !$city || !$partySize) {
						echo "<h3>You have not entered all of the details. Please go back and try again.</h3>"; 
						exit;
					}

					$email = filter_var($email, FILTER_SANITIZE_EMAIL);

					// Validate e-mail
					if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
					    echo("$email is not a valid email address");
					    exit();
					}

					if (!get_magic_quotes_gpc()){ 
						$eventType = addslashes($eventType);
						$resDate = addslashes($resDate); 
						$name = addslashes($name);
						$email = addslashes($email);
						$eventLocation = addslashes($eventLocation);
						$city = addslashes($city);
						$partySize = addslashes($partySize);
					}

					@ $db = new mysqli('localhost', 'gladgladwrap', 'door@staN17', 'grabdat_taco');
					
					if (mysqli_connect_errno()) {
						echo "<h3>Error: Could not connect to database. Please try again later.</h3>"; 
						exit;
					}

					// begin inserting the form data into two tables
					$query = "BEGIN";
					$db->query($query);
					
					$query = "insert into customers values
								('NULL', '".$name."', 'NULL', '".$email."', 
									'".$eventLocation."', '".$city."')";
					$db->query($query);

					$query = "insert into reservations values
					 	('NULL','2', '".$resDate."', '".$eventLocation."', '".$city."', 
					 		'".$partySize."', '".$eventType."')";
					 $db->query($query);

					$query = "commit";
					$result = $db->query($query);
					if ($result) {
						echo "<h3>Your Reservation has been processed!</h3>";
					} else {
						echo "<p>An error has occurred. Your reservation has not been received. <br />
						We appologize for the inconvenience. Feel free to send us an email instead!</p>";
					}
					$db->close();
				 ?>

				 <!-- Print receipt for client -->
				<h3>Receipt of Confirmation</h3>
				<table id="receipt"> 
					<th>Grabdat Taco</th>
					<?php
				        echo "<tr><td>Client Name:</td><td>". $name."</td></tr>";
				        echo "<tr><td>Date of Reservation:</td><td>". $resDate ."</td></tr>";
				        echo "<tr><td>Service Ordered:</td><td>". $eventType ."</td></tr>";
				        echo "<tr><td>Venue Location</td><td>". $eventLocation .", &nbsp;".$city ."</td></tr>";
				        echo "<tr><td>Food For: </td><td>". $partySize ."</td></tr>";
				        echo "<tr><td>Customer email:</td><td>". $email ."</td></tr>";
			    	?>
			    </table>
		    </div>
		</div>
	</div>
</body>
</html>