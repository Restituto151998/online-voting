<?php
include_once 'header.php';
session_start();
if(!isset($_SESSION['user'])) {
  header('location: login.php');
}

?>

  <div class="container-fluid " >
    <div class="row" >
      <nav class="col-md-2 d-none d-md-block sticky p-0" id="side">
        <div class="sidebar-sticky" style="margin-bottom:400%;">
          <ul class="nav flex-column">
            <li class="nav-item mt-3">
              <a class="nav-link active " style="color: black;" href="#">
               <img src="./assets/img/profile.png" style="height: 100px; width: 100px;" alt="" class="rounded-circle offset-2"><br>
                <h5><?php echo $_SESSION['user']['firstname']. " ". $_SESSION['user']['lastname'] ?></h5>
              </a>
              <hr>
            </li>

            <li class="nav-item"  >
              <a class="nav-link active text-white" href="dashboard.php" id="active">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-home">
                  <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                  <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                Dashboard 
              </a>
            </li>
      
            <?php if($_SESSION['user']['type'] != 'CLIENT') { ?>
            <li class="nav-item" id="hover">
              <a class="nav-link" style="color: black;" href="./users.php" >
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-users">
                  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                  <circle cx="9" cy="7" r="4"></circle>
                  <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                  <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                Users
              </a>
            </li>
            <?php } ?>

          </ul>

       
         
        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 pb-5">
      <div class="row">
    <div class="col-12">
        <div class="card mb-0" id="card">
            <div class="card-body">
                <h4 class="m-0">Dashboard</h4>

            </div>
        </div>
    </div>
</div>
<div class="row mt-4">

    <div class="col-12">
        <div class="card " id="card">
        
            <div class="card-body">
            <h3>Welcome! <?php echo $_SESSION['user']['firstname']?></h3><br>
                <p>Thanks for signing up to try this system. <br><br>

                    To keep you more update of our system, we will send you an information to your provided e-mail @ <a href=""><?php echo $_SESSION['user']['email']?></a> </a> <br> 
                  
                </p>
                Best Regards, <br>
                MNHS App | User Management
            </div>
        </div>
    </div>

</div>

      </main>
    </div>
  </div>
  
  
  
  <?php
  include_once 'footer.php';
?>
 
