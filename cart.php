<?php
session_start();
require 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Surya Engineers </title>
    <!-- Meta Tags -->
    <!--Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        // function cart(id,price) {
        //     alert(price);
        //     const qtys = document.getElementById(id).value;
        //     const pids = document.getElementsByName("id");
        //     const uid = document.getElementsByName("uid");
            
        //     for (let i = 0; i<qtys.length; i++) {
        //         var h = new XMLHttpRequest();
        //         h.open("GET", "cartqty.php?qty=" + qtys[i].value + "&pid=" + pids[i].value + "&uid=" + uid[0].value, true);
        //         h.onreadystatechange = function() {
        //             if (this.status == 200 && this.readyState == 4) {
        //                 document.getElementById('subt'.id).value = price * qtys;
        //                 document.getElementById("d1").innerHTML = this.responseText;
        //             }
        //         }
        //         h.send();
        //     }
        // }
        function cartAjax(id,price)
        {
            // alert(id);
            // alert(price);
            var qty = document.getElementById('qty'+id).value;
            // alert(qty);
            var uid = document.getElementById('uid'+id).value;
            var h = new XMLHttpRequest();
                h.open("GET", "cartqty.php?qty="+qty+"&pid="+id+"&uid="+uid,true);
                h.onreadystatechange = function() {
                    if (this.status == 200 && this.readyState == 4) {
                        document.getElementById('subt'+id).value = qty*price;
                        document.getElementById("d1").innerHTML = this.responseText;

                    }
                }
                h.send();
        }
        function RemoveItem(id,uname)
        {
            var h = new XMLHttpRequest();
            h.open("GET", "cartqty.php?delid="+id+"&uid="+uname,true);
            h.onreadystatechange = function() {
                if (this.status == 200 && this.readyState == 4) {
                        // alert(h.responseText);
                        if(h.responseText == 1)
                        {
                            alert("Product Remove!");
                            window.location.href="cart.php";
                        }
                        else
                        {
                            alert("Product Not Remove!");
                        }
                }
            }
            h.send();
        }
    </script>




</head>

<?php
include "adminside.php";
?>

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
                        <a class="nav-link active" aria-current="page" href="showproduct.php"><i
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
                    <h2 class="tittle-w3-agileits mt-4 mb-3 text-center fs-1" style="color:#1F45FC">Product
                        Information
                    </h2>
                    <br>
                    <form action="addorder.php" method="POST">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>

                                    <th scope="col"> Product Name </th>
                                    <th scope="col"> Product Price </th>
                                    <th scope="col"> Product Qoh </th>
                                    <th scope="col"> Product Image </th>
                                    <th scope="col"> sub total</th>
                                    <th scope="col"> Action </th>
                                </tr>
                            </thead>
                            <tbody>

                              <?php
                                $sql = "select * from cart where user_id = '$_SESSION[user_name]'";
                                $result = mysqli_query($conn, $sql);

                                $total = 0;
                                $i = 1;
                                if (mysqli_num_rows($result) > 0) {
                                    while ($cart = mysqli_fetch_array($result)) {
                                        $proid = $cart['product_id'];
                                        $sql1 = "select * from product where product_id = '$proid'";
                                        $res = mysqli_query($conn, $sql1);
                                        if(mysqli_num_rows($res)> 0)
                                        {
                                            while($row = mysqli_fetch_assoc($res))
                                            {
                                                $amount = $row['price'] * $cart['qty'];
                                                $total = $total + $amount;
                                                ?>
                                                <tr>
                                                <td><?php echo $row['product_name']?></td>
                                                <td><?php echo $row['price']?></td>
                                                <?php 
                                                $id = $row['product_id'];
                                                $price = $row['price'];
                                                ?>
                                                <td><input type='number' id="<?php echo 'qty'.$id?>" value='<?php echo $cart['qty']?>' onkeydown='return false' style='width:50px' min='1' max='10' onchange='cartAjax(<?php echo $id?>,<?php echo $price?>)'></td>
                                                <td><img src='<?php echo $row['product_image']?>' style='width:100px;'></td>
                                                <!-- <td><input type='hidden' name='id' id='' value='$proid'></td> -->
                                                <td><input type='text' id="<?php echo 'subt'.$id?>" value="<?php echo $price * $cart['qty']?>"></td>
                                                <td><button type="button" class='btn btn-outline-success' onclick="RemoveItem(<?php echo $id?>,'<?php echo $_SESSION['user_name']?>')">Remove</button></td>
                                                <td><input type='hidden' name='uid' id='<?php echo 'uid'.$id?>' value='<?php echo $_SESSION['user_name']?>'> </td>

                                                </tr>
                                           <?php
                                            }
                                        }
                                        // if (mysqli_num_rows($res) > 0) {
                                        //     while ($row = mysqli_fetch_assoc($res)) {
                                        //         $amount = $row['price'] * $cart['qty'];
                                               
                                        //         $total = $total + $amount;
                                        //         echo "<tr>";
                                        //         echo "<td>{$row['product_name']}</td>";
                                        //         echo "<td>{$row['price']}</td>";
                                        //         $price = $row['price'];
                                        //         $id = $row['product_id'];
                                        //         echo "<td><input type='number' name='qty' id='".$row['product_id']."' value='$cart[qty]' min='1' max='10' onchange='cart($id,$price)' onKeyDown='return false'></td>";
                                        //         echo "<td><img src='{$row['product_image']}' style='width:100px;'></td>";
                                        //         $subt = 'subt'.$row['product_id'];
                                        //         echo "<td><input type='text' value='". $row['price'] * $cart['qty'] ."' id='$subt' readonly></td>";
                                        //         echo "<td><input type='hidden' name='id' id='id' value='$proid'></td>";
                                        //         echo "<td><input type='hidden' name='uid' id='uid' value='$_SESSION[user_name]'> </td>";
                                             
                                        //         echo "</tr>";
                                        //         $i++;
                                        //     }
                                        // }
                                    }
                                }

                                ?>
                            </tbody>
                        </table>
                        <div class="total-price">
                            <table>
                                <tr>
                                    <td><h2 style="float:left">Subtotal</h1></td>
                                    <td><h2 style="float:right;margin-top:10px;margin-left:10px">₹
                                        <div id="d1" style="margin-left:30px;margin-top:-50px"><?php echo $total; ?></div>
                                        </h2>
                                    </td>
                                </tr>
                                <h5 class="tittle-w3-agileits mb-4">
                                   <!-- <a href="addorder.php">
                                        <button type="button" class="btn btn-primary" style="margin-left: 80%" name="book">
                                            <b>BUY</b>
                                        </button>
                                    </a>-->
                                    <a href="checkout.php"><button type="button">Checkout</button></a>
                                </h5>
                    </form>
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