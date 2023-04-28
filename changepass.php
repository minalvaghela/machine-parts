<?php include "parsley.php"; ?>
<!-- Modal -->

<div class="modal fade" id="changepsModal" tabindex="-1" aria-labelledby="changepsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="changepsModalLabel">Change Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="changepass_handle.php" data-parsley-validate=""
                    data-parsley-priority-enable=true data-parsley-required="This value is required">
                    <div class="card login-form">
                        <div class="card-body">
                            <h3 class="card-title text-center">Change password</h3>
                            <!--Password must contain one lowercase letter, one number, and be at least 7 characters long.-->
                            <div class="card-text">
                                <form action=changepass_handle.php method="POST">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Your username</label>
                                        <input type="text" class="form-control form-control-sm" name="us_name" required
                                            autocomplete="off" data-parsley-trigger="keyup"
                                            data-parsley-required-message="Username is required">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Your old password</label>
                                        <input type="password" class="form-control form-control-sm" name="chpass"
                                            required data-parsley-required-message="Password is required"
                                            data-parsley-pattern="[A-Za-z0-9@]+"
                                            data-parsley-pattern-message="Password must be strong">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Your new password</label>
                                        <input type="password" class="form-control form-control-sm" id="pwd" name="newpass"
                                            required data-parsley-required-message="Password is required"
                                            data-parsley-pattern="[A-Za-z0-9@]+"
                                            data-parsley-pattern-message="Password must be strong">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Confirm password</label>
                                        <input type="password" class="form-control form-control-sm" name="confpass"
                                            required data-parsley-required-message="Password is required"
                                            data-parsley-pattern="[A-Za-z0-9@]+"
                                            data-parsley-pattern-message="Password must be strong"
                                            data-parsley-equalto="#pwd">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block submit-btn" name="confirm">
                                        Confirm</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>