<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $from = $to = $passengers = $departure = $arrival = "";
$username_err = $from_err = $to_err = $passengers_err = $departure_err = $arrival_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate username
    $input_name = trim($_POST["username"]);
    if(empty($input_name)){
        $username_err = "Please enter a username.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9\s]+$/")))){
        $username_err = "Please enter a valid username.";
    } else{
        $username = $input_name;
    }
    
    // Validate country from
    $input_from = trim($_POST["from"]);
    if(empty($input_from)){
        $from_err = "Please enter a country.";     
    } elseif(!filter_var($input_from, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z, \s]+$/")))){
        $from_err = "Please enter a valid country.";
    } else{
        $from = $input_from;
    }
    
    // Validate country to
    $input_to = trim($_POST["to"]);
    if(empty($input_to)){
        $to_err = "Please enter a country.";     
    } elseif(!filter_var($input_to, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z, \s]+$/")))){
        $to_err = "Please enter a valid country.";
    } else{
        $to = $input_to;
    }
        
    // Validate passengers
    $input_passengers = trim($_POST["passengers"]);
    if(empty($input_passengers)){
        $passengers_err = "Please enter the number of passengers.";     
    } elseif(!ctype_digit($input_passengers)){
        $passengers_err = "Please enter a positive integer value.";
    } else{
        $passengers = $input_passengers;
    }
        
    // Validate departure
    $input_departure = trim($_POST["departure"]);
    if(empty($input_departure)){
        $departure_err = "Please enter the departure date.";
    } elseif(strtotime(date($input_departure)) < strtotime(date('Y-m-d'))) {
        $departure_err = "Please enter a date after today.";
    } else{
        $departure = $input_departure;
    }
        
    // Validate arrival
    $input_arrival = trim($_POST["arrival"]);
    if(empty($input_arrival)){
        $arrival_err = "Please enter the arrival date.";
    } elseif(strtotime(date($input_arrival)) < strtotime(date($input_departure))) {
        $arrival_err = "Please enter a date after the departure date.";
    } else{
        $arrival = $input_arrival;
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($from_err) && empty($to_err) && empty($passengers_err) && empty($departure_err) && empty($arrival_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO flight_booking (customer_name, country_from, country_to, passengers, departure, arrival) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssiss", $param_name, $param_from, $param_to, $param_passengers, $param_departure, $param_arrival);
            
            // Set parameters
            $param_name = $username;
            $param_from = $from;
            $param_to = $to;
            $param_passengers = $passengers;
            $param_departure = $departure;
            $param_arrival = $arrival;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: flight_index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>