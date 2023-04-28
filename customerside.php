<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light ms-auto px-4 fixed-top"  style="background-color:#5bc0de">
        <div class="container-fluid">
            <!-- <b class="fs-2">Surya <span class="text-success fs-2">Electricals</span></b>-->
            <button class=" navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="aboutus.php"><i class="fa fa-info"> About
                                Us</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="show_product.php"><i class="fa fa-product-hunt"> Products</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="cart.php"><i class="fa fa-product-hunt"> view cart</i></a>
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
                    <li><a href="user_profile.php" style="text-decoration:none"><button class="dropdown-item"
                                type="button">
                                Profile </button></a></li>
                    <li><a href="book_service.php" style="text-decoration:none"><button class="dropdown-item"
                                type="button">
                                Services </button></a></li>
                    <li><a href="inquiry.php" style="text-decoration:none"> <button class="dropdown-item" type="button">
                                Inquiry</button></a></li>
                    <li>
                    <li><a href="show_order.php" style="text-decoration:none"> <button class="dropdown-item"
                                type="button">
                                Booking Orders</button></a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                </ul>
            </div>
    </nav>
    <img style="height:620px; width:100%" src="image/slide.jpg">
    <div class="container mt-5">
        <div class="jumbotron">
            <marquee scrollamount="8">
                <h1 class="display-5">
                    <span class="text-danger">W</span>elcome to Surya Engineering!
                </h1>
            </marquee>
            <p class="lead text-center fs-2 mt-4">
                Surya Engineering is one of the leading Manufacturer of Machinces.
                <br>We offer these products at most reasonable rates.
            </p>
            <hr class="my-4">
            <!-- <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eveniet dolores ut ipsa necessitatibus
                dignissimos possimus eum minima consequuntur, consequatur at.</p> -->
            <p class="text-secondary text-center fs-1">View On Google Maps</p>
            <!-- <a class="btn btn-primary btn-lg"
                href="https://www.google.com/maps/place/SitaRam+Stationers/@28.6581009,77.2124626,12.5z/data=!4m8!1m2!2m1!1sstationery+delhi!3m4!1s0x390cfd309eebec89:0x25106b00b8ccb6b3!8m2!3d28.5684963!4d77.2430644"
                target="_blank" role="button">View On Google Maps</a> -->
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.5963648036486!2d72.64512431480114!3d23.038587984944964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e86ee4d9d3735%3A0xc137089439b4e48d!2sSwastiknagar!5e0!3m2!1sen!2sin!4v1675664128952!5m2!1sen!2sin"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="image\medium_tensioner_unit.jpg" class="bd-placeholder-img rounded-circle" width="200"
                    height="200" />
                <h2>Medium tensioner unit</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor
                    mauris
                    condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis
                    euismod.
                    Donec sed odio dui. </p>
                <!-- <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p> -->
            </div>
            <div class="col-md-4 text-center">
                <img src="image\product1.jpg" class="bd-placeholder-img rounded-circle" width="200" height="200" />
                <h2>Machine</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor
                    mauris
                    condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis
                    euismod.
                    Donec sed odio dui. </p>
                <!-- <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p> -->
            </div>
            <div class="col-md-4 text-center">
                <img src="image\semi_auto_stator_winding_machine_ceiling_fan_coil_winding_machine.jpg"
                    class="bd-placeholder-img rounded-circle" width="200" height="200" />
                <h2>Semiauto stator winding</h2>
                <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula
                    porta
                    felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut
                    fermentum
                    massa justo sit amet risus.</p>
                <!-- <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p> -->
            </div>
        </div>
    </div>

    <!-- // if(isset($_SESSION['loggedin']){
    // if(isset($_SESSION['loggedin'])){
    // echo'welcome'. $_SESSION['$username'];
    // }
    // else{
    // echo "enter";
    // echo '<form class="d-flex">
        // <button type="button" class="btn btn-transparent" data-bs-toggle="modal" // data-bs-target="#loginModal">
            // Login
            // </button>
        // <button type="button" class="btn btn-transparent" data-bs-toggle=" modal" // data-bs-target="#signupModal">
            // Signup
            // </button>
        // </form>';
    // }
    ?> -->
    <footer>
        <?php include "footer.php"; ?>
    </footer>

    <?php  
include "Login.php";
include "signup.php";
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true")
{
    echo"yes";
}
?>

    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>