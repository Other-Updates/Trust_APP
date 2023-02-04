

<div class="kt-grid__item kt-grid__item--fluid kt-app__content"  id="add_receipt_div" ng-app="add_receipt_app" ng-controller="add_receipt_controller" ng-init="pageLoad()" ng-cloak>

    <div class="kt-subheader   kt-grid__item" id="kt_subheader">

        <div class="kt-container  kt-container--fluid ">

            <div class="kt-subheader__main">



                <h3 class="kt-subheader__title">

                    Add Receipt

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

                                        <label>Receipt Date<span class="req">*</span></label>

                                        <div class="input-group">

                                            <input type="text" class="form-control" name="receipt_date" id="receipt_date" placeholder="Select Date">

                                            <div class="input-group-append">

                                                <span class="input-group-text">

                                                    <i class="la la-calendar-check-o"></i>

                                                </span>

                                            </div>

                                        </div>

                                        <span class="form-text text-muted receipt_date-error error-span"></span>

                                    </div>



                                    <div class="col-md-4">

                                        <label>Receipt Type<span class="req">*</span></label>



                                        <select class="form-control" name="receipt_type_id" id="receipt_type_id" ng-change="loadName()" ng-model="receiptTypeVal">

                                            <option value="">Select Type</option>

                                            <option  ng-repeat="(key, receipt_type_data) in receipt_types" value="{{receipt_type_data.id}}">{{receipt_type_data.name}}</option>

                                        </select>

                                        <span class="form-text text-muted receipt_type_id-error error-span"></span>

                                    </div>



                                    <div class="col-md-4">

                                        <label>Name<span class="req">*</span></label>

                                        <select class="form-control" name="name" id="name" placeholder="Enter Name" ng-model="nameVal" ng-change="loadProfileImg()">

                                            <option value="">Select Name</option>

                                            <option  ng-repeat="(key, name_data) in nameOption" value="{{name_data.id}}">{{name_data.name}}</option>



                                        </select>

                                        <span class="form-text text-muted name-error error-span"></span>

                                    </div>

                                    <input type="hidden" id="selected_name" ng-model="nameHidden">
                                    <div class="col-md-4 approved_amount_div" style="display:none">

                                        <label>Approved Amount<span class="req">*</span></label>

                                        <input type="text" class="form-control" readonly name="approved_amount" id="approved_amount" ng-model="approved_amountHidden">

                                        <span class="form-text text-muted error-span"></span>

                                    </div>

                                    <div class="col-md-4">

                                        <label>Amount<span class="req">*</span><span class="total_amount" ng-model="total_amount"></span></label>

                                        <input type="text" class="form-control validate_amount" name="amount" id="amount" placeholder="Enter Amount" ng-model="amount">
                                        <input type="hidden" id="paidamount" class="paidamount" ng-model="paidamount">
                                        <input type="hidden" id="totalamount" class="totalamount" ng-model="totalamount">
                                        <span class="form-text text-muted amount-error error-span"></span>

                                    </div>

                                    <div class="col-md-4" ng-if="showForYearSponsor">

                                        <label>For Year<span class="req">*</span></label>

                                        <select class="form-control" name="for_year" id="for_year" ng-model="SponsorCommitId" ng-change="loadRemarks(SponsorCommitId)">



                                            <option value="">Select Year</option>

                                            <option  ng-repeat="(key, forYearOption_data) in forYearOption" value="{{forYearOption_data.id}}" data-for-year="{{forYearOption_data.for_year}}">{{forYearOption_data.for_year| convertDate}}-{{forYearOption_data.remarks}}</option>



                                        </select>

                                        <span class="form-text text-muted for_year-error error-span"></span>

                                    </div>

                                    <div class="col-md-4" ng-if="showForYearScholarship">

                                        <label>For Year<span class="req">*</span></label>

                                        <select class="form-control" name="for_year" id="for_year_scholar"  ng-model="ScholarYear" ng-change="loadPaidAmount(ScholarYear)">
                                            <option value="">Select Year</option>
                                            <option  ng-repeat="(key, forYearOption_data) in forYearOptionS" value="{{forYearOption_data}}" data-for-year="{{forYearOption_data}}">{{forYearOption_data| convertDate}}</option>
                                        </select>

                                        <span class="form-text text-muted for_year-error error-span"></span>

                                    </div>

                                    <div class="col-md-4" ng-if="showForYear">

                                        <label>For Year<span class="req">*</span></label>

                                        <input type="text" class="form-control for_year" name="for_year" id="for_year_date">



                                        <span class="form-text text-muted for_year-error error-span"></span>

                                    </div>
                                    <div class="col-md-4" ng-if="showRemarks">	
                                        <label>Remarks</label>	
                                        <textarea name="sponsor_remarks" ng-model="sponsorRemarks" id="sponsor_remarks" class="form-control sponsor_remarks" aria-describedby="emailHelp"placeholder="Enter Remark" ></textarea>	
                                        <span class="form-text text-muted sponsor_remarks-error error-span"></span>	
                                    </div>	
                                    <div class="col-md-4" ng-if="showApplicationNo">	
                                        <label>Application Number<span class="req">*</span></label>	
                                        <input type="text" class="form-control" name="application_number" id="application_number" ng-model="application_number" disabled>	
                                        <span class="form-text text-muted application_no-error error-span"></span>	
                                    </div>

                                    <!--<div class="col-md-4">

                                        <label>Cancelled</label>

                                        <div class="kt-radio-inline">

                                            <label class="kt-radio">

                                                <input type="radio" name="cancelled" value="1" ng-click="showCancelled('true')"> Yes

                                                <span></span>

                                            </label>

                                            <label class="kt-radio">

                                                <input type="radio" name="cancelled" value="0" ng-click="showCancelled('false')" checked> No

                                                <span></span>

                                            </label>

                                        </div>

                                        <span class="form-text text-muted cancelled-error error-span"></span>

                                    </div>-->

                                </div>

                            </div>

                            <div class="col-xl-3 col-lg-3 cpl-md-3" style="float:left;">

                                <div class="col-md-12">

                                    <div class="col-md-12">

                                        <label>Profile Image</label>

                                    </div>

                                    <div class="col-md-8">

                                        <div class="kt-avatar" id="kt_user_avatar_2">

                                            <div class="kt-avatar__holder imagePreview kt-avatar__holder-profile-image-large" ng-style="{'background-image': 'url(' + profileImg + ')'}"></div>

                                            <!--                                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change profile image">

                                                                                            <i class="fa fa-pen"></i>

                                                                                            <input type="file" name="profile_image" id="profile_image" accept="">

                                                                                        </label>

                                                                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">

                                                                                            <i class="fa fa-times"></i>

                                                                                        </span>-->

                                        </div>

                                    </div>



                                    <span class="form-text text-muted profile_image-error error-span"></span>

                                </div>

                            </div>

                        </div>



                        <!--<div class="form-group row" ng-if="toggleCancelledDiv">

                            <div class="col-md-3">

                                <label>Cancelled Reason<span class="req">*</span></label>

                                <input type="text" class="form-control" aria-describedby="emailHelp" name="cancelled_reason" id="cancelled_reason" placeholder="Enter Cancelled Reason">

                                <span class="form-text text-muted street-error error-span"></span>

                            </div>

                            <div class="col-md-3">

                                <label>Remark</label>

                                <textarea class="form-control" aria-describedby="emailHelp" name="remark" id="remark" placeholder="Enter Remark"></textarea>

                                <span class="form-text text-muted remark-error error-span"></span>

                            </div>

                        </div>-->

                        <div class="form-group row ">



                            <div class="col-md-12 pt-12">



                                <div class="text-center">

                                    <button type="button" id="submit_add_receipts_form" class="btn btn-brand">Save</button>

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





    var add_receipt_app = angular.module('add_receipt_app', []);

    add_receipt_app.controller('add_receipt_controller', ['$scope', '$http', '$compile', '$location', '$window', '$timeout', function ($scope, $http, $compile, $location, $window, $timeout) {



            $scope.pageLoad = function () {



                profile_img = base_url + "attachments/profile_image/default.png";



                $scope.profileImg = profile_img;

                $scope.loadReceiptType();

                $scope.dob_datepicker = "";

            }





            $scope.loadReceiptType = function () {

                $http.get(base_url + 'receipts/get_receipt_type')

                        .success(function (data) {

                            $scope.receipt_types = data.receipt_type;

                        })

            }



            $scope.loadName = function () {

                var profile_img_url = base_url + "attachments/profile_image/default.png";

                $scope.profileImg = profile_img_url;

                var receipt_type = $scope.receiptTypeVal;
                $(".total_amount").html('');
                        if (receipt_type == "2") {

                            $scope.showForYearSponsor = true;

                            $scope.showForYear = false;
                            $scope.showRemarks = true;	
                            $scope.showApplicationNo = false;
                            $scope.showForYearScholarship = false;

                        } else if (receipt_type == "1" || receipt_type == "3") {

                            $scope.showForYear = true;

                            $scope.showForYearSponsor = false;
                            $scope.showRemarks = true;	
                            $scope.showApplicationNo = false;
                            $scope.sponsorRemarks ='';
                            setTimeout(function () {

                                KTFormWidgetsForYear.init();

                            }, 100);
                            if (receipt_type == "3") {	
                                $scope.showRemarks = false;
                                $scope.showApplicationNo = true;
                                $scope.showForYear = false;
                                $scope.showForYearScholarship = true;	
                            }

                        }  else if (receipt_type == "4") {
                            
                            $scope.showForYearSponsor = false;
                            $scope.showForYear = false;
                            $scope.showRemarks = false;	
                            $scope.showApplicationNo = false;
                            $scope.showForYearScholarship = false;
                            
                        }else {
                            setTimeout(function () {

                            KTFormWidgetsForYear.init();

                            }, 100);
                            $scope.showForYearSponsor = false;
                            $scope.showForYear = true;
                            $scope.showRemarks = false;	
                            $scope.showApplicationNo = false;
                            $scope.showForYearScholarship = false;

                        }

                $http.get(base_url + 'receipts/getNames?id=' + receipt_type).success(function (response) {
                    $scope.nameOption = response.names;
                });	
            }	
            $scope.loadRemarks = function (SponsorCommitId) {	
                $http.get(base_url + 'receipts/getRemarks?id=' + SponsorCommitId).success(function (response) {	
                    $scope.sponsorRemarks =(response.remarks !=null) ? response.remarks : '';
                    $("#paidamount").val((response.paidamount !=null) ? response.paidamount : '0');
                   $(".total_amount").html('('+response.amount+')');
                   $("#totalamount").val((response.amount !=null) ? response.amount : '0');
                   $("#approved_amount").val((response.amount !=null) ? response.amount : '0');
                   $scope.loadPaidAmount(response.for_year);
                });

            }
            $scope.loadPaidAmount = function (ScholarYear) {	
                $http.get(base_url + 'receipts/getScholarPaid?year=' + ScholarYear+'&name=' + $('#selected_name').val()+'&receipt_type_id=' + $('#receipt_type_id').val()).success(function (response) {	
                    $("#paidamount").val((response.paidamount !=null) ? response.paidamount : '0');
                });
            }



            $scope.loadProfileImg = function () {

                var receipt_type = $scope.receiptTypeVal;

                var name = $scope.nameVal;

                $http.get(base_url + 'receipts/getProfileImg?receipt_type_id=' + receipt_type + "&name_id=" + name+ "&receipt_id=" + '').success(function (response) {

                    $("#selected_name").val(response.profile_details[0]['name']);
                    $scope.nameHidden = response.profile_details[0]['name'];
                    if (receipt_type == "3" || receipt_type == "4"){
                            $('#approved_amount').val(response.profile_details[0]['approved_amount']);
                            $(".total_amount").html('('+response.profile_details[0]['approved_amount']+')');
                            $("#totalamount").val((response.profile_details[0]['approved_amount'] !=null) ? response.profile_details[0]['approved_amount'] : '0');
                            $scope.loadPaidAmount();
                    }
                    
                    var profile_img_url = base_url + "attachments/profile_image/default.png";

                    if (response.profile_details[0]['profile_picture'] != "") {

                        if (receipt_type == "1") {

                            profile_img_url = base_url + "attachments/profile_image/" + response.profile_details[0]['profile_picture'];

                        }

                        if (receipt_type == "2" || receipt_type == "5") {

                            profile_img_url = base_url + "attachments/sponsors_profile_image/" + response.profile_details[0]['id'] + "/" + response.profile_details[0]['profile_picture'];

                            var objCommitment = response.sponsor_commitment;

                            if (objCommitment == null) {

                                setTimeout(function () {

                                    KTFormWidgetsForYear.init();

                                }, 100);

                            } else {

                                $scope.forYearOption = objCommitment;

                            }


                        }

                        if (receipt_type == "3" || receipt_type == "4") {
                            
                            profile_img_url = base_url + "attachments/scholar_profile_pictures/" + response.profile_details[0]['id'] + "/" + response.profile_details[0]['profile_picture'];
                            
                        }

                    }



                    $scope.profileImg = profile_img_url;
                    if (receipt_type == "3"){	
                        $('#approved_amount').attr('years_sponsored',response.profile_details[0]['years_sponsored']);
                        $scope.forYearOptionS = response.for_year;
                           $scope.application_number =  response.profile_details[0]['scholarship_id'];
                    }

                });

            }



            $scope.showCancelled = function (value) {

                $scope.toggleCancelledDiv = value;

            }

            $scope.goBack = function () {



                $window.location.href = base_url + "receipts";





            }









            KTFormWidgets.init();

        }]);





    var add_receipt_div = document.getElementById('add_receipt_div');

    //alert(dvSecond);

    angular.element(document).ready(function () {

        angular.bootstrap(add_receipt_div, ['add_receipt_app']);

    });



    add_receipt_app.filter('convertDate', function () {

        return function (dateString) {



            if (dateString != '0000-00-00' && dateString != null) {

                var dateObject = new Date(dateString);

                var date_val = dateObject.getDate() + '/' + (parseInt(dateObject.getMonth()) + 1) + '/' + dateObject.getFullYear();

                return date_val;

            } else {

                return null;

            }

        };

    });



    $('#submit_add_receipts_form').click(function (e) {

        e.preventDefault();
        var btn = $(this);

        var form = $(this).closest('form');

        form.validate({

            rules: {

                receipt_date: {

                    required: true,

                },

                receipt_type_id: {

                    required: true,

                },

                name: {

                    required: true

                },

                amount: {

                    required: true

                },

                for_year: {

                    required: true

                },

                cancelled_reason: {

                    required: true

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
        ;
        btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

        var receipt_date_datepicker = $("#receipt_date").val();

        var receipt_type_id = $("#receipt_type_id").val();

        var name = $("#name").val();
        var remarks = $("#sponsor_remarks").val();

        var amount = $("#amount").val();

        var for_year = "";

        //var cancelled = $("input[name='cancelled']:checked").val();

        //var cancelled_reason = "";

        //var remark = "";

        var selected_name = $('#selected_name').val();



        var commitment_id = "";



        var proceed_action = "1";





        if (receipt_type_id == "2") {

            //for_year = $("#for_year").val();

            //alert($("#for_year").find(':selected').attr("data-for-year"));

            if (typeof ($("#for_year").find(':selected').attr("data-for-year")) != "undefined") {

                for_year = $("#for_year").find(':selected').attr("data-for-year");

                //for_year = $("#for_year").data("for-year");

                commitment_id = $("#for_year").val();

            } else {

                for_year = $("#for_year").val();

                for_year = converToMysqlDate(for_year);

            }



        } else if (receipt_type_id == "1"  || receipt_type_id == "5") {

            for_year = $("#for_year_date").val();

            for_year = converToMysqlDate(for_year);
            
        }
        else if (receipt_type_id == "3") {

            for_year = $("#for_year_scholar").val();
            for_year = converToMysqlDate(for_year);
            
        }
        var receipt_date = converToMysqlDate(receipt_date_datepicker);



        var formData = new FormData();

        formData.append("receipt_date", receipt_date);

        formData.append("receipt_type_id", receipt_type_id);

        formData.append("name", name);

        formData.append("amount", amount);

        formData.append("for_year", for_year);

        formData.append("commitment_id", commitment_id);

        formData.append("remark", remarks);
        if(receipt_type_id == 3)
            var years_sponsored  = $('#approved_amount').attr('years_sponsored');
        else
            var years_sponsored = 0;
        formData.append("approved_amount", years_sponsored * $('#totalamount').val());

        formData.append("paid_amount", $('#paidamount').val());

        //formData.append("cancelled_reason", cancelled_reason);

        //formData.append("remark", remark);

        formData.append("selected_name", selected_name);

        if(receipt_type_id == 1){

            $.ajax({

                method: "POST",

                url: base_url + "receipts/check_payment",

                data: { 'for_year' : for_year , 'receipt_type_id' : receipt_type_id , 'name' : $('#selected_name').val() },

                error: function (data) {

                    console.log(data);

                },
                success: function (data) { 
                    if (data == 'true') {	
                        $(".error-span").html("");	
                        $('#submit_add_receipts_form').removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);    	
                        Swal.fire(	
                            'Warning!',	
                            'Already Payment Made This Year For Subscription',	
                            'error'	
                            );	
                            return false;	
                    }else{
                        add_receipt(formData);
                    }
                }
            });
        }else{
            
            if(receipt_type_id == 2 || receipt_type_id == 3 || receipt_type_id == 4){
                if ((Math.round(amount) > Math.round($('#approved_amount').val()))) {	
                    $(".error-span").html("");	
                    $('#submit_add_receipts_form').removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);    	
                        Swal.fire(	
                            'Warning!',	
                            'Receipt amount exceeds approved amount!',	
                            'error'	
                            );	
                            return false;	
                }
            }
            if(receipt_type_id == 2 || receipt_type_id == 3 || receipt_type_id == 4){
                if(Math.round($('#paidamount').val()) > Math.round($("#totalamount").val()))
                    var paidamount =0;
                else
                    var paidamount = Math.round($("#totalamount").val()) - Math.round($('#paidamount').val());
                if(paidamount == 0){
                    $(".error-span").html("");	
                    $('#submit_add_receipts_form').removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);    	
                        Swal.fire(	
                            'Warning!',	
                            'Cannot Make Rceipt .. Already Made Payment For This Year!',	
                            'error'	
                            );	
                            return false;	
                }
                if(paidamount < Math.round(amount)){
                    $(".error-span").html("");	
                    $('#submit_add_receipts_form').removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);    	
                        Swal.fire(	
                            'Warning!',	
                            'Receipt amount exceeds approved amount!',	
                            'error'	
                            );	
                            return false;	
                }
                if(receipt_type_id == 3 && Math.round($('#paidamount').val()) == 0){
                    if ((Math.round(amount) != Math.round($('#approved_amount').val()))) {	
                        $(".error-span").html("");	
                        $('#submit_add_receipts_form').removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);    	
                            Swal.fire(	
                                'Warning!',	
                                'Receipt amount should be approved amount!',	
                                'error'	
                                );	
                                return false;	
                    }
                }
            }
            
            if (receipt_type_id == "2") {

                var dataString = "commitment_id=" + commitment_id + "&amount=" + amount;

                $.ajax({

                    method: "POST",

                    url: base_url + "receipts/check_commitment_amount",

                    data: dataString,

                    cache: false,

                    error: function (data) {

                        console.log(data);

                    },

                    success: function (data) {

                        var obj = JSON.parse(data);

                        //console.log(obj);

                        $(".error-span").html("");

                        $('#submit_add_receipts_form').removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);

                        if (obj.status == "amount_not_match") {



                            swal.fire({

                                title: "Amount not match with Sponsor commitment",

                                text: "Do You Want to Proceed?",

                                type: "warning",

                                showCancelButton: true,

                                confirmButtonClass: "btn-danger",

                                confirmButtonText: "Yes",

                                closeOnConfirm: false

                            }).then(function (result) {

                                //console.log(result);

                                if (result.value) {

                                    add_receipt(formData);

                                }

                            });

                        } else {

                            add_receipt(formData);

                        }

                    }

                });

            } else {
                add_receipt(formData);
            }
        }
    });



    function add_receipt(formData) {

        $.ajax({

            method: "POST",

            url: base_url + "receipts/add_new_receipt",

            data: formData,

            processData: false,

            contentType: false,

            cache: false,

            error: function (data) {

                console.log(data);

            },

            success: function (data) {

                //console.log(data);

                //return;

                $('#submit_add_receipts_form').removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);

                var obj = JSON.parse(data);

                //console.log(obj);

                $(".error-span").html("");

                if (obj.status == "success") {



                    swal.fire({

                        "title": "Success",

                        "text": "New receipt has been successfully added!",

                        "type": "success",

                        "confirmButtonClass": "btn btn-secondary"

                    }).then(function () {

                        window.location = base_url + 'receipts';

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

    }



    var KTFormWidgets = function () {

        // Private functions

        var initWidgets = function () {

            var date = new Date();

            var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());

            $('#receipt_date').datepicker({

                todayHighlight: true,

                format: 'dd/mm/yyyy',

                templates: {

                    leftArrow: '<i class="la la-angle-left"></i>',

                    rightArrow: '<i class="la la-angle-right"></i>'

                }

            });



            $('#receipt_date').datepicker('setDate', today);



        }

        return {

            // public functions

            init: function () {

                initWidgets();

            }

        };

    }();



    var KTFormWidgetsForYear = function () {

        // Private functions

        var initWidgets = function () {

            //alert("for year");

            var date = new Date();

            var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());

            $('#for_year_date').datepicker({
                todayHighlight: true,
                viewMode: "years",
                minViewMode: "years",
                format: 'dd/mm/yyyy',
                templates: {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                }
            });



            $('#for_year_date').datepicker('setDate', today);



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



    function converToMysqlDate(date_val,type = '') {

       
            var date_split = date_val.split("/");
            var converted_date = date_val;
            if(date_split[2] != undefined)
                var converted_date = date_split[2] + "-" + date_split[1] + "-" + date_split[0];
        
        return converted_date;

    }



    function readImage(file, element) {

        error = 1;

        file_name = file.name;

        var exts = ['jpg', 'jpeg', 'png'];

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

        } else if (file.size > 2000000) {

            $(".profile_image-error").append('Maximum size 2MB');

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