<?php
//sync the data
  ob_start();
  session_start();
  //connect to the database
  $timezone = date_default_timezone_set("Canada/Atlantic");

  $con = mysqli_connect("localhost", "root","","ripofftify");

  //failure to connect
  if(mysqli_connect_errno()){
    echo "Failed to connect: ".mysqli_connect_errno();
  }

 ?>
