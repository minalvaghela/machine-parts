<?php
include 'db_connect.php';
    

$supid=$_POST['s1'];
     $date=date("Y-m-d");
     $sql="insert into purchase (supplier_supplier_id,date) values('$supid','$date')";
     $conn->query($sql);
     $sql="select max(purchase_id) from purchase";
     $res=$conn->query($sql);
     $q=mysqli_fetch_array($res);
     $pid=$q[0];
     header("location:add_purchase.php?pid=$pid");
?>
