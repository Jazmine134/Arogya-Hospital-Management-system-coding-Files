<?php
    session_start();
    
    if(!isset($_SESSION['loggedin'])){
        header("Location:./login.php");
        exit;
    }
?>

<!DOCTYPE html>
<head>
    <title>Hospital Staff Information</title>
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
    <link type="text/css" rel="stylesheet" href="./styles.css"/>
</head>

<body>
    <?php
    include('./navbar.php');
    ?>



<h1 class="header-title"> Hospital Operation Theatre Information </h1>   
<form class="registraion-form" action="operationprocess.php" method="post">

        <p>Operation Theatre : <select name="operationtheatre">
            <option value="">--Select Room--</option>
            <option value="Modular-OT">Modular OT</option>
            <option value="Orthopaedic-OT">Orthopaedic OT</option>
            <option value="General Surgery-OT">General Surgery OT</option>
            <option value="Head & Neck-OT">Head & Neck OT</option>
            <option value="Endoscopy-OT">Endoscopy OT(1)</option>
            <option value="Endoscopy-OT">Endoscopy OT(2)</option>
            <option value="Emergency-OT">Emergency OT</option>
        </select></p>
        <p>Status
            <input type="radio" name="status" value="occupied" /> occupied
            <input type="radio" name="status" value="available" /> available
        </p>
        <p>Operation Details: <br /><textarea name="operationdetails" id="operationdetails" cols="25" rows="5"></textarea></p>
        <p>Operation Date: <input type="date" name="operationdate" id="operationdate" /></p>
        <p>Operation Time: <input type="time" name="operationtime" id="operationtime" /></p>
        
        <p>Doctor ID: <input type="text" name="doctorid" id="doctorid" /></p>
        <p>Doctor Name: <input type="text" name="doctorname" id="doctorname" /></p>
        <p>Patient ID: <input type="text" name="patientid" id="patientid" /></p>
        

        <p><input type="submit" value="Register" /> <input type="reset" value="clear" /></p>
    </form>

    <header>
        <ul class="operation-options">
            <li class="option-item"><a href="operationsearch.php">Search and Veiw all Records</a></li>
            <li class="option-item"><a href="operation.php">Edit and Delete Records</a></li>
        </ul>
    </header>

</body> 
</html>