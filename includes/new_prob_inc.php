<?php

if (isset($_POST["submit"])){


    $name=$_POST["name"];
    $problem=$_POST["problem"];
    $input=$_POST["input"];
    $after_input=$_POST["after_input"];

    $input_gen=$_POST["input_gen"];
    $output_gen=$_POST["output_gen"];
    $language=$_POST["language"];

    require_once 'dbh_inc.php';
    require_once 'functions_inc.php';
    
    //require_once 'inout_gen_inc.php';


    //$input_generated=in_gen($input_gen);
    //$userId=1;
    







    addProb($conn,$name,$problem,$input,$after_input,$input_gen,$output_gen,$language);
    //ad_din($conn,$userId,$input_generated);
    echo "done";


}
