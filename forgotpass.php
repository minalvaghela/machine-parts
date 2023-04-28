<?php //include 'login.php'?>
<script>
function Send_OTP() {
    var email = document.getElementById("email").value;
    if (email.trim() == "") {
        document.getElementById("ErEmail").innerHTML = "Please enter email id";
    } else {
        var obj = new XMLHttpRequest();
        obj.onreadystatechange = function() {
            if (obj.status == 200 && obj.readyState == 4) {
                alert(obj.responseText);
            }
        }
        obj.open("POST", "mail.php", true);
        obj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        obj.send("email=" + email);
    }
}

function Check_OTP() {
    var otp = document.getElementById("otp").value;
    if (otp.trim() == "") {
        document.getElementById("ErOTP").innerHTML = "Please enter OTP";
    } else {
        var obj = new XMLHttpRequest();
        obj.onreadystatechange = function() {
            if (obj.status == 200 && obj.readyState == 4) {
                if (obj.responseText == '1') {
                    $('#resetPass').modal('show');
                    $('#forgotpsModal').modal('hide');
                } else {
                    alert("Please Enter Valid OTP");
                }
            }
        }
        obj.open("POST", "forgot_pass_handle.php", true);
        obj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        obj.send("otp=" + otp);
    }
}

function Update_Pass() {
    var email = document.getElementById("email").value;
    
    var pass1 = document.getElementById('npass').value;
    var pass2 = document.getElementById('cpass').value;
    if (pass1.trim() == "" || pass2.trim() == "") {
        if (pass1.trim() == "")
            document.getElementById("ErPass1").innerHTML = "Please Enter Your New Password";
        if (pass2.trim() == "")
            document.getElementById("ErPass2").innerHTML = "Please Enter Confirm Password";

    } else {
        if (pass1 != pass2) {
            alert("Password & Confirm Password Do Not Match");
        } else {
            var obj = new XMLHttpRequest();
            obj.onreadystatechange = function() {
                if (obj.status == 200 && obj.readyState == 4) {
                    if (obj.responseText == '1') {
                        alert("Password Change Successfully");
                        $('#resetPass').modal('hide');
                        window.location.href = "home.php";
                    } else {
                        alert("Password NOT Change Successfully");
                    }
                }
            }
            obj.open("POST", "change_pass.php", true);
            obj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            obj.send("pass1=" + pass1 + "&pass2=" + pass2 + "&email=" + email);
        }
    }
}

function rem_Err(id) {
    document.getElementById(id).innerHTML = "";
}
</script>

<!-- Modal -->


<div class="modal fade" id="forgotpsModal" tabindex="-1" aria-labelledby="forgotpsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="forgotpsModalLabel">Forgot Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="mb-4">
                            <h5>Forgot Password?</h5>
                            <p class="mb-2">Enter your registered email ID to reset the password
                            </p>
                        </div>
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" name="email"
                                    placeholder="Enter Your Email" required="" autocomplete="off"
                                    onkeyup="rem_Err('ErEmail')">
                            </div>
                            <span id="ErEmail" style="color:red;font-size:16px;"></span>
                            <div class="mb-3 d-grid">
                                <button type="Button" class="btn btn-primary" onclick="Send_OTP()">
                                    Get OTP
                                </button>
                            </div>
                            <div class="mb-3">
                                <label for="otp" class="form-label">OTP</label>
                                <input type="text" id="otp" class="form-control" name="otpcust" placeholder="Enter OTP"
                                    required="" autocomplete="off" onkeyup="rem_Err('ErOTP')">
                            </div>
                            <span id="ErOTP" style="color:red;font-size:16px;"></span>
                            <div class="mb-3 d-grid">
                                <button type="button" class="btn btn-primary" onclick="Check_OTP()">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="resetPass" tabindex="-1" aria-labelledby="forgotpsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="forgotpsModalLabel">Reset Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="npass" class="form-label">New Password</label>
                                <input type="text" id="npass" class="form-control" name="pass1"
                                    placeholder="Enter New Password" required=""
                                    onkeyup="rem_Err('ErPass1')">
                            </div>
                            <span id="ErPass1" style="color:red;font-size:16px;"></span>

                            <div class="mb-3">
                                <label for="cpass" class="form-label">Confirm Password</label>
                                <input type="password" id="cpass" class="form-control" name="pass2"
                                    placeholder="Enter Confirm Password" required=""
                                    onkeyup="rem_Err('ErPass2')">
                            </div>
                            <span id="ErPass2" style="color:red;font-size:16px;"></span>

                            <div class="mb-3 d-grid">
                                <button type="button" class="btn btn-primary" onclick="Update_Pass()">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>