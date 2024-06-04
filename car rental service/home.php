

<?php
$pickup_location=$_POST['pickup_location'];
$pickup_date=$_POST['pickup_date'];
$pickup_time=$_POST['pickup_time'];
$delivery_date=$_POST['delivery_date'];
$delivery_time=$_POST['delivery_time'];


$servername ="localhost";
$username ="root";
$password = "";
$dbname ="rensys";
  


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql="SELECT max(`cusid`) FROM `customer` WHERE 1";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$cid=$row['max(`cusid`)'];
$sql = "INSERT INTO reservation(pickup_location,pickup_date,pickup_time,delivery_date,delivery_time,ciiid) VALUES ('$pickup_location', '$pickup_date', '$pickup_time','$delivery_date','$delivery_time','$cid')";

if (mysqli_query($conn,$sql)) {
  
  echo "New record created successfully";
  header('location:cars2.html');

  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>


