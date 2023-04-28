<?php
session_start();
require 'db_connect.php';
?>
<!DOCTYPE html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: "Poppins", sans-serif;
        height: 100vh;
        width: 70%;
        margin: 0px auto;
        padding: 50px 0px 0px;
        color: #4E5150;
    }

    header {

        height: 5%;
        margin-bottom: 30px;
    }

    h3 {
        font-size: 25px;
        color: #4E5150;
        font-weight: 500;
    }



    main {
        height: 85%;
        display: flex;
        column-gap: 100px;
    }

    .checkout-form {
        width: 50%;
    }



    h6 {
        font-size: 12px;
        font-weight: 500;
    }

    .form-control {
        margin: 10px 0px;
        position: relative;
    }

    label:not([for="checkout-checkbox"]) {
        display: block;
        font-size: 10px;
        font-weight: 500;
        margin-bottom: 2px;
    }

    input:not([type="checkbox"]) {
        width: 100%;
        padding: 10px 10px 10px 40px;
        border-radius: 10px;
        outline: none;
        border: .2px solid #4e515085;
        font-size: 12px;
        font-weight: 700;
    }

    ::placeholder {
        font-size: 10px;
        font-weight: 500;
    }


    label[for="checkout-checkbox"] {
        font-size: 9px;
        font-weight: 500;
        line-height: 10px;
    }

    div {
        position: relative;
    }

    span.fa {
        position: absolute;
        top: 50%;
        left: 0%;
        transform: translate(15px, -50%);
    }


    .form-group {
        display: flex;
        column-gap: 25px;
    }

    .checkbox-control {
        display: flex;
        align-items: center;
        column-gap: 10px;
    }

    .form-control-btn {
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }

    button {
        padding: 10px 25px;
        font-size: 10px;
        color: #fff;
        background: #F2994A;
        border: 0;
        border-radius: 7px;
        letter-spacing: .5px;
        font-weight: 200;
        cursor: pointer;
    }




    .checkout-details {
        width: 40%;
    }

    .checkout-details-inner {
        background: #F2F2F2;
        border-radius: 10px;
        padding: 20px;

    }

    .checkout-lists {
        display: flex;
        flex-direction: column;
        row-gap: 15px;
        margin-bottom: 40px;
    }

    .card {
        width: 100%;
        display: flex;
        column-gap: 15px;
    }

    .card-image {
        width: 35%;
    }

    img {
        width: 100%;
        object-fit: fill;
        border-radius: 10px;
    }


    .card-details {
        display: flex;
        flex-direction: column;
    }

    .card-name {
        font-size: 12px;
        font-weight: 500;
    }

    .card-price {
        font-size: 10px;
        font-weight: 500;
        color: #F2994A;
        margin-top: 5px;
    }

    span {
        color: #4E5150;
        text-decoration: line-through;
        margin-left: 10px;
    }

    .card-wheel {
        margin-top: 17px;
        border: .2px solid #4e515085;
        width: 90px;
        padding: 8px 8px;
        border-radius: 10px;
        font-size: 12px;
        display: flex;
        justify-content: space-between;
    }

    button {
        background: #E0E0E0;
        color: #828282;
        width: 15px;
        height: 15px;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 0;
        cursor: pointer;
        border-radius: 3px;
        font-weight: 500;
    }


    .checkout-shipping,
    .checkout-total {
        display: flex;
        font-size: 16px;
        padding: 5px 0px;
        border-top: 1px solid #BDBDBD;
        justify-content: space-between;
    }

    p {
        font-size: 10px;
        font-weight: 500;
    }


    footer {

        height: 5%;
        color: #BDBDBD;
        display: -ms-grid;
        display: grid;
        place-items: center;
        font-size: 12px;
    }

    a {
        text-decoration: none;
        color: inherit;
    }



    @media screen and (max-width: 1024px) {
        body {
            width: 80%;
        }

        main {
            column-gap: 70px;
        }
    }


    @media screen and (max-width: 768px) {
        body {
            width: 92%;
        }

        main {
            flex-direction: column-reverse;
            height: auto;
            margin-bottom: 50px;
        }

        .checkout-form {
            width: 100%;
            margin-top: 35px;
        }

        .checkout-details {
            width: 100%;
        }


        footer {
            height: 10%;
        }
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info ms-auto px-4 fixed-top">
        <div class="container-fluid">
            <!-- <b class="fs-2">Surya <span class="text-success fs-2">Electricals</span></b>-->
            <button class=" navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-4 text-center">

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="customerside.php"><i class="fa fa-home"
                                aria-hidden="true"> Home</i></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="aboutus.php"><i class="fa fa-info"> About
                                Us</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="showproduct.php"><i
                                class="fa fa-product-hunt"> Products</i></a>
                    </li>


                </ul>
                <a href="logout.php"><button type="button" class="btn btn-outline-primary">
                        <i class="fa fa-sign-in">Log Out</i></button></a>&nbsp;&nbsp;


            </div>
    </nav>
    <br>
    <br>
    <header>
        <h3>Checkout</h3>
    </header>
    <main>

        <section class="checkout-form">
            <form action="#!" method="get">
                <?php
                $user = $_SESSION['user_name'];
                $sql2=mysqli_fetch_assoc(mysqli_query($conn,"select * from user_details where user_id='$user'"));
                
                ?>
                <h6>Contact information</h6>
                <div class="form-control">
                    <label for="checkout-email">E-mail</label>
                    <div>
                        <span class="fa fa-envelope"></span>
                        <input type="email" id="checkout-email" name="checkout-email" placeholder="Enter your email..." value="<?php echo $sql2['email_id']?>">
                    </div>
                </div>
                <div class="form-control">
                    <label for="checkout-phone">Phone</label>
                    <div>
                        <span class="fa fa-phone"></span>
                        <input type="tel" name="checkout-phone" id="checkout-phone" placeholder="Enter you phone..." value="<?php echo $sql2['mob']?>">
                    </div>
                </div>
                <br>
               
                <div class="form-control">
                    <label for="checkout-name">User Id</label>
                    <div>
                        <span class="fa fa-user-circle"></span>
                        <input type="text" id="checkout-name" name="checkout-name" placeholder="Enter you name..." value="<?php echo $sql2['user_id']?>">
                    </div>
                </div>
                <div class="form-control">
                    <label for="checkout-address">Address</label>
                    <div>
                        <span class="fa fa-home"></span>
                        <input type="text" name="checkout-address" id="checkout-address" placeholder="Your address..." value="<?php echo $sql2['address']?>">
                    </div>
                </div>

            </form>
            <div class="form-control-btn">
                <a href="addorder.php"><input type="submit" name="buy" value="COD"></a>

        </section>


        <section class="checkout-details">
            <div class="checkout-details-inner">
                <?php
                 
                 $sql = "select * from cart where user_id = '$_SESSION[user_name]'";
                 $result = mysqli_query($conn, $sql);

                 $total = 0;
                 $i = 1;
                 if (mysqli_num_rows($result) > 0) {
                     while ($cart = mysqli_fetch_array($result)) {
                         $proid = $cart['product_id'];
                         $qty=$cart['qty'];
                         $sql1 = "select * from product where product_id = '$proid'";
                         $res = mysqli_query($conn, $sql1);

                         if (mysqli_num_rows($res) > 0) {
                             while ($row = mysqli_fetch_assoc($res)) {
                                $name=$row['product_name'];
                                $amount = $row['price'] * $cart['qty'];
                                $total = $total + $amount;
                ?>
                <div class="checkout-lists">
                    <div class="card">
                        <div class="card-image"><img src="<?php echo $row['product_image'];?>" alt=""></div>
                        <div class="card-details">
                            <div class="card-name"><?php echo $row['product_name'];?></div>
                            <div class="card-price"><?php echo $row['price']?>*<?php echo $cart['qty']?></div>

                        </div>
                    </div>

                </div>


                <?php
                  }
                }
            }
        }
        ?>
                <form action='https://www.sandbox.paypal.com/cgi-bin/websrc' method='POST' accept-charset='utf-8'>
                    <input type='hidden' name='cmd' value='_xclick'>
                    <input type='hidden' name='business' value='sb-3lzb4722350876@business.example.com'>
                    <input type='hidden' name='item_name' value=<?php echo $_SESSION['user_name']?>>
                    <?php
                    if(isset($qty))
                    {
                    echo "<input type='hidden' name='iteam_number' value=<?php echo $qty?>";
                    }
                    ?>
                    <input type='hidden' name='amount' value=<?php echo $total?>>
                    <input type='hidden' name='lc' value='AU'>
                    <input type='hidden' name='rm' value='2'>
                    <input type="hidden" name="notify_url"
                        value="http://localhost:81/machince&parts/payment_suceess.php">
                    <input type="hidden" name="return" value="http://localhost:81/machince&parts/payment_suceess.php">
                    <input type='submit' value='Online Payment' class='btn btn-primary' style='margin:2px'>
                </form>

                <div class="checkout-total">
                    <h6>Total</h6>
                    <p><?php echo $total;?></p>
                </div>
            </div>
        </section>


    </main>

    <footer>

    </footer>