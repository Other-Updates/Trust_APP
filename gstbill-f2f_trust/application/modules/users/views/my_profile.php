<?php $theme_path = $this->config->item('theme_locations') . 'esms'; ?>

<style>
    .profile-preview{margin-top:35px;}
    #kt_footer{margin-left:106px;}
    .kt-widget.kt-widget--user-profile-4 .kt-widget__head .kt-widget__media .kt-widget__img{height:90px;}
    @media only screen and (max-width: 580px){
        #kt_footer{margin-left:12px;}
    }
</style>

<!-- end:: Header -->
<div class="" id="kt_content">
    <div class="kt-subheader-search ">
        <div class="kt-container  kt-container--fluid ">
            <h3 class="kt-subheader-search__title">
                My Profile

            </h3>

        </div>
    </div>

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid fot" id="edit_profile_div" ng-app="edit_profile_app" ng-controller="edit_profile_controller" ng-init="pageLoad()" ng-cloak>
        <form id="edit_my_profile_form" class="kt-form kt-form--label-right">
            <!--Begin::App-->
            <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
                <!--Begin:: App Aside Mobile Toggle-->
                <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
                    <i class="la la-close"></i>
                </button>
                <!--End:: App Aside Mobile Toggle-->

                <!--Begin:: App Aside-->
                <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside">
                    <!--begin:: Widgets/Applications/User/Profile4-->
                    <div class="kt-portlet kt-portlet--height-fluid-">
                        <div class="kt-portlet__body">
                            <!--begin::Widget -->
                            <div class="kt-widget kt-widget--user-profile-4">
                                <div class="kt-widget__head">
                                    <div class="kt-widget__media">
                                        <img class="kt-widget__img kt-hidden-" src="{{profileImgVal}}" alt="image">

                                        <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
                                            JD
                                        </div>
                                    </div>
                                    <div class="kt-widget__content">
                                        <div class="kt-widget__section">
                                            <a href="#" class="kt-widget__username">
                                                {{memberNameVal}}
                                            </a>
                                            <!--<div class="kt-widget__button">
                                                <span class="btn btn-label-warning btn-sm">Active</span>
                                            </div>-->
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--end::Widget -->
                        </div>
                    </div>
                    <!--end:: Widgets/Applications/User/Profile4-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__body">
                            <div class="kt-widget1 kt-widget1--fit">
                                <div class="kt-widget1__item">
                                    <div class="kt-widget1__info">
                                        <h3 class="kt-widget1__title">User Name</h3>
                                        <span class="kt-widget1__desc">{{userName}}</span>
                                    </div>
                                </div>
                                <div class="kt-widget1__item">
                                    <div class="kt-widget1__info">
                                        <h3 class="kt-widget1__title">Mobile</h3>
                                        <span class="kt-widget1__desc">{{mobile_number}}</span>
                                    </div>
                                </div>
                                <div class="kt-widget1__item">
                                    <div class="kt-widget1__info">
                                        <h3 class="kt-widget1__title">Email</h3>
                                        <span class="kt-widget1__desc">{{emailVal}}</span>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <!--End:: App Aside-->

                <!--Begin:: App Content-->
                <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
                    <div class="row">
                        <div class="col-xl-8 col-md-8">
                            <!--begin:: Widgets/Trends-->
                            <div class="kt-portlet kt-portlet--head--noborder kt-portlet--height-fluid">
                                <input type="hidden" name="is_new_user" id="is_new_user" ng-model="isNewUser">

                                <div class="kt-portlet__body">
                                    <div class="form-group row ">
                                        <div class="col-md-6">
                                            <label>Name<span class="req">*</span></label>
                                            <input type="text" class="form-control" name="member_name" id="member_name" placeholder="Enter Name" ng-model="memberName">
                                            <span class="form-text text-muted member_name-error error-span"></span>

                                        </div>
                                        <div class="col-md-6">
                                            <label>Username<span class="req">*</span></label>
                                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" ng-model="userNameEdit">
                                            <span class="form-text text-muted username-error error-span"></span>
                                            <input type="hidden" id="hiddenUN" ng-model="hiddenUsername">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Password <span class="req" ng-if="pwdRequired">*</span></label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" ng-model="passwordEdit">
                                            <span class="form-text text-muted password-error error-span"></span>
                                            <input type="hidden" id="hiddenVal" ng-model="hiddenVal">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Retype Password <span class="req" ng-if="retypePwdRequired">*</span></label>
                                            <input type="password" class="form-control" name="retype_password" id="retype_password" placeholder="Enter Retype password" ng-model="retypePassword">
                                            <span class="form-text text-muted retype_password-error error-span"></span>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Date of birth</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="dob" placeholder="Select date" id="dob_datepicker" aria-describedby="kt_datepicker-error" aria-invalid="false" ng-value="dobValue" >
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="la la-calendar-check-o"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <span class="form-text text-muted dob-error error-span"></span>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Email<span class="req">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter email" name="email" id="email" ng-model="emailIdVal">
                                            <span class="form-text text-muted email-error error-span"></span>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Mobile<span class="req">*</span></label>
                                            <input type="text" class="form-control validate_number" name="mobile_number" id="mobile_number" ng-model="mobileNoVal" placeholder="Enter Mobile number">
                                            <span class="form-text text-muted mobile_number-error error-span"></span>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Landline</label>
                                            <input type="text" class="form-control validate_number" name="landline_number" id="landline_number" placeholder="Enter Landline number" ng-model="landlineNo">
                                            <span class="form-text text-muted landline_number-error error-span"></span>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Occupation</label>
                                            <input type="text" class="form-control" name="occupation" id="occupation" placeholder="Enter Occupation" ng-model="occupationVal">
                                            <span class="form-text text-muted occupation-error error-span"></span>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Qualification</label>
                                            <input type="text" class="form-control"  name="qualification" id="qualification" placeholder="Enter Qualification" ng-model="qualificationVal">
                                            <span class="form-text text-muted qualification-error error-span"></span>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Door no<span class="req">*</span></label>
                                            <input type="text" class="form-control" placeholder="Enter Door no" name="door_no" id="door_no" ng-model="doorNo">
                                            <span class="form-text text-muted door_no-error error-span"></span>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Street<span class="req">*</span></label>
                                            <!--<input type="text" class="form-control" name="street" id="street" placeholder="Enter Street" ng-model="streetVal">-->
                                            <select class="form-control" name="street" id="street">
                                                <option value="">Select Street</option>
                                                <option  ng-repeat="(key, street) in streets" value="{{street.id}}" ng-selected="{{street.id == streetHidden}}">{{street.name}}</option>
                                            </select>
                                            <span class="form-text text-muted street-error error-span"></span>
                                            <input type="hidden" ng-model="streetHidden">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Address<span class="req">*</span></label>
                                            <textarea class="form-control" name="address" id="address" placeholder="Enter Address" ng-model="addressVal"></textarea>
                                            <span class="form-text text-muted address-error error-span"></span>
                                        </div>
                                        <div class="col-md-12">
                                            <label>Residing country<span class="req">*</span></label>
                                            <select class="form-control" name="country" id="country" ng-model="residingCountry">
                                                <option value="">Select Country</option>
                                                <option  ng-repeat="(key, country) in countries" value="{{country.id}}" ng-selected="{{country.id == countryHidden}}">{{country.countries_name}}</option>
                                            </select>
                                            <span class="form-text text-muted country-error error-span"></span>
                                            <input type="hidden" ng-model="countryHidden">
                                        </div>
                                        <div class="col-md-12 pt-12">
                                            <div class="col-lg-5"></div>
                                            <div class="col-lg-7 ml-lg-auto">
                                                <button type="submit" id="submit_edit_my_profile_form" class="btn btn-brand">Submit</button>
                                                <!--<button type="reset" class="btn btn-secondary" ng-if="(showCancel == 0)">Cancel</button>-->
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>
                            <!--end:: Widgets/Trends-->
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <div class="kt-portlet kt-portlet--height-fluid-">
                                <div class="kt-portlet__body" style="height: 330px;">
                                    <div class="form-group">
                                        <label class="">Profile Picture</label>

                                        <div class="col-md-8">



                                            <div class="kt-avatar" id="kt_user_avatar_2">
                                                <div class="kt-avatar__holder imagePreview kt-avatar__holder-myprofile"  ng-style="{'background-image': 'url(' + profileImg + ')'}"></div>


                                                <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change profile image">
                                                    <i class="fa fa-pen"></i>
                                                    <input type="file" name="profile_image" id="profile_image" >
                                                </label>
                                                <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                                    <i class="fa fa-times"></i>
                                                </span>
                                            </div>
                                            <span class="form-text text-muted profile_image-error error-span"></span>
                                            <input type="hidden" name="profile_img_value" id="profile_img_value" ng-value="profile_img_data">
                                        </div>

                                        <!--<div class="">
                                            <div class="custom-file center-block d-block">
                                                <input class="form-control form-control-line picture_upload" id="profile_image" name="profile_image" type="file">
                                                <span class="help-block file_errors"><small>Choose Profile Picture</small></span>
                                            </div>
                                            <span class="error_msg"></span>
                                        </div><br/><br/>
                                        <div class="col-md-12">
                                            <div class="profile-preview">
                                                <img src="{{profileImg}}" width="100%" height="200px">
                                            </div>

                                            <input type="hidden" name="profile_img_value" id="profile_img_value" ng-value="profile_img_data">
                                        </div>-->
                                        <!--                        <div class="col-md-12">
                                                                    <div  class="custom-file center-block d-block">
                                                                        <input  class="form-control form-control-line  picture_upload" id="profile_image" name="profile_image" type="file">
                                                                        <span  class="help-block file_errors" for="inputGroupFile01">Choose Profile Picture</span>
                                                                    </div>
                                                                    <span class="error_msg"></span>
                                                                </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>


                <!--End:: App Content-->
            </div>
            <!--End::App-->
        </form>
    </div>
    <!-- end:: Content -->
</div>
</div>
</div>
</div>

<!-- end:: Page -->
<script type="text/javascript">


    var edit_profile_app = angular.module('edit_profile_app', []);
    edit_profile_app.controller('edit_profile_controller', ['$scope', '$http', '$compile', '$location', '$window', '$timeout', function ($scope, $http, $compile, $location, $window, $timeout) {

            $scope.pageLoad = function () {

                $http.get(base_url + 'users/getProfileData')
                        .success(function (response) {
                            
                            profile_img_data = "attachments/profile_image/default.png";
                            profile_img = base_url + "attachments/profile_image/default.png";
                            if (response[0]['profile_picture'] != "null" && response[0]['profile_picture'] != "") {
                                profile_img = base_url + "attachments/profile_image/" + response[0]['profile_picture'];
                            }
                            var dobVal = "";
                            if (response[0]['dob'] != '0000-00-00' && response[0]['dob'] != '') {
                                dobVal = $scope.convertToFormDate(response[0]['dob']);
                            }
                            if (response[0]['is_new_user'] == "0") {
                                $("#username").prop("readonly", true);

                            } else {
                                $("#username").prop("readonly", true);
                               // $(".kt-aside").css("display", "none");
                              //  $(".kt-aside--fixed.kt-aside--minimize .kt-wrapper").css("padding-left", "0px");
                            }
                            $scope.showCancel = response[0]['is_new_user'];
                            $scope.pwdRequired = response[0]['is_new_user'];
                            $scope.retypePwdRequired = response[0]['is_new_user'];
                            $scope.isNewUser = response[0]['is_new_user'];
                            $("#is_new_user").val(response[0]['is_new_user']);
                            //alert($("#is_new_user").val());
                            $scope.profile_img_data = response[0]['profile_picture'];
                            $scope.userName = response[0]['username'];
                            $scope.hiddenUsername = response[0]['username'];
                            $scope.userNameEdit = response[0]['username'];
                            $scope.passwordEdit = response[0]['password'];
                            $scope.retypePassword = response[0]['password'];
                            $scope.hiddenVal = response[0]['password'];
                            $("#hiddenVal").val(response[0]['password']);
                            $scope.profileImg = profile_img;
                            $scope.profileImgVal = profile_img;
                            $scope.memberName = response[0]['name'];
                            $scope.memberNameVal = response[0]['name'];
                            $scope.dobValue = dobVal;
                            $scope.lifeMember = response[0]['life_member'];
                            $scope.doorNo = response[0]['door_no'];
                            //$scope.streetVal = response[0]['street_name'];
                            $scope.streetHidden = response[0]['street_name'];
                            $scope.addressVal = response[0]['address'];
                            //$scope.residingCountry = response[0]['residing_country'];

                            $scope.countryHidden = response[0]['residing_country'];
                            //alert($scope.countryHidden);
                            $scope.qualificationVal = response[0]['qualification'];
                            $scope.occupationVal = response[0]['occupation'];
                            $scope.emailVal = response[0]['email'];
                            $scope.emailIdVal = response[0]['email'];

                            $scope.mobile_number = response[0]['mobile_number'];
                            $scope.mobileNoVal = response[0]['mobile_number'];
                            $scope.landlineNo = response[0]['landline_number'];
                            $scope.lastSubscriptionAmt = response[0]['last_subscription_amount'];
                            $scope.statusVal = response[0]['status'];
                            //$scope.memberTypeId = response[0]['member_type_id'];
                            //$scope.positionId = response[0]['position_id'];
                            $scope.positionHidden = response[0]['position_id'];
                            $scope.memberTypeHidden = response[0]['member_type_id'];

                            $("#hiddenUN").val(response[0]['username']);


                            $timeout(function () {

                                KTFormWidgets.init();

                            }, 2000);
                            $scope.loadCountry();
                            $scope.loadStreet();
                            $('#submit_edit_members_form').attr("disabled", false);
                        })


            }

            $scope.convertToFormDate = function (date_val) {
                var dateSplit = date_val.split("-");
                var convertedDate = dateSplit[2] + "/" + dateSplit[1] + "/" + dateSplit[0];
                return convertedDate;
            }

            $scope.loadCountry = function () {
                $http.get(base_url + 'users/get_country_list')
                        .success(function (data) {
                            $scope.countries = data.country;
                        })
            }
            $scope.loadStreet = function () {
                $http.get(base_url + 'users/get_street_list')
                        .success(function (data) {
                            $scope.streets = data.street;
                        })
            }

        }]);
    var edit_profile_div = document.getElementById('edit_profile_div');
    //alert(dvSecond);
    angular.element(document).ready(function () {
        angular.bootstrap(edit_profile_div, ['edit_profile_app']);
    });

    var KTFormWidgets = function () {
        // Private functions
        var initWidgets = function () {
            $('#dob_datepicker').datepicker({
                todayHighlight: true,
                format: 'dd/mm/yyyy',
                templates: {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                }
            });
        }
        return {
            // public functions
            init: function () {
                initWidgets();
            }
        };
    }();

    $('#submit_edit_my_profile_form').click(function (e) {
        e.preventDefault();

        var btn = $(this);
        var form = $(this).closest('form');
        form.validate({
            rules: {
                username: {
                    required: true
                },
                member_name: {
                    required: true
                },
                door_no: {
                    required: true
                },
                street: {
                    required: true
                },
                address: {
                    required: true
                },
                country: {
                    required: true
                },
                mobile_number: {
                    required: true,
                    minlength: 10,
                    maxlength: 15,
                    number: true,
                },
                landline_number: {
                    minlength: 10,
                    maxlength: 15,
                    number: true,
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 6,
                    maxlength: 20,
                },
                retype_password: {
                    equalTo: "#password",
                }
            }
        });
        if (!form.valid()) {
            $(".error-span").html("");
            var validator = form.validate();
            for (x in validator.errorList) {
                var el_id = validator.errorList[x]['element'].id;
                $("#" + el_id).addClass("is-invalid");
                var error_span = (validator.errorList[x]['element'].name) + "-error";
                $("." + error_span).html(validator.errorList[x]['message']);
            }

            return;
        }

        $(".error-span").html("");

        var profile_image = $("#profile_image")[0].files;

        if ($("#profile_img_value").val() == "" && profile_image.length <= 0) {
            $("#profile_image").focus();
            $(".profile_image-error").html("This field is required");
        } else {

            //alert($("#hiddenUN").val());
            //alert($("#is_new_user").val());

            var username = $("#username").val();
            var password = $("#password").val();

            if ($("#is_new_user").val() == "1") {
                if ($("#hiddenUN").val() == username) {
                    $("#username").addClass("is-invalid");
                    $(".username-error").html("Please change your Username");
                    $("#username").focus();
                    return;
                }
                if ($("#hiddenVal").val() == password) {
                    $("#password").addClass("is-invalid");
                    $(".password-error").html("Please change your Password");
                    $("#password").focus();
                    return;
                }
            }


            btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);


            var member_name = $("#member_name").val();
            var dob_datepicker = $("#dob_datepicker").val();
            var door_no = $("#door_no").val();
            var street = $("#street").val();
            var address = $("#address").val();
            var country = $("#country").val();
            var qualification = $("#qualification").val();
            var occupation = $("#occupation").val();
            var mobile_number = $("#mobile_number").val();
            var email = $("#email").val();
            var landline_number = $("#landline_number").val();
            var is_new_user = $("#is_new_user").val();

            var dob = converToMysqlDate(dob_datepicker);


            var formData = new FormData();
            formData.append("username", username);
            formData.append("password", password);
            formData.append("profile_image", profile_image[0]);
            formData.append("member_name", member_name);
            formData.append("dob", dob);
            formData.append("door_no", door_no);
            formData.append("street", street);
            formData.append("address", address);
            formData.append("country", country);
            formData.append("qualification", qualification);
            formData.append("occupation", occupation);
            formData.append("mobile_number", mobile_number);
            formData.append("email", email);
            formData.append("landline_number", landline_number);
            $.ajax({
                method: "POST",
                url: base_url + "users/update_myprofile",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                error: function (data) {
                    console.log(data);
                },
                success: function (data) {
                    //console.log(data);
                    var obj = JSON.parse(data);
                    //console.log(obj);
                    $(".error-span").html("");
                    if (obj.status == "success") {

                        swal.fire({
                            "title": "Success",
                            "text": "Profile updated successfully!",
                            "type": "success",
                            "confirmButtonClass": "btn btn-secondary"
                        }).then(function () {
                            //window.location = base_url + 'members';
                            window.location.reload();
                        });
                    } else if (obj.status == "username_exists") {
//                    $("#warning_msg_div").html("Username already exists");
//                    $("#warning_alert").removeClass("hide");
//
//                    setTimeout(function () {
//                        $("#warning_msg_div").html("");
//                        $("#warning_alert").addClass("hide");
//                    }, 2000);
                        btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                        $("#username").focus();
                        $(".username-error").html("Username already exists");
                    } else if (obj.status == "username_deleted") {
                        btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                        $("#username").focus();
                        $(".username-error").html("Username already deleted");
                    } else if (obj.status == "email_exists") {
                        btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                        $("#email").focus();
                        $(".email-error").html("Email ID already exists");
                    } else if (obj.status == "email_deleted") {
                        btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                        $("#email").focus();
                        $(".email-error").html("Email ID already deleted");
                    } else {
                        swal.fire({
                            "title": "Failed",
                            "text": "Process failed. Please try again!",
                            "type": "error",
                            "buttonStyling": false,
                            "confirmButtonClass": "btn btn-brand btn-sm btn-bold"
                        });
                    }
                }
            });
        }
    });

    function converToMysqlDate(date_val) {
        var date_split = date_val.split("/");
        var converted_date = date_split[2] + "-" + date_split[1] + "-" + date_split[0];
        return converted_date;
    }

    $('#profile_image').on('change', function () {

        var files = this.files;
        var div = "profile_picture_preview";
        if (files && files[0]) {
            readImage(files[0], '#profile_image', div);

        }
    });

    function readImage(file, element) {
        error = 1;
        file_name = file.name;
        var exts = ['jpg', 'jpeg', 'png'];
        var get_ext = file_name.split('.');
        get_ext = get_ext.reverse();
        if ($.inArray(get_ext[0].toLowerCase(), exts) == -1) {
            // alert("if");
            $(element).val('');
            $(".profile_image-error").append('Image format not allowed');
            setTimeout(function () {
                $('.profile_image-error').html('');
            }, 3000);
            default_src = $('.imagePreview').attr('default_src');
            $('.imagePreview').attr('src', default_src);
            error = 0;
        } else if (file.size > 2000000) {
            //alert("else if");
            $(".profile_image-error").append('Maximum size 2MB');
            //console.log($("#" + div).parent().parent().parent().find(".error-span"));
            setTimeout(function () {
                //$("#" + div).parent().parent().parent().find(".error-span").html('');
                $(".profile_image-error").html('');
            }, 3000);
        } else {
            // alert("else");
            var reader = new FileReader();
            var image = new Image();
            reader.readAsDataURL(file);
            reader.onload = function (_file) {
                image.src = _file.target.result;
                image.onload = function () {
                    //width = this.width;
                    //height = this.height;
                    //if (width < 150 || height < 150) {
                    //  $("#img_error").append('Image resolution should be higher than 150x150');
                    //  $(element).val('');

                    //  default_src = $('.imagePreview').attr('default_src');
                    //  $('.imagePreview').attr('src', default_src);
                    //  error = 0;
                    //} else {
                    //$('.imagePreview').attr('src', _file.target.result);
                    $('.imagePreview').attr('style', "background-image: url(" + _file.target.result + ")");
                    $(element).closest('div.form-group').find('.error_msg').text('').slideUp('500');
                    //}
                }
            }
        }
        return error;
    }

    $(document).on('click', '#dob_datepicker', function () {
        var val = $('#dob_datepicker').val();
        if (val == "") {
            $('#dob_datepicker').datepicker('setDate', new Date(1990, 00, 01));
        }
    });

    $(document).on('keypress', '.validate_number', function (event) {
        //console.log(event.which);
        //console.log(isNaN(String.fromCharCode(event.which)));
        if (event.which != 8 && isNaN(String.fromCharCode(event.which))) {
            event.preventDefault();
        }
    });
</script>