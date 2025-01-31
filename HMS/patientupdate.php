<?php
    session_start();
    
    if(!isset($_SESSION['loggedin'])){
        header("Location:./login.php");
        exit;
    }
?>

<?php
    $patient_id = $_GET["patient_id"];

//database configuration
$db_host = "localhost";
$db_port = 3306;
$db_user = "root";
$db_psw = "";
$db_database = "hospital";

//create connection to database
$con = mysqli_connect ($db_host, $db_user, $db_psw, $db_database, $db_port);

//generate sql
$sql = "select * from patientinfo where patient_id=$patient_id";

//get the result
$res = mysqli_query($con, $sql);

//check how many rows are there
if(mysqli_num_rows($res)>0) {
    
    //convert to an associative array
    $row = mysqli_fetch_assoc($res);
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $dob = $row["dob"];
    $gender = $row["gender"];
    $address = $row["address"];
    $checkindate = $row["checkindate"];
    $checkoutdate = $row["checkoutdate"];
}else{
    $firstname = "";
    $lastname = "";
    $dob = "";
    $gender = "";
    $address = "";
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
<?php
    include('./navbar.php');
    ?>

<body>
<h1 class="header-title"> Edit Patient Information </h1>   
<form class="registraion-form" action="patientupdateprocess.php" method="post">
        <p>First Name: <input type="text" name="fn" id="fn" value="<?php echo $firstname; ?>"/></p>
        <p>Last Name: <input type="text" name="ln" id="ln" value="<?php echo $lastname; ?>"  /></p>
        <p>DOB: <input type="date" name="dob" id="dob" value="<?php echo $dob; ?>" /></p>
        <p>Gender
            <input type="radio" name="gender" value="male" 
            <?php if ($gender=="male"){
                  echo "checked";
            } 
            ?>/> Male

            <input type="radio" name="gender" value="female" 
            <?php if ($gender=="female"){
                  echo "checked";
            } 
            ?>/> Female
        </p>
        <input type="hidden" name="patient_id" value="<?php echo $patient_id; ?>"/>
        <p>Address: <br /><textarea name="address" id="address" cols="25" rows="5">
           value="<?php echo $address; ?>"</textarea></p>
        <p>Check in Date: <input type="date" name="checkindate" id="checkindate" value="<?php echo $checkindate; ?>" /></p>/></p>
        <p>Check out Date: <input type="date" name="checkoutdate" id="checkoutdate" value="<?php echo $checkoutdate; ?>" /></p>/></p>
        <p><input type="submit" value="Register" /> <input type="reset" value="clear" /></p>
    </form>
</body> 
</html>

