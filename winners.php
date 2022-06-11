<?php
include_once 'header.php';
include_once './connection/Connect.php';
session_start();

$count = 0;

if (!$_SESSION['user']) {
    header('login.php');
}

$voters = mysqli_query(
    $conn,
    " SELECT * FROM `users` WHERE type <> 'ADMIN'"
);

$users = mysqli_query(
    $conn,
    " SELECT count(*) as sum FROM `users`"
);
$da=mysqli_fetch_object($users);

$winPres = mysqli_query(
    $conn,
    "SELECT  candidates.firstname as firstname, candidates.lastname as lastname, candidates.partylist as partylist, MAX(score) as max_items
    FROM scores INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE candidates.type = 'President'"
);
$data1=mysqli_fetch_object($winPres);

$pres = mysqli_query(
    $conn,
    "SELECT * FROM `scores` INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE score = '$data1->max_items' AND candidates.type = 'President'"
);
while ($row = mysqli_fetch_assoc($pres)) {
    $record1[] = $row;
}

$winVice = mysqli_query(
    $conn,
    "SELECT candidates.firstname as firstname, candidates.lastname as lastname, candidates.partylist as partylist,
MAX(score) as max_items
FROM scores INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE candidates.type = 'Vice President'"
);
$data2=mysqli_fetch_object($winVice);
$vice = mysqli_query(
    $conn,
    "SELECT * FROM `scores` INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE score = '$data2->max_items' AND candidates.type = 'Vice President'"
);

while ($row = mysqli_fetch_assoc($vice)) {
    $record2[] = $row;
}

$winSec = mysqli_query(
    $conn,
    "SELECT candidates.firstname as firstname, candidates.lastname as lastname, candidates.partylist as partylist,
MAX(score) as max_items
FROM scores INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE candidates.type = 'Secretary'"
);
$data3=mysqli_fetch_object($winSec);
$sec = mysqli_query(
    $conn,
    "SELECT * FROM `scores` INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE score = '$data3->max_items'  AND candidates.type = 'Secretary'"
);
while ($row = mysqli_fetch_assoc($sec)) {
    $record3[] = $row;
}

$winTrea = mysqli_query(
    $conn,
    "SELECT candidates.firstname as firstname, candidates.lastname as lastname, candidates.partylist as partylist,
MAX(score) as max_items
FROM scores INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE candidates.type = 'Treasurer'"
);
$data4=mysqli_fetch_object($winTrea);
$trea = mysqli_query(
    $conn,
    "SELECT * FROM `scores` INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE score = '$data4->max_items'  AND candidates.type = 'Treasurer'"
);
while ($row = mysqli_fetch_assoc($trea)) {
    $record4[] = $row;
}

$winAudi = mysqli_query(
    $conn,
    "SELECT
MAX(score) as max_items
FROM scores INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE candidates.type = 'Auditor'"
);

$data5=mysqli_fetch_object($winAudi);
$aud = mysqli_query(
    $conn,
    "SELECT * FROM `scores` INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE score = '$data5->max_items'  AND candidates.type = 'Auditor'"
);
while ($row = mysqli_fetch_assoc($aud)) {
    $record5[] = $row;
}

$winPIO = mysqli_query(
    $conn,
    "SELECT candidates.firstname as firstname, candidates.lastname as lastname, candidates.partylist as partylist,
MAX(score) as max_items
FROM scores INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE candidates.type = 'PIO'"
);
$data6=mysqli_fetch_object($winPIO);
$pio = mysqli_query(
    $conn,
    "SELECT * FROM `scores` INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE score = '$data6->max_items'  AND candidates.type = 'PIO'"
);
while ($row = mysqli_fetch_assoc($pio)) {
    $record6[] = $row;
}

$winPeace = mysqli_query(
    $conn,
    "SELECT candidates.firstname as firstname, candidates.lastname as lastname, candidates.partylist as partylist,
MAX(score) as max_items
FROM scores INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE candidates.type = 'Peace Officer'"
);
$data7=mysqli_fetch_object($winPeace);
$peace = mysqli_query(
    $conn,
    "SELECT * FROM `scores` INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE score = '$data7->max_items'  AND candidates.type = 'Peace Officer'"
);
while ($row = mysqli_fetch_assoc($peace)) {
    $record7[] = $row;
}

$winTen = mysqli_query(
    $conn,
    "SELECT
MAX(score) as max_items
FROM scores INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE candidates.type = 'Grade 10 Representative'"
);
$data8=mysqli_fetch_object($winTen);
$ten = mysqli_query(
    $conn,
    "SELECT * FROM `scores` INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE score = '$data8->max_items'  AND candidates.type = 'Grade 10 Representative'"
);
while ($row = mysqli_fetch_assoc($ten)) {
    $record8[] = $row;
}



$winNine = mysqli_query(
    $conn,
    "SELECT
MAX(score) as max_items
FROM scores INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE candidates.type = 'Grade 9 Representative'"
);
$data9=mysqli_fetch_object($winNine);
$nine = mysqli_query(
    $conn,
    "SELECT * FROM `scores` INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE score = '$data9->max_items'  AND candidates.type = 'Grade 9 Representative'"
);
while ($row = mysqli_fetch_assoc($nine)) {
    $record9[] = $row;
}

$winEight = mysqli_query(
    $conn,
    "SELECT
MAX(score) as max_items
FROM scores INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE candidates.type = 'Grade 8 Representative'"
);
$data10=mysqli_fetch_object($winEight);
$eight = mysqli_query(
    $conn,
    "SELECT * FROM `scores` INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE score =
'$data10->max_items' AND candidates.type = 'Grade 8 Representative'"
);
while ($row = mysqli_fetch_assoc($eight)) {
    $record10[] = $row;
}




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
                        <a class="nav-link text-white" href="./candidates.php">
                            <i class='fas fa-users mr-2' style='font-size:24px'></i>
                            Candidates
                        </a>
                    </li>
                    <li class="nav-item" id="hover">
                        <a class="nav-link text-white" href="./winners.php" id="active">
                            <i class='fas fa-trophy mr-2' style='font-size:24px'></i>
                            Winners
                        </a>
                    </li>


                </ul>


            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4 pb-5">

            <div class="card text-center">
                <h2 class="card-header text-center">Winners</h2>
                <div class="card-body">
                    <?php if ($da->sum <= 1) {?>

                    <div class="text-center" id="no_data">
                        <img src="assets/img/no_data.PNG" style="width:20%"><br>
                        <p>No Voter/s Registered.</p>
                    </div>
                    <?php } else {?>
                    <?php foreach ($voters as $voter) {
                         $temp = mysqli_query($conn, "SELECT count(users.id) as total FROM `users` WHERE status = 'not yet voted'");
                         $data=mysqli_fetch_object($temp);
                                   
                         $count = $data->total;
                        
                     }
                     ?>

                    <?php if ($count == 0) {?>
                    <?php  foreach ($record1 as $p) { ?>
                    <center>
                        <table class="table w-50">
                            <tbody>
                                <tr>
                                    <td>President</td>
                                    <td class="float-right">
                                        <strong><?php echo  $p['firstname']." ".$p['lastname']."-".$p['partylist'];?></strong>
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                        <?php }?>

                        <?php  foreach ($record2 as $p) { ?>
                        <table class="table w-50">
                            <tbody>
                                <tr>
                                    <td>Vice President</td>
                                    <td class="float-right">
                                        <strong><?php echo  $p['firstname']." ".$p['lastname']."-".$p['partylist'];?></strong>
                                </tr>

                            </tbody>
                        </table>
                        <?php }?>

                        <?php  foreach ($record3 as $p) { ?>
                        <table class="table w-50">
                            <tbody>
                                <tr>
                                    <td>Secretary</td>
                                    <td class="float-right">
                                        <strong><?php echo  $p['firstname']." ".$p['lastname']."-".$p['partylist'];?></strong>
                                </tr>

                            </tbody>
                        </table>
                        <?php }?>

                        <?php  foreach ($record4 as $p) { ?>
                        <table class="table w-50">
                            <tbody>
                                <tr>
                                    <td>Treasurer</td>
                                    <td class="float-right">
                                        <strong><?php echo  $p['firstname']." ".$p['lastname']."-".$p['partylist'];?></strong>
                                </tr>

                            </tbody>
                        </table>
                        <?php }?>

                        <?php  foreach ($record5 as $p) { ?>
                        <table class="table w-50">
                            <tbody>
                                <tr>
                                    <td>Auditor</td>
                                    <td class="float-right">
                                        <strong><?php echo  $p['firstname']." ".$p['lastname']."-".$p['partylist'];?></strong>
                                </tr>

                            </tbody>
                        </table>
                        <?php }?>

                        <?php  foreach ($record6 as $p) { ?>
                        <table class="table w-50">
                            <tbody>
                                <tr>
                                    <td>PIO</td>
                                    <td class="float-right">
                                        <strong><?php echo  $p['firstname']." ".$p['lastname']."-".$p['partylist'];?></strong>
                                </tr>

                            </tbody>
                        </table>
                        <?php }?>

                        <?php  foreach ($record7 as $p) { ?>
                        <table class="table w-50">
                            <tbody>
                                <tr>
                                    <td>Peace Officer</td>
                                    <td class="float-right">
                                        <strong><?php echo  $p['firstname']." ".$p['lastname']."-".$p['partylist'];?></strong>
                                </tr>

                            </tbody>
                        </table>
                        <?php }?>

                        <?php  foreach ($record8 as $p) { ?>
                        <table class="table w-50">
                            <tbody>
                                <tr>
                                    <td>Grade 10 Representative</td>
                                    <td class="float-right">
                                        <strong><?php echo  $p['firstname']." ".$p['lastname']."-".$p['partylist'];?></strong>
                                </tr>

                            </tbody>
                        </table>
                        <?php }?>

                        <?php  foreach ($record9 as $p) { ?>
                        <table class="table w-50">
                            <tbody>
                                <tr>
                                    <td>Grade 9 Representative</td>
                                    <td class="float-right">
                                        <strong><?php echo  $p['firstname']." ".$p['lastname']."-".$p['partylist'];?></strong>
                                </tr>

                            </tbody>
                        </table>
                        <?php }?>

                        <?php  foreach ($record10 as $p) { ?>
                        <table class="table w-50">
                            <tbody>
                                <tr>
                                    <td>Grade 8 Representative</td>
                                    <td class="float-right">
                                        <strong><?php echo  $p['firstname']." ".$p['lastname']."-".$p['partylist'];?></strong>
                                </tr>

                            </tbody>
                        </table>
                    </center>
                    <?php }?> <?php } else {?> <div class=" alert alert-warning" role="alert">
                        <p>Waiting for the other voters to vote, result will be viewed until all voters will voted
                        </p>
                    </div>
                    <?php } }?>

                </div>

            </div>
        </main>

        <?php include_once 'footer.php';?>