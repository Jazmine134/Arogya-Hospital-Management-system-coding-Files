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
<h2>Edit Invoice</h2>

<?php
//database configuration
$db_host = "localhost";
$db_port = 3306;
$db_user = "root";
$db_psw = "";
$db_database = "hospital";

//create connection to database
$con = mysqli_connect ($db_host, $db_user, $db_psw, $db_database, $db_port);

$sql = "SELECT * FROM invoices";
$res = mysqli_query($con, $sql);
if(!$res){
    //query error
    die(mysqli_error($con));
}else{
    //no error, students are found
    //loop through each query
    echo "<table border ='1' cellspacing = '0'>";
    echo "<tr><th>invoice_id</th><th>patient_id</th><th>patient_name</th><th>room_charges</th><th>doctor_charges</th><th>medication_charges</th><th>lab_charges</th><th>total</th><th></th><th></th></tr>";
    while($row = mysqli_fetch_assoc($res)){
        $invoice_id = $row['invoice_id'];
        $patient_id = $row['patient_id'];
        $patient_name = $row['patient_name'];
        $room_charges = $row['room_charges'];
        $doctor_charges = $row['doctor_charges'];
        $medication_charges = $row['medication_charges'];
        $lab_charges = $row['lab_charges'];
        $total = $row['total'];

        //if we make the table dont need this - echo $id," ",$firstname," ",$lastname," ",$dob," ",$gender," ",$description," ","<br/>";
        
        echo "<tr>";
        echo "<td>$invoice_id</td>";
        echo "<td>$patient_id</td>";
        echo "<td>$patient_name</td>";
        echo "<td>$room_charges</td>";
        echo "<td>$doctor_charges</td>";
        echo "<td>$medication_charges</td>";
        echo "<td>$lab_charges</td>";
        echo "<td>$total</td>";
        echo "<td><a href='invoiceupdate.php?invoice_id=$invoice_id'>edit</a></td>";
        echo "<td><a href='invoicedelete.php?invoice_id=$invoice_id'>delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>

</body>
</html>