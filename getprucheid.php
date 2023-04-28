<?php
include 'db_connect.php';
    

$supid=$_POST['p1'];
     $date=date("Y-m-d");
     $sql="insert into purchase_return(purchase_purchase_id,date) values('$supid','$date')";
     $conn->query($sql);
     $sql="select max(purchasereturn_id) from purchase_return";
     $res=$conn->query($sql);
     $q=mysqli_fetch_array($res);
     $pid=$q[0];
     header("location:add_purchase_return.php?pid=$supid & prid=$pid");
?>
