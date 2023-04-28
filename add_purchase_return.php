<?php
session_start();
if($_SESSION['roleid'] == 2 || $_SESSION['roleid'] == 3) 
{
?>
<!DOCTYPE html>
<html lang="en">
<?php include "parsley.php"; ?>
<?php $pid=$_GET['pid'] ;
//echo "$pid";
?>
<?php $prid=$_GET['prid'];
//echo "$prid";
?>
<?php
if(isset($_POST['add']))
{
// $qty=$_POST['qty'];
 //$sql=mysqli_query($conn,"update raw_material set qty=qty-$qty ");
}
?>
<?php
require 'db_connect.php';
$sql3=mysqli_query($conn,"select qty from purchase_detail where purchase_purchase_id='$pid'");
$res=mysqli_fetch_row($sql3)[0];
//echo $res;
?>

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
                                <br>
                                <br>
                                <h2 class="tittle-w3-agileits mt-4 mb-3 text-center fs-1" style="color:#1F45FC">Purchase return
                                </h2>
                                <br>
                                <form action="_handle_add_purchase_return.php" method="POST" enctype="multipart/form-data"
                                    data-parsley-validate="" data-parsley-priority-enable=true
                                    data-parsley-required="This value is required">

                                    <?php
                                        include "db_connect.php";
                                    
                                        $msg="";
                                        if($_SERVER['REQUEST_METHOD'] == "POST")
                                        {
                                            $sup = $_POST['p1'];
                                            //echo $pid;
                                
                                        }
                                ?>

                                    <br>
                                    <input type="hidden"  name="pid"  value="<?php echo $pid;?>">
                                    <input type="hidden"  name="prid" value="<?php echo $prid;?>">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Raw Material</label>
                                        <div class="col-sm-10">
                                            <select name="rawid" class="form-control" id="raw_id" required
                                                data-parsley-required-message="Select any raw material">
                                                <option value="">SELECT</option>
                                                <?php
                                                  
                                                //    $sql="SELECT * FROM raw_material where raw_material_id in(select raw_material_raw_material_id from purchase_details where purchase_purchase_id='$pid')";
                                                   $sql = "SELECT * FROM `raw_material` WHERE `raw_material_id` in(SELECT `raw_material_raw_material_id` FROM `purchase_detail` WHERE `purchase_purchase_id` ='$pid')";
                                                   $result=mysqli_query($conn,$sql);
                                                   while($row=mysqli_fetch_array($result))
                                                   {
                                                      echo "<option value='".$row['raw_material_id']."'>".$row['raw_material_name']."</option>";
                                                   }
                                         
                                    ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Qty</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="qty" name="qty" max="<?php echo $res ?>"
                                                placeholder="Enter Purchase Qty" required autocomplete="off"
                                                data-parsley-trigger="keyup"
                                                data-parsley-required-message="Purchase Qty is required"
                                                data-parsley-type="number" min="1">

                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" name="add" class="btn btn-primary"> Add
                                                Purchase return</a>
                                            </button>
                                            <button style="margin-left:2%" type="button"
                                                onclick="window.location='purchase_return.php'" class="btn btn-info">
                                                View </button>
                                        </div>
                                    </div>
                                </form>

                                <div id="content">
                                    <section class="tables-section">
                                        <div class="outer-w3-agile mt-3">
                                            <br>
                                            <h2 class="tittle-w3-agileits mt-4 mb-3 text-center fs-1"
                                                style="color:#1F45FC">Purchase return information
                                            </h2>
                                            <br>
                                            <table class="table">
                                                <thead class="thead-dark">
                                                    <tr>

                                                        <th scope="col"> Purchase_return Id</th>
                                                        <th scope="col"> raw material </th>
                                                        <th scope="col">qty</th>
                                                        <!-- <th scope="col"> Action </th>-->
                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    <?php
                                
                               
                                $q = mysqli_query($conn, "SELECT * from `purchase_return_detail` where purchase_return_purchasereturn_id='$prid'") or die(mysqli_error($conn));
                                
                               
                                while ($productrow = mysqli_fetch_array($q)) {
                                    echo "<tr>";
                                    $rawid=$productrow['raw_material_raw_material_id'];
                                    $sql2=mysqli_query($conn,"select raw_material_name from raw_material where raw_material_id='$rawid'");
                                    $name=mysqli_fetch_row($sql2)[0];
                                    echo "<td>$prid</td>";
                                    echo "<td>$name</td>";
                                    echo "<td>{$productrow['qty']}</td>";
                                    //echo "<td><a href='editpro.php?editid={$productrow['product_id']}'><input type='button' value='Edit' class='btn btn-primary' style='margin:2px'></a>| <a href='displayproduct.php?delid={$productrow['product_id']}]'><input type='button' value='delete' class='btn btn-danger' style='margin:2px'></a></td>";
                                    echo "</tr>";
                                }
                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                            </div>
                </section>

            </div>
        </div>
        </div>
    </section>
    </div>
    </div>
    </section>

    <!-- Required common Js -->
    <script src='jquery-2.2.3.min.js'></script>
    <!-- //Required common Js -->

    <!-- Sidebar-nav Js -->
    <script>
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
    </script>
    <!--// Sidebar-nav Js -->

    <!-- Validation Script -->
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';

        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    </script>
    <!--// Validation Script -->

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
<?php
}
else
{
    header("location:errorpage.php");
}
?>