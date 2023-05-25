<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="jquery-3.7.0.min.js"></script>

</head>

<body>
    <div class="bg-info p-2 text-white bg-opacity-75">
        <div class="p-5 bg-primary text-white text-center">
            <h1>Welcome to Restaurant Table Reservation System</h1>
        </div>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="bookingForm" align="center" class="container py-5 h-100">
            <table>
                <tr>
                    <td><label for="select day" class="form-label">Select day</label></td>
                    <td><select id="drop1" name="dropdown1" class="form-control" required>
                            <option value="option1">select</option>
                            <option value="Fullday">Fullday</option>
                            <option value="Halfday">Halfday</option>
                            <option value="custom">custom</option>
                        </select></td>
                </tr>
                <tr>
                    <td><label for="select half day" class="form-label">Select half day</label></td>
                    <td><select id="drop2" name="dropdown2" class="form-control" required>
                            <option value="option1">select</option>
                            <option value="8am-12am">8am-12am</option>
                            <option value="12pm-4pm">12pm-4pm</option>
                            <option value="4pm-8pm">4pm-8pm</option>
                            <option value="8pm-12am">8pm-12am</option>
                        </select></td>
                </tr>
                <tr>
                    <td><label for="date" class="form-label">Date</label></td>
                    <td><input type="date" id="date" placeholder="Date" class="form-control" required></td>
                </tr>
                <tr>
                    <td><label for="time" class="form-label">Time</label></td>
                    <td> <input type="time" id="time" placeholder="Time" class="form-control" required></td>
                </tr>
                <tr>
                    <td><button id="bookBtn" class="btn btn-primary btn-lg">Book Table</button></td>
                </tr>
            </table>
        </div>
        <table id="bookingTable" class="table table-hover">
            <thead>
                <tr>
                    <th>select day</th>
                    <th>Select half day time</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="bookingData">
            </tbody>
        </table>
    </div>
    <footer class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3 bg-primary">
            © 2023 Copyright:
        </div>
    </footer>
    <script>
        $(document).ready(function() {
            $('#drop2').hide();

            $('#drop1').change(function() {
                var selectedval = $(this).val();

                if (selectedval == 'Fullday') {
                    $('#drop2').hide();
                } else {
                    $('#drop2').show();
                }
            });
        });
    </script>
    <script>
        var bookings = [];

        function addBooking() {
            var drop1 = $("#drop1").val();
            var drop2 = $("#drop2").val();
            var date = $("#date").val();
            var time = $("#time").val();

            if (drop1 === "" || drop2 === "" || date === "" || time === "") {
                alert("Please fill in all fields.");
                return;
            }

            var booking = {
                drop1: drop1,
                drop2: drop2,
                date: date,
                time: time
            };

            bookings.push(booking);

            $("#drop1").val("");
            $("#drop2").val("");
            $("#date").val("");
            $("#time").val("");


            refreshTable();
        }

        function deleteBooking(index) {
            bookings.splice(index, 1);
            refreshTable();
        }

        function refreshTable() {

            $("#bookingData").empty();

            $.each(bookings, function(index, booking) {
                var row = "<tr>";
                row += "<td>" + booking.drop1 + "</td>";
                row += "<td>" + booking.drop2 + "</td>";
                row += "<td>" + booking.date + "</td>";
                row += "<td>" + booking.time + "</td>";
                row += "<td><button class='deleteBtn' data-index='" + index + "'>Delete</button></td>";
                row += "</tr>";
                $("#bookingData").append(row);
            });
        }


        $("#bookBtn").click(addBooking);

        $("#bookingTable").on("click", ".deleteBtn", function() {
            var index = $(this).data("index");
            deleteBooking(index);
        });
    </script>


</body>

</html>