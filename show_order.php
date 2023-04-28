<?php
session_start();
require 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Surya Engineers </title>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Meta Tags -->

    <script>
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <header>
        <?php
        include "nav.php";
        ?>
    </header>
    <body>
   
    <br>

   
        <div class="wrapper">
            <?php
            include "adminside.php";
        ?>
            <div id="content">
                <section class="tables-section">
                    <div class="outer-w3-agile mt-3">
                        <br>
                        <h2 class="tittle-w3-agileits mt-4 mb-3 text-center fs-1" style="color:#1F45FC">Sales Order
                        </h2>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col"> sales_oder_id </th>
                                    <th scope="col"> User_id</th>
                                    <th scope="col"> Date </th>
                                    
                                    <th scope="col2s"> Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $q = mysqli_query($conn, "SELECT * from sales_order where user_id= '$_SESSION[user_name]'") or die(mysqli_error($conn));
                                
                               
                                while ($productrow = mysqli_fetch_array($q)) {
                                    echo "<tr>";
                                    echo "<td>{$productrow['sales_order_id']}</td>";
                                    echo "<td>{$productrow['user_id']}</td>";
                                    echo "<td>{$productrow['date']}</td>";
                                   
                                   // echo "<td>$ttprice</td>";
                                    //echo  "<td> $uid </td>";
                                   // $q2=mysqli_query($conn,"SELECT user_id FROM sales_order WHERE sales_order_id='$productrow[sales_order_sales_order_id]'");
                                   echo "<td><a href='show_order_deails.php?proid=$productrow[sales_order_id]'><input type='button' value='VIEW' class='btn btn-primary' style='margin:2px'></a>
                                   |<a href='invoice.php?proid=$productrow[sales_order_id] & uid={$productrow['user_id']}'><input type='button' value='invoice' class='btn btn-primary' style='margin:2px'></a></td>";
                    
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