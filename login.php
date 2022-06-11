<?php
include_once 'auth_header.php';
include_once './connection/Connect.php';
session_start();
if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
    session_destroy();
}


if (isset($_POST['login'])) {
    $LRN = $_POST['LRN'];
    $password = $_POST['password'];
    $error = "LRN and password doesn't match";

    $sql = "SELECT * FROM users WHERE LRN='" . $LRN . "' AND password='" . md5($password) . "'";


    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        if ($password == isset($row['password']) && $LRN == isset($row['LRN'])) {
            $_SESSION['user'] = $row;
            header("location: ./dashboard.php");
        }
    } else {
        $_SESSION["error"] = $error;
    }
}


    

?>

<div class="container mt-5 ">
    <div class="row ">
        <div class="col-12 col-sm-6  offset-3">
            <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
            <div class="alert alert-success" id="message" role="alert">
                <?php echo $_SESSION['success_message']; ?>
            </div>
            <?php
                        unset($_SESSION['success_message']);
                    }
                    ?>
            <div class="card p-5">
                <div class="card-title mt-3">
                    <img src="assets/img/logo.jpg" class=" offset-4 rounded-circle justify-content-center"
                        style="width:30%; ">
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <small><label class="" for="LRN">LRN</label></small>
                            <input id="LRN" type="text" class="form-control"
                                style=" border-bottom-color: #568203; border-left-color: white;border-right-color: white;border-top-color: white;"
                                name="LRN" tabindex="1" required autofocus>
                            <div class="invalid-feedback" class="">
                                Please fill in your LRN
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="d-block">
                                <small> <label for="password" class="control-label ">Password</label></small>

                            </div>
                            <input id="password" type="password" class="form-control"
                                style=" border-bottom-color: #568203; border-left-color: white;border-right-color: white;border-top-color: white;"
                                name="password" tabindex="2" required>
                            <div class="invalid-feedback">
                                please fill in your password
                            </div>
                        </div>


                        <?php
                                    if (isset($_SESSION["error"])) {
                                        $error = $_SESSION["error"];
                                        echo " <div class='alert alert-danger' role='alert'>$error</div>";
                                    }
                                ?>

                        <center>
                            <button type="submit" id="login" class="btn btn-primary w-50" tabindex="4" name="login">
                                <small>Login</small>
                            </button>
                        </center>

                        <div class="form-group">
                            <div class="d-flex justify-items-between align-items-center">
                                <div class="mt-3 float-left text-muted text-center " style="margin-left: 93px;">
                                    <small> Don't have an
                                        account
                                        yet?
                                        <a href="./register.php" style="">Register</a></small>

                                </div>

                            </div>

                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
include_once 'auth_footer.php';
include_once 'footer.php';
?>
<?php
    $_SESSION["error"] =null;
?>