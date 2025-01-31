<?php
    session_start();
    
    if(!isset($_SESSION['loggedin'])){
        header("Location:./login.php");
        exit;
    }

    $n1="";
    $n2="";
    $n3="";
    $n4="";
    $r="";

    if(isset($_POST["S1"])){
    $n1=$_POST["room_charges"];
    $n2=$_POST["doctor_charges"];
    $n3=$_POST["medication_charges"];
    $n4=$_POST["lab_charges"];
    $r=$n1+$n2+$n3+$n4;
}
?>

<!DOCTYPE html>
<head>
    <title>Create Hospital Invoice</title>
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
        .formal {
        padding: 10px;
        text-align: right;
        background-color: #f2f2f2;
        position: relative;}
      
        .container {
        padding: 10px;
        text-align: right;
        background-color: #f2f2f2;
        position: relative;
        
        }
        
    </style>
    <link type="text/css" rel="stylesheet" href="./styles.css"/>
</head>

<body>
    <?php
    include('./navbar.php');
?>

<h1 class="header-title"> Patient Invoice </h1>   
<form class="registraion-form" action="invoiceprocess.php" method="post">
        <p>Patient Id: <input type="text" name="patient_id" id="patient_id" /></p>
        <p>Patient Name: <input type="text" name="patient_name" id="patient_name" /></p>
        <p>Room Charges: <input type="int" name="room_charges" id="room_charges" /></p>
        <p>Doctor's charges: <input type="int" name="doctor_charges" id="doctor_charges" /></p>
        <p>Medication Charges: <input type="int" name="medication_charges" id="medication_charges" /></p>
        <p>Lab Charges: <input type="int" name="lab_charges" id="lab_charges" /></p>
        <p>Total: <input type="int" name="total" id="total" /></p>
        <p><input type="submit" value="Register" /> <input type="reset" value="clear" /></p>
    </form>
</form>
<div class="container">    
<form Name="Formal" Method="Post" Action="">
        <p>Room Charges: <input type="text" name="room_charges" id="room_charges" value="<?php echo($n1);?>"/></p>
        <p>Doctor's charges: <input type="text" name="doctor_charges" id="doctor_charges" value="<?php echo($n2);?>"/></p>
        <p>Medication Charges: <input type="text" name="medication_charges" id="medication_charges" value="<?php echo($n3);?>"/></p>
        <p>Lab Charges: <input type="text" name="lab_charges" id="lab_charges" value="<?php echo($n4);?>"/></p>
        <p>Total: <input type="text" name="total" id="total" value="<?php echo($r);?>"/></p>
        <p><input Name="S1" type="submit" value="Sum" /> 
    </form>
        </div>

    <header>
        <ul class="invoice-options">
            <li class="option-item"><a href="invoicesearch.php">Search and Veiw all Records</a></li>
            <li class="option-item"><a href="invoice.php">Edit and Delete Records</a></li>
            
        </ul>
    </header>

</body> 
</html>

