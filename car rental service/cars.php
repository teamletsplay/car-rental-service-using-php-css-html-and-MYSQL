

<?php

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

if(isset($_POST["did"]))
{
    $did=$_POST['did'];
}
$sql = "UPDATE `reservation` SET `car_id`='$did' WHERE car_id is NULL ";
 mysqli_query($conn,$sql);
 $sql="SELECT max(`id`) FROM `reservation` WHERE 1";
 $result=mysqli_query($conn,$sql);
 $row=mysqli_fetch_assoc($result);
 $id=$row['max(`id`)'];
 
$sql= "INSERT INTO `payment`( `cid`, `rid`) VALUES ('$did','$id')";
 
if (mysqli_query($conn,$sql)) {
  echo "New record created successfully";
  header("location:payment.html");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



  ?>

