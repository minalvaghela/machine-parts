<?php include "parsley.php"; ?>
<?php
session_start();
require 'db_connect.php';
$msg = "";
if ($_POST) {
    
    $dis=$_POST['dis'];
    $pro=$_POST['pro_id'];
    $ser=$_POST['ser_id'];
    $userid = $_SESSION['user_name'];
    // echo "<script>alert('$userid')</script>";

    $sql = "INSERT INTO `inquiry`(`user_user_id`, `discripation`, `inquiry_status`, `product_product_id`, `services_services_id`) VALUES ('$userid','$dis','init','$pro','$ser')";
    $q = mysqli_query($conn,$sql);
    if ($q) {


        $msg = '<div class="alert alert-success mt-5" role="alert">
                    Your Inquiry submitted successfully!!!
                </div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Inquiry </title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<header>
    <?php include "nav.php";
    ?>
</header>

<body>
   
    <br>
    <div class="wrapper">
        <?php
            include "adminside.php";
            ?>
        <div id="content">
            <?php
     echo $msg;
    ?>
            <section class="forms-section">
                <div class="container-fluid">
                    <div class="row">
                        <div class="outer-w3-agile col-xl mt-3 mr-xl-3">
                            <br>
                            <h2 class="tittle-w3-agileits mt-4 mb-3 text-center fs-1" style="color:#1F45FC">Inquiry
                                Information
                            </h2>

                            <br>
                            <form method="post" enctype="multipart/form-data" data-parsley-validate=""
                                data-parsley-priority-enable=true data-parsley-required="This value is required">
                                <label for="title">Select product:</label>
                                <select name="pro_id" class="form-control" id="catid" required
                                    data-parsley-trigger="keyup" data-parsley-required-message="Select any product">
                                    <option value="">SELECT</option>

                                    <?php
                                          require('db_connect.php');
                                          $sql = "SELECT * FROM product"; 
                                          $result = mysqli_query($conn,$sql);
                                          while($row = mysqli_fetch_assoc($result)){
                                             echo "<option value='".$row['product_id']."'>".$row['product_name']."</option>";
                                          }
                                    ?>
                                </select>
                                <br>
                                <label for="title">Select service:</label>
                                <select name="ser_id" class="form-control" id="catid" required
                                    data-parsley-trigger="keyup" data-parsley-required-message="Select any service">
                                    <option value="">SELECT</option>

                                    <?php
                                          require('db_connect.php');
                                          $sql = "SELECT * FROM services"; 
                                          $result = mysqli_query($conn,$sql);
                                          while($row = mysqli_fetch_assoc($result)){
                                             echo "<option value='".$row['services_id']."'>".$row['name']."</option>";
                                          }
                                    ?>
                                </select>
                                <br>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label"> Discription:</label>
                                    <textarea class="form-control" id="name" name="dis" placeholder="Enter Inquiry"
                                        required autocomplete="off" data-parsley-trigger="keyup"
                                        data-parsley-required-message="Discription is required"></textarea>


                                </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" name="submit" class="btn btn-primary"> Post
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
        </div>
        </section>

    </div>
    </div>

</body>

</html>