<!DOCTYPE html>
<html>

<!-- Home Page for Grabdat Taco,
Author: Dylan Cooper -->

<head lang="en">
    <?php include ('phptemps/head.php');?>
    <title>Grabdat Taco</title>
</head>

<body>
	<div class="wrapper">
		<header>
			<?php include ('phptemps/header.php');?>
		</header>

		<div class="flex-content">
			<nav class="flex-nav">
				<?php include ('phptemps/flex-nav.php');?>
			</nav>

			<div class="row-main-content"> 
				    <a href="makereservation.php" id="reservation-button"><span>&nbsp;Make a Reservation!&nbsp;</span></a>
				<h3><a href="whatWeDo.php" target="_self">Take a Look at Our Services &amp; Menu Here!</a></h3>
				
				<img class="tacophoto" src="images/tacos.jpg" alt="If you can't see this image, we will give you one free taco on your next visit">
			</div>

			<div class="advertisement">
				<?php include ('phptemps/ads.php');?>
			</div>
		</div>
	</div>
<script src="javascript/script.js"></script>
<script type="text/javascript" id="cookiebanner"
  		src="https://cdnjs.cloudflare.com/ajax/libs/cookie-banner/1.0.0/cookiebanner.min.js"
  		 data-position="top" data-font-size="1.1em" data-mask="true">
</script>
</body>
</html>