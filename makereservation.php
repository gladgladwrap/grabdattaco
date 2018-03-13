<?php 
	//Set cookies
	$number_of_days = 30 ;
	$date_of_expiry = time() + 86400 * $number_of_days;
	?>
<!DOCTYPE html>
<html>
<head>
	<?php include ('phptemps/head.php');?>
	<title>Make a Reservation</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script>
			$( function() {
		  		$( "#datepicker" ).datepicker();
		 	} );
		</script>
</head>
<body>
	<?php
	// define variables and set to empty values
	$eventErr = $dateErr = $nameErr = $emailErr = $locationErr = $cityErr = $sizeErr = "";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		// test the Event Type select input 

		if (empty($_POST["eventType"])) {
			$eventErr = "&nbsp;* Select an event";
		}
		else {
			$eventType = test_input($_POST["eventType"]);
		}

		// test the reservation date

		if (empty($_POST["resDate"])) {
			$dateErr = "&nbsp;* Select an event date";
		}

		elseif (isset($_POST["resDate"])) {
			$date = new DateTime($_POST["resDate"]);
			$now = new DateTime();
			$date = $date->format('m-d-Y');
			$now = $now->format('m-d-Y');
			if($date < $now) {
			    $dateErr = "&nbsp;* Event must be in the future.";
			} else {
			$resDate = $_POST["resDate"];
			// $dbFormatDate = $resDate->format('Y-m-d');
			}
		}

		// test users name input

		if (empty($_POST["name"])) {
			$nameErr = "&nbsp;* Name required";
		}
		elseif (!preg_match("/^[[:alpha:]]+[ [:alpha:]]*$/",$_POST["name"])) {
		 	$nameErr = "&nbsp;* Invalid name";
		 } 
	    else {
	    	$name = test_input($_POST["name"]);
	    	setcookie("user", $name, $date_of_expiry, "/");
	    }
	  
	    // test users email input

		if (empty($_POST["email"])) {
			$emailErr = "&nbsp;* Email required";
		}
		elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		 	$emailErr = "&nbsp;* Invalid email";
		 } 
	  	else {
		  	$email = test_input($_POST["email"]);
		  	setcookie("userEmail", $email, $date_of_expiry, "/");
		}

		// test the address input. Allows: dashes, periods, commas, numbers, letters

		if (empty($_POST["eventLocation"])) {
			$locationErr = "&nbsp;* Address required";
		}
		elseif (!preg_match("/^[[:alnum:]]+[ [:alnum:].-]+[ [:alnum:].]*$/",$_POST["eventLocation"])) {
		 	$locationErr = "&nbsp;* Invalid address";
		 } 
	    else {
	    	$eventLocation = test_input($_POST["eventLocation"]);
	    }

	    // test the city input, letters only

	    if (empty($_POST["city"])) {
			$cityErr = "&nbsp;* City required";
		}
		elseif (!preg_match("/^[[:alpha:]]+[ a-zA-Z]*$/",$_POST["city"])) {
		 	$cityErr = "&nbsp;* Invalid city";
		 } 
	    else {
	    	$city = test_input($_POST["city"]);
	    }

	    // test the Party Size select 

	    if (empty($_POST["partySize"])) {
			$sizeErr = "&nbsp;* Choose an approximate party size";
		}
		else {
			$partySize = test_input($_POST["partySize"]);
		}

			// Submit reservation input into database if all fields are complete

		try {
			if (isset($eventType) && isset($resDate) && isset($name) && isset($email) && isset($eventLocation) && isset($city) && isset($partySize)) {

				//connect to database

				$con = mysqli_connect('localhost', 'gladgladwrap', 'door@staN17', 'grabdat_taco', 3306);

				/* check connection */
				if (mysqli_connect_errno()) {
					throw new Exception('Connect Error: ' . mysqli_connect_error());
				}
				

				// Set charset

				mysqli_set_charset($con, "utf8");

				// queries

				$query = "BEGIN";
				mysqli_query($con, $query);

				// Check if they are an existing customer and retrieve their customerid

				$query = "SELECT customer_id FROM `customers` WHERE email = '$email'";

				if (mysqli_num_rows($result=mysqli_query($con,$query)) > 0) { // if customer is already a customer
					$user = mysqli_fetch_assoc($result);
					$query = "insert into reservations (customer_id, reservation_date, event_location, city, party_size, event_type)
						values ('".$user['customer_id']."', STR_TO_DATE('".$resDate."','%m/%d/%Y'), '".$eventLocation."', '".$city."', 
					 		'".$partySize."', '".$eventType."')";
					 mysqli_query($con, $query);

				} else { // This is a new customer
					//add them to customer table
				    $query = "insert into customers (name, phone, email, address, city)
						values ('".$name."', 'NULL', '".$email."', 
								'".$eventLocation."', '".$city."')";
					if (mysqli_query($con, $query) === TRUE) {
						$last_id = $con->insert_id;
					} else {
					    throw new Exception("Error: Customer details not saved. <br />" . $con->error);
					}

					$query = "insert into reservations (customer_id, reservation_date, event_location, city, party_size, event_type)
						values ('".$last_id."', STR_TO_DATE('".$resDate."','%m/%d/%Y'), '".$eventLocation."', '".$city."', 
					 		'".$partySize."', '".$eventType."')";
					 mysqli_query($con, $query);
				}

				$query = "commit";
				$result = mysqli_query($con, $query);

				if ($result) {
				$successMsg = "Your Reservation has been made. You will receive a confirmation email.<br />We will see you then!";
				} else {
				throw new Exception("Your Reservation was not made.");
				}
			} else {
				throw new Exception("In Order to complete your reservation, please fill out all of the fields.");
			}
		} catch (Exception $e) {
			$formError = $e->getMessage();
		}

		mysqli_close($con);
	}

	function test_input($data) {
		$data = trim($data);
	  	$data = stripslashes($data);
	  	$data = htmlspecialchars($data);
	  	return $data;
	}
	?>

	<div class="wrapper">
		<header>
			<?php include ('phptemps/header.php');?>
		</header>


		<div class="flex-content">
			<nav class="flex-nav">
				<?php include ('phptemps/flex-nav.php');?>
			</nav>
			<div class="row-main-content">
				<?php 

				//display a form error message or a Receipt of Reservation

				if (isset($successMsg)) {
					echo "
					<h3 style='color:#6E0DD0;'>".$successMsg."</h3>
					<h3>Receipt of Confirmation</h3>
					<table id='receipt'> 
				        <tr><td>Client Name:</td><td>". $name."</td></tr>
				        <tr><td>Client #:</td><td>";
				        if (isset($user['customer_id'])) {
				        	echo $user['customer_id'];
				        } else {echo $last_id;}
				        echo "</td></tr>
				        <tr><td>Event Date:</td><td>". $resDate ."</td></tr>
				        <tr><td>Service:</td><td>". $eventType ."</td></tr>
				        <tr><td>Venue:</td><td>". $eventLocation .", &nbsp;".$city ."</td></tr>
				        <tr><td>Party Size: </td><td>". $partySize ."</td></tr>
				        <tr><td>Email:</td><td>". $email ."</td></tr>
			    	</table>";
				}

				elseif (isset($formError)) {
					echo "<h3 style='color:#6E0DD0;'>".$formError."</h3>";
				}

				if (!isset($successMsg)) {
					echo "
					<h2>Make a Reservation</h2>
					<div class='signup hide-border-on-mobile'>
						<form class='signup' id='makeReservationForm' onsubmit='return show_alert()' method='post' action='makereservation'>
							<span>
								<span>Choose an event: &nbsp;</span>
								<div class='styled-select slate'>
									<select name='eventType' id='eventType'>
										<option disabled selected value> -- select an option -- </option>
										<option value='Lunch'>Lunch-Hour Tacos</option> 
										<option value='Dinner'>Dinner Drop-in</option> 
										<option value='PrivateParty'>Party</option>
										<option value='CommunityEvent'>Community Event</option>
									</select>
								</div>
								<span class='error'>".$eventErr."</span>
							</span>
							<span>
								<span>Reservation Date:</span> 
								<input name='resDate' type='text' id='datepicker'>
								<span class='error'>".$dateErr."</span>
							</span>
							<span>
								<span>Name: &nbsp;</span>
								<input type='text' name='name' placeholder='Your Name' value='".$name."'>
								<span class='error'>".$nameErr."</span>
							</span>
							<span>
								<span>Email: &nbsp;</span>
								<input type='text' name='email' placeholder='Email Address' value='".$email."'>
							    <span class='error'>".$emailErr."</span>
							</span>
							<span>
							    <span>Event Location: &nbsp;</span>
							    <input type='text' name='eventLocation' placeholder='Event Location' value='".$eventLocation."'>
							    <span class='error'>".$locationErr."</span>
							</span>
							<span>
							    <span>City: &nbsp;</span>
							    <input type='text' name='city' placeholder='City' value='".$city."'>
						        <span class='error'>".$cityErr."</span>
					        </span>
					        <span>
						        <span>Party Size: &nbsp;</span>
						        <div class='styled-select slate'>
							        <select name='partySize' id='partySize'>
							        	<option disabled selected value> -- select an option -- </option>
										<option value='10-19'>10-19</option> 
										<option value='20-29'>20-29</option> 
										<option value='30-49'>30-49</option>
										<option value='50&nbsp;+'>50 +</option>
									</select>
								</div>
								<span class='error'>".$sizeErr."</span>
							</span>
							<span id='submit-center'>
								<input type='submit' name='submit' value='Submit Reservation'/>
							</span>
						</form>
					</div><!-- End of signup form -->
				";}
				?>
			</div><!-- End of row main content -->
			<div class="advertisement">
				<?php include ('phptemps/ads.php');?>
			</div>	
		</div><!-- End of flex content -->
	</div><!-- End of Wrapper -->
	<script src="javascript/script.js"></script>
	<script type="text/javascript">

		document.getElementById('eventType').value = "<?php if(isset($_POST["eventType"])) { echo $eventType;} else { echo $_GET['eventType'];}
			?>";
		document.getElementById('datepicker').value = "<?php echo $resDate;?>";
		document.getElementById('partySize').value = "<?php echo $partySize;?>";

		// confirmation for the form
		function show_alert() {
  			if(confirm("Are you sure your reservation details are correct?"))
    		document.forms[0].submit();
  		else
    		return false;
		}

	</script>
	<script type="text/javascript" id="cookiebanner"
  		src="https://cdnjs.cloudflare.com/ajax/libs/cookie-banner/1.0.0/cookiebanner.min.js"
  		 data-position="top" data-font-size="1.1em" data-mask="true">
    </script>
</body>
</html>