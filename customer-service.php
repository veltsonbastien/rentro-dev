 <?php
  session_start(); 
 include 'header.php'; 
 ?> 

 <body>
        <div class = "loader-div" style = "display:block">
          <div class = "loader"> </div>
        </div>
        <div class = "container-fluid"> 
           <h1 class = "display-1"> Customer Services </h1>
           <h3 class = "showme-text" style = "text-align: CENTER;"> Unfortunately, sometimes things don't go as planned, but we're here to help you with that. </h3>
           <h4 class = "CS-top-text"> How can we help? </h4> 
           <ul class = "CS-ul"> 
              <li class = "CS-li"> 
                  <i class="far fa-file"></i>
                  <h3 class = "CS-li-h3">File a Report</h3> 
                  <p class = "CS-li-p"> Send us a text report via Rentro.</p> 
              </li> 
              <li class = "CS-li">
                  <i class="fas fa-phone-square"></i>
                  <h3 class = "CS-li-h3">Schedule a Call</h3> 
                  <p class = "CS-li-p"> Find a time to contact us directly via phone. </p>     
              </li>
              <li class = "CS-li">
                  <i class="far fa-envelope"></i>
                  <h3 class = "CS-li-h3">Send an Email</h3> 
                  <p class = "CS-li-p"> Send us a text report via e-mail. </p> 
              </li> 
            </ul>
         </div>
<?php
 include 'footer.php'; 
?> 

