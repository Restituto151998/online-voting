<!DOCTYPE html>
<html lang="en">

<head>

    <script type="text/javascript">
    function disableBack() {
        window.history.forward();
    }
    setTimeout("disableBack()", 0);
    window.onunload = function() {
        null
    };
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="./assets/css/header.css">

    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <script src='./assets/js/icon.js'></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/logo.jpg" />



    <title>ANHS</title>

</head>

<body>
    <nav class="navbar navbar-dark sticky-top flex-md-nowrap p-0" id="navbar" style="background-color: #0c4dad;">

        <div class="sidebar-brand" id="sidenav">
            <a href="./dashboard.php"> <img alt="image" src="assets/img/logo.jpg" class="header-logo rounded-circle p-2"
                    style="width:7%;" /><span class="logo-name text-white"><b>ANHS</b> </span>
            </a>
        </div>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Sign out <i class='fas fa-sign-out-alt' style='font-size:20px'></i>
                </button>

            </li>
        </ul>

    </nav>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <h5>Are you sure you want to sign out? </h5>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-primary" id="signout" href="./login.php">Yes</a>

                </div>
            </div>
        </div>
    </div>