<?php include "parsley.php"; ?>
<?php
require 'db_connect.php';
session_start();
$msg="";
$user = "";
$email = "";
$mob = "";
$add = "";
// echo $_SESSION['userid'];
// $var = $_SESSION['userid'];
// echo "<script>alert($var)</script>";
$sql1 ="select * from user_details where user_id='$_SESSION[user_name]'";
$res1 = mysqli_query($conn,$sql1);
if($res1)
{
    $row1 = mysqli_fetch_assoc($res1);
    $user = $row1['user_id'];
    $email = $row1['email_id'];
    $mob = $row1['mob'];
    $add = $row1['address'];
}


if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
   // echo "enter";
    $user_id = $_SESSION['user_name'];
    $email_id = $_POST['email_id'];
    $mobile = $_POST['mob'];
    $addres = $_POST['address'];

    $sqlupdate ="UPDATE user_details SET email_id='$email_id',address='$addres',mob='$mobile' where user_id='$user_id'";
    
    $res12=mysqli_query($conn,$sqlupdate);
    if($res12)
    {
        $sql2 ="SELECT * FROM user_details WHERE user_id='$user_id'";
        $res = mysqli_query($conn,$sql2);
        $row = mysqli_fetch_assoc($res);
        $user = $row['user_id'];
        $email = $row['email_id'];
        $mob = $row['mob'];
        $add = $row['address'];

        $msg = '<div class="alert alert-success mt-5" role="alert">
        Your Profile Updated successfully!!!
   </div>';
   echo $msg;
    }
    

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Surya engineers</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<header>
    <?php
     include "nav.php";
    ?>
</header>
<body>
    

    <div class="wrapper">
        <?php
            include "adminside.php";
            ?>
        <section class="forms-section">

            <div class="container-fluid">
                <div class="row">

                    <div class="outer-w3-agile col-xl mt-3 mr-xl-3">
                        <br>
                        <h2 class="tittle-w3-agileits mt-4 mb-3 text-center fs-1" style="color:#1F45FC"> Edit User
                            Master Information
                        </h2>
                        <br>
                        <form method="post" enctype="multipart/form-data" data-parsley-validate=""
                            data-parsley-priority-enable=true data-parsley-required="This value is required">
                            <!--  <input type="hidden" class="form-control" id="inputEmail3" value="" name="customer_id">-->

                            <div class="form-group row">
                                <label for="username" class="col-sm-2 col-form-label"> Name </label>
                                <div class="col-sm-10">
                                    <input id="name" type="text" class="form-control" id="inputPassword3" name="user_id"
                                        value='<?php echo "$user";?>' placeholder="Enter User Name" required
                                        autocomplete="off" data-parsley-trigger="keyup"
                                        data-parsley-required-message="Username is required">


                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label"> Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email_id"
                                        value='<?php echo "$email";?>' id="inputEmail3" placeholder="Enter Email Id"
                                        required data-parsley-required-message="Email is required"
                                        data-parsley-type="email">
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="mobile" class="col-sm-2 col-form-label"> Mobile No </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword3" name="mob"
                                        value='<?php echo "$mob";?>' placeholder="Enter User Mobile No" required
                                        data-parsley-required-message="Mobile Number is required"
                                        data-parsley-type="number" data-parsley-maxlength="10">
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="addresss" class="col-sm-2 col-form-label"> Address </label>
                                <div class="col-sm-10">
                                    <input id="add" type="text" class="form-control" name="address"
                                        placeholder="Enter User Address" value='<?php echo "$add";?>' required
                                        data-parsley-required-message="Address is required">
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary"> Update User Details </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
    </div>
    </div>
    </section>

    <!-- Required common Js -->
    <script src='jquery-2.2.3.min.js'></script>
    <!-- //Required common Js -->

    <!-- Sidebar-nav Js -->
    <script>
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
    </script>
    <!--// Sidebar-nav Js -->

    <!-- Validation Script -->
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';

        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    </script>
    <!--// Validation Script -->

    <!-- dropdown nav -->
    <script>
    $(document).ready(function() {
        $(".dropdown").hover(
            function() {
                $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                $(this).toggleClass('open');
            },
            function() {
                $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                $(this).toggleClass('open');
            }
        );
    });
    </script>
    </ /dropdown nav -->

    <!-- Js for bootstrap working-->
    <script src="bootstrap.min.js"></script>
    <!-- //Js for bootstrap working -->

</body>

</html>