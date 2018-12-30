 <?php
  session_start(); 
 include 'header.php'; 
 ?> 

 <body>
        <div class = "loader-div" style = "display:block">
          <div class = "loader"> </div>
        </div>
        <div class = "container-fluid"> 
           <h1 class = "display-1"> What you need to know as a buyer </h1>
           <img id = "SI-img" src = "images/image2.jpg"> 
           <h4 class = "title-text"> Buying on Rentro is the best way to find great devices at low prices, and you could do it in three simple steps: 
                                     <br> <br> Buy, Enjoy, and Return.   </h4>
           <p class = "paragraph-text"> </p> 
           <ul class = "SI-info-boxes"> 
              <li class = "SI-info-boxes-li"> 
                  <span class = "SI-info-boxes-span">
                   <i class="fas fa-shopping-cart"></i>
                   <h3 class = "SI-infoboxes-h3"> Buy </h3> 
                   <p class = "SI-info-boxes-p"> If you haven't already, create an account. Next, browse our collection of items that have been put up for rent, and choose what it is you would like to rent out. There will be more directions and information when you are ready to purchase.  </p> 
                  </span>
              </li>
              <li class = "SI-info-boxes-li"> 
                  <span class = "SI-info-boxes-span">
                  <i class="far fa-smile"></i>
                   <h3 class = "SI-infoboxes-h3"> Enjoy </h3> 
                   <p class = "SI-info-boxes-p"> The fun part. Responsibly use the item that you purchased for the amount of time you agreed to during purchase. From that time of purchase to the time you return the item, you're legally responsible for it -so make the most of your time.   </p> 
                  </span>
              </li>
              <li class = "SI-info-boxes-li"> 
                  <span class = "SI-info-boxes-span">
                  <i class="fas fa-exchange-alt"></i>
                   <h3 class = "SI-infoboxes-h3"> Return </h3> 
                   <p class = "SI-info-boxes-p"> Package and ship back the item once you are done using it. Please be sure to remember to include everything that came with the item, and also be sure to package appropriately (e.g, using "Fragile" when needed.) </p> 
                 </span>
              </li>
           </ul>
            <h4 class = "TOU-text"> Also, please take some time to read the <a style = "color: #2083bf;">Terms of Use</a></h4>
            <h2 class = "SI-bottom-text"> And that's it. Ready to get started? </h2> 
            <button class = "SI-bottom-button">Register Now </button> 
        </div>
        
<?php
 include 'footer.php'; 
?> 

