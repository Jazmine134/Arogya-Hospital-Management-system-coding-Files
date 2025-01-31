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
  font-size:1cm !important;}
</style>
<link type="text/css" rel="stylesheet" href="./styles.css"/>
<body>

<?php include 'navbar.php' ?>

  <div class="container">
    <h1>About Arogya Health Care hospital </h1>

		<div class="img-gallery-1">
		<image class="cls1" src ="images/hos1.jpg"/>
		<image class="cls1" src ="images/hos2.jpg"/>
		<image class="cls1" src ="images/hos3.jpg"/>
		<image class="cls1" src ="images/hos4.jpg"/>
		</div>
		<br><br>
		<p> Arogya Health Care hospital is an institution that is built, staffed, and equipped for the diagnosis of 
      diseases; for the treatment, both medical and surgical, of the sick and the injured; and for their 
      housing during this process. This modern health care center also often serves as a centre for investigation and 
      for teaching.</p>

    <p> To better serve the wide-ranging needs of the community, Arogya Health Care hospital has often
    developed outpatient facilities, as well as emergency, psychiatric, and rehabilitation services.
    In addition, we also provide outpatient care. we also have the facilities to provide diagnostics and 
    treatment services for patients who have specified medical conditions, both surgical and nonsurgical Patients can also arrive at the facility for short 
    appointments. They may also stay for treatment in surgical or medical units for part of a day or for a full 
    day, after which they are discharged for follow-up by a primary care health provider.</p>

    <p>Arogya Health Care Hospital was built for the betterment of the general public.</p>

		
		

	</body>

</html>



  </div>
  </body>
  </html>
