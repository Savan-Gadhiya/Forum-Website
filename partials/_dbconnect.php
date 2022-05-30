<?php
// Script to connect to database 
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'idiscuss forum';

$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    die('Error while connecting a database Error is : ' . mysqli_connect_error());
}
// else{
    // echo 'Db connected';
// }
?>
