<?php
  require 'db_connect.php';
  if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="SELECT * FROM product WHERE product_id='$id'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    $pname=$row['product_name'];
    $pprice=$row['price'];
    $pimage=$row['product_image'];
  }
  else
  {
    echo "No product found!";
  }
?>
<?php
/*
require 'db_connect.php';
 if(isset($_POST['total'])){
    $qty=$_POST['qty'];
    $total_price=$pprice*$qty;
 }*/
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete your order</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
include "adminside.php";
?>
    <nav class="navbar navbar-light bg-primary fixed-top" style="height:7%">
    </nav>
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container">
        <br>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5">
                <br>
                <br>
                <h2 class="text-center p-2 text-primary fs-1">Product Details</h2>
                <br>
                <br>
                <table class="table table-bordered" width="500px">
                    <tr>
                        <th style="font-size: 25px;">Product Name:</th>
                        <td style="font-size: 25px;"><?= $pname; ?></td>
                        <td rowspan="4" class="text-center"><img src="<?= $pimage; ?>" width="200"></td>
                    </tr>
                    <tr>
                        <th style="font-size: 25px;">Product Price:</th>
                        <td style="font-size: 25px;">Rs. <?= number_format ($pprice); ?>/-</td>
                    </tr>


                </table>
                <!-- <h4>Enter your details:</h4>-->
                <form action="pay.php" method="POST" accept-charset="utf-8">
                    <input type="hidden" name="product_name" value="<?= $pname; ?>">
                    <input type="hidden" name="product_price" value="<?= $pprice; ?>">
                    <!-- <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Enter your name" require>
                    </div> 
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" require>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" class="form-control" placeholder="Enter your phone" require>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-danger btn-lg" value="Click to pay: Rs.<?= number_format($total_price); ?>/-">
                           
                    </div>-->
                    <?php
                    require 'db_connect.php';
                    $sql2=mysqli_query($conn,"SELECT AVG(ratting) from rating WHERE product_id= '$id'");
                    
                   $rat = mysqli_fetch_row($sql2)[0] ;
                  // echo "$rat";
                  if($rat <=1)
                       {
                        ?>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>
                    <?php } 
                       elseif($rat > 1 && $rat < 1.5)
                       {
                        ?>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>
                    <i class="fa fa-star-half" style="font-size:60px;color:yellow;"></i>
                    <?php }
                        elseif($rat >= 1.5 && $rat < 2)
                        { 
                        ?>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>

                    <?php }
                         elseif($rat >= 2 && $rat < 2.5)
                         {?>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>
                    <i class="fa fa-star-half" style="font-size:60px;color:yellow;"></i>
                    <?php
                         }
                           elseif($rat >=2.5 && $rat < 3)
                         {?>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>
                    <?php
                        }
                        elseif($rat >=3 && $rat <3.5)
                        { ?>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>
                    <i class="fa fa-star-half" style="font-size:60px;color:yellow;"></i>
                    <?php
                             }
                             elseif($rat >=3.5 && $rat <4)
                             { ?>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>
                    <?php
                             }
                             elseif($rat >=4 && $rat <4.5)
                             { ?>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>
                    <i class="fa fa-star-half" style="font-size:60px;color:yellow;"></i>
                    <?php
                             }
                             elseif($rat >=4.5 && $rat <5)
                             { ?>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>
                    <?php
                             }
                             elseif($rat ==5 )
                             { ?>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:60px;color:yellow;"></i>
                    <?php
                             }
                             else
                             {
                                echo "no rat assign";
                             }
                            
                    ?>

                </form>
            </div>
        </div>
    </div>
</body>

</html>