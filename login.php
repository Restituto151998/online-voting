<?php
include_once 'auth_header.php';
include_once './connection/Connect.php';
session_start();
if (isset($_SESSION['user'])) {
   unset($_SESSION['user']);
   session_destroy();
}

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $error = "email and password doesn't match";

    $sql = "SELECT * FROM users WHERE email='" . $email . "' AND password='" . md5($password) . "'";

    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {

        $row = mysqli_fetch_assoc($res);
        if ($password == isset($row['password']) && $email == isset($row['email'])) {
            $_SESSION['user'] = $row;
            header("location: ./dashboard.php");
        }
    }
    else{
       
        $_SESSION["error"] = $error;
    }

}


    

?>

<div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-6  offset-3">
                    <div class="card p-5" id="card">
                        <div class="card-header bg-white mt-3 ">
                            <img src="assets/img/mnhs.jpg" class=" offset-5 rounded-circle" style="width:20%;">
                        </div>
                        <div class="card-body">

                            <form method="POST" >
                                <div class="form-group">
                                  <small><label for="email">Email</label></small>
                                    <input id="email" type="email" class="form-control" style=" border-bottom-color: #568203; border-left-color: white;border-right-color: white;border-top-color: white;"  name="email" tabindex="1" required autofocus >
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="d-block">
                                     <small> <label for="password" class="control-label">Password</label></small>

                                    </div>
                                    <input id="password" type="password" class="form-control"  style=" border-bottom-color: #568203; border-left-color: white;border-right-color: white;border-top-color: white;" name="password" tabindex="2" required>
                                    <div class="invalid-feedback">
                                        please fill in your password
                                    </div>
                                </div>
                               

                                <?php
                                    if(isset($_SESSION["error"])){
                                        $error = $_SESSION["error"];
                                        echo " <div class='alert alert-danger' role='alert'>$error</div>";
                                    }
                                ?>
  
                                <div class="form-group">
                                    <button type="submit" id="login" class="btn btn-lg   offset-3" style="background-image: linear-gradient(to right, rgb(204, 204, 54) , #568203);width:50%;color:white;"  tabindex="4" name="login" >
                                       <small>Login</small>
                                    </button>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-items-between align-items-center">
                                    <div class="mt-5float-left text-muted text-center"><small>   Don't have an account yet? <a href="./register.php"style="color:#568203;" >Register</a></small>

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
?>
<?php
    $_SESSION["error"] =null;
?>