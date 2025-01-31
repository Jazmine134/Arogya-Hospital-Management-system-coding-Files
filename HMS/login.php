<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //statements to execute if the request method is post

    $uname = $_POST["uname"] ?? "";
    $psw = $_POST["psw"] ?? "";



    //database configuration
    $db_host = "localhost";
    $db_port = 3306;
    $db_user = "root";
    $db_psw = "";
    $db_databse = "hospital";

    //create connection to database
    $con = mysqli_connect(
        $db_host,
        $db_user,
        $db_psw,
        $db_databse,
        $db_port
    );

    $sql = "select * from users where uname='$uname'";

    $res = mysqli_query($con, $sql);

    if(mysqli_num_rows($res)>0){
        //entry found
        $row = mysqli_fetch_assoc($res);
        $psw_fromdb = $row['psw'];

        if($psw == $psw_fromdb){
            //login success
            $_SESSION['loggedin'] = true;

            header("Location:index.php");
            exit;
        }
    } 
    
    header("Location:login.php");
} else {

    //statements to execute if the request method is get
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Registration</title>
        <style>
            .registration-form {
                width: 600px;
                height: 300px;
                margin-left: auto;
                margin-right: auto;
                background-color: #f2f2f2;
                position: relative;
                text-align: center;
            }

            .header-title {
                text-align: center;
                color: blue;
                padding: 10px;
            }
        </style>
    </head>

    <body>
        <div class="background-image"></div>
        <h1 class="header-title">Login to Arogya </h1>
        <form class="registration-form" action="#" method="post">
            <br><br><br>
            <br>
            <p>User Name: <input type="text" name="uname" id="uname" /></p>
            <p>Password: <input type="password" name="psw" id="psw" /></p>
            <p><input type="submit" value="Login" /> <input type="reset" value="Clear" /></p>
        </form>
    </body>

    </html>
<?php

}

?>