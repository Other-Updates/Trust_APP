<style>

    .lft{text-align:left !important;}

    .rght{text-align:right !important;}

    .tbl-head tr td:last-child{text-align:left !important;}

    .pdf-f{text-align:left !important; float:left;}

    #amount_print{float:right;}

    @media print {

        .kt_header{display:none;}

        .hide-head, .kt-header__brand-logo img, .btn, .kt-footer__menu, .kt-footer__copyright, .kt-header-mobile__logo, .flaticon-more{display:none !important;}

        .hide, .tbl-head{display:block !important; margin-top:-10px;}

        .tbl-head tr td:last-child{text-align:left !important;}

        table{font-size:12px;}
		#footer { position: fixed;  width: 100%; bottom: 30px !important; left: 0;right: 0;text-align:center;font-size:14px; display:block !important; color:#000 !important;}
    }
    @page{size:A4; margin:0.4cm;}
	#footer { display:none;}
</style>

<div class="kt-grid__item kt-grid__item--fluid kt-app__content"  id="edit_receipt_div" ng-app="edit_receipt_app" ng-controller="edit_receipt_controller" ng-init="pageLoad()" ng-cloak>

    <div class="kt-subheader   kt-grid__item hide-head" id="kt_subheader">

        <div class="kt-container  kt-container--fluid ">

            <div class="kt-subheader__main">



                <h3 class="kt-subheader__title">

                    View Receipt

                </h3>



                <span class="kt-subheader__separator kt-subheader__separator--v"></span>

                <!--<span title="Print receipt" class="print_receipt txt-align-right">

                    <i class="kt-nav__link-icon flaticon2-printer print_icon"></i>

                </span>-->



            </div>

            <div class="kt-subheader__toolbar" id="add_btn_div">

                <a class="btn btn-label-brand btn-bold" id="print_receipt_div" ng-click="printDiv()">

                    <i class="flaticon2-printer print_icon"></i>Print

                </a>



                <a class="btn btn-label-brand btn-bold" id="print_receipt">

                    <i class="flaticon2-printer print_icon"></i>Download

                </a>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-xl-12">

            <!--begin:: Widgets/Trends-->

            <div class="kt-portlet kt-portlet--head--noborder kt-portlet--height-fluid">



                <form class="kt-form kt-form--label-right">



                    <div class="kt-portlet__body">



                        <div id="print_div" class="">

                            <div class="hide">

                                <?php

                                $data_header = array();

                                echo $this->load->view('receipts/print_header_view', $data_header, TRUE);

                                ?>

                            </div>



                            <table class="table table-bordered" style="padding: 2px 2px; border:1px solid #ccc;" row-style="page-break-inside:avoid;" width="100%">



                                <tr style="border:1px solid #ccc;">

                                    <td colspan="5" align="center"><b>RECEIPT DETAILS</b></td>

                                </tr>

                                <tr>

                                    <td colspan="2" align="left" class="lft">

                                        <b>Receipt No:</b> <span id="receipt_no_print"></span>

                                    </td>


                                    <td colspan="2" align="right" class="rght">

                                        <b> Receipt Date:</b> <span id="receipt_date_print"><?php echo $receipts[0]['receipt_date']; ?></span>

                                    </td>

                                </tr>

                                <tr align="center" style="background-color:#e6e6ff;">

                                    <td align="center" width="20%"><b>Application Number</b></td>

                                    <td align="center" width="20%"><b>Name</b></td>

                                    <td align="center" width ="20%"><b>Receipt For</b></td>

                                    <td align="center" width ="20%" align="right"><b>For Year</b></td>

                                    <td align="center" width ="20%"><b>Amount</b></td>

                                </tr>

                                <tbody>



                                    <tr>

                                        <td align="left">

                                            <span id="application_number_print"></span>

                                        </td>

                                        <td align="left">

                                            <span id="name_print"></span>

                                        </td>

                                        <td align="center">

                                            <span id="receipt_type_print"></span>

                                        </td>

                                        <td align="center">

                                            <span id="for_year_print"></span>

                                        </td>

                                        <td align="right">

                                            <span id="amount_print"></span>

                                        </td>

                                    </tr>



                                </tbody>

                                <tfoot>



                                    <tr>

                                        <td colspan="5" align="left">

                                            <span class="pdf-f">Remarks : </span>

                                            <span id="remark_print"></span>

                                        </td>

                                    </tr>

                                </tfoot>

                            </table>

                        </div>

                        <!--

                        <div class="row">

                            <div class="col-xl-9 col-lg-9 col-md-9" style="float:left;">

                                <div class="form-group row ">



                                    <div class="col-md-4">

                                        <label>Receipt Date<span class="req">*</span></label>

                                        <div class="input-group">

                                            <input type="text" class="form-control" name="receipt_date" id="receipt_date" placeholder="Select date" ng-model="receiptDate" readonly disabled>

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



                                        <select class="form-control" name="receipt_type_id" id="receipt_type_id" ng-change="loadName()" ng-model="receiptTypeVal" disabled>

                                            <option value="">Select Name</option>

                                            <option  ng-repeat="(key, receipt_type_data) in receipt_types" value="{{receipt_type_data.id}}" ng-selected="{{receipt_type_data.id == receiptTypeHidden}}">{{receipt_type_data.name}}</option>

                                        </select>

                                        <span class="form-text text-muted receipt_type_id-error error-span"></span>

                                        <input type="hidden" id="receipt_type_hidden" ng-model="receiptTypeHidden">

                                    </div>



                                    <div class="col-md-4">

                                        <label>Name<span class="req">*</span></label>

                                        <select class="form-control" name="name" id="name" placeholder="Enter Name" ng-model="nameVal" ng-change="loadProfileImg()" disabled>

                                            <option value="">Select Name</option>

                                            <option  ng-repeat="(key, name_data) in nameOption" value="{{name_data.id}}" ng-selected="{{name_data.id == nameValHidden}}">{{name_data.name}}</option>



                                        </select>

                                        <span class="form-text text-muted name-error error-span"></span>

                                        <input type="hidden" id="name_value" ng-model="nameValHidden">

                                    </div>

                                    <input type="hidden" id="selected_name" ng-model="nameHidden">

                                    <div class="col-md-4">

                                        <label>Amount<span class="req">*</span></label>

                                        <input type="text" class="form-control" name="amount" id="amount" placeholder="Enter Amount" ng-model="amount" readonly>

                                        <span class="form-text text-muted amount-error error-span"></span>

                                    </div>

                                    <div class="col-md-4" ng-if="showForYearSponsor">

                                        <label>For Year<span class="req">*</span></label>

                                        <select class="form-control" name="for_year" id="for_year" ng-selected="{{courseTypeData.id == courseTypeHidden}}" disabled>



                                            <option value="">Select year</option>

                                            <option  ng-repeat="(key, forYearOption_data) in forYearOption" value="{{forYearOption_data.id}}" data-for-year="{{forYearOption_data.for_year}}" ng-selected="{{forYearOption_data.for_year == forYearHidden}}">{{forYearOption_data.for_year| convertDate}}</option>



                                        </select>

                                        <span class="form-text text-muted for_year-error error-span"></span>



                                    </div>

                                    <div class="col-md-4" ng-if="showForYear">

                                        <label>For Year<span class="req">*</span></label>

                                        <input type="text" class="form-control for_year" name="for_year" id="for_year" ng-model="forYear" readonly disabled>



                                        <span class="form-text text-muted for_year-error error-span"></span>

                                    </div>

                                    <input type="hidden" id="for_year_hidden" ng-model="forYearHidden">

                                    <div class="col-md-4">

                                        <label>Cancelled</label>

                                        <div class="kt-radio-inline">

                                            <label class="kt-radio">

                                                <input type="radio" name="cancelled" value="1" ng-click="showCancelled('true')" ng-model="cancelled" disabled> Yes

                                                <span></span>

                                            </label>

                                            <label class="kt-radio">

                                                <input type="radio" name="cancelled" value="0" ng-click="showCancelled('false')" ng-model="cancelled" disabled> No

                                                <span></span>

                                            </label>

                                        </div>

                                        <span class="form-text text-muted cancelled-error error-span"></span>

                                    </div>

                                </div>

                            </div>

                            <div class="col-xl-3 col-lg-3 cpl-md-3" style="float:left;">

                                <div class="col-md-12">

                                    <div class="col-md-12">

                                        <label>Profile image</label>

                                    </div>

                                    <div class="col-md-8">

                                        <div class="kt-avatar" id="kt_user_avatar_2">

                                            <div class="kt-avatar__holder imagePreview kt-avatar__holder-profile-image-large" ng-style="{'background-image': 'url(' + profileImg + ')'}"></div>



                                        </div>

                                    </div>



                                    <span class="form-text text-muted profile_image-error error-span"></span>

                                </div>

                            </div>

                        </div>



                        <div class="form-group row" ng-if="toggleCancelledDiv">

                            <div class="col-md-3">

                                <label>Cancelled Reason<span class="req">*</span></label>

                                <input type="text" class="form-control" aria-describedby="emailHelp" name="cancelled_reason" id="cancelled_reason" placeholder="Enter Cancelled Reason" ng-model="cancelledReason" readonly>

                                <span class="form-text text-muted street-error error-span"></span>

                            </div>

                            <div class="col-md-3">

                                <label>Remark</label>

                                <textarea class="form-control" aria-describedby="emailHelp" name="remark" id="remark" placeholder="Enter Remark" ng-model="cencelledRemark" readonly></textarea>

                                <span class="form-text text-muted remark-error error-span"></span>

                            </div>

                        </div>-->

                        <div class="form-group row ">



                            <div class="col-md-12 pt-12">



                                <div class="text-center">

                                    <!--<button type="button" id="submit_edit_receipts_form" class="btn btn-brand">Save</button>-->

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
<div id="footer"> 
    <p>This is computer generated receipt no signature required</p>
</div>






<script type="text/javascript">





    var edit_receipt_app = angular.module('edit_receipt_app', []);

    edit_receipt_app.controller('edit_receipt_controller', ['$scope', '$http', '$compile', '$location', '$window', '$timeout', function ($scope, $http, $compile, $location, $window, $timeout) {



            $scope.pageLoad = function () {



                var url = $location.absUrl();

                var receipt_id = url.substring(url.lastIndexOf('/') + 1);

                if (receipt_id) {

                    $http.get(base_url + 'receipts/getReceiptData?id=' + receipt_id)

                            .success(function (response) {

                                //console.log(response);

                                $scope.receiptDate = $scope.convertToFormDate(response.receipts[0]['receipt_date']);

                                $scope.receiptTypeHidden = response.receipts[0]['receipt_type_id'];



                                $scope.receiptTypeVal = response.receipts[0]['receipt_type_id'];

                                $scope.amount = response.receipts[0]['amount'];

                                $scope.forYearHidden = response.receipts[0]['for_year'];

                                //console.log(response.users[0]['profile_picture']);

                                $("#receipt_no_print").html(response.receipts[0]['receipt_no']);

                                var receipt_date_print = $scope.convertToFormDate(response.receipts[0]['receipt_date']);

                                $("#receipt_date_print").html(receipt_date_print);

                                // $('#for_year_print').html(response.receipts[0]['for_year']);	
                               var for_year_print = $scope.convertToFormDate(response.receipts[0]['for_year']);	
                                if (response.receipts[0]['for_year'] != "0000-00-00") {	
                                    $('#for_year_print').html(for_year_print);	
                                } else {	
                                    $('#for_year_print').html("-");	
                                }

                                $("#application_number_print").html('-');

                                $('#amount_print').html(formatMoney(response.receipts[0]['amount']));

                                $('#remark_print').html((response.receipts[0]['remarks'] && response.receipts[0]['remarks'] != 'undefined') ? response.receipts[0]['remarks'] : '-');
                                  
                                if (response.receipts[0]['receipt_type_id'] == "1") {

                                    profile_img = base_url + "attachments/profile_image/default.png";

                                    if (response.users[0]['profile_picture'] != "null" && response.users[0]['profile_picture'] != "") {

                                        profile_img = base_url + "attachments/profile_image/" + response.users[0]['profile_picture'];



                                    }

                                    $scope.nameValHidden = response.users[0]['id'];

                                    $scope.nameHidden = response.users[0]['name'];

                                    $("#selected_name").val(response.users[0]['name']);

                                    $scope.forYear = $scope.convertToFormDate(response.receipts[0]['for_year']);

                                    $("#name_print").html(response.users[0]['name']);

                                    var for_year_print = $scope.convertToFormDate(response.receipts[0]['for_year']);

                                    if (response.receipts[0]['for_year'] != "0000-00-00") {

                                        $('#for_year_print').html(for_year_print);

                                    } else {

                                        $('#for_year_print').html("-");

                                    }



                                }

                                //console.log(response.receipts[0]['receipt_type_id']);

                                if (response.receipts[0]['receipt_type_id'] == "2" || response.receipts[0]['receipt_type_id'] == "5") {

                                    profile_img = base_url + "attachments/sponsors_profile_image/default.png";

                                    if (response.sponsor_details[0]['profile_picture'] != "null" && response.sponsor_details[0]['profile_picture'] != "") {

                                        profile_img = base_url + "attachments/sponsors_profile_image/" + response.sponsor_details[0]['id'] + "/" + response.sponsor_details[0]['profile_picture'];

                                    }

                                    $scope.nameValHidden = response.sponsor_details[0]['id'];

                                    $scope.nameHidden = response.sponsor_details[0]['sponsor_name'];

                                    $("#selected_name").val(response.sponsor_details[0]['sponsor_name']);

                                    //alert($scope.nameHidden);



                                    $("#name_print").html(response.sponsor_details[0]['sponsor_name']);

                                }

                                if (response.receipts[0]['receipt_type_id'] == "3" || response.receipts[0]['receipt_type_id'] == "4") {

                                    profile_img = base_url + "attachments/scholar_profile_pictures/default.png";

                                    if (response.scholarship_details[0]['profile_picture'] != "null" && response.scholarship_details[0]['profile_picture'] != "") {

                                        profile_img = base_url + "attachments/scholar_profile_pictures/" + response.scholarship_details[0]['id'] + "/" + response.scholarship_details[0]['profile_picture'];

                                    }

                                    $scope.nameValHidden = response.scholarship_details[0]['id'];

                                    $scope.nameHidden = response.scholarship_details[0]['student_name'];

                                    $("#selected_name").val(response.scholarship_details[0]['student_name']);

                                    //alert($scope.nameHidden);



                                    $scope.forYear = $scope.convertToFormDate(response.receipts[0]['for_year']);

                                    $("#name_print").html(response.scholarship_details[0]['student_name']);

                                    var for_year_print = $scope.convertToFormDate(response.receipts[0]['for_year']);

                                    if (response.receipts[0]['for_year'] != "0000-00-00") {

                                        $('#for_year_print').html(for_year_print);

                                    } else {

                                        $('#for_year_print').html("-");

                                    }



                                }

                                //alert($scope.nameHidden);

                                $scope.loadReceiptType();

                                $scope.dob_datepicker = "";

                                $scope.loadName();

                                if (response.receipts[0]['receipt_type_id'] == "2") {

                                    var objCommitment = response.sponsor_commitments;

                                    if (objCommitment == null) {



                                        $scope.showForYear = true;

                                        $scope.showForYearSponsor = false;



                                        setTimeout(function () {

                                            KTFormWidgetsForYear.init();

                                        }, 100);

                                        $scope.forYear = $scope.convertToFormDate(response.receipts[0]['for_year']);

                                        var for_year_print = $scope.convertToFormDate(response.receipts[0]['for_year']);

                                        if (response.receipts[0]['for_year'] != "0000-00-00") {

                                            $('#for_year_print').html(for_year_print);

                                        } else {

                                            $('#for_year_print').html("-");

                                        }



                                    } else {



                                        $scope.forYearOption = objCommitment;

                                    }

                                }

                                $scope.profileImg = profile_img;

                                $("#profile_img_print").attr('src', profile_img);

                                $scope.cancelled = response.receipts[0]['cancelled'];

                                if (response.receipts[0]['cancelled'] == "1") {

                                    $scope.toggleCancelledDiv = true;

                                    $scope.cancelledReason = response.receipts[0]['cancelled_reason'];

                                    $scope.cencelledRemark = response.receipts[0]['remarks'];

                                }

                                var receipt_type_print = "";

                                if (response.receipts[0]['receipt_type_id'] == "1") {

                                    receipt_type_print = "Subscription";

                                }

                                if (response.receipts[0]['receipt_type_id'] == "2") {

                                    receipt_type_print = "Donation";

                                }

                                if (response.receipts[0]['receipt_type_id'] == "3") {

                                    receipt_type_print = "Scholarship";
                                    $("#application_number_print").html(response.scholarship_details[0]['scholarship_id']);

                                }

                                if (response.receipts[0]['receipt_type_id'] == "4") {

                                    receipt_type_print = "Repayment";

                                }

                                if (response.receipts[0]['receipt_type_id'] == "5") {

                                    receipt_type_print = "Zakaath";

                                }

                                $("#receipt_type_print").html(receipt_type_print);



                                setTimeout(function () {

                                    KTFormWidgets.init();

                                }, 100);

                            });







                }



            }



            $scope.printDiv = function () {

//                var divContents = document.getElementById("print_div").innerHTML;

//                var winPrint = window.open('', '', 'left=0,top=0,width=800,height=600,toolbar=0,scrollbars=0,status=0');

//                winPrint.document.write(divContents);

//                winPrint.document.close();

//                winPrint.focus();

//                winPrint.print();

//                winPrint.close();



                window.print();







//                var divContents = document.getElementById("print_div").innerHTML;

//                var a = window.open('', '', 'height=500, width=500');

//                a.document.write('<html>');

//                a.document.write('<body >');

//                a.document.write(divContents);

//                a.document.write('</body></html>');

//                a.document.close();

//                a.print();

            }



            $scope.convertToFormDate = function (date_val) {



                var dateSplit = date_val.split("-");

                var convertedDate = dateSplit[2] + "/" + dateSplit[1] + "/" + dateSplit[0];

                return convertedDate;

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



                if (receipt_type == "2") {

                    $scope.showForYearSponsor = true;

                    $scope.showForYear = false;

                } else if (receipt_type == "1" || receipt_type == "3") {

                    $scope.showForYear = true;

                    $scope.showForYearSponsor = false;

                    setTimeout(function () {

                        KTFormWidgetsForYear.init();

                    }, 100);

                } else {

                    $scope.showForYearSponsor = false;

                    $scope.showForYear = false;

                }

                //alert(receipt_type);

                $http.get(base_url + 'receipts/getNames?id=' + receipt_type).success(function (response) {

                    //console.log(response);

                    //if (receipt_type == "1") {

                    $scope.nameOption = response.names;

                    //}

                });

            }



            $scope.loadProfileImg = function () {

                var receipt_type = $scope.receiptTypeVal;

                var name = $scope.nameVal;

                $http.get(base_url + 'receipts/getProfileImg?receipt_type_id=' + receipt_type + "&name_id=" + name).success(function (response) {

                    //console.log(response);

                    //alert(response.profile_details[0]['name']);

                    //$scope.nameHidden = response.profile_details[0]['name'];

                    $("#selected_name").val(response.profile_details[0]['name']);

                    var profile_img_url = base_url + "attachments/profile_image/default.png";

                    if (response.profile_details[0]['profile_picture'] != "") {





                        if (receipt_type == "1") {

                            profile_img_url = base_url + "attachments/profile_image/" + response.profile_details[0]['profile_picture'];

                        }

                        if (receipt_type == "2") {

                            profile_img_url = base_url + "attachments/sponsors_profile_image/" + response.profile_details[0]['id'] + "/" + response.profile_details[0]['profile_picture'];

                            console.log(response.sponsor_commitment);

                            var objCommitment = response.sponsor_commitment;

                            if (objCommitment == null) {

                                $scope.showForYear = true;

                                $scope.showForYearSponsor = false;

                                setTimeout(function () {

                                    KTFormWidgetsForYear.init();

                                }, 100);



                            } else {

                                $scope.forYearOption = objCommitment;

                            }

//                            var option = "";

//                            for (x in objCommitment) {

//                                console.log(objCommitment);

//                                option += "<option value='" + objCommitment[x]['id'] + "'>" + objCommitment[x]['for_year'] + "</option>";

//                            }

//

//                            console.log(option);

                            //console.log(objCommitment);



                        }

                        if (receipt_type == "3") {

                            profile_img_url = base_url + "attachments/scholar_profile_pictures/" + response.profile_details[0]['id'] + "/" + response.profile_details[0]['profile_picture'];

                        }

                    }

                    $scope.profileImg = profile_img_url;

                });

            }



            $scope.showCancelled = function (value) {

                $scope.toggleCancelledDiv = value;

            }

            $scope.goBack = function () {

                $window.location.href = base_url + "receipts";

            }





        }]);





    var edit_receipt_div = document.getElementById('edit_receipt_div');

    //alert(dvSecond);

    angular.element(document).ready(function () {

        angular.bootstrap(edit_receipt_div, ['edit_receipt_app']);

    });



    edit_receipt_app.filter('convertDate', function () {

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



            //$('#receipt_date').datepicker('setDate', today);



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

            $('#for_year').datepicker({

                todayHighlight: true,

                format: 'dd/mm/yyyy',

                templates: {

                    leftArrow: '<i class="la la-angle-left"></i>',

                    rightArrow: '<i class="la la-angle-right"></i>'

                }

            });



            //$('#for_year').datepicker('setDate', today);



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



    $('#print_receipt').click(function () {

        var url = window.location.href;

        var receipt_id = url.substring(url.lastIndexOf('/') + 1);

        var link = document.createElement('a');

        $rec_id = $(this).attr('rec_id');

        link.href = base_url + 'receipts/print_receipt/' + receipt_id;

        link.target = '_blank';

        link.click();

    });



    function formatMoney(number, decPlaces, decSep, thouSep) {

        decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,

                decSep = typeof decSep === "undefined" ? "." : decSep;

        thouSep = typeof thouSep === "undefined" ? "," : thouSep;

        var sign = number < 0 ? "-" : "";

        var i = String(parseInt(number = Math.abs(Number(number) || 0).toFixed(decPlaces)));

        var j = (j = i.length) > 3 ? j % 3 : 0;



        return sign +

                (j ? i.substr(0, j) + thouSep : "") +

                i.substr(j).replace(/(\decSep{3})(?=\decSep)/g, "$1" + thouSep) +

                (decPlaces ? decSep + Math.abs(number - i).toFixed(decPlaces).slice(2) : "");

    }





</script>