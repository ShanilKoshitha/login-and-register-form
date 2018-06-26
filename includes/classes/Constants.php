<?php
//error messages for the register page
class Constants{
  public static $usernameisInvalid = "Your username must be between 5 and 25 characters";
  public static $usernameTaken = "Username is not available";
  public static $firstnameisInvalid = "Your firstname must be between 2 and 25 characters";
  public static $lastnameisInvalid = "Your lastname must be between 2 and 25 characters";
  public static $emailisInvalid = "Email is invalid";
  public static $emailmatchInvalid = "Your emails don't match";
  public static $emailTaken = "Email is already in use";
  public static $passwordmatchInvalid = "Your passwords don't match";
  public static $passwordisInvalid = "Your password can only contain letters and numbers";
  public static $passwordlengthInvalid = "Your password must be between 6 to 30 characters long";
  public static $loginfailed = "Your username or password is incorrect";
}
?>
