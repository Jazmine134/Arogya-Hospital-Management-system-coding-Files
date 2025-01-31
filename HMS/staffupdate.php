<?php
    session_start();
    
    if(!isset($_SESSION['loggedin'])){
        header("Location:./login.php");
        exit;
    }
?>

<?php
    $staff_id = $_GET["staff_id"];

//database configuration
$db_host = "localhost";
$db_port = 3306;
$db_user = "root";
$db_psw = "";
$db_database = "hospital";

//create connection to database
$con = mysqli_connect ($db_host, $db_user, $db_psw, $db_database, $db_port);

//generate sql
$sql = "select * from staffinfo where staff_id=$staff_id";

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
    $nic = $row["nic"];
    $contact_no = $row["contactno"];
    $email = $row["email"] ;
    $position = $row["position"];
    $department = $row["department"];
}else{
    $firstname = "";
    $lastname = "";
    $dob = "";
    $gender = "";
    $address = "";
    $nic = "";
    $contact_no = "";
    $email = "";
    $position = "";
    $department = "";
}
?>

<!DOCTYPE html>
<head>

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
<h1 class="header-title"> Hospital Staff Information </h1>   
<form class="registraion-form" action="staffupdateprocess.php" method="post">
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
        <input type="hidden" name="staff_id" value="<?php echo $staff_id; ?>"/>
        <p>Address: <br /><textarea name="address" id="address" cols="25" rows="5">
           value="<?php echo $address; ?>"</textarea></p>

        <p>NIC : <input type="text" name="nic" id="nic" value="<?php echo $nic; ?>"/></p>
        <p>Contact No: <input type="text" name="contactno" id="contactno" value="<?php echo $position; ?>"/></p>
        <p>Email : <input type="text" name="email" id="email" value="<?php echo $department; ?>"/></p>

        <p>Position : <select name="position">
            <option value="">--Select Position--</option>
            <option value="medicaldirector">Medical Director</option>
                <?php if($row["position"]=='medicaldirector'){
                    echo "selected";
                }?>
            <option value="headofdepartment">Head of Department</option>
                <?php if($row["position"]=='headofdepartment'){
                    echo "selected";
                }?>
            <option value="attendingphysican">Attending Physican</option>
                <?php if($row["position"]=='attendingphysican'){
                    echo "selected";
                }?>
            <option value="fellow">Fellow</option>
                <?php if($row["position"]=='fellow'){
                    echo "selected";
                }?>
            <option value="cheifresident">Cheif Resident</option>
                <?php if($row["position"]=='cheifresident'){
                    echo "selected";
                }?>
            <option value="seniorresident">Senior Resident</option>
                <?php if($row["position"]=='seniorresident'){
                    echo "selected";
                }?>
            <option value="juniorresident">Junior Resident</option>
                <?php if($row["position"]=='juniorresident'){
                    echo "selected";
                }?>
            <option value="intern">Intern</option>
                <?php if($row["position"]=='intern'){
                    echo "selected";
                }?>
            <option value="medicalstudent">Medical Student</option>
                <?php if($row["position"]=='medicalstudent'){
                    echo "selected";
                }?>
            <option value="surgeon">Surgeon</option>
                <?php if($row["position"]=='surgeon'){
                    echo "selected";
                }?>
        </select></p>
        
        <p>Department : <select name="department">
            <option value="">--Select Position--</option>
            <option value="Anesthetics">Anesthetics</option>
                <?php if($row["department"]=='Anesthetics'){
                    echo "selected";
                }?>
            <option value="BurnCenter">Burn Center</option>
                <?php if($row["department"]=='BurnCenter'){
                    echo "selected";
                }?>
            <option value="Cardiology">Cardiology</option>
                <?php if($row["department"]=='Cardiology'){
                    echo "selected";
                }?>
            <option value="CriticalCare">Critical Care</option>
                <?php if($row["department"]=='CriticalCare'){
                    echo "selected";
                }?>
            <option value="GeneralSurgery">General Surgery</option>
                <?php if($row["department"]=='GeneralSurgery'){
                    echo "selected";
                }?>
            <option value="Gynecology">Gynecology</option>
                <?php if($row["department"]=='Gynecology'){
                    echo "selected";
                }?>
            <option value="Haematology">Haematology</option>
                <?php if($row["department"]=='Haematology'){
                    echo "selected";
                }?>
            <option value="IntensiveCareUnit(ICU)">Intensive Care Unit(ICU)</option>
                <?php if($row["department"]=='IntensiveCareUnit(ICU)'){
                    echo "selected";
                }?>
            <option value="Maternity">Maternity</option>
                <?php if($row["department"]=='Maternity'){
                    echo "selected";
                }?>
            <option value="Neurology">Neurology</option>
                <?php if($row["department"]=='Neurology'){
                    echo "selected";
                }?>
        </select><br><br></p>

        <p><input type="submit" value="Register" /> <input type="reset" value="clear" /></p>
    </form>
</body> 
</html>


        
