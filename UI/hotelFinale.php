<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>HotelSummary</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <?php
    $host = "localhost";
    $user = "root";
    $pwd = "root";
    $db = "ApplicationProject";

    $conn = mysqli_connect($host, $user, $pwd, $db) or die("unable to connect");




    $query = "SELECT  Booking.Booking_id, Booking.Client_id, Booking.First_Name, Booking.Last_Name, Booking.ArrivalDate, 
                Booking.DepDate, Booking.TotGuests,  Booking.RoomNumber, Rooms.CleaningId
                FROM Booking, Rooms
                WHERE  Rooms.RoomNumber = Booking.RoomNumber";
    $result = mysqli_query($conn, $query);

    $query1 = "UPDATE Rooms SET Rooms.Available=TRUE WHERE Rooms.RoomNumber NOT IN (SELECT Booking.RoomNumber From Booking) ";

    if (mysqli_query($conn, $query1)) {
        echo "Records added successfully.";
    } else {
        echo "ERROR: Could not able to execute $quety1. " . mysqli_error($conn);
    }
    ?>
    
</head>


<body>
    <h1>Hotel Summary</h1>

    <div class="container-fluid px-4">
        <table style="width:100%;">
            <tr>
                <th>Booking ID</th>
                <th>Client ID</th>
                <th>Name</th>
                <th>Last Name</th>
                <th>Arrival Date</th>
                <th>Departure Date</th>
                <th>Tot. Guests</th>
                <th>Room</th>
                <th> Cleaning Id </th>
            </tr>

            <?php

            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td> <?php
                            echo $row['Booking_id'];
                            ?></td>
                    <td> <?php
                            echo $row['Client_id'];
                            ?></td>
                    <td><?php
                        echo $row['First_Name'];
                        ?></td>
                    <td><?php
                        echo $row['Last_Name'];
                        ?></td>
                    <td><?php
                        echo $row['ArrivalDate'];
                        ?></td>
                    <td><?php
                        echo $row['DepDate'];
                        ?></td>
                    <td><?php
                        echo $row['TotGuests'];
                        ?></td>
                    <td><?php
                        echo $row['RoomNumber'];
                        ?></td>
                    <td> <?php
                            echo $row['CleaningId'];
                            ?></td>



                <?php
            }
            mysqli_close($conn);
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
        </table>
        <br>
        <a href="hotel.php"> Back </a>
    </div>
</body>

</html>