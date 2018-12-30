<?php
 session_start(); 
 include 'header.php'; 
?> 

 <div class = 'loader-div' style = 'display:block'>
    <div class = 'loader'> </div>
</div>

<div class = 'container-fluid'>
  <h3 class = 'showme-text' style = 'text-align: CENTER; margin-bottom: 30px; margin-top: 50px;'>Create an Account</h3> 
  
<?php
  echo "
  <form class = 'signin-form' name = 'signin-form' method = 'POST' action = '".createUser($conn)."' >
    <ul class = 'signin-form-ul'> 
     <li class = 'signin-form-li'><label class = 'signin-label'>First Name:</label><input class = 'signin-input' type = 'text' name = 'firstname' placeholder = 'First Name'></li> 
     <li class = 'signin-form-li'><label class = 'signin-label'>Last Name:</label><input class = 'signin-input' type = 'text' name = 'lastname' placeholder = 'Last Name'></li> 
     <li class = 'signin-form-li'><label class = 'signin-label'>Email:</label> <input class = 'signin-input' type = 'email' name = 'email'  placeholder = 'Please enter your email'> </li> 
     <li class = 'signin-form-li'><label class = 'signin-label signin-label-pn'>Phone Number:</label> <input class = 'signin-input signin-input-pn' type = 'text' name = 'phonenumber'  placeholder = '(123)-456-9780'> </li>
     <li class = 'signin-form-li'><p class = 'info-text'>For your online safety, it is recommended that your password follows the guidelines: <br> 
                                                         * More than 6 characters <br> 
                                                         * A combination of numbers, letters, and special characters <br> 
                                                         * Mix of capitalized and noncapitalized letters <br> 
                                                         * Don't repeat the same character more than twice </p></li>
     <li class = 'signin-form-li'><label class = 'signin-label'>Create a Password:</label><input class = 'signin-input' type = 'password' name = 'pwd' placeholder = 'Please enter your password'> </li>
     <li class = 'signin-form-li'><label class = 'signin-label'>Confirm your Password:</label><input class = 'signin-input' type = 'password' name = 'pwd-confirm' placeholder = 'Please confirm your password'> </li>
     <div class = 'pin-class'>
       <li class = 'signin-form-li'><label class = 'signin-label signin-label-pin'>Choose a Pin:</label><input class = 'signin-input signin-input-pin' type = 'password' name = 'pin' placeholder = '####'> </li> 
       <li class = 'signin-form-li'><label class = 'signin-label signin-label-pin'>Confirm your Pin:</label><input class = 'signin-input signin-input-pin' type = 'password' name = 'pin-confirm' placeholder = '####'> </li> 
     </div>
     <li class = 'signin-form-li'><input class = 'SI-bottom-button' id = 'createAccountButton' type = 'submit' value = 'Create Your Account' name = 'createAccount'> </li> 
    </ul> 
  </form> 
     <hr style = 'border: 0; clear:both; display:block; width: 45%; background-color:#999; height: 1px; margin-top: 100px;'>
     <p class = 'CS-top-text' style = 'margin-top: 20px;'>By creating an account you are agreeing to the: </p> 
     <div class = 'create-account-div' align='center' style = 'margin-top:15px;'> 
       <a class = 'create-account-link' href='#'> Terms of Use </a> 
    </div>
</div> 
  "; 
?> 

<?php
include 'footer.php';
?>