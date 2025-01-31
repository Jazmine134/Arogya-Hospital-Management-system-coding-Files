<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Home</a>
    </div>
    <img src="images/logo.png" style="float: right; margin-right: 10px; width: 7%;" >
    <ul class="nav navbar-nav">
      <li><a href="about.php">About Us</a></li>
      <li><a href="contact.php">Contact us</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
    
  </div>
</nav>

<footer>
  <div class="footer">
    <p class="footer-text">Copyright &copy; <?php echo date("Y"); ?> Arogya Hospital Management Inc.</p>
    <p class="footer-text">All rights reserved.</p>
  </div>

</footer>

</body>
</html>