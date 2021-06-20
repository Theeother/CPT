<?php
session_start();

if (isset($_POST["submit"])){
    $try = $_POST["submission"];
    $probId=$_GET["probId"];

    require_once 'dbh_inc.php';
    require_once 'functions_inc.php';

    $sql="SELECT * from inoutprob where probId = ? and userId = ?;";
    

    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        die("<pre>Prepare failed:\n".mysqli_error($conn)."\n$sql</pre>");
    exit();
    }

    mysqli_stmt_bind_param($stmt, "is", $probId, $_SESSION["userId"]);

    mysqli_stmt_execute($stmt);

    $result=mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    $checkanswer = password_verify($try,$row["outRes"]);
    if ($checkanswer === true){
        $sql="INSERT INTO solved (userId,probId,answer) VALUES (?,?,?);";
        $stmt=mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt, "iis",$_SESSION["userId"],$probId,$try);
        mysqli_stmt_execute($stmt);
        header("location: ../prob_temp.php?try=success&probId=$probId");
        exit();
    }
    else {
        header("location: ../prob_temp.php?try=failed&probId=$probId");
        exit();
    }


}
else {
    header("location: ../prob_temp.php");
        exit();
}