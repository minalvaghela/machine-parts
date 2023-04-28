<?php include "parsley.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script>
    function validateSignup() {
        var validSignup = true;
        var signuser = document.getElementById("user").value;
        var signpass = document.getElementById("pwd").value;
        var signcname = document.getElementById("cname").value;
        var signmob = document.getElementById("mob").value;
        var signemail = document.getElementById("emails").value;
        var signadd = document.getElementById("addressf").value;
        var signzip = document.getElementById("zipcodef").value;
        var bt1 = document.getElementById("male");
        var bt2 = document.getElementById("female");
        if (signuser == "" || signcname == "" || signmob == "" || signemail ==
            "" || signadd == "" || signzip == "" || !(bt1.checked) || !bt2.checked() || signpass == "") {
            if (signuser == "") {
                document.getElementById("username").innerHTML = "username field can't be blank";
                validSignup = false;
            }
            if (signcname == "") {
                document.getElementById("customername").innerHTML = "customer name field can't be blank";
                validSignup = false;
            }
            if (signpass == "") {
                document.getElementById("passwordsign").innerHTML = "password field can't be blank";
            }
            if (signmob == "") {
                document.getElementById("mobileno").innerHTML = "mobile field can't be blank";
                validSignup = false;
            }
            if (signemail == "") {
                document.getElementById("emailids").innerHTML = "email field can't be blank";
                validSignup = false;
            }
            if (signadd == "") {
                document.getElementById("addressr").innerHTML = "address field can't be blank";
                validSignup = false;
            }
            if (signzip == "") {
                document.getElementById("zipcoder").innerHTML = "zip code field can't be blank";
                validSignup = false;
            }
            if (!(bt1.checked) && !(bt2.checked)) {
                document.getElementById("gender").innerHTML = "Please select at least one option";
                validSignup = false;
            }
        }
        return validSignup;
    }

    function remradioBtner() {
        var bt1 = document.getElementById("male");
        var bt2 = document.getElementById("female");
        if (bt1.checked == true || bt2.checked == true) {
            document.getElementById("gender").innerHTML = "";
        }
    }

    function matchePass() {
        var signpass = document.getElementById("pwd").value;
        var signcpass = document.getElementById("cpass").value;
        if (signpass == "") {
            document.getElementById("passwordsign").innerHTML = "password field can't be blank";
        } else {
            if (signpass != signcpass) {
                document.getElementById("cpassword").innerHTML = "Must be same";
            } else {
                document.getElementById("cpassword").innerHTML = "";
            }
        }
    }

    function showpass() {
        var btnchk = document.getElementById("showpassword");
        if (btnchk.checked == true) {
            document.getElementById("pwd").setAttribute("type", "text");
            document.getElementById("cpass").setAttribute("type", "text");
        } else {
            document.getElementById("pwd").setAttribute("type", "password");
            document.getElementById("cpass").setAttribute("type", "password");
        }
    }

    function phonenumber(inputtxt) {
        alert("Enter");
        var phoneno = /^\d{10}$/;
        if (document.getElementById("mob").matches()) {
            return true;
        } else {
            alert("Not a valid Phone Number");
            return false;
        }
    }
    </script> -->
    <!-- <script>
    // function getCity() {
    //     var cityID = document.getElementById("stateid").value;
    //     alert(cityID);
    //     if (cityID) {
    //         $.ajax({
    //             url: "getarea.php",
    //             dataType: 'Json',
    //             data: {
    //                 'id': cityID,
    //             },
    //             success: function(data) {
    //                 $("#cityid").html(html);
    //                 $.each(data, function(key, value) {
    //                     $("#cityid").append('<option value="' +
    //                         key + '">' +
    //                         value + '</option>');
    //                 });
    //             }
    //         });
    //     } else {
    //         $('select[name="city"]').empty();
    //     }
    // }
    </script>-->
</head>

<body>
    <!--Modal-->
    <script>
    function CheckUser() {
        var name = document.getElementById("user").value;
        var x = new XMLHttpRequest();
        x.onreadystatechange = function() {
            if (this.status == 200 && this.readyState == 4) {
                document.getElementById("ErrorUser").innerHTML = x.responseText;
            }
        }
        x.open("GET", "checkUser.php?id=" + name, true);
        x.send();

    }
    </script>
    <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="signupModalLabel">Signup</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="signup_handle.php" data-parsley-validate="" data-parsley-priority-enable=true
                        data-parsley-required="" method="post">
                        <div class="form-group">
                            <label>User Name:</label>
                            <input type="text" name="uname" id="user" class="form-control" placeholder="Enter username"
                                required autocomplete="off" data-parsley-trigger="keyup"
                                data-parsley-required-message="Username is required" onfocusout="CheckUser()">
                        </div>
                        <p id="ErrorUser" style="color:red"></p>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" id="pas" name="pass" class="form-control"
                                placeholder="Enter password" required
                                data-parsley-required-message="Password is required"
                                data-parsley-pattern="[A-Za-z0-9@]+"
                                data-parsley-pattern-message="Password must be strong">

                        </div>
                        <div class="form-group">
                            <label>Confirm Password:</label>
                            <input type="password" id="cpassID" name="cpwd" class="form-control"
                                placeholder="confirm password" required
                                data-parsley-required-message="Confirm Password is required" data-parsley-equalto="#pas"
                                data-parsley-trigger="keyup">

                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="checkPass" onclick="show_pass()">
                            <label class="form-check-label" for="exampleCheck1">Show Password</label>
                        </div>
                        <script>
                        function show_pass() {
                            var pass = document.getElementById("pas");
                            var pass1 = document.getElementById("cpassID");
                            var ch = document.getElementById("checkPass");
                            if (ch.checked == true) {
                                pass.setAttribute("type", "text");
                                pass1.setAttribute("type", "text");
                            } else {
                                pass.setAttribute("type", "password");
                                pass1.setAttribute("type", "password");
                            }
                        }
                        </script>
                        <!-- <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="showpassword">
                            <label class="form-check-label" for="flexCheckDefault">
                                Show Password
                            </label>
                        </div> -->
                        <div class="form-group">
                            <label>Mob:</label>
                            <input type="text" id="mob" name="mob" class="form-control" placeholder="Enter mobile no"
                                required data-parsley-required-message="Mobile Number is required"
                                data-parsley-type="number" data-parsley-maxlength="10">

                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="text" id="emails" name="email" class="form-control" placeholder="Enter email"
                                required data-parsley-required-message="Email is required" data-parsley-type="email">

                        </div>
                        <div class="form-group">
                            <label>Address:</label>
                            <input type="text" id="addressf" name="address" class="form-control"
                                placeholder="Enter Address" required
                                data-parsley-required-message="Address is required">

                        </div>
                        <!-- <div class="custom-control custom-radio">
                            <label>Gender:</label>
                            <br>
                            <input type="radio" name="gender1" id="male" class="custom-control-input" value="M" >
                            <label class="custom-control-label" for="customRadio">Male</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="gender1" id="female" class="custom-control-input" value="F">
                            <label class="custom-control-label" for="customRadio">Female</label>
                        </div> -->
                        <label>Gender:</label>
                        <div class="form-check">

                            <input class="radio" type="radio" name="gender1" id="flexRadioDefault1">
                            <label class="form-check-label" for="customRadio"> Female </label> <br>
                            <input class="radio" type="radio" name="gender1" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="customRadio"> Male </label>
                        </div>


                        <!-- <label for="title">Select State:</label>
                        <select name="state" class="form-control" onchange="getCity()" id="stateid">
                            <option value="">SELECT</option>

                            <?php
                                          require('db_connect.php');
                                          $sql = "SELECT * FROM state"; 
                                          $result = mysqli_query($conn,$sql);
                                          while($row = mysqli_fetch_assoc($result)){
                                             echo "<option value='".$row['state_id']."'>".$row['state_name']."</option>";
                                          }
                                    ?>
                        </select>

                        <div class="form-group">
                            <label for="title">Select City</label>
                            <select name="city" class="form-control" id="cityid">
                                <option value="">SELECT</option>
                        </div> -->
                        <br>
                        <input type="submit" name="submit" value="submit" class="btn btn-primary">
                        <!-- <input name="submit" value="submit" type="submit" class="btn btn-primary btn-block submit-btn"> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>