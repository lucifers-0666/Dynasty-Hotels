<!-- In my sql perform following steps
 1. Create database "Dynasty Hotels"
    create database  auth_dive;
 2. Create table "users" with query
    CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ); 
 -->
 <?php
//Database connection - database already created in mysql
$host="localhost";
$username="root";
$password="";
$dbname="Dynasty_Hotels";

//Create mysqli object
$con = new mysqli($host,$username,$password,$dbname);
//check connection
if($con->connect_error)
{
	die("Connection Failed" . $con->connect_error);
}
else
{
	// echo "Connection Done";
}

?>