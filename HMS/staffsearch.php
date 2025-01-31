<?php
    session_start();
    
    if(!isset($_SESSION['loggedin'])){
        header("Location:./login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html>
    <head>
    <link type="text/css" rel="stylesheet" href="./styles.css"/>
</head>


<body>
    <?php
    include('./navbar.php');
    ?>
<h2>Search Staff Records</h2>
<form method="GET" action="staffsearch.php">
    <p>
    <input autofocus type="text" Name="search" placeholder="Enter text here"/>
    <input type="submit" value="Search" name="btn"/>
    </p>
</form>

 <?php

//database configuration
$db_host = "localhost";
$db_port = 3306;
$db_user = "root";
$db_psw = "";
$db_database = "hospital";

//create connection to database
$con = mysqli_connect ($db_host, $db_user, $db_psw, $db_database, $db_port);

//get the search term
 if (isset($_GET['search'])) {
    $search = $_GET['search'];
} else {
    $search = "";
}

$sql = "SELECT * FROM staffinfo WHERE firstname like '%$search%' or lastname like '%$search%'";

$res = mysqli_query($con, $sql);
if(!$res){
    //query error
    die(mysqli_error($con));
}else{
    //no error
    //loop through each query
    echo "<table border ='1' cellspacing = '0'>";
    echo "<tr><th>Staff_ID</th><th>First Name</th><th>Last Name</th><th>DOB</th><th>Gender</th><th>Address</th><th>nic</th><th>Contact_no</th><th>Email</th><th>Position</th><th>Department</th><th></th><th></th></tr>";
    while($row = mysqli_fetch_assoc($res)){
        $staff_id = $row["staff_id"];
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

        
        
        echo "<tr>";
        echo "<td>$staff_id</td>";
        echo "<td>$firstname</td>";
        echo "<td>$lastname</td>";
        echo "<td>$dob</td>";
        echo "<td>$gender</td>";
        echo "<td>$address</td>";
        echo "<td>$nic</td>";
        echo "<td>$contact_no</td>";
        echo "<td>$email</td>";
        echo "<td>$position</td>";
        echo "<td>$department</td>";
        echo "<td><a href='staffupdate.php?staff_id=$staff_id'>edit</a></td>";
        echo "<td><a href='staffdelete.php?staff_id=$staff_id'>delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
</body>
</html>