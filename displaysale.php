<?php
require 'db_connect.php';
session_start();
?>
<?php
$id=$_GET['proid'];
?>
<?php

$q = mysqli_query($conn, "SELECT *from sales_order where sales_order_id='$id'") or die(mysqli_error($conn));                               
while ($productrow = mysqli_fetch_array($q)) {
     $id=$productrow['sales_order_id'];
      $date=$productrow['date'];
      $userid=$productrow['user_id'];
      $q= mysqli_query($conn, "SELECT *from user_details where user_id='$userid'") or die(mysqli_error($conn)); 
      while ($row = mysqli_fetch_array($q)) {
        $mob=$row['mob'];
        $email=$row['email_id'];
        $add=$row['address'];
      }
}
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Surya Engineers </title>
    <!--Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <style type="text/css">
    /* Googlefont Poppins CDN Link */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    .sidebar {
        position: fixed;
        height: 100%;
        width: 240px;
        background: #0A2558;
        transition: all 0.5s ease;
    }

    .anyClass {
        height: 100%;
        overflow-y: scroll;
    }

    .sidebar.active {
        width: 60px;
    }

    .sidebar .logo-details {
        height: 80px;
        display: flex;
        align-items: center;
    }

    .sidebar .logo-details i {
        font-size: 28px;
        font-weight: 500;
        color: #fff;
        min-width: 60px;
        text-align: center
    }

    .sidebar .logo-details .logo_name {
        color: #fff;
        font-size: 24px;
        font-weight: 500;
    }

    .sidebar .nav-links {
        margin-top: 10px;
    }

    .sidebar .nav-links li {
        position: relative;
        list-style: none;
        height: 50px;
        margin-left: -41px;
    }

    .sidebar .nav-links li a {
        height: 100%;
        width: 100%;
        display: flex;
        align-items: center;
        text-decoration: none;
        transition: all 0.4s ease;
    }

    .sidebar .nav-links li a.active {
        background: #081D45;
    }

    .sidebar .nav-links li a:hover {
        background: #081D45;
    }

    .sidebar .nav-links li i {
        min-width: 60px;
        text-align: center;
        font-size: 18px;
        color: #fff;
    }

    .sidebar .nav-links li a .links_name {
        color: #fff;
        font-size: 15px;
        font-weight: 400;
        white-space: nowrap;
    }

    .sidebar .nav-links .log_out {
        position: absolute;
        bottom: 0;
        width: 100%;
    }

    .home-section {
        position: relative;
        background: #f5f5f5;
        min-height: 100vh;
        width: calc(100% - 240px);
        left: 240px;
        transition: all 0.5s ease;
    }

    .sidebar.active~.home-section {
        width: calc(100% - 60px);
        left: 60px;
    }

    .home-section nav {
        display: flex;
        justify-content: space-between;
        height: 80px;
        background: #fff;
        display: flex;
        align-items: center;
        position: fixed;
        width: calc(100% - 240px);
        left: 240px;
        z-index: 100;
        padding: 0 20px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        transition: all 0.5s ease;
    }

    .sidebar.active~.home-section nav {
        left: 60px;
        width: calc(100% - 60px);
    }

    .home-section nav .sidebar-button {
        display: flex;
        align-items: center;
        font-size: 24px;
        font-weight: 500;
    }

    nav .sidebar-button i {
        font-size: 35px;
        margin-right: 10px;
    }

    .home-section nav .profile-details {
        display: flex;
        align-items: center;
        background: #F5F6FA;
        border: 2px solid #EFEEF1;
        border-radius: 6px;
        height: 50px;
        min-width: 190px;
        padding: 0 15px 0 2px;
    }

    nav .profile-details img {
        height: 40px;
        width: 40px;
        border-radius: 6px;
        object-fit: cover;
    }

    nav .profile-details .admin_name {
        font-size: 15px;
        font-weight: 500;
        color: #333;
        margin: 0 10px;
        white-space: nowrap;
    }

    nav .profile-details i {
        font-size: 25px;
        color: #333;
    }

    .home-section .home-content {
        position: relative;
        padding-top: 104px;
    }

    /* Responsive Media Query */
    @media (max-width: 1240px) {
        .sidebar {
            width: 60px;
        }

        .sidebar.active {
            width: 220px;
        }

        .sidebar .nav-links li {
            margin-left: -20px;
        }

        .home-section {
            width: calc(100% - 60px);
            left: 60px;
        }

        .sidebar.active~.home-section {
            left: 220px;
            width: calc(100% - 220px);
            overflow: hidden;
        }

        .home-section nav {
            width: calc(100% - 60px);
            left: 60px;
        }

        .sidebar.active~.home-section nav {
            width: calc(100% - 220px);
            left: 220px;
        }
    }

    @media (max-width: 700px) {

        nav .sidebar-button .dashboard,
        nav .profile-details .admin_name,
        nav .profile-details i {
            display: none;
        }

        .home-section nav .profile-details {
            height: 50px;
            min-width: 40px;
        }

        .home-content .sales-boxes .sales-details {
            width: 560px;
        }
    }



    @media (max-width: 400px) {
        .sidebar {
            width: 0;
        }

        .sidebar.active {
            width: 60px;
        }

        .home-section {
            width: 100%;
            left: 0;
        }

        .sidebar.active~.home-section {
            left: 60px;
            width: calc(100% - 60px);
        }

        .home-section nav {
            width: 100%;
            left: 0;
        }

        .sidebar.active~.home-section nav {
            left: 60px;
            width: calc(100% - 60px);
        }
    }
    </style>

</head>
<?php
            include "adminside.php";
            ?>

<body>
    <div class="sidebar nav nav-pills nav-stacked anyClass">
        <div class="logo-details">

            <img src="Admin Dashboard\images\logo.png" style="margin-left:3%" height="50" width="50">
            <span class="logo_name" style="margin-left:10%">Surya Engineering </span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="Admin Dashboard\index.php" class="active">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="admin_profile.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Manage Profile</span>
                </a>
            </li>
            <?php
            if($_SESSION['roleid'] == 2)
            {
            ?>
            <li>
                <a href="user.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Assign Role</span>
                </a>
            </li>
            <?php
            }
            ?>
            <li>
                <a href="displaysuplier.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Manage Supplier</span>
                </a>
            </li>
            <li>
                <a href="displayprocat.php">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Manage Product Cat</span>
                </a>
            </li>
            <li>
                <a href="displayproduct.php">
                    <i class='bx bx-coin-stack'></i>
                    <span class="links_name">Manage Product</span>
                </a>
            </li>
            <li>
                <a href="displayrawmaterial.php">
                    <i class='bx bx-book-alt'></i>
                    <span class="links_name">Manage Rawmaterial</span>
                </a>
            </li>
            <li>
                <a href="displaypurchase.php">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Manage Purchase</span>
                </a>
            </li>
            <li>
                <a href="purchase_return.php">
                    <i class='bx bx-message'></i>
                    <span class="links_name">Manage Purchase Return</span>
                </a>
            </li>
            <li>
                <a href="displayproduction.php">
                    <i class='bx bx-heart'></i>
                    <span class="links_name">Manage Production</span>
                </a>
            </li>
            <li>
                <a href="manage_sale.php">
                    <i class='bx bx-heart'></i>
                    <span class="links_name">Manage Sales</span>
                </a>
            </li>
            <li>
                <a href="manage_inquiry.php">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Manage Inquiry</span>
                </a>
            </li>
            <li>
                <a href="addservice.php">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Manage Services</span>
                </a>
            </li>
            <?php
            if($_SESSION['roleid'] == 2)
            {
            ?>
            <li>
                <a href="view_book.php">
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
            <div class="profile-details">
                <img src="Admin Dashboard\images\profile.jpg" alt="">
                <span class="admin_name">Suresh Vaghasiya</span>
                <i class='bx bx-chevron-down'></i>
            </div>
        </nav><br><br>
        <div class="wrapper">
            <?php
            include "adminside.php";
        ?>
        <div id="content">
                <section class="forms-section">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="outer-w3-agile col-xl mt-3 mr-xl-3">
                                   <h2 class="tittle-w3-agileits mt-4 mb-3 text-center fs-1" style="color:#1F45FC">Sales 
                            Information
                        </h2>
                                  
                                    <input type="hidden" value="<?php echo $pid;?>" name="id">

                                    <?php
                                       include "db_connect.php";
                                    
        //                                 $msg="";
        //                               if($_SERVER['REQUEST_METHOD'] == "POST")
        //                                 {
        //                                     $sup = $_POST['s1'];
        //                                     echo $pid;?>
                                   <?php  $msg = '<div class="alert alert-success mt-4" role="alert">
        // //         Your Purchase Added Successfully!!!
        // //    </div>';
        // //    echo $msg;
        //                                 }
                                ?>

                                    <br>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Sales order Id:</label>
                                        <div class="col-sm-10">
                                            <input readonly class="form-control" id="qty" name="qty"
                                                placeholder="Enter Purchase Qty" required autocomplete="off"
                                                data-parsley-trigger="keyup"
                                                data-parsley-required-message="Purchase ID is required"
                                                data-parsley-type="number" value="<?php echo $id?>">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">User id:
                                            </label>
                                        <div class="col-sm-10">
                                            <input readonly class="form-control" id="qty" name="qty"
                                                placeholder="Enter Purchase Qty" required autocomplete="off"
                                                data-parsley-trigger="keyup"
                                                data-parsley-required-message="Supplier Name is required"
                                                value="<?php echo $userid?>">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Date:</label>
                                        <div class="col-sm-10">
                                            <input readonly class="form-control" id="price" name="price"
                                                placeholder="Enter Purchase Price" required autocomplete="off"
                                                data-parsley-trigger="keyup"
                                                data-parsley-required-message="Purchase Date is required"
                                                value="<?php echo $date?>">

                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Mob No:</label>
                                        <div class="col-sm-10">
                                            <input readonly class="form-control" id="price" name="price"
                                                placeholder="Enter Purchase Price" required autocomplete="off"
                                                data-parsley-trigger="keyup"
                                                data-parsley-required-message="Purchase Date is required"
                                                value="<?php echo $mob?>">

                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Address:</label>
                                        <div class="col-sm-10">
                                            <input readonly class="form-control" id="price" name="price"
                                                placeholder="Enter Purchase Price" required autocomplete="off"
                                                data-parsley-trigger="keyup"
                                                data-parsley-required-message="Purchase Date is required"
                                                value="<?php echo $add?>">

                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Email ID:</label>
                                        <div class="col-sm-10">
                                            <input readonly class="form-control" id="price" name="price"
                                                placeholder="Enter Purchase Price" required autocomplete="off"
                                                data-parsley-trigger="keyup"
                                                data-parsley-required-message="Purchase Date is required"
                                                value="<?php echo $email?>">

                                        </div>
                                    </div>
                                    <br>
                                   
            <?php
                                $msg="";
                                if (isset($_GET['delid'])) {
                                    $deleteid = $_GET['delid'];
                                    $q = mysqli_query($conn, "delete from purchase_detail where purchase_purchase_id= '{$deleteid}'") or die(mysqli_error($conn));
                                    
                                    $q = mysqli_query($conn, "delete from purchase where purchase_id = '{$deleteid}'") or die(mysqli_error($conn));
                                    if ($q)
                                     {
                                        $msg = '<div class="alert alert-success mt-4" role="alert">
                 Purchase Deleted Successfully!!!
                </div>';
                echo $msg;
                                    }
                                }
                        ?>
            <div id="content">
                <section class="tables-section">
                    <div class="outer-w3-agile mt-3">
                        <br>
                        <h2 class="tittle-w3-agileits mt-4 mb-3 text-center fs-1" style="color:#1F45FC">sales_details
                            Information</h2>
                        <table class="table">
                            
                            <thead class="thead-dark">
                                <tr>

                                    <th scope="col">Product _id </th>
                                    <th scope="col"> price </th>
                                    <th scope="col"> Qty </th>
                                    <th scope="col"> Total</th>

                                </tr>
                            </thead>
                            <tbody>
                        

                                <?php
                                $q = mysqli_query($conn, "SELECT *from sales_order_detail where sales_order_sales_order_id='$id'") or die(mysqli_error($conn));
                                 $amount=0;
                                 $i=1;
                               
                                while ($productrow = mysqli_fetch_array($q)) {
                                    echo "<tr>";
                                    
                                    $id=$productrow['product_product_id'];
                                    $sql="select * from product where product_id='$id'";
                                    $ex=mysqli_query($conn,$sql);
                                     while ($row = mysqli_fetch_array($ex)) {
                                      $price=$productrow['price'];
                                      $qty=$productrow['qty'];
                                      $total=$price*$qty;
                                      $amount=$amount+$total;
                                    echo "<td>{$row['product_name']}</td>";
                                    echo "<td>{$productrow['price']}</td>";
                                    echo "<td>{$productrow['qty']}</td>";
                                    echo"<td>{$total}</td>";
                                    echo "</tr>";
                                    $i++;
                                }
                            }
                            
                                ?>
                            </tbody>
                        </table>
                        <div class="total-price" style="margin-left: 70%;">
                            <table>
                                <tr>
                                    <td> <b> Grand Total </b></td>
                                    <td>₹
                                        <div id="d1"><?php echo $amount; ?></div>
                                    </td>
                                </tr>
                    </div>
                </section>
            </div>
        </div>
    </section>
   
    <!-- Required common Js -->
    <script src='jquery-2.2.3.min.js'></script>
    <!-- //Required common Js -->

    <!-- Sidebar-nav Js -->
    <!-- <script>
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });-->
    </script>
    <!--// Sidebar-nav Js -->

    <!-- dropdown nav -->
    <script>
    $(document).ready(function() {
        $(".dropdown").hover(
            function() {
                $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                $(this).toggleClass('open');
            },
            function() {
                $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                $(this).toggleClass('open');
            }
        );
    });
    </script>
    <!-- //dropdown nav -->

    <!-- Js for bootstrap working-->
    <script src="bootstrap.min.js"></script>
    <!-- //Js for bootstrap working -->
</body>

</html>