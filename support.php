<?php
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $yourEmail = $_POST['your-email'];
    $yourQuery = $_POST['your-query'];
    require_once("support_config.php");
    // insert data
    $stmt = $conn->prepare("insert into queries(FirstName, LastName, Email, Queries) 
    values(?, ?, ?, ?)");
    $stmt->bind_param("ssss",$firstName, $lastName, $yourEmail, $yourQuery);
    $stmt->execute();
    echo "Thank you for your input.";
    $stmt->close();
    $conn->close();
    header("Location: support_index.php");
    exit;

?>