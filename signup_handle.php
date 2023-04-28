<?php
include "db_connect.php";
$showerror="false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
     $username=$_POST['uname'];
    //$customername=$_POST['cname'];
    $password=$_POST['pass'];
    $confirmpassword=$_POST['cpwd'];
    $mob=$_POST['mob'];
    $email=$_POST['email'];
    // $zipcode=$_POST['zpass'];
    $address=$_POST['address'];
    $gender=$_POST['gender1'];
   /*if(isset($_GET['zipcode']))
    {
        $zipcode=$_GET['zipcode'];
        $query="select area_name from area where area_pincode='$zipcode'";
        $query_run=mysqli_query($conn,$query);
        
    }*/
    $exitsql="select * from user_details where user_id='$username'";
    $result=mysqli_query($conn,$exitsql);
    $numRows=mysqli_num_rows($result);
    
    if($numRows>0){
        $showerror="user already exits";
    }
    else{
        if($password==$confirmpassword){
            echo "insert in fi";
            $hash=password_hash($password,PASSWORD_DEFAULT);
            $query1 = "INSERT INTO `user_details` (`user_id`, `user_password`, `email_id`, `role_id`, `address`, `mob`, `gender`) VALUES ('$username', '$password', '$email', '1', '$address', '$mob', '$gender')";
            $exe = mysqli_query($conn,$query1);
            if($exe)
            {
                echo "enter in sec if";
                $showAlert =true;
                header("location:home.php");
                exit();
            }

        }
        else
        {
            $showerror="password do not match";
            
        }

    }
   //header("Location:/machince&parts/home.php");



}
?>