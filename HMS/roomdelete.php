<?php
    $room_id = $_GET["room_id"];

//database configuration
$db_host = "localhost";
$db_port = 3306;
$db_user = "root";
$db_psw = "";
$db_database = "hospital";

//create connection to database
$con = mysqli_connect ($db_host, $db_user, $db_psw, $db_database, $db_port);

//generate sql
$sql = "delete from roominfo where room_id=$room_id";

//get the result
$res = mysqli_query($con, $sql);
header("location:room.php");

?>