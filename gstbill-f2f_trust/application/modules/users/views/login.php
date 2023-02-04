<?php $theme_path = $this->config->item('theme_locations') . 'esms'; ?>

<style>
    .error_msg {
        color: red;
        position: relative;
    }
    .success_msg {
        color: green;
        position: relative;
    }
    .login-logo{
        margin: 0 auto;
        display: block;}
    .clr-white{color:white !important;}
    .btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active, .show > .btn-primary.dropdown-toggle {
        color: #fff;
        background-color: #076dc1;
        border-color: #076dc1;
    }
    .btn-primary {
        color: #fff;
        background-color: #076dc1;
        border-color: #076dc1;
        color: #ffffff;
    }
    .btn.btn-primary.btn-elevate {
        -webkit-box-shadow: 0px 4px 16px 0px rgba(7, 109, 193, 0.22);
        box-shadow: 0px 4px 16px 0px rgba(7, 109, 193, 0.23);
    }
    .kt-login.kt-login--v3 .kt-login__wrapper .kt-login__container {
        width: 100%;
        margin: 0 auto;
        background-color: white;
        border-radius: 10px;
        padding: 33px;
    }
</style>
<div class="kt-grid kt-grid--ver kt-grid--root kt-page">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(<?php echo $theme_path; ?>/assets/media/bg/login_background.jpg);">
            <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                <div class="kt-login__container">
                    <div class="kt-login__logo">
                        <a href="#">
                            <img class="login-logo"
                                 alt="Logo" src="<?php echo base_url(); ?>themes/esms/assets/media/logos/iqra1.png" width="20%"/>
                        </a>
                    </div>
                    <div class="kt-login__signin">
                        <div class="kt-login__head">
                            <h3 class="kt-login__title">Sign In</h3>
                        </div>
                        <div class="row hide" id="success_alert">
                            <div class="col-xl-12">
                                <div class="alert alert-outline-success fade show" role="alert">
                                    <div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
                                    <div class="alert-text">Success</div>

                                </div>
                            </div>
                        </div>
                        <div class="row hide" id="failed_alert">
                            <div class="col-xl-12">
                                <div class="alert alert-outline-danger fade show" role="alert">
                                    <div class="alert-icon"><i class="flaticon-questions-circular-button"></i></div>
                                    <div id="failed_alert_msg" class="alert-text">Incorrect Username or Password</div>

                                </div>
                            </div>
                        </div>
                        <div class="row hide" id="validation_alert">
                            <div class="col-xl-12">
                                <div class="alert alert-outline-danger fade show" role="alert">
                                    <div class="alert-icon"><i class="flaticon-questions-circular-button"></i></div>
                                    <div id="failed_alert_msg" class="alert-text">Username and password are required</div>

                                </div>
                            </div>
                        </div>
                        <form class="kt-form" action="#">
                            <div class="input-group">
                                <input class="form-control required" type="text" placeholder="Enter Username" name="username" id="username" autocomplete="off">
                            </div>
                            <div class="input-group">
                                <input class="form-control form-control-last required" type="password" id="password" placeholder="Password" name="password">
                            </div>

                            <div class="kt-login__actions">
                                <button id="kt_login_signin_submit1" class="btn btn-brand btn-elevate kt-login__btn-primary">Sign In</button>
                            </div><br/>
                            <p style="text-align:center;">© 2020 F2F Trust, All rights reserved. Powered By <a href="https://f2fsolutions.co.in/">F2F Solutions</a></p>
                        </form>
                    </div>





                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {

        $('#kt_login_signin_submit1').click(function (e) {
            e.preventDefault();
            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    username: {
                        required: true,
                    },
                    password: {
                        required: true
                    }
                }
            });

            if (!form.valid()) {
                //$(".error_msg").removeClass("hide");

                $("#validation_alert").removeClass("hide");
                setTimeout(function () {
                    $("#validation_alert").addClass("hide");
                }, 2000);
//                setTimeout(function () {
//                    $(".error_msg").addClass("hide");
//                }, 2000);
                return;
            }

            btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
            var username = $("#username").val();
            var password = $("#password").val();
            var dataString = "username=" + username + "&password=" + password;
            $.ajax({
                method: "POST",
                url: BASE_URL + "users/verify_login",
                data: dataString,
                cache: false,
                error: function (data) {
                    console.log(data);
                },
                success: function (data) {

                    var obj = JSON.parse(data);
                    //return;
                    if (obj.status == "success") {

                        var url_string = window.location.href;
                        var url = new URL(url_string);
                        var is_new_user = url.searchParams.get("is_new_user");
                        if (is_new_user == "yes") {
                            window.location.href = BASE_URL + "users/my_profile";
                        } else {
                            window.location.href = BASE_URL;
                        }
                    } else if (obj.status == "new_user") {
                        window.location.href = BASE_URL + "users/my_profile";
                    } else if (obj.status == "member") {
                        window.location.href = BASE_URL + "users/my_profile";
                    } else {
                        if (obj.status == "auth_not_activated") {
                            msg = "User not activated";
                        } else if (obj.status == "auth_incorrect_login") {
                            msg = "Incorrect login details";
                        } else if (obj.status == "auth_incorrect_password") {
                            msg = "Incorrect password";
                        }
                        $("#failed_alert_msg").html(msg);
                        $("#failed_alert").removeClass("hide");
                        setTimeout(function () {
                            $("#failed_alert").addClass("hide");
                            $("#failed_alert_msg").html("");
                        }, 2000);
                        // $(".custom_error_msg").html('<font color="red">' + msg + '</font>');
                        // $(".custom_error_msg").removeClass("hide");
                        setTimeout(function () {
                            btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                            //$(".custom_error_msg").html("");
                            //$(".custom_error_msg").addClass("hide");
                        }, 2000);

                    }
                }
            });
        });

    });
</script>