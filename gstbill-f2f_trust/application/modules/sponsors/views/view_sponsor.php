<style>
    .commit-btn{float:right;}
    #commitmentEntryDiv{border: 1px solid #f3f3f3; padding: 10px;margin-top:5px; background: #f3f3f3;border-radius: 4px;}
    </style>
    <div class="kt-grid__item kt-grid__item--fluid kt-app__content"  id="edit_sponsor_div" ng-app="edit_sponsor_app" ng-controller="edit_sponsor_controller" ng-init="pageLoad()" ng-cloak>
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">

                <h3 class="kt-subheader__title">
                    View Details of &nbsp;<span class="capitalize">{{sponsorName}}</span>
                </h3>

                <span class="kt-subheader__separator kt-subheader__separator--v"></span>


            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <!--begin:: Widgets/Trends-->
            <div class="kt-portlet kt-portlet--head--noborder kt-portlet--height-fluid">

                <form id="edit_sponsor_form" class="kt-form kt-form--label-right">
                    <div class="kt-portlet__body">
                        <div class="row">
                            <div class="col-xl-9 col-lg-9 col-md-9" style="float:left;">
                                <div class="form-group row ">

                                    <div class="col-md-4">
                                        <label>Sponsor Name<span class="req">*</span></label>
                                        <input type="text" class="form-control" aria-describedby="emailHelp" name="sponsor_name" id="sponsor_name" placeholder="Enter Sponsor Name" ng-model="sponsorName" disabled>
                                        <span class="form-text text-muted sponsor_name-error error-span"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Gender<span class="req">*</span></label>

                                        <select class="form-control" name="gender_id" id="gender_id" ng-model="genderID" disabled>
                                            <option value="">Select Gender</option>
                                            <option  ng-repeat="(key, genderData) in genderValues" value="{{genderData.id}}" ng-selected="{{genderData.id == genderHidden}}">{{genderData.name}}</option>
                                        </select>
                                        <span class="form-text text-muted gender_id-error error-span"></span>
                                        <input type="hidden" ng-model="genderHidden">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Door No<span class="req">*</span></label>
                                        <input type="text" class="form-control" aria-describedby="emailHelp" name="door_no" id="door_no" placeholder="Enter Door No" ng-model="doorNo" disabled>
                                        <span class="form-text text-muted door_no-error error-span"></span>
                                    </div>


                                    <div class="col-md-4">
                                        <label>Street<span class="req">*</span></label>
                                       <!-- <input type="text" class="form-control" aria-describedby="emailHelp" name="street" id="street" placeholder="Enter Street" ng-model="streetName" disabled>-->
                                        <select class="form-control" name="street" id="street" disabled>
                                            <option value="">Select Street</option>
                                            <option  ng-repeat="(key, street) in streets" value="{{street.id}}" ng-selected="{{street.id == streetHidden}}">{{street.name}}</option>
                                        </select>
                                        <span class="form-text text-muted street-error error-span"></span>
                                        <input type="hidden" ng-model="streetHidden">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Address<span class="req">*</span></label>
                                        <textarea class="form-control" aria-describedby="emailHelp" name="address" id="address" placeholder="Enter Address" ng-model="addressVal" disabled></textarea>
                                        <span class="form-text text-muted address-error error-span"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Residing Country<span class="req">*</span></label>

                                        <select class="form-control" name="residing_country" id="residing_country" ng-model="residingCountry" disabled>
                                            <option value="">Select Country</option>
                                            <option  ng-repeat="(key, countryData) in country" value="{{countryData.id}}" ng-selected="{{countryData.id == countryHidden}}">{{countryData.countries_name}}</option>
                                        </select>
                                        <span class="form-text text-muted residing_country-error error-span"></span>
                                        <input type="hidden" ng-model="countryHidden">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 cpl-md-3" style="float:left;">
                                <div class="col-md-12">
                                    <div class="col-md-8">
                                        <label>Profile Picture<span class="req">*</span></label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_2">
                                            <div class="kt-avatar__holder imagePreview kt-avatar__holder-profile-image-large" id="profile_picture_preview" ng-style="{'background-image': 'url(' + profilePicture + ')'}"></div>

                                        </div>
                                    </div>
                                    <input type="hidden" id="profile_image_data" ng-value="profileImgData">
                                    <span class="form-text text-muted profile_picture-error error-span"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="col-md-3">

                                <label>Landline Number</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="landline_no" id="landline_no" placeholder="Enter Landline Number" ng-model="landlineNo" disabled>
                                <span class="form-text text-muted landline_no-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Email ID<span class="req">*</span></label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="email" id="email" placeholder="Enter Email ID" ng-model="emailId" disabled>
                                <span class="form-text text-muted email-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Mobile Number<span class="req">*</span></label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="mobile_no" id="mobile_no" placeholder="Enter Mobile Number" ng-model="mobileNo" disabled>
                                <span class="form-text text-muted mobile_no-error error-span"></span>
                            </div>

                            <!--<div class="col-md-3">

                                <label>Commitment</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="commitment" id="commitment" placeholder="Enter Commitment" ng-model="commitment">
                                <span class="form-text text-muted commitment-error error-span"></span>
                            </div>-->
                            <!--<div class="col-md-3">
                                <label>For year<span class="req">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="for_year" placeholder="Select date" id="for_year" aria-describedby="kt_datepicker-error" aria-invalid="false" ng-model="forYear">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="form-text text-muted for_year-error error-span"></span>
                            </div>-->
                            <!-- <div class="col-md-3">
                                 <label>Paid</label>
                                 <div class="kt-radio-inline">
                                     <label class="kt-radio">
                                         <input type="radio" name="paid" value="1" ng-model="paid"> Yes
                                         <span></span>
                                     </label>
                                     <label class="kt-radio">
                                         <input type="radio" name="paid" value="0" ng-model="paid" checked> No
                                         <span></span>
                                     </label>
                                 </div>
                                 <span class="form-text text-muted paid-error error-span"></span>
                             </div>

                             <div class="col-md-3">

                                 <label>Total Commitment Amount<span class="req">*</span></label>
                                 <input type="text" class="form-control" aria-describedby="emailHelp" name="amount" id="amount" placeholder="Enter Amount" ng-model="amount">
                                 <span class="form-text text-muted amount-error error-span"></span>
                             </div>-->
                            <!--<div class="col-md-3">
                                <label>Status<span class="req">*</span></label>

                                <select class="form-control" id="status" name="status"  ng-model="statusVal" disabled>
                                    <option value="1">Active</option>
                                    <option value="0">In Active</option>
                                </select>
                                <span class="form-text text-muted status-error error-span"></span>
                            </div>-->


                        </div>

                        <div class="form-group row " style="margin-top:11px;">

                            <div class="col-md-9">
                                <label style="margin-top:11px;">Sponsorship Commitments</label>
                            </div>


                        </div>

                        <div id="commitmentEntryDiv">

                            <div class="form-group row" ng-repeat="(key, sponsorCommitmentsData) in sponsorCommitments">
                                <div class="col-md-2">
                                    <label>For Year<span class="req">*</span></label>
                                    <input type="text" class="form-control for_year for_year_commitment_update{{$index + 1}}" aria-describedby="emailHelp" id="for_year_commitment" name="for_year_commitment" placeholder="Select Year" value="{{sponsorCommitmentsData.for_year| convertDate}}" disabled>
                                    <!--<select class="form-control for_year_commitment_update{{$index + 1}}" id="for_year_commitment" name="for_year_commitment"  >
                                        <option value="">Select year</option>
                                        <option value="1990" ng-selected="{{sponsorCommitmentsData.for_year == '1990'}}">1990</option>
                                        <option value="1991" ng-selected="{{sponsorCommitmentsData.for_year == '1991'}}">1991</option>
                                        <option value="1992" ng-selected="{{sponsorCommitmentsData.for_year == '1992'}}">1992</option>
                                        <option value="1993" ng-selected="{{sponsorCommitmentsData.for_year == '1993'}}">1993</option>
                                        <option value="1994" ng-selected="{{sponsorCommitmentsData.for_year == '1994'}}">1994</option>
                                        <option value="1995" ng-selected="{{sponsorCommitmentsData.for_year == '1995'}}">1995</option>
                                        <option value="1996" ng-selected="{{sponsorCommitmentsData.for_year == '1996'}}">1996</option>
                                        <option value="1997" ng-selected="{{sponsorCommitmentsData.for_year == '1997'}}">1997</option>
                                        <option value="1998" ng-selected="{{sponsorCommitmentsData.for_year == '1998'}}">1998</option>
                                        <option value="1999" ng-selected="{{sponsorCommitmentsData.for_year == '1999'}}">1999</option>
                                        <option value="2000" ng-selected="{{sponsorCommitmentsData.for_year == '2000'}}">2000</option>
                                        <option value="2001" ng-selected="{{sponsorCommitmentsData.for_year == '2001'}}">2001</option>
                                        <option value="2002" ng-selected="{{sponsorCommitmentsData.for_year == '2002'}}">2002</option>
                                        <option value="2003" ng-selected="{{sponsorCommitmentsData.for_year == '2003'}}">2003</option>
                                        <option value="2004" ng-selected="{{sponsorCommitmentsData.for_year == '2004'}}">2004</option>
                                        <option value="2005" ng-selected="{{sponsorCommitmentsData.for_year == '2005'}}">2005</option>
                                        <option value="2006" ng-selected="{{sponsorCommitmentsData.for_year == '2006'}}">2006</option>
                                        <option value="2007" ng-selected="{{sponsorCommitmentsData.for_year == '2007'}}">2007</option>
                                        <option value="2008" ng-selected="{{sponsorCommitmentsData.for_year == '2008'}}">2008</option>
                                        <option value="2009" ng-selected="{{sponsorCommitmentsData.for_year == '2009'}}">2009</option>
                                        <option value="2010" ng-selected="{{sponsorCommitmentsData.for_year == '2010'}}">2010</option>
                                        <option value="2011" ng-selected="{{sponsorCommitmentsData.for_year == '2011'}}">2011</option>
                                        <option value="2012" ng-selected="{{sponsorCommitmentsData.for_year == '2012'}}">2012</option>
                                        <option value="2013" ng-selected="{{sponsorCommitmentsData.for_year == '2013'}}">2013</option>
                                        <option value="2014" ng-selected="{{sponsorCommitmentsData.for_year == '2014'}}">2014</option>
                                        <option value="2015" ng-selected="{{sponsorCommitmentsData.for_year == '2015'}}">2015</option>
                                        <option value="2016" ng-selected="{{sponsorCommitmentsData.for_year == '2016'}}">2016</option>
                                        <option value="2017" ng-selected="{{sponsorCommitmentsData.for_year == '2017'}}">2017</option>
                                        <option value="2018" ng-selected="{{sponsorCommitmentsData.for_year == '2018'}}">2018</option>
                                        <option value="2019" ng-selected="{{sponsorCommitmentsData.for_year == '2019'}}">2019</option>
                                        <option value="2020" ng-selected="{{sponsorCommitmentsData.for_year == '2020'}}">2020</option>
                                        <option value="2021" ng-selected="{{sponsorCommitmentsData.for_year == '2021'}}">2021</option>
                                        <option value="2022" ng-selected="{{sponsorCommitmentsData.for_year == '2022'}}">2022</option>
                                        <option value="2023" ng-selected="{{sponsorCommitmentsData.for_year == '2023'}}">2023</option>
                                        <option value="2024" ng-selected="{{sponsorCommitmentsData.for_year == '2024'}}">2024</option>
                                        <option value="2025" ng-selected="{{sponsorCommitmentsData.for_year == '2025'}}">2025</option>
                                        <option value="2026" ng-selected="{{sponsorCommitmentsData.for_year == '2026'}}">2026</option>
                                        <option value="2027" ng-selected="{{sponsorCommitmentsData.for_year == '2027'}}">2027</option>
                                        <option value="2028" ng-selected="{{sponsorCommitmentsData.for_year == '2028'}}">2028</option>
                                        <option value="2029" ng-selected="{{sponsorCommitmentsData.for_year == '2029'}}">2029</option>
                                        <option value="2030" ng-selected="{{sponsorCommitmentsData.for_year == '2030'}}">2030</option>
                                    </select>-->
                                    <span class="form-text text-muted for_year_commitment{{$index + 1}}-error error-span"></span>
                                </div>
                                <div class="col-md-2">

                                    <label>Amount<span class="req">*</span></label>
                                    <input type="text" class="form-control amount_commitment_update{{$index + 1}}" aria-describedby="emailHelp" name="amount_commitment" id="amount_commitment" placeholder="Enter Amount" ng-value="{{sponsorCommitmentsData.amount}}" disabled>
                                    <span class="form-text text-muted amount_commitment{{$index + 1}}-error error-span"></span>
                                </div>
                                <!--<div class="col-md-2">
                                    <label>Paid date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control paid_date_commitment paid_date_commitment_update{{$index}}" name="paid_date_commitment" placeholder="Select date" id="paid_date_commitment" value="{{sponsorCommitmentsData.paid_date| convertDate}}" >
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <span class="form-text text-muted paid_date_commitment0-error error-span"></span>
                                </div>-->

                                <div class="col-md-2">
                                    <label>Paid</label>
                                    <div class="kt-radio-inline">
                                        <label class="kt-radio">
                                            <input type="radio" name="paid_update{{$index + 1}}" value="1" ng-model="sponsorCommitmentsData.paid" disabled> Yes
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" name="paid_update{{$index + 1}}" value="0" ng-model="sponsorCommitmentsData.paid" disabled> No
                                            <span></span>
                                        </label>
                                    </div>
                                    <span class="form-text text-muted paid{{$index + 1}}-error error-span"></span>
                                </div>

                                <div class="col-md-3">
                                    <label>Receipt No.</label>

                                    <select class="form-control receipt_no_commitment_update{{$index + 1}}" id="receipt_no_commitment" name="receipt_no_commitment" disabled >
                                        <option value="">Select Receipt No</option>

                                        <option  ng-repeat="(key, sponsorReceiptData) in sponsorReceipt" value="{{sponsorReceiptData.id}}" ng-selected="{{sponsorReceiptData.id == sponsorCommitmentsData.receipt_no}}">{{sponsorReceiptData.receipt_no}}</option>
                                    </select>
                                    <span class="form-text text-muted receipt_no_commitment{{$index + 1}}-error error-span"></span>
                                </div>
                                <div class="col-md-3">	
                                    <label>Remarks.</label>	
                                    <input type="text" id="remarks_commitment" name="remarks_commitment" class="form-control remarks_commitment_update{{$index + 1}}" value="{{sponsorReceiptData.reamrks}}" ng-model="sponsorCommitmentsData.remarks">	
                                    <span class="form-text text-muted remarks_commitment{{$index + 1}}-error error-span"></span>	
                                </div>	
                            </div>

                            </div>


                        

                        <input type="hidden" id="entry_count" ng-value="totalEntry">


                        <div class="form-group row ">

                            <div class="col-md-12 pt-12">

                                <div class="text-center">

                                    <button type="button" class="btn btn-secondary" ng-click="goBack()">Back</button>
                                </div>
                            </div>


                        </div>
                        </div>
                    </div>
                </form>


            </div>
            <!--end:: Widgets/Trends-->
        </div>

    </div>




    <script type="text/javascript">


                var edit_sponsor_app = angular.module('edit_sponsor_app', []);
                edit_sponsor_app.controller('edit_sponsor_controller', ['$scope', '$http', '$compile', '$location', '$window', '$timeout', function ($scope, $http, $compile, $location, $window, $timeout) {


                $scope.pageLoad = function () {
                $scope.totalEntry = 0;
                        //$timeout(function () {
                        var url = $location.absUrl();
                        var sponsor_id = url.substring(url.lastIndexOf('/') + 1);
                        if (sponsor_id) {

                $http.get(base_url + 'sponsors/getSponsorData?id=' + sponsor_id)
                        .success(function (response) {
                        console.log(response);
                                profile_img = base_url + "attachments/sponsors_profile_image/default.png";
                                if (response['sponsor_details'][0]['profile_picture'] != "null" && response['sponsor_details'][0]['profile_picture'] != "") {
                        profile_img = base_url + "attachments/sponsors_profile_image/" + response['sponsor_details'][0]['id'] + "/" + response['sponsor_details'][0]['profile_picture'];
                        }



                        var for_year = "";
                                if (response['sponsor_details'][0]['for_year'] != '0000-00-00' && response['sponsor_details'][0]['for_year'] != '') {
                        var forYearGet = response['sponsor_details'][0]['for_year'];
                                var forYearSplit = forYearGet.split("-");
                                for_year = forYearSplit[1] + "/" + forYearSplit[2] + "/" + forYearSplit[0];
                        }

                        $scope.sponsorCommitments = response['sponsor_commitments'];
                                $scope.sponsorReceipt = response['sponsor_receipts'];
                                $scope.profileImgData = response['sponsor_details'][0]['profile_picture'];
                                $scope.profilePicture = profile_img;
                                $scope.sponsorName = response['sponsor_details'][0]['sponsor_name'];
                                //$scope.genderID = response['sponsor_details'][0]['gender_id'];
                                $scope.genderHidden = response['sponsor_details'][0]['gender_id'];
                                $scope.emailId = response['sponsor_details'][0]['email'];
                                $scope.mobileNo = response['sponsor_details'][0]['mobile_no'];
                                $scope.landlineNo = response['sponsor_details'][0]['landline_no'];
                                $scope.doorNo = response['sponsor_details'][0]['door_no'];
                                //$scope.streetName = response['sponsor_details'][0]['street_name'];
                                $scope.streetHidden = response['sponsor_details'][0]['street_name'];
                                $scope.addressVal = response['sponsor_details'][0]['address'];
                                // $scope.residingCountry = response['sponsor_details'][0]['residing_country'];
                                $scope.countryHidden = response['sponsor_details'][0]['residing_country'];
                                //$scope.commitment = response['sponsor_details'][0]['commitment'];
                                //$scope.forYear = for_year;
                                //$scope.paid = response['sponsor_details'][0]['paid'];
                                //$scope.amount = response['sponsor_details'][0]['amount'];
                                $scope.statusVal = response['sponsor_details'][0]['status'];
//                                $timeout(function () {
//
//                                KTFormWidgets.init();
//                                }, 2000);
                                $scope.loadCountry();
                                $scope.loadGender();
                                $scope.loadStreet();
                                $('#submit_edit_sponsor_form').attr("disabled", false);
                        })
                }
                //}, 500);
                }



                $scope.loadCountry = function () {
                $http.get(base_url + 'sponsors/get_country')
                        .success(function (data) {
                        //console.log(data);
                        $scope.country = data.country;
                        })
                }

                $scope.loadStreet = function () {
                $http.get(base_url + 'sponsors/get_street_list')
                        .success(function (data) {
                        $scope.streets = data.street;
                        })
                }

                $scope.loadGender = function () {
                $http.get(base_url + 'scholarship/get_gender')
                        .success(function (data) {

                        $scope.genderValues = data.gender;
                        })
                }




                $scope.goBack = function () {
                $window.location.href = base_url + "sponsors";
                }






                //KTFormWidgets.init();
                //KTFormControls.init();
                }]);
                var edit_sponsor_div = document.getElementById('edit_sponsor_div');
                //alert(dvSecond);
                angular.element(document).ready(function () {
        angular.bootstrap(edit_sponsor_div, ['edit_sponsor_app']);
        });
                edit_sponsor_app.filter('convertDate', function () {
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
                function converToMysqlDate(date_val) {
                var date_split = date_val.split("/");
                        var converted_date = date_split[2] + "-" + date_split[1] + "-" + date_split[0];
                        return converted_date;
                }
    </script>
