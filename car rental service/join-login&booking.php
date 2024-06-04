<table border="1">
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Number</th>
        <th>Email</th>
        <th>password</th>
    </tr>



<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logindb";
  

$conn = new mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed");
$query="select rs* from register r, rental_search rs where r.id=rs.id";
$result=mysqli_query($conn,$query);
while ($row=mysqli_fetch_assoc($result)) {
    ?>
       <tr>
        <td><?php echo $row['firstname']?></td>
        <td><?php echo $row['lastname']?></td>
        <td><?php echo $row['number']?></td>
        <td><?php echo $row['email']?></td>
        <td><?php echo $row['password']?></td>
       </tr>
}





?>