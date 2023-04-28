<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<script>
    function call()
    {
        var h= document.getElementById("id").value;
        var x= new XMLHttpRequest();
        x.onreadystatechange=function()
        {
            if(this.status==200 && this.readyState==4)
            {
             alert(x.responseText);
            }
        }
        x.open("GET","cart.php?id="+h,true);
        x.send();
        
    }
</script>

<body>
<nav class="navbar navbar-expand-lg navbar-light ms-auto px-4 fixed-top"  style="background-color:#5bc0de">
        <div class="container-fluid">
            <!-- <b class="fs-2">Surya <span class="text-success fs-2">Electricals</span></b>-->
            <button class=" navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-4 text-center">
                    <?php
    // require "login_handle.php";
    if(isset($_SESSION['name'])){
    echo $_SESSION['name'];
    }
    ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="customerside.php"><i class="fa fa-home"
                                aria-hidden="true"> Home</i></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="aboutus.php"><i class="fa fa-info"> About
                                Us</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="show_product.php"><i class="fa fa-product-hunt"> Products</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="cart.php"><i class="fa fa-product-hunt"> view cart</i></a>
                    </li>
                </ul>

                <a href="logout.php"><button type="button" class="btn btn-outline-primary">
                        <i class="fa fa-sign-in">Log Out</i></button></a>&nbsp;&nbsp;
            </div>
        </div>
</nav>
    <br>
    <br>
    <?php

require 'db_connect.php';
 echo "<br>";
 echo "<br>";

$sql="SELECT * FROM product";
$result=mysqli_query($conn,$sql);
?>
    <div class="container">
        &nbsp;&nbsp;
        <br>
        <br>
        <h1>Products</h1>
        <div class="row">
            <?php
    while($row=mysqli_fetch_array($result))
    {
    ?>
            <div class="col-lg-4 mt-3 mb-3">
                <div class="card-deck">
                    <div class="card border-info p-2">
                        <img src="<?= $row['product_image']; ?>" class="card-image-top" height="120">
                        <h5 class="card-title">Product : <?= $row['product_name']; ?></h5>
                        <h3>Price : <?= number_format($row['price']); ?>/--</h3>
                        <input type= "hidden" name="id" value="<?= $row['product_id'];?>">
                        <a href="book_order.php?id=<?= $row['product_id']; ?>"
                            class="btn btn-danger btn-block btn-lg">Product details</a>
                        <!-- <a href="cart.php?id=" class="btn btn-danger btn-block btn-lg" onclick="call()">Add to
                            cart</a> -->
                        
                         <button class="btn btn-danger mt-2" onclick="AddCart(<?= $row['product_id']; ?>)">Add TO Cart</button>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
<script>
    function AddCart(proid)
    {
        // alert(proid);
        var obj = new XMLHttpRequest();
        obj.onreadystatechange = function()
        {
            if(obj.status == 200 && obj.readyState == 4)
            {
                alert(this.responseText);
            }
        }
        obj.open("GET","cartAdd.php?cid="+proid,true);
        obj.send();
    }
</script>
</body>

</html>