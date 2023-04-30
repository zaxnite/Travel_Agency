<?php
    $username = $_POST['name'];
    $countryfrom = $_POST['from'];
    $countryto = $_POST['to'];
    $passengers = $_POST['passengers'];
    $departure = $_POST['departure'];
    $return = $_POST['return'];
    require_once("connection.php");
    if($conn->connect_error){
        die('Connection failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into flight_booking(username, country_from, country_to, passengers, departure, arrival) 
        values(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssiss",$username, $countryfrom, $countryto, $passengers, $departure, $return);
        $stmt->execute();
        echo "Booked successfully";
        $stmt->close();
        $conn->close();
    }
?>

