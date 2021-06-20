<?php
    function in_gen($conn,$input,$userId,$probId){
    // r = lecture uniquement 

    // w = write ( mais ecrase l'ancien contenu )

    // a = write ( sans ecraser le contenu )

        $file_code=fopen("input.py","w");

        fwrite($file_code,$input);

        fclose($file_code);

        exec("python input.py > input.txt");

        $input_file=fopen("input.txt","r");
        $generated_in=fread($input_file,filesize("input.txt"));
        ////// adding the input to the Database
        $sql="INSERT INTO inoutprob (userId,probId,inText) VALUES (?,?,?);";
        $stmt=mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt, "iis",$userId,$probId,$generated_in);
        mysqli_stmt_execute($stmt);



        return($generated_in);



    }


    function inGet($conn,$userId,$probId){
        $sql="SELECT inText from inoutprob where userId= ? and probId = ?;";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: probs.php?error=wrongID7");
            exit();
        }

    mysqli_stmt_bind_param($stmt, "ii",$userId,$probId);
    mysqli_stmt_execute($stmt);
    $resultData=mysqli_stmt_get_result($stmt);
    if ($inout = mysqli_fetch_assoc($resultData)){
        return($inout['inText']);
    }
    else{
        $sql="SELECT * from problems where probId = ?;";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: probs.php?error=probIDWrong");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "i",$probId);
        mysqli_stmt_execute($stmt);
        $resultData=mysqli_stmt_get_result($stmt);
        $input=mysqli_fetch_assoc($resultData)["probInGen"];
        
        return(in_gen($conn,$input,$userId,$probId));
    }


    }

    function outget($conn,$userId,$probId){
        

    }