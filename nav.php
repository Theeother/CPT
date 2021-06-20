<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <title><?php echo basename($_SERVER['PHP_SELF']);     ?></title>
</head>
<body>
  
    
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="Images/logo.png" alt="" width="30" height="24">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link " href="probs.php">Problems</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="comp.php">Competitions</a>
              </li>
              <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      The Big Game
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <li><a class="dropdown-item" href="#">Play</a></li>
                      <li><a class="dropdown-item" href="#">Prize pool</a></li>
                    </ul>
                  </li>'
                

              <?php
                if (isset($_SESSION["userId"])){
                  echo '
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Profile
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <li><a class="dropdown-item" href="profile.php">My Account</a></li>
                      <li><a class="dropdown-item" href="#">Settings</a></li>
                      <li><a class="dropdown-item" href="includes/logout_inc.php">Log out</a></li>
                    </ul>
                  </li>';
                }
                else{
                  echo '
                  <li class="nav-item">
                    <a class="nav-link " href="login.php">Log in</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link " href="signup.php">Sign up</a>
                  </li>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Play</a></li>
                    <li><a class="dropdown-item" href="#">Prize pool</a></li>
                  </ul>
                </li>';
                }

              ?>

                

              

            </ul>
          </div>
        </div>
      </nav>
      <br><br><br>

<?php
/*
<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Profile
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">My Account</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Log out</a></li>
          </ul>
        </li>
*/
?>