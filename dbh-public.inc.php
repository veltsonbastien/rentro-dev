<?php 
$conn = mysqli_connect('localhost', 'Quentrum_Rentro', 'QuentrumRentro2019!', 'rentro_db');
if(!$conn){
 die("Error with database connection".mysqli_connect_error()); 
} 