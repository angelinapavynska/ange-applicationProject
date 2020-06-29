<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>List of rooms</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <?php
    $host = "localhost";
    $user = "root";
    $pwd = "root";
    $db = "ApplicationProject";

    $conn = mysqli_connect($host, $user, $pwd, $db) or die("unable to connect");

    // select rooms info from database
    $query = "SELECT RoomNumber, BedNumber, Available FROM Rooms";
    $result = mysqli_query($conn, $query);

    $RoomNumber = '0';
    $BedNumber = '';
    $Available = '';
    $update = false;




    if (isset($_POST['save'])) {
        $RoomNumber = mysqli_real_escape_string($conn, $_POST['RoomNumber']);
        $BedNumber = mysqli_real_escape_string($conn, $_POST['BedNumber']);
        $Available = mysqli_real_escape_string($conn, $_POST['Available']);

        mysqli_query($conn, "INSERT INTO  Rooms (RoomNumber, BedNumber, Available) VALUES ('$RoomNumber', '$BedNumber', '$Available')");
        $_SESSION['message'] = "Address saved";
        header('location: list.php');
    }

    if (isset($_GET['edit'])) {

        $RoomNumber = $_GET['edit'];
        $update = true;
        $record = mysqli_query($conn, "SELECT * FROM Rooms WHERE RoomNumber='$RoomNumber'");

        if (count($record) == 1) {
            $n = mysqli_fetch_array($record);
            $RoomNumber = $n['RoomNumber'];
            $BedNumber = $n['BedNumber'];
            $Available = $n['Available'];
        }
    }
    if (isset($_GET['del'])) {
        $RoomNumber = $_GET['del'];
        mysqli_query($conn, "DELETE FROM Rooms WHERE RoomNumber=$RoomNumber");
        header('location: list.php');
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
    <h1>Rooms</h1>
   

    <div class="container-fluid px-4">
       
        <a href="hotelFinale.php"> View Complete Information</a>

        <form method="post" action="list.php">
            <input type="text" name="RoomNumber" value="<?php echo $RoomNumber; ?>">
            <input type="text" name="BedNumber" value="<?php echo $BedNumber; ?>">
            <input type="text" name="Available" value="<?php echo $Available; ?>">

            <?php if ($update == true) : ?>
                <button class="btn" type="submit" name="Edit" style="background: #556B2F; color:white;">update</button>
            <?php else : ?>
                <button class="btn" type="submit" name="save">Save</button>
            <?php endif ?>

        </form>
        <br>
        <table style="width: 100%; margin-bottom: 10px" class="table">
        <thead class="thead-dark">
            <tr>
                <th>Room#</th>
                <th>Bed#</th>
                <th>Availability</td>
                <th>
                    </td>
            </tr>
        </thead>
            <tr>
                <?php

                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <td> <?php
                            echo $row['RoomNumber'];
                            ?></td>
                    <td><?php
                        echo $row['BedNumber'];
                        ?></td>
                    <td><?php
                        echo $row['Available'];
                        ?></td>
                    <td><a href="list.php?edit=<?php echo $row['RoomNumber']; ?>" class="edit_btn">Edit</a> <a href="list.php?del=<?php echo $row['RoomNumber']; ?>" class="del_btn">Delete</a></td>
            </tr>
            <!-- <tr>
            <td>2</td>
            <td>4</td>
            <td></td>
            <td><button  class="btn btn-outline-primary" value="submit" input type="submit" name="Edit">Edit</button> <button  class="btn btn-outline-danger " value="submit" input type="submit" name="Delete">Delete</button></td>
        </tr> -->

            <?php
                    if (isset($_POST['Edit'])) {

                        $RoomNumber = mysqli_real_escape_string($conn, $_POST['RoomNumber']);
                        $BedNumber = mysqli_real_escape_string($conn, $_POST['BedNumber']);
                        $Available = mysqli_real_escape_string($conn, $_POST['Available']);

                        mysqli_query($conn, "UPDATE Rooms SET BedNumber='$BedNumber', Available = '$Available' WHERE RoomNumber='$RoomNumber'");
                        $_SESSION['message'] = "Address updated!";
                        header('location: list.php');
                    }

            ?>




        <?php
                }
                mysqli_close($conn);
        ?>
        </table>
    </div>
</body>

</html>