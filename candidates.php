<?php
include_once 'header.php';
include_once './connection/Connect.php';

session_start();

if (!$_SESSION['user']) {
    header('login.php');
}
$president = mysqli_query(
    $conn,
    "SELECT * FROM `candidates` WHERE type = 'President';"
);

$count1 = mysqli_num_rows($president);


$vicePresident = mysqli_query(
    $conn,
    "SELECT * FROM `candidates` WHERE type = 'Vice President';"
);
$count2 = mysqli_num_rows($vicePresident);


$secretary = mysqli_query(
    $conn,
    "SELECT * FROM `candidates` WHERE type = 'Secretary';"
);
$count3 = mysqli_num_rows($secretary);

$treasurer = mysqli_query(
    $conn,
    "SELECT * FROM `candidates` WHERE type = 'Treasurer';"
);
$count4= mysqli_num_rows($treasurer);

$auditor = mysqli_query(
    $conn,
    "SELECT * FROM `candidates` WHERE type = 'Auditor';"
);
$count5= mysqli_num_rows($auditor);

$pio = mysqli_query($conn, "SELECT * FROM `candidates` WHERE type = 'PIO';");
$count6= mysqli_num_rows($pio);

$peaceOfficer = mysqli_query(
    $conn,
    "SELECT * FROM `candidates` WHERE type = 'Peace Officer';"
);
$count7= mysqli_num_rows($peaceOfficer);

$grade10 = mysqli_query(
    $conn,
    "SELECT * FROM `candidates` WHERE type = 'Grade 10 Representative';"
);
$count8= mysqli_num_rows($grade10);
$grade9 = mysqli_query(
    $conn,
    "SELECT * FROM `candidates` WHERE type = 'Grade 9 Representative';"
);
$count9= mysqli_num_rows($grade9);

$grade8 = mysqli_query(
    $conn,
    "SELECT * FROM `candidates` WHERE type = 'Grade 8 Representative';"
);
$count10= mysqli_num_rows($grade8);
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

        <main role="main" class="col-md-6 ml-sm-auto col-lg-10 pt-3 px-4 pb-5">

            </nav>
            <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
            <div class="alert alert-success" id="message" role="alert" style="width: 86%">
                <?php echo $_SESSION['success_message']; ?>
            </div>
            <?php
                        unset($_SESSION['success_message']);
                    }
                    ?>

            <div class="section-body">
                <div class="row">
                    <div class="col-2">

                        <a href="./add_user.php" class="btn mb-3 btn-primary" style="margin-left:520%"><i
                                class="fa fa-plus-circle"></i>
                            Candidates</a>

                    </div>
                </div>
                <div class="row ml-4">
                    <div class="card col-5 mr-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">President</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
          $i = 0;
          while ($row = mysqli_fetch_array($president)) { ?>
                                <tr>
                                    <td><?php echo $row['firstname'] .
                ' ' .
                $row['lastname'] .
                '-' .
                $row['partylist']; ?></td>
                                    <td>
                                        <a href="./update_user.php?id=<?php echo $row["id"];  ?>" data-toggle="tooltip"
                                            data-placement="top" title="edit"><i class='fas fa-edit'
                                                style='font-size:15px;color:#568203;padding-left:10px;'></i></a> |<a
                                            href="./delete_data.php?id=<?php echo $row["id"];?> javascript:void(0)"
                                            data-toggle="tooltip" data-placement="top" title="delete"><i
                                                class='fas fa-trash-alt delete_btn'
                                                style='font-size:15px;color:red;;padding-left:10px;padding-right:10px;'></i></a>
                                    </td>
                                </tr>
                                <?php }
          ?>
                                <?php $i++; ?>

                            </tbody>
                        </table>
                        <?php if($count1 < 1){?>
                        <div class="text-center" id="no_data">
                            <img src="assets/img/no_data.PNG" style="width:20%"><br>
                            <p>No Candidate/s.</p>
                        </div>
                        <?php }?>
                    </div>
                    <div class=" card col-5 mr-3 ">
                        <table class=" table">
                            <thead>
                                <tr>
                                    <th scope="col">Vice President</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
          $i = 0;
          while ($row = mysqli_fetch_array($vicePresident)) { ?>
                                <tr>
                                    <td><?php echo $row['firstname'] .
                ' ' .
                $row['lastname'] .
                '-' .
                $row['partylist']; ?></td>
                                    <td>
                                        <a href="./update_user.php?id=<?php echo $row["id"];  ?>" data-toggle="tooltip"
                                            data-placement="top" title="edit"><i class='fas fa-edit'
                                                style='font-size:15px;color:#568203;padding-left:10px;'></i></a>
                                        <a href="./delete_data.php?id=<?php echo $row["id"];  ?>" data-toggle="tooltip"
                                            data-placement="top" title="delete"><i class='fas fa-trash-alt'
                                                aria-hidden="true" |
                                                style='font-size:15px;color:red;;padding-left:10px;padding-right:10px;'></i></a>
                                    </td>
                                </tr>
                                <?php }
          ?>
                                <?php $i++; ?>

                            </tbody>
                        </table>
                        <?php if($count2 < 1){?>
                        <div class="text-center" id="no_data">
                            <img src="assets/img/no_data.PNG" style="width:20%"><br>
                            <p>No Candidate/s.</p>
                        </div>
                        <?php }?>
                    </div>
                </div>
                <div class="row mt-3 ml-4">
                    <div class="card col-5 mr-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Secretary</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
            $i = 0;
            while ($row = mysqli_fetch_array($secretary)) { ?>
                                <tr>
                                    <td><?php echo $row['firstname'] .
                    ' ' .
                    $row['lastname'] .
                    '-' .
                    $row['partylist']; ?></td>
                                    <td>
                                        <a href="./update_user.php?id=<?php echo $row["id"];  ?>" data-toggle="tooltip"
                                            data-placement="top" title="edit"><i class='fas fa-edit'
                                                style='font-size:15px;color:#568203;padding-left:10px;'></i></a> |<a
                                            href="./delete_data.php?id=<?php echo $row["id"];  ?>" data-toggle="tooltip"
                                            data-placement="top" title="delete"><i class='fas fa-trash-alt'
                                                style='font-size:15px;color:red;;padding-left:10px;padding-right:10px;'></i></a>
                                    </td>
                                </tr>
                                <?php }
            ?>
                                <?php $i++; ?>

                            </tbody>
                        </table>
                        <?php if($count3 < 1){?>
                        <div class="text-center" id="no_data">
                            <img src="assets/img/no_data.PNG" style="width:20%"><br>
                            <p>No Candidate/s.</p>
                        </div>
                        <?php }?>
                    </div>
                    <div class="card col-5 mr-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Treasurer</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
          $i = 0;
          while ($row = mysqli_fetch_array($treasurer)) { ?>
                                <tr>
                                    <td><?php echo $row['firstname'] .
                ' ' .
                $row['lastname'] .
                '-' .
                $row['partylist']; ?></td>
                                    <td>
                                        <a href=" ./update_user.php?id=<?php echo $row["id"];  ?>" data-toggle="tooltip"
                                            data-placement="top" title="edit"><i class='fas fa-edit'
                                                style='font-size:15px;color:#568203;padding-left:10px;'></i></a> |<a
                                            href="./delete_data.php?id=<?php echo $row["id"];  ?>" data-toggle="tooltip"
                                            data-placement="top" title="delete"><i class='fas fa-trash-alt'
                                                style='font-size:15px;color:red;;padding-left:10px;padding-right:10px;'></i></a>
                                    </td>
                                </tr>
                                <?php }
          ?>
                                <?php $i++; ?>

                            </tbody>
                        </table>
                        <?php if($count4 < 1){?>
                        <div class="text-center" id="no_data">
                            <img src="assets/img/no_data.PNG" style="width:20%"><br>
                            <p>No Candidate/s.</p>
                        </div>
                        <?php }?>
                    </div>
                </div>

                <div class="row mt-3 ml-4">
                    <div class="card col-5 mr-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Auditor</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
            $i = 0;
            while ($row = mysqli_fetch_array($auditor)) { ?>
                                <tr>
                                    <td><?php echo $row['firstname'] .
                    ' ' .
                    $row['lastname'] .
                    '-' .
                    $row['partylist']; ?></td>
                                    <td>
                                        <a href="./update_user.php?id=<?php echo $row["id"];  ?>" data-toggle="tooltip"
                                            data-placement="top" title="edit"><i class='fas fa-edit'
                                                style='font-size:15px;color:#568203;padding-left:10px;'></i></a> |<a
                                            href="./delete_data.php?id=<?php echo $row["id"];  ?>" data-toggle="tooltip"
                                            data-placement="top" title="delete"><i class='fas fa-trash-alt'
                                                style='font-size:15px;color:red;;padding-left:10px;padding-right:10px;'></i></a>
                                    </td>
                                </tr>
                                <?php }
            ?>
                                <?php $i++; ?>

                            </tbody>
                        </table>
                        <?php if($count5 < 1){?>
                        <div class="text-center" id="no_data">
                            <img src="assets/img/no_data.PNG" style="width:20%"><br>
                            <p>No Candidate/s.</p>
                        </div>
                        <?php }?>
                    </div>
                    <div class="card col-5 mr-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">PIO</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
          $i = 0;
          while ($row = mysqli_fetch_array($pio)) { ?>
                                <tr>
                                    <td><?php echo $row['firstname'] .
                ' ' .
                $row['lastname'] .
                '-' .
                $row['partylist']; ?></td>
                                    <td>
                                        <a href="./update_user.php?id=<?php echo $row["id"];  ?>" data-toggle="tooltip"
                                            data-placement="top" title="edit"><i class='fas fa-edit'
                                                style='font-size:15px;color:#568203;padding-left:10px;'></i></a> |<a
                                            href="./delete_data.php?id=<?php echo $row["id"];  ?>" data-toggle="tooltip"
                                            data-placement="top" title="delete"><i class='fas fa-trash-alt'
                                                style='font-size:15px;color:red;;padding-left:10px;padding-right:10px;'></i></a>
                                    </td>
                                </tr>
                                <?php }
          ?>
                                <?php $i++; ?>

                            </tbody>
                        </table>
                        <?php if($count6 < 1){?>
                        <div class="text-center" id="no_data">
                            <img src="assets/img/no_data.PNG" style="width:20%"><br>
                            <p>No Candidate/s.</p>
                        </div>
                        <?php }?>
                    </div>
                </div>

                <div class="row mt-3 ml-4">
                    <div class="card col-5 mr-3">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Peace Officer</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>


                                <?php
            $i = 0;
            while ($row = mysqli_fetch_array($peaceOfficer)) {
                ?>

                                <tr>
                                    <td><?php echo $row['firstname'] .
                    ' ' .
                    $row['lastname'] .
                    '-' .
                    $row['partylist']; ?></td>
                                    <td>
                                        <a href="./update_user.php?id=<?php echo $row["id"]; ?>" data-toggle="tooltip"
                                            data-placement="top" title="edit"><i class='fas fa-edit'
                                                style='font-size:15px;color:#568203;padding-left:10px;'></i></a> |<a
                                            href="./delete_data.php?id=<?php echo $row["id"]; ?>" data-toggle="tooltip"
                                            data-placement="top" title="delete"><i class='fas fa-trash-alt'
                                                style='font-size:15px;color:red;;padding-left:10px;padding-right:10px;'></i></a>
                                    </td>
                                </tr>


                                <?php
            } ?>
                                <?php $i++; ?>

                            </tbody>
                        </table>
                        <?php if($count7 < 1){?>
                        <div class="text-center" id="no_data">
                            <img src="assets/img/no_data.PNG" style="width:20%"><br>
                            <p>No Candidate/s.</p>
                        </div>
                        <?php }?>
                    </div>
                    <div class="card col-5 mr-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Grade 10 Representative</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
          $i = 0;
          while ($row = mysqli_fetch_array($grade10)) { ?>
                                <tr>
                                    <td><?php echo $row['firstname'] .
                ' ' .
                $row['lastname'] .
                '-' .
                $row['partylist']; ?></td>
                                    <td>
                                        <a href="./update_user.php?id=<?php echo $row["id"];  ?>" data-toggle="tooltip"
                                            data-placement="top" title="edit"><i class='fas fa-edit'
                                                style='font-size:15px;color:#568203;padding-left:10px;'></i></a> |<a
                                            href="./delete_data.php?id=<?php echo $row["id"];  ?>" data-toggle="tooltip"
                                            data-placement="top" title="delete"><i class='fas fa-trash-alt'
                                                style='font-size:15px;color:red;;padding-left:10px;padding-right:10px;'></i></a>
                                    </td>
                                </tr>
                                <?php }
          ?>

                            </tbody>
                        </table>
                        <?php if($count8 < 1){?>
                        <div class="text-center" id="no_data">
                            <img src="assets/img/no_data.PNG" style="width:20%"><br>
                            <p>No Candidate/s.</p>
                        </div>
                        <?php }?>
                    </div>
                </div>

                <div class="row mt-3 ml-4">
                    <div class="card col-5 mr-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Grade 9 Representative</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
            $i = 0;
            while ($row = mysqli_fetch_array($grade9)) { ?>
                                <tr>
                                    <td><?php echo $row['firstname'] .
                    ' ' .
                    $row['lastname'] .
                    '-' .
                    $row['partylist']; ?></td>
                                    <td>
                                        <a href="./update_user.php?id=<?php echo $row["id"];  ?>" data-toggle="tooltip"
                                            data-placement="top" title="edit"><i class='fas fa-edit'
                                                style='font-size:15px;color:#568203;padding-left:10px;'></i></a> |<a
                                            href="./delete_data.php?id=<?php echo $row["id"];  ?>" data-toggle="tooltip"
                                            data-placement="top" title="delete"><i class='fas fa-trash-alt'
                                                style='font-size:15px;color:red;;padding-left:10px;padding-right:10px;'></i></a>
                                    </td>
                                </tr>
                                <?php }
            ?>
                                <?php $i++; ?>

                            </tbody>
                        </table>
                        <?php if($count9 < 1){?>
                        <div class="text-center" id="no_data">
                            <img src="assets/img/no_data.PNG" style="width:20%"><br>
                            <p>No Candidate/s.</p>
                        </div>
                        <?php }?>
                    </div>
                    <div class="card col-5 mr-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Grade 8 Representative</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
          $i = 0;
          while ($row = mysqli_fetch_array($grade8)) { ?>
                                <tr>
                                    <td><?php echo $row['firstname'] .
                ' ' .
                $row['lastname'] .
                '-' .
                $row['partylist']; ?></td>
                                    <td>
                                        <a href="./update_user.php?id=<?php echo $row["id"];  ?>" data-toggle="tooltip"
                                            data-placement="top" title="edit"><i class='fas fa-edit'
                                                style='font-size:15px;color:#568203;padding-left:10px;'></i></a> |<a
                                            href="./delete_data.php?id=<?php echo $row["id"];  ?>" data-toggle="tooltip"
                                            data-placement="top" title="delete"><i class='fas fa-trash-alt'
                                                style='font-size:15px;color:red;;padding-left:10px;padding-right:10px;'></i></a>
                                    </td>
                                </tr>
                                <?php }
          ?>
                                <?php $i++; ?>

                            </tbody>
                        </table>
                        <?php if($count10 < 1){?>
                        <div class="text-center" id="no_data">
                            <img src="assets/img/no_data.PNG" style="width:20%"><br>
                            <p>No Candidate/s.</p>
                        </div>
                        <?php }?>
                    </div>
                </div>




        </main>

    </div>
</div>

<?php include_once 'footer.php';?>