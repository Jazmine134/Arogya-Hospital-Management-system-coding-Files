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



<h1 class="header-title"> Hospital Staff Information </h1>   
<form class="registraion-form" action="staffprocess.php" method="post">
        <p>First Name: <input type="text" name="fn" id="fn" /></p>
        <p>Last Name: <input type="text" name="ln" id="ln" /></p>
        <p>DOB: <input type="date" name="dob" id="dob" /></p>
        <p>Gender
            <input type="radio" name="gender" value="male" /> Male
            <input type="radio" name="gender" value="female" /> Female
        </p>
        <p>Address: <br /><textarea name="address" id="address" cols="25" rows="5"></textarea></p>
        <p>NIC : <input type="text" name="nic" id="nic" /></p>
        <p>Contact No: <input type="text" name="contactno" id="contactno" /></p>
        <p>Email : <input type="text" name="email" id="email" /></p>
        
        <p>Position : <select name="position">
            <option value="">--Select Position--</option>
            <option value="medicaldirector">Medical Director</option>
            <option value="headofdepartment">Head of Department</option>
            <option value="attendingphysican">Attending Physican</option>
            <option value="fellow">Fellow</option>
            <option value="cheifresident">Cheif Resident</option>
            <option value="seniorresident">Senior Resident</option>
            <option value="juniorresident">Junior Resident</option>
            <option value="intern">Intern</option>
            <option value="medicalstudent">Medical Student</option>
            <option value="surgeon">Surgeon</option>
        </select></p>
        
        <p>Department : <select name="department">
            <option value="">--Select Department--</option>
            <option value="Anesthetics">Anesthetics</option>
            <option value="BurnCenter">Burn Center</option>
            <option value="Cardiology">Cardiology</option>
            <option value="CriticalCare">Critical Care</option>
            <option value="GeneralSurgery">General Surgery</option>
            <option value="Gynecology">Gynecology</option>
            <option value="Haematology">Haematology</option>
            <option value="IntensiveCareUnit(ICU)">Intensive Care Unit(ICU)</option>
            <option value="Maternity">Maternity</option>
            <option value="Neurology">Neurology</option>
        </select><br><br></p>
        <p><input type="submit" value="Register" /> <input type="reset" value="clear" /></p>
    </form>

    <header>
        <ul class="staff-options">
            <li class="option-item"><a href="staffsearch.php">Search and Veiw all Records</a></li>
            <li class="option-item"><a href="staff.php">Edit and Delete Records</a></li>
        </ul>
    </header>

</body> 
</html>