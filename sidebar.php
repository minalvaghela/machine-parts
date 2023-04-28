

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="sidebar.css">
<div class="sidebar-nav">
    <nav class="navbar navbar-light bg-primary fixed-top">
       <!-- <div class="container">-->
             <!-- Mobile Menu Toggle Button -->
             <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" >
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Menus List -->
            <div class="bg-light offcanvas offcanvas-start shadow" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-body">
                    <h1>Surya Electricals</h1>
                    <ul class="navbar-nav">
                        <li><a href="#"><img src="image/windows.png"> <span class="item-text">Home</span></a></li>

                        <li><a href="contactus.php"><img src="image/user.png"><span class="item-text">Contact Us</span></a></li>

                        <li><a href="#"><img src="image/user.png"><span class="item-text">About Us</span></a></li>

                        <li><a href="#"> <img src="image/file.png"><span class="item-text">Products</span></a></li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li><a href="#"><span class="item-text">Send</span></a></li>

                        <li><a href="#"><span class="item-text">order</span></a></li>

                        <li><a href="#"><span class="item-text">Settings</span></a></li>
                    </ul>
                </div>
            </div>
            
            <div class="btn-group ">
                <a href="#" class="dropdown-toggle text-dark text-decoration-none" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <span class="textnone"><img src="image/user.png"></span>
                </a>

                <ul class="bg-primary  dropdown-menu dropdown-menu-end">
                    <li><button class="dropdown-item" type="button"></button></li>
                    <li><button class="dropdown-item" type="button">Edit Profile</button></li>
                    <li><button class="dropdown-item" type="button">Settings</button></li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li><button class="dropdown-item" type="button">Log out</button></li>
                    <li><img class="img" src="image/signup.png" width="30" height="30"><button type="button" class="btn btn-transparent" data-bs-toggle="modal"
                            data-bs-target="#signupModal">
                            Signup
                        </button></li>
                    <li><img class="img" src="image/login.png"width="30" height="30"><button type="button" class="btn btn-transparent" data-bs-toggle="modal"
                            data-bs-target="#loginModal">
                            Login
                        </button></li>
                </ul>
            </div>
           
      <!--  </div>-->
</div>