<?php
  require 'db_connect.php';
  session_start();
    $id=$_GET['proid'];
    echo "$id";
    $msg='';
   if(isset($_POST['btn']))
   {
    $rat=$_POST['rating'];
    echo $rat;
    $pro=$_POST['id'];
    $sql=mysqli_query($conn,"insert into rating (user_id,product_id,ratting)values('$_SESSION[user_name]','$pro','$rat')");
   if($sql)
   {
    
    $msg = '<div class="alert alert-success mt-4" role="alert">
    Your Rating Added Successfully!!! 
</div>';
   }
}
  
  ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete your order</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style type="text/css">
    .checked {
        color: orange;
    }
    </style>
</head>

<body>
    <?php
include "adminside.php";
?>
       <?php
       echo $msg;
       ?>
    <nav class="navbar navbar-light bg-primary fixed-top" style="height:7%">
    </nav>
    <br>
    <div class="container">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5">
                <br>
                <h2 class="text-center p-2 text-primary fs-1">Fill the details to complete your order</h2>
                <br>
                <h2 class="text-info">Rating Details: </h2>
                <br>
            
                <form  method="POST" accept-charset="utf-8">
                <input type="hidden" value="<?php echo $id;?>" name="id">
                <br>
                <br>
                    <div class="rateyo" id="rating" data-rateyo-rsting="4"
                    data-ratyo-num-star="5" data-ratyo-score="3"></div>
                   
                    <span class='result'>0</span><br>
                    <input type="hidden" name="rating" id="rat"> 
                   <br>
                    <input type="submit" name="btn" value="submit" class="btn btn-primary btn-lg">
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css"></script>
    <script>
        $(function () {
            $(".rateyo").rateYo().on("rateyo.change",function(e,data)
            {
                var rating=data.rating;
                $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
                $(this).parent().find('.result').text('rating :'+ rating);
                document.getElementById("rat").value = rating;
            });
        });
 </script> 
</body>

</html>
<?php
/*require 'db_connect.php';
if(isset($_POST['btn'])){
    
    $rate=$_POST['rating'];
    $q3=mysqli_query($conn,"INSERT INTO `rating` (`user_id`, `product_id`, `ratting`) VALUES ('$_SESSION[user_name]', '$id', '$rate');");
}*/
?>
