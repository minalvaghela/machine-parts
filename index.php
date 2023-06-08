<?php
session_start();
if($_SESSION['roleid'] == 2 || $_SESSION['roleid'] == 3) 
{
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">


<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | Surya Engineering </title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="sidebar nav nav-pills nav-stacked anyClass">
        <div class="logo-details">

            <img src="images/logo.png" style="margin-left:3%" height="50" width="50">
            <span class="logo_name" style="margin-left:10%">Surya Engineering </span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="index.php" class="active">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../admin_profile.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Manage Profile</span>
                </a>
            </li>
            <?php
            if($_SESSION['roleid'] == 2)
            {
            ?>
            <li>
                <a href="../user.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Assign Role</span>
                </a>
            </li>
            <?php
            }
            ?>
            <li>
                <a href="../displaysuplier.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Manage supplier</span>
                </a>
            </li>
            <li>
                <a href="../displayprocat.php">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Manage Product Cat</span>
                </a>
            </li>
            <li>
                <a href="../displayproduct.php">
                    <i class='bx bx-coin-stack'></i>
                    <span class="links_name">Manage Product</span>
                </a>
            </li>
            <li>
                <a href="../displayrawmaterial.php">
                    <i class='bx bx-book-alt'></i>
                    <span class="links_name">Manage Rawmaterial</span>
                </a>
            </li>
            <li>
                <a href="../displaypurchase.php">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Manage Purchase</span>
                </a>
            </li>
            <li>
                <a href="../purchase_return.php">
                    <i class='bx bx-message'></i>
                    <span class="links_name">Manage Purchase Return</span>
                </a>
            </li>
            <li>
                <a href="../displayproduction.php">
                    <i class='bx bx-heart'></i>
                    <span class="links_name">Manage Production</span>
                </a>
            </li>
            <li>
                <a href="../manage_sale.php">
                    <i class='bx bx-heart'></i>
                    <span class="links_name">Manage Sales</span>
                </a>
            </li>
            <li>
                <a href="../manage_inquiry.php">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Manage Inquiry</span>
                </a>
            </li>
            <li>
                <a href="../addservice.php">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Manage Services</span>
                </a>
            </li>
            <?php
            if($_SESSION['roleid'] == 2)
            {
            ?>
            <li>
                <a href="../view_book.php">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Assign Call</span>
                </a>
            </li>
            <?php
            }
            ?>
            <li>
                <a href="reportofphp">
                    <i class='bx bxs-report'></i>
                    <span class="links_name">Generate Reports</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">Dashboard</span>
            </div>
            <div class="profile-details" style="margin-left:45%">
                <img src="images\profile.jpg" alt="" >
                <span class="admin_name">Suresh Vaghasiya</span>
                <i class='bx bx-chevron'></i>
            </div>
            <div class="box">
                <div class="left-side">
                    <!-- <a href="../logout.php"> -->
                    <div class="indicator">
                        <a href="../logout.php"><button type="button" class="btn btn-outline-primary">
                                <i class="fa fa-sign-in">Log Out</i></button></a>&nbsp;&nbsp;

                    </div>
                </div>
            </div>


        </nav><br><br>
        <div class="home-content">
            <div class="overview-boxes">
                <div class="box">
                    <div class="right-side">

                        <div class="box-topic">Total product</div>
                        <div class="indicator">

                            <?php
                                require 'db_connect.php';
                        
                                $sql = "SELECT * FROM product";
                                $result = $conn->query($sql);
                                $count = 0;
                                if($result->num_rows > 0)
                                {
                                    while($row = $result->fetch_assoc())
                                    {
                                        $count = $count + 1;
                                    }
                                }
                                echo "+" . $count  . "<br>";
                                
                            ?>
                        </div>
                    </div>
                    <i class='bx bx-cart-alt cart'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Customer</div>
                        <div class="indicator">

                            <?php
                                require 'db_connect.php';
                        
                                $sql = "SELECT * FROM user_details where role_id='1'";
                                $result = $conn->query($sql);
                                $count = 0;
                                if($result->num_rows > 0)
                                {
                                    while($row = $result->fetch_assoc())
                                    {
                                        $count = $count + 1;
                                    }
                                }
                                echo "+" . $count  . "<br>";
                               
                            ?>
                        </div>
                    </div>
                    <i class='bx bxs-cart-add cart two'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Sales</div>
                        <div class="indicator">

                            <?php
                                require 'db_connect.php';
                        
                                $sql = "SELECT * FROM sales_order";
                                $result = $conn->query($sql);
                                $count = 0;
                                if($result->num_rows > 0)
                                {
                                    while($row = $result->fetch_assoc())
                                    {
                                        $count = $count + 1;
                                    }
                                }
                                echo "+" . $count . "<br>";
                               
                            ?>
                        </div>
                    </div>
                    <i class='bx bx-cart cart three'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Purchase Return</div>
                        <div class="indicator">

                            <?php
                                require 'db_connect.php';
                        
                                $sql = "SELECT * FROM purchase_return";
                                $result = $conn->query($sql);
                                $count = 0;
                                if($result->num_rows > 0)
                                {
                                    while($row = $result->fetch_assoc())
                                    {
                                        $count = $count + 1;
                                    }
                                }
                                echo "+" . $count . "<br>";
                               
                            ?>
                        </div>
                    </div>
                    <i class='bx bx-cart cart three'></i>
                </div>
            </div>

            <!-- <div class="sales-boxes">
                <div class="recent-sales box">
                    <div class="title">Recent Sales</div>
                    <div class="sales-details">
                        <ul class="details">
                            <li class="topic">Date</li>
                            <li><a href="#">02 Jan 2021</a></li>
                            <li><a href="#">02 Jan 2021</a></li>
                            <li><a href="#">02 Jan 2021</a></li>
                            <li><a href="#">02 Jan 2021</a></li>
                            <li><a href="#">02 Jan 2021</a></li>
                            <li><a href="#">02 Jan 2021</a></li>
                            <li><a href="#">02 Jan 2021</a></li>
                        </ul>
                        <ul class="details">
                            <li class="topic">Customer</li>
                            <li><a href="#">Alex Doe</a></li>
                            <li><a href="#">David Mart</a></li>
                            <li><a href="#">Roe Parter</a></li>
                            <li><a href="#">Diana Penty</a></li>
                            <li><a href="#">Martin Paw</a></li>
                            <li><a href="#">Doe Alex</a></li>
                            <li><a href="#">Aiana Lexa</a></li>
                            <li><a href="#">Rexel Mags</a></li>
                            <li><a href="#">Tiana Loths</a></li>
                        </ul>
                        <ul class="details">
                            <li class="topic">Sales</li>
                            <li><a href="#">Delivered</a></li>
                            <li><a href="#">Pending</a></li>
                            <li><a href="#">Returned</a></li>
                            <li><a href="#">Delivered</a></li>
                            <li><a href="#">Pending</a></li>
                            <li><a href="#">Returned</a></li>
                            <li><a href="#">Delivered</a></li>
                            <li><a href="#">Pending</a></li>
                            <li><a href="#">Delivered</a></li>
                        </ul>
                        <ul class="details">
                            <li class="topic">Total</li>
                            <li><a href="#">$204.98</a></li>
                            <li><a href="#">$24.55</a></li>
                            <li><a href="#">$25.88</a></li>
                            <li><a href="#">$170.66</a></li>
                            <li><a href="#">$56.56</a></li>
                            <li><a href="#">$44.95</a></li>
                            <li><a href="#">$67.33</a></li>
                            <li><a href="#">$23.53</a></li>
                            <li><a href="#">$46.52</a></li>
                        </ul>
                    </div>
                    <div class="button">
                        <a href="#">See All</a>
                    </div>
                </div> -->
            <!--<div class="top-sales box">
                    <div class="title">Top Seling Product</div>
                    <ul class="top-sales-details">
                        <li>
                            <a href="#">
                                <img src="images/sunglasses.jpg" alt="">
                                <span class="product">Vuitton Sunglasses</span>
                            </a>
                            <span class="price">$1107</span>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/jeans.jpg" alt="">
                                <span class="product">Hourglass Jeans </span>
                            </a>
                            <span class="price">$1567</span>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/nike.jpg" alt="">
                                <span class="product">Nike Sport Shoe</span>
                            </a>
                            <span class="price">$1234</span>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/scarves.jpg" alt="">
                                <span class="product">Hermes Silk Scarves.</span>
                            </a>
                            <span class="price">$2312</span>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/blueBag.jpg" alt="">
                                <span class="product">Succi Ladies Bag</span>
                            </a>
                            <span class="price">$1456</span>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/bag.jpg" alt="">
                                <span class="product">Gucci Womens's Bags</span>
                            </a>
                            <span class="price">$2345</span>
                        <li>
                            <a href="#">
                                <img src="images/addidas.jpg" alt="">
                                <span class="product">Addidas Running Shoe</span>
                            </a>
                            <span class="price">$2345</span>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/shirt.jpg" alt="">
                                <span class="product">Bilack Wear's Shirt</span>
                            </a>
                            <span class="price">$1245</span>
                        </li>
                    </ul>
                </div>
            </div>p
        </div>
    </section>-->

            <script>
            let sidebar = document.querySelector(".sidebar");
            let sidebarBtn = document.querySelector(".sidebarBtn");
            sidebarBtn.onclick = function() {
                sidebar.classList.toggle("active");
                if (sidebar.classList.contains("active")) {
                    sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
                } else
                    sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
            }
            </script>

</body>

</html>
<?php
}
else
{
    header("location:../errorpage.php");
}
?>
