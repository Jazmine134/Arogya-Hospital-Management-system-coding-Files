<?php
    session_start();
    
    if(!isset($_SESSION['loggedin'])){
        header("Location:./login.php");
        exit;
    }
?>

<!DOCTYPE html>
<head>
    <title>Patient-Information</title>
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



<h1 class="header-title"> Patient Information </h1>   
<form class="registraion-form" action="patientprocess.php" method="post">
        <p>First Name: <input type="text" name="fn" id="fn" /></p>
        <p>Last Name: <input type="text" name="ln" id="ln" /></p>
        <p>DOB: <input type="date" name="dob" id="dob" /></p>
        <p>Gender
            <input type="radio" name="gender" value="male" /> Male
            <input type="radio" name="gender" value="female" /> Female
        </p>
        <p>Address: <br /><textarea name="address" id="address" cols="25" rows="5"></textarea></p>
        <p>Check in Date: <input type="date" name="checkindate" id="checkindate" /></p>
        <p>Check out Date: <input type="date" name="checkoutdate" id="checkoutdate" /></p>
        <p><input type="submit" value="Register" /> <input type="reset" value="clear" /></p>
    </form>

    <header>
        <ul class="patient-options">
            <li class="option-item"><a href="patientsearch.php">Search and Veiw all Records</a></li>
            <li class="option-item"><a href="patients.php">Edit and Delete Records</a></li>
        </ul>
    </header>

</body> 
</html>