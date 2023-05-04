<?php
 include ("config.php" ); 
$name =  $_POST['name']; 
$city = $_POST['city'];
$adults = $_POST['adults'];
$children = $_POST['children'];
$rooms = $_POST['rooms'];
$type = $_POST['room_type'];
$check_in = $_POST['check_in'];
$check_out = $_POST['check_out']; 

$sql=  "INSERT into `hotel_booking`(`name`, `city`, `room_type`, `check_in`, `check_out`, `adults`, `children`, `rooms`) 
value (' {$name} ' , ' {$city } ' , ' {$type } ' , ' {$check_in } ' , ' {$check_out } ' , ' {$adults } ' , ' {$children } ' , ' {$rooms } ')" ; 

if(mysqli_query($link , $sql)){
    // header("location: hotel_index.php");
    // exit();
    $response = [
        'status'=>'ok',
        'success'=>true,
        'message'=>'Record created succesfully!'
    ];
    print_r(json_encode($response));
}else{
    // echo "Oops! Something went wrong. Try again later."
    $response = [
        'status'=>'ok',
        'success'=>false,
        'message'=>'Record created failed!'
    ];
    print_r(json_encode($response));
} 
?> 