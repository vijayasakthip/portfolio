<?php
$servername="localhost";
$username="root";
$password="";
$db_name="employeedb";
$conn="";

$conn=mysqli_connect($servername,$username,$password,$db_name);

if($conn){
    echo"";
}
else{
    echo"could not connected";
}

?>