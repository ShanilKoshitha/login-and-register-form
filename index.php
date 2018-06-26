<?php
  include("includes/config.php");
  if(isset($_SESSION['userLoggedIn'])){
    $userisLoggedIn = $_SESSION['userLoggedIn'];
  }
  else{
    header("Location: register.php");
  }

 ?>


<html>
<head>
  <title>Welcome to Ripofftify</title>
</head>
<body>
  Hello!~
</body>
</html>
