 <?php
  session_start(); 
  include 'header.php'; 

if(isset($_SESSION['acct-id'])){
echo "

<style>
 .containers{
   width: 80%;    
  }

 .product-text{
       margin-left: 50px;
   }


</style> 

        <div class = 'loader-div' style = 'display:block'>
          <div class = 'loader'> </div>
        </div>

        <div class = 'container-fluid'>
             <h1 class = 'display-1' style = 'text-align: CENTER;'>Your Order</h1>
             <h3 class = 'showme-text' style = 'text-align: CENTER; color: #555'>Let's add the finishing touches</h3>
        </div> 
";

//if the user is signed in 
$currentProductId = $_POST['currentProductID']; 
$loadProductSQL = "SELECT * FROM rentro_products WHERE productID = '$currentProductId'"; 
$loadProduct = $conn->query($loadProductSQL);
$firstSlideCount = 1;
if(mysqli_num_rows($loadProduct)>0){
   while($row = mysqli_fetch_assoc($loadProduct)){
               //get the pid of the current order 
          $useCurrentPID = $row['productID']; 
          //get everything from the current product 
          $pN = $row['productName'];
          $pD = $row['productDesc'];
          $pL = $row['productLS']; 
          $pR = $row['productRP']; 
          $wP = $row['productWP']; 
          $imageCount = 1; 
          //the sql query to get every image from the current order 
          $confirmIMG = "SELECT * FROM rentro_products_images WHERE productID = '$useCurrentPID'"; 
          $confirmResultIMG = $conn->query($confirmIMG); 
          //this echo is being done for each of the the times a product is being taken 
          echo " 
            <div class = 'confirm-item'> 
            <h2 class = 'confirm-item-li confirm-item-name'>$pN</h2> 
             <div class = 'weeklyPrice'>$$wP</div> 
              <ul class = 'confirm-item-ul'> 
                <div class = 'containers'>
                    <!--- MARKER OF CODE ------>
                ";
                        if(mysqli_num_rows($confirmResultIMG)>0){
                            while($rowImg = mysqli_fetch_assoc($confirmResultIMG)){   
                                $iS = $rowImg['imageSrc']; 
                                echo "
                                  <div class='mySlides$firstSlideCount' style='100%;'>
                                    <img src = 'rentro_product_images/$iS'/ style='width:100%, height:300px;'> 
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
                                    <img class = 'demo cursor' id = 'previewIMG' style='width:100%, height:300px;' src = 'rentro_product_images/$iSS' onclick='currentSlide$firstSlideCount($imageCount)'/> 
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
                    <li class = 'confirm-item-li' id='pL'>$pL</li> 
                    <label class = 'confirm-item-label'>Replacement Price:</label> 
                    <li class = 'confirm-item-li' id='pL'>$$pR</li> 
                      <button class = 'rent-out-button' name = 'purchase' id='slidePageDownButton' style = 'margin-top:60px; margin-bottom:25px; margin-left:40%' '>Next Step</button> 
                      <input type = 'hidden' name = 'currentProductID' value = $useCurrentPID >
                </div>
              </ul> 
            </div>
              <input type = 'hidden' name = 'currentProductID' value = $useCurrentPID > 
              <br> 
              <hr> 
              <br>
                            <!--- MARKER OF CODE ------>
                            <!--- MARKER OF CODE ------>
      <script>
      
            var slideIndex = 1;
            showSlides$firstSlideCount(slideIndex);

            function plusSlides$firstSlideCount(n) {
            showSlides$firstSlideCount(slideIndex += n);
            }

            function currentSlide$firstSlideCount(n) {
            showSlides$firstSlideCount(slideIndex = n);
            }

            function showSlides$firstSlideCount(n) {
            var i;
            var slides = document.getElementsByClassName('mySlides$firstSlideCount');
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
            
        </script> 
        <!---------------------------------------- ONE ITERATION DONE HERE ------------------------------------->
        </form>
          "; 
                //end of major form
              $firstSlideCount++; 
   }
}//end of if 

echo "
  <div class = 'information-form-header'> 
   <form class = 'information-form'> 
      <div class = 'information-form-div' id = 'information-form-names' ><label id = 'input-labels' >First Name:</label> <br> <input type = 'text' name = 'firstName' class = 'names-input'> </input> </div> 
      <div class = 'information-form-div' id = 'information-form-names' ><label id = 'input-labels' >Last Name:</label> <br> <input type = 'text' name = 'lastName' class = 'names-input'> </input> </div>
      <div class = 'information-form-div'><label id = 'input-labels' >Phone Number:</label> <br> <input type = 'text' name = 'phoneNumber'> </input>  </div>
      <div class = 'information-form-div'><label id = 'input-labels' >Email Address:</label> <br> <input type = 'text' name = 'emailAddress'> </input> </div>
      <div class = 'information-form-div'><label id = 'input-labels' >Address: </label> <br> <input type = 'text' name = 'actualAddress'> </div>
   </form> 
  </div> 
  <!--UNDER THIS FORM WE WILL HANDLE PAYMENTS --> 
    <div class = 'payment-form-header'> 
    <form class = 'payment-form'> 
        <div class = 'payment-form-div'><label id = 'input-labels'>Name on Card:</label> <br> <input type = 'text'> </input> </div> 
        <div class = 'payment-form-div'><label id = 'input-labels'>Card Number:</label> <br> <input type = 'password'> </input> </div>
        <div class = 'payment-form-div'><label id = 'input-labels'>Expiration Date:</label> <br> <input type = 'text' maxlength = 7 > </input>  </div>
        <div class = 'payment-form-div'><label id = 'input-labels'>Card Verification Number (CVN):</label> <br> <input type = 'password'> </input>  </div>
    </form> 
    </div>  
"; 

}//end of isset 
else{
       echo "<script> window.location.href='signin.php?authentication=false'</script>"; 
}