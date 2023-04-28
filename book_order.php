<?php
  require 'db_connect.php';
  session_start();
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete your order</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
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
    <?php
include "adminside.php";
?>

    
    <br>
    <div class="container">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5">
                <br>
                <h2 class="text-center p-2 text-primary">Fill the details to complete your order</h2>
                <br>
                <h3 class="text-info">Product Details: </h3>
                <br>
                <table class="table table-bordered" width="500px">
                    <tr>
                        <th>Product Name:</th>
                        <td><?= $pname; ?></td>
                        <td rowspan="4" class="text-center"><img src="<?= $pimage; ?>" width="400" height="400">
                        </td>
                    </tr>
                    <tr>
                        <th>Product Price:</th>
                        <td>Rs. <?= number_format ($pprice); ?></td>
                    </tr>
                </table>


                <form action="addtocart.php" method="POST" accept-charset="utf-8">
                    <input type="hidden" name="product_name" value="<?php echo $pname; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $pprice; ?>">
                   
                    <input type="hidden" name="id" value="<?php  echo $id ;?>">
                    <input type="number" name="qty" class="form-control" placeholder="Enter your qty" require>
                    <input  type="submit" name="book" value="ADD to cart" class="btn btn-primary btn-lg">
                    </form>    
            </div>
        </div>
    </div>
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
        
                        <?php
                           $q = mysqli_query($conn, "SELECT * from feedback where product_product_id='$id'" ) or die(mysqli_error($conn));
                                while ($feedbackrow = mysqli_fetch_array($q)) {                                    
                                    echo "<tr>";
                                    echo "<td>{$feedbackrow['discription']}</td>";
                                    echo "<td>{$feedbackrow['date']}</td>";
                                    echo "</tr>";
                                }
                                ?>  


</body>

</html>