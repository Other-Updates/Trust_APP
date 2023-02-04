<style>.capitalize {
        text-transform: capitalize;
    }</style>
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

<div class="kt-grid__item kt-grid__item--fluid kt-app__content"  id="edit_member_div" ng-app="edit_member_app" ng-controller="edit_member_controller" ng-init="pageLoad()" ng-cloak>
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">

                <h3 class="kt-subheader__title">
                    View Details of &nbsp;<span class="capitalize">{{memberName}}</span>
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
                        <div class="form-group">

                        </div>
                        <div class="row">
                            <div class="col-xl-9 col-lg-9 col-md-9" style="float:left;">
                                <div class="form-group row ">

                                    <div class="col-md-4">
                                        <label>Username<span class="req">*</span></label>
                                        <input type="text" class="form-control" aria-describedby="emailHelp" name="username" id="username" placeholder="Enter Username" ng-model="userName" disabled >
                                        <span class="form-text text-muted username-error error-span"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Password</label>

                                        <div class="input-group">
                                            <input type="password" class="form-control" aria-describedby="emailHelp" name="password" id="password" placeholder="Enter Password" ng-model="password" disabled>
                                            <!--<div class="input-group-append" ng-click="generatePassword()">
                                                <span class="input-group-text">
                                                    <i class="la la-refresh"></i>
                                                </span>
                                            </div>-->
                                        </div>
                                        <span class="form-text text-muted password-error error-span"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Position<span class="req">*</span></label>

                                        <select class="form-control" name="position_id" id="position_id" ng-model="positionId" disabled>
                                            <option value="">Select Position</option>
                                            <option  ng-repeat="(key, position_data) in positions" value="{{position_data.id}}" ng-selected="{{position_data.id == positionHidden}}">{{position_data.name}}</option>
                                        </select>
                                        <span class="form-text text-muted position_id-error error-span"></span>
                                        <input type="hidden" ng-model="positionHidden">
                                    </div>

                                    <div class="col-md-4">
                                        <label>Member Name<span class="req">*</span></label>
                                        <input type="text" class="form-control" aria-describedby="emailHelp" name="member_name" id="member_name" placeholder="Enter Name" ng-model="memberName" disabled>
                                        <span class="form-text text-muted member_name-error error-span"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Date of Birth</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="dob" placeholder="Select Date" id="dob_datepicker" aria-describedby="kt_datepicker-error" aria-invalid="false" ng-value="dobValue" disabled >
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar-check-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <span class="form-text text-muted dob-error error-span"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Is lifetime Member</label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio">
                                                <input type="radio" name="lifetime_member" value="1" ng-model="lifeMember" disabled> Yes
                                                <span></span>
                                            </label>
                                            <label class="kt-radio">
                                                <input type="radio" name="lifetime_member" value="0" ng-model="lifeMember" disabled> No
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
                                        <label>Profile Image<span class="req">*</span></label>
                                    </div>
                                    <div class="col-md-8">



                                        <div class="kt-avatar" id="kt_user_avatar_2">
                                            <div class="kt-avatar__holder imagePreview kt-avatar__holder-profile-image-large"  ng-style="{'background-image': 'url(' + profileImg + ')'}"></div>



                                        </div>
                                        <input type="hidden" name="profile_img_value" id="profile_img_value" ng-value="profile_img_data">
                                    </div>

                                    <span class="form-text text-muted profile_image-error error-span"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="col-md-3">
                                <label>Door No<span class="req">*</span></label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="door_no" id="door_no" placeholder="Enter Door No" ng-model="doorNo" disabled>
                                <span class="form-text text-muted door_no-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Street<span class="req">*</span></label>
                                <!--<input type="text" class="form-control" aria-describedby="emailHelp" name="street" id="street" placeholder="Enter Street" ng-model="streetVal" disabled>-->
                                <select class="form-control" name="street" id="street" ng-model="streetVal" disabled>
                                    <option value="">Select Street</option>
                                    <option  ng-repeat="(key, street) in streets" value="{{street.id}}" ng-selected="{{street.id == streetHidden}}">{{street.name}}</option>
                                </select>
                                <span class="form-text text-muted street-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Address<span class="req">*</span></label>
                                <textarea class="form-control" aria-describedby="emailHelp" name="address" id="address" placeholder="Enter Address" ng-model="addressVal" disabled></textarea>
                                <span class="form-text text-muted street-error error-span"></span>
                            </div>


                            <div class="col-md-3">
                                <label>Residing Country<span class="req">*</span></label>

                                <select class="form-control" name="country" id="country" ng-model="residingCountry" disabled>
                                    <option value="">Select Country</option>
                                    <option  ng-repeat="(key, country) in countries" value="{{country.id}}" ng-selected="{{country.id == countryHidden}}">{{country.countries_name}}</option>
                                </select>
                                <span class="form-text text-muted country-error error-span"></span>
                                <input type="hidden" ng-model="countryHidden">
                            </div>
                            <div class="col-md-3">
                                <label>Qualification</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="qualification" id="qualification" placeholder="Enter Qualification" ng-model="qualificationVal" disabled>
                                <span class="form-text text-muted qualification-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Occupation</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="occupation" id="occupation" placeholder="Enter Occupation" ng-model="occupationVal" disabled>
                                <span class="form-text text-muted occupation-error error-span"></span>
                            </div>


                            <div class="col-md-3">
                                <label>Member Since</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="member_since" placeholder="Select Date" id="member_since" aria-describedby="kt_datepicker-error" aria-invalid="false" ng-value="memberSince" disabled>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="form-text text-muted member_since-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Email ID<span class="req">*</span></label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="email" id="email" placeholder="Enter Email ID" ng-model="emailVal" disabled>
                                <span class="form-text text-muted email-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Mobile Number<span class="req">*</span></label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="mobile_number" id="mobile_number" ng-model="mobile_number" ng-pattern="/[0-9]$/" maxlength="20" placeholder="Enter Mobile number" disabled >
                                <span class="form-text text-muted mobile_number-error error-span"></span>
                            </div>

                            <div class="col-md-3">
                                <label>Landline</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="landline_number" id="landline_number" placeholder="Enter Landline Number" ng-model="landlineNo" disabled>
                                <span class="form-text text-muted landline_number-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Last Subscription</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="last_subscription_year" id="last_subscription_year" placeholder="Enter Last Subscription" disabled ng-model="lastSubscriptionYear" disabled>
                                <span class="form-text text-muted last_subscription_year-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Last Subscription Amount</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="last_subscription_amount" id="last_subscription_amount" placeholder="Enter Last subscription amount" disabled ng-model="lastSubscriptionAmt" disabled>
                                <span class="form-text text-muted last_subscription_amount-error error-span"></span>
                            </div>


                            <div class="col-md-3">
                                <label>Status<span class="req">*</span></label>

                                <select class="form-control" id="status" name="status" ng-model="statusVal" disabled>
                                    <option value="1">Active</option>
                                    <option value="0">In Active</option>
                                    <option value="2">Died</option>
                                </select>
                                <span class="form-text text-muted status-error error-span"></span>
                            </div>

                            <div class="col-md-3">
                                <label>Member Type</label>

                                <select class="form-control" name="member_type_id" id="member_type_id" ng-model="memberTypeId" disabled>
                                    <option value="">Select Member Type</option>
                                    <option  ng-repeat="(key, member_type_data) in member_types" value="{{member_type_data.id}}" ng-selected="member_type_data.id == memberTypeHidden">{{member_type_data.name}}</option>
                                </select>
                                <span class="form-text text-muted member_type_id-error error-span"></span>
                                <input type="hidden" ng-model="memberTypeHidden">
                            </div>
                            <div class="col-md-3">
                                <label>User Type</label>

                                <select class="form-control" name="user_type_id" id="user_type_id" ng-model="userTypeId" disabled>
                                    <option value="">Select User Type</option>
                                    <option  ng-repeat="(key, user_type_data) in user_types" value="{{user_type_data.id}}" ng-selected="user_type_data.id == userTypeHidden">{{user_type_data.user_type_name}}</option>
                                </select>
                                <span class="form-text text-muted user_type_id-error error-span"></span>
                                <input type="hidden" ng-model="userTypeHidden">
                            </div>


                        </div>
                        <div class="form-group row ">

                            <div class="col-md-12 pt-12">

                                <div class="text-center">

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


    var edit_member_app = angular.module('edit_member_app', []);
    edit_member_app.controller('edit_member_controller', ['$scope', '$http', '$compile', '$location', '$window', '$timeout', function ($scope, $http, $compile, $location, $window, $timeout) {

            $scope.pageLoad = function () {
                //$scope.generatePassword();

                // $timeout(function () {
                var url = $location.absUrl();
                var member_id = url.substring(url.lastIndexOf('/') + 1);
                if (member_id) {

                    $http.get(base_url + 'members/getMemberData?id=' + member_id)
                            .success(function (response) {
                                //console.log(response['member_details']);

                                if (response['member_details'][0]['profile_picture'] != "null" && response['member_details'][0]['profile_picture'] != "") {
                                    profile_img = base_url + "attachments/profile_image/" + response['member_details'][0]['profile_picture'];
                                } else {
                                    profile_img = base_url + "attachments/profile_image/default.png";
                                }
                                var dobVal = "";
                                if (response['member_details'][0]['dob'] != '0000-00-00' && response['member_details'][0]['dob'] != '') {
                                    dobVal = $scope.convertToFormDate(response['member_details'][0]['dob']);
                                }
                                var member_since = "";
                                if (response['member_details'][0]['member_since'] != '0000-00-00' && response['member_details'][0]['member_since'] != '') {

                                    member_since = $scope.convertToFormDate(response['member_details'][0]['member_since']);
                                }
                                var last_subscription_year = "";
                                if (response['member_details'][0]['last_subscription_year']) {
                                    var last_subscription_yearGet = response['member_details'][0]['last_subscription_year'];
                                    var last_subscription_yearSplit = last_subscription_yearGet.split("-");
                                    last_subscription_year = last_subscription_yearSplit[1] + "/" + last_subscription_yearSplit[2] + "/" + last_subscription_yearSplit[0];
                                }

                                $scope.profile_img_data = response['member_details'][0]['profile_picture'];
                                $scope.userName = response['member_details'][0]['username'];
                                $scope.password = response['member_details'][0]['password'];
                                $scope.profileImg = profile_img;
                                $scope.memberName = response['member_details'][0]['name'];
                                $scope.dobValue = dobVal;
                                $scope.lifeMember = response['member_details'][0]['life_member'];
                                $scope.doorNo = response['member_details'][0]['door_no'];
                                // $scope.streetVal = response['member_details'][0]['street_name'];
                                $scope.streetHidden = response.member_details[0]['street_name'];
                                $scope.addressVal = response['member_details'][0]['address'];
                                //$scope.residingCountry = response[0]['residing_country'];

                                $scope.countryHidden = response['member_details'][0]['residing_country'];
                                //alert($scope.countryHidden);
                                $scope.qualificationVal = response['member_details'][0]['qualification'];
                                $scope.occupationVal = response['member_details'][0]['occupation'];
                                $scope.memberSince = member_since;
                                $scope.emailVal = response['member_details'][0]['email'];
                                $scope.mobile_number = response['member_details'][0]['mobile_number'];
                                $scope.landlineNo = response['member_details'][0]['landline_number'];
                                $scope.lastSubscriptionYear = last_subscription_year;
                                $scope.lastSubscriptionAmt = response['member_details'][0]['last_subscription_amount'];
                                //alert(response[0]['status']);
                                $scope.statusVal = response['member_details'][0]['status'];
                                //$scope.memberTypeId = response[0]['member_type_id'];
                                //$scope.positionId = response[0]['position_id'];
                                $scope.positionHidden = response['member_details'][0]['position_id'];
                                $scope.memberTypeHidden = response['member_details'][0]['member_type_id'];
                                $scope.userTypeHidden = response.member_details[0]['user_type_id'];


                                $scope.loadCountry();
                                $scope.loadMemberType();
                                $scope.loadPosition();
                                $scope.loadUserType();
                                $scope.loadStreet();
                            })
                }
                //}, 500);


            }

            $scope.convertToFormDate = function (date_val) {

                var dateSplit = date_val.split("-");
                var convertedDate = dateSplit[2] + "/" + dateSplit[1] + "/" + dateSplit[0];
                return convertedDate;
            }

            $scope.loadCountry = function () {
                $http.get(base_url + 'members/get_country_list')
                        .success(function (data) {

                            $scope.countries = data.country;
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
                        .success(function (data) {

                            $scope.positions = data.position;
                        })
            }



            $scope.goBack = function () {
                $window.location.href = base_url + "members";
            }




        }]);
    var edit_member_div = document.getElementById('edit_member_div');
    //alert(dvSecond);
    angular.element(document).ready(function () {
        angular.bootstrap(edit_member_div, ['edit_member_app']);
    });






</script>