
<?php 
  include_once 'nav.php';
?>

<section class="container-sm">
    <h2>Sign up</h2>
    <form action="includes/signup_inc.php" method="post">
        <div class="row g-3">
            <div class="col">
                <label  class="form-label">First name</label>
                <input type="text" name="firstname"class="form-control" placeholder="First name" aria-label="First name">
            </div>
            <div class="col">
                <label  class="form-label">Last name</label>
                <input type="text" name="lastname" class="form-control" placeholder="Last name" aria-label="Last name">
            </div>
        </div>

        <div class="mb-3">
            <label  class="form-label">Email</label>
            <input type="email" name="email" class="form-control"  placeholder="Enter your email">
        </div>

        <div class="mb-3">
            <label  class="form-label">Username</label>
            <input type="text" class="form-control" name="uid" placeholder="Username can contain any letters or numbers, without spaces">
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Password</label>
            <input type="password" class="form-control" name="pwd" placeholder="Enter a password">
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Password (Confirm)</label>
            <input type="password" class="form-control" name="pwdrepeat" placeholder="repeat your password">
        </div>

        <button type="submit" name="submit">Sign up</button>
    </form>


    <?php
    if (isset($_GET["error"])){
        if ($_GET["error"] == "emptyinput"){
            echo "<p>All fields are obligatory.</p>";
        }
        elseif ($_GET["error"] =="invaliduid") {
            echo "<p>Invalid Username. </p>";
        }
        elseif ($_GET["error"] =="invalidemail") {
            echo "<p>Invalid Email. </p>";
        }
        elseif ($_GET["error"] =="pwdnomatch") {
            echo "<p>passwords does't match. </p>";
        }
        elseif ($_GET["error"] =="stmtfailed") {
            echo "<p>Something went wrong, please try again.</p>";
        }
        elseif ($_GET["error"] =="uidtaken") {
            echo "<p>Username already taken, please try another one. </p>";
        }
        elseif ($_GET["error"]== "none") {
            echo "<p>You have successfully signed up. </p>";
        
        }
    }
    ?>
</section>





</body>
</html>