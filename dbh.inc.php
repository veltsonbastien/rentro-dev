<?php 
$conn = mysqli_connect('localhost', 'root', '', 'rentro_db');
if(!$conn){
 die("Error with database connection".mysqli_connect_error()); 
} 