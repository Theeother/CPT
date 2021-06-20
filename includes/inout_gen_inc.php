<?php
    function in_gen($conn,$prob,$userId,$probId){
    // r = lecture uniquement 

    // w = write ( mais ecrase l'ancien contenu )

    // a = write ( sans ecraser le contenu )

        $file_code=fopen("input.py","w");

        fwrite($file_code,$prob["probInGen"]);

        fclose($file_code);

        exec("python input.py > input.txt");

        $input_file=fopen("input.txt","r");
        $generated_in=fread($input_file,filesize("input.txt"));


        $generated_out=out_get($prob["probOutGen"]);

        $hashOut=password_hash($generated_out, PASSWORD_DEFAULT);

        ////// adding the input/output to the Database
        $sql="INSERT INTO inoutprob (userId,probId,inText,outRes) VALUES (?,?,?,?);";
        $stmt=mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt, "iiss",$userId,$probId,$generated_in,$hashOut);
        mysqli_stmt_execute($stmt);


        exec("python del.py");
        return($generated_in);



    }



    function out_get($output){ 
        $file_code=fopen("output.py","w");

        fwrite($file_code,$output);

        fclose($file_code);

        exec("python output.py > output.txt");
        
        $output_file=fopen("output.txt","r");
        $generated_out=fread($output_file,filesize("output.txt"));
        return($generated_out);

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
        $prob=mysqli_fetch_assoc($resultData);
        
        


        return(in_gen($conn,$prob,$userId,$probId));
    }


    }

    