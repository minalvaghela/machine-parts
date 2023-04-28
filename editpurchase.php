<?php
session_start();
include "parsley.php";
require 'db_connect.php';
$msg = "";
$editid = $_GET['editid'];
if(!isset($_GET['editid']) || empty($_GET['editid']))
{
    header("location:viewpurchase.php");
}
$q = mysqli_query($conn, "SELECT *from purchase_detail where raw_material_raw_material_id='{$editid}'") or die(mysqli_error($conn));                               
while ($row = mysqli_fetch_array($q)) 
{
     $id=$row['purchase_purchase_id'];
     $qty=$row['qty'];
     $price=$row['price'];    

     $rawid=$row['raw_material_raw_material_id'];
     $sql2=mysqli_query($conn,"select raw_material_name from raw_material where raw_material_id='$rawid'");
     $name=mysqli_fetch_row($sql2)[0];
   //echo $name;
   //$ttprice=$qty*$price;
} 

if (isset($_POST['update'])) 
{
    $qty2=$_POST['qty'];   
    $id1=$_GET['editid'];
    $rowid=$_GET['rowid'];
    $qupdate = mysqli_query($conn, "UPDATE `purchase_detail` SET qty='{$qty2}',price='{$price}' WHERE  raw_material_raw_material_id='{$rowid}'") or die(mysqli_error($conn));
    //echo $qupdate;
    if ($qupdate) 
    {
$msg = '<div class="alert alert-success mt-4" role="alert">
Your purchase editted successfully!!!
        </div>';  
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        Surya Engineers </title>
    <!--Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords"
        content="Modernize Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />


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
                <?php
echo $msg;
?>
                <section class="forms-section">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="outer-w3-agile col-xl mt-3 mr-xl-3">
                                <br>
                                <h2 class="tittle-w3-agileits mt-4 mb-3 text-center fs-1" style="color:#1F45FC">Edit
                                    Purchase
                                    Information
                                </h2>
                                <br>
                                <form method="post" enctype="multipart/form-data" data-parsley-validate=""
                                    data-parsley-priority-enable=true data-parsley-required="This value is required">
                                    <input type="hidden" class="form-control" id="name" value="<?php echo $id ?>"
                                        name="purchase_id">
                                    <form method="post" enctype="multipart/form-data" data-parsley-validate=""
                                        data-parsley-priority-enable=true
                                        data-parsley-required="This value is required">
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-2 col-form-label"> Price
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputPassword3" id="name"
                                                    name="price" value="<?php echo $price ?>"
                                                    placeholder="Enter Purchase price" required autocomplete="off"
                                                    data-parsley-trigger="keyup"
                                                    data-parsley-required-message="Purchase Price is required"
                                                    data-parsley-type="number">

                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">
                                                Qty </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="ser" name="qty"
                                                    value="<?php echo $qty ?>" placeholder="Enter Purchase Qty" required
                                                    data-parsley-required-message="Purchase Qty is required"
                                                    data-parsley-type="number">

                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-2 col-form-label"> Raw Material
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="qoh" name="raw material"
                                                    value="<?php echo $name ?>" placeholder="Enter Raw material"
                                                    required data-parsley-required-message="Raw material is required">

                                            </div>
                                        </div>
                                        <!-- <br>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-2 col-form-label"> Total amount
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputPassword3"
                                                    name="product_image" value="<?php echo $ttprice?>"
                                                    placeholder="Total amount" required
                                                    data-parsley-required-message="Total Amount is required">
                                            </div>
                                        </div> -->
                                        <br>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" name="update" class="btn btn-primary"> Update
                                                    Purchase </button>
                                                <button style="margin-left:2%" type="reset" class="btn btn-danger">
                                                    Reset</button>
                                                <button style="margin-left:2%" type="button"
                                                    onclick="window.location='viewpurchase.php?pid=<?php echo $id?>'" class="btn btn-info">
                                                    View </button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</body>

</html>