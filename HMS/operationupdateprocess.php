<?php
    $operation_id = $_POST["operation_id"];

//validation 1 - Leave feild empty 
$operationtheatre = $_POST["operationtheatre"]?? ""; 
$status = $_POST["status"]?? ""; 
$operationdetails = $_POST["operationdetails"]?? ""; 
$operationdate = $_POST["operationdate"]?? ""; 
$operationtime = $_POST["operationtime"]?? ""; 
$doctorid = $_POST["doctorid"]?? ""; 
$doctorname = $_POST["doctorname"]?? ""; 
$patientid = $_POST["patientid"]?? ""; 


$operationtheatre = $_POST["operationtheatre"]; 
$status = $_POST["status"]; 
$operationdetails = $_POST["operationdetails"]; 
$operationdate = $_POST["operationdate"]; 
$operationtime = $_POST["operationtime"]; 
$doctorid = $_POST["doctorid"]; 
$doctorname = $_POST["doctorname"]; 
$patientid = $_POST["patientid"]; 


//database configuration
$db_host = "localhost";
$db_port = 3306;
$db_user = "root";
$db_psw = "";
$db_database = "hospital";

//create connection to database
$con = mysqli_connect ($db_host, $db_user, $db_psw, $db_database, $db_port);

//generate sql
$sql = "UPDATE operationinfo SET operationtheatre = '$operationtheatre', 
status = '$status',  operationdetails = '$operationdetails', operationdate = '$operationdate', 
operationtime = '$operationtime', doctorid = '$doctorid', doctorname = '$doctorname', patientid = '$patientid'
where operation_id='$operation_id' ";

//send sql to database management system
$res = mysqli_query($con,$sql);
if($res){
    //redirect back to registration form
    header("location:operation.php");
}else{
    $errors = mysqli_error($con);
    die($errors);
}
?>