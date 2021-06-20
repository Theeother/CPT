<?php 
include_once 'nav.php';
?>

<?php 
if (isset($_SESSION["admin"])){
    if ($_SESSION["admin"] != true){
        header("location: ../profile.php");
        exit();
    }
}
else{
    header("location: ../profile.php");
    exit();
}
?>

<div class="container">
<form action="includes/new_prob_inc.php" method="POST">
  <div class="row">
    <div class="col">
        <input class="form-control" type="text" name="name" placeholder="Problem name">
        <textarea name="problem" class="form-control" id="" cols="30" rows="10" placeholder="Problem"></textarea>
        <textarea name="input" class="form-control" id="" cols="30" rows="5" placeholder="Input"></textarea>
        <textarea name="after_input" class="form-control" id="" cols="30" rows="5" placeholder="after input"></textarea>
    </div>



    <div class="col">
    <textarea name="input_gen" class="form-control" id="" cols="30" rows="10" placeholder="input_generator"></textarea>
    <textarea name="output_gen" class="form-control" id="" cols="30" rows="5" placeholder="output_gen"></textarea>
    <label class="form-check-label">Language :</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="language" value="Python" checked>
        <label class="form-check-label">Python</label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="radio" name="language" value="C++">
        <label class="form-check-label" >C++</label>
    </div>
    <button class="btn btn-primary mb-3" type="submit" name="submit">submit</button>
    </div>
    <?php
        if (isset($_GET["error"])){
            if ($_GET["error"]=="none"){
                echo "<p>Problem added.</p>";
            }
            else{
                echo "<p>The problem wasn't added.</p>";
            }
        }
    ?>
</div>
</form>
</div>
</body>
</html>