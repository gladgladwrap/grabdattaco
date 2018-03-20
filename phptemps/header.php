<?php 
	date_default_timezone_set("America/Halifax");

	echo '

	<a id="logo" href="index.php" target="_top">
		
		<img id="logo_img" src="images/SRJburritoV1.svg" alt="Side Row Joe"/>

	</a>
	
	<div id="pageTitle">
	
		<h1>Grabdat Taco</h1>
	
		<h2>We Bring You Tacos</h2>
	
	</div>
	
		<ul class="social">
	
			<li>
	
		        <a href="https://www.facebook.com/dylan.cooper.92"><i class="fa fa-facebook"></i></a>
	
		    </li>
	
		    <li>
	
	          <a href="https://www.instagram.com/coopsdroop/"><i class="fa fa-instagram"></i></a>
	
	        </li>
	
	        <li id="header-time">' .date("h:i a") . '</li>
	
	    </ul>'
?>