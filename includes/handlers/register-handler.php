<?php
function cleanUsername($inputText){
  $inputText = strip_tags($inputText);
  $inputText = str_replace(" ","",$inputText);
  return $inputText;
}

function cleanNames($inputText){
  $inputText = strip_tags($inputText);
  $inputText = str_replace(" ","", $inputText);
  $inputText = ucfirst(strtolower($inputText));
  return $inputText;
}

function cleanPassword($inputText){
  $inputText = strip_tags($inputText);
  return $inputText;
}

  if(isset($_POST['RegisterButton'])){
    //Register button was pressed
    $username = cleanUsername($_POST['username']);
    $firstname = cleanNames($_POST['firstname']);
    $lastname = cleanNames($_POST['lastname']);
    $email = cleanNames($_POST['email']);
    $emailConfirm = cleanNames($_POST['emailConfirm']);
    $password = cleanPassword($_POST['userpassword']);
    $passwordConfirm = cleanPassword($_POST['userpasswordConfirm']);

    $successful = $account->register($username,$firstname,$lastname,$email,$emailConfirm,$password,$passwordConfirm);

    if($successful == true){
      $_SESSION['userLoggedIn'] = $username;
      header("Location: index.php");
    }
  }
?>
