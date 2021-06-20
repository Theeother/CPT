<?php 
  include_once 'nav.php';
?>



<div class="container">
    <div class="main-body">
    
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="Images/profile_pic.jpg" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>  <?php echo $_SESSION["row"]["userUid"];?> </h4>
                      <p class="text-secondary mb-1">Job or occupation</p>
                      <p class="text-muted font-size-sm">County / city</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><img src="Images/Link.png" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"></img>Socials</h6>
                    <span class="text-secondary">https://www.facebook.com/TheRealAKS/</span>
                  </li>
                 
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $_SESSION["row"]["userFirstName"] ." ". $_SESSION["row"]["userLastName"] ;?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $_SESSION["row"]["userEmail"];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      To add to the DataBase
                    </div>
                  </div>
                  
                  
                  
                  
                
            </div>
          </div>
        </div>
    </div>




  <?php 

  if ($_SESSION["userUid"] == "AKS"){
    echo '
  <form class="row g-3" action="includes/profile_inc.php" method="POST">
    <div class="col-auto">
    <label class="form-label" for="">Admin access</label>
    </div>
    <div class="col-auto">
    <input type="password" class="form-control" style="margin-left: 1rem;" name="pwd" method="POST" placeholder="password">
    </div>
    <div class="col-auto">
    <button class="btn btn-primary mb-3" type="submit" name="submit">submit</button>
    </div>
    </form>';
}
  ?>



</body>
</html>