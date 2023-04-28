<?php
session_start();
?>

<?php 
$pid=$_GET['proid'];

include "parsley.php";
require 'db_connect.php';
$msg = "";

    if(isset($_POST['submit'])){
    $dis=$_POST['dis'];
    $pro=$_POST['proid'];
    $q=mysqli_query($conn,"INSERT INTO `feedback`(`discription`,`product_product_id`,`user_id`) values ('$dis','$pro','$_SESSION[user_name]')");
    
    if ($q) 
    {
       $msg = '<div class="alert alert-success mt-5" role="alert">
                     Your feedback submitted successfully!!!
                </div>';
               
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Feedback</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script type="text/javascript">
    window.onload = function() { //from ww  w . j  a  va2s. c  o  m
        var today = new Date().toISOString().split('T')[0];
        document.getElementsByName("setTodaysDate")[0].setAttribute('min', today);
    }
    </script>
</head>

<body>
    <nav class="navbar navbar-light bg-primary fixed-top" style="height:7%">
    </nav>
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
                            <br>
                            <h2 class="tittle-w3-agileits mt-4 mb-3 text-center fs-1" style="color:#1F45FC">Feedback
                                Information
                            </h2>
                            <br>
                            <form method="POST" enctype="multipart/form-data" data-parsley-validate=""
                                data-parsley-priority-enable=true data-parsley-required="This value is required">

                                <br>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" style="margin-left:60px;">Discription:</label>
                                    
                                    <div class="col-sm-10">
                                        <textarea class="form-control"  style="margin-left:60px;" id="name" name="dis"
                                            placeholder="Enter your feedback" required autocomplete="off"
                                            data-parsley-trigger="keyup"
                                            data-parsley-required-message="Discription is required"></textarea>
                                    </div>
                                </div>
                                <input type="hidden" value="<?php echo $pid;?>" name="proid">
                                <br>
                                <br>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button  style="margin-left:60px;" type="submit" name="submit" class="btn btn-primary"> Post
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
    <script src='jquery-2.2.3.min.js'></script>
    <script src="bootstrap.min.js"></script>
</body>

</html>