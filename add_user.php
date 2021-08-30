
  
<?php
include_once 'header.php';
include_once './connection/Connect.php';
session_start();
if(!$_SESSION['user']) {
  header('login.php');
}

if(isset($_POST['save']))
{	 
	 $firstname = $_POST['firstname'];
	 $lastname = $_POST['lastname'];
	 $email = $_POST['email'];
   $type = $_POST['type'];
   $password = md5($_POST['password']);
	 $sql = "INSERT INTO users (firstname,lastname,email,type,password)
	 VALUES ('$firstname','$lastname','$email','$type','$password')";
	 if (mysqli_query($conn, $sql)) {
		header("location: ./users.php");
	 } 
}

?>

  <div class="container-fluid ">
    <div class="row">
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

            <li class="nav-item">
              <a class="nav-link " style="color: black;" href="dashboard.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-home">
                  <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                  <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                Dashboard 
              </a>
            </li>
      
  
            <li class="nav-item">
              <a class="nav-link active text-white" id="active" href="./users.php">
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
      

          </ul>

        
        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 pb-5">
      <div class="section-body">
      <div class="row">
            <div class="col-11">
                <div class="card pt-3 pl-3 pr-3" id="card">
                    
                      <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item">Home</li>
                          <li class="breadcrumb-item text-success active" aria-current="page">Create user</li>
                        </ol>
                      </nav>
                   
             
                </div>
            </div>
            <div class="col-1">
                <div class="card  p-3" id="card">
                    
                <a href="./users.php" ><i class='fas fa-reply' style='font-size:24px;color:#568203'></i></a>
                </div>
            </div>
        </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card p-3" id="card">
                        <div class="card-body">
                            <form method="post">
                                <div class="row mt-3">
                                    <div class="form-group col-6">
                                       <small><label for="firstname">First Name</label></small> 
                                        <input id="firstname" type="text" class="form-control"  name="firstname" required autofocus>
                                        <div class="invalid-feedback">
                                            The field firstname is required.
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <small><label for="last_name">Last Name</label></small>
                                        <input id="last_name" type="text" class="form-control"  name="lastname" required>
                                        <div class="invalid-feedback">
                                            The field lastname is required.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <small><label for="email">Email</label></small>
                                        <input id="email" type="email" class="form-control"  name="email" required>
                                        <div class="invalid-feedback">
                                            The field email is required.
                                        </div>
                                    </div>
                                  
                                    <?php if($_SESSION['user']['type'] == 'ADMIN') { ?> 
                                        <div class="form-group col-6" >
                                           <small><label for="type">Type</label></small> 
                                            <select class="form-control" id="select" name="type">
                                                <option>MANAGER</option>
                                                <option>CLIENT</option>

                                            </select>
                                        </div>
                                    <?php }elseif($_SESSION['user']['type'] == 'MANAGER') { ?> 
                                      <div class="form-group col-6" hidden>
                                        
                                            <select class="form-control" id="select" name="type">
                                            <option >CLIENT</option>
                                            </select>
                                        </div>
                                        <?php }else{?>
                                          <input type="hidden" name="type" value="<?php echo $row['type'] ?>">
                                         <?php } ?>
                                         <div class="form-group col-6">
                                        <small><label for="password" class="d-block">Password</label></small>
                                        <input id="password" type="password" class="form-control pwstrength"  data-indicator="pwindicator" name="password" required>
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                        <div class="invalid-feedback">
                                            The field password is required.
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group mt-5">
                              <!-- <input type="submit" name="save" value="Create" class="btn  btn-lg btn-block text-white offset-4" style="background-color:#568203;width:30%;"> -->

                           <small>   <button type="submit" name="save" class="btn   btn-block text-white offset-4" style="background-color:#568203;width:30%;">
                                    Create
                                </button>
                                </small>
                                </div>
                            </form>
                        </div>
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


