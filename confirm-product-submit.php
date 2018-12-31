<?php
session_start(); 
include 'header.php'; 

echo "

<body>
 <div class = 'container-fluid'> 
              <h1 class = 'display-1' style = 'text-align: CENTER; margin-top:30px; '> Submitted For Review </h1>
              <h3 class = 'showme-text'  style = 'text-align: CENTER;'>Your item is currently being reviewed by Rentro Staff, and should be approved in a few hours.</h3>
              <h4 class = 'CS-top-text' style = 'text-align: LEFT; width:50%; font-size:20px; margin-top: 50px; margin-left:25%;'>Post Summary:</h4>
 </div> 
 "; 
 $currentID = $_SESSION['acct-id'];

 $confirmSQL = "SELECT * FROM rentro_products_review WHERE accountID = '$currentID' ORDER BY created_at DESC LIMIT 1"; //if it doesn't work, hash the session id first
 $confirmResult = $conn->query($confirmSQL); 


if(mysqli_num_rows($confirmResult)>0){
   while($row = mysqli_fetch_assoc($confirmResult)){
       $pN = $row['productName'];
       $pD = $row['productDesc'];
       $pL = $row['productLS']; 
       $pR = $row['productRP']; 
       echo "
        <div class = 'confirm-item'> 
          <ul class = 'confirm-item-ul'> 
            <li class = 'confirm-item-li confirm-item-name'>$pN</li> 
            <label class = 'confirm-item-label'>Product Description:</label> 
            <li class = 'confirm-item-li'>$pD</li> 
            <label class = 'confirm-item-label'>Renting Out For:</label> 
            <li class = 'confirm-item-li'>$pL weeks</li> 
            <label class = 'confirm-item-label'>Replacement Price:</label> 
            <li class = 'confirm-item-li'>$$pR</li> 
          </ul> 
        </div>
       "; 
   }
 } 


 include 'footer.php'; 