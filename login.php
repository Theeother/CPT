
<?php 
  include_once 'nav.php';
?>

<section class="container-sm">
    <h2>Login</h2>
    <form action="includes/login_inc.php" method="post">

        <div class="mb-3">
            <label  class="form-label">Username/email</label>
            <input type="text" class="form-control" name="uid" placeholder="Enter you Username or email">
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Password</label>
            <input type="password" class="form-control" name="pwd" placeholder="Enter your password">
        </div>
        
        
        <button type="submit" name="submit">Login</button>
    </form>

    
    <?php
    if (isset($_GET["error"])){
        if ($_GET["error"] == "emptyinput"){
            echo "<p>All fields are obligatory.</p>";
        }
        elseif ($_GET["error"] =="wronglogin") {
            echo "<p>Invalid crediancials.</p>";
        }
        elseif ($_GET["error"] =="wrongpwd") {
            echo "<p>Wrong password.</p>";
        }
    }
    ?>



</section>





</body>
</html>