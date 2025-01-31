<?php
    session_start();
    
    if(!isset($_SESSION['loggedin'])){
        header("Location:./login.php");
        exit;
    }
?>

<?php
    $room_id = $_GET["room_id"];

//database configuration
$db_host = "localhost";
$db_port = 3306;
$db_user = "root";
$db_psw = "";
$db_database = "hospital";

//create connection to database
$con = mysqli_connect ($db_host, $db_user, $db_psw, $db_database, $db_port);

//generate sql
$sql = "select * from roominfo where room_id=$room_id";

//get the result
$res = mysqli_query($con, $sql);

//check how many rows are there
if(mysqli_num_rows($res)>0) {
    
    //convert to an associative array
    $row = mysqli_fetch_assoc($res);
    $floor = $row["floor"];
    $roomtype = $row["roomtype"];
    $roomward = $row["roomward"];
    $status = $row["status"];
    $patientid = $row["patientid"]; 
    $patientname = $row["patientname"];
    $doctorid = $row["doctorid"];
    $checkindate = $row["checkindate"];
    $checkoutdate = $row["checkoutdate"];
}else{
    $floor = "";
    $roomtype = "";
    $roomward = "";
    $status = "";
    $patientid = "";
    $patientname = "";
    $doctorid = "";
    $checkindate = "";
    $checkoutdate = "";
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
<h1 class="header-title"> Edit Hospital Room Records </h1>   
<form class="registraion-form" action="roomupdateprocess.php" method="post">
        <p>floor: <input type="text" name="floor" id="floor" value="<?php echo $floor; ?>"/></p>
        
        <input type="hidden" name="room_id" value="<?php echo $room_id; ?>"/>
        
        <p>Room Type : <select name="roomtype">
            <option value="">--Select Room--</option>
            <option value="ward-bed">Ward bed</option>
                <?php if($row["roomtype"]=='ward-bed'){
                    echo "selected";
                }?>
            <option value="standard-room">Standard room</option>
            <?php if($row["roomtype"]=='standard-room'){
                    echo "selected";
                }?>
            <option value="a/c-room">A/C Room</option>
                <?php if($row["roomtype"]=='a/c-room'){
                    echo "selected";
                }?>
            <option value="semi-luxury-room">Semi-Luxury Room</option>
                <?php if($row["roomtype"]=='semi-luxury-room'){
                    echo "selected";
                }?>
            <option value="duluxe-panorama-room">Duluxe Panorama Room</option>
                <?php if($row["roomtype"]=='duluxe-panorama-room'){
                    echo "selected";
                }?>
            <option value="royal-room">Royal Room</option>
                <?php if($row["roomtype"]=='royal-room'){
                    echo "selected";
                }?>
            <option value="vip-room">VIP Room</option>
                <?php if($row["roomtype"]=='vip-room'){
                    echo "selected";
                }?>
        </select></p>
       
        <p>Room Ward : <select name="roomward">
            <option value="">--Select Ward--</option>
            <option value="Postnatal">Postnatal</option>
                <?php if($row["roomward"]=='Postnatal'){
                    echo "selected";
                }?>
            <option value="Pregnancy">Pregnancy</option>
                <?php if($row["roomward"]=='Pregnancy'){
                    echo "selected";
                }?>
            <option value="Critical Care">Critical Care</option>
                <?php if($row["roomward"]=='Critical Care'){
                    echo "selected";
                }?>
            <option value="Orthopaedic">Orthopaedic</option>
                <?php if($row["roomward"]=='Orthopaedic'){
                    echo "selected";
                }?>
            <option value="Psychiatric">Psychiatric</option>
                <?php if($row["roomward"]=='Psychiatric'){
                    echo "selected";
                }?>
            <option value="Accidents-And-Emergency">Accidents And Emergency</option>
                <?php if($row["roomward"]=='Accidents-And-Emergency'){
                    echo "selected";
                }?>
            <option value="Paediatric">Paediatric</option><br><br></p>
                <?php if($row["roomward"]=='Paediatric'){
                    echo "selected";
                }?>
        
        </select><br><br></p>

        <p>Status
            <input type="radio" name="status" value="occupied" 
            <?php if ($status=="occupied"){
                  echo "checked";
            } 
            ?>/> Occupied
            <input type="radio" name="status" value="available" 
            <?php if ($status=="available"){
                  echo "checked";
            } 
            ?>/> Available
        </p>

        <p>Patient ID: <input type="text" name="patientid" id="patientid" value="<?php echo $patientid; ?>" /></p>
        <p>Patient Name: <input type="text" name="patientname" id="patientname" value="<?php echo $patientname; ?>" /></p>
        <p>Doctor ID: <input type="text" name="doctorid" id="doctorid" value="<?php echo $doctorid; ?>" /></p>
        
        <p>Check in Date: <input type="date" name="checkindate" id="checkindate" value="<?php echo $checkindate; ?>" /></p>
        <p>Check out Date: <input type="date" name="checkoutdate" id="checkoutdate"  value="<?php echo $checkoutdate; ?>"/></p>


        <p><input type="submit" value="Register" /> <input type="reset" value="clear" /></p>
    </form>
</body> 
</html>

