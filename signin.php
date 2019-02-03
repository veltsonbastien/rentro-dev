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
  <script>
    function do_login()
    {
    var email=$('#email').val();
    var pass=$('#pwd').val();
    var pin=$('#pin').val(); 

    if(email!='' && pass!='' && pin!='')
    {
      $.ajax
      ({
      type:'post',
      url:'signin.inc.php',
      data:{
      do_login:'do_login',
      email:email,
      pwd:pass,
      pin:pin
      },
     contentType: 'application/json; charset=utf-8',
     dataType: 'json',
      success:function(response) {
      if(success=='success')
      {
        window.location.href='index.php';
      }
      else
      {
        alert('Wrong Details');
        window.location.href='signin.php?authentication=false';
      }
      }
      });
    }

    else
    {
      alert('Please Fill All The Details');
    }

    return false;
    }
  </script> 
  

  <form  name = 'signin-form' method = 'POST' class ='signin-form' id = 'signin-form' action='signin.inc.php' onsubmit = 'return do_login();' >
    <ul class = 'signin-form-ul'> 
     <li class = 'signin-form-li'><label class = 'signin-label'>Email:</label> <input class = 'signin-input' type = 'email' name = 'email' id = 'email'  placeholder = 'Please enter your email'> </li> 
     <li class = 'signin-form-li'><label class = 'signin-label'>Password:</label><input class = 'signin-input' type = 'password' name = 'pwd' id = 'pwd' placeholder = 'Please enter your password'> </li>
     <li class = 'signin-form-li'><label class = 'signin-label signin-label-pin'>Pin:</label><input class = 'signin-input signin-input-pin' id = 'pin' type = 'password' name = 'pin' placeholder = '####' maxlength='4'> </li> 
     <li class = 'signin-form-li'><input class = 'SI-bottom-button' id = 'signin-button-onpage' type = 'submit' name = 'signIn' value = 'Sign In' > </li> 
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