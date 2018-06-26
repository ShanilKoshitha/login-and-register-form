<?php
  if(isset($_POST['LoginButton'])){
    //Login
    $username = $_POST['usernameLogin'];
    $password = $_POST['userpasswordLogin'];

    $result = $account->login($username,$password);

    if($result == true){
      $_SESSION['userLoggedIn'] = $username;
      header("Location: index.php");
    }
  }
?>
