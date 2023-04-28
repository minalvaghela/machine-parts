<?php
session_start();
require 'db_connect.php';
?>
<?php

    $sql="select * from cart where user_id='$_SESSION[user_name]'";
    $res=mysqli_query($conn,$sql);
    $q="INSERT INTO `sales_order` (user_id) VALUES ('$_SESSION[user_name]')";
    mysqli_query($conn,$q);    
    while($row=mysqli_fetch_array($res))
    {
        $pro_id=$row['product_id'];
        $sql1="select *from product where product_id='$pro_id'";
        $res1=mysqli_query($conn,$sql1);
        while($row2=mysqli_fetch_array($res1))
        {
        $price=$row2['price'];
        $qty=$row['qty'];
        $tprice=$price*$qty;
        $user=$row['user_id'];
        $sql3="select max(sales_order_id) from sales_order";
        $res3=mysqli_query($conn,$sql3);
        $id1=mysqli_fetch_row($res3)[0];
        $q2="INSERT INTO sales_order_detail (product_product_id,sales_order_sales_order_id,qty,price) VALUES ('$pro_id','$id1','$qty','$price' )";
        mysqli_query($conn,$q2);

    }
    }
    $s="DELETE FROM cart WHERE  user_id='$_SESSION[user_name]'";
        mysqli_query($conn,$s);
        // echo "$_SESSION[user_name]";
        header("location:showproduct.php");

?>