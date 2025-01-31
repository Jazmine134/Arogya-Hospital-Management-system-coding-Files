<?php
    session_start();
    
    if(!isset($_SESSION['loggedin'])){
        header("Location:./login.php");
        exit;
    }
?>

<!DOCTYPE html>
<head>
  <title>Navbar</title>
</head>
  <style>
    h1{text-align:center;
    font-size:1cm !important;
    }
  </style>
<link type="text/css" rel="stylesheet" href="./styles.css"/>

<body>
  <?php include 'navbar.php' ?>
  
    <div class="container">
      <h1>Welcome to Arogya Hospital Management system</h1>
    </div>

    <div style="margin-top: 50px"></div>

    <div class="functions">
      <div class="col-md-16">
        <div class="row">
          <div class="col-md-2 mx-1 shadow">
              <img src="images/patientinfo.jpg" style="width: 100%; height: 135px;">
              <a href='patientinfo.php'>
                  <button class="btn btn-success my-3" styles="margin-left: 30%;">Patient Information</button>
              </a>
          </div>
          <div class="col-md-2 mx-1 shadow">
              <img src="images/rooms.png" style="width: 100%;">
              <a href='roominfo.php'>
                  <button class="btn btn-success my-3" styles="margin-left: 70%;">Room Availability</button>
              </a>
          </div>
          <div class="col-md-2 mx-1 shadow">
              <img src="images/doctors.jpg" style="width: 100%;">
              <a href='staffinfo.php'>
                  <button class="btn btn-success my-3" styles="margin-left: 70%;">Hospital Staff</button>
              </a>
          </div>
          <div class="col-md-2 mx-1 shadow">
              <img src="images/operatingroom.jpg" style="width: 100%;height: 135px;">
              <a href='operationinfo.php'>
                  <button class="btn btn-success my-3" styles="margin-left: 70%;">Opperating Theatres</button>
              </a>
          </div>
          <div class="col-md-2 mx-1 shadow">
              <img src="images/invoices.jpg" style="width: 100%;height: 135px;">
              <a href='invoiceinfo.php'>
                  <button class="btn btn-success my-3" styles="margin-left: 70%;">Invoices</button>
              </a>
          </div>



  </body>
  </html>
