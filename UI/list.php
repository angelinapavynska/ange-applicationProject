<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>List of rooms</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
    <div class="container-fluid px-2">

    <table style="width: 100%; margin-bottom: 10px">
        <tr>
            <th >Room#</th>
            <th >Bed#</th>
            <th >Availability</td>
            <th ></td>
        </tr>
        <tr>
            <td>1</td>
            <td>2</td>
            <td></td>
            <td ><a href="list.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a> <button  class="btn btn-outline-danger " value="submit" input type="submit" name="Delete">Delete</button></td>
        </tr>
        <tr>
            <td>2</td>
            <td>4</td>
            <td></td>
            <td><button  class="btn btn-outline-primary" value="submit" input type="submit" name="Edit">Edit</button> <button  class="btn btn-outline-danger " value="submit" input type="submit" name="Delete">Delete</button></td>
        </tr>
    </table>
</div>
</body>

</html>