  <!DOCTYPE html>
<html>

<!-- Contact Page for Grabdat Taco,
Author: Dylan Cooper
Company: Azlo Web Designs -->

<head lang="en">
    <?php include ('phptemps/head.php');?>
    <title>Reservations &amp; Inquiries</title>
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
          <h2>Questions. Inquiries. Concerns? Tell us about it!</h2>

          <img class="tacophoto mobile-hide" alt="Tacos Famosos de Tijuana" src="https://goulashtoguiso.files.wordpress.com/2013/03/191.jpg">
          
              <div class="vcard">
                  <div class="adr">
                    <span class="locality">Halifax</span>,  
                    <abbr class="region" title="Nova Scotia">Nova Scotia</abbr>
                    <div class="country-name">Canada</div>
                  </div>
                  <div class="tel">
                    613-744-7777
                  </div>
                  <div> 
                  <span class="email">dylan@grabdattaco.com</span>
                  </div>
              </div> <!-- /vCard -->

            <p>Don't like our web page? <a href="webDesigner.php"> Tell our web designer your suggestions!</a></p>  
        </div>

        <div class="advertisement">
          <?php include ('phptemps/ads.php');?>
        </div>
      </div>

      <footer class="mobile-hide">
        <?php include ('phptemps/footer.php');?>
      </footer>
    </div>
    
    <script src="javascript/script.js"></script>
</body>
</html>