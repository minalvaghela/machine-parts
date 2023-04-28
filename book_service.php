<?php
session_start();
$msg="";
?>
<?php
require 'db_connect.php';
// echo "<script>alert('enter')</script>";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $id = $_POST['sid'];
    $userid=$_SESSION['user_name'];
    //$_SESSION['uname'];
    $sql = "INSERT INTO `serviceorder`(`service_id`,`user_id`) VALUES ('$id','$userid')";
    $res = mysqli_query($conn,$sql);
    if ($sql) {
        $msg = '<div class="alert alert-success" role="alert">
                     Your Service Boooked!!!
                </div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Surya engineering</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<header>
    <?php
    include "nav.php";
    ?>
</header>
<?php
            include "adminside.php";
            echo $msg;
            ?>

<body>

    
    <div class="wrapper">
        <div id="content">
            <section class="tables-section">
                <div class="outer-w3-agile mt-3">
                    <br>
                    <br>
                    <h2 class="tittle-w3-agileits mt-4 mb-3 text-center fs-1" style="color:#1F45FC">Product Service
                    </h2>
                    <br>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col"> Product Category Name </th>
                                <th scope="col"> Price </th>
                                <th colspan="2" class="text-center"> Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                $q = mysqli_query($conn, "SELECT * from services") or die(mysqli_error($conn));
                                $count = mysqli_num_rows($q);
                                
                               while ($userrow = mysqli_fetch_array($q))
                                {
                                    
                                    echo "
                                    <form action='book_service.php' method='POST'>
                                    <tr>";      
                                    echo "<td>{$userrow['name']}</td>";
                                    echo "<td>{$userrow['price']}</td>";
                                    echo "<td><input type='hidden' name='sid' value='".$userrow['services_id']."'>";
                                    echo "<td class='text-center'><button class='btn btn-primary' type='submit'>Book</button></td>";
                                    echo "</tr>
                                    </form>";
                                 }       
                                ?>
                        </tbody>
                    </table>
                </div>
            </section>

        </div>
    </div>
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
    <!-- //dropdown nav -->

    <!-- Js for bootstrap working-->
    <script src="bootstrap.min.js"></script>
    <!-- //Js for bootstrap working -->

</body>

</html>