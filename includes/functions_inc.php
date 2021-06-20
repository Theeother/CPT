<?php
/////////////////////////////////////////// Signup
function emptyInputSignup($firstname,$lastname,$email,$uid,$pwd,$pwdrepeat){
    $result=false;
    if (empty($firstname) or empty($lastname) or empty($email) or empty($uid) or empty($pwd) or empty($pwdrepeat) ){
        $result=true;
    }

    return $result;
}


function invalidUid($uid){
    $result=false;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $uid) ){
        $result=true;
    }

    return $result;
}

function invalidEmail($email){
    $result=false;
    if (! filter_var($email,FILTER_VALIDATE_EMAIL) ){
        $result=true;
    }

    return $result;
}

function pwdMatch($pwd,$pwdrepeat){
    $result=false;
    if ($pwd !== $pwdrepeat){
        $result=true;
    }

    return $result;
}

function uidExist($conn,$uid,$email){
    $sql="SELECT * from users where userUid = ? OR userEmail = ?;";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmtfailed");
    exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $uid, $email);
    mysqli_stmt_execute($stmt);
    
    $resultData=mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData) ) {
        return $row;
    }
    else {
        $result=false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}



function createUser($conn,$firstname,$lastname,$email,$uid,$pwd){
    $sql="INSERT INTO users (userFirstName,userLastName,userEmail,userUid,userPwd) VALUES (?,?,?,?,?);";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmtfailed");
    exit();
    }

    $hashepwd=password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss",$firstname,$lastname,$email,$uid,$hashepwd);
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);

    header("location: ../signup.php?error=none");

    
}

////////////////////////////////////////////////// Login

function emptyInputLogin($username,$pwd){
    $result=false;
    if (empty($username) or empty($pwd) ){
        $result=true;
    }
    return $result;
}

function loginUser($conn,$username,$pwd){
    $uidExists=uidExist($conn,$username,$username);
    
    if ($uidExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    $pwdhashed =$uidExists["userPwd"];
    
    $checkpwd = password_verify($pwd,$pwdhashed);

    if ($checkpwd === false){
        header("location: ../login.php?error=wrongpwd");
        exit();
    }
    elseif ($checkpwd === true) {
        session_start();
        $_SESSION["userId"] = $uidExists["userId"];
        $_SESSION["userUid"] = $uidExists["userUid"];
        $_SESSION["row"]=$uidExists;
        header("location: ../probs.php");
        exit();
    }
}


/////////////////////////////////// Add_problem

function addProb($conn,$name,$problem,$input,$after_input,$input_gen,$output_gen,$language){
    $sql="INSERT INTO problems (probName,probText,probExIn,probAfterText,probInGen,probOutGen,probLang) VALUES (?,?,?,?,?,?,?);";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../admin.php?error=stmtfailed");
        exit();
    }

    

    mysqli_stmt_bind_param($stmt, "sssssss",$name,$problem,$input,$after_input,$input_gen,$output_gen,$language);
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);


}


function ad_din($conn,$userId,$input_generated){
    $sql="INSERT INTO inoutprob (userId,inText) VALUES (?,?);";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../admin.php?error=stmtfailed");
        exit();
    }

    

    mysqli_stmt_bind_param($stmt, "is",$userId,$input_generated);
    mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);


}