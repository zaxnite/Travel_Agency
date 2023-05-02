<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $from = $to = $passengers = $departure = $arrival = "";
$username_err = $from_err = $to_err = $passengers_err = $departure_err = $arrival_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

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
        $from_err = "Please enter a country you want to go from.";     
    } elseif(!filter_var($input_from, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z, \s]+$/")))){
        $from_err = "Please enter a valid country.";
    } else{
        $from = $input_from;
    }
    
    // Validate country to
    $input_to = trim($_POST["to"]);
    if(empty($input_to)){
        $to_err = "Please enter a country you want to go to.";     
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
        // Prepare an update statement
        $sql = "UPDATE flight_booking SET customer_name=?, country_from=?, country_to=?, passengers=?, departure=?, arrival=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssissi", $param_name, $param_from, $param_to, $param_passengers, $param_departure, $param_arrival, $param_id);
            
            // Set parameters
            $param_name = $username;
            $param_from = $from;
            $param_to = $to;
            $param_passengers = $passengers;
            $param_departure = $departure;
            $param_arrival = $arrival;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM flight_booking WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $username = $row["customer_name"];
                    $from = $row["country_from"];
                    $to = $row["country_to"];
                    $passengers = $row["passengers"];
                    $departure = $row["departure"];
                    $arrival = $row["arrival"];
                } else{
                    // URL doesn't contain valid id.
                    echo "Invalid ID. Try again later";
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter.
        echo "Something went wrong while retrieving from database. Try again later.";
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the booking record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err;?></span>
                        </div>
                        <datalist id="airport1">
                            <option value="Abu Dhabi, UAE">
                            <option value="Sharjah, UAE">
                            <option value="Dubai, UAE">
                            <option value="Incheon, Korea">
                            <option value="Jeju, Korea">
                            <option value="Frankfurt, Germany">
                            <option value="Berlin, Germany">
                            <option value="Narita, Japan">
                            <option value="Haneda, Japan">
                            <option value="Paris, France">
                            <option value="Bordeaux, France">
                            <option value="Bangkok, Thailand">
                            <option value="Chiang Mai, Thailand">
                            <option value="Barcelona, Spain">
                            <option value="Valencia, Spain">
                        </datalist>
                        <div class="form-group">
                            <label>From</label>
                            <input list="airport1" name="from" class="form-control <?php echo (!empty($from_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $from; ?>">
                            <span class="invalid-feedback"><?php echo $from_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>To</label>
                            <input list="airport1" name="to" class="form-control <?php echo (!empty($to_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $to; ?>">
                            <span class="invalid-feedback"><?php echo $to_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Passengers</label>
                            <input type="number" name="passengers" class="form-control <?php echo (!empty($passengers_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $passengers; ?>">
                            <span class="invalid-feedback"><?php echo $passengers_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Departure</label>
                            <input type="date" name="departure" class="form-control <?php echo (!empty($departure_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $departure; ?>">
                            <span class="invalid-feedback"><?php echo $departure_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Return</label>
                            <input type="date" name="arrival" class="form-control <?php echo (!empty($arrival_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $arrival; ?>">
                            <span class="invalid-feedback"><?php echo $arrival_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="flight_index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>