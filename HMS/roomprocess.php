<?php

//validation 1 - Leave feild empty 
$floor = $_POST["floor"] ?? "";
$roomtype = $_POST["roomtype"] ?? "";
$roomward = $_POST["roomward"] ?? "";
$status = $_POST["status"]?? "";
$patientid = $_POST["patientid"]?? ""; 
$patientname = $_POST["patientname"]?? "";
$doctorid = $_POST["doctorid"]?? "";
$checkindate = $_POST["checkindate"]?? "";
$checkoutdate = $_POST["checkoutdate"]?? "";



$floor = $_POST["floor"];
$roomtype = $_POST["roomtype"];
$roomward = $_POST["roomward"];
$status = $_POST["status"];
$patientid = $_POST["patientid"]; 
$patientname = $_POST["patientname"];
$doctorid = $_POST["doctorid"];
$checkindate = $_POST["checkindate"];
$checkoutdate = $_POST["checkoutdate"];



//database configuration
$db_host = "localhost";
$db_port = 3306;
$db_user = "root";
$db_psw = "";
$db_database = "hospital";

//create connection to database
$con = mysqli_connect ($db_host, $db_user, $db_psw, $db_database, $db_port);

//generate sql
$sql = "INSERT INTO roominfo( floor, roomtype, roomward, status, patientid, patientname, doctorid, checkindate,checkoutdate) 
        VALUES ('$floor','$roomtype', '$roomward', '$status', '$patientid', '$patientname', '$doctorid', '$checkindate', '$checkoutdate');";

//send sql to database management system
$res = mysqli_query($con,$sql);
if($res){
    //redirect back to registration form
    header("location:roominfo.php");
}else{
    $errors = mysqli_error($con);
    die($errors);
}
?>