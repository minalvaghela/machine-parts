<?php
include "db_connect.php";
$msg="";
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $pid = $_POST['id'];
    $raw = $_POST['rawid'];
    $qty = $_POST['qty'];
    echo $pid;
    $insert_purdetail = "insert into production_detail VALUES('$raw','$pid','$qty')";
    $conn->query($insert_purdetail);
    
            {
               
                header("location:viewproduction.php?pid=$pid");
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