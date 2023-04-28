<?php
include "db_connect.php";
$msg="";
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $proid = $_POST['id'];
    $raw = $_POST['raw_id'];
    $qty = $_POST['qty'];
   // echo $pid;
    
    $insert_purdetail = "insert into production_detail values('$raw','$proid','$qty')";
    $conn->query($insert_purdetail);
            {
               
                header("location:add_production.php?proid=$proid");
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