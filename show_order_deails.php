<?php
session_start();
require 'db_connect.php';
?>
<?php
$pid=$_GET['proid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Surya Engineers </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info ms-auto px-4 fixed-top">
        <div class="container-fluid">
            <!-- <b class="fs-2">Surya <span class="text-success fs-2">Electricals</span></b>-->
            <button class=" navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-4 text-center">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="customerside.php"><i class="fa fa-home"
                                aria-hidden="true"> Home</i></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="aboutus.php"><i class="fa fa-info"> About
                                Us</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="show_product.php"><i
                                class="fa fa-product-hunt"> Products</i></a>
                    </li>
                </ul>

                <a href="logout.php"><button type="button" class="btn btn-outline-primary">
                        <i class="fa fa-sign-in">Log Out</i></button></a>&nbsp;&nbsp;

            </div>
    </nav>
    <br>
    <div class="wrapper">
        <?php
            include "adminside.php";
        ?>

        <div id="content">
            <section class="tables-section">
                <div class="outer-w3-agile mt-3">
                    <br>
                    <h2 class="tittle-w3-agileits mt-4 mb-3 text-center fs-1" style="color:#1F45FC">Sales Order Details
                    </h2>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>

                             <th scope="col">product_name</th>
                             <th scope="col"> price </th>
                                <th scope="col">qty</th>
                                <th scop="col">sub total </th>
                               
                                <th scope="col3">Action</th>

                            </tr>
                        </thead>
                     <tbody>
                        <?php
                         $q = mysqli_query($conn, "SELECT *from sales_order_detail where sales_order_sales_order_id='$pid'") or die(mysqli_error($conn));
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
                            echo "<td><a href='feedback.php?proid=$productrow[product_product_id]'><input type='button' value='Feedback' class='btn btn-primary' style='margin:2px'></a>
                                   |<a href='ratting.php?proid=$productrow[product_product_id]'><input type='button' value='Rating' class='btn btn-primary' style='margin:2px'></a></td>";
                                  echo "</tr>";

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
