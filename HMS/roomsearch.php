<?php
    session_start();
    
    if(!isset($_SESSION['loggedin'])){
        header("Location:./login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html>
    <head>
    <link type="text/css" rel="stylesheet" href="./styles.css"/>
</head>


<body>
    <?php
    include('./navbar.php');
    ?>
<h2>Search Hospital Room Records</h2>
<form method="GET" action="roomsearch.php">
    <p>
    <input autofocus type="text" Name="search" placeholder="Enter text here"/>
    <input type="submit" value="Search" name="btn"/>
    </p>
</form>

 <?php

//database configuration
$db_host = "localhost";
$db_port = 3306;
$db_user = "root";
$db_psw = "";
$db_database = "hospital";

//create connection to database
$con = mysqli_connect ($db_host, $db_user, $db_psw, $db_database, $db_port);

//get the search term
 if (isset($_GET['search'])) {
    $search = $_GET['search'];
} else {
    $search = "";
}

$sql = "SELECT * FROM roominfo WHERE room_id like '%$search%' or floor like '%$search%'";

$res = mysqli_query($con, $sql);
if(!$res){
    //query error
    die(mysqli_error($con));
}else{
    //no error
    //loop through each query
    echo "<table border ='1' cellspacing = '0'>";
    echo "<tr><th>Room_ID</th><th>floor</th><th>roomtype</th><th>roomward</th><th>status</th><th>patientid</th><th>patientname</th><th>doctorname</th><th>checkindate</th><th>checkindate</th><th></th><th></th></tr>";
    while($row = mysqli_fetch_assoc($res)){
        $room_id = $row["room_id"];
        $floor = $row["floor"];
        $roomtype = $row["roomtype"]; 
        $roomward = $row["roomward"];
        $status = $row["status"];
        $patientid = $row["patientid"]; 
        $patientname = $row["patientname"];
        $doctorid = $row["doctorid"];
        $checkindate = $row["checkindate"];
        $checkoutdate = $row["checkoutdate"];

       
        
        echo "<tr>";
        echo "<td>$room_id</td>";
        echo "<td>$floor</td>";
        echo "<td>$roomtype</td>";
        echo "<td>$roomward</td>";
        echo "<td>$status</td>";
        echo "<td>$patientid</td>";
        echo "<td>$patientname</td>";
        echo "<td>$doctorid</td>";
        echo "<td>$checkindate</td>";
        echo "<td>$checkoutdate</td>";
        echo "<td><a href='roomupdate.php?room_id=$room_id'>edit</a></td>";
        echo "<td><a href='roomdelete.php?room_id=$room_id'>delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
</body>
</html>