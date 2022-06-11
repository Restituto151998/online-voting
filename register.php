<?php

include_once './auth_header.php';
include_once './connection/Connect.php';
session_start();

if (isset($_POST['register'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $LRN = $_POST['LRN'];
    $type = $_POST['level'];
    $section = $_POST['section'];
    $password = md5($_POST['password']);
    $status = 'not yet voted';
    $sql = "INSERT INTO users (firstname,lastname,LRN,type,password,status,section)
	 VALUES ('$firstname','$lastname','$LRN','$type','$password', '$status', '$section')";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success_message'] = "Successfully Registered!";
        header("location: ./login.php");
        exit();
    }
}

?>
<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card p-5">
                <div class="card-title d-flex justify-items-between align-items-center">
                    <h4>&nbsp;&nbsp;&nbsp;Register</h4> <img src="assets/img/logo.jpg" class="offset-9 rounded-circle"
                        style="width:10%;">
                </div>
                <div class="card-body">

                    <form method="POST">
                        <div class="row">
                            <div class="form-group col-6">
                                <div class="form-group">
                                    <small><label for="level" class="">Grade Level</label></small>
                                    <select class="form-control" id="select"
                                        style=" border-bottom-color: #568203; border-left-color: white;border-right-color: white;border-top-color: white;"
                                        name="level">
                                        <option selected>Choose year level</option>
                                        <option>Grade 7</option>
                                        <option>Grade 8</option>
                                        <option>Grade 9</option>
                                        <option>Grade 10</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        The field grade level is required.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <small><label for="section" class="">Section</label></small>
                                <input id="section" type="text" class="form-control"
                                    style=" border-bottom-color: #568203; border-left-color: white;border-right-color: white;border-top-color: white;"
                                    name="section" required autofocus>
                                <div class="invalid-feedback">
                                    The field section is required.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <small><label for="firstname" class="">First Name</label></small>
                                <input id="firstname" type="text" class="form-control"
                                    style=" border-bottom-color: #568203; border-left-color: white;border-right-color: white;border-top-color: white;"
                                    name="firstname" required autofocus>
                                <div class="invalid-feedback">
                                    The field firstname is required.
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <small><label for="last_name" class="">Last Name</label></small>
                                <input id="last_name" type="text" class="form-control"
                                    style=" border-bottom-color: #568203; border-left-color: white;border-right-color: white;border-top-color: white;"
                                    name="lastname" required>
                                <div class="invalid-feedback">
                                    The field lastname is required.
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <div class="form-group">
                                    <small><label for="LRN" class="">LRN</label></small>
                                    <input id="LRN" type="text" class="form-control"
                                        style=" border-bottom-color: #568203; border-left-color: white;border-right-color: white;border-top-color: white;"
                                        name="LRN" required>
                                    <div class="invalid-feedback">
                                        The field LRN is required.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <small><label for="password" class="d-block ">Password</label></small>
                                <input id="password" type="password" class="form-control pwstrength"
                                    style=" border-bottom-color: #568203; border-left-color: white;border-right-color: white;border-top-color: white;"
                                    data-indicator="pwindicator" name="password" required>
                                <div id="pwindicator" class="pwindicator">
                                    <div class="bar"></div>
                                    <div class="label"></div>
                                </div>
                                <div class="invalid-feedback">
                                    The field password is required.
                                </div>
                            </div>

                        </div>

                        <center>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary w-50" name="register">
                                    <small> Register</small>
                                </button>
                            </div>
                        </center>
                    </form>
                    <div class=" text-muted offset-1" style="margin-left:35%;">
                        <small>Already Registered? <a href="./login.php">Login</a></small>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include './auth_footer.php';