<?php

  function generateUID(){
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
    $yaa = [ $nums[intval($ya[0])], $nums[intval($ya[1])], $nums[intval($ya[2])]
              , $nums[intval($ya[3])]]; 


    for($i = 0; $i<count($daa); $i++){
        $dm[$i] = $nums[$i];  //return current day identifier
    }
        $yi = 0; 
        $di = 0; 
        
    for($i = 0; $i<strlen($x); $i++){
        if($i%4===0){
          if($i>strlen($x)){
            $x = substr_replace($x, $yaa[$yi], $i, 0);
            $yi++; 
          } else{
             $x = substr_replace($x, $dm[1], $i, 0); 
          }//endo f else
        } if($i%5===0){
           if($i>strlen($x)) {
             $x = substr_replace($x, $dm[$di], $i, 0);
           }
           else {
             $x = substr_replace($x, $dm[1], $i, 0); 
           }
            
            $di++; 
        }
    }

    $p = $cm[1].($x).($cm[0]); 
    $p = strtoupper($p); 
    return $p;  
}


 function createUser($conn){

  if(isset($_POST['createAccount'])) {  
  $account_id =""; 
  $account_FN = mysqli_real_escape_string($conn, $_POST['firstname']); 
  $account_LN = mysqli_real_escape_string($conn, $_POST['lastname']); 
  $account_EM = mysqli_real_escape_string($conn, $_POST['email']); 
  $account_PNB = mysqli_real_escape_string($conn, $_POST['phonenumber']); 
  $account_PWD1 = mysqli_real_escape_string($conn, $_POST['pwd']); 
  $account_PWD2 = mysqli_real_escape_string($conn, $_POST['pwd-confirm']); 
  $account_PIN1 = mysqli_real_escape_string($conn, $_POST['pin']); 
  $account_PIN2 = mysqli_real_escape_string($conn, $_POST['pin-confirm']); 
  $account_PWD = ""; 
  $account_PIN = ""; 
  
  if(empty($account_FN) || empty($account_LN) || empty($account_EM) || empty($account_PNB) || empty($account_PWD1) || empty($account_PWD2) ||
     empty($account_PIN1) || empty($account_PIN2)) {
       echo "<script> window.location.href='create-account.php?signup=empty'</script>"; 
       exit(); 
     } //end of if empty 
     else{
       if(!preg_match("/^[a-zA-Z]*$/", $account_FN) || !preg_match("/^[a-zA-Z]*$/", $account_LN) ){
           echo "<script> window.location.href='create-account.php?signup=invalid-account-names'</script>";  
           exit(); 
       } //end of if first name and last name fit preg match 
       else{
          if(!filter_var($account_EM,FILTER_VALIDATE_EMAIL)){
            echo "<script> window.location.href='create-account.php?signup=invalid-email'</script>"; 
            exit(); 
          } //end of if validate email  
          else {
            if(strcmp($account_PWD1,$account_PWD2)!=0){
             echo "<script> window.location.href='create-account.php?signup=passwords-dont-match'</script>";  
             exit(); 
            } //end of if passwords aren't equal
            else{
             $account_PWD = $account_PWD2; 
             if(strcmp($account_PIN1,$account_PIN2)!=0){
             echo "<script> window.location.href='create-account.php?signup=invalid-pin'</script>"; 
             exit(); 
             }//end of if for pins aren't equal
             else{
              $account_PIN = $account_PIN2; 
              if(strlen($account_PNB)<10 || strlen($account_PNB)>11){
                echo "<script> window.location.href='create-account.php?signup=invalid-phonenumber'</script>";  
                exit(); 
              }//end of if phone is the right amount of numbers 
              else{
                  if(strlen($account_PWD)<6){
                   echo "<script> window.location.href='create-account.php?signup=invalid-password-length'</script>"; 
                   exit(); 
                  }//end of if for password length check 
                  else{
                    if(strlen($account_PIN)!=4){
                      echo "<script> window.location.href='create-account.php?signup=invalid-pin-length'</script>"; 
                      exit(); 
                    }//end of if for pin length check
                    else{
                      $account_id = generateUID(); 
                      $hsacc = password_hash($account_id, PASSWORD_DEFAULT); 
                      $hspwd = password_hash($account_PWD, PASSWORD_DEFAULT); 
                      $hspin = password_hash($account_PIN, PASSWORD_DEFAULT); 
                      $sql = "INSERT INTO rentro_accounts (accountID, accountFN, accountLN, accountEM, accountPNB, accountPW, accountPN) 
                              VALUES ('$hsacc','$account_FN', '$account_LN','$account_EM','$account_PNB','$hspwd','$hspin')";
                      mysqli_query($conn,$sql); 
                     echo "<script> 
                     <div class='alert alert-primary alert-dismissible fade show' role='alert'>
                        <strong>Account Creation Successful!</strong> Redirecting to sign in...
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>
                            window.location.href='signin.php?signup=success'
                           </script>";   
                    } //THE ELSE WHERE THE ACCOUNT IS ACTUALLY CREATED 
                  }//end of else for pin length check 
              } //end of else for password length check 
             }//end of else for phone check 
            } //end of else for password check 
          } //end of else  for email check
       } //end of else for preg match check 
     }//end of outermost else
  } //end of isset
 } //end of createUser 
