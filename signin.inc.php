<?php 
function loginUser($conn){
  if(isset($_POST['do_login'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']); 
    $pin = mysqli_real_escape_string($conn, $_POST['pin']);
    $sql = "SELECT * FROM rentro_accounts WHERE accountEM ='$email'";
    // $result = $conn->query($sql); //might consider the same query usage as create account?
    $result = mysqli_query($conn, $sql); 
    if(mysqli_num_rows($result)>0){
     while($row = mysqli_fetch_assoc($result)){
        $dhspwd = password_verify($pwd, $row['accountPW']);
        $dhspin = password_verify($pin, $row['accountPN']); 
        if($dhspwd == false || $dhspin == false){
           echo "success";
           exit(); 
        } //end of checking password and pin 
        else if($dhspwd ==true && $dhspin == true){
           $_SESSION['acct-id'] = $row['accountID']; 
           $_SESSION['acct-em'] = $row['accountEM']; 
           $_SESSION['acct-pw'] = $row['accountPW']; 
           $_SESSION['acct-pn'] = $row['accountPN'];
           echo "success"; 
        }//end of checking if the password and pin are correct 
      } //end of while 
    } //end of checking result 
     else{
       header("Location: index.com?authentication=false"); 
       exit(); 
     }//end of else there is no result
  } //end of isset
}//end 

function logoutUser(){
   if(isset($_POST['logout-button'])){
      session_unset(); 
      session_destroy(); 
      header("Loaction: index.php"); 
   }
}