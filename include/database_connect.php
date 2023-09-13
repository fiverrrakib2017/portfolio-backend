<?php 

 $host="localhost";
 $username="root";
 $password="";
 $db_name="gym";
 $con=new mysqli($host,$username,$password,$db_name);
 if (!$con==true) {
 	echo "Database Connection Problem";
 }





 ?>