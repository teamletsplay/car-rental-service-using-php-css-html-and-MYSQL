<?php

$fullname=$_POST['fullname'];
$email=$_POST['email'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$zipcode=$_POST['zipcode'];
$cardnumber=$_POST['cardnumber'];
$month=$_POST['month'];
$expyear=$_POST['expyear'];




$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rensys";
  

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql="SELECT max(`id`) FROM `reservation` WHERE 1";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$id=$row['max(`id`)'];


  $sql = "UPDATE `payment` SET `fullname`='$fullname',`email`='$email',`address`='$address',`city`='$city',`state`='$state',`zipcode`='$zipcode',`cardnumber`='$cardnumber',`month`='$month',`expyear`='$expyear' WHERE cid is not null and rid='$id'";
  (mysqli_query($conn,$sql)) ;
  echo "payment details entered succesfully";

$conn->close();
?>
