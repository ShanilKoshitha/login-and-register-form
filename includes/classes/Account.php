<?php
    class Account{
      //This section of code takes the user input from the register page and cleans
      //the input and sends error messages back.
      //All the error constants are in the Constants.php file
      private $errorArray;
      private $con;

      //constructor
      public function __construct($con){
        $this->con = $con;
        $this->errorArray = array();
      }

      public function register($un,$fn,$ln,$em,$emc,$pwd,$pwdc){
        $this->checkUsername($un);
        $this->checkFirstName($fn);
        $this->checkLastName($ln);
        $this->checkEmail($em,$emc);
        $this->checkPassword($pwd,$pwdc);

        if(empty($this->errorArray)== true){
          //Insert into database
          return $this->insertUserDetails($un, $fn, $ln, $em, $pwd);
        }
        else{
          return false;
        }
      }
      public function login($un,$pw){
        $passwordEncrypt = md5($pw);

        $query = mysqli_query($this->con,"SELECT * FROM users WHERE username='$un' AND password='$passwordEncrypt'");

        if(mysqli_num_rows($query) ==1){
          return true;
        }
        else{
          array_push($this->errorArray, Constants::$loginfailed);
          return false;
        }
      }
      //get the error
      public function getError($err){
        if(!in_array($err, $this->errorArray)){
          $err = "";
        }
          return "<span class = 'errorMessage'>$err</span>";

      }
      //insert user details to the database
      private function insertUserDetails($un, $fn, $ln, $em, $pw){
        $encryptedPass = md5($pw);
        $profilePic ="assets/images/profile-pics/default-profile-pic.jpg";
        $date = date("Y-m-d");
        echo "INSERT INTO users VALUES('','$un','$fn','$ln','$em','$encrytedPass','$date','$profilePic')";
        $result = mysqli_query($this->con,"INSERT INTO users VALUES('','$un','$fn','$ln','$em','$encryptedPass','$date','$profilePic')");
        return $result;
      }
      //cehck for username errors
      private function checkUsername($un){

        if(strlen($un)>25 || strlen($un)<5){
          array_push($this->errorArray, Constants::$usernameisInvalid);
          return;
        }
        //check if username exists
        $checkUsernameQuery = mysqli_query($this->con,"SELECT username FROM users WHERE username = '$un'");
        if(mysqli_num_rows($checkUsernameQuery) !=0){
          array_push($this->errorArray, Constants::$usernameTaken);
          return;
        }

      }
      //check for firstname errors
      private function checkFirstName($fn){
        if(strlen($fn)>25 || strlen($fn)<2){
          array_push($this->errorArray, Constants::$firstnameisInvalid);
          return;
        }

      }
      //check the lastname errors
      private function checkLastName($ln){
        if(strlen($ln)>25 || strlen($ln)<2){
          array_push($this->errorArray, Constants::$lastnameisInvalid);
          return;
        }

      }
      //check for email errors
      private function checkEmail($em,$emc){
        if($em !=$emc){
          array_push($this->errorArray, Constants::$emailmatchInvalid);
          return;
        }
        if(!filter_var($em, FILTER_VALIDATE_EMAIL)){
          array_push($this->errorArray, Constants::$emailisInvalid);
          return;
        }
        //check if the email is used
        $checkemailQuery = mysqli_query($this->con,"SELECT email FROM users WHERE email = '$em'");
        if(mysqli_num_rows($checkemailQuery) !=0){
          array_push($this->errorArray, Constants::$emailTaken);
          return;
        }

      }

      private function checkPassword($pwd,$pwdc){

        if($pwd !=$pwdc){
          array_push($this->errorArray, Constants::$passwordmatchInvalid);
          return;
        }
        if(preg_match('/[^A-Za-z0-9]/',$pwd)){
          array_push($this->errorArray, Constants::$passwordisInvalid);
          return;
        }
        if(strlen($pwd)>30 || strlen($pwd) <6){
          array_push($this->errorArray, Constants::$passwordlengthInvalid);
        }

      }

    }
 ?>
