<?php
include "db_connect.php";
$msg="";
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $pid = $_POST['pid'];
    $id = $_POST['id'];
    $raw = $_POST['rawid'];
    $qty = $_POST['qty'];
    echo $pid;
    $sql=mysqli_query($conn,"select qty from purchase_deatil where purchase_purchase_id='$id' and raw_material_raw_material_id='$raw'");
    $qty_purchase=mysqli_fetch_row($sql); 
    $finalqty=$qty_purchase-$qty;  
    $insert_purdetail = "insert into purchase_return_detail VALUES('$pid','$raw','$qty')";
    $conn->query($insert_purdetail);
   $updateqty="update set purchase_detail qty='$finalqty' where purchase_purchase_id='$id' and raw_material_raw_material_id='$raw'";
    $conn->query($updateqty);
            {
               
                header("location:viewpurchase_return.php?pid=$pid ");
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