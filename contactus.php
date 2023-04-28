<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="contact.css" rel="stylesheet">
    <style>
    .mydiv {
        background-color: antiquewhite;
        text-align: center;
        width: 500px;
    }
    </style>
</head>

<body>
    <!--Section: Contact v.2-->
    <section class="mb-4">

        <!--Section heading-->
        <h1 class="h1-responsive font-weight-bold text-center my-4">
            <font color="Red" size="8">Contact us
            </font>
        </h1>
        <br>
        <!--Section description-->
        <p class="text-center w-responsive mx-auto mb-5">
            <font color="white" size="6">
                Do you have any questions? Please do not hesitate to contact us
                directly. Our team will come back to you within
                a matter of hours to help you.
            </font>
        </p>
        <br>
        <div class="mydiv">
            <table width="500px" height="30px">
                <tr>
                    <td>
                        <div class="row">
                            <!--Grid column-->
                            <div class="col-md-9 mb-md-0 mb-5">
                                <form id="contact-form" name="contact-form" action="mail.php" method="POST">
                                    <!--Grid row-->
                                    <div class="row">
                                        <!--Grid column-->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <label for="name" class="">
                                                    <br>
                                                    <b>
                                                        <font size="4">Your Name:
                                                        </font>
                                                    </b>
                                                </label>
                    </td>
                    <td>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="your name">
                    </td>
        </div>
        </div>
        </tr>
        <tr>
            <!--Grid column-->
            <td>
                <!--Grid column-->
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <label for="email" class="">
                            <br>
                            <b>
                                <font size="4">Your email:</font>
                            </b>
                        </label>
            </td>
            <td>
                <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="name@example.com">
            </td>
            </div>
            </div>
        </tr>
        <!--Grid column-->
        </div>
        <!--Grid row-->
        <tr>
            <td>
                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <label for="subject" class="">
                                <br>
                                <b>
                                    <font size="4">Subject:</font>
                                </b>
                            </label>
            </td>
            <td>
                <input type="text" class="form-control" id="exampleFormControlInput3" placeholder="subject">
            </td>
            </div>
            </div>
            </div>
        </tr>
        <!--Grid row-->
        <tr>
            <td>
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->


                    <div class="col-md-12">
                        <div class="md-form">
                            <label for="message">
                                <br>
                                <b>
                                    <font size="4">Your message:</font>
                                </b>
                            </label>
            </td>
            <td>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </td>
            </div>
            </div>
            </div>
        </tr>
        <!--Grid row-->

        </form>
        </table>
        <div class="text-center text-md-left">
            <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">
                <h3>
                    <font>Send</font>
                </h3>
            </a>
        </div>
        <div class="status"></div>
        </div>
        <!--Grid column-->
        <!--Grid column-->
        <div class="col-md-3 text-center">

            <ul class="list-unstyled mb-0">
                <li>
                    <p>
                        <font color="white" size="5">Surya Engineering Manufacture of Auto Stop Winding Machine</font>
                    </p>
                </li>

                <li>
                    <p>
                        <font color="white" size="5">9825013146</font>
                    </p>
                </li>

                <li>
                    <p>
                        <font color="white" size="5">suryaeleinfo@gmail.com</font>
                    </p>
                </li>
            </ul>
        </div>
        <!--Grid column-->

        </div>

    </section>
    <!--Section: Contact v.2-->
    </div>

</body>

</html>