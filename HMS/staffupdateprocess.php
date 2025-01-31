<?php
    $staff_id = $_POST["staff_id"];

//validation 1 - Leave feild empty 
$first_name = $_POST["fn"] ?? "";
$last_name = $_POST["ln"] ?? "";
$gender = $_POST["gender"] ?? "";
$address = $_POST["address"] ?? "";
$dob = $_POST["dob"] ?? "";
$nic = $_POST["nic"] ?? "";
$contact_no = $_POST["contactno"] ?? "";
$email = $_POST["email"] ?? "";
$position = $_POST["position"] ?? "";
$department = $_POST["department"] ?? "";

//validation 1 - feild should have more than 10 characters
if(strlen($first_name)<3){
    die("Name should be more than 10 characters");
}

$first_name = $_POST["fn"];
$last_name = $_POST["ln"];
$dob = $_POST["dob"];
$gender = $_POST["gender"];
$address = $_POST["address"];
$nic = $_POST["nic"];
$contact_no = $_POST["contactno"];
$email = $_POST["email"] ;
$position = $_POST["position"];
$department = $_POST["department"];


//database configuration
$db_host = "localhost";
$db_port = 3306;
$db_user = "root";
$db_psw = "";
$db_database = "hospital";

//create connection to database
$con = mysqli_connect ($db_host, $db_user, $db_psw, $db_database, $db_port);

//generate sql
$sql = "UPDATE staffinfo SET firstname = '$first_name', 
lastname = '$last_name',  dob = '$dob', gender = '$gender', address = '$address', nic = '$nic', contactno = '$contact_no', email = '$email', position = '$position', department = '$department',
where staff_id='$staff_id' ";

//send sql to database management system
$res = mysqli_query($con,$sql);
if($res){
    //redirect back to registration form
    header("location:staff.php");
}else{
    $errors = mysqli_error($con);
    die($errors);
}
?>
