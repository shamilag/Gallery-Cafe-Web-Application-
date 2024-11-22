<?php

//start session
session_start();



//create constants to store non repeating values
define('SITEURL','http://localhost/foodshop/');
define('LOCALHOST','localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME','food_shop');


$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error()); //Database cnnection
$db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error()); //Selecting Database

/*
$survername="localhost";
$dbusername="root";
$dbpassword="";
$dbname="food_shop";  

$conn= mysqli_connect($survername,$dbusername,$dbpassword,$dbname);
if(!$conn){
    dIe("connection fail".mysqli_connect_error());
}
else{
    echo"connection sucsessful";


}
    */
?>