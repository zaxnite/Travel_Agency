<?php
include ("config.php" ); 
$sql= "SELECT *  FROM `hotel_booking`" ; 
$result = mysqli_query($link ,  $sql); 
$data = [];
while ($fetch=mysqli_fetch_assoc($result)){
    $data[] = $fetch;
}
print_r(json_encode($data));
?> 