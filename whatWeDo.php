<?php
session_start();
?>
<!DOCTYPE html>
<html>

<!-- Services Page for Grabdat Taco,
Author: Dylan Cooper
Company: Azlo Web Designs -->

<head lang="en">
	<link type="text/css" rel="stylesheet" href="http://cdn.jsdelivr.net/qtip2/3.0.3/jquery.qtip.min.css" />
    <?php include ('phptemps/head.php');?>
    <title>What We Do</title>
    <script type="text/javascript" src="http://cdn.jsdelivr.net/qtip2/3.0.3/jquery.qtip.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
  integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="
  crossorigin="anonymous"></script>
  <style type="text/css">
  	.tooltiptext {
  		padding: 0.1em;
  		line-height: 1.6em; 		
  	}
  </style>
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
				<div id="services-menu">
					<h2 class="tablet-hide">Our Services</h2>
					<ul id="ourServicesList">
						<li><a href="makereservation.php?eventType=Lunch">Lunch-Hour Tacos</a>
							<div style="display: none;" class="tooltiptext">
	    						<p>We will come to your workplace to serve you tacos for lunch!</p>
							</div>
						</li>
						<li><a href="makereservation.php?eventType=Dinner">Dinner Drop-ins</a>
							<div style="display: none;" class="tooltiptext">
	    						<p>Having a large dinner party? Grab ahold of us to BBQ up some tacos for your special night!</p>
							</div>
						</li>
						<li><a href="makereservation.php?eventType=PrivateParty">Parties</a>
							<div style="display: none;" class="tooltiptext">
	    						<p>Having a party and need food and drinks? What sounds better than Tacos and Tequila? Nothing.<br/>Give us a call or make a reservation!</p>
							</div>
						</li>
						<li><a href="makereservation.php?eventType=CommunityEvent">Community Events</a>
							<div style="display: none;" class="tooltiptext">
	    						<p>Grabdat Taco loves to get involved with the community! We will cater to any outdoor festivals or events.</p>
							</div>
						</li>
					</ul>
				</div>
					<span id="visit-menu-button"><a href="menu.php" id="reservation-button"><span>&nbsp;Visit Our Menu&nbsp;</span></a></span>
					<a href="menu.php" target="_top"><img class="tacophoto" src="images/sign.jpg" alt="The First Company Menu"></a>
			</div>
			<div class="advertisement">
				<?php include ('phptemps/ads.php');?>
			</div>
		</div>
	</div>
	<script src="js/script.js"></script>
	<script type="text/javascript">

		// Create the tooltips only when document ready
		$(document).ready(function () {
		    $('#ourServicesList a:first-child').each(function () {
		        $(this).qtip({
		            content: $(this).next('.tooltiptext'),
		            hide: {
		                fixed: true,
		                delay: 300
		            }
		        });
		    });
		    
		    $('#ourServicesList a:nth-child(2)').each(function () {
		        $(this).qtip({
		            content: $(this).next('.tooltiptext'),
		            hide: {
		            effect: function() {
		                $(this).hide('puff', 500);
		            }
		        }
		        });
		    });

		    $('#ourServicesList a:nth-child(3)').each(function () {
		        $(this).qtip({
		            content: $(this).next('.tooltiptext'),
		            hide: {
		            effect: function() {
		                $(this).hide('puff', 500);
		            }
		        }
		        });
		    });

		    $('#ourServicesList a:nth-child(4)').each(function () {
		        $(this).qtip({
		            content: $(this).next('.tooltiptext'),
		            hide: {
		            effect: function() {
		                $(this).hide('puff', 500);
		            }
		        }
		        });
		    });
		});

		jQuery.browser = {};
		(function () {
		    jQuery.browser.msie = false;
		    jQuery.browser.version = 0;
		    if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
		        jQuery.browser.msie = true;
		        jQuery.browser.version = RegExp.$1;
		    }
		})();
	</script>
</body>
</html>