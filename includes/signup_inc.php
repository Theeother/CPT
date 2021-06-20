<?php 

if (isset($_POST["submit"])){
    $firstname=$_POST["firstname"];
    $lastname=$_POST["lastname"];
    $email=$_POST["email"];
    $uid=$_POST["uid"];
    $pwd=$_POST["pwd"];
    $pwdrepeat=$_POST["pwdrepeat"];

    require_once 'dbh_inc.php';
    require_once 'functions_inc.php';


    if (emptyInputSignup($firstname,$lastname,$email,$uid,$pwd,$pwdrepeat) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if (invalidUid($uid) !== false){
        header("location: ../signup.php?error=invaliduid");
        exit();
    }

    if (invalidEmail($email) !== false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($pwd,$pwdrepeat) !== false){
        header("location: ../signup.php?error=pwdnomatch");
        exit();
    }

    if (uidExist($conn,$uid,$email) !== false){
        header("location: ../signup.php?error=uidtaken");
        exit();
    }

    createUser($conn,$firstname,$lastname,$email,$uid,$pwd);

}
else{
    header("location: ../signup.php");
    exit();
}