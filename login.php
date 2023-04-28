<?php include "parsley.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- font awesome  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>
<script>
function password_show_hide() {
    var x = document.getElementById("pass");
    var show_eye = document.getElementById("show_eye");
    var hide_eye = document.getElementById("hide_eye");
    hide_eye.classList.remove("d-none");
    if (x.type === "password") {
        x.type = "text";
        show_eye.style.display = "none";
        hide_eye.style.display = "block";
    } else {
        x.type = "password";
        show_eye.style.display = "block";
        hide_eye.style.display = "none";

    }
}
function get_pass()
{
    var a=document.getElementById("name").value;
    var y=document.getElementById("pass").value;
     var n=new XMLHttpRequest();
     n.onreadystatechange=function()
     {
        if(this.status==200 && this.readyState==4)
        {
            // alert(n.responseText);
            if(n.responseText == "1")
            {
                window.location.href="home.php";
            }
            else if(n.responseText == "2")
            {
                // alert("enter if");
                window.location.href="view_services.php";
                // Window.location.href="homeadmin.php";
            }
            else if(n.responseText == "3")
            {
                window.location.href="Admin Dashboard";
            }
            else
            {
            document.getElementById("ErrorUser").innerHTML = n.responseText;
            }
        }
     }
     n.open("POST","login_handle.php",true);
     n.setRequestHeader("content-type","application/x-www-form-urlencoded");
     n.send("username="+a+"&pass="+y);
    }
</script>

<body>
    <?php
 /* include "forgotpass.php";
  include "changepass.php";*/
  ?>
    <?
  if(isset($_POST['chpass']))
  {
    $hide=1;
  }
  ?>
    <script>
    function closeModal() {
        $("#loginModal").modal().hide();
    }
    </script>
    <?php include "changepass.php";
            include "forgotpass.php";?>
    <?php if(!isset($hide)){
        ?>
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="loginpModalLabel">Login</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form data-parsley-validate="" data-parsley-priority-enable=true
                        method="post">
                        <!-- <div class="form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Enter email or username" id="name"
                                    name="lu_name" required autocomplete="off" data-parsley-trigger="keyup"
                                    data-parsley-required-message="Username is required">
                            </div>
                        </div> -->
                        <div class="form-group">
                            <div class="input-group-prepend">
                                <!-- <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span> -->
                                <label for="name">Username:</label>
                            </div>
                            <input name="lu_name" id="name" type="text" value="" class="input form-control"
                                placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required
                                autocomplete="off" data-parsley-trigger="keyup"
                                data-parsley-required-message="Username is required" />
                        </div>
                        <div class="form-group">
                            <div class="input-group-prepend">
                                <!-- <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span> -->
                                <label for="pwd">Password:</label>
                            </div>
                            <input type="password" value="" class="input form-control" placeholder="password"
                                required="true" aria-label="password" aria-describedby="basic-addon1" id="pass"
                                name="lpwd" required data-parsley-trigger="keyup"
                                data-parsley-required-message="Password is required"/>
                            <div class="form-group">
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="password_show_hide();">
                                        <i class="fas fa-eye" id="show_eye"></i>
                                        <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                    </span>
                                </div>
                            </div>
                            <p id="ErrorUser" style="color:red"></p>
                        </div>
                        <div class="col-12">
                            <div class="form-group form-check text-left">
                                <input type="checkbox" name="remember" class="form-check-input" id="remember_me" />
                                <label class="form-check-label" for="remember_me">Remember me</label>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" placeholder="Enter password" id="pass"
                                name="lpwd" required data-parsley-trigger="keyup"
                                data-parsley-required-message="Password is required"
                                data-parsley-pattern="[A-Za-z0-9@]+"
                                data-parsley-pattern-message="Password must be strong">
                        </div>
                        <div class="form-group form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox"> Remember me
                            </label>
                        </div>-->
                        <div class="col-12">
                            <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                data-bs-target="#forgotpsModal" name="fpass" id="fpass" href="forgotpass.php"
                                onclick="closeModal()" style="width:47%; height:10%">
                                forgot password
                            </button>
                            <button type="button" class="btn btn-light" data-bs-toggle="modal" name="chpass" id="chpass"
                                data-bs-target="#changepsModal" href="changepass.php" onclick="closeModal()"
                                style="width:47%; height:10%">
                                Change password
                            </button>
                        </div>
                        <br>
                        <div class="col-12">
                            <input type="button" value="Login" onclick="get_pass()" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
</body>
</html>