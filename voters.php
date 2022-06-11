<?php
include_once 'header.php';
include_once './connection/Connect.php';
session_start();

if (!$_SESSION['user']) {
    header('login.php');
}

$voters = mysqli_query(
    $conn,
    "SELECT * FROM `users` WHERE type <> 'ADMIN' ORDER BY section ASC;"
);
$count = mysqli_num_rows($voters);


?>


<div class="container-fluid ">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block sticky p-0" style="background-color: #0c4dad" id="side">
            <div class="sidebar-sticky" style="margin-bottom:400%;">
                <ul class="nav flex-column">
                    <li class="nav-item mt-3">
                        <a class="nav-link active " style="color: black;" href="#">
                            <img src="./assets/img/profile.png" style="height: 100px; width: 100px;" alt=""
                                class="rounded-circle offset-2"> <br>
                            <h5 class="ml-4 text-white"><?php echo $_SESSION['user']['firstname'] .
                     ' ' .
                     $_SESSION['user']['lastname']; ?></h5>

                        </a>
                        <hr>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active text-white" href="dashboard.php">
                            <i class='far fa-list-alt mr-3' style='font-size:24px'></i>
                            Tally
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active text-white" href="./voters.php" id="active">
                            <i class='fas fa-user-check mr-2' style='font-size:24px'></i>
                            Voters
                        </a>
                    </li>

                    <li class="nav-item" id="hover">
                        <a class="nav-link text-white" href="./candidates.php">
                            <i class='fas fa-users mr-2' style='font-size:24px'></i>
                            Candidates
                        </a>
                    </li>
                    <li class="nav-item" id="hover">
                        <a class="nav-link text-white" href="./winners.php">
                            <i class='fas fa-trophy mr-2' style='font-size:24px'></i>
                            Winners
                        </a>
                    </li>

                </ul>


            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 pb-5">
            <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
            <div class="alert alert-success" id="message" role="alert" style="width: 86%">
                <?php echo $_SESSION['success_message']; ?>
            </div>
            <?php
                        unset($_SESSION['success_message']);
                    }
                    ?>
            <div class="card">
                <h3 class="card-header text-center">Valid Voters</h3>
                <span><a href="./clear.php" style="float:right ;margin-right: 5%; margin-top:2%;" name="delete"><i
                            class='fas fa-trash-alt' aria-hidden="true" style='font-size:15px;color:red; '>
                            Clear
                            Data</i></a></span>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>

                                <th scope="col">LRN</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Level</th>
                                <th scope="col">Section</th>
                                <th scope="col">Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
          $i = 0;
          while ($row = mysqli_fetch_array($voters)) { ?>
                            <tr>
                                <td>
                                    <?php echo $row['LRN'] ?>
                                </td>
                                <td><?php echo $row['firstname'] ?></td>
                                <td>
                                    <?php echo $row['lastname'] ?>
                                </td>
                                <td>
                                    <?php echo $row['type'] ?>
                                </td>
                                <td>
                                    <?php echo $row['section'] ?>
                                </td>
                                <?php if($row['status'] == 'not yet voted'){?>
                                <td>
                                    <button type="button" class="btn btn-warning text-white btn-sm" disabled>
                                        <?php echo $row['status'] ?></button>

                                </td>
                                <?php }else{?>
                                <td>
                                    <button type="button" class="btn btn-success  btn-sm" disabled>
                                        <?php echo $row['status'] ?></button>

                                </td>
                                <?php }?>

                            </tr>
                            <?php }
          ?>
                            <?php $i++; ?>
                        </tbody>
                    </table>

                    <?php if($count < 1){?>
                    <div class="text-center" id="no_data">
                        <img src="assets/img/no_datas.PNG" alt="" srcset=""><br>
                        <p>No Voters Registered yet.</p>
                    </div>
                    <?php }?>
                </div>
            </div>
        </main>
        <?php include_once 'footer.php';?>