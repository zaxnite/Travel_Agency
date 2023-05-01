<?php
    $username = $_POST['name'];
    $city = $_POST['stay'];
    $adults = $_POST['adults'];
    $children = $_POST['children'];
    $rooms = $_POST['rooms'];
    $type = $_POST['type'];
    $ch_in = $_POST['ch_in'];
    $ch_out = $_POST['ch_out'];
    require_once("config.php");
    // insert data
    $stmt = $conn->prepare("insert into hotel_booking(customer_name, city, room_type, check_in, check_out, adults, children, rooms) 
    values(?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssiii",$username, $city, $type, $ch_in, $ch_out, $adults, $children, $rooms);
    $stmt->execute();
    echo "Booked successfully";
    $stmt->close();
    $conn->close();
?>