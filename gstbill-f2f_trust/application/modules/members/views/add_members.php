<div class="row hide" id="success_alert">
    <div class="col-xl-12">
        <div class="alert alert-outline-success fade show" role="alert">
            <div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
            <div class="alert-text">Successfully added new member</div>

        </div>
    </div>
</div>
<div class="row hide" id="failed_alert">
    <div class="col-xl-12">
        <div class="alert alert-outline-danger fade show" role="alert">
            <div class="alert-icon"><i class="flaticon-questions-circular-button"></i></div>
            <div class="alert-text">Failed to add new member</div>

        </div>
    </div>
</div>
<div class="row hide" id="warning_alert">
    <div class="col-xl-12">
        <div class="alert alert-outline-warning fade show" role="alert">
            <div class="alert-icon"><i class="flaticon-warning"></i></div>
            <div class="alert-text" id="warning_msg_div"></div>

        </div>
    </div>
</div>

<div class="kt-grid__item kt-grid__item--fluid kt-app__content"  id="add_member_div" ng-app="add_member_app" ng-controller="add_member_controller" ng-init="pageLoad()" ng-cloak>
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">

                <h3 class="kt-subheader__title">
                    Add Members
                </h3>

                <span class="kt-subheader__separator kt-subheader__separator--v"></span>


            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <!--begin:: Widgets/Trends-->
            <div class="kt-portlet kt-portlet--head--noborder kt-portlet--height-fluid">

                <form class="kt-form kt-form--label-right">

                    <div class="kt-portlet__body">
                        <div class="row">
                            <div class="col-xl-9 col-lg-9 col-md-9" style="float:left;">
                                <div class="form-group row ">

                                    <div class="col-md-4">
                                        <label>Temporary Username<span class="req">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" aria-describedby="emailHelp" name="username" id="username" placeholder="Enter Username" ng-model="username">
                                            <div class="input-group-append" ng-click="generateUsername()">
                                                <span class="input-group-text">
                                                    <i class="la la-refresh"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <span class="form-text text-muted username-error error-span"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Temporary Password<span class="req">*</span></label>

                                        <div class="input-group">
                                            <input type="text" class="form-control" aria-describedby="emailHelp" name="password" id="password" placeholder="Enter Password" ng-model="password">
                                            <div class="input-group-append" ng-click="generatePassword()">
                                                <span class="input-group-text">
                                                    <i class="la la-refresh"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <span class="form-text text-muted password-error error-span"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Position</label>

                                        <select class="form-control" name="position_id" id="position_id" >
                                            <option value="">Select Position</option>
                                            <option  ng-repeat="(key, position_data) in positions" value="{{position_data.id}}">{{position_data.name}}</option>
                                        </select>
                                        <span class="form-text text-muted position_id-error error-span"></span>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Member Name</label>
                                        <input type="text" class="form-control" aria-describedby="emailHelp" name="member_name" id="member_name" placeholder="Enter Name" ng-model="member_name">
                                        <span class="form-text text-muted member_name-error error-span"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Date of Birth</label>
                                        <div class="input-group">


                                            <input type="text" class="form-control" name="dob_datepicker" id="dob_datepicker" placeholder="Select Date">

                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar-check-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <span class="form-text text-muted dob-error error-span"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Is Lifetime Member</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio">
                                                <input type="radio" name="lifetime_member" value="1"> Yes
                                                <span></span>
                                            </label>
                                            <label class="kt-radio">
                                                <input type="radio" name="lifetime_member" value="0" checked> No
                                                <span></span>
                                            </label>
                                        </div>
                                        <span class="form-text text-muted lifetime_member-error error-span"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 cpl-md-3" style="float:left;">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label>Profile Image</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="kt-avatar" id="kt_user_avatar_2">
                                            <div class="kt-avatar__holder imagePreview kt-avatar__holder-profile-image-large" style="background-image: url(<?php echo base_url(); ?>attachments/profile_image/default.png)"></div>
                                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Upload profile image">
                                                <i class="fa fa-pen"></i>
                                                <input type="file" name="profile_image" id="profile_image" accept="">
                                            </label>
                                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                                <i class="fa fa-times"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <span class="form-text text-muted profile_image-error error-span"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="col-md-3">
                                <label>Door No</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="door_no" id="door_no" placeholder="Enter Door No">
                                <span class="form-text text-muted door_no-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Street</label>
                                <!--<input type="text" class="form-control" aria-describedby="emailHelp" name="street" id="street" placeholder="Enter Street">-->
                                <select class="form-control" name="street" id="street" ng-model="streetVal">
                                    <option value="">Select Street</option>
                                    <option  ng-repeat="(key, street) in streets" value="{{street.id}}">{{street.name}}</option>
                                </select>
                                <span class="form-text text-muted street-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Address</label>
                                <textarea class="form-control" aria-describedby="emailHelp" name="address" id="address" placeholder="Enter Address"></textarea>
                                <span class="form-text text-muted street-error error-span"></span>
                            </div>


                            <div class="col-md-3">
                                <label>Residing Country</label>

                                <select class="form-control" name="country" id="country" ng-model="countryVal">
                                    <option value="">Select Country</option>
                                    <option  ng-repeat="(key, country) in countries" value="{{country.id}}" ng-selected="{{country.id == countryHidden}}">{{country.countries_name}}</option>
                                </select>
                                <span class="form-text text-muted country-error error-span"></span>
                                <input type="hidden" ng-model="countryHidden">
                            </div>
                            <div class="col-md-3">
                                <label>Qualification</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="qualification" id="qualification" placeholder="Enter Qualification">
                                <span class="form-text text-muted qualification-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Occupation</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="occupation" id="occupation" placeholder="Enter Occupation">
                                <span class="form-text text-muted occupation-error error-span"></span>
                            </div>


                            <div class="col-md-3">
                                <label>Member Since</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="member_since" placeholder="Select Date" id="member_since" aria-describedby="kt_datepicker-error" aria-invalid="false">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="form-text text-muted member_since-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Email ID</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="email" id="email" placeholder="Enter Email ID">
                                <span class="form-text text-muted email-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Mobile Number</label>
                                <input type="text" class="form-control validate_amount" aria-describedby="emailHelp" name="mobile_number" id="mobile_number" ng-model="mobile_number" ng-pattern="/[0-9]$/" maxlength="20" placeholder="Enter Mobile Number">
                                <span class="form-text text-muted mobile_number-error error-span"></span>
                            </div>



                            <div class="col-md-3">
                                <label>Landline</label>
                                <input type="text" class="form-control validate_amount" aria-describedby="emailHelp" name="landline_number" id="landline_number" placeholder="Enter Landline Number">
                                <span class="form-text text-muted landline_number-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Last Subscription</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="last_subscription_year" id="last_subscription_year" placeholder="Enter Last Subscription" disabled >
                                <span class="form-text text-muted last_subscription_year-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Last Subscription Amount</label>
                                <input type="number" class="form-control" aria-describedby="emailHelp" name="last_subscription_amount" id="last_subscription_amount" placeholder="Enter Last Subscription Amount" disabled >
                                <span class="form-text text-muted last_subscription_amount-error error-span"></span>
                            </div>


                            <div class="col-md-3">
                                <label>Status</label>

                                <select class="form-control" id="status" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">In Active</option>
                                    <option value="2">Died</option>
                                </select>
                                <span class="form-text text-muted status-error error-span"></span>
                            </div>

                            <div class="col-md-3">
                                <label>Member Type</label>

                                <select class="form-control" name="member_type_id" id="member_type_id" >
                                    <option value="">Select Member Type</option>
                                    <option  ng-repeat="(key, member_type_data) in member_types" value="{{member_type_data.id}}">{{member_type_data.name}}</option>
                                </select>
                                <span class="form-text text-muted member_type_id-error error-span"></span>
                            </div>

                            <div class="col-md-3">
                                <label>User Type</label>
                                <select class="form-control" name="user_type_id" id="user_type_id" ng-model="userTypeId">
                                    <option value="">Select User Type</option>
                                    <option  ng-repeat="(key, user_type_data) in user_types" value="{{user_type_data.id}}">{{user_type_data.user_type_name}}</option>
                                </select>
                                <span class="form-text text-muted user_type_id-error error-span"></span>
                                <input type="hidden" ng-model="userTypeHidden">
                            </div>



                        </div>
                        <div class="form-group row ">

                            <div class="col-md-12 pt-12">

                                <div class="text-center">
                                    <button type="button" id="submit_add_members_form" class="btn btn-brand">Save</button>
                                    <button type="button" class="btn btn-secondary" ng-click="goBack()">Back</button>
                                </div>
                            </div>


                        </div>

                    </div>

                </form>


            </div>
            <!--end:: Widgets/Trends-->
        </div>

    </div>


</div>

<script type="text/javascript">


    var add_member_app = angular.module('add_member_app', []);
    add_member_app.controller('add_member_controller', ['$scope', '$http', '$compile', '$location', '$window', '$timeout', function ($scope, $http, $compile, $location, $window, $timeout) {

            $scope.pageLoad = function () {

                $scope.generatePassword();
                $scope.generateUsername();
                $scope.loadCountry();
                $scope.loadMemberType();
                $scope.loadPosition();
                $scope.loadUserType();
                $scope.loadStreet();
                $scope.dob_datepicker = "";
            }

            $scope.loadCountry = function () {
                $http.get(base_url + 'members/get_country_list')
                        .success(function (data) {

                            $scope.countries = data.country;
                            $scope.countryHidden = '99';

                        })
            }

            $scope.loadStreet = function () {
                $http.get(base_url + 'members/get_street_list')
                        .success(function (data) {
                            $scope.streets = data.street;
                        })
            }

            $scope.loadMemberType = function () {
                $http.get(base_url + 'members/get_member_type')
                        .success(function (data) {
                            //console.log(data);
                            $scope.member_types = data.member_type;
                        })
            }

            $scope.loadUserType = function () {
                $http.get(base_url + 'members/get_user_type')
                        .success(function (data) {

                            $scope.user_types = data.user_type;
                        })
            }
            $scope.loadPosition = function () {
                $http.get(base_url + 'members/get_position')
                        //$http.get(base_url + 'members/get_available_position')
                        .success(function (data) {

                            $scope.positions = data.position;
                        })
            }


            $scope.pwdCharArray = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I',
                'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R',
                'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i',
                'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r',
                's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];

            $scope.generatePassword = function () {

                $scope.password = "";
                for (var i = 0; i < 6; i++) {

                    $scope.temp = Math.floor(Math.random() * $scope.pwdCharArray.length);
                    $scope.password += $scope.pwdCharArray[$scope.temp];
                }
            };

            $scope.unCharArray = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I',
                'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R',
                'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

            $scope.generateUsername = function () {

                $scope.username = "";
                for (var i = 0; i < 6; i++) {

                    $scope.temp = Math.floor(Math.random() * $scope.unCharArray.length);
                    $scope.username += $scope.unCharArray[$scope.temp];
                }
            };

            $scope.goBack = function () {

                $window.location.href = base_url + "members";


            }




//            $scope.showDeafaultDob = function () {
//
//                //alert($scope.member_name);
//                alert($scope.dob_datepicker);
//                //$scope.dob_datepicker
//                if ($scope.dob_datepicker == "") {
//                    $scope.dob_datepicker = "01/01/1190";
//                    //$('#dob_datepicker').datepicker('setDate', new Date(1990, 00, 01));
//                }
//            }


            KTFormWidgets.init();
        }]);


    var add_member_div = document.getElementById('add_member_div');
    //alert(dvSecond);
    angular.element(document).ready(function () {
        angular.bootstrap(add_member_div, ['add_member_app']);
    });

    $('#submit_add_members_form').click(function (e) {
        e.preventDefault();
        var btn = $(this);
        var form = $(this).closest('form');
        form.validate({
            rules: {
                username: {
                    required: true,
                },
                password: {
                    required: true,
                },
//                profile_image: {
//                    required: true
//                },
//                member_name: {
//                    required: true
//                },
//                door_no: {
//                    required: true
//                },
//                street: {
//                    required: true
//                },
//                address: {
//                    required: true
//                },
//                country: {
//                    required: true
//                },
                mobile_number: {
                    //required: true,
                    minlength: 10,
                    maxlength: 15,
                    number: true,
                },
                landline_number: {
                    minlength: 10,
                    maxlength: 15,
                    number: true,
                },
//                status: {
//                    required: true
//                },
//                member_type_id: {
//                    required: true
//                },
//                last_subscription_amount: {
//                    min: 0,
//                },
                email: {
                    //required: false,
                    email: function () {
                        $("#email").removeClass("is-invalid");
                        if ($("#email").val() != "") {
                            return true;
                        } else {
                            return false;
                        }
                    }
                },
//                position_id: {
//                    required: true
//                }
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
        btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
        var username = $("#username").val();
        var password = $("#password").val();
        var profile_image = $("#profile_image")[0].files;
        var member_name = $("#member_name").val();
        var dob_datepicker = $("#dob_datepicker").val();
        var lifetime_member = $("input[name='lifetime_member']:checked").val();
        var door_no = $("#door_no").val();
        var street = $("#street").val();
        var address = $("#address").val();
        var country = $("#country").val();
        var qualification = $("#qualification").val();
        var occupation = $("#occupation").val();
        var member_since_date = $("#member_since").val();
        var mobile_number = $("#mobile_number").val();
        var email = $("#email").val();
        var landline_number = $("#landline_number").val();
        //var last_subscription_year = $("#last_subscription_year").val();
        //var last_subscription_amount = $("#last_subscription_amount").val();
        var status = $("#status").val();
        var member_type_id = $("#member_type_id").val();
        var position_id = $("#position_id").val();
        var user_type_id = $("#user_type_id").val();
        //var dataString = "username=" + username + "&password=" + password + "&profile_image=" + profile_image + "&member_name=" + member_name + "&dob_datepicker=" + dob_datepicker + "&password=" + password + "&password=" + password + "&password=" + password + "&password=" + password + "&password=" + password + "&password=" + password;
        //console.log(profile_image);
        //alert(dob);

        //var dob_split = dob_datepicker.split("/");
        //var dob = dob_split[2] + "-" + dob_split[1] + "-" + dob_split[0];
        //var member_since_split = member_since_date.split("/");
        //var member_since = member_since_split[2] + "-" + member_since_split[0] + "-" + member_since_split[1];

        var dob = "";
        if (dob_datepicker != "") {
            dob = converToMysqlDate(dob_datepicker);
        }

        var member_since = "";
        if (member_since_date != "") {
            member_since = converToMysqlDate(member_since_date);
        }

        var formData = new FormData();
        formData.append("username", username);
        formData.append("password", password);
        formData.append("profile_image", profile_image[0]);
        formData.append("member_name", member_name);
        formData.append("dob", dob);
        formData.append("lifetime_member", lifetime_member);
        formData.append("door_no", door_no);
        formData.append("street", street);
        formData.append("address", address);
        formData.append("country", country);
        formData.append("qualification", qualification);
        formData.append("occupation", occupation);
        formData.append("member_since", member_since);
        formData.append("mobile_number", mobile_number);
        formData.append("email", email);
        formData.append("landline_number", landline_number);
        //formData.append("last_subscription_year", last_subscription_year);
        //formData.append("last_subscription_amount", last_subscription_amount);
        formData.append("status", status);
        formData.append("member_type_id", member_type_id);
        formData.append("member_type_id", member_type_id);
        formData.append("position_id", position_id);
        formData.append("user_type_id", user_type_id);

        $.ajax({
            method: "POST",
            url: base_url + "members/add_new_member",
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
                        "text": "New member has been successfully added!",
                        "type": "success",
                        "confirmButtonClass": "btn btn-secondary"
                    }).then(function () {
                        window.location = base_url + 'members';
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
                } else if (obj.status == "position_exists") {
                    btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                    $("#position_id").focus();
                    $(".position_id-error").html("This position already assigned to someone");
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

            $('#member_since').datepicker({
                todayHighlight: true,
                format: 'dd/mm/yyyy',
                templates: {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                }
            });
            $('#last_subscription_year').datepicker({
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

    $(document).on('click', '#dob_datepicker', function () {
        var val = $('#dob_datepicker').val();
        if (val == "") {
            $('#dob_datepicker').datepicker('setDate', new Date(1990, 00, 01));
        }
    });

    $('#profile_image').on('change', function () {

        var files = this.files;
        //var div = "profile_picture_preview";
        if (files && files[0]) {
            readImage(files[0], '#profile_image');

        }
    });

    function converToMysqlDate(date_val) {
        var date_split = date_val.split("/");
        var converted_date = date_split[2] + "-" + date_split[1] + "-" + date_split[0];
        return converted_date;
    }

    function readImage(file, element) {
        error = 1;
        file_name = file.name;
        var exts = ['jpg', 'jpeg', 'png', 'svg'];
        var get_ext = file_name.split('.');
        get_ext = get_ext.reverse();
        if ($.inArray(get_ext[0].toLowerCase(), exts) == -1) {
            $(element).val('');
            $(".profile_image-error").append('Image format not allowed');
            setTimeout(function () {
                $('.profile_image-error').html('');
            }, 3000);
            default_src = $('.imagePreview').attr('default_src');
            $('.imagePreview').attr('src', default_src);
            error = 0;
        } else if (file.size > 5000000) {
            $(".profile_image-error").append('Maximum size 5MB');
            //console.log($("#" + div).parent().parent().parent().find(".error-span"));
            setTimeout(function () {
                //$("#" + div).parent().parent().parent().find(".error-span").html('');
                $(".profile_image-error").html('');
            }, 3000);
        } else {
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

    $(document).on('keypress', '.validate_amount', function (event) {
        //console.log(event.which);
        //console.log(isNaN(String.fromCharCode(event.which)));
        if (event.which != 8 && isNaN(String.fromCharCode(event.which))) {
            event.preventDefault();
        }
    });

</script>