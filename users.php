
<?php
include_once 'header.php';
include_once './connection/Connect.php';
session_start();


if(!$_SESSION['user']) {
  header('login.php');
}
//retrieve data
$result = mysqli_query($conn,"SELECT * FROM users");

?>

  <div class="container-fluid ">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block sticky p-0" id="side">
        <div class="sidebar-sticky" style="margin-bottom:400%;">
          <ul class="nav flex-column">
            <li class="nav-item mt-3">
              <a class="nav-link active " style="color: black;" href="#">
                 <img src="./assets/img/profile.png" style="height: 100px; width: 100px;" alt="" class="rounded-circle offset-2"> <br>
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
              <a class="nav-link active text-white"  href="./users.php" id="active">
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

</nav>
      <div class="section-body">
        <div class="row">
            <div class="col-10">
                <div class="card pt-3 pl-3 pr-3" id="card">
                    
                      <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item text-success">Users</li>
                      
                        </ol>
                      </nav>
                   
             
                </div>
            </div>
            <div class="col-2">
                <div class="card  p-3" id="card">
                    
                    <a href="./add_user.php" class="btn " id="create">Create User</a>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card " id="card">
                    <div class="card-body">
                        <div class="table-responsive">


                          <table class="table">
                            <thead >
                              <tr id="table-head">
                                <th scope="col">Full Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Type</th>
                                <th scope="col">Password</th>
                                <th scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i=0;
                                while($row = mysqli_fetch_array($result)) {
                              ?>
                                   <?php if($_SESSION['user']['type'] != $row["type"] && $row["type"] != 'ADMIN') { ?>
                              <tr>    
                                    <td><?php echo  $row["firstname"]." " .$row["lastname"];?></td>
                                    <td><?php echo  $row["email"]?></td>
        
                                    <td><?php echo  $row["type"]?></td>
                                      <td class="d-flex justify-items-between align-items-center">
                                                <input type="password" class="form-control" id="password" value="<?php echo $row["password"]; ?>" readonly>

                                                <a href="#" class="badge  ml-3 toggle-password ">
                                                <i class="far fa-eye" style="font-size:15px;color:black;"></i>
                                                </a>
                                                |
                                                <a href="./delete_data.php?id=<?php echo $row["id"];  ?>"><i class='fas fa-trash-alt' style='font-size:15px;color:red;;padding-left:10px;padding-right:10px;'></i></a>
                                                |
                                                <a href="./update_user.php?id=<?php echo $row["id"];  ?>"><i class='fas fa-edit' style='font-size:15px;color:#568203;padding-left:10px;'></i></a>
                                               
                                 </td>
                                                              
                   
                                 </tr>
            <?php } ?>

                                 <?php
                                  $i++;
                                  }
                                  ?>
        
                            </tbody>
                          </table>
                        </div>
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