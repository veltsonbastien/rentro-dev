<?php
session_start(); 
include 'header.php'; 

echo "
<body>
        <div class = 'loader-div' style = 'display:block'>
          <div class = 'loader'> </div>
        </div>

 <div class = 'container-fluid'> 
              <h1 class = 'display-1' style = 'text-align: CENTER; margin-top:30px; '> Submitted For Review </h1>
              <h3 class = 'showme-text'  style = 'text-align: CENTER;'>Your item is currently being reviewed by Rentro Staff, and should be approved in a few hours.</h3>
              <h4 class = 'CS-top-text' style = 'text-align: LEFT; width:50%; font-size:20px; margin-top: 50px; margin-left:25%;'>Post Summary:</h4>
 </div> 
 "; 

 $currentID = $_SESSION['acct-id'];
 $currentPID = "SELECT productID FROM rentro_products_review WHERE accountID = '$currentID' ORDER BY created_at DESC LIMIT 1";
 $getCurrentPID = $conn->query($currentPID);
 if(mysqli_num_rows($getCurrentPID)>0){
   while($rowPID = mysqli_fetch_assoc($getCurrentPID)){
    $useCurrentPID = $rowPID['productID'];
   }
 }
 $confirmSQL = "SELECT * FROM rentro_products_review WHERE accountID = '$currentID' ORDER BY created_at DESC LIMIT 1"; //if it doesn't work, hash the session id first
 $confirmIMG = "SELECT * FROM rentro_products_images WHERE productID = '$useCurrentPID'"; 
 $confirmResult = $conn->query($confirmSQL); 
 $confirmResultIMG = $conn->query($confirmIMG); 

if(mysqli_num_rows($confirmResult)>0){
   while($row = mysqli_fetch_assoc($confirmResult)){
       $pN = $row['productName'];
       $pD = $row['productDesc'];
       $pL = $row['productLS']; 
       $pR = $row['productRP']; 
       $imageCount = 1; 

       echo "
        <div class = 'confirm-item'> 
         <h2 class = 'confirm-item-li confirm-item-name'>$pN</h2> 
          <ul class = 'confirm-item-ul'> 
            <div class = 'containers'>
                <!--- MARKER OF CODE ------>
             ";
                    if(mysqli_num_rows($confirmResultIMG)>0){
                        while($rowImg = mysqli_fetch_assoc($confirmResultIMG)){   
                            $iS = $rowImg['imageSrc']; 
                            echo "
                              <div class='mySlides'>
                                <img src = 'rentro_product_images/$iS'/ style='width:300px, height:300px;'> 
                              </div>
                                "; 
                        }
                    }  
            echo "           
                <div class = 'row'>
                                <!--- MARKER OF CODE IN THE SLIDER NAV------>
                ";
                    mysqli_data_seek($confirmResultIMG, 0); //this is so it can be reused
                    if(mysqli_num_rows($confirmResultIMG)>0){
                        while($rowImgs = mysqli_fetch_assoc($confirmResultIMG)){   
                            $iSS = $rowImgs['imageSrc']; 
                            echo"
                             <div class = 'column'>
                                <img class = 'demo cursor' id = 'previewIMG'src = 'rentro_product_images/$iSS' onclick='currentSlide($imageCount)'/> 
                                                <!--- MARKER OF CODE FOR PICTURES BEING CREATED IN NAV ------>
                             </div>
                            "; 
                            $imageCount++;
                        }
                    }  
            echo "          
                </div>  
            </div> <!--END OF CONTAINAER-->
            <div class = 'product-text'>
                <label class = 'confirm-item-label'>Product Description:</label> 
                <li class = 'confirm-item-li' style = 'padding-right:30px;'>$pD</li> 
                <label class = 'confirm-item-label'>Renting Out For:</label> 
                <li class = 'confirm-item-li' id='pL'>$pL weeks</li> 
                <label class = 'confirm-item-label'>Replacement Price:</label> 
                <li class = 'confirm-item-li' id='pL'>$$pR</li> 
            </div>
          </ul> 
        </div>
                        <!--- MARKER OF CODE ------>
       "; 
   }
 } 

echo"
                <!--- MARKER OF CODE ------>
  <button class = 'SI-bottom-button' id='continueButton' style = 'margin-top:50px'>Continue To Site </button> 
  <script>
  
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
        showSlides(slideIndex += n);
        }

        function currentSlide(n) {
        showSlides(slideIndex = n);
        }

        function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName('mySlides');
        var dots = document.getElementsByClassName('demo');
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = 'none';
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(' active', '');
        }
        slides[slideIndex-1].style.display = 'block';
        dots[slideIndex-1].className += ' active';
        }

        $(document).ready(function(){
             $('#continueButton').click(function(){
                 window.location.replace('index.php'); 
             }); 
        });
        
    </script> 
";


 include 'footer.php'; 