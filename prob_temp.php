<?php 
include_once 'nav.php';
?>

<?php 
  if (isset($_GET["probId"])) {
    $probId=$_GET["probId"];
    require_once 'includes/dbh_inc.php';
    require_once 'includes/functions_inc.php';

    $sql="SELECT * from problems where probId = ?;";
    $sql2="SELECT * from inoutprob where probId= ? and userId= ?;";
  ///////////////////////////// prob text
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
      header("location: probs.php?error=wrongID1");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $probId);
    mysqli_stmt_execute($stmt);
    
    $resultData=mysqli_stmt_get_result($stmt);

    if (! $prob = mysqli_fetch_assoc($resultData) ) {
      header("location: probs.php?error=wrongID2");
      exit();
    }
////////////////////// end prob text

    if (isset($_SESSION["userId"])){
      require_once 'includes/inout_gen_inc.php';
////////////////////////////////// input getting/generation
      $input=inGet($conn,$_SESSION["userId"],$probId);
/////////////////////////// solved or not
      $answer=get_ans($conn,$_SESSION["userId"],$probId);


  }



}
  else{
    header("location: probs.php");
    exit();
  }


?>




  <div class="container"></div>

  <div class="row">

    <div class="col-9 align-self-start">
      <h1 class="h1 text-center"><?php echo $prob["probName"];  ?> <br></h1>
    
      <p class="fs-4 p-sm-3 text-sm-start"><?php echo $prob["probText"];  ?></p>
      
    </div>

    <div class="col-3 align-self-center ">
      <h2 class="h2">Time left = <span> 20:00 </span></h2>
      <h2 class="h2">Competition name</h2>
          <a href="comp_temp.html" onclick="return false;"><p class="card-text fs-4 link-secondary">1- Problem name</p></a>
          <a href="#"><p class="card-text fs-4 link-success">2- Problem name Solved</p></a>
          <a href="#"><p class="card-text fs-4 link-primary">3- Problem name</p></a>
          <a href="#"><p class="card-text fs-4 link-primary">4- Problem name</p></a>
          <a href="#"><p class="card-text fs-4 link-primary">5- Problem name</p></a>

      <h3><br> Stats:</h3>
      <h4>Completed by <span>x</span> players</h4>
    </div>

    </div>

    <div class="row justify-content-center" >
      <div class="col-9 align-self-center">
        <h2>Input example:</h2>
        <div class="badge bg-secondary text-start">
        <p class="fs-4 "><?php echo $prob["probExIn"];  ?></p>
        </div>
      </div>
    </div>

    <div class="row justify-content-start" >
      <div class="col-9">
        <p class="fs-4 p-sm-3 text-sm-start "> <?php echo $prob["probAfterText"];  ?></p>
      </div>
    </div>
    <div class="row justify-content-start" id="aa">
      <div class="col-9">
      
<?php
  if (isset($_SESSION["row"]))
//style="display: none;"
    {echo '
        <textarea type="text" cols="1" rows="1" id="myInput" style="visibility:hidden;">'.$input.'</textarea>
        <a onclick="myFunction()" class="fs-4 p-sm-3 text-sm-start link-info">Get you input here</a>




        <br><br>';
        
        if ($answer){
          echo '<h1>Your answer is '.$answer['answer'].' .</h1>';
        }
        else{
        echo '<form action="includes/try_inc.php?probId='.$probId.'" method="POST">
          <input type="text" style="margin-left: 1rem;" name="submission" method="POST" placeholder="Your answer">
          <button type="submit" name="submit">submit</button>
        </form>
        ';}}
  else{
    echo '<p>To get an Input and get solving, <a href="login.php">login</a> or <a href="signup.php">signup</a>.</p>' ;
  }
?>


        <?php 
        if (isset($_GET["try"])){
          if ($_GET["try"] == "failed") {
            echo "<p>Wrong answer</p>";
          }
          elseif ($_GET["try"] == "success") {
            echo "<p>Correct answer, good job.</p>";
          }
        }
        ?>


      </div>
    </div>
  </div>
<br><br>
  <footer class="card-footer">
    <p>Author: Foulen ben foulen</p>
    
  </footer>
<?php echo $probId;?>
</body>
</html>




<script>
    function myFunction() {
      
  var copyText = document.getElementById("myInput");

  const parentElement = document.getElementById('aa');
  parentElement.appendChild(copyText);

  copyText.select();
  
  document.execCommand("copy");
  //parentElement.removeChild(copyText);
  alert("Copied the text: " + copyText.value);
}
    
    </script>
