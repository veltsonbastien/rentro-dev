<?php  
  include 'dbh.inc.php'; 
  include 'signup.inc.php'; 
  include 'signin.inc.php'; 
  include 'submit-item.inc.php';
  
  echo"
  <head>
  <!--METAS-->
  <meta charset='UTF-8'>
  <meta name='description' content='Make money, or save it. You can do that both here.'>
  <meta name='keywords' content='rent,rental'>
  <meta name='author' content='Quentrum Corp. 2018'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <!--SCRIPTS --> 
  <!-- jQuery library -->
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <!-- Latest compiled JavaScript -->
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
  <!--STYLESHEETS--> 
  <!-- Latest compiled and minified CSS -->
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.6.3/css/all.css' integrity='sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/' crossorigin='anonymous'>
  <link rel = 'stylesheet' href = 'main.css'> 

  <!--INTERNAL STYLES -->
              <style>
                .loader {
                border: 16px solid #f3f3f3;
                border-radius: 50%;
                border-top: 16px solid #3498db;
                width: 120px;
                height: 120px;
                -webkit-animation: spin 1.5s linear infinite; /* Safari */
                animation: spin 1.5s linear infinite;
                }

                /* Safari */
                @-webkit-keyframes spin {
                0% { -webkit-transform: rotate(0deg); }
                100% { -webkit-transform: rotate(360deg); }
                }

                @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
                }
                </style>

    <!--INTERNAL SCRIPTS -->
     <script>
        $(document).ready(function(){
            $('.loader-div').fadeOut(1500);
            $('.open-acct-modal').click(function(){
               $('.acct-small-modal').slideToggle('1000', 'swing'); 
            }); //open modal  
        }); 
     </script>
 </head>
 </html>

  <body>
        <nav class='navbar'>
        <div class='container-fluid'>
            <div class='navbar-header'>
            <a class='navbar-brand' href='index.php' style = 'color: #55efc4; margin-right: 5px; font-size: 25px; margin-left: 3px; letter-spacing: 1.5px;
            '> <i class='fas fa-fire-alt'></i> Rentro</a>
            </div>
            <form class='search-form navbar-left' action='/action_page.php'>
            <div class='input-group'>
                <input type='text' class='form-control' placeholder='Looking for something great at a cheap price?' name='search'>
                <div class='input-group-btn'>
                <button class='btn btn-default' type='submit'>
                    <i class='glyphicon glyphicon-search'></i>
                </button>
                </div>
            </div>
            </form>
 "; 
         if(isset($_SESSION['acct-id'])){
          echo "
            <ul class='nav navbar-nav'>
            <li><a class = 'upper-main-links' href='sell.php'>Sell</a></li>
            <li><a class = 'upper-main-links open-acct-modal'>Your Account</a></li>
            </ul>
            <div class = 'acct-small-modal'>
              <ul class = 'acct-small-modal-ul'> 
               <li class = 'acct-small-modal-li'><a class = 'acct-small-modal-a'> Account Information </a> </li> 
               <li class = 'acct-small-modal-li'> <a class = 'acct-small-modal-a'> Your Orders </a>  </li>
               <li class = 'acct-small-modal-li'> <a class = 'acct-small-modal-a'> Your Items </a> </li> 
               <li class = 'acct-small-modal-li'> 
                 <form method = 'POST' action = '".logoutUser()."'> 
                  <button class = 'logout-button' name = 'logout-button' > Sign Out </button> 
                 </form>  
               </li> 
              </ul> 
            </div> 

            ";
         } else {
           echo "
            <ul class='nav navbar-nav'>
            <li><a class = 'upper-main-links' href='sell.php'>Sell</a></li>
            <li><a class = 'upper-main-links' href='signin.php'>Sign In</a></li>
            </ul>
          "; 
         }
echo"
        </div>
        </nav>
        <nav class='navbar-second'>
            <ul class='nav navbar-under'>
            <li class = 'main-links'><a class = 'lower-main-links' href='seller-information.php'>I'm a Seller</a></li>
            <li class = 'main-links'><a class = 'lower-main-links' href='buyer-information.php'>I'm a Buyer</a></li>
            <li class = 'main-links'><a class = 'lower-main-links' href='customer-service.php'>Customer Services</a></li>
            </ul>
        </nav>   
"; 