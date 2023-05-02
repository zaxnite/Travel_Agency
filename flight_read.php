<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM flight_booking WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
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
                // URL doesn't contain valid id parameter.
                echo "Oops! Something went wrong. Please try again later.";
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
} else{
    // URL doesn't contain id parameter.
    echo "Oops! Something went wrong. Please try again later.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
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
                    <h1 class="mt-5 mb-3">View Record</h1>
                    <div class="form-group">
                        <label>Username</label>
                        <p><b><?php echo $username; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Country From</label>
                        <p><b><?php echo $from; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Country To</label>
                        <p><b><?php echo $to; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Passengers</label>
                        <p><b><?php echo $passengers; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Departure</label>
                        <p><b><?php echo $departure; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Return</label>
                        <p><b><?php echo $arrival; ?></b></p>
                    </div>
                    <p><a href="flight_index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>