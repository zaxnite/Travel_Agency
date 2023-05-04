<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background-image: url("assets/media/hotel_php.jpg");
            background-position: center;
            background-size: cover;
        }
        .wrapper{
            background-color:rgba(211, 211, 211, 0.9);
            width: 800px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function () {
            bookingList();
        });

        function bookingList() {
            $.ajax({
                type: 'get',
                url: "hotel_list.php",
                success: function (data) {
                    var response = JSON.parse(data);
                    console.log(response);
                    //console.log(data);
                    var tr = '';
                    for (var i = 0; i < response.length; i++) {
                        var id = response[i].id;
                        var name = response[i].name;
                        var city = response[i].city;
                        var room_type = response[i].room_type;
                        var check_in = response[i].check_in;
                        var check_out = response[i].check_out;
                        var adults = response[i].adults;
                        var children = response[i].children;
                        var rooms = response[i].rooms;
                        tr += '<tr>';
                        tr += '<td>' + id + '</td>';
                        tr += '<td>' + name + '</td>';
                        tr += '<td>' + city + '</td>';
                        tr += '<td>' + room_type + '</td>';
                        tr += '<td>' + check_in + '</td>';
                        tr += '<td>' + check_out + '</td>';
                        tr += '<td>' + adults + '</td>';
                        tr += '<td>' + children + '</td>';
                        tr += '<td>' + rooms + '</td>';
                        tr += '</tr>';
                        }
                    $('#booking_data').html(tr);
                    }
                });
            }
    </script>
</head>
<body class="hotel_php">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Hotel Bookings</h2>
                        <a href="hotels.html" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Return back to page</a>
                    </div>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>City</th>
                                <th>Room Type</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Adults</th>
                                <th>Children</th>
                                <th>Rooms</th>
                            </tr>
                        </thead>
                        <tbody id="booking_data">
                        </tbody>
                    </table>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>