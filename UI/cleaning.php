<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cleaning Personal</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <?php
    $host = "localhost";
    $user = "root";
    $pwd = "root";
    $db = "ApplicationProject";

    $conn = mysqli_connect($host, $user, $pwd, $db) or die("unable to connect");

    // select rooms info from database
    $query = "SELECT * FROM Cleaning";
    $result = mysqli_query($conn, $query);

    $id = '0';
    $FirstName = '';
    $LastName = '';
    $update = false;




    if (isset($_POST['save'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $FirstName = mysqli_real_escape_string($conn, $_POST['FirstName']);
        $LastName = mysqli_real_escape_string($conn, $_POST['LastName']);

        mysqli_query($conn, "INSERT INTO  Cleaning (id, FirstName, LastName) VALUES ('$id', '$FirstName', '$LastName')");
        $_SESSION['message'] = "Saved";
        header('location: cleaning.php');
    }

    if (isset($_GET['edit'])) {

        $id = $_GET['edit'];
        $update = true;
        $record = mysqli_query($conn, "SELECT * FROM Cleaning WHERE id='$id'");

        if (count($record) == 1) {
            $n = mysqli_fetch_array($record);
            $id = $n['id'];
            $FirstName = $n['FirstName'];
            $LastName = $n['LastName'];
        }
    }
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($conn, "DELETE FROM Cleaning WHERE id='$id'");
        header('location: cleaning.php');
    }

    ?>
</head>

<body>
    <h1>Cleaning</h1>
    <div class="container-fluid px-2">
        <form method="post" action="cleaning.php">
            <input type="text" name="id" value="<?php echo $id; ?>">
            <input type="text" name="FirstName" value="<?php echo $FirstName; ?>">
            <input type="text" name="LastName" value="<?php echo $LastName; ?>">

            <?php if ($update == true) : ?>
                <button class="btn" type="submit" name="Edit" style="background: #556B2F;">update</button>
            <?php else : ?>
                <button class="btn" type="submit" name="save">Save</button>
            <?php endif ?>

        </form>
        <br>

        <table style="width:100%;">
            <tr>
                <th>Id Cleaning Personal </th>
                <th>First Name</th>
                <th>Last Name</th>
                <th></th>

            </tr>
            <tr>
                <?php

                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <td> <?php
                            echo $row['id'];
                            ?></td>
                    <td><?php
                        echo $row['FirstName'];
                        ?></td>
                    <td><?php
                        echo $row['LastName'];
                        ?></td>

                    <td><a href="cleaning.php?edit=<?php echo $row['id']; ?>" class="edit_btn">Edit</a> <a href="cleaning.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a></td>
            </tr>



            <?php
                    if (isset($_POST['Edit'])) {

                        $id = mysqli_real_escape_string($conn, $_POST['id']);
                        $FirstName = mysqli_real_escape_string($conn, $_POST['FirstName']);
                        $LastName = mysqli_real_escape_string($conn, $_POST['LastName']);

                        mysqli_query($conn, "UPDATE Cleaning SET FirstName='$FirstName', LastName = '$LastName' WHERE id='$id'");
                        $_SESSION['message'] = "Address updated!";
                        header('location: cleaning.php');
                    }

            ?>




        <?php
                }
                mysqli_close($conn);
        ?>
        </table>
        <br>
        <h6 style="color: green;"> Already assigned id can't be changed. </h6>
    </div>
</body>

</html>