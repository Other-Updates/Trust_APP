
<div class="kt-grid__item kt-grid__item--fluid kt-app__content"  id="add_sponsor_div" ng-app="add_sponsor_app" ng-controller="add_sponsor_controller" ng-init="pageLoad()" ng-cloak>
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">

                <h3 class="kt-subheader__title">
                    Add Sponsor
                </h3>

                <span class="kt-subheader__separator kt-subheader__separator--v"></span>


            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <!--begin:: Widgets/Trends-->
            <div class="kt-portlet kt-portlet--head--noborder kt-portlet--height-fluid">

                <form id="add_sponsor_form" class="kt-form kt-form--label-right">
                    <div class="kt-portlet__body">
                        <div class="row">
                            <div class="col-xl-9 col-lg-9 col-md-9" style="float:left;">
                                <div class="form-group row ">

                                    <div class="col-md-4">
                                        <label>Sponsor Name<span class="req">*</span></label>
                                        <input type="text" class="form-control" aria-describedby="emailHelp" name="sponsor_name" id="sponsor_name" placeholder="Enter Sponsor Name">
                                        <span class="form-text text-muted sponsor_name-error error-span"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Gender<span class="req">*</span></label>

                                        <select class="form-control" name="gender_id" id="gender_id" >
                                            <option value="">Select Gender</option>
                                            <option  ng-repeat="(key, genderData) in genderValues" value="{{genderData.id}}">{{genderData.name}}</option>
                                        </select>
                                        <span class="form-text text-muted gender_id-error error-span"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Door No<span class="req">*</span></label>
                                        <input type="text" class="form-control" aria-describedby="emailHelp" name="door_no" id="door_no" placeholder="Enter Door No">
                                        <span class="form-text text-muted door_no-error error-span"></span>
                                    </div>


                                    <div class="col-md-4">
                                        <label>Street<span class="req">*</span></label>
                                        <!--<input type="text" class="form-control" aria-describedby="emailHelp" name="street" id="street" placeholder="Enter Street">-->
                                        <select class="form-control" name="street" id="street">
                                            <option value="">Select Street</option>
                                            <option  ng-repeat="(key, street) in streets" value="{{street.id}}">{{street.name}}</option>
                                        </select>
                                        <span class="form-text text-muted street-error error-span"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Address<span class="req">*</span></label>
                                        <textarea class="form-control" aria-describedby="emailHelp" name="address" id="address" placeholder="Enter Address" ng-model="addressVal"></textarea>
                                        <span class="form-text text-muted address-error error-span"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Residing country<span class="req">*</span></label>

                                        <select class="form-control" name="residing_country" id="residing_country" >
                                            <option value="">Select Country</option>
                                            <option  ng-repeat="(key, countryData) in country" value="{{countryData.id}}"  ng-selected="{{countryData.id == countryHidden}}">{{countryData.countries_name}}</option>
                                        </select>
                                        <span class="form-text text-muted residing_country-error error-span"></span>
                                        <input type="hidden" ng-model="countryHidden">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 cpl-md-3" style="float:left;">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label>Profile Picture<span class="req">*</span></label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_2">
                                            <div class="kt-avatar__holder imagePreview kt-avatar__holder-profile-image-large" id="profile_picture_preview" style="background-image: url(<?php echo base_url(); ?>attachments/profile_image/default.png)"></div>
                                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change profile image">
                                                <i class="fa fa-pen"></i>
                                                <input type="file" name="profile_picture" id="profile_picture">
                                            </label>
                                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                                <i class="fa fa-times"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <span class="form-text text-muted profile_picture-error error-span"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="col-md-3">

                                <label>Landline Number</label>
                                <input type="text" class="form-control validate_amount" aria-describedby="emailHelp" name="landline_no" id="landline_no" placeholder="Enter Landline Number">
                                <span class="form-text text-muted landline_no-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Email ID<span class="req">*</span></label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="email" id="email" placeholder="Enter Email ID">
                                <span class="form-text text-muted email-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Mobile Number<span class="req">*</span></label>
                                <input type="text" class="form-control validate_amount" aria-describedby="emailHelp" name="mobile_no" id="mobile_no" placeholder="Enter Mobile Number">
                                <span class="form-text text-muted mobile_no-error error-span"></span>
                            </div>

                            <!--<div class="col-md-3">

                                <label>Commitment</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="commitment" id="commitment" placeholder="Enter Commitment">
                                <span class="form-text text-muted commitment-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>For year<span class="req">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="for_year" placeholder="Select date" id="for_year" aria-describedby="kt_datepicker-error" aria-invalid="false">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="form-text text-muted for_year-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Paid</label>
                                <div class="kt-radio-inline">
                                    <label class="kt-radio">
                                        <input type="radio" name="paid" value="1"> Yes
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" name="paid" value="0" checked> No
                                        <span></span>
                                    </label>
                                </div>
                                <span class="form-text text-muted paid-error error-span"></span>
                            </div>

                            <div class="col-md-3">

                                <label>Amount<span class="req">*</span></label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="amount" id="amount" placeholder="Enter Amount">
                                <span class="form-text text-muted amount-error error-span"></span>
                            </div>-->
                            <!--<div class="col-md-3">
                                <label>Status<span class="req">*</span></label>

                                <select class="form-control" id="status" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">In Active</option>
                                </select>
                                <span class="form-text text-muted status-error error-span"></span>
                            </div>-->
                            <input type="hidden" id="status" name="status" value="1">

                        </div>

                        <div class="form-group row ">
                            <div class="col-md-12 pt-12">

                                <div class="text-center">
                                    <button type="button" id="submit_add_sponsors_form" class="btn btn-brand" disabled>Save</button>
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


    var add_sponsor_app = angular.module('add_sponsor_app', []);
    add_sponsor_app.controller('add_sponsor_controller', ['$scope', '$http', '$compile', '$location', '$window', function ($scope, $http, $compile, $location, $window) {

            $scope.pageLoad = function () {
                $scope.loadGender();
                $scope.loadCountry();
                $scope.loadStreet();
                $("#submit_add_sponsors_form").attr("disabled", false);
            }

            $scope.loadCountry = function () {
                $http.get(base_url + 'sponsors/get_country')
                        .success(function (data) {
                            //console.log(data);
                            $scope.country = data.country;
                            $scope.countryHidden = '99';
                        })
            }

            $scope.loadStreet = function () {
                $http.get(base_url + 'sponsors/get_street_list')
                        .success(function (data) {
                            $scope.streets = data.street;
                        })
            }


            $scope.loadGender = function () {
                $http.get(base_url + 'sponsors/get_gender')
                        .success(function (data) {

                            $scope.genderValues = data.gender;
                        })
            }


            $scope.goBack = function () {

                $window.location.href = base_url + "sponsors";


            }

            KTFormWidgets.init();
            // KTFormControls.init();
        }]);


    var add_sponsor_div = document.getElementById('add_sponsor_div');
    //alert(dvSecond);
    angular.element(document).ready(function () {
        angular.bootstrap(add_sponsor_div, ['add_sponsor_app']);
    });





    $('#submit_add_sponsors_form').click(function (e) {
        e.preventDefault();

        var btn = $(this);
        var form = $(this).closest('form');
        form.validate({
            rules: {
                sponsor_name: {
                    required: true,
                },
                profile_picture: {
                    required: true,
                },
                door_no: {
                    required: true,
                },
                street: {
                    required: true,
                },
                address: {
                    required: true,
                },
                gender_id: {
                    required: true,
                },
                mobile_no: {
                    required: true,
                    minlength: 10,
                    maxlength: 15,
                    number: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                residing_country: {
                    required: true,
                },
//                for_year: {
//                    required: true,
//                },
//                paid: {
//                    required: true,
//                },
//                amount: {
//                    required: true,
//                    number: true,
//                    min: 0
//                },
                status: {
                    required: true,
                },
            }
        });

        if (!form.valid()) {

            $(".error-span").html("");
            var validator = form.validate();
            console.log(validator.errorList);
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
        var sponsor_name = $("#sponsor_name").val();
        var gender_id = $("#gender_id").val();
        var profile_picture = $("#profile_picture")[0].files;
        var mobile_no = $("#mobile_no").val();
        var email = $("#email").val();
        var landline_no = $("#landline_no").val();
        var door_no = $("#door_no").val();
        var street = $("#street").val();
        var address = $("#address").val();
        var residing_country = $("#residing_country").val();
//        var commitment = $("#commitment").val();
//        var paid = $("input[name='paid']:checked").val();
//        var amount = $("#amount").val();
        var status = $("#status").val();
//        var for_year_value = $("#for_year").val();
//
//        var for_year_split = for_year_value.split("/");
//        var for_year = for_year_split[2] + "-" + for_year_split[0] + "-" + for_year_split[1];
//
//        if (typeof (paid) == 'undefined') {
//            paid = "0";
//        }

        var formData = new FormData();
        formData.append("sponsor_name", sponsor_name);
        formData.append("gender_id", gender_id);
        formData.append("mobile_no", mobile_no);
        formData.append("email", email);
        formData.append("landline_no", landline_no);
        formData.append("door_no", door_no);
        formData.append("street", street);
        formData.append("address", address);
        formData.append("residing_country", residing_country);
        //formData.append("commitment", commitment);
        //formData.append("paid", paid);
        //formData.append("amount", amount);
        //formData.append("for_year", for_year);
        formData.append("status", status);
        formData.append("profile_picture", profile_picture[0]);

        $.ajax({
            method: "POST",
            url: base_url + "sponsors/add_new_sponsor",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            error: function (data) {
                console.log(data);
            },
            success: function (data) {
                console.log(data);
                var obj = JSON.parse(data);
                console.log(obj);
                $(".error-span").html("");
                btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                if (obj.status == "success") {

                    swal.fire({
                        "title": "Success",
                        "text": "New Sponsor has been successfully added!",
                        "type": "success",
                        "confirmButtonClass": "btn btn-secondary"
                    }).then(function () {
                        window.location = base_url + 'sponsors';
                    });


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
            $('#for_year').datepicker({
                todayHighlight: true,
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


    $('#profile_picture').on('change', function () {

        var files = this.files;
        var div = "profile_picture_preview";
        if (files && files[0]) {
            readImage(files[0], '#profile_picture', div);

        }
    });

    function readImage(file, element, div) {
        error = 1;
        file_name = file.name;
        var exts = ['jpg', 'jpeg', 'png', 'svg'];
        var get_ext = file_name.split('.');
        get_ext = get_ext.reverse();
        if ($.inArray(get_ext[0].toLowerCase(), exts) == -1) {
            $(element).val('');
            $("#" + div).parent().parent().parent().find(".error-span").append('Image format not allowed');
            //console.log($("#" + div).parent().parent().parent().find(".error-span"));
            setTimeout(function () {
                $("#" + div).parent().parent().parent().find(".error-span").html('');
            }, 3000);
            default_src = $('#' + div).attr('default_src');
            $('#' + div).attr('src', default_src);
            error = 0;
        } else if (file.size > 5000000) {
            $("#" + div).parent().parent().parent().find(".error-span").append('Maximum size 5MB');
            //console.log($("#" + div).parent().parent().parent().find(".error-span"));
            setTimeout(function () {
                //$("#" + div).parent().parent().parent().find(".error-span").html('');
                $("#" + div).parent().parent().parent().find(".error-span").html('');
            }, 3000);
        } else {
            var reader = new FileReader();
            var image = new Image();
            reader.readAsDataURL(file);
            reader.onload = function (_file) {
                image.src = _file.target.result;
                image.onload = function () {
                    width = this.width;
                    height = this.height;
                    if (width < 150 || height < 150) {
                        $("#img_error").append('Image resolution should be higher than 150x150');
                        $(element).val('');

                        default_src = $('#' + div).attr('default_src');
                        $('#' + div).attr('src', default_src);
                        error = 0;
                    } else {
                        //$('.imagePreview').attr('src', _file.target.result);
                        $('#' + div).attr('style', "background-image: url(" + _file.target.result + ")");
                        $(element).closest('div.form-group').find('.error_msg').text('').slideUp('500');
                    }
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