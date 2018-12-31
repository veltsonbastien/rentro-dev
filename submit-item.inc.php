<?php

  function generatePID(){
    $x = date("U"); 
    $m = date("m"); 
    $da = date("d");
    $y = date("Y"); 
    $p = "";  
    $nums = array("z","o","t","p","f","h","s","c","e","n","d"); 
    $mons = array("jn","fb","mr","ar","ma","ju","jl","ag","sp","ot","nv","dm"); 
    
    $cm = $mons[$m-1]; //returns current month identifier
    $daa = str_split($da); //splits the day 
    $dm = array(0,0); 
    $ya = str_split($y); 
    $yaa = [ $nums[intval($ya[1])], $nums[intval($ya[0])], $nums[intval($ya[3])]
              , $nums[intval($ya[2])]]; 


    for($i = 0; $i<count($daa); $i++){
        $dm[$i] = $nums[$i];  //return current day identifier
    }
        $yi = 0; 
        $di = 0; 
        
    for($i = 0; $i<strlen($x); $i++){
        if($i%4===0){
            $x = substr_replace($x, $yaa[$yi], $i, 0);
            $yi++; 
        } if($i%8===0){
            $x = substr_replace($x, $dm[$di], $i, 0);
            $di++; 
        }
    }

    $p = $cm[0].($x).($cm[1]); 
    $p = strtoupper($p); 
    return $p;  
}

function productSubmit($conn){
    if(isset($_POST['submitProduct'])){
        if(isset($_SESSION['acct-id'])){
        $userID = $_SESSION['acct-id']; //check in database if hashed. if already hashed don't hash again.
        $product_ID = generatePID(); 
        $product_Name = mysqli_real_escape_string($conn, $_POST['product-name']); 
        $product_Desc = mysqli_real_escape_string($conn, $_POST['product-desc']);
        $product_LS = mysqli_real_escape_string($conn, $_POST['product-ls']);
        $product_RP = mysqli_real_escape_string($conn, $_POST['product-rp']);

     if(empty($product_Name) || empty($product_Desc) || empty($product_LS) || empty($product_RP)) {
            header("Location: sell.php?form=incomplete"); 
            exit(); 
      } //end of if empty 
        else{
           $sql = "INSERT into rentro_products_review (accountID, productID, productName, productDesc, productLS, productRP) VALUES 
                                                      ('$userID','$product_ID','$product_Name','$product_Desc','$product_LS','$product_RP')";
            mysqli_query($conn,$sql);   
            //header("Location: confirm-product-submit.php?=submit");
        } //end of outermost else
        } //end of isset session
    } //end of isset submitProduct
}//end of function