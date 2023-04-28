<?php 
session_start();
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

<!-- 
    RTL version
-->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"/>

<nav class="navbar navbar-expand-lg navbar-light  ms-auto px-4 fixed-top" style="background-color:#5bc0de">
    <div class="container-fluid">
        <!-- <b class="fs-2">Surya <span class="text-success fs-2">Electricals</span></b>-->
        <button class=" navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-4 text-center">
                <?php
    // require "login_handle.php";
    if(isset($_SESSION['name'])){
    echo $_SESSION['name'];
    }
    ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home.php"><i class="fa fa-home"
                            aria-hidden="true"> Home</i></a>
                </li>
                <!-- <li class="nav-item">
                        <tr> <a class="nav-link active" href="contactus.php"><i class="fa fa-address-book"
                                    aria-hidden="true"> Contact Us</i></a>
                    </li> -->
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="aboutus.php"><i class="fa fa-info"> About
                            Us</i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="showproduct.php"><i class="fa fa-product-hunt">
                            Products</i></a>
                </li>

                <?php
                if(isset($_SESSION['user_name']))
                {
                ?>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="cart.php"><i class="fa fa-product-hunt"> view
                            cart</i></a>
                </li>
            </ul>

            <a href="logout.php"><button type="button" class="btn btn-outline-primary">
                    <i class="fa fa-sign-in">Log Out</i></button></a>&nbsp;&nbsp;
            <a href=" #" class="dropdown-toggle text-dark text-decoration-none" data-bs-toggle="dropdown"
                aria-expanded="false">
                &nbsp;&nbsp;
                <!---<i class="fa fa-user" aria-hidden="true"></i>-->
                <span class="textnone"><img src="image/user.png"></span>
            </a>

            <ul class="bg-primary  dropdown-menu dropdown-menu-end">
                <li><a href="user_profile.php" style="text-decoration:none"><button class="dropdown-item" type="button">
                            Profile </button></a></li>
                <li><a href="book_service.php" style="text-decoration:none"><button class="dropdown-item" type="button">
                            Services </button></a></li>
                <li><a href="inquiry.php" style="text-decoration:none"> <button class="dropdown-item" type="button">
                            Inquiry</button></a></li>
                <li>
                <li><a href="show_order.php" style="text-decoration:none"> <button class="dropdown-item" type="button">
                            Booking Orders</button></a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>

            </ul>
            &nbsp;
            &nbsp;
                <!-- <script>
                alertify.set('notifier', 'position', 'top-center');
                alertify.success();
                </script> -->
                <button class="btn btn-outline-success"><?php echo "welcome". $_SESSION['user_name']?></button>
            <?php
                }
                else
                {
                ?>
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                data-bs-target="#signupModal"><i class="fa fa-sign-in">Sign Up</i></button>&nbsp;&nbsp;
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#loginModal"><i
                    class="fa fa-sign-in">Log In</i></button>&nbsp;&nbsp;


            <?php
                }
                ?>



          <!--  <a href=" #" class="dropdown-toggle text-dark text-decoration-none" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    &nbsp;&nbsp; 
            <i class="fa fa-user" aria-hidden="true"></i>
             <span class="textnone"><img src="image/user.png"></span>
                </a>
                <ul class="bg-primary  dropdown-menu dropdown-menu-end">
                    <li><a href="user_profile.php" style="text-decoration:none"><button class="dropdown-item"
                                type="button">
                                Profile </button></a></li>
                    <li><a href="Admin Dashboard\index.php" style="text-decoration:none"><button class="dropdown-item"
                                type="button">
                                Admin </button></a></li>
                    <li><a href="inquiry.php" style="text-decoration:none"> <button class="dropdown-item" type="button">
                                Inquiry</button></a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                </ul> -->
        </div>
</nav>