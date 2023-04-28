<?php
include "db_connect.php";
$msg="";
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $pid = $_POST['id'];
    $raw = $_POST['rawid'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    echo $pid;
   // echo $raw;
    //echo $qty;
    //echo $price;
    
    $insert_purdetail = "insert into purchase_detail VALUES('$pid','$qty','$price','$raw')";
    $conn->query($insert_purdetail);
   
            {
               
                header("location:add_purchase.php?pid=$pid");
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