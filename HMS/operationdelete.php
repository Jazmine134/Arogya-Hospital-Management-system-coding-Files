<?php
    $operation_id = $_GET["operation_id"];

//database configuration
$db_host = "localhost";
$db_port = 3306;
$db_user = "root";
$db_psw = "";
$db_database = "hospital";

//create connection to database
$con = mysqli_connect ($db_host, $db_user, $db_psw, $db_database, $db_port);

//generate sql
$sql = "delete from operationinfo where operation_id=$operation_id";

//get the result
$res = mysqli_query($con, $sql);
header("location:operation.php");

?>