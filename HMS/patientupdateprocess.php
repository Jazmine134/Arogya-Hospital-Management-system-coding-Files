<?php
    $patient_id = $_POST["patient_id"];

//validation 1 - Leave feild empty 
$first_name = $_POST["fn"] ?? "";
$last_name = $_POST["ln"] ?? "";
$gender = $_POST["gender"] ?? "";
$address = $_POST["address"] ?? "";
$dob = $_POST["dob"] ?? "";
$checkindate = $_POST["checkindate"]?? "";
$checkoutdate = $_POST["checkoutdate"]?? "";

//validation 1 - feild should have more than 3 characters
if(strlen($first_name)<3){
    die("Name should be more than 3 characters");
}

$first_name = $_POST["fn"];
$last_name = $_POST["ln"];
$dob = $_POST["dob"];
$gender = $_POST["gender"];
$address = $_POST["address"];
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
$sql = "UPDATE patientinfo SET firstname = '$first_name', 
lastname = '$last_name',  dob = '$dob', gender = '$gender', address = '$address', checkindate = '$checkindate', checkoutdate = '$checkoutdate'
where patient_id='$patient_id' ";

//send sql to database management system
$res = mysqli_query($con,$sql);
if($res){
    //redirect back to registration form
    header("location:patients.php");
}else{
    $errors = mysqli_error($con);
    die($errors);
}
?>
