<?php

   require('db_connect.php');
   $sql = "SELECT * FROM city
         WHERE state_state_id LIKE '%".$_GET['id']."%'"; 
   $result = mysqli_query($conn,$sql);
   $area_arr = [];
   while($row = mysqli_fetch_assoc($result)){
        $area_arr[$row['city_id']] = $row['city_name'];
   }
   echo json_encode($area_arr);
?>