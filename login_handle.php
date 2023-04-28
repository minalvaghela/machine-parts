<?php
session_start();
include "db_connect.php";
$showerror="false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
  // $username=$_POST['username'];
  // $password=$_POST['pass'];
  $username=$_POST['username'];
  $password=$_POST['pass'];
        $sql ="select * from user_details where user_id='$username'";
        $result=mysqli_query($conn,$sql);
        $numRows=mysqli_num_Rows($result);
        if($numRows>0){
            $row=mysqli_fetch_assoc($result);
               if($password == $row['user_password']){
                 
                  $_SESSION['u_name']= $row['user_id'];
                  $_SESSION['roleid']= $row['role_id'];
                  if($_SESSION['roleid'] == '2' || $_SESSION['roleid'] == '3')
                  {
                    // header("location:Admin Dashboard\index.php");
                    echo "3";
                  }
                
                  if ($_SESSION['roleid'] =='4')
                  {
                    // $sql1 ="select * from service_detail where user_id='$_SESSION[u_name]'";
                    // $res1 = mysqli_query($conn,$sql1);
                    // echo "$res1";
                    // header("location:view_services.php");
                    echo "2";
                  }
                
                
                  if($_SESSION['roleid'] =='1')
                 {
                 $_SESSION['user_name']=$row['user_id'];
                //  header("location:/machince&parts/customerside.php");
                echo "1";
                }
              }
              else
              {
                echo "Invalid Password OR Username";
              }
            }
          else
          {
            echo "Invalid Password OR Username";
          }
          }
        