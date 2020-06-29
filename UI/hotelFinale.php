<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>HotelSummary</title>
   
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
        
    } else {
        
    }
    ?>
    

<style> 

body {
    font-family: "DejaVu Sans Mono", monospace;
    padding-left: 20px;
    padding-top: 10px;
    
}

</style>

</head>


<body>
    <h1>Hotel Summary</h1>
<p> 
    <a href="list.php" style="padding-right: 20px;"> List of Rooms </a>
    <a href="cleaning.php"> List of Cleaning Personal </a>
</p>
    <div class="container-fluid px-4">
        <table style="width:100%;" class="table ">
        <thead class="thead-dark">
            <tr>
                <th scope="col"> Booking ID</th>
                <th scope="col">Client ID</th>
                <th scope="col">Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Arrival Date</th>
                <th scope="col">Departure Date</th>
                <th scope="col">Tot. Guests</th>
                <th scope="col">Room</th>
                <th scope="col"> Cleaning Id </th>
            </tr>
        </thead>
        <tbody>
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
        </tbody>
        </table>
        <br>
        <a href="hotel.php"> Back </a>
    </div>





    
</body>

</html>