<?php 
session_start(); 
include 'header.php'; 
?> 

 <div class = 'loader-div' style = 'display:block'>
    <div class = 'loader'> </div>
</div>

<div class = 'container-fluid'>
  <h3 class = 'showme-text' style = 'text-align: CENTER; margin-bottom: 30px; margin-top: 50px;'>Please Sign In</h3> 
  
  <?php 
  echo "
  <form class = 'signin-form' name = 'signin-form' method = 'POST' action = '".loginUser($conn)."' >
    <ul class = 'signin-form-ul'> 
     <li class = 'signin-form-li'><label class = 'signin-label'>Email:</label> <input class = 'signin-input' type = 'email' name = 'email'  placeholder = 'Please enter your email'> </li> 
     <li class = 'signin-form-li'><label class = 'signin-label'>Password:</label><input class = 'signin-input' type = 'password' name = 'pwd' placeholder = 'Please enter your password'> </li>
     <li class = 'signin-form-li'><label class = 'signin-label signin-label-pin'>Pin:</label><input class = 'signin-input signin-input-pin' type = 'password' name = 'pin' placeholder = '####' maxlength='4'> </li> 
     <li class = 'signin-form-li'><input class = 'SI-bottom-button' type = 'submit' name = 'signIn' value = 'Sign In'> </li> 
    </ul> 
  </form> 
   "; 
   ?> 

     <hr style = 'border: 0; clear:both; display:block; width: 45%; background-color:#999; height: 1px; margin-top: 100px;'>
     <p class = 'CS-top-text' style = 'margin-top: 20px;'>Or if you haven't already: </p> 
     <div class = 'create-account-div' align='center' style = 'margin-top:15px;'> 
       <a class = 'create-account-link' href='create-account.php'> Create an Account </a> 
    </div>
</div> 

<?php
include 'footer.php';
?> 

