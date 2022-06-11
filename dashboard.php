<?php
include_once 'header.php';
include_once './connection/Connect.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('location: login.php');
}

$id = $_SESSION['user']['id'];

if (isset($_POST['vote'])) {
    $status = 'voted';
    $sta = mysqli_query($conn,"UPDATE users SET status = '$status' WHERE id = '$id'");
    if (!empty($_POST['pres'])) {
        foreach ($_POST['pres'] as $value) {
            $user_id = $_POST['userid'];
            $sql = "INSERT INTO votes (userid,candidate_id)
           VALUES ('$user_id','$value')";
            if (mysqli_query($conn, $sql)) {
                header('location: success.php');
            }
        }
    }
    if (!empty($_POST['vicePres'])) {
        foreach ($_POST['vicePres'] as $value) {
            $user_id = $_POST['userid'];
            $sql = "INSERT INTO votes (userid,candidate_id)
VALUES ('$user_id','$value')";
            if (mysqli_query($conn, $sql)) {
                header('location: success.php');
            }
        }
    }
    if (!empty($_POST['sec'])) {
        foreach ($_POST['sec'] as $value) {
            $user_id = $_POST['userid'];
            $sql = "INSERT INTO votes (userid,candidate_id)
VALUES ('$user_id','$value')";
            if (mysqli_query($conn, $sql)) {
                header('location: success.php');
            }
        }
    }
    if (!empty($_POST['tre'])) {
        foreach ($_POST['tre'] as $value) {
            $user_id = $_POST['userid'];
            $sql = "INSERT INTO votes (userid,candidate_id)
VALUES ('$user_id','$value')";
            if (mysqli_query($conn, $sql)) {
                header('location: success.php');
            }
        }
    }
    if (!empty($_POST['aud'])) {
        foreach ($_POST['aud'] as $value) {
            $user_id = $_POST['userid'];
            $sql = "INSERT INTO votes (userid,candidate_id)
VALUES ('$user_id','$value')";
            if (mysqli_query($conn, $sql)) {
                header('location: success.php');
            }
        }
    }
    if (!empty($_POST['pio'])) {
        foreach ($_POST['pio'] as $value) {
            $user_id = $_POST['userid'];
            $sql = "INSERT INTO votes (userid,candidate_id)
VALUES ('$user_id','$value')";
            if (mysqli_query($conn, $sql)) {
                header('location: success.php');
            }
        }
    }

    if (!empty($_POST['pea'])) {
        foreach ($_POST['pea'] as $value) {
            $user_id = $_POST['userid'];
            $sql = "INSERT INTO votes (userid,candidate_id)
VALUES ('$user_id','$value')";
            if (mysqli_query($conn, $sql)) {
                header('location: success.php');
            }
        }
    }

    if (!empty($_POST['ten'])) {
        foreach ($_POST['ten'] as $value) {
            $user_id = $_POST['userid'];
            $sql = "INSERT INTO votes (userid,candidate_id)
VALUES ('$user_id','$value')";
            if (mysqli_query($conn, $sql)) {
                header('location: success.php');
            }
        }
    }

    if (!empty($_POST['nine'])) {
        foreach ($_POST['nine'] as $value) {
            $user_id = $_POST['userid'];
            $sql = "INSERT INTO votes (userid,candidate_id)
VALUES ('$user_id','$value')";
            if (mysqli_query($conn, $sql)) {
                header('location: success.php');
            }
        }
    }

    if (!empty($_POST['eight'])) {
        foreach ($_POST['eight'] as $value) {
            $user_id = $_POST['userid'];
            $sql = "INSERT INTO votes (userid,candidate_id)
VALUES ('$user_id','$value')";
            if (mysqli_query($conn, $sql)) {
                header('location: success.php');
            }
        }
    }
    
}
//retrieve data
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
$count4 = mysqli_num_rows($treasurer);

$auditor = mysqli_query(
    $conn,
    "SELECT * FROM `candidates` WHERE type = 'Auditor';"
);
$count5 = mysqli_num_rows($auditor);

$pio = mysqli_query($conn, "SELECT * FROM `candidates` WHERE type = 'PIO';");
$count6 = mysqli_num_rows($pio);

$peaceOfficer = mysqli_query(
    $conn,
    "SELECT * FROM `candidates` WHERE type = 'Peace Officer';"
);
$count7 = mysqli_num_rows($peaceOfficer);

$grade10 = mysqli_query(
    $conn,
    "SELECT * FROM `candidates` WHERE type = 'Grade 10 Representative';"
);
$count8 = mysqli_num_rows($grade10);

$grade9 = mysqli_query(
    $conn,
    "SELECT * FROM `candidates` WHERE type = 'Grade 9 Representative';"
);
$count9 = mysqli_num_rows($grade9);

$grade8 = mysqli_query(
    $conn,
    "SELECT * FROM `candidates` WHERE type = 'Grade 8 Representative';"
);
$count10 = mysqli_num_rows($grade8);


//admin
$votes = mysqli_query($conn, " SELECT * FROM `votes`");
$record = array();
while ($row = mysqli_fetch_assoc($votes)) {
    $record[] = $row;
}
//votes

$pres= mysqli_query(
    $conn,
    "SELECT candidates.firstname, candidates.lastname, candidates.partylist, score FROM `scores` INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE candidates.type = 'President' ORDER BY score DESC"
);
$presRow= mysqli_query(
    $conn,
    "SELECT * FROM `candidates` WHERE type = 'President'"
);
$presRe = array();
while ($row = mysqli_fetch_assoc($presRow)) {
    $presRe[] = $row;
}

$vicePre = mysqli_query(
    $conn,
    "SELECT candidates.firstname, candidates.lastname, candidates.partylist, score FROM `scores` INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE candidates.type = 'Vice President' ORDER BY score DESC"
);
$viceRow= mysqli_query(
    $conn,
    "SELECT * FROM `candidates` WHERE type = 'Vice President'"
);
$viceRe = array();
while ($row = mysqli_fetch_assoc($viceRow)) {
    $viceRe[] = $row;
}

$secre = mysqli_query(
    $conn,
    "SELECT candidates.firstname, candidates.lastname, candidates.partylist, score FROM `scores` INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE candidates.type = 'Secretary' ORDER BY score DESC"
);
$secRow= mysqli_query(
    $conn,
    "SELECT * FROM `candidates` WHERE type = 'Secretary'"
);
$secRe = array();
while ($row = mysqli_fetch_assoc($secRow)) {
    $secRe[] = $row;
}

$treas = mysqli_query(
    $conn,
    "SELECT candidates.firstname, candidates.lastname, candidates.partylist, score FROM `scores` INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE candidates.type = 'Treasurer' ORDER BY score DESC"
);
$treasRow= mysqli_query(
    $conn,
    "SELECT * FROM `candidates` WHERE type = 'Treasurer'"
);
$treasRe = array();
while ($row = mysqli_fetch_assoc($treasRow)) {
    $treasRe[] = $row;
}

$audit = mysqli_query(
    $conn,
    "SELECT candidates.firstname, candidates.lastname, candidates.partylist, score FROM `scores` INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE candidates.type = 'Auditor' ORDER BY score DESC"
);
$auditRow= mysqli_query(
    $conn,
    "SELECT * FROM `candidates` WHERE type = 'Auditor'"
);
$auditRe = array();
while ($row = mysqli_fetch_assoc($auditRow)) {
    $auditRe[] = $row;
}

$PIO= mysqli_query($conn, "SELECT candidates.firstname, candidates.lastname, candidates.partylist, score FROM `scores` INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE candidates.type = 'PIO' ORDER BY score DESC");
$pioRow= mysqli_query(
    $conn,
    "SELECT * FROM `candidates` WHERE type = 'PIO'"
);
$pioRe = array();
while ($row = mysqli_fetch_assoc($pioRow)) {
    $pioRe[] = $row;
}

$peace = mysqli_query(
    $conn,
    "SELECT candidates.firstname, candidates.lastname, candidates.partylist, score FROM `scores` INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE candidates.type = 'Peace Officer' ORDER BY score DESC"
);
$peaceRow= mysqli_query(
    $conn,
    "SELECT * FROM `candidates` WHERE type = 'Peace Officer'"
);
$peaceRe = array();
while ($row = mysqli_fetch_assoc($peaceRow)) {
    $peaceRe[] = $row;
}

$gradeTen = mysqli_query(
    $conn,
    "SELECT candidates.firstname, candidates.lastname, candidates.partylist, score FROM `scores` INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE candidates.type = 'Grade 10 Representative' ORDER BY score DESC"
);
$tenRow= mysqli_query(
    $conn,
    "SELECT * FROM `candidates` WHERE type = 'Grade 10 Representative'"
);
$tenRe = array();
while ($row = mysqli_fetch_assoc($tenRow)) {
    $tenRe[] = $row;
}

$gradeNine = mysqli_query(
    $conn,
    "SELECT candidates.firstname, candidates.lastname, candidates.partylist, score FROM `scores` INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE candidates.type = 'Grade 9 Representative' ORDER BY score DESC"
);
$nineRow= mysqli_query(
    $conn,
    "SELECT * FROM `candidates` WHERE type = 'Grade 9 Representative'"
);
$nineRe = array();
while ($row = mysqli_fetch_assoc($nineRow)) {
    $nineRe[] = $row;
}

$gradeEight = mysqli_query(
    $conn,
    "SELECT candidates.firstname, candidates.lastname, candidates.partylist, score FROM `scores` INNER JOIN candidates ON candidates.id = scores.candidates_id WHERE candidates.type = 'Grade 8 Representative' ORDER BY score DESC"
);
$eightRow= mysqli_query(
    $conn,
    "SELECT * FROM `candidates` WHERE type = 'Grade 8 Representative'"
);
$eightRe = array();
while ($row = mysqli_fetch_assoc($eightRow)) {
    $eightRe[] = $row;
}

?>
<div class="container-fluid ">
    <?php if ($_SESSION['user']['type'] == 'ADMIN') { ?>
    <div class="row">
        <nav class="col-md-2 d-none d-md-block sticky p-0" style="background-color: #0c4dad" id="side">
            <div class="sidebar-sticky" style="margin-bottom:400%;">
                <ul class="nav flex-column">
                    <li class="nav-item mt-3">
                        <a class="nav-link active " style="color: black;" href="#">
                            <img src="./assets/img/profile.png" style="height: 100px; width: 100px;" alt=""
                                class="rounded-circle offset-2"><br>
                            <h5 class="ml-4 text-white"><?php echo $_SESSION['user']['firstname'] .
                                ' ' .
                                $_SESSION['user']['lastname']; ?></h5>
                        </a>
                        <hr>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active text-white" href="dashboard.php" id="active">
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
                        <a class="nav-link text-white" href="./winners.php">
                            <i class='fas fa-trophy mr-2' style='font-size:24px'></i>
                            Winners
                        </a>
                    </li>


                </ul>



            </div>
        </nav>


        <?php } ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-9 pt-3 px-10 pb-5">

            <?php if ($_SESSION['user']['type'] == 'ADMIN') { ?>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-sm-10">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">PRESIDENT</th>
                                            <th scope="col">VOTES</th>
                                            <th scope="col">RANK</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $rank = 0;
                                        $last_score = false;
                                        $rows = 0;

                                        while( $row = mysqli_fetch_array( $pres ) ){
                                        $rows++;
                                        if( $last_score!= $row['score'] ){
                                        $last_score = $row['score'];
                                        $rank = $rows;
                                        }?>

                                        <tr>


                                            <td> <span style="font-size: 20px;"><?php echo $row['firstname'] .                ' ' .
                    $row['lastname'] .
                    '-' .
                    $row['partylist']; ?></span><br>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                        style="width: <?php echo $row['score'];?>%" aria-valuenow="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>

                                            <td>

                                                <span
                                                    style="font-size: 20px; font-weight: bold"><?php echo $row['score']?></span>
                                            </td>

                                            <td>

                                                <span style=" font-size: 20px;"><?php echo $rank?></span>
                                            </td>

                                        </tr>

                                        <?php } ?>
                                        <?php foreach ($presRe as $rec1) {
                                         
                                    $partyList = $rec1['partylist'];
                                    $PresScore = mysqli_query($conn, "SELECT count(votes.id) as total from votes INNER JOIN candidates ON candidates.id = votes.candidate_id WHERE candidates.type = 'President' and candidates.partylist = '$partyList'");
                                    $data=mysqli_fetch_object($PresScore);
                                    $id = $rec1['id'];
                                    $totalVotes = $data->total;
                                    mysqli_query($conn, "DELETE FROM scores WHERE candidates_id = '$id'");
                                    mysqli_query($conn, "INSERT INTO scores (candidates_id, score) VALUES ('$id', '$totalVotes')");
                                        }?>
                                    </tbody>
                                </table>
                                <?php if($count1 < 1){?>
                                <div class="text-center" id="no_data">
                                    <img src="assets/img/no_data.PNG" style="width:10%"><br>
                                    <p>No Candidate/s for President.</p>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-sm-10">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">VICE PRESEDENT</th>
                                            <th scope="col">VOTES</th>
                                            <th scope="col">RANK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                        $rank = 0;
                                        $last_score = false;
                                        $rows = 0;

                                        while( $row = mysqli_fetch_array( $vicePre ) ){
                                        $rows++;
                                        if( $last_score!= $row['score'] ){
                                        $last_score = $row['score'];
                                        $rank = $rows;
                                        }?>

                                        <tr>

                                            <td> <span style="font-size: 20px;"><?php echo $row['firstname'] .                ' ' .
                    $row['lastname'] .
                    '-' .
                    $row['partylist']; ?></span><br>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                        style="width: <?php echo $row['score'];?>%" aria-valuenow="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>

                                            <td>

                                                <span
                                                    style="font-size: 20px; font-weight: bold"><?php echo $row['score']?></span>
                                            </td>

                                            <td>

                                                <span style="font-size: 20px;"><?php echo $rank?></span>
                                            </td>

                                        </tr>
                                        <?php } ?>
                                        <?php foreach ($viceRe as $rec1) {
                                    $partyList = $rec1['partylist'];
                                    $PresScore = mysqli_query($conn, "SELECT count(votes.id) as total from votes INNER JOIN candidates ON candidates.id = votes.candidate_id WHERE candidates.type = 'Vice President' and candidates.partylist = '$partyList'");
                                    $data=mysqli_fetch_object($PresScore);
                                    $id = $rec1['id'];
                                    $totalVotes = $data->total;
                                    mysqli_query($conn, "DELETE FROM scores WHERE candidates_id = '$id'");
                                    mysqli_query($conn, "INSERT INTO scores (candidates_id, score) VALUES ('$id', '$totalVotes')");
                                        }?>
                                    </tbody>
                                </table>
                                </tbody>
                                </table>
                                <?php if($count2 < 1){?>
                                <div class="text-center" id="no_data">
                                    <img src="assets/img/no_data.PNG" style="width:10%"><br>
                                    <p>No Candidate/s for Vice President.</p>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-sm-10">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">SECRETARY</th>
                                            <th scope="col">VOTES</th>
                                            <th scope="col">RANK</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $rank = 0;
                                        $last_score = false;
                                        $rows = 0;

                                        while( $row = mysqli_fetch_array( $secre ) ){
                                        $rows++;
                                        if( $last_score!= $row['score'] ){
                                        $last_score = $row['score'];
                                        $rank = $rows;
                                        }?>

                                        <tr>

                                            <td> <span style="font-size: 20px;"><?php echo $row['firstname'] .                ' ' .
                    $row['lastname'] .
                    '-' .
                    $row['partylist']; ?></span><br>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                        style="width: <?php echo $row['score'];?>%" aria-valuenow="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>

                                            <td>

                                                <span
                                                    style="font-size: 20px; font-weight: bold"><?php echo $row['score']?></span>
                                            </td>

                                            <td>

                                                <span style="font-size: 20px;"><?php echo $rank?></span>
                                            </td>

                                        </tr>
                                        <?php } ?>
                                        <?php foreach ($secRe as $rec1) {
                                    $partyList = $rec1['partylist'];
                                    $PresScore = mysqli_query($conn, "SELECT count(votes.id) as total from votes INNER JOIN candidates ON candidates.id = votes.candidate_id WHERE candidates.type = 'Secretary' and candidates.partylist = '$partyList'");
                                    $data=mysqli_fetch_object($PresScore);
                                    $id = $rec1['id'];
                                    $totalVotes = $data->total;
                                    mysqli_query($conn, "DELETE FROM scores WHERE candidates_id = '$id'");
                                    mysqli_query($conn, "INSERT INTO scores (candidates_id, score) VALUES ('$id', '$totalVotes')");
                                        }?>
                                    </tbody>
                                </table>
                                </tbody>
                                </table>
                                <?php if($count3 < 1){?>
                                <div class="text-center" id="no_data">
                                    <img src="assets/img/no_data.PNG" style="width:10%"><br>
                                    <p>No Candidate/s for Secretary.</p>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-sm-10">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">TREASURER</th>
                                            <th scope="col">VOTES</th>
                                            <th scope="col">RANK</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $rank = 0;
                                        $last_score = false;
                                        $rows = 0;

                                        while( $row = mysqli_fetch_array( $treas ) ){
                                        $rows++;
                                        if( $last_score!= $row['score'] ){
                                        $last_score = $row['score'];
                                        $rank = $rows;
                                        }?>

                                        <tr>

                                            <td> <span style="font-size: 20px;"><?php echo $row['firstname'] .                ' ' .
                    $row['lastname'] .
                    '-' .
                    $row['partylist']; ?></span><br>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                        style="width: <?php echo $row['score'];?>%" aria-valuenow="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>

                                            <td>

                                                <span
                                                    style="font-size: 20px; font-weight: bold"><?php echo $row['score']?></span>
                                            </td>

                                            <td>

                                                <span style="font-size: 20px;"><?php echo $rank?></span>
                                            </td>

                                        </tr>
                                        <?php } ?>
                                        <?php foreach ($treasRe as $rec1) {
                                    $partyList = $rec1['partylist'];
                                    $PresScore = mysqli_query($conn, "SELECT count(votes.id) as total from votes INNER JOIN candidates ON candidates.id = votes.candidate_id WHERE candidates.type = 'Treasurer' and candidates.partylist = '$partyList'");
                                    $data=mysqli_fetch_object($PresScore);
                                    $id = $rec1['id'];
                                    $totalVotes = $data->total;
                                    mysqli_query($conn, "DELETE FROM scores WHERE candidates_id = '$id'");
                                    mysqli_query($conn, "INSERT INTO scores (candidates_id, score) VALUES ('$id', '$totalVotes')");
                                        }?>
                                    </tbody>
                                </table>
                                </tbody>
                                </table>
                                <?php if($count4 < 1){?>
                                <div class="text-center" id="no_data">
                                    <img src="assets/img/no_data.PNG" style="width:10%"><br>
                                    <p>No Candidate/s for Treasurer.</p>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-sm-10">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">AUDITOR</th>
                                            <th scope="col">VOTES</th>
                                            <th scope="col">RANK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $rank = 0;
                                        $last_score = false;
                                        $rows = 0;

                                        while( $row = mysqli_fetch_array( $audit ) ){
                                        $rows++;
                                        if( $last_score!= $row['score'] ){
                                        $last_score = $row['score'];
                                        $rank = $rows;
                                        }?>

                                        <tr>

                                            <td> <span style="font-size: 20px;"><?php echo $row['firstname'] .                ' ' .
                    $row['lastname'] .
                    '-' .
                    $row['partylist']; ?></span><br>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                        style="width: <?php echo $row['score'];?>%" aria-valuenow="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>

                                            <td>

                                                <span
                                                    style="font-size: 20px; font-weight: bold"><?php echo $row['score']?></span>
                                            </td>

                                            <td>

                                                <span style="font-size: 20px;"><?php echo $rank?></span>
                                            </td>

                                        </tr>
                                        <?php } ?>
                                        <?php foreach ($auditRe as $rec1) {
                                    $partyList = $rec1['partylist'];
                                    $PresScore = mysqli_query($conn, "SELECT count(votes.id) as total from votes INNER JOIN candidates ON candidates.id = votes.candidate_id WHERE candidates.type = 'Auditor' and candidates.partylist = '$partyList'");
                                    $data=mysqli_fetch_object($PresScore);
                                    $id = $rec1['id'];
                                    $totalVotes = $data->total;
                                    mysqli_query($conn, "DELETE FROM scores WHERE candidates_id = '$id'");
                                    mysqli_query($conn, "INSERT INTO scores (candidates_id, score) VALUES ('$id', '$totalVotes')");
                                        }?>
                                    </tbody>
                                </table>
                                <?php if($count5 < 1){?>
                                <div class="text-center" id="no_data">
                                    <img src="assets/img/no_data.PNG" style="width:10%"><br>
                                    <p>No Candidate/s for Auditor.</p>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-sm-10">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">PIO(Public Information Officer)</th>
                                            <th scope="col">VOTES</th>
                                            <th scope="col">RANK</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $rank = 0;
                                        $last_score = false;
                                        $rows = 0;

                                        while( $row = mysqli_fetch_array( $PIO ) ){
                                        $rows++;
                                        if( $last_score!= $row['score'] ){
                                        $last_score = $row['score'];
                                        $rank = $rows;
                                        }?>

                                        <tr>

                                            <td> <span style="font-size: 20px;"><?php echo $row['firstname'] .                ' ' .
                    $row['lastname'] .
                    '-' .
                    $row['partylist']; ?></span><br>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                        style="width: <?php echo $row['score'];?>%" aria-valuenow="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>

                                            <td>

                                                <span
                                                    style="font-size: 20px; font-weight: bold"><?php echo $row['score']?></span>
                                            </td>

                                            <td>

                                                <span style="font-size: 20px;"><?php echo $rank?></span>
                                            </td>

                                        </tr>
                                        <?php } ?>
                                        <?php foreach ($pioRe as $rec1) {
                                    $partyList = $rec1['partylist'];
                                    $PresScore = mysqli_query($conn, "SELECT count(votes.id) as total from votes INNER JOIN candidates ON candidates.id = votes.candidate_id WHERE candidates.type = 'PIO' and candidates.partylist = '$partyList'");
                                    $data=mysqli_fetch_object($PresScore);
                                    $id = $rec1['id'];
                                    $totalVotes = $data->total;
                                    mysqli_query($conn, "DELETE FROM scores WHERE candidates_id = '$id'");
                                    mysqli_query($conn, "INSERT INTO scores (candidates_id, score) VALUES ('$id', '$totalVotes')");
                                        }?>
                                    </tbody>
                                </table>
                                <?php if($count6 < 1){?>
                                <div class="text-center" id="no_data">
                                    <img src="assets/img/no_data.PNG" style="width:10%"><br>
                                    <p>No Candidate/s for PIO.</p>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-sm-10">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">PEACE OFFICER</th>
                                            <th scope="col">VOTES</th>
                                            <th scope="col">RANK</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $rank = 0;
                                        $last_score = false;
                                        $rows = 0;

                                        while( $row = mysqli_fetch_array( $peace ) ){
                                        $rows++;
                                        if( $last_score!= $row['score'] ){
                                        $last_score = $row['score'];
                                        $rank = $rows;
                                        }?>

                                        <tr>

                                            <td> <span style="font-size: 20px;"><?php echo $row['firstname'] .                ' ' .
                    $row['lastname'] .
                    '-' .
                    $row['partylist']; ?></span><br>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                        style="width: <?php echo $row['score'];?>%" aria-valuenow="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>

                                            <td>

                                                <span
                                                    style="font-size: 20px; font-weight: bold"><?php echo $row['score']?></span>
                                            </td>

                                            <td>

                                                <span style="font-size: 20px;"><?php echo $rank?></span>
                                            </td>

                                        </tr>

                                        <?php } ?>
                                        <?php foreach ($peaceRe as $rec1) {
                                    $partyList = $rec1['partylist'];
                                    $PresScore = mysqli_query($conn, "SELECT count(votes.id) as total from votes INNER JOIN candidates ON candidates.id = votes.candidate_id WHERE candidates.type = 'Peace Officer' and candidates.partylist = '$partyList'");
                                    $data=mysqli_fetch_object($PresScore);
                                    $id = $rec1['id'];
                                    $totalVotes = $data->total;
                                    mysqli_query($conn, "DELETE FROM scores WHERE candidates_id = '$id'");
                                    mysqli_query($conn, "INSERT INTO scores (candidates_id, score) VALUES ('$id', '$totalVotes')");
                                        }?>
                                    </tbody>
                                </table>
                                <?php if($count7 < 1){?>
                                <div class="text-center" id="no_data">
                                    <img src="assets/img/no_data.PNG" style="width:10%"><br>
                                    <p>No Candidate/s for Peace Officer.</p>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-sm-10">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">GRADE 10 REPRESENTATIVE</th>
                                            <th scope="col">VOTES</th>
                                            <th scope="col">RANK</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $rank = 0;
                                        $last_score = false;
                                        $rows = 0;

                                        while( $row = mysqli_fetch_array( $gradeTen ) ){
                                        $rows++;
                                        if( $last_score!= $row['score'] ){
                                        $last_score = $row['score'];
                                        $rank = $rows;
                                        }?>

                                        <tr>

                                            <td> <span style="font-size: 20px;"><?php echo $row['firstname'] .                ' ' .
                    $row['lastname'] .
                    '-' .
                    $row['partylist']; ?></span><br>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                        style="width: <?php echo $row['score'];?>%" aria-valuenow="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>

                                            <td>

                                                <span
                                                    style="font-size: 20px; font-weight: bold"><?php echo $row['score']?></span>
                                            </td>

                                            <td>

                                                <span style="font-size: 20px;"><?php echo $rank?></span>
                                            </td>

                                        </tr>
                                        <?php } ?>
                                        <?php foreach ($tenRe as $rec1) {
                                    $partyList = $rec1['partylist'];
                                    $PresScore = mysqli_query($conn, "SELECT count(votes.id) as total from votes INNER JOIN candidates ON candidates.id = votes.candidate_id WHERE candidates.type = 'Grade 10 Representative' and candidates.partylist = '$partyList'");
                                    $data=mysqli_fetch_object($PresScore);
                                    $id = $rec1['id'];
                                    $totalVotes = $data->total;
                                    mysqli_query($conn, "DELETE FROM scores WHERE candidates_id = '$id'");
                                    mysqli_query($conn, "INSERT INTO scores (candidates_id, score) VALUES ('$id', '$totalVotes')");
                                        }?>
                                    </tbody>
                                </table>
                                <?php if($count8 < 1){?>
                                <div class="text-center" id="no_data">
                                    <img src="assets/img/no_data.PNG" style="width:10%"><br>
                                    <p>No Candidate/s for Grade 10 Representative.</p>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-sm-10">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">GRADE 9 REPRESENTATIVE</th>
                                            <th scope="col">VOTES</th>
                                            <th scope="col">RANK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $rank = 0;
                                        $last_score = false;
                                        $rows = 0;

                                        while( $row = mysqli_fetch_array( $gradeNine ) ){
                                        $rows++;
                                        if( $last_score!= $row['score'] ){
                                        $last_score = $row['score'];
                                        $rank = $rows;
                                        }?>

                                        <tr>

                                            <td> <span style="font-size: 20px;"><?php echo $row['firstname'] .                ' ' .
                    $row['lastname'] .
                    '-' .
                    $row['partylist']; ?></span><br>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                        style="width: <?php echo $row['score'];?>%" aria-valuenow="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>

                                            <td>

                                                <span
                                                    style="font-size: 20px; font-weight: bold"><?php echo $row['score']?></span>
                                            </td>

                                            <td>

                                                <span style="font-size: 20px;"><?php echo $rank?></span>
                                            </td>

                                        </tr>
                                        <?php } ?>
                                        <?php foreach ($nineRe as $rec1) {
                                    $partyList = $rec1['partylist'];
                                    $PresScore = mysqli_query($conn, "SELECT count(votes.id) as total from votes INNER JOIN candidates ON candidates.id = votes.candidate_id WHERE candidates.type = 'Grade 9 Representative' and candidates.partylist = '$partyList'");
                                    $data=mysqli_fetch_object($PresScore);
                                    $id = $rec1['id'];
                                    $totalVotes = $data->total;
                                    mysqli_query($conn, "DELETE FROM scores WHERE candidates_id = '$id'");
                                    mysqli_query($conn, "INSERT INTO scores (candidates_id, score) VALUES ('$id', '$totalVotes')");
                                        }?>
                                    </tbody>
                                </table>
                                <?php if($count9 < 1){?>
                                <div class="text-center" id="no_data">
                                    <img src="assets/img/no_data.PNG" style="width:10%"><br>
                                    <p>No Candidate/s for Grade 9 Representative.</p>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-sm-10">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">GRADE 8 REPRESENTATIVE</th>
                                            <th scope="col">VOTES</th>
                                            <th scope="col">RANK</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $rank = 0;
                                        $last_score = false;
                                        $rows = 0;

                                        while( $row = mysqli_fetch_array( $gradeEight ) ){
                                        $rows++;
                                        if( $last_score!= $row['score'] ){
                                        $last_score = $row['score'];
                                        $rank = $rows;
                                        }?>

                                        <tr>

                                            <td> <span style="font-size: 20px;"><?php echo $row['firstname'] .                ' ' .
                    $row['lastname'] .
                    '-' .
                    $row['partylist']; ?></span><br>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                        style="width: <?php echo $row['score'];?>%" aria-valuenow="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </td>

                                            <td>

                                                <span
                                                    style="font-size: 20px; font-weight: bold"><?php echo $row['score']?></span>
                                            </td>

                                            <td>

                                                <span style="font-size: 20px;"><?php echo $rank?></span>
                                            </td>

                                        </tr>
                                        <?php } ?>
                                        <?php foreach ($eightRe as $rec1) {
                                    $partyList = $rec1['partylist'];
                                    $PresScore = mysqli_query($conn, "SELECT count(votes.id) as total from votes INNER JOIN candidates ON candidates.id = votes.candidate_id WHERE candidates.type = 'Grade 8 Representative' and candidates.partylist = '$partyList'");
                                    $data=mysqli_fetch_object($PresScore);
                                    $id = $rec1['id'];
                                    $totalVotes = $data->total;
                                    mysqli_query($conn, "DELETE FROM scores WHERE candidates_id = '$id'");
                                    mysqli_query($conn, "INSERT INTO scores (candidates_id, score) VALUES ('$id', '$totalVotes')");
                                        }?>
                                    </tbody>
                                </table>
                                <?php if($count10 < 1){?>
                                <div class="text-center" id="no_data">
                                    <img src="assets/img/no_data.PNG" style="width:10%"><br>
                                    <p>No Candidate/s for Grade 8 Representative.</p>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php  } ?>

        </main>

        <?php if ($_SESSION['user']['type'] != 'ADMIN') { ?>


        <?php if ($_SESSION['user']['status'] == 'voted') {
        header('location: success.php');
        } ?>
        <form method="post">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6  mt-3">
                        <div class="card">
                            <div class="card-header text-center">
                                <h4>PRESIDENT</h4>
                            </div>
                            <div class="card-body">

                                <table class="table table-striped">
                                    <tbody>
                                        <?php
                                    $i = 0;
                                    while (
                                        $row = mysqli_fetch_array($president)
                                    ) { ?>

                                        <tr>
                                            <td><?php echo $row['firstname'] .
                                            ' ' .
                                            $row['lastname'] .
                                            '-' .
                                            $row['partylist']; ?></td>
                                            <td>
                                                <input type="radio" class="exampleCheck1" name="pres[]" value="<?php echo $row[
                                                                    'id'
                                                                ]; ?>" required>

                                                <input type="text" name="userid" value="<?php echo $_SESSION[
                                                                'user'
                                                            ]['id']; ?>" hidden>

                                            </td>


                                        </tr>


                                        <?php $i++;}
                                    ?>
                                    </tbody>
                                </table>
                                <?php if($count1 < 1){?>
                                <div class="text-center" id="no_data">
                                    <img src="assets/img/no_data.PNG" style="width:20%"><br>
                                    <p>No Candidate/s.</p>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 mt-3">
                        <div class="card">
                            <div class="card-header text-center">
                                <h4>VICE PRESIDENT</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <tbody>
                                        <?php
                                    $i = 0;
                                    while (
                                        $row = mysqli_fetch_array(
                                            $vicePresident
                                        )
                                    ) { ?>
                                        <tr>
                                            <td><?php echo $row['firstname'] .
                                            ' ' .
                                            $row['lastname'] .
                                            '-' .
                                            $row['partylist']; ?></td>
                                            <td>
                                                <input type="radio" class="exampleCheck2" name="vicePres[]" value="<?php echo $row[
                                                                    'id'
                                                                ]; ?>" required>

                                                <input type="text" name="userid" value="<?php echo $_SESSION[
                                                                'user'
                                                            ]['id']; ?>" hidden>

                                            </td>

                                        </tr>
                                        <?php $i++;}
                                    ?>
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
                    </div>
                </div>


            </div>




            <div class="container">
                <div class="row">
                    <div class="col-sm-6 mt-3">
                        <div class="card">
                            <div class="card-header text-center">
                                <h4>SECRETARY</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <tbody>
                                        <?php
                                    $i = 0;
                                    while (
                                        $row = mysqli_fetch_array($secretary)
                                    ) { ?>
                                        <tr>
                                            <td><?php echo $row['firstname'] .
                                            ' ' .
                                            $row['lastname'] .
                                            '-' .
                                            $row['partylist']; ?></td>
                                            <td>
                                                <input type="radio" class="exampleCheck3" name="sec[]" value="<?php echo $row[
                                                                    'id'
                                                                ]; ?>" required>

                                                <input type="text" name="userid" value="<?php echo $_SESSION[
                                                                'user'
                                                            ]['id']; ?>" hidden>

                                            </td>


                                        </tr>
                                        <?php $i++;}
                                    ?>
                                    </tbody>
                                </table>
                                <?php if($count3 < 1){?>
                                <div class="text-center" id="no_data">
                                    <img src="assets/img/no_data.PNG" style="width:20%"><br>
                                    <p>No Candidate/s.</p>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 mt-3">
                        <div class="card">
                            <div class="card-header text-center">
                                <h4>TREASURER</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <tbody>
                                        <?php
                                    $i = 0;
                                    while (
                                        $row = mysqli_fetch_array($treasurer)
                                    ) { ?>
                                        <tr>
                                            <td><?php echo $row['firstname'] .
                                            ' ' .
                                            $row['lastname'] .
                                            '-' .
                                            $row['partylist']; ?></td>
                                            <td>
                                                <input type="radio" class="exampleCheck4" name="tre[]" value="<?php echo $row[
                                                                    'id'
                                                                ]; ?>" required>

                                                <input type="text" name="userid" value="<?php echo $_SESSION[
                                                                'user'
                                                            ]['id']; ?>" hidden>

                                            </td>


                                        </tr>
                                        <?php $i++;}
                                    ?>
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
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-sm-6 mt-3">
                        <div class="card">
                            <div class="card-header text-center">
                                <h4>AUDITOR</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <tbody>
                                        <?php
                                    $i = 0;
                                    while (
                                        $row = mysqli_fetch_array($auditor)
                                    ) { ?>
                                        <tr>
                                            <td><?php echo $row['firstname'] .
                                            ' ' .
                                            $row['lastname'] .
                                            '-' .
                                            $row['partylist']; ?></td>
                                            <td>
                                                <input type="radio" class="exampleCheck5" name="aud[]" value="<?php echo $row[
                                                                    'id'
                                                                ]; ?>" required>

                                                <input type="text" name="userid" value="<?php echo $_SESSION[
                                                                'user'
                                                            ]['id']; ?>" hidden>

                                            </td>
                                        </tr>
                                        <?php $i++;}
                                    ?>
                                    </tbody>
                                </table>
                                <?php if($count5 < 1){?>
                                <div class="text-center" id="no_data">
                                    <img src="assets/img/no_data.PNG" style="width:20%"><br>
                                    <p>No Candidate/s.</p>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 mt-3">
                        <div class="card">
                            <div class="card-header text-center">
                                <h4>PIO(Public Information Officer)</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
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
                                                <input type="radio" class="exampleCheck6" name="pio[]" value="<?php echo $row[
                                                                    'id'
                                                                ]; ?>" required>

                                                <input type="text" name="userid" value="<?php echo $_SESSION[
                                                                'user'
                                                            ]['id']; ?>" hidden>

                                            </td>
                                        </tr>
                                        <?php $i++;}
                                    ?>
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
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-sm-6 mt-3">
                        <div class="card">
                            <div class="card-header text-center">
                                <h4>PEACE OFFICER</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <tbody>
                                        <?php
                                    $i = 0;
                                    while (
                                        $row = mysqli_fetch_array($peaceOfficer)
                                    ) { ?>
                                        <tr>
                                            <td><?php echo $row['firstname'] .
                                            ' ' .
                                            $row['lastname'] .
                                            '-' .
                                            $row['partylist']; ?></td>
                                            <td>
                                                <input type="radio" class="exampleCheck7" name="pea[]" value="<?php echo $row[
                                                                    'id'
                                                                ]; ?>" required>

                                                <input type="text" name="userid" value="<?php echo $_SESSION[
                                                                'user'
                                                            ]['id']; ?>" hidden>

                                            </td>
                                        </tr>
                                        <?php $i++;}
                                    ?>
                                    </tbody>
                                </table>
                                <?php if($count7 < 1){?>
                                <div class="text-center" id="no_data">
                                    <img src="assets/img/no_data.PNG" style="width:20%"><br>
                                    <p>No Candidate/s.</p>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>

                    <?php if ($_SESSION['user']['type'] == 'Grade 7') { ?>
                    <div class="col-sm-6 mt-3 mb-3">
                        <div class="card">
                            <div class="card-header text-center">
                                <h4>GRADE 8 REPRESENTATIVE</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <tbody>
                                        <?php
                                    $i = 0;
                                    while (
                                        $row = mysqli_fetch_array($grade8)
                                    ) { ?>
                                        <tr>
                                            <td><?php echo $row['firstname'] .
                                            ' ' .
                                            $row['lastname'] .
                                            '-' .
                                            $row['partylist']; ?></td>
                                            <td>
                                                <input type="radio" class="exampleCheck10" name="eight[]" value="<?php echo $row[
                                                                    'id'
                                                                ]; ?>" required>

                                                <input type="text" name="userid" value="<?php echo $_SESSION[
                                                                'user'
                                                            ]['id']; ?>" hidden>

                                            </td>
                                        </tr>
                                        <?php $i++;}
                                    ?>
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
                    </div>
                    <?php }?>

                    <?php if ($_SESSION['user']['type'] == 'Grade 8') { ?>
                    <div class="col-sm-6 mt-3 mb-3">
                        <div class="card">
                            <div class="card-header text-center">
                                <h4>GRADE 9 REPRESENTATIVE</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <tbody>
                                        <?php
                                    $i = 0;
                                    while (
                                        $row = mysqli_fetch_array($grade9)
                                    ) { ?>
                                        <tr>
                                            <td><?php echo $row['firstname'] .
                                            ' ' .
                                            $row['lastname'] .
                                            '-' .
                                            $row['partylist']; ?></td>
                                            <td>
                                                <input type="radio" class="exampleCheck9" name="nine[]" value="<?php echo $row[
                                                                    'id'
                                                                ]; ?>" required>

                                                <input type="text" name="userid" value="<?php echo $_SESSION[
                                                                'user'
                                                            ]['id']; ?>" hidden>

                                            </td>
                                        </tr>
                                        <?php $i++;}
                                    ?>
                                    </tbody>
                                </table>
                                <?php if($count9 < 1){?>
                                <div class="text-center" id="no_data">
                                    <img src="assets/img/no_data.PNG" style="width:20%"><br>
                                    <p>No Candidate/s.</p>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <?php }?>

                    <?php if ($_SESSION['user']['type'] == 'Grade 9') { ?>
                    <div class="col-sm-6 mt-3 mb-3">
                        <div class="card">
                            <div class="card-header text-center">
                                <h4>GRADE 10 REPRESENTATIVE</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <tbody>
                                        <?php
                                    $i = 0;
                                    while (
                                        $row = mysqli_fetch_array($grade10)
                                    ) { ?>
                                        <tr>
                                            <td><?php echo $row['firstname'] .
                                            ' ' .
                                            $row['lastname'] .
                                            '-' .
                                            $row['partylist']; ?></td>
                                            <td>
                                                <input type="radio" class="exampleCheck8" name="ten[]" value="<?php echo $row[
                                                                    'id'
                                                                ]; ?>" required>

                                                <input type="text" name="userid" value="<?php echo $_SESSION[
                                                                'user'
                                                            ]['id']; ?>" hidden>

                                            </td>
                                        </tr>
                                        <?php $i++;}
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
                    </div>
                    <?php }?>


                </div>
            </div>
            <?php if($count1 < 1 || $count2 < 1 || $count3 < 1 || $count4 < 1 || $count5 < 1 || $count6 < 1 || $count7 < 1 || $count8 < 1 || $count9 < 1 || $count10 < 1 ){?>
            <button type="submit" name="vote" class="btn btn-primary w-25 mb-5" style="margin-left: 67%;" disabled>Send
                Vote</button>
            <?php }else{?>
            <button type="submit" name="vote" class="btn btn-primary w-25 mb-5" style="margin-left: 67%;">Send
                Vote</button>
            <?php }?>
        </form>

        <?php } ?>

    </div>
</div>


<?php include_once 'footer.php'; ?>