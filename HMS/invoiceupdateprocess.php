<?php
    $invoice_id = $_POST["invoice_id"];

//validation 1 - Leave feild empty 

$patient_id = $_POST['patient_id']?? "";
$patient_name = $_POST['patient_name']?? "";
$room_charges = $_POST['room_charges']?? "";
$doctor_charges = $_POST['doctor_charges']?? "";
$medication_charges = $_POST['medication_charges']?? "";
$lab_charges = $_POST['lab_charges']?? "";
$total = $_POST['total']?? "";


$patient_id = $_POST['patient_id'];
$patient_name = $_POST['patient_name'];
$room_charges = $_POST['room_charges'];
$doctor_charges = $_POST['doctor_charges'];
$medication_charges = $_POST['medication_charges'];
$lab_charges = $_POST['lab_charges'];
$total = $_POST['total'];


//database configuration
$db_host = "localhost";
$db_port = 3306;
$db_user = "root";
$db_psw = "";
$db_database = "hospital";

//create connection to database
$con = mysqli_connect ($db_host, $db_user, $db_psw, $db_database, $db_port);

//generate sql
$sql = "UPDATE invoices SET  
patient_id = '$patient_id',  patient_name = '$patient_name', room_charges = '$room_charges', doctor_charges = '$doctor_charges', medication_charges = '$medication_charges', lab_charges = '$lab_charges', total = '$total'
where invoice_id='$invoice_id' ";

//send sql to database management system
$res = mysqli_query($con,$sql);
if($res){
    //redirect back to registration form
    header("location:invoice.php");
}else{
    $errors = mysqli_error($con);
    die($errors);
}
?>