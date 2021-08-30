<?php

include_once './auth_header.php';
include_once './connection/Connect.php';


if(isset($_POST['register']))
{	 
	 $firstname = $_POST['firstname'];
	 $lastname = $_POST['lastname'];
	 $email = $_POST['email'];
     $type = 'CLIENT';
     $password = md5($_POST['password']);
	 $sql = "INSERT INTO users (firstname,lastname,email,type,password)
	 VALUES ('$firstname','$lastname','$email','$type','$password')";
	 if (mysqli_query($conn, $sql)) {
		header("location: ./login.php");
	 } 
}

?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="card p-5" id="card">
                        <div class="card-header d-flex justify-items-between align-items-center bg-white">         
                            <h4>Register</h4>   <img src="assets/img/mnhs.jpg" class="offset-9 rounded-circle" style="width:10%;">
                        </div>
                        <div class="card-body">
                        
                            <form method="POST">
                                <div class="row">
                                    <div class="form-group col-6">
                                       <small><label for="firstname">First Name</label></small> 
                                        <input id="firstname" type="text" class="form-control"  style=" border-bottom-color: #568203; border-left-color: white;border-right-color: white;border-top-color: white;" name="firstname" required autofocus>
                                        <div class="invalid-feedback">
                                            The field firstname is required.
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                       <small><label for="last_name">Last Name</label></small> 
                                        <input id="last_name" type="text" class="form-control"  style=" border-bottom-color: #568203; border-left-color: white;border-right-color: white;border-top-color: white;" name="lastname" required>
                                        <div class="invalid-feedback">
                                            The field lastname is required.
                                        </div>
                                    </div>
                                </div>
                              
                                <div class="row">
                                <div class="form-group col-6">
                                <div class="form-group">
                                    <small><label for="email">Email</label></small>
                                    <input id="email" type="email" class="form-control"  style=" border-bottom-color: #568203; border-left-color: white;border-right-color: white;border-top-color: white;" name="email" required>
                                    <div class="invalid-feedback">
                                        The field email is required.
                                    </div>
                                </div>
                                </div>
                                    <div class="form-group col-6">
                                     <small><label for="password" class="d-block">Password</label></small>   
                                        <input id="password" type="password" class="form-control pwstrength"  style=" border-bottom-color: #568203; border-left-color: white;border-right-color: white;border-top-color: white;" data-indicator="pwindicator" name="password" required>
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                        <div class="invalid-feedback">
                                            The field password is required.
                                        </div>
                                    </div>
                 
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn-block offset-3" name="register"  style="background-image: linear-gradient(to right, rgb(204, 204, 54) , #568203);width:50%;color:white;">
                                      <small> Register</small> 
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="mb-4 text-muted offset-1">
                       <small>Already Registered? <a href="./login.php" style="color:#568203;">Login</a></small>     
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include './auth_footer.php';
