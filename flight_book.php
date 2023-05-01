<?php
    $username = $_POST['name'];
    $countryfrom = $_POST['from'];
    $countryto = $_POST['to'];
    $passengers = $_POST['passengers'];
    $departure = $_POST['departure'];
    $return = $_POST['return'];
    require_once("config.php");
    // insert data
    $stmt = $conn->prepare("insert into flight_booking(customer_name, country_from, country_to, passengers, departure, arrival) 
    values(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiss",$username, $countryfrom, $countryto, $passengers, $departure, $return);
    $stmt->execute();
    echo "Booked successfully";
    $stmt->close();
    $conn->close();
?>

