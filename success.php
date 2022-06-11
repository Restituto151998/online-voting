<?php
include_once 'header.php';
include_once './connection/Connect.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('location: login.php');
}
$loginUserId = $_SESSION['user']['id'];

$president =  mysqli_query($conn, "SELECT candidates.firstname, candidates.lastname from votes INNER JOIN candidates ON candidates.id = votes.candidate_id 
INNER JOIN users ON users.id = votes.userid  
WHERE candidates.type = 'President' AND users.id = '$loginUserId'");

$vicePresident =  mysqli_query($conn, "SELECT candidates.firstname, candidates.lastname from votes INNER JOIN candidates ON candidates.id = votes.candidate_id 
INNER JOIN users ON users.id = votes.userid  
WHERE candidates.type = 'Vice President' AND users.id = '$loginUserId'");

$secretary =  mysqli_query($conn, "SELECT candidates.firstname, candidates.lastname from votes INNER JOIN candidates ON candidates.id = votes.candidate_id 
INNER JOIN users ON users.id = votes.userid  
WHERE candidates.type = 'Secretary' AND users.id = '$loginUserId'");

$treasurer =  mysqli_query($conn, "SELECT candidates.firstname, candidates.lastname from votes INNER JOIN candidates ON candidates.id = votes.candidate_id 
INNER JOIN users ON users.id = votes.userid  
WHERE candidates.type = 'Treasurer' AND users.id = '$loginUserId'");

$auditor =  mysqli_query($conn, "SELECT candidates.firstname, candidates.lastname from votes INNER JOIN candidates ON candidates.id = votes.candidate_id 
INNER JOIN users ON users.id = votes.userid  
WHERE candidates.type = 'Auditor' AND users.id = '$loginUserId'");

$pio =  mysqli_query($conn, "SELECT candidates.firstname, candidates.lastname from votes INNER JOIN candidates ON candidates.id = votes.candidate_id 
INNER JOIN users ON users.id = votes.userid  
WHERE candidates.type = 'PIO' AND users.id = '$loginUserId'");

$peaceOfficer =  mysqli_query($conn, "SELECT candidates.firstname, candidates.lastname from votes INNER JOIN candidates ON candidates.id = votes.candidate_id 
INNER JOIN users ON users.id = votes.userid  
WHERE candidates.type = 'Peace Officer' AND users.id = '$loginUserId'");

$ten =  mysqli_query($conn, "SELECT candidates.firstname, candidates.lastname from votes INNER JOIN candidates ON candidates.id = votes.candidate_id 
INNER JOIN users ON users.id = votes.userid  
WHERE candidates.type = 'Grade 10 Representative' AND users.id = '$loginUserId'");

$nine =  mysqli_query($conn, "SELECT candidates.firstname, candidates.lastname from votes INNER JOIN candidates ON candidates.id = votes.candidate_id 
INNER JOIN users ON users.id = votes.userid  
WHERE candidates.type = 'Grade 9 Representative' AND users.id = '$loginUserId'");

$eight =  mysqli_query($conn, "SELECT candidates.firstname, candidates.lastname from votes INNER JOIN candidates ON candidates.id = votes.candidate_id 
INNER JOIN users ON users.id = votes.userid  
WHERE candidates.type = 'Grade 8 Representative' AND users.id = '$loginUserId'");




?>




<?php if ($_SESSION['user']['type'] != 'ADMIN') { ?>

<div class="container mt-5">
    <center>
        <div class="card text-center w-50">

            <div class="card-body">
                <h3><img src="assets/img/check.png" class="rounded-circle justify-content-center" style="width:10%; ">
                    <br>Vote Sent!
                </h3>
            </div>
        </div>
        <div class="card text-center w-50">
            <div class="card-body">
                <span>President</span> :<strong> <?php
          $i = 0;
          while ($row = mysqli_fetch_array($president)) { ?>
                    <?php echo $row['firstname'] .
                ' ' .
                $row['lastname']?>
                    <?php }
          ?>
                    <?php $i++; ?>
                </strong> <br>
                <span>Vice President</span> :<strong><?php
          $i = 0;
          while ($row = mysqli_fetch_array($vicePresident)) { ?>
                    <?php echo $row['firstname'] .
                ' ' .
                $row['lastname']?>
                    <?php }
          ?>
                    <?php $i++; ?></strong><br>
                <span>Secretary</span> :<strong><?php
          $i = 0;
          while ($row = mysqli_fetch_array($secretary)) { ?>
                    <?php echo $row['firstname'] .
                ' ' .
                $row['lastname']?>
                    <?php }
          ?>
                    <?php $i++; ?></strong><br>
                <span>Treasurer</span> :<strong><?php
          $i = 0;
          while ($row = mysqli_fetch_array($treasurer)) { ?>
                    <?php echo $row['firstname'] .
                ' ' .
                $row['lastname']?>
                    <?php }
          ?>
                    <?php $i++; ?></strong><br>
                <span>Auditor</span> :<strong><?php
          $i = 0;
          while ($row = mysqli_fetch_array($auditor)) { ?>
                    <?php echo $row['firstname'] .
                ' ' .
                $row['lastname']?>
                    <?php }
          ?>
                    <?php $i++; ?></strong><br>
                <span>PIO</span> :<strong><?php
          $i = 0;
          while ($row = mysqli_fetch_array($pio)) { ?>
                    <?php echo $row['firstname'] .
                ' ' .
                $row['lastname']?>
                    <?php }
          ?>
                    <?php $i++; ?></strong><br>
                <span>Peace Officer</span> :<strong><?php
          $i = 0;
          while ($row = mysqli_fetch_array($peaceOfficer)) { ?>
                    <?php echo $row['firstname'] .
                ' ' .
                $row['lastname']?>
                    <?php }
          ?>
                    <?php $i++; ?></strong><br>
                <?php if ($_SESSION['user']['type'] == 'Grade 9') { ?>
                <span>Grade 10 Representative</span> :<strong><?php
          $i = 0;
          while ($row = mysqli_fetch_array($ten)) { ?>
                    <?php echo $row['firstname'] .
                ' ' .
                $row['lastname']?>
                    <?php }
          ?>
                    <?php $i++; ?></strong>
                <?php }
          ?>


                <?php if ($_SESSION['user']['type'] == 'Grade 8') { ?>
                <span>Grade 9 Representative</span> :<strong><?php
          $i = 0;
          while ($row = mysqli_fetch_array($nine)) { ?>
                    <?php echo $row['firstname'] .
                ' ' .
                $row['lastname']?>
                    <?php }
          ?>
                    <?php $i++; ?></strong>
                <?php }
          ?>
                <?php if ($_SESSION['user']['type'] == 'Grade 7') { ?>
                <span>Grade 8 Representative</span> :<strong><?php
          $i = 0;
          while ($row = mysqli_fetch_array($eight)) { ?>
                    <?php echo $row['firstname'] .
                ' ' .
                $row['lastname']?>
                    <?php }
          ?>
                    <?php $i++; ?></strong>
                <?php }
          ?>
            </div>

        </div>
    </center>
</div>

<?php }?>

<?php include_once 'footer.php'; ?>