<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hotel</title>
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <?php
    $host = "localhost";
    $user = "root";
    $pwd = "root";
    $db = "ApplicationProject";

    $conn = mysqli_connect($host, $user, $pwd, $db) or die("unable to connect");

    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $guests = mysqli_real_escape_string($conn, $_POST['guests']);
    $children = mysqli_real_escape_string($conn, $_POST['children']);
    $arrivalDate = mysqli_real_escape_string($conn, $_POST['arrivalDate']);
    $departureDate = mysqli_real_escape_string($conn, $_POST['departureDate']);


    $sql = "INSERT INTO Clients (id, Name, LastName, Email, Guests, ArrivalDate, DepartureDate, Children ) 
    VALUES (NULL ,'$first_name', '$last_name', '$email', '$guests', '$arrivalDate', '$departureDate', '$children') ";

    if (mysqli_query($conn, $sql)) {
       
    } else {
        
    }



    $idDelete = mysqli_real_escape_string($conn, $_POST['idDelete']);

    $sql = " DELETE FROM Clients WHERE id='$idDelete'";

    if (mysqli_query($conn, $sql)) {
        
    } else {
        
    }

    $sql = " DELETE FROM Booking WHERE Client_id='$idDelete'";

    if (mysqli_query($conn, $sql)) {
        
    } else {
        
    }

    if (isset($_GET['delBooking'])) {
        $Booking_id = $_GET['delBooking'];
        mysqli_query($conn, "DELETE FROM Booking WHERE Booking_id=$Booking_id");
        header('location: hotel.php');
    }

    //query to selelct all possibile combinations, preserving the ons already made 
    $sql = "INSERT INTO Booking (SELECT NULL, Clients.id, Clients.Name, Clients.LastName, Clients.ArrivalDate, Clients.DepartureDate, Clients.Guests+Clients.Children as Guests,  Rooms.RoomNumber  FROM Clients,  Rooms 
WHERE (Clients.Guests+Clients.Children)<=Rooms.BedNumber AND Rooms.Available = TRUE AND Clients.id NOT IN (SELECT Booking.Client_id FROM Booking))";
    // $result = mysqli_query($conn, $query);

    if (mysqli_query($conn, $sql)) {
        
    } else {
        
    }

    $query = "SELECT * FROM Booking ";
    $result = mysqli_query($conn, $query);

    $query1 = "UPDATE Rooms SET Rooms.Available=FALSE WHERE Rooms.RoomNumber IN (SELECT Booking.RoomNumber From Booking) ";

    if (mysqli_query($conn, $query1)) {
        
    } else {
        
    }


    // Search for people who won't have any accomodotaion
    $query2 = "SELECT * FROM Clients WHERE Clients.id NOT IN (SELECT Booking.Client_id FROM Booking)";
    $result2 = mysqli_query($conn, $query2);
    if (mysqli_query($conn, $query2)) {
        
    } else {
        
    }


    // Delete clients from second table 
    if (isset($_GET['delClient'])) {
        $id = $_GET['delClient'];
        mysqli_query($conn, "DELETE FROM Clients WHERE id= '$id' ");
        header('location: hotel.php');
    }
    ?>

    <style>
        body {
    font-family: "DejaVu Sans Mono", monospace;
    padding-left: 20px;
    padding-top: 10px;
    padding-right: 20px;
}
    </style>
</head>


<body>
    <h1>Hotel</h1>

    <div class="container-fluid px-4">
        <table style="width:100%;" class="table">
        <thead class="thead-dark">
            <tr>
                <th>Booking ID</th>
                <th>Client ID</th>
                <th>Name</th>
                <th>Last Name</th>
                <th>Arrival Date</th>
                <th>Departure Date</th>
                <th>Tot. Guests</th>
                <th>Room</th>
                <th> Delete </th>

            </tr>
        </thead>

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
                    <td> <a href="Hotel.php?delBooking=<?php echo $row['Booking_id']; ?>" class="del_btn">Delete</a></td>
                </tr>


            <?php
            }
            mysqli_close($conn);
            ?>

        </table>
        <br>
        <a href="hotelFinale.php"> Save and View Complete Information</a>
        <br>

<br>
<br>
        <h6 style="color: red;"> Contant following clients. Inform them about the cancellation of their Booking. </h6>
        <table style="width:100%;" class="table">
        <thead class="thead-dark">
            <tr>
                <th>Client ID</th>
                <th>Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Guests</th>
                <th>Arrival Date</th>
                <th>Departure Date</th>
                <th>Children</th>
                <th>Delete</th>
            </tr>
        </thead>
            <?php

            while ($row = mysqli_fetch_array($result2)) {
            ?>
                <tr>
                    <td> <?php
                            echo $row['id'];
                            ?></td>
                    <td> <?php
                            echo $row['Name'];
                            ?></td>
                    <td><?php
                        echo $row['LastName'];
                        ?></td>
                    <td><?php
                        echo $row['Email'];
                        ?></td>
                    <td><?php
                        echo $row['Guests'];
                        ?></td>
                    <td><?php
                        echo $row['ArrivalDate'];
                        ?></td>
                    <td><?php
                        echo $row['DepartureDate'];
                        ?></td>
                    <td><?php
                        echo $row['Children'];
                        ?></td>
                    <td> <a href="Hotel.php?delClient=<?php echo $row['id']; ?>" class="del_btn">Delete</a></td>
                </tr>


            <?php
            }
            mysqli_close($conn);
            ?>

        </table>

    </div>
</body>

</html>