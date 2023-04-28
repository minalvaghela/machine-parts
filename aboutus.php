<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <!---<link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">-->


    <title>About Us</title>
    <style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@200;300;400&display=swap');

    * {
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
        font-family: 'Poppnis', sans-serif;
    }

    .section {
        width: 100%;

    }

    .section .container {
        width: 80%;
        display: block;
        margin: 0px auto;
        padding: 50px 0px;
    }

    .container .title {
        width: 100%;
        text-align: center;
        margin-bottom: 50px;
    }

    .container .title h1 {
        text-transform: uppercase;
        font-size: 40px;
        color: #88941e;
        font-family: Times;
    }

    .container .title h1::after {
        content: "";
        height: 5px;
        width: 100px;
        background-color: #88941e;
        display: block;
        margin: auto;
    }

    .content {
        float: left;
        width: 55%;
    }

    .image-section {
        float: right;
        width: 40%;
    }

    .image-section img {
        width: 100%;
        height: auto;
    }

    .content .article h3 {
        color: #a56;
        font-size: 17px;
    }

    .content .article p {
        margin-top: 20px;
        font-size: 20px;
        line-height: 1.5;
        color: #aaa;
    }

    .content .article .button {
        margin-top: 50px;
    }

    .content .article .button a {
        text-decoration: none;
        padding: 8px 25px;
        background-color: #88941e;
        border-radius: 40px;
        font-size: 18px;
        letter-spacing: 1.5px;
    }

    .content .article .button a:hover {
        color: #fff;
        background-color: #f28f92;
        transition: 1s ease;
    }

    .container .social {
        width: 100%;
        clear: both;
        margin-top: 50px;
        text-align: center;
        display: inline-block;
    }

    .container .social i {
        color: #fff;
        font-size: 22px;
        height: 45px;
        width: 45px;
        border-radius: 50%;
        line-height: 45px;
        text-align: center;
        background-color: #f28f92;
        margin: 0px 5px;
    }

    .container .social i:hover {
        color: #fff;
        background-color: #88941e;
        transition: 1s ease;
        transform: rotate(360deg);
    }

    @media(max-width:768px) {
        .section .container {
            width: 80%;
            display: block;
            margin: auto;
        }

        .content {
            float: none;
            width: 100%;
            display: block;
            margin: auto;
        }

        .image-section {
            float: none;
            width: 100%;
            margin-top: 50px;
        }

        .image-section img {
            width: 100%;
            height: auto;
            display: block;
            margin: auto;
        }

        .container .title h1 {
            text-align: center;
            font-size: 30px;
        }

        .container .article .button {
            text-align: center;
        }

        .container .article .button a {
            padding: 6px 15px;
            font-size: 16px;
        }

        .container .social i {
            font-size: 10px;
            height: 35px;
            width: 35px;
            line-height: 35px;
        }
    }
    </style>

</head>

<body>
    <header>
        <?php include "nav.php"?>
    </header>
    <div class="section">
        <div class="container">
            <div class="title">
                <h1>About Us</h1>
            </div>
            <div class="content">
                <div class="article">
                    <h3>Surya Engineering an ISO 9001:2008 certified company started with dynamic efforts of its
                        Proprietor Mr.Utkarsh Pathak an electronics engineer and an entrepreneur with rich industrial
                        experience of more than 15 years. </h3>
                    <p>The company geared up its horizons in manufacturing of
                        Laboratory Testing Equipments for Plastics in particular, and other industries like Film, Rubber
                        and Wooden (Plywood) across the globe. Surya Engineering has always taken pride in offering high
                        quality products at affordable prices and has been constantly working to meet the individual
                        requirements of its customers in order to provide best testing solutions with vast experience in
                        design, development and marketing. Surya Engineering has earned its reputation as a trusted
                        supplier of precise, reliable and affordable products. We remain firmly focused on continuing
                        the long-standing record of success and on expanding our global presence with new products, new
                        solutions and new relationships worldwide.</p>
                    <div class="button">
                        <a href="">Read More</a>
                    </div>
                </div>
            </div>
            <div class="image-section">
                <img src="image/product1.jpg" alt="">
            </div>
            <div class="social">
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</body>

</html>