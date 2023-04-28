<?php
include 'db_connect.php';
if(isset($_GET['rawid']))
{
    $id = $_GET['rawid'];
    $sql = mysqli_fetch_row(mysqli_query($conn,"SELECT `price` FROM `raw_material_detail` WHERE `raw_material_raw_material_id` ='$id'"))[0];
    echo $sql;
}
