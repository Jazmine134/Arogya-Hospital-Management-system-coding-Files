<?php
    session_start();
    
    if(!isset($_SESSION['loggedin'])){
        header("Location:./login.php");
        exit;
    }
?>

<?php
    $operation_id = $_GET["operation_id"];

//database configuration
$db_host = "localhost";
$db_port = 3306;
$db_user = "root";
$db_psw = "";
$db_database = "hospital";

//create connection to database
$con = mysqli_connect ($db_host, $db_user, $db_psw, $db_database, $db_port);

//generate sql
$sql = "select * from operationinfo where operation_id=$operation_id";

//get the result
$res = mysqli_query($con, $sql);

//check how many rows are there
if(mysqli_num_rows($res)>0) {
    
    //convert to an associative array
    $row = mysqli_fetch_assoc($res);
    $operation_id = $row["operation_id"];
    $operationtheatre = $row["operationtheatre"]; 
    $status = $row["status"];
    $operationdetails = $row["operationdetails"];
    $operationdate = $row["operationdate"];
    $operationtime = $row["operationtime"];
    $doctorid = $row["doctorid"];
    $doctorname = $row["doctorname"];
    $patientid = $row["patientid"];
}else{
    $operationtheatre = "";
    $status = "";
    $operationdetails = "";
    $operationdate = "";
    $operationtime = "";
    $doctorid = "";
    $doctorname = "";
    $patientid = "";
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
<h1 class="header-title"> Hospital Operation Theatre Information </h1>   
<form class="registraion-form" action="operationupdateprocess.php" method="post">
        
        <p>Operation Theatre : <select name="operationtheatre">
            <option value="">--Select Room--</option>
            <option value="Modular-OT">Modular OT</option>
                <?php if($row["operationtheatre"]=='Modular-OT'){
                    echo "selected";
                }?>
            <option value="Orthopaedic-OT">Orthopaedic OT</option>
                <?php if($row["operationtheatre"]=='Orthopaedic-OT'){
                    echo "selected";
                }?>
            <option value="General Surgery-OT">General Surgery OT</option>
                <?php if($row["operationtheatre"]=='General Surgery-OT'){
                    echo "selected";
                }?>
            <option value="Head & Neck-OT">Head & Neck OT</option>
                <?php if($row["operationtheatre"]=='Head & Neck-OT'){
                    echo "selected";
                }?>
            <option value="Endoscopy-OT(1)">Endoscopy OT(1)</option>
                <?php if($row["operationtheatre"]=='Endoscopy-OT(1)'){
                    echo "selected";
                }?>
            <option value="Endoscopy-OT(2)">Endoscopy OT(2)</option>
                <?php if($row["operationtheatre"]=='Endoscopy-OT(2)'){
                    echo "selected";
                }?>
            <option value="Emergency-OT">Emergency OT</option>
                <?php if($row["operationtheatre"]=='Emergency-OT'){
                    echo "selected";
                }?>
        </select></p>
        
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

        <p>Operation Details: <br /><textarea name="operationdetails" id="operationdetails" cols="25" rows="5">
           value="<?php echo $operationdetails; ?>"</textarea></p>
        
        <p>Operation Date: <input type="date" name="operationdate" id="operationdate" value="<?php echo $operationdate; ?>" /></p>
        <p>Operation Time: <input type="time" name="operationtime" id="operationtime" value="<?php echo $operationtime; ?>" /></p>
        
        <input type="hidden" name="operation_id" value="<?php echo $operation_id; ?>"/>
        
        <p>Doctor ID: <input type="text" name="doctorid" id="doctorid" value="<?php echo $doctorid; ?>"  /></p>
        <p>Doctor Name: <input type="text" name="doctorname" id="doctorname" value="<?php echo $doctorname; ?>"  /></p>
        <p>Patient ID: <input type="text" name="patientid" id="patientid" value="<?php echo $patientid; ?>" /></p>
                
        <p><input type="submit" value="Register" /> <input type="reset" value="clear" /></p>
    </form>
</body> 
</html>