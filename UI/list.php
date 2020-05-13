<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>List of rooms</title>
    <link rel="stylesheet" href="style.css">
    
    <?php
    $host = "localhost";
    $user = "root";
    $pwd = "root";
    $db = "ApplicationProject";

    $conn = mysqli_connect($host, $user, $pwd, $db) or die("unable to connect"); 
    
    ?>
</head>

<body>
    <h1>Rooms</h1>


    <table style="width:100%;">
        <tr>
            <th>Room#</th>
            <th>Bed#</th>
            <td>Availability</td>
            <td></td>
        </tr>
        <tr>
            <td>1</td>
            <td>2</td>
            <td></td>
            <td><a href="#">Edit</a> | <a href="#">Delete</a></td>
        </tr>
        <tr>
            <td>2</td>
            <td>4</td>
            <td></td>
            <td><a href="#">Edit</a> | <a href="#">Delete</a></td>
        </tr>
    </table>
</body>

</html>