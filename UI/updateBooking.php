<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Update YourBooking</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <?php
    
    
    
    ?>
</head>

<body>
    <div class="container-fluid px-2">
    <h1>Update your Booking</h1>

<form action="updateBooking.php" method="post" >
    <table style="width: 100%; margin-bottom: 10px">
        <tr>
            <td >Your Assigned Id</td>
            <td><input type="text" style="width: 100%" name="idUpdate" required></td>
            <td>First Name</td>
            <td><input type="text" style="width: 100%" name="first_nameUpdate" required></td>
            
        </tr>
        <tr>
        <td>Last Name</td>
            <td><input type="text" style="width: 100%" name="last_nameUpdate" required></td>
            <td >Address</td>
            <td ><input type="text" style="width: 100%" name="addressUpdate" required></td>
        </tr>
        <tr>
            <td>Guests(>18)</td>
            <td><input type="text" style="width: 100%" name="guestsUpdate"required></td>
            <td>Children(<18) </td>
            <td><input type="text" style="width: 100%" name="childrenUpdate" required></td>
        </tr>
        <tr>
            <td>Arrival Date</td>
            <td><input type="date" style="width: 100%" name="arrivalDateUpdate" min="2020-05-12" placeholder="yyyy-mm-dd" required></td>
            <td>Departure Date </td>
            <td><input type="date" style="width: 100%" name="departureDateUpdate" min="2020-05-13" placeholder="yyyy-mm-dd" required></td>
        </tr>
    
    </table>
    <h6 style="color: green;">Please fill in all the fields </h6>
    <button  class="btn btn-outline-primary btn-lg" value="submit" input type="submit" name="submitChange">Submit</button>

    <?php
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submitChange']))
    {
        update();
    }
    function update()
    {
        $host = "localhost";
    $user = "root";
    $pwd = "root";
    $db = "ApplicationProject";

    $conn = mysqli_connect($host, $user, $pwd, $db) or die("unable to connect");  

     
        $first_name = mysqli_real_escape_string($conn, $_POST['first_nameUpdate']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_nameUpdate']);
        $address = mysqli_real_escape_string($conn, $_POST['addressUpdate']);
        $guests= mysqli_real_escape_string($conn, $_POST['guestsUpdate']);
        $children = mysqli_real_escape_string($conn, $_POST['childrenUpdate']);
        $arrivalDate = mysqli_real_escape_string($conn, $_POST['arrivalDateUpdate']);
        $departureDate = mysqli_real_escape_string($conn, $_POST['departureDateUpdate']);
        $id = mysqli_real_escape_string($conn, $_POST['idUpdate']);

        echo "$first_name";

       $sql = "UPDATE Clients
       SET  Name = '$first_name', LastName = '$last_name', Address = '$address', Guests = '$guests', ArrivalDate = '$arrivalDate', DepartureDate = '$departureDate', Children = '$children'
       WHERE id='$id'";

       if(mysqli_query($conn, $sql)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
    }
?>

</form>
<br>

</div>
</body>

</html>