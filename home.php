<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    

</head>

<body>
    <header>
        <?php include "nav.php"?>
    </header>
    <img style="height:620px; width:100%" src="image/slide.jpg">
    <div class="container mt-5">
        <div class="jumbotron">

            <marquee scrollamount="8">
                <h1 class="display-5"><span class="text-danger">W</span>elcome to Surya Engineering!</h1>
            </marquee>
            
            <p class="lead text-center fs-2 mt-4">
                Surya Engineering is one of the leading Manufacturer of Machinces.
                <br>We offer these products at most reasonable rates.
            </p>
            <hr class="my-4">
            <!-- <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eveniet dolores ut ipsa necessitatibus
                dignissimos possimus eum minima consequuntur, consequatur at.</p> -->
                <p class="text-secondary text-center fs-1">View On Google Maps</p>
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

            </div>
            <div class="col-md-4 text-center">
                <img src="image\product1.jpg" class="bd-placeholder-img rounded-circle" width="200" height="200" />
                <h2>Machine</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor
                    mauris
                    condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis
                    euismod.
                    Donec sed odio dui. </p>

            </div>
            <div class="col-md-4 text-center">
                <img src="image\semiauto.jpg" class="bd-placeholder-img rounded-circle" width="200" height="200" />
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

    </body>

</html>