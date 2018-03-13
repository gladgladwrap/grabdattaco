<?php 
	//Set cookies
	$number_of_days = 30 ;
	$date_of_expiry = time() + 86400 * $number_of_days;
	?>
<!DOCTYPE html>
<html>

<!-- Feedback Page for Grabdat Taco,
Author: Dylan Cooper
Company: Azlo Web Designs -->

<head>
	<?php include ('phptemps/head.php');?>
	<title>Customer Feedback</title>
</head>

<body>

	<?php
	// define variables and set to empty values
	$nameErr = $emailErr = "";
	$name = $email = $comment = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		//connect to database
		try {
			$con = mysqli_connect('localhost', 'gladgladwrap', 'door@staN17', 'grabdat_taco', 3306);
			if (mysqli_connect_error()) {
    			throw new Exception('Connect Error: ' . $mysqli->connect_error);
			}
		} catch (Exception $e) {
		    $formError = $e->getMessage();
		}
		
		// test users name input

		if (empty($_POST["name"])) {
			$nameErr = "&nbsp;* Name is required";
		} 
		elseif (!preg_match("/^[a-zA-Z]+[ a-zA-Z]*$/",$_POST["name"])) {
		     $nameErr = "&nbsp;* Only letters and single white spaces allowed";
	    	}
	    else {
	    	$name = test_input($_POST["name"]);
	    	setcookie("user", $name, $date_of_expiry, "/");
	    }
	  
	    // test users email input

		if (empty($_POST["email"])) {
			$emailErr = "&nbsp;* Email is required";
		} 
		elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
	  		$emailErr = "&nbsp;* Invalid email format<br />"; 
	    }
	  	else {
		  	$email = test_input($_POST["email"]);
		  	setcookie("userEmail", $email, $date_of_expiry, "/");
		}

		// test users message input
		try {
			if (empty($_POST["comment"])) {
				throw new Exception("You didn't write anything to us!<br />Please include a message.");
			} else {
				$comment = test_input($_POST["comment"]);
			}

			// Submit user input into database if all required fields are complete

			if (isset($name) && isset($email) && isset($comment)) {
				$result = mysqli_query($con, "INSERT INTO `customer_feedback` (name, email, message) VALUES ('".$name."', '".$email."', '".$comment."')");
			}
			if ($result) {
				$successMsg = "Thanks for your feedback! We appreciate our valued clients and will review your message ASAP!";
			} else {
				throw new Exception("Your message was not submitted.");
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
	// Leaving this here just in case I should use this error method for connections
	// if (mysqli_connect_errno()) {
	// 	echo "Error: Could not connect to database. Please try again later."; 
	// 	exit;
	// }
	// $con->close();
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
				<h2>Customer Feedback</h2>
				<?php 
					//welcome message

					if(isset($_COOKIE["user"]) && !isset($successMsg) && !isset($formError)) { 
						echo "<h3>Hey " . $_COOKIE["user"] . ",<br/>
						Have an experience with us that you would like to share?
						<br/>Tell us about it below!</h3>";
					}
					elseif (!isset($_COOKIE["user"]) && !isset($successMsg) && !isset($formError)) {
						echo "<h3>Have an experience with us that you would like to share?
						<br/>Tell us about it below!</h3>";
					}

					//display form error message or submission confirmation message

					if (isset($successMsg)) {
						echo "<h3 style='color:#6E0DD0;'>".$successMsg."</h3>";
					}

					elseif (isset($formError)) {
						echo "<h3 style='color:#6E0DD0;'>".$formError."</h3>";
					}
					?>
					
				<figure class="signup hide-border-on-mobile">
					<form class="signup" id="customerFeedbackForm" onsubmit='return show_alert()' method="post" action="customerFeedback">
				        <input type="text" name="name" placeholder="Your Name" value="<?php echo $name;?>">
				        <span class="error"><?php echo $nameErr;?></span><br>
				        <input type="text" name="email" placeholder="Email Address" value="<?php echo $email;?>">
				        <span class="error"><?php echo $emailErr;?></span><br>
				        <textarea name="comment" placeholder="Tell Us Your Comments Here..."><?php echo $comment;?></textarea>
				        <span id="submit-center">
				        	<input type="submit" name="submit" value="Submit Feedback">
				        </span>
			    	</form>
			    </figure>
			</div>

			<div class="advertisement">
				<?php include ('phptemps/ads.php');?>
			</div>
		</div>
	</div>

	<script src="javascript/script.js"></script>
	<script type="text/javascript">
		// confirmation for the form
		function show_alert() {
  			if(confirm("Are you sure you want to submit?"))
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