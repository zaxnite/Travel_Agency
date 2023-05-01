<?php
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $yourEmail = $_POST['your-email'];
    $yourQuery = $_POST['your-query'];
    require_once("config.php");
    // insert data
    $stmt = $conn->prepare("insert into query_entry(first_name, last_name, email, customer_query) 
    values(?, ?, ?, ?)");
    $stmt->bind_param("ssss",$firstName, $lastName, $yourEmail, $yourQuery);
    $stmt->execute();
    echo "Thank you for your input.";
    $stmt->close();
    $conn->close();
    }
?>