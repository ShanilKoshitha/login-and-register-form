<?php
  include("includes/config.php");
  include("includes/classes/Account.php");
  include("includes/classes/Constants.php");

  $account = new Account($con);


  include("includes/handlers/register-handler.php");
  include("includes/handlers/login-handler.php");

  function getValue($value){
    if(isset($_POST[$value])){
      echo $_POST[$value];
    }
  }

?>

<html>
<head>
  <title>Welcome to Ripofftify</title>
</head>
<body>
    <div id = "inputContainer">
      <form id ="loginForm" action="register.php" method="POST">
        <h2>Login to your account</h2>
        <p>
          <?php echo $account->getError(Constants::$loginfailed);?>
          <label for="usernameLogin">Username  </label>
          <input id = "usernameLogin" name="usernameLogin" type="text" placeholder="eg:- peterGriffin" required>
        </p>
        <p>
          <label for="userpasswordLogin">Password  </label>
          <input id = "userpasswordLogin" name="userpasswordLogin" type="password" required>
        </p>
        <button type="submit" name="LoginButton">LOG IN</button>
      </form>


      <form id ="registerForm" action="register.php" method="POST">
        <h2>Create your free account</h2>
        <p>
          <?php echo $account->getError(Constants::$usernameisInvalid);?>
          <?php echo $account->getError(Constants::$usernameTaken);?>
          <label for="username">Username  </label>
          <input id = "username" name="username" type="text" value="<?php getValue('username') ?>"  required>
        </p>

        <p>
          <?php echo $account->getError(Constants::$firstnameisInvalid);?>
          <label for="firstname">Firstname  </label>
          <input id = "firstname" name="firstname" type="text"value="<?php getValue('firstname') ?>"   required>
        </p>

        <p>
          <?php echo $account->getError(Constants::$lastnameisInvalid);?>
          <label for="lastname">LastName  </label>
          <input id = "lastname" name="lastname" type="text"value="<?php getValue('lastname') ?>"   required>
        </p>

        <p>
          <?php echo $account->getError(Constants::$emailisInvalid);?>
          <?php echo $account->getError(Constants::$emailmatchInvalid);?>
          <?php echo $account->getError(Constants::$emailTaken);?>
          <label for="email">E-mail  </label>
          <input id = "email" name="email" type="email" value="<?php getValue('email') ?>"  required>
        </p>
        <p>

          <label for="emailConfirm">Confirm E-mail  </label>
          <input id = "emailConfirm" name="emailConfirm" type="email" value="<?php getValue('emailConfirm') ?>"  required>
        </p>

        <p>
          <?php echo $account->getError(Constants::$passwordmatchInvalid);?>
          <?php echo $account->getError(Constants::$passwordisInvalid);?>
          <?php echo $account->getError(Constants::$passwordlengthInvalid);?>
          <label for="userpassword">Password  </label>
          <input id = "userpassword" name="userpassword" type="password" required >
        </p>
        <p>
          <label for="userpasswordConfirm">Confirm Password  </label>
          <input id = "userpasswordConfirm" name="userpasswordConfirm" type="password"  required >
        </p>
        <button type="submit" name="RegisterButton">SIGN UP</button>
      </form>
    </div>
</body>
</html>
