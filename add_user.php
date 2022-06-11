<?php
include_once 'header.php';
include_once './connection/Connect.php';
session_start();
if (!$_SESSION['user']) {
    header('login.php');
}

if (isset($_POST['save'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $type = $_POST['type'];
    $partylist = $_POST['partylist'];
    $sql = "INSERT INTO candidates (firstname,lastname,type,partylist)
   VALUES ('$firstname','$lastname','$type','$partylist')";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success_message'] = "Candidate Added Successfully";
        header("Location: candidates.php"); 
        exit();
    }
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
                                class="rounded-circle offset-2"><br>
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

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 pb-5">
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card p-3" id="card">
                        <div class="card-body">
                            <div class="card-header bg-white text-center" id="header-pub">
                                <h2>Add Candidate</h2>
                            </div>
                            <form method="post">
                                <div class="row mt-3">
                                    <div class="form-group col-6">
                                        <small><label for="last_name">Partylist</label></small>
                                        <input id="last_name" type="text" class="form-control" name="partylist"
                                            required>
                                        <div class="invalid-feedback">
                                            The field partylist is required.
                                        </div>
                                    </div>
                                    <div class="form-group col-6">

                                        <small><label for="type">Position</label></small>
                                        <select class="form-control" id="select" name="type">
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
                                    <div class="form-group col-6">

                                        <small><label for="firstname">First Name</label></small>
                                        <input id="firstname" type="text" class="form-control" name="firstname" required
                                            autofocus>
                                        <div class="invalid-feedback">
                                            The field firstname is required.
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <small><label for="last_name">Last Name</label></small>
                                        <input id="last_name" type="text" class="form-control" name="lastname" required>
                                        <div class="invalid-feedback">
                                            The field lastname is required.
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group mt-5">
                                    <!-- <input type="submit" name="save" value="Create" class="btn  btn-lg btn-block text-white offset-4" style="background-color:#568203;width:30%;"> -->

                                    <small> <button name="save" class="btn btn-primary  btn-block text-white offset-4"
                                            style="width:30%;">
                                            Create
                                        </button>
                                    </small>
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