<?php
session_start();
if (isset($_POST["submit"])){
    $pwd=$_POST["pwd"];

    $pwdhashed =$_SESSION["row"]["userPwd"];
    
    $checkpwd = password_verify($pwd,$pwdhashed);


    if ($checkpwd == false) {
        header("location: ../profile.php?error=wrongpwd");
        exit();
    }
    elseif ($checkpwd == true) {
        $_SESSION["admin"]=true;
        header("location: ../admin.php");
        exit();
    }

}