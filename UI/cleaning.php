<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cleaning Personal</title>
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
    <h1>Cleaning</h1>

    <table style="width:100%;">
      <tr>
          <th>Id Cleaning Personal </th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Room Responsible</th>
          <th>Departure Date</th>
      </tr>
      <tr>
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
    </tr>  
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    </table>
    <div style="margin-top: 10px; text-align: center;">
        <button>Save</button>
        <button>Close</button>
    </div>
</body>

</html>