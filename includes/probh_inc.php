<?php

    $probId=$_GET["probId"];
    require_once 'dbh_inc.php';
    require_once 'functions_inc.php';

    $sql="SELECT * from problems where probId = ?;";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
      header("location: probs.php?error=wrongID");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $probId);
    mysqli_stmt_execute($stmt);
    
    $resultData=mysqli_stmt_get_result($stmt);

    if (! $prob = mysqli_fetch_assoc($resultData) ) {
      header("location: probs.php?error=wrongID");
      exit();
    }
    mysqli_stmt_close($stmt);
?>