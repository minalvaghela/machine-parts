<?php
require 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Surya Engineers </title>
    <!-- Meta Tags -->

    <script>
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>

</head>

<body>
    <nav class="navbar navbar-light bg-primary fixed-top" style="height:7%">
    </nav>
    <div class="wrapper">
        <?php
            include "adminside.php";
        ?>
        <div id="content">

            <section class="tables-section">

                <div class="outer-w3-agile mt-3">
                    <br>
                    <h2 class="tittle-w3-agileits mt-4 mb-3 text-center fs-1" style="color:#1F45FC">Services Information
                    </h2>
                    <table class="table">

                        <thead class="thead-dark">
                            <tr>
                                <th scope="col"> Services id</th>
                                <th scope="col"> Servicemen id </th>
                                <th scope="col"> Services Order id </th>
                                <th scope="col"> Action </th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                               /* if (isset($_GET['deleteid'])) {
                                    $deleteid = $_GET['deleteid'];

                                    $q = mysqli_query($conn, "delete from product_detail where product_id = '{$deleteid}'") or die(mysqli_error($conn));
                                    if ($q) {
                                        echo "<script> alert('Record Deleted'); </script>";
                                    }
                                }
                                
                               /* $display = "SELECT
                                                
                                                 `product_detail`.`product_name`
                                                , `product_detail`.`product_details`
                                                , `product_detail`.`product_price`
                                                , `product_detail`.`product_image`
                                                
                                            FROM
                                                `category`
                                                INNER JOIN `product_detail` 
                                                    ON (`category`.`category_id` = `product_detail`.`category_id`)
                                            ORDER BY `product_detail`.`product_id` ASC";*/

                                $q = mysqli_query($conn, "SELECT * FROM `service_detail` WHERE `servicemen_servicemen_id` = 'dp' AND `service_order_id` IN(SELECT `service_order_id` FROM `serviceorder` WHERE `services_status` = '')") or die(mysqli_error($conn));
                                
                               
                                while ($productrow = mysqli_fetch_array($q)) {
                                    echo "<tr>";
                                    echo '  <form method="POST">
                                    ';
                                    $id= $productrow['service_order_id'];
                                   // echo "<td>{]}</td>";
                                   echo "<td>{$productrow['services_services_id']}</td>";
                                    echo "<td>{$productrow['servicemen_servicemen_id']}</td>";
                                    echo "<td>{$productrow['service_order_id']}</td>";
                                    //echo "<td><img src='{$productrow['product_image']}' style='width:100px;'></td>";
                                    //echo "<td>{$productrow['product_category_product_category_id']}</td>";
                                    echo "<td><a href'#'> <button class='btn btn-outline-primary' type='submit' value='$id' name='updatebtn'>Update call</button> </a> </td>";
                                    echo "</tr>";
                                }
                                if($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['updatebtn'])))
                                {

                                    $id1=$_POST['updatebtn'];
                                    //echo $id1;

                                   $sql1="UPDATE serviceorder SET services_status='initiated' WHERE service_order_id ='$id1'";
                                    //mysqli_query($conn,$sql);
                                    // $sql1="insert into serviceorder(services_status) values ('initiated') where service_order_id ='$id1' ";
                                    mysqli_query($conn,$sql1);
                                    if($sql1)
                                    {
                                        $msg= '<div class="alert alert-success mt-5" role="alert">
                                        Your Service Assign Suceessfully!!!
                                 </div>';
                                        echo $msg;
                                        //echo "<script>alert('right')</script>";
                                    }
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>

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