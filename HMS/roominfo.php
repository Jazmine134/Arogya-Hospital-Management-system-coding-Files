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



<h1 class="header-title"> Hospital Room Information </h1>   
<form class="registraion-form" action="roomprocess.php" method="post">
        <p>Floor: <input type="text" name="floor" id="floor" /></p>
        
        <p>Room Type : <select name="roomtype">
            <option value="">--Select Room--</option>
            <option value="ward-bed">Ward bed</option>
            <option value="standard-room">Standard room</option>
            <option value="a/c-room">A/C Room</option>
            <option value="semi-luxury-room">Semi-Luxury Room</option>
            <option value="duluxe-panorama-room">Duluxe Panorama Room</option>
            <option value="royal-room">Royal Room</option>
            <option value="vip-room">VIP Room</option>
        </select></p>
       
        <p>Room Ward : <select name="roomward">
            <option value="">--Select Ward--</option>
            <option value="Postnatal">Postnatal</option>
            <option value="Pregnancy">Pregnancy</option>
            <option value="Critical Care">Critical Care</option>
            <option value="Orthopaedic">Orthopaedic</option>
            <option value="Psychiatric">Psychiatric</option>
            <option value="Accidents-And-Emergency">Accidents And Emergency</option>
            <option value="Paediatric">Paediatric</option></select></p>

        <p>Status
            <input type="radio" name="status" value="occupied" /> occupied
            <input type="radio" name="status" value="available" /> available
        </p>

        <p>Patient ID: <input type="text" name="patientid" id="patientid" /></p>
        <p>Patient Name: <input type="text" name="patientname" id="patientname" /></p>
        <p>Doctor ID: <input type="text" name="doctorid" id="doctorid" /></p>
        
        <p>Check in Date: <input type="date" name="checkindate" id="checkindate" /></p>
        <p>Check out Date: <input type="date" name="checkoutdate" id="checkoutdate" /></p>

        <p><input type="submit" value="Register" /> <input type="reset" value="clear" /></p>
    </form>

    <header>
        <ul class="room-options">
            <li class="option-item"><a href="roomsearch.php">Search and Veiw all Records</a></li>
            <li class="option-item"><a href="room.php">Edit and Delete Records</a></li>
        </ul>
    </header>

</body> 
</html>