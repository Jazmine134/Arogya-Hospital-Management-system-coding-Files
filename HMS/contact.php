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

  .container {
      padding: 10px;
      text-align: center;
      background-color: #C0C0C0;
    }
    h1 {
      font-size: 36px;
      margin-bottom: 20px;
    }
    form {
      margin-top: 40px;
      display: inline-block;
      text-align: left;
    }
    input[type="text"], input[type="email"], textarea {
      padding: 10px;
      width: 100%;
      margin-bottom: 20px;
      font-size: 18px;
      box-sizing: border-box;
      border-radius: 5px;
    }
    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 18px;
    }
    input[type="submit"]:hover {
      background-color: #3e8e41;
    }
    

</style>
<link type="text/css" rel="stylesheet" href="./styles.css"/>
<body>

    <?php include 'navbar.php' ?>

  <div class="container">
    <h1>Contact Us</h1>
    <br>
    <p> General Line:  +94 (0) 155577111</p>
    <p> Chanelling Hotline:  +94 (0) 134567111</p>
    <p> Fax:  +94 (0) 134577111</p>
    <p> Email: Arogyahealth.lk </p>

    <div class="container">
    <form action="contactprocess.php" method="post">
      <input type="text" name="name" id="name" placeholder="Your Name" required>
      <input type="email" name="email" id="email" placeholder="Your Email" required>
      <textarea name="message" id="message" placeholder="Your Message" rows="5" required></textarea>
      <input type="submit" value="Send Message">
      
    </form>
  </div>
  </body>
  </html>


