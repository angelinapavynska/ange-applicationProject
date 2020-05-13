
<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hotel</title>
    <link rel="stylesheet" href="style.css">

    <?php
    $host = "localhost";
    $user = "root";
    $pwd = "root";
    $db = "ApplicationProject";

    $conn = mysqli_connect($host, $user, $pwd, $db) or die("unable to connect"); 
    
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $guests= mysqli_real_escape_string($conn, $_POST['guests']);
    $children = mysqli_real_escape_string($conn, $_POST['children']);
    $arrivalDate = mysqli_real_escape_string($conn, $_POST['arrivalDate']);
    $departureDate = mysqli_real_escape_string($conn, $_POST['departureDate']);
    

    $sql = "INSERT INTO Clients (id, Name, LastName, Address, Guests, ArrivalDate, DepartureDate, Children ) 
    VALUES (NULL ,'$first_name', '$last_name', '$address', '$guests', '$arrivalDate', '$departureDate', '$children') ";

if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}


    $firstNameDelete = mysqli_real_escape_string($conn, $_POST['firstNameDelete']);
    $lastNameDelete = mysqli_real_escape_string($conn, $_POST['lastNameDelete']);
    $idDelete = mysqli_real_escape_string($conn, $_POST['idDelete']);

    $sql = " DELETE FROM Clients WHERE id='$idDelete'";

if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}


//query for selelction
$query = "SELECT id, Name, LastName, ArrivalDate, DepartureDate, Guests+Children as Guests FROM Clients";
$result = mysqli_query($conn, $query);
    ?>

</head>

<body>
    <h1>Hotel</h1>

    <table style="width:100%;">
      <tr>
          <th>Booking ID</th>
          <th>Name</th>
          <th>Last Name</th>
          <th>Arrival Date</th>
          <th>Departure Date</th>
          <th>Tot. Guests</th>
          <th>Id Cleaning Personal</th>
          <th>Room</th>
      </tr>
      <?php
                
                    while ($row= mysqli_fetch_array($result)) {
                      ?>
      <tr>
          <td> <?php
                        echo $row['id'];
                        ?></td>
          <td><?php
                        echo $row['Name'];
                        ?></td>
          <td><?php
                        echo $row['LastName'];
                        ?></td>
          <td><?php
                        echo $row['ArrivalDate'];
                        ?></td>
          <td><?php
                        echo $row['DepartureDate'];
                        ?></td>
          <td><?php
                        echo $row['Guests'];
                        ?></td>
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
    </tr>
    </table>
    <?php
                        }
                          mysqli_close($conn);
                             ?>
    </div>
</body>

</html>