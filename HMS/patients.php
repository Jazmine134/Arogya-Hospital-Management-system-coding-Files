<?php
    session_start();
    
    if(!isset($_SESSION['loggedin'])){
        header("Location:./login.php");
        exit;
    }
?>

<?php

include('./navbar.php');
?>

<!DOCTYPE html>
<html>
    <head>
    <link type="text/css" rel="stylesheet" href="./styles.css"/>
</head>
<body>
<h2>Edit patient records</h2>

<?php
//database configuration
$db_host = "localhost";
$db_port = 3306;
$db_user = "root";
$db_psw = "";
$db_database = "hospital";

//create connection to database
$con = mysqli_connect ($db_host, $db_user, $db_psw, $db_database, $db_port);

$sql = "SELECT * FROM patientinfo";
$res = mysqli_query($con, $sql);
if(!$res){
    //query error
    die(mysqli_error($con));
}else{
    //no error
    //loop through each query
    echo "<table border ='1' cellspacing = '0'>";
    echo "<tr><th>Patient_ID</th><th>First Name</th><th>Last Name</th><th>DOB</th><th>Gender</th><th>Address</th><th>CheckInDate</th><th>CheckOutDate</th><th></th><th></th></tr>";
    while($row = mysqli_fetch_assoc($res)){
        $patient_id = $row["patient_id"];
        $firstname = $row["firstname"]; 
        $lastname = $row["lastname"];
        $dob = $row["dob"];
        $gender = $row["gender"];
        $address = $row["address"];
        $checkindate = $row["checkindate"];
        $checkoutdate = $row["checkoutdate"];

        
        
        echo "<tr>";
        echo "<td>$patient_id</td>";
        echo "<td>$firstname</td>";
        echo "<td>$lastname</td>";
        echo "<td>$dob</td>";
        echo "<td>$gender</td>";
        echo "<td>$address</td>";
        echo "<td>$checkindate</td>";
        echo "<td>$checkoutdate</td>";
        echo "<td><a href='patientupdate.php?patient_id=$patient_id'>edit</a></td>";
        echo "<td><a href='patientdelete.php?patient_id=$patient_id'>delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>

</body>
</html>
