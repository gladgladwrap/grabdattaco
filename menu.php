<!DOCTYPE html>
<html>

<!-- Menu, Grabdat Taco
Author: Dylan Cooper
Company: Azlo Web Designs -->

<head lang="en">
    <?php include ('phptemps/head.php');?>
    <title>Grabdat Taco Menu</title>
</head>

<body>
	<div class="wrapper menu">
		<header>
			<?php include ('phptemps/header.php');?>
		</header>

		<div class="flex-content" id="food-menu">
			<span id="back-button"><a href="whatWeDo.php" class="button"><i class="fa fa-arrow-circle-left" style="font-size: 1.5em;" aria-hidden="true"></i> Back</a></span>

			<div class="menu-content"> 
				<h2 id="menuTitle">Menu</h2>
				<div class="menuItem"><h3>Tacos</h3><img class="itemPhoto" src="images/tacos.jpg" alt="Tacos"></div>
				<div class="itemDescription"><p>Chicken &amp; Beef Tacos<sup>*contains dairy</sup></p><div class="price">$5.00</div></div>
				<div class="itemDescription"><p>Vegetarian Taco <sup>*contains dairy</sup></p><div class="price">$4.00</div></div>
				<div class="itemDescription"><p>Toppings<sup>*Included</sup>&nbsp; :</p></div>
				<ul class="itemDescription" id="menuExtras"><li>Guacamole</li><li>Grilled Onions</li><li>Jalape&#241;os</li><li>Pico de Gallo</li><li>Hot Sauce</li></ul>
				<figure>
					<img src="images/menuguac.jpg" alt="Guacamole">
					<figcaption>Our signature guacamole is prepared fresh daily!</figcaption>
				</figure>
				<p>Get your 3<sup>rd</sup> Taco for $4.00</p>
				<p class="mobile-hide">All of our tacos are made with fresh, hand-picked ingredients!</p>
				<div class="menuItem"><h3>Sopa Azteca</h3><img class="itemPhoto" src="images/sopa-azteca.jpg" alt="La Sopa Azteca"></div>
				<div class="itemDescription"><p>A classic Mexican dish. Corn tortillas submerged into a Pasilla Chile-infused tomatoe broth</p><div class="price">$5.00</div></div>
				<div class="menuItem"><h3>Micheladas</h3><img class="itemPhoto" src="images/menumichelada.jpg" alt="Michelada"></div>
				<div class="itemDescription"><p>Try our Sour &amp; Salty Micheladas, served in a Chile-rimmed glass &amp; topped off with a Cerveza</p><div class="price">$6.00</div></div>
				<div class="menuItem"><h3>Cubanos</h3><img class="itemPhoto" src="images/cubano.jpg" alt="Cubano"></div>
				<div class="itemDescription"><p>Lime juice, salt, Salsa Sasonadora (Maggi) served on ice, Escarchado (rimmed) con Chile</p><div class="price">$5.00</div></div>
				<div class="menuItem"><h3>Tequila Bar</h3><img class="itemPhoto" src="images/tequila.jpg" alt="Tequila Shots"></div>
				<div class="itemDescription"><p>Fancy a shot of Tequila with your meal?</p><div class="price">$3.00</div></div>
			</div>
			
			<div class="advertisement">
				<?php include ('phptemps/ads.php');?>
			</div>
			<span id="back-button-2"><a href="whatWeDo.php" class="button"><i class="fa fa-arrow-circle-left" style="font-size: 1.5em;" aria-hidden="true"></i> Back</a></span>
		</div>
	</div>

	<script src="js/script.js"></script>
</body>
</html>