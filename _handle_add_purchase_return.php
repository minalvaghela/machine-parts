<?php
include "db_connect.php";
$msg="";
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $pid = $_POST['pid'];
    $prid=$_POST['prid'];
    $raw = $_POST['rawid'];
    $qty = $_POST['qty'];
    $sql=mysqli_query($conn,"select qty from purchase_detail where purchase_purchase_id='$pid' and raw_material_raw_material_id='$raw'");
    $qty_purchase=mysqli_fetch_array($sql)[0]; 
    echo $qty_purchase."<br>";
    echo $qty;
    $finalqty=$qty_purchase-$qty;
    echo $finalqty;
    $insert_purdetail = "insert into purchase_return_detail VALUES('$prid','$raw','$qty')";
    $conn->query($insert_purdetail);
    $updateqty="update purchase_detail set qty='$finalqty' where purchase_purchase_id='$pid' and raw_material_raw_material_id='$raw'";
    $conn->query($updateqty);
            {
               
                header("location:add_purchase_return.php?pid=$pid & prid=$prid");
                $msg = '<div class="alert alert-success mt-4" role="alert">
                Your Purchase Added Successfully!!!
           </div>';
           echo $msg;
            }
         //   else
            {
                echo "<script>alert('somthing wrong')</script>";   
            }
    }
   // else
    {
        echo "<script>alert('somthing wrong')</script>";
    }

?>