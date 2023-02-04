<style>
    .kt-datatable__table tbody tr td:nth-child(5){text-align:center;}
    table tr td:nth-child(6){text-align:center;}
    .kt-datatable__table tbody tr td:nth-child(13){text-align:right;}
    table tr td:nth-child(11){text-align:center;}
    table tr td:nth-child(12), table tr td:nth-child(13){text-align:center;}
    table tr td:nth-child(10){text-align:center;}
    .align-items-center{text-align:center;}
   /* table thead tr th:nth-child(1) span {width:50px !important}
    table thead tr th:nth-child(3) span {width:50px !important}
    table thead tr th:nth-child(4) span {width:90px !important}
    table thead tr th:nth-child(5) span {width:70px !important}
    table thead tr th:nth-child(6) span {width:90px !important}
    table thead tr th:nth-child(7) span {width:90px !important}
    table thead tr th:nth-child(8) span {width:70px !important}
    table thead tr th:nth-child(9) span {width:70px !important}
    table thead tr th:nth-child(10) span {width:90px !important}*/

</style>
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"  id="scholarship_div" ng-app="scholarship_app" ng-controller="scholarship_controller" ng-init="loadScholarshipPage()" ng-cloak>
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">

                <h3 class="kt-subheader__title">
                    Scholarships
                </h3>

                <span class="kt-subheader__separator kt-subheader__separator--v"></span>

                <div class="kt-subheader__group" id="kt_subheader_search">
                    <form class="kt-margin-l-20" id="kt_subheader_search_form">
                        <div class="kt-input-icon kt-input-icon--right kt-subheader__search">
                            <input type="text" class="form-control" placeholder="Search..." id="generalSearch">
                            <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                <span>
                                    <i class="flaticon2-magnifier-tool"></i>
                                </span>
                            </span>
                        </div>
                    </form>
                </div>
                &nbsp;

            </div>

            <!--
                        <div class="kt-subheader__main">
                            <h4 class="kt-subheader__title">
                                Last subscription
                            </h4>
                            <div class="kt-subheader__group" id="kt_subheader_search">
                                <form class="" id="kt_subheader_search_form">
                                    <div class="kt-input-icon kt-input-icon--right kt-subheader__search">
                                        <input type="text" class="form-control" placeholder="From date" id="from_date">
                                        <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                            <span>
                                                <i class="flaticon-calendar"></i>
                                            </span>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <div class="kt-subheader__group" id="kt_subheader_search">
                                <form class="kt-margin-l-20" id="kt_subheader_search_form">
                                    <div class="kt-input-icon kt-input-icon--right kt-subheader__search">
                                        <input type="text" class="form-control" placeholder="To date" id="to_date">
                                        <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                            <span>
                                                <i class="flaticon-calendar"></i>
                                            </span>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <div class="kt-subheader__toolbar" >
                                <a class="btn btn-label-brand btn-bold" id="date_search" ng-click='dateSearch()'>
                                    <i class="flaticon2-magnifier-tool"></i></a>
                            </div>
                        </div>-->
            <div class="kt-subheader__toolbar" id="add_btn_div" >
                <div class="dropdown dropdown-inline">
                    <button type="button" class="btn btn-primary btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="la la-download"></i> Export
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="kt-nav">

                            <li class="kt-nav__item" id="current_data_export">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon la la-file-excel-o"></i>
                                    <span class="kt-nav__link-text">Current data</span>
                                </a>
                            </li>
                            <li class="kt-nav__item" id="entire_data_export">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon la la-file-excel-o"></i>
                                    <span class="kt-nav__link-text">Entire data</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <button type="button" class="btn btn-label-brand btn-icon-sm" ng-if="isVisible" ng-click='addScholarship()'>
                    <i class="flaticon2-plus"></i> Add New
                </button>
                <button type="button" class="btn btn-label-brand btn-icon-sm" ng-click="hiddenDiv = !hiddenDiv">
                    <i ng-class="{'flaticon-cancel' : hiddenDiv, 'flaticon-plus' : !hiddenDiv}"></i> Advanced search
                </button>
            </div>



        </div>
        <input type="hidden" id="hasEdit" value="0">
        <input type="hidden" id="hasDelete" value="0">
    </div>

    <div class="kt-portlet kt-portlet--mobile" ng-show="hiddenDiv">


        <div class="kt-portlet__body">
            <!--begin: Search Form -->
            <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                <div class="row ">
                    <div class="col-xl-12 order-2 order-xl-1">
                        <div class="row">
                            <!--<div class="col-md-4">

                                <div class="kt-form__label">
                                    <label>Approved Year </label>
                                </div>
                                <div class="kt-form__control">
                                    <select class="form-control" id="search_approved_year" name="search_approved_year">
                                        <option value="">Select approved year</option>
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
                                    </select>
                                </div>



                            </div>-->
                            <!--<div class="col-md-4">

                                <div class="kt-form__label">
                                    <label>Approved Year to:</label>
                                </div>

                                <div class="input-group">
                                    <input type="text" class="form-control" name="search_approved_year_to" placeholder="Select Approved year to" id="search_approved_year_to" aria-describedby="kt_datepicker-error" aria-invalid="false">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>

                            </div>-->

                            <!--<div class="col-md-4">

                                <div class="kt-form__label">
                                    <label>Repayment completed Year </label>
                                </div>
                                <div class="kt-form__control">
                                    <select class="form-control" id="search_repayment_year" name="search_repayment_year">
                                        <option value="">Select approved year</option>
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
                                    </select>
                                </div>


                            </div>-->




                        </div>
                        <div class="row">
                            <!--
                            <div class="col-md-4">

                                <div class="kt-form__label">
                                    <label>Course completed Year </label>
                                </div>
                                <div class="kt-form__control">
                                    <select class="form-control" id="search_course_completed_year" name="search_course_completed_year">
                                        <option value="">Select approved year</option>
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
                                    </select>
                                </div>


                            </div>-->
                            <!--
                            <div class="col-md-4">

                                <div class="kt-form__label">
                                    <label>Repayment completed year form:</label>
                                </div>

                                <div class="input-group">
                                    <input type="text" class="form-control" name="search_repayment_year_from" placeholder="Select Repayment completed year from" id="search_repayment_year_from" aria-describedby="kt_datepicker-error" aria-invalid="false">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">

                                <div class="kt-form__label">
                                    <label>Repayment completed year to:</label>
                                </div>

                                <div class="input-group">
                                    <input type="text" class="form-control" name="search_repayment_year_to" placeholder="Select Repayment completed year to" id="search_repayment_year_to" aria-describedby="kt_datepicker-error" aria-invalid="false">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>

                            </div>-->

                            <div class="col-md-4">

                                <div class="kt-form__label">
                                    <label>Application Type:</label>
                                </div>
                                <div class="kt-form__control">
                                    <select class="form-control" id="application_type">
                                        <option value="">All</option>
                                        <option  ng-repeat="(key, applicationTypeData) in applicationType" value="{{applicationTypeData.id}}">{{applicationTypeData.name}}</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-4">

                                <div class="kt-form__label">
                                    <label>Payment On Hold:</label>
                                </div>
                                <div class="kt-form__control">
                                    <select class="form-control" id="payment_on_hold">
                                        <option value="">All</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-4">

                                <div class="kt-form__label">
                                    <label>Course Type:</label>
                                </div>
                                <div class="kt-form__control">
                                    <select class="form-control" id="course_type">
                                        <option value="">All</option>
                                        <option  ng-repeat="(key, courseTypeData) in courseType" value="{{courseTypeData.id}}">{{courseTypeData.name}}</option>
                                    </select>
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <!--<div class="col-md-4">

                                <div class="kt-form__label">
                                    <label>Course completed year form:</label>
                                </div>

                                <div class="input-group">
                                    <input type="text" class="form-control" name="search_course_completed_year_from" placeholder="Select Course completed year from" id="search_course_completed_year_from" aria-describedby="kt_datepicker-error" aria-invalid="false">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">

                                <div class="kt-form__label">
                                    <label>Course completed year to:</label>
                                </div>

                                <div class="input-group">
                                    <input type="text" class="form-control" name="search_course_completed_year_to" placeholder="Select Course completed year to" id="search_course_completed_year_to" aria-describedby="kt_datepicker-error" aria-invalid="false">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>

                            </div>-->
                            <div class="col-md-4">

                                <div class="kt-form__label">
                                    <label>Application Date:</label>
                                </div>

                                <div class="input-group">
                                    <input type="text" class="form-control" name="search_application_date" placeholder="Select Application Date" id="search_application_date" aria-describedby="kt_datepicker-error" aria-invalid="false">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>

                            </div>
                             <div class="col-md-4">

                                <div class="kt-form__label">
                                    <label>Approved year:</label>
                                </div>

                                <div class="input-group">
                                    <input type="text" class="form-control" name="search_approved_year" placeholder="Select Approved Year" id="search_approved_year" aria-describedby="kt_datepicker-error" aria-invalid="false">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">

                                <div class="kt-form__label">
                                    <label>Course completed year:</label>
                                </div>

                                <div class="input-group">
                                    <input type="text" class="form-control" name="search_course_completed_year" placeholder="Select Course completed year" id="search_course_completed_year" aria-describedby="kt_datepicker-error" aria-invalid="false">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>

                            </div>



                        </div>

                        <div class="row align-items-center">

                            <div class="col-md-12">

                                <div class="kt-form__label">
                                    <label></label>
                                </div>

                                <div class="kt-subheader__toolbar">
                                    <a class="btn btn-label-brand btn-bold m-l-15" id="advanced_search" ng-click="advancedSearch()">
                                        <i class="flaticon2-magnifier-tool"></i>Search</a>
                                    <a class="btn btn-label-danger btn-bold" id="reload" ng-click='reloadDT()'>
                                        <i class="flaticon2-refresh-button"></i>Clear</a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>		<!--end: Search Form -->
        </div>
        <div class="kt-portlet__body kt-portlet__body--fit">
            <!--begin: Datatable -->
            <div class="kt-datatable" id="ajax_data"></div>
            <!--end: Datatable -->
        </div>
    </div>



    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" >
        <div class="kt-portlet kt-portlet--mobile">
            <!--<div class="kt-portlet__body">

                <div class="kt-form kt-form--label-right">
                    <div class="row align-items-center">
                        <div class="col-xl-8 order-2 order-xl-1">

                            <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                <div class="kt-input-icon kt-input-icon--left">
                                    <input type="text" class="form-control" placeholder="Search..." id="generalSearch">
                                    <span class="kt-input-icon__icon kt-input-icon__icon--left">
                                        <span><i class="la la-search"></i></span>
                                    </span>
                                </div>
                            </div>


                        </div>
                        <div class="col-xl-4 order-1 order-xl-2 kt-align-right">
                            <a href="#" class="btn btn-default kt-hidden">
                                <i class="la la-cart-plus"></i> New Order
                            </a>
                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg d-xl-none"></div>
                        </div>
                    </div>
                </div>
            </div>-->
            <div class="kt-portlet__body kt-portlet__body--fit">
                <!--begin: Datatable -->
                <div class="scholarship-datatable" id="ajax_data"></div>
                <!--end: Datatable -->
            </div>
        </div>	</div>
    <!-- end:: Content -->
</div>

<div class="modal fade" id="profile_img_popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Profile Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body ">
                <img class="popup_profile_img" src="<?php echo base_url(); ?>attachments/scholar_profile_pictures/default.png" style="width:465px;height:auto;">
            </div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>-->
        </div>
    </div>
</div>
<div id="export_excel"></div>
<script>
    var scholarship_app = angular.module('scholarship_app', []);
    scholarship_app.controller('scholarship_controller', ['$scope', '$http', '$compile', '$location', '$window', function ($scope, $http, $compile, $location, $window) {

            $scope.loadScholarshipPage = function () {

                $http.get(base_url + 'users/getPermissions')
                        .success(function (response) {
                            //console.log(response);
                            var modules_permission = response.modules;
                            $scope.isVisible = "false";
                            if (modules_permission['scholarship']) {
                                if (modules_permission['scholarship']['scholarship']) {
                                    if (modules_permission['scholarship']['scholarship']['add'] == "1") {
                                        // alert("masters");
                                        $scope.isVisible = "true";
                                        // The == and != operators consider null equal to only null or undefined
                                    }
                                    if (modules_permission['scholarship']['scholarship']['edit'] == "1") {
                                        // alert("masters");
                                        $("#hasEdit").val("1");
                                        // The == and != operators consider null equal to only null or undefined
                                    }
                                    if (modules_permission['scholarship']['scholarship']['delete'] == "1") {
                                        // alert("masters");
                                        $("#hasDelete").val("1");
                                        // The == and != operators consider null equal to only null or undefined
                                    }
                                    scholarshipDataTable.init();
                                    KTFormWidgets.init();
                                } else {
                                    $window.location.href = base_url + "dashboard";
                                }
                            } else {
                                $window.location.href = base_url + "dashboard";
                            }


                        })

                $scope.loadApplicationType();
                $scope.loadCourseType();
            };

            $scope.loadApplicationType = function () {
                $http.get(base_url + 'scholarship/get_application_type')
                        .success(function (data) {
                            //console.log(data);
                            $scope.applicationType = data.application_type;
                        })
            }

            $scope.loadCourseType = function () {
                $http.get(base_url + 'scholarship/get_course_type')
                        .success(function (data) {

                            $scope.courseType = data.course_type;
                        })
            }

            $scope.addScholarship = function () {
                $window.location.href = base_url + "scholarship/add";
            }

            $scope.toggleAdvancedSearch = function () {

            }

            //demo();




        }]);
    var scholarship_div = document.getElementById('scholarship_div');
    //alert(dvSecond);
    angular.element(document).ready(function () {
        angular.bootstrap(scholarship_div, ['scholarship_app']);

    });



    var scholarshipDataTable = function () {
        // Private functions

        // basic demo
        var demo = function () {

            var form_date = $("#from_date").val();
            var to_date = $("#to_date").val();
            var fromDate = "";
            if (form_date) {
                fromDate = convertDate(form_date);
            }
            var toDate = "";
            if (to_date) {
                toDate = convertDate(to_date);
            }
            // alert("datatable");

            var datatable = $('.scholarship-datatable').KTDatatable({
                // datasource definition
                data: {
                    type: 'remote',
                    method: 'POST',
                    source: {
                        read: {
                            //url: 'https://keenthemes.com/metronic/tools/preview/inc/api/datatables/demos/default.php',
                            url: base_url + 'scholarship/getScholarships',
                            map: function (raw) {
                                var indexNumber = 0;
                                if (typeof raw.data !== 'undefined') {
                                    var dataSet = raw.data;

                                    $.each(dataSet, function (key, value) {
                                        dataSet[key].indexNumber = parseInt(key) + 1;
                                    });
                                }
                                return dataSet;
                            },
                        },
                    },
                    pageSize: 10,
                    serverPaging: false,
                    serverFiltering: true,
                    serverSorting: false,
                    saveState: {
                        cookie: true,
                        webstorage: true,
                    },
                },
                // layout definition
                layout: {
                    scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
                    footer: false, // display/hide footer
                    spinner: false,
                },
                // column sorting
                sortable: true,
                pagination: true,
                search: {
                    input: $('#generalSearch'),
                },
                // columns definition
                columns: [
                    {
                        field: 'indexNumber',
                        title: '#',
                        sortable: 'asc',
                        width: 50,
                        type: 'number',
                        selector: false,
                        textAlign: 'center',
                        template: function (row) {
                            return '<span class="">' + row.indexNumber + '</span>';
                        },
                    }, {
                        field: 'student_name',
                        title: 'Student Name',
                        template: function (row) {
                            //console.log(row);

                            return '<span class="bold-name txt-tf-caps ">' + row.student_name + '</span>';
                        },
                    },
                    {
                        field: 'profile_picture',
                        title: 'Profile',
                        width: 50,
                        class:'noExl',
                        template: function (row) {
                            //console.log(row);

                            var profile_img = "default.png";
                            if (row.profile_picture != "") {
                                profile_img = row.scholarship_primary_id + "/" + row.profile_picture;
                            }

                            var name = profile_img.substr(0, (profile_img.lastIndexOf('.')));
                            //console.log(name);
                            var extension = profile_img.substr((profile_img.lastIndexOf('.') + 1));
                            //console.log(extension);

                            var thumb_img = name + "_thumb" + "." + extension;
                            //alert("template");
                            //console.log(row);
                            return '<img class="kt-badge profile_img_popup pointer-div" title="Click to view" src="' + base_url + "attachments/scholar_profile_pictures/thumb/" + thumb_img + '"  style="width:30px;height:30px;" data-toggle="modal" data-target="#profile_img_popup" data-id="' + row.scholarship_primary_id + '" data-link="' + base_url + "attachments/scholar_profile_pictures/" + profile_img + '">';
                        },
                    }, {
                        field: 'application_date',
                        title: 'Application Date',
                        width: 90,
                        template: function (row) {
                            //console.log(row);
                            var application_dateGet = row.application_date;
                            var application_date = "-";
                            if (application_dateGet != '0000-00-00' && application_dateGet != "") {
                                var application_dateSplit = application_dateGet.split("-");
                                var application_date = application_dateSplit[2] + "/" + application_dateSplit[1] + "/" + application_dateSplit[0];
                            }

                            return  application_date;
                        },
                    }, {
                        field: 'approved_year',
                        title: 'Approved Date',
                        width: 90,
                        template: function (row) {
                            //console.log(row);
                            var approved_yearGet = row.approved_year;
                            var approved_year = "-";
                            if (approved_yearGet != '0000-00-00' && approved_yearGet != "") {
                                var approved_yearSplit = approved_yearGet.split("-");
                                var approved_year = approved_yearSplit[2] + "/" + approved_yearSplit[1] + "/" + approved_yearSplit[0];
                            }

                            return  approved_year;
                        },
                    },
                    {	
                        field: 'approved_amount',	
                        title: 'Approved Amount',	
                        width: 90,	
                    },
                    {
                        field: 'application_type_name',
                        title: 'Application Type',
                        width: 90,
                    },
                    {	
                        field: 'years_sponsored',	
                        title: 'Years Sponsered',	
                        visible:false,	
                        width: 90,	
                    },
                     {
                        field: 'course_completed_year',
                        title: 'Course Completed Year',
                        width: 90,
                        template: function (row) {
                            //console.log(row);
                            var course_completed_yearGet = row.course_completed_year;
                            var course_completed_year = "-";
                            if (course_completed_yearGet != '0000-00-00' && course_completed_yearGet != "") {
                                var course_completed_yearSplit = course_completed_yearGet.split("-");
                                var course_completed_year = course_completed_yearSplit[2] + "/" + course_completed_yearSplit[1] + "/" + course_completed_yearSplit[0];
                            }

                            return  course_completed_year;
                        },
                    }, {
                        field: 'course_type_name',
                        title: 'Course Type',
                        width: 70,
                    },
                    {
                        field: 'payment_on_hold',
                        title: 'Payment On Hold',
                        width: 70,
                        template: function (row) {
                            //console.log(row);
                            var payment_hold = "0";
                            if (row.payment_on_hold == "1") {
                                payment_hold = "1";
                            }
                            var status = {
                                1: {'title': 'Yes', 'class': 'btn-label-success'},
                                0: {'title': 'No', 'class': 'btn-label-danger'},
                            };
                            return '<span class="btn btn-bold btn-sm btn-font-sm ' + status[payment_hold].class + '">' + status[payment_hold].title + '</span>';
                        },
                    },
                    {
                        field: 'Actions',
                        title: 'Actions',
                        sortable: false,
                        width: 90,
                        overflow: 'visible',
                        autoHide: false,
                        class:'noExl',
                        template: function (row) {

                            var hasEdit = $("#hasEdit").val();
                            var hasDelete = $("#hasDelete").val();
                            var action = '\
                                                \
                                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md scholarship_view" data-id="' + row.scholarship_primary_id + '" title="View details">\
                                                        <i class="kt-nav__link-icon flaticon-eye"></i>\
                                                </a>\
                                        ';

                            if (hasEdit == "1") {
                                action += '\
                                                \
                                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md scholarship_edit" data-id="' + row.scholarship_primary_id + '" title="Edit details">\
                                                        <i class="kt-nav__link-icon flaticon2-contract"></i>\
                                                </a>\
                                        ';
                            }

                            return action;
                        },
                    }],
            });

            $('#kt_form_status').on('change', function () {
                datatable.search($(this).val().toLowerCase(), 'Status');
            });

            $('#kt_form_type').on('change', function () {
                datatable.search($(this).val().toLowerCase(), 'Type');
            });

            $('#generalSearch').on('keyup', function () {
                var val = $(this).val().toLowerCase();
                var value = {
                    generalSearch: val,
                }
                datatable.setDataSourceParam('query', value);
                datatable.load();
            });

            $('#reload').on('click', function () {
                $("#search_approved_year_from").val("");
                $("#search_approved_year_to").val("");
                $("#application_type").val("");
                $("#search_repayment_year_from").val("");
                $("#search_repayment_year_to").val("");
                $("#payment_on_hold").val("");
                $("#search_course_completed_year_from").val("");
                $("#search_course_completed_year_to").val("");
                $("#course_type").val("");
                $("#search_application_date").val("");	
                $("#search_approved_year").val("");	
                $("#search_course_completed_year").val("");
                var value = {
                    generalSearch: "",
                }
                datatable.setDataSourceParam('query', value);
                datatable.load();
            });

            $('#date_search').on('click', function () {
                var form_date = $("#from_date").val();
                var to_date = $("#to_date").val();
                var fromDate = "";
                if (form_date) {
                    fromDate = convertDate(form_date);
                }
                var toDate = "";
                if (to_date) {
                    toDate = convertDate(to_date);
                }
                var value = {
                    fromDate: fromDate,
                    toDate: toDate,
                }
                datatable.setDataSourceParam('query', value);
                datatable.load();
            });

            //$('#kt_form_status,#kt_form_type').selectpicker();

            $(document).on('click', '.scholarship_delete', function () {
                // var member_type_id = $(this).attr("data-id");
                //window.location.href = base_url + "users/user_types/delete/" + member_type_id;

                id = $(this).attr('data-id');
                //alert(id);

                swal.fire({
                    title: "Are you sure?",
                    text: "Do You Want to Delete This Data?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                }).then(function (result) {
                    if (result.value) {

                        $.ajax({
                            url: base_url + 'scholarship/delete',
                            method: "POST",
                            data: {id: id},
                            success: function (data) {
                                // console.log(data);
                                if (data == '1') {
                                    swal.fire(
                                            'Deleted!',
                                            'Your file has been deleted.',
                                            'success'
                                            ).then(function () {
                                        //window.location = base_url + 'members';
                                        datatable.reload();
                                    });

                                }
                            }
                        });

                    }
                });

            });

            $(document).on('click', '#advanced_search', function () {
//                var search_approved_year_from = $("#search_approved_year_from").val();
//                var search_approved_year_to = $("#search_approved_year_to").val();
//                var search_repayment_year_from = $("#search_repayment_year_from").val();
//                var search_repayment_year_to = $("#search_repayment_year_to").val();
//                var search_course_completed_year_from = $("#search_course_completed_year_from").val();
//                var search_course_completed_year_to = $("#search_course_completed_year_to").val();
                var search_approved_year = $("#search_approved_year").val();
                var search_repayment_year = $("#search_repayment_year").val();
                var search_course_completed_year = $("#search_course_completed_year").val();
                var search_application_date = $("#search_application_date").val();
                var application_type = $("#application_type").val();
                var payment_on_hold = $("#payment_on_hold").val();
                var course_type = $("#course_type").val();
                var generalSearch = $("#generalSearch").val();

                var approvedYear = "";	
                if (search_approved_year) {	
                    approvedYear = (search_approved_year);	
                }


                var repaymentYear = search_repayment_year;


                var courseCompletedYear = "";	
                if (search_course_completed_year) {	
                    courseCompletedYear = (search_course_completed_year);	
                }	
                var applicationDate = "";	
                if (search_application_date) {	
                    applicationDate = convertDate(search_application_date);	
                }


//                var approvedYearFrom = "";
//                if (search_approved_year_from) {
//                    approvedYearFrom = convertDate(search_approved_year_from);
//                }
//                var approvedYearTo = "";
//                if (search_approved_year_to) {
//                    approvedYearTo = convertDate(search_approved_year_to);
//                }
//                var repaymentYearFrom = "";
//                if (search_repayment_year_from) {
//                    repaymentYearFrom = convertDate(search_repayment_year_from);
//                }
//
//                var repaymentYearTo = "";
//                if (search_repayment_year_to) {
//                    repaymentYearTo = convertDate(search_repayment_year_to);
//                }
//
//                var courseCompletedYearFrom = "";
//                if (search_course_completed_year_from) {
//                    courseCompletedYearFrom = convertDate(search_course_completed_year_from);
//                }
//                var courseCompletedYearTo = "";
//                if (search_course_completed_year_to) {
//                    courseCompletedYearTo = convertDate(search_course_completed_year_to);
//                }
                var value = {
//                    approvedYearFrom: approvedYearFrom,
//                    approvedYearTo: approvedYearTo,
//                    repaymentYearFrom: repaymentYearFrom,
//                    repaymentYearTo: repaymentYearTo,
//                    courseCompletedYearFrom: courseCompletedYearFrom,
//                    courseCompletedYearTo: courseCompletedYearTo,
                    approvedYear: approvedYear,
                    repaymentYear: repaymentYear,
                    courseCompletedYear: courseCompletedYear,
                    courseCompletedYear: courseCompletedYear,	
                    applicationDate: applicationDate,
                    application_type: application_type,
                    payment_on_hold: payment_on_hold,
                    course_type: course_type,
                    generalSearch: generalSearch
                }
                datatable.setDataSourceParam('query', value);
                datatable.load();
            });

            $(document).on('click', '.profile_img_popup', function () {
                var id = $(this).attr('data-id');
                var src = $(this).attr("data-link");
                $(".popup_profile_img").attr("src", src);
                //alert(id);
//                $.ajax({
//                    url: base_url + 'scholarship/getProfile_image',
//                    method: "POST",
//                    data: {id: id},
//                    success: function (data) {
//                        console.log(data);
//                        var obj = JSON.parse(data);
//                        console.log(obj);
//                        if (obj['has_img'] == '1') {
//                            //alert("yes");
//                            if (obj['name'][0]['profile_picture'] != "") {
//                                $(".popup_profile_img").attr("src", base_url + "attachments/scholar_profile_pictures/" + id + "/" + obj['name'][0]['profile_picture']);
//                            } else {
//                                $(".popup_profile_img").attr("src", base_url + "attachments/scholar_profile_pictures/default.png");
//                            }
//                        } else {
//                            $(".popup_profile_img").attr("src", base_url + "attachments/scholar_profile_pictures/default.png");
//                        }
//                    }
//                });

            });


        };

        return {
            // public functions
            init: function () {
                demo();
            },
            reload: function () {
                demo();
            }
        };
    }();

    function convertDate(dateVal) {
        var split_date = dateVal.split("/");
        var converted_date = split_date[2] + "-" + split_date[1] + "-" + split_date[0];
        return converted_date;
    }



    var KTFormWidgets = function () {
        // Private functions
        var initWidgets = function () {
            $('#search_approved_year_from').datepicker({
                todayHighlight: true,
                format: 'dd/mm/yyyy',
                templates: {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                }
            });
            $('#search_approved_year_to').datepicker({
                todayHighlight: true,
                format: 'dd/mm/yyyy',
                templates: {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                }
            });
            $('#search_repayment_year_from').datepicker({
                todayHighlight: true,
                format: 'dd/mm/yyyy',
                templates: {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                }
            });
            $('#search_repayment_year_to').datepicker({
                todayHighlight: true,
                format: 'dd/mm/yyyy',
                templates: {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                }
            });
            $('#search_course_completed_year_from').datepicker({
                todayHighlight: true,
                format: 'dd/mm/yyyy',
                templates: {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                }
            });
            $('#search_course_completed_year_to').datepicker({
                todayHighlight: true,
                format: 'dd/mm/yyyy',
                templates: {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                }
            });
            $('#search_application_date').datepicker({	
                todayHighlight: true,
                format:'dd/mm/yyyy',	
                templates: {	
                    leftArrow: '<i class="la la-angle-left"></i>',	
                    rightArrow: '<i class="la la-angle-right"></i>'	
                }	
            });	
            $('#search_approved_year').datepicker({	
                todayHighlight: true,
                viewMode: "years",
                minViewMode: "years",
                format: 'yyyy',
                templates: {	
                    leftArrow: '<i class="la la-angle-left"></i>',	
                    rightArrow: '<i class="la la-angle-right"></i>'	
                }	
            });	
            $('#search_course_completed_year').datepicker({	
                todayHighlight: true,
                viewMode: "years",
                minViewMode: "years",
                format: 'yyyy',	
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


    $(document).on('click', '.scholarship_edit', function () {
        var scholarship_id = $(this).attr("data-id");
        window.location.href = base_url + "scholarship/edit/" + scholarship_id;
    });
    $(document).on('click', '.scholarship_view', function () {
        var scholarship_id = $(this).attr("data-id");
        window.location.href = base_url + "scholarship/view/" + scholarship_id;
    });


    $(document).on('click', '.view_position_history', function () {
        var member_id = $(this).attr("data-id");
        window.location.href = base_url + "members/position_history/" + member_id;
    });

</script>


<script>
    var jq = $.noConflict();
    jq(document).on('click', '#current_data_export', function () {
        fnExcelReport2();
    });



    function fnExcelReport2() {
        //alert("export");
        var tab_text = "<table id='custom_export' border='5px'><tr width='100px' bgcolor='#87AFC6'>";
        var textRange;
        var j = 0;
        tab = document.getElementsByClassName("kt-datatable__table")[0];// id of table
        //tab = $('table .kt-datatable__table'); // id of table
        console.log(tab);
        for (j = 0; j < tab.rows.length; j++)
        {
            tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
            //tab_text=tab_text+"</tr>";
        }
        tab_text = tab_text + "</table>";
        tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
        tab_text = tab_text.replace(/<img[^>]*>/gi, ""); // remove if u want images in your table
        tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params
        jq('#export_excel').show();
        jq('#export_excel').html('').html(tab_text);
        jq('#export_excel').hide();

        //alert("excel fn");

        jq("#custom_export").table2excel({
            exclude: ".noExl",
            name: "Scholarship Report",
            filename: "Scholarship-details",
            fileext: ".xls",
            exclude_img: false,
            exclude_links: false,
            exclude_inputs: false
        });


    }

    jq(document).on('click', '#entire_data_export', function () {
        var application_type = $("#application_type").val();
        var payment_on_hold = $("#payment_on_hold").val();
        var course_type = $("#course_type").val();
        var application_date = $("#search_application_date").val();	
        var course_completed_year = $("#search_course_completed_year").val();	
        var approved_year = $("#search_approved_year").val();	
        var approvedYear = "";	
        if (approved_year) {	
            approvedYear = (approved_year);	
        }	
        var courseCompletedYear = "";	
        if (course_completed_year) {	
            courseCompletedYear = (course_completed_year);	
        }	
        var applicationDate = "";	
        if (application_date) {	
            applicationDate = convertDate(application_date);	
        }
        var arr = [];
        arr.push({'searchString': jq('#generalSearch').val()});
        arr.push({'application_type': application_type});
        arr.push({'payment_on_hold': payment_on_hold});
        arr.push({'course_type': course_type});
        arr.push({'application_date': applicationDate});	
        arr.push({'course_completed_year': courseCompletedYear});	
        arr.push({'approved_year': approvedYear});
        var arrStr = JSON.stringify(arr);

        window.location.replace(base_url + 'scholarship/scholarship_report?search=' + arrStr);
    });
</script>