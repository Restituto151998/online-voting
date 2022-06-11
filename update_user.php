<?php
include_once 'header.php';
include_once './connection/Connect.php';
session_start();
if (!$_SESSION['user']) {
    header('login.php');
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
$row= mysqli_fetch_array($result);


$data = mysqli_query($conn, "SELECT * FROM candidates Where id='$id'");
$row1 = mysqli_fetch_array($data);

if (isset($_POST['update'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $partylist = $_POST['partylist'];
    $type = $_POST['type'];
   
  
    $sql = mysqli_query($conn, "UPDATE candidates SET firstname='".$firstname."', lastname='".$lastname."',partylist='".$partylist."',type='".$type."' Where id='$id'");
   
    $_SESSION['success_message'] = "Candidate Updated Successfully";
    header("Location: candidates.php");
    exit();
}
?>



<div class="container-fluid ">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block sticky p-0" id="side" style="background-color: #0c4dad">
            <div class="sidebar-sticky" style="margin-bottom:400%;">
                <ul class="nav flex-column">
                    <li class="nav-item mt-3">
                        <a class="nav-link active text-white" href="#">
                            <img src="./assets/img/profile.png" style="height: 100px; width: 100px;" alt=""
                                class="rounded-circle offset-2"> <br>
                            <h5 class="ml-4">
                                <?php echo $_SESSION['user']['firstname']. " ". $_SESSION['user']['lastname'] ?></h5>

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
                        <a class="nav-link active text-white" href="./voters.php">
                            <i class='fas fa-user-check mr-2' style='font-size:24px'></i>
                            Voters
                        </a>
                    </li>

                    <li class="nav-item" id="hover">
                        <a class="nav-link text-white" href="./candidates.php" id="active">
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

        <main role="main" class="col-md-3 ml-sm-auto col-lg-10 pt-3 px-5 pb-5">
            <div class="section-body">
                <div <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?> <div
                    class="alert alert-warning success-message"
                    style="margin-bottom: 20px;font-size: 20px;color: green;">
                    <?php echo $_SESSION['success_message']; ?></div>
                <?php
                        unset($_SESSION['success_message']);
                    }
                    ?>
            </div>
            <div class="row">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card-body">
                            <form method="post" action="">
                                <input type="hidden" name="id" value="">
                                <div class="row mt-5">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small><label for="firstname">First Name</label></small>
                                            <input id="firstname" type="text" value="<?php echo $row1['firstname'] ?>"
                                                class="form-control" name="firstname" required autofocus>
                                            <div class="invalid-feedback">
                                                The field firstname is required.
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small><label for="last_name">Last Name</label></small>
                                            <input id="last_name" type="text" value="<?php echo $row1['lastname']  ?>"
                                                class="form-control" name="lastname" required>
                                            <div class="invalid-feedback">
                                                The field lastname is required.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <small><label for="email">Partylist</label></small>
                                            <input id="email" type="text" value="<?php echo $row1['partylist']  ?>"
                                                class="form-control" name="partylist" required>
                                            <div class="invalid-feedback">
                                                The field email is required.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type">Position</label>
                                            <select class="form-control" id="select" name="type">
                                                <option selected>
                                                    <?php echo $row1['type']?>
                                                </option>
                                                <option>President</option>
                                                <option>Vice President</option>
                                                <option>Secretary</option>
                                                <option>Treasurer</option>
                                                <option>Auditor</option>
                                                <option>PIO</option>
                                                <option>Peace Officer</option>
                                                <option>Grade 10 Representative</option>
                                                <option>Grade 9 Representative</option>
                                                <option>Grade 8 Representative</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group mt-5">
                                    <small> <button type="submit" name="update"
                                            class="btn   btn-primary text-white offset-4" style="width:30%;">
                                            Update
                                        </button></small>
                                    <br>
                                    <br>
                                    <small>
                                        <a href="./candidates.php" name="save"
                                            class="btn btn-danger text-white offset-4 " style="width:30%;">Cancel</a>

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