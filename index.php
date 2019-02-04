 <?php
  session_start(); 
 include 'header.php'; 

 echo "
        <style> 
         .product-text{
           display: none; 
          }
          .confirm-item{
           width: 35%; 
          }
          .containers{
            width: 100%; 
            margin-right: 10px; 
           }
           .confirm-item{
             margin-left: 10px; 
             transform: translateX(0); 
             transition: box-shadow 0.7s; 
             transition: transform 0.7s; 
             transition: margin-top 0.7s; 
            }
            .confirm-item:hover{
              box-shadow: 0.1px 0.1px 5px #0283bf; 
              transform: scale(1.01); 
              margin-top: 39px; 
              cursor: pointer; 
             }

            .weeklyPrice{
              position: unset; 
              top: 0; 
              right: 0; 
              margin-left: 25px; 
              margin-bottom: 15px; 
            }

            .displayItem{
            display: block; 
            }
        </style> 

        <div class = 'loader-div' style = 'display:block'>
          <div class = 'loader'> </div>
        </div>
        <div class = 'container-fluid'> 
           <h1 class = 'display-1'> Newest Deals </h1>
           <div class = 'showme-div'>   
           <h3 class = 'showme-text'> Show me items: </h3>
                <label class='container-label'>Lowest Price
                <input type='checkbox' checked='checked'>
                <span class='checkmark'></span>
                </label>
                <label class='container-label'>Closest To Me
                <input type='checkbox'>
                <span class='checkmark'></span>
                </label>
                <label class='container-label'> Duration
                <input type='checkbox'>
                <span class='checkmark'></span>
                </label>
         </div>
	</div>
         <div class = 'confirm-item-major' style = 'display: flex; flex-wrap: wrap; padding: 0px 20px;' > 
         "; 

    $retrieveOrder = "SELECT * FROM rentro_products ORDER BY created_at DESC";
    $getOrder = $conn->query($retrieveOrder);
    $firstSlideCount = 1; 
    if(mysqli_num_rows($getOrder)>0){
      while($rowOrder = mysqli_fetch_assoc($getOrder)){
          //get the pid of the current order 
          $useCurrentPID = $rowOrder['productID']; 
          //get everything from the current product 
          $pN = $rowOrder['productName'];
          $pD = $rowOrder['productDesc'];
          $pL = $rowOrder['productLS']; 
          $pR = $rowOrder['productRP']; 
          $wP = $rowOrder['productWP']; 
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
                    <button class = 'rent-out-button' name = 'purchase' id='postButton' style = 'margin-top:60px; margin-bottom:25px; margin-left:40%'> Rent Out </button> 
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
      } //end of largest mysqli while
    } //end of largest mysqli if 
echo "</div> "; 

 include 'footer.php'; 
?> 

