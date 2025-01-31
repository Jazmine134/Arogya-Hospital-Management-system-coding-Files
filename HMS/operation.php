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
<h2>Edit Operation Theatre records</h2>

<?php
//database configuration
$db_host = "localhost";
$db_port = 3306;
$db_user = "root";
$db_psw = "";
$db_database = "hospital";

//create connection to database
$con = mysqli_connect ($db_host, $db_user, $db_psw, $db_database, $db_port);

$sql = "SELECT * FROM operationinfo";
$res = mysqli_query($con, $sql);
if(!$res){
    //query error
    die(mysqli_error($con));
}else{
    //no error
    //loop through each query
    echo "<table border ='1' cellspacing = '0'>";
    echo "<tr><th>Operation_ID</th><th>operationtheatre</th><th>status</th><th>operationdetails</th><th>operationdate</th><th>operationtime</th><th>doctorid</th><th>doctorname</th><th>patientid</th><th></th><th></th></tr>";
    while($row = mysqli_fetch_assoc($res)){
        $operation_id = $row["operation_id"];
        $operationtheatre = $row["operationtheatre"]; 
        $status = $row["status"];
        $operationdetails = $row["operationdetails"];
        $operationdate = $row["operationdate"];
        $operationtime = $row["operationtime"];
        $doctorid = $row["doctorid"];
        $doctorname = $row["doctorname"];
        $patientid = $row["patientid"];

        
        
        echo "<tr>";
        echo "<td>$operation_id</td>";
        echo "<td>$operationtheatre</td>";
        echo "<td>$status</td>";
        echo "<td>$operationdetails</td>";
        echo "<td>$operationdate</td>";
        echo "<td>$operationtime</td>";
        echo "<td>$doctorid</td>";
        echo "<td>$doctorname</td>";
        echo "<td>$patientid</td>";
        echo "<td><a href='operationupdate.php?operation_id=$operation_id'>edit</a></td>";
        echo "<td><a href='operationdelete.php?operation_id=$operation_id'>delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>

</body>
</html>