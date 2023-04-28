
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link  rel="stylesheet" href="pro.css">

</head>
<body>
<header>
    <?php include "nav.php"?>
</header>
<?php

require 'db_connect.php';
 echo "<br>";
 echo "<br>";

$sql="SELECT * FROM product";
$result=mysqli_query($conn,$sql);
?>
<div class="container">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h1 class="text-center p-2 text-primary fs-1">Product </h1>
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
                
                <div style="margin-left:20px">
                <?php
                    require 'db_connect.php';
                    $id=$row['product_id'];
                    $sql2=mysqli_query($conn,"SELECT AVG(ratting) from rating WHERE product_id= '$id'");
                    
                   $rat = mysqli_fetch_row($sql2)[0] ;
                  // echo "$rat";
                  if($rat <=1)
                       {
                        ?>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>
                    <?php } 
                       elseif($rat > 1 && $rat < 1.5)
                       {
                        ?>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>
                    <i class="fa fa-star-half" style="font-size:40px;color:yellow;"></i>
                    <?php }
                        elseif($rat >= 1.5 && $rat < 2)
                        { 
                        ?>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>

                    <?php }
                         elseif($rat >= 2 && $rat < 2.5)
                         {?>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>
                    <i class="fa fa-star-half" style="font-size:40px;color:yellow;"></i>
                    <?php
                         }
                           elseif($rat >=2.5 && $rat < 3)
                         {?>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>
                    <?php
                        }
                        elseif($rat >=3 && $rat <3.5)
                        { ?>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>
                    <i class="fa fa-star-half" style="font-size:40px;color:yellow;"></i>
                    <?php
                             }
                             elseif($rat >=3.5 && $rat <4)
                             { ?>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>
                    <?php
                             }
                             elseif($rat >=4 && $rat <4.5)
                             { ?>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>
                    <i class="fa fa-star-half" style="font-size:40px;color:yellow;"></i>
                    <?php
                             }
                             elseif($rat >=4.5 && $rat <5)
                             { ?>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>
                    <?php
                             }
                             elseif($rat ==5 )
                             { ?>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>
                    <i class="fa fa-star" style="font-size:40px;color:yellow;"></i>
                    <?php
                             }
                             else
                             {
                                echo "no rat assign";
                             }
                            
                    ?>
                    </div>
              



                <a href="order.php?id=<?= $row['product_id']; ?>" class="btn btn-danger btn-block btn-lg">Product Details</a>
                <?php
                if(isset($_SESSION['user_name']))
                {
                ?>
                         <button class="btn btn-danger mt-2" onclick="AddCart(<?= $row['product_id']; ?>)">Add TO Cart</button>
                
                <?php
                }
                ?>
            </div>
</nav>
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