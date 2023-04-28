<?php
include 'db_connect.php';   
     $proid=$_POST['p1'];
     $date=date("Y-m-d");
     $sql="insert into production (product_product_id,date) values('$proid','$date')";
     $conn->query($sql);
     $sql="select max(production_id) from production";
     $res=$conn->query($sql);
     $q=mysqli_fetch_array($res);
     $proid=$q[0];
     header("location:add_production.php?proid=$proid");
?>
