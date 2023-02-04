
<div class="row hide" id="success_alert">
    <div class="col-xl-12">
        <div class="alert alert-outline-success fade show" role="alert">
            <div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
            <div class="alert-text">Successfully added new scholarship</div>

        </div>
    </div>
</div>
<div class="row hide" id="failed_alert">
    <div class="col-xl-12">
        <div class="alert alert-outline-danger fade show" role="alert">
            <div class="alert-icon"><i class="flaticon-questions-circular-button"></i></div>
            <div class="alert-text">Failed to add new scholarship</div>

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

<div class="kt-grid__item kt-grid__item--fluid kt-app__content"  id="add_scholarship_div" ng-app="add_scholarship_app" ng-controller="add_scholarship_controller" ng-init="pageLoad()" ng-cloak>
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">

                <h3 class="kt-subheader__title">
                    Add Scholarship
                </h3>

                <span class="kt-subheader__separator kt-subheader__separator--v"></span>


            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <!--begin:: Widgets/Trends-->
            <div class="kt-portlet kt-portlet--head--noborder kt-portlet--height-fluid">

                <form id="add_scholarship_form" class="kt-form kt-form--label-right">
                    <div class="kt-portlet__body">
                        <div class="form-group">

                        </div>
                        <div class="row">
                            <div class="col-xl-9 col-lg-9 col-md-9" style="float:left;">
                                <div class="form-group row ">

                                    <div class="col-md-4">
                                        <label>Application Date<span class="req">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="application_date" placeholder="Select Date" id="application_date" aria-describedby="kt_datepicker-error" aria-invalid="false">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar-check-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <span class="form-text text-muted application_date-error error-span"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Approved Amount<span class="req">*</span></label>
                                        <input type="text" class="form-control validate_amount" aria-describedby="emailHelp" name="approved_amount" id="approved_amount" placeholder="Enter Application Amount">
                                        <span class="form-text text-muted approved_amount-error error-span"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Approved Date<span class="req">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="approved_year" placeholder="Select Date" id="approved_year" aria-describedby="kt_datepicker-error" aria-invalid="false">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar-check-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <span class="form-text text-muted approved_year-error error-span"></span>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Application Type<span class="req">*</span></label>

                                        <select class="form-control" name="application_type_id" id="application_type_id" >
                                            <option value="">Select Application Type</option>
                                            <option  ng-repeat="(key, applicationTypeData) in applicationType" value="{{applicationTypeData.id}}" >{{applicationTypeData.name}}</option>
                                        </select>
                                        <span class="form-text text-muted application_type_id-error error-span"></span>

                                    </div>
                                    <div class="col-md-4">
                                        <label>Years Sponsored<span class="req">*</span></label>
                                        <input type="text" class="form-control validate_amount" aria-describedby="emailHelp" name="years_sponsored" id="years_sponsored" placeholder="Enter Years Sponsored">
                                       <!-- <select class="form-control" name="years_sponsored" id="years_sponsored">
                                            <option value="">Select year</option>
                                            <option value="1990">1990</option>
                                            <option value="1991">1991</option>
                                            <option value="1992">1992</option>
                                            <option value="1993">1993</option>
                                            <option value="1994">1994</option>
                                            <option value="1995">1995</option>
                                            <option value="1996">1996</option>
                                            <option value="1997">1997</option>
                                            <option value="1998">1998</option>
                                            <option value="1999">1999</option>
                                            <option value="2000">2000</option>
                                            <option value="2001">2001</option>
                                            <option value="2002">2002</option>
                                            <option value="2003">2003</option>
                                            <option value="2004">2004</option>
                                            <option value="2005">2005</option>
                                            <option value="2006">2006</option>
                                            <option value="2007">2007</option>
                                            <option value="2008">2008</option>
                                            <option value="2009">2009</option>
                                            <option value="2010">2010</option>
                                            <option value="2011">2011</option>
                                            <option value="2012">2012</option>
                                            <option value="2013">2013</option>
                                            <option value="2014">2014</option>
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                        </select>-->
                                        <span class="form-text text-muted years_sponsored-error error-span"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Student Name<span class="req">*</span></label>
                                        <input type="text" class="form-control" aria-describedby="emailHelp" name="student_name" id="student_name" placeholder="Enter Student Name">
                                        <span class="form-text text-muted student_name-error error-span"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 cpl-md-3" style="float:left;">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label>Profile Picture<span class="req">*</span></label>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_2">
                                            <div class="kt-avatar__holder imagePreview kt-avatar__holder-profile-image-large" id="profile_picture_preview" style="background-image: url(<?php echo base_url(); ?>attachments/profile_image/default.png)"></div>
                                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Choose Profile Image">
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
                                <label>Gender<span class="req">*</span></label>

                                <select class="form-control" name="gender_id" id="gender_id" >
                                    <option value="">Select Gender</option>
                                    <option  ng-repeat="(key, genderData) in genderValues" value="{{genderData.id}}">{{genderData.name}}</option>
                                </select>
                                <span class="form-text text-muted gender_id-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Date of Birth<span class="req">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="dob" placeholder="Select Date" id="dob_datepicker" aria-describedby="kt_datepicker-error" aria-invalid="false">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="form-text text-muted dob-error error-span"></span>
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
                            <div class="col-md-3">
                                <label>Landline Number</label>
                                <input type="text" class="form-control validate_amount" aria-describedby="emailHelp" name="landline_no" id="landline_no" placeholder="Enter Landline Number">
                                <span class="form-text text-muted landline_no-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Door Number<span class="req">*</span></label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="door_no" id="door_no" placeholder="Enter Door Number">
                                <span class="form-text text-muted door_no-error error-span"></span>
                            </div>



                            <div class="col-md-3">
                                <label>Street<span class="req">*</span></label>
                                <!--<input type="text" class="form-control" aria-describedby="emailHelp" name="street" id="street" placeholder="Enter Street">-->
                                <select class="form-control" name="street" id="street">
                                    <option value="">Select Street</option>
                                    <option  ng-repeat="(key, street) in streets" value="{{street.id}}">{{street.name}}</option>
                                </select>
                                <span class="form-text text-muted street-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Address<span class="req">*</span></label>
                                <textarea class="form-control" aria-describedby="emailHelp" name="address" id="address" placeholder="Enter Address" ng-model="addressVal"></textarea>
                                <span class="form-text text-muted address-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>College Name<span class="req">*</span></label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="college_name" id="college_name" placeholder="Enter College Name">
                                <span class="form-text text-muted college_name-error error-span"></span>
                            </div>



                            <div class="col-md-3">
                                <label>College Address<span class="req">*</span></label>
                                <textarea class="form-control" aria-describedby="emailHelp" name="college_address" id="college_address" placeholder="Enter College Address"></textarea>
                                <span class="form-text text-muted college_address-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Course Name<span class="req">*</span></label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="course_name" id="course_name" placeholder="Enter Course Name">
                                <span class="form-text text-muted course_name-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Course Type<span class="req">*</span></label>

                                <select class="form-control" name="course_type_id" id="course_type_id" >
                                    <option value="">Select Course Type</option>
                                    <option  ng-repeat="(key, courseTypeData) in courseType" value="{{courseTypeData.id}}">{{courseTypeData.name}}</option>
                                </select>
                                <span class="form-text text-muted course_type_id-error error-span"></span>
                            </div>

                            <div class="col-md-3">
                                <label>Course Completed Year</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="course_completed_year" placeholder="Select Date" id="course_completed_year" aria-describedby="kt_datepicker-error" aria-invalid="false">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="form-text text-muted course_completed_year-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Has Repayment</label>
                                <div class="kt-radio-inline">
                                    <label class="kt-radio">
                                        <input type="radio" name="has_repayments" value="1"> Yes
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" name="has_repayments" value="0" checked> No
                                        <span></span>
                                    </label>
                                </div>
                                <span class="form-text text-muted has_repayments-error error-span"></span>
                            </div>

                            <div class="col-md-3">
                                <label>Payment on Hold</label>

                                <div class="kt-radio-inline">
                                    <label class="kt-radio">
                                        <input type="radio" name="payment_on_hold" value="1"> Yes
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" name="payment_on_hold" value="0" checked> No
                                        <span></span>
                                    </label>
                                </div>
                                <span class="form-text text-muted payment_on_hold-error error-span"></span>
                            </div>

                            <div class="col-md-3">
                                <label>Repayment Started Year</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="repayment_started_year" placeholder="Repayment Started Year" id="repayment_started_year" aria-describedby="kt_datepicker-error" aria-invalid="false" disabled>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="form-text text-muted repayment_started_year-error error-span"></span>
                            </div>

                            <div class="col-md-3">
                                <label>Repayment Completed Year</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="repayment_completed_year" placeholder="Select Date" id="repayment_completed_year" aria-describedby="kt_datepicker-error" aria-invalid="false">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="form-text text-muted repayment_completed_year-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Zakaath Amount (Available: <font color="red">&#8377; {{availableZakaath}}</font>) </label>
                                <input type="text" class="form-control validate_amount" aria-describedby="emailHelp" name="zakaath_amount" id="zakaath_amount" placeholder="Enter Zakaath Amount" ng-blur="checkValidAmt()" ng-model="zakaathAmount">
                                <span class="form-text text-muted zakaath_amount-error error-span">{{amtValid}}</span>
                            </div>
                            <!--                            <div class="col-md-3">
                                                            <label>Status</label>

                                                            <select class="form-control" id="status" name="status">
                                                                <option value="1">Active</option>
                                                                <option value="0">In Active</option>
                                                            </select>
                                                            <span class="form-text text-muted status-error error-span"></span>
                                                        </div>-->



                            <div class="col-md-3">
                                <label>Remarks</label>
                                <textarea class="form-control" aria-describedby="emailHelp" name="remark" id="remark" placeholder="Enter Remark"></textarea>
                                <span class="form-text text-muted remark-error error-span"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <div class="col-md-12">
                                    <label>Scanned Copy of Application<span class="req">*</span></label>
                                    <label><span class="req">(Maximum File Size 5MB)</span></label>
                                </div>
                                <div class="col-md-5">
                                    <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_2">
                                        <div class="kt-avatar__holder imagePreview kt-avatar__holder-profile-image-large" id="scanned_application_preview" style="background-image: url(<?php echo base_url(); ?>attachments/scanned_copy_of_application/default.png)"></div>
                                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Upload Scanned Copy of Application">
                                            <i class="fa fa-pen"></i>
                                            <input type="file" name="scanned_copy_of_application" id="scanned_copy_of_application">
                                        </label>
                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                            <i class="fa fa-times"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <input type="text" Placeholder="Application Name"  id="scanned_copy_of_application_name" class="form-control" ng-value="scannedApplicationName">
                                    <span class="form-text text-muted scanned_copy_of_application-error error-span"></span>
                                    <span class="form-text text-muted scanned_copy-info"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="col-md-8">
                                    <label>Supporting Documents<span class="req">*</span></label>
                                    <label><span class="req">(Maximum File Size 5MB)</span></label>
                                </div>
                                <div class="col-md-4">
                                    <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_2">
                                        <div class="kt-avatar__holder imagePreview kt-avatar__holder-profile-image-large" style="background-image: url(<?php echo base_url(); ?>attachments/supporting_documents/default.png)"></div>
                                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Upload Supporting Document">
                                            <i class="fa fa-pen"></i>
                                            <input type="file" name="supporting_documents" id="supporting_documents" multiple>
                                        </label>
                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                            <i class="fa fa-times"></i>
                                        </span>
                                    </div>
                                </div>
                                <input type="hidden" class="supporting_documentid"  ng-value="{{supporting_documentData.id}}"  name="supporting_documentid[]">
                                <input type="text" class="supporting_documentName form-control"  Placeholder = "Document Name" value="{{supporting_documentData.document_name}}"  name="supporting_documentName[]">
                                <span class="form-text text-muted supporting_documents-error error-span"></span>
                                <span class="form-text text-muted supporting_documents-info "></span>
                            </div>

                        </div>
                        <!--<div class="form-group row ">
                            <div class="col-md-3">
                                <label>Supporting Documents<span class="req">*</span></label>
                            </div>

                            <div class="col-md-9 txt-align-right">
                                <div class="kt-uppy" id="kt_uppy_5">
                                    <div class="kt-uppy__wrapper">
                                        <div class="uppy-Root uppy-FileInput-container">
                                            <input class="uppy-FileInput-input kt-uppy__input-control" type="file" name="supporting_documents" multiple="" id="supporting_documents" style="">
                                            <label class="kt-uppy__input-label btn btn-label-brand btn-bold btn-font-sm" for="supporting_documents">Add more files</label>
                                        </div>
                                        <span class="form-text text-muted supporting_documents-error error-span"></span>
                                        <span class="form-text text-muted supporting_documents-info "></span>
                                    </div>
                                </div>
                            </div>
                        </div>-->

                        <div class="form-group row ">

                            <div class="col-md-12 pt-12">

                                <div class="text-center">
                                    <button type="button" id="submit_add_scholarship_form" class="btn btn-brand">Save</button>
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


    var add_scholarship_app = angular.module('add_scholarship_app', []);
    add_scholarship_app.controller('add_scholarship_controller', ['$scope', '$timeout', '$http', '$compile', '$location', '$window', function ($scope, $timeout, $http, $compile, $location, $window) {

            $scope.pageLoad = function () {

                $scope.loadApplicationType();
                $scope.loadGender();
                $scope.loadCourseType();
                $scope.loadZakaathAmt();
                $scope.loadStreet();
            }

            $scope.loadStreet = function () {
                $http.get(base_url + 'scholarship/get_street_list')
                        .success(function (data) {
                            $scope.streets = data.street;
                        })
            }


            $scope.loadApplicationType = function () {
                $http.get(base_url + 'scholarship/get_application_type')
                        .success(function (data) {
                            //console.log(data);
                            $scope.applicationType = data.application_type;
                        })
            }

            $scope.loadGender = function () {
                $http.get(base_url + 'scholarship/get_gender')
                        .success(function (data) {

                            $scope.genderValues = data.gender;
                        })
            }
            $scope.loadCourseType = function () {
                $http.get(base_url + 'scholarship/get_course_type')
                        .success(function (data) {

                            $scope.courseType = data.course_type;
                        })
            }

            $scope.loadZakaathAmt = function () {
                $http.get(base_url + 'scholarship/get_zakaath_amt')
                        .success(function (data) {
                            //console.log(data);
                            $scope.availableZakaath = data.zakaath_amount_detail[0]['amount'];
                        })
            }


            $scope.checkValidAmt = function () {
                var amount = $scope.zakaathAmount;
                //alert(amount);
                if (amount != 0 && amount != "") {
                    //alert("if");
                    $http.get(base_url + 'scholarship/checkZakaathAmt?amount=' + amount)
                            .success(function (data) {
                                //console.log(data);
                                //var obj = data.zakaathamount_details;
                                //console.log(obj);
                                var zakaathamount = data.zakaathamount_details[0]['amount'];
                                //console.log(zakaathamount);

                                if (parseFloat(zakaathamount) < parseFloat(amount)) {
                                    //alert("if");
                                    $scope.zakaathAmount = 0;
                                    $scope.amtValid = "Amount exceeds!. Available amount is " + zakaathamount;
                                    $timeout(function () {
                                        $scope.amtValid = "";
                                    }, 5000);
                                }

                            })
                }
            }



            $scope.goBack = function () {

                $window.location.href = base_url + "scholarship";

            }

            KTFormWidgets.init();
            // KTFormControls.init();
        }]);


    var add_scholarship_div = document.getElementById('add_scholarship_div');
    //alert(dvSecond);
    angular.element(document).ready(function () {
        angular.bootstrap(add_scholarship_div, ['add_scholarship_app']);
    });


    var KTFormControls = function () {
        // Private functions

        var scholarshpFormSubmit = function () {
            $("#add_scholarship_form").validate({
                // define validation rules
                rules: {
                    application_date: {
                        required: true,
                    },
                    application_type_id: {
                        required: true,
                    },
                    student_name: {
                        required: true,
                    },
                    profile_picture: {
                        required: true,
                    },
                    dob: {
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
                    course_type_id: {
                        required: true,
                    },
                    college_name: {
                        required: true,
                    },
                    course_name: {
                        required: true,
                    },
                    college_address: {
                        required: true,
                    },
                    approved_amount: {
                        required: true,
                        number: true,
                        min: 0,
                        max: 50,
                    },
                    years_sponsored: {
                        required: true,
                    },
                    approved_year: {
                        required: true,
                    },
                    scanned_copy_of_application: {
                        required: true,
                    },
                    supporting_documents: {
                        required: true,
                    },
                },
                //display error alert on form submit

                submitHandler: function (form) {
                    //form[0].submit(); // submit the form
                    alert("submit");
                }
            });
        }


        return {
            // public functions
            init: function () {
                scholarshpFormSubmit();
            }
        };
    }();


    $('#submit_add_scholarship_form').click(function (e) {
        e.preventDefault();
        var btn = $(this);
        var form = $(this).closest('form');
        form.validate({
            rules: {
                application_date: {
                    required: true,
                },
                application_type_id: {
                    required: true,
                },
                student_name: {
                    required: true,
                },
                profile_picture: {
                    required: true,
                },
                dob: {
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
                course_type_id: {
                    required: true,
                },
                college_name: {
                    required: true,
                },
                course_name: {
                    required: true,
                },
                college_address: {
                    required: true,
                },
                approved_amount: {
                    required: true,
                    number: true,
                    min: 0,
                },
                years_sponsored: {
                    required: true,
                    //number: true,
                    //min: 0,
                },
                approved_year: {
                    required: true,
                },
                scanned_copy_of_application: {
                    required: true,
                },
                supporting_documents: {
                    required: true,
                },
                zakaath_amount: {
                    number: true,
                    min: 0,
                }
            }
        });

        if (!form.valid()) {
            $(".error-span").html("");
            var validator = form.validate();
            //console.log(validator.errorList);
            for (x in validator.errorList) {
                var el_id = validator.errorList[x]['element'].id;
                $("#" + el_id).addClass("is-invalid");
                var error_span = (validator.errorList[x]['element'].name) + "-error";
                $("." + error_span).html(validator.errorList[x]['message']);
            }

            return;
        }
        if ($(".supporting_documents-error").html() != "") {

        }
        $(".error-span").html("");
        btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
        var application_date_picker = $("#application_date").val();
        var approved_amount = $("#approved_amount").val();
        var approved_year_picker = $("#approved_year").val();
        var application_type_id = $("#application_type_id").val();
        var years_sponsored = $("#years_sponsored").val();
        var scanned_copy_of_application = $("#scanned_copy_of_application")[0].files;
        var scanned_copy_of_application_name = $("#scanned_copy_of_application_name").val();
        var student_name = $("#student_name").val();
        var gender_id = $("#gender_id").val();
        var profile_picture = $("#profile_picture")[0].files;
        var dob_datepicker = $("#dob_datepicker").val();
        var mobile_no = $("#mobile_no").val();
        var email = $("#email").val();
        var landline_no = $("#landline_no").val();
        var door_no = $("#door_no").val();
        var street = $("#street").val();
        var address = $("#address").val();
        var college_name = $("#college_name").val();
        var college_address = $("#college_address").val();
        var course_name = $("#course_name").val();
        var course_type_id = $("#course_type_id").val();
        var course_completed_year_picker = $("#course_completed_year").val();
        var has_repayments = $("input[name='has_repayments']:checked").val();
        var payment_on_hold = $("#payment_on_hold").val();
        var repayment_completed_year_picker = $("#repayment_completed_year").val();
        var zakaath_amount = $("#zakaath_amount").val();
        var status = $("#status").val();
        var remark = $("#remark").val();

        var dob_split = dob_datepicker.split("/");
        var dob = dob_split[2] + "-" + dob_split[0] + "-" + dob_split[1];
        var application_date_split = application_date_picker.split("/");
        var application_date = application_date_split[2] + "-" + application_date_split[0] + "-" + application_date_split[1];
        var approved_year_split = approved_year_picker.split("/");
        var approved_year = approved_year_split[2] + "-" + approved_year_split[0] + "-" + approved_year_split[1];
        var course_completed_year_split = course_completed_year_picker.split("/");
        var course_completed_year = course_completed_year_split[2] + "-" + course_completed_year_split[0] + "-" + course_completed_year_split[1];
        var repayment_completed_year_split = repayment_completed_year_picker.split("/");
        var repayment_completed_year = repayment_completed_year_split[2] + "-" + repayment_completed_year_split[0] + "-" + repayment_completed_year_split[1];


        if (typeof (has_repayments) == 'undefined') {
            has_repayments = "0";
        }

        var formData = new FormData();
        formData.append("application_date", application_date);
        formData.append("approved_amount", approved_amount);
        formData.append("approved_year", approved_year);
        formData.append("application_type_id", application_type_id);
        formData.append("years_sponsored", years_sponsored);
        formData.append("student_name", student_name);
        formData.append("gender_id", gender_id);

        formData.append("dob", dob);
        formData.append("mobile_no", mobile_no);
        formData.append("email", email);
        formData.append("landline_no", landline_no);
        formData.append("door_no", door_no);
        formData.append("street", street);
        formData.append("address", address);
        formData.append("college_name", college_name);
        formData.append("college_address", college_address);
        formData.append("course_name", course_name);
        formData.append("course_type_id", course_type_id);
        formData.append("course_completed_year", course_completed_year);
        formData.append("has_repayments", has_repayments);
        formData.append("payment_on_hold", payment_on_hold);
        formData.append("repayment_completed_year", repayment_completed_year);
        formData.append("zakaath_amount", zakaath_amount);
        formData.append("status", status);

        formData.append("scanned_copy_of_application", scanned_copy_of_application[0]);
        formData.append("scanned_copy_of_application_name", scanned_copy_of_application_name);
        formData.append("profile_picture", profile_picture[0]);
        formData.append("remark", remark);

        for (var i = 0; i < $("#supporting_documents").get(0).files.length; ++i) {
            formData.append('supporting_documents[]', $("#supporting_documents").get(0).files[i]);
            //console.log($("#supporting_documents").get(0).files[i]);
        }
        var supporting_documentName=[];
        $('.supporting_documentName').each(function(){
            supporting_documentName.push($(this).val());
        });
        formData.append("supporting_documentName",supporting_documentName);
        $.ajax({
            method: "POST",
            url: base_url + "scholarship/add_new_scholarship",
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
                //console.log(obj);
                $(".error-span").html("");
                btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                if (obj.status == "success") {

                    swal.fire({
                        "title": "Success",
                        "text": "New Scholarship has been successfully added!",
                        "type": "success",
                        "confirmButtonClass": "btn btn-secondary"
                    }).then(function () {
                        window.location = base_url + 'scholarship';
                    });
//                    if (obj.profile_image_status == "profile_image_update_failed") {
//                        btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
//                        $("#profile_picture").focus();
//                        $(".profile_picture-error").html("Scanned copy of Application not updated");
//                    } else if (obj.profile_image_status == "none") {
//                        btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
//                        $("#scanned_copy_of_application").focus();
//                        $(".scanned_copy_of_application-error").html("Failed to upload Scanned copy of Application");
//                    }
//                    if (obj.scanned_image_status == "scanned_image_update_failed") {
//                        btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
//                        $("#scanned_copy_of_application").focus();
//                        $(".scanned_copy_of_application-error").html("Scanned copy of Application not updated");
//                    } else if (obj.scanned_image_status == "none") {
//                        btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
//                        $("#scanned_copy_of_application").focus();
//                        $(".scanned_copy_of_application-error").html("Failed to upload Scanned copy of Application");
//                    } else {
//
//
//                    }


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
            $('#application_date').datepicker({
                todayHighlight: true,
                templates: {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                }
            });
            $('#approved_year').datepicker({
                todayHighlight: true,
                templates: {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                }
            });
            $('#dob_datepicker').datepicker({
                todayHighlight: true,
                templates: {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                }
            });
            $('#course_completed_year').datepicker({
                todayHighlight: true,
                templates: {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                }
            });
            $('#repayment_completed_year').datepicker({
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

    $(document).on('click', '#dob_datepicker', function () {
        var val = $('#dob_datepicker').val();
        if (val == "") {
            $('#dob_datepicker').datepicker('setDate', new Date(1990, 00, 01));
        }
    });

    $('#scanned_copy_of_application').on('change', function () {
        $(".scanned_copy-info").html("");
        var files = this.files;
        var div = "scanned_application_preview";
        if (files && files[0]) {
            //readImage(files[0], '#scanned_copy_of_application', div);

            file = files[0];
            element = '#scanned_copy_of_application';
            //alert(files[0].size);
            error = 1;
            file_name = file.name;
            var exts = ['jpg', 'jpeg', 'png', 'svg', 'pdf', 'txt', 'xls', 'xlsx'];
            var get_ext = file_name.split('.');
            get_ext = get_ext.reverse();
            if ($.inArray(get_ext[0].toLowerCase(), exts) == -1) {
                $(element).val('');
                $(".scanned_copy_of_application-error").append('Image format not allowed');
                //console.log($("#" + div).parent().parent().parent().find(".error-span"));
                setTimeout(function () {
                    //$("#" + div).parent().parent().parent().find(".error-span").html('');
                    $(".scanned_copy_of_application-error").html('');
                }, 3000);
                default_src = $('#' + div).attr('default_src');
                $('#' + div).attr('src', default_src);
                error = 0;
            } else if (files[0].size > 5000000) {
                $(".scanned_copy_of_application-error").append('Maximum size 5MB');
                //console.log($("#" + div).parent().parent().parent().find(".error-span"));
                setTimeout(function () {
                    //$("#" + div).parent().parent().parent().find(".error-span").html('');
                    $(".scanned_copy_of_application-error").html('');
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
                        // $("#img_error").append('Image resolution should be higher than 150x150');
                        // $(element).val('');

                        // default_src = $('#' + div).attr('default_src');
                        // $('#' + div).attr('src', default_src);
                        // error = 0;
                        //} else {
                        $('.imagePreview').attr('src', _file.target.result);
                        $('#' + div).attr('style', "background-image: url(" + _file.target.result + ")");
                        $(element).closest('div.form-group').find('.error_msg').text('').slideUp('500');
                        // }
                    }
                }
            }

        }
        if (error.length > 0) {
            $(".scanned_copy_of_application-error").html(error);
        } else {

            $(".scanned_copy-info").html( "1 Scanned Copy selected");
        }
    });

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
        var exts = ['jpg', 'jpeg', 'png'];
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

    $(document).on('change', '#supporting_documents', function () {
        $(".supporting_documents-error").html("");
        $(".supporting_documents-info").html("");
        var form = new FormData();
        var error = [];
        var validExtensions = ['jpg', 'gif', 'png', 'svg', 'doc', 'docx', 'rtf', 'xls', 'xlsx', 'csv', 'pdf', 'ppt', 'pptx', 'txt']; //array of valid extensions
        var doc_count = 0;
        for (var i = 0; i < $('#supporting_documents').get(0).files.length; ++i) {
            form.append('userfiles[]', $('#supporting_documents').get(0).files[i]);
            // console.log($('#supporting_documents').get(0).files[i]);
            var fileName = $('#supporting_documents').get(0).files[i].name;
            var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
            if ($.inArray(fileNameExt, validExtensions) == -1) {

                //($('#supporting_documents').get(0).files).splice(i, 1);
                //return false;
                error.push($('#supporting_documents').get(0).files[i].name + " - Invalid file type<br>");
            } else {
                if ($('#supporting_documents').get(0).files[i].size > 5000000) {
                    error.push($('#supporting_documents').get(0).files[i].name + " - File size exceeds 5MB");
                } else {
                    doc_count++;
                }
            }
        }
        console.log($('#supporting_documents').get(0).files);
        //console.log(error);
        if (error.length > 0) {
            $(".supporting_documents-error").html(error);
        } else {

            $(".supporting_documents-info").html(doc_count + " Document(s) selected");
        }
    });
    $(document).on('keypress', '.validate_amount', function (event) {
        //console.log(event.which);
        //console.log(isNaN(String.fromCharCode(event.which)));
        if (event.which != 8 && isNaN(String.fromCharCode(event.which))) {
            event.preventDefault();
        }
    });

</script>