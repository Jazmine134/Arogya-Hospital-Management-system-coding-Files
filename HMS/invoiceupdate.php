<?php
    session_start();
    
    if(!isset($_SESSION['loggedin'])){
        header("Location:./login.php");
        exit;
    }
?>

<?php
    $invoice_id = $_GET["invoice_id"];

//database configuration
$db_host = "localhost";
$db_port = 3306;
$db_user = "root";
$db_psw = "";
$db_database = "hospital";

//create connection to database
$con = mysqli_connect ($db_host, $db_user, $db_psw, $db_database, $db_port);

//generate sql
$sql = "select * from invoices where invoice_id=$invoice_id";

//get the result
$res = mysqli_query($con, $sql);

//check how many rows are there
if(mysqli_num_rows($res)>0) {
    
    //convert to an associative array
    $row = mysqli_fetch_assoc($res);
        $patient_id = $row['patient_id'];
        $patient_name = $row['patient_name'];
        $room_charges = $row['room_charges'];
        $doctor_charges = $row['doctor_charges'];
        $medication_charges = $row['medication_charges'];
        $lab_charges = $row['lab_charges'];
        $total = $row['total'];
}else{
    $patient_id = "";
    $patient_name = "";
    $room_charges =  "";
    $doctor_charges =  "";
    $medication_charges =  "";
    $lab_charges =  "";
    $total =  "";
}
?>

<!DOCTYPE html>
<head>
    <title>Registration-form</title>
    <style>
        .registraion-form {
            width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
        .header-title{
            text-align: center;
            color: red;
        }
    </style>
</head>
<link type="text/css" rel="stylesheet" href="./styles.css"/>

<body>
<h1 class="header-title"> Patient Invoice </h1>   
<form class="registraion-form" action="invoiceupdateprocess.php" method="post">
        <p>Patient Id: <input type="text" name="patient_Id" id="patient_id" value="<?php echo $patient_id; ?>"/></p>
        <p>Patient Name: <input type="text" name="patient_name" id="patient_name" value="<?php echo $patient_name; ?>"/></p>
        <p>Room Charges: <input type="int" name="room_charges" id="room_charges" value="<?php echo $room_charges; ?>"/></p>
        <p>Doctor's charges: <input type="int" name="doctor_charges" id="doctor_charges" value="<?php echo $doctor_charges; ?>"/></p>
        <p>Medication Charges: <input type="int" name="medication_charges" id="medication_charges" value="<?php echo $medication_charges; ?>"/></p>
        <p>Lab Charges: <input type="int" name="lab_charges" id="lab_charges" value="<?php echo $lab_charges; ?>" /></p>
        <p>Total: <input type="int" name="total" id="total" value="<?php echo $total; ?>"/></p>
        <input type="hidden" name="invoice_id" value="<?php echo $invoice_id; ?>"/>
        <p><input type="submit" value="Register" /> <input type="reset" value="clear" /></p>
    </form>
</body> 
</html>