
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
                    Edit Details of &nbsp;<span class="capitalize">{{memberName}}</span>
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
                                            <input type="password" class="form-control" aria-describedby="emailHelp" name="password" id="password" placeholder="Enter Password" ng-model="password">
                                            <!--<div class="input-group-append" ng-click="generatePassword()">
                                                <span class="input-group-text">
                                                    <i class="la la-refresh"></i>
                                                </span>
                                            </div>-->
                                        </div>
                                        <span class="form-text text-muted password-error error-span"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Position</label>

                                        <select class="form-control" name="position_id" id="position_id" ng-model="positionId">
                                            <option value="">Select Position</option>
                                            <option  ng-repeat="(key, position_data) in positions" value="{{position_data.id}}" ng-selected="{{position_data.id == positionHidden}}">{{position_data.name}}</option>
                                        </select>
                                        <span class="form-text text-muted position_id-error error-span"></span>
                                        <input type="hidden" ng-model="positionHidden">
                                    </div>

                                    <div class="col-md-4">
                                        <label>Member Name</label>
                                        <input type="text" class="form-control" aria-describedby="emailHelp" name="member_name" id="member_name" placeholder="Enter Name" ng-model="memberName">
                                        <span class="form-text text-muted member_name-error error-span"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Date of Birth</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="dob" placeholder="Select Date" id="dob_datepicker" aria-describedby="kt_datepicker-error" aria-invalid="false" ng-value="dobValue" >
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
                                                <input type="radio" name="lifetime_member" value="1" ng-model="lifeMember"> Yes
                                                <span></span>
                                            </label>
                                            <label class="kt-radio">
                                                <input type="radio" name="lifetime_member" value="0" ng-model="lifeMember"> No
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
                                            <div class="kt-avatar__holder imagePreview kt-avatar__holder-profile-image-large"  ng-style="{'background-image': 'url(' + profileImg + ')'}"></div>


                                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change profile image">
                                                <i class="fa fa-pen"></i>
                                                <input type="file" name="profile_image" id="profile_image" >
                                            </label>
                                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                                <i class="fa fa-times"></i>
                                            </span>
                                        </div>
                                        <input type="hidden" name="profile_img_value" id="profile_img_value" ng-value="profile_img_data">
                                    </div>

                                    <span class="form-text text-muted profile_image-error error-span"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="col-md-3">
                                <label>Door No</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="door_no" id="door_no" placeholder="Enter Door No" ng-model="doorNo">
                                <span class="form-text text-muted door_no-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Street</label>
                                <!--<input type="text" class="form-control" aria-describedby="emailHelp" name="street" id="street" placeholder="Enter Street" ng-model="streetVal">-->
                                <select class="form-control" name="street" id="street">
                                    <option value="">Select Street</option>
                                    <option  ng-repeat="(key, street) in streets" value="{{street.id}}" ng-selected="{{street.id == streetHidden}}">{{street.name}}</option>
                                </select>
                                <span class="form-text text-muted street-error error-span"></span>
                                <input type="hidden" ng-model="streetHidden">
                            </div>
                            <div class="col-md-3">
                                <label>Address</label>
                                <textarea class="form-control" aria-describedby="emailHelp" name="address" id="address" placeholder="Enter Address" ng-model="addressVal"></textarea>
                                <span class="form-text text-muted address-error error-span"></span>
                            </div>


                            <div class="col-md-3">
                                <label>Residing Country</label>

                                <select class="form-control" name="country" id="country" ng-model="residingCountry">
                                    <option value="">Select Country</option>
                                    <option  ng-repeat="(key, country) in countries" value="{{country.id}}" ng-selected="{{country.id == countryHidden}}">{{country.countries_name}}</option>
                                </select>
                                <span class="form-text text-muted country-error error-span"></span>
                                <input type="hidden" ng-model="countryHidden">
                            </div>
                            <div class="col-md-3">
                                <label>Qualification</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="qualification" id="qualification" placeholder="Enter Qualification" ng-model="qualificationVal">
                                <span class="form-text text-muted qualification-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Occupation</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="occupation" id="occupation" placeholder="Enter Occupation" ng-model="occupationVal">
                                <span class="form-text text-muted occupation-error error-span"></span>
                            </div>


                            <div class="col-md-3">
                                <label>Member Since</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="member_since" placeholder="Select Date" id="member_since" aria-describedby="kt_datepicker-error" aria-invalid="false" ng-value="memberSince">
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
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="email" id="email" placeholder="Enter Email ID" ng-model="emailVal">
                                <span class="form-text text-muted email-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Mobile Number</label>
                                <input type="text" class="form-control validate_amount" aria-describedby="emailHelp" name="mobile_number" id="mobile_number" ng-model="mobile_number" ng-pattern="/[0-9]$/" maxlength="20" placeholder="Enter Mobile Number" >
                                <span class="form-text text-muted mobile_number-error error-span"></span>
                            </div>

                            <div class="col-md-3">
                                <label>Landline</label>
                                <input type="text" class="form-control validate_amount" aria-describedby="emailHelp" name="landline_number" id="landline_number" placeholder="Enter Landline number" ng-model="landlineNo">
                                <span class="form-text text-muted landline_number-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Last Subscription</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="last_subscription_year" id="last_subscription_year" placeholder="Enter Last Subscription" disabled ng-model="lastSubscriptionYear">
                                <span class="form-text text-muted last_subscription_year-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Last Subscription Amount</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="last_subscription_amount" id="last_subscription_amount" placeholder="Enter Last Subscription Amount" disabled ng-model="lastSubscriptionAmt">
                                <span class="form-text text-muted last_subscription_amount-error error-span"></span>
                            </div>


                            <div class="col-md-3">
                                <label>Status<span class="req">*</span></label>

                                <select class="form-control" id="status" name="status" ng-model="statusVal">
                                    <option value="1">Active</option>
                                    <option value="0">In Active</option>
                                    <option value="2">Died</option>
                                </select>
                                <span class="form-text text-muted status-error error-span"></span>
                            </div>

                            <div class="col-md-3">
                                <label>Member Type</label>

                                <select class="form-control" name="member_type_id" id="member_type_id" ng-model="memberTypeId">
                                    <option value="">Select Member Type</option>
                                    <option  ng-repeat="(key, member_type_data) in member_types" value="{{member_type_data.id}}" ng-selected="member_type_data.id == memberTypeHidden">{{member_type_data.name}}</option>
                                </select>
                                <span class="form-text text-muted member_type_id-error error-span"></span>
                                <input type="hidden" ng-model="memberTypeHidden">
                            </div>

                            <div class="col-md-3">
                                <label>User Type</label>

                                <select class="form-control" name="user_type_id" id="user_type_id" ng-model="userTypeId">
                                    <option value="">Select User Type</option>
                                    <option  ng-repeat="(key, user_type_data) in user_types" value="{{user_type_data.id}}" ng-selected="user_type_data.id == userTypeHidden">{{user_type_data.user_type_name}}</option>
                                </select>
                                <span class="form-text text-muted user_type_id-error error-span"></span>
                                <input type="hidden" ng-model="userTypeHidden">
                            </div>



                        </div>
                        <!--<br>
                        <!--<div class="form-group row ">



                            <div class="col-md-3">
                                <label>Add custom field</label>
                            </div>


                            <div class="col-md-9 ">
                                <div class="kt-uppy commit-btn" id="kt_uppy_5">
                                    <div class="kt-uppy__wrapper">
                                        <button type="button" class="btn btn-brand btn-icon-sm ng-scope" ng-click="addNewField()">
                                            <i class="flaticon2-plus"></i> Add Field
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="customEntryDiv">
                            <div class="form-group row" ng-repeat="(key, customFieldData) in customField">
                                <div class="col-md-2">
                                    <label>Label name<span class="req">*</span></label>
                                    <input type="text" class="form-control custom_label_update{{$index + 1}}" id="custom_label" name="custom_label" placeholder="Enter Label Name" value="{{customFieldData.label_name}}">
                                    <span class="form-text text-muted custom_label_update{{$index + 1}}-error error-span"></span>
                                </div>
                                <div class="col-md-2">
                                    <label>Value<span class="req">*</span></label>
                                    <input type="text" class="form-control custom_value_update{{$index + 1}}" aria-describedby="emailHelp" name="custom_value" id="custom_value" placeholder="Enter Value"  value="{{customFieldData.value}}">
                                    <span class="form-text text-muted custom_value_update{{$index + 1}}-error error-span"></span>
                                </div>
                                <div class="col-md-3 text-center">
                                    <label>Action</label>

                                    <div class="kt-subheader__toolbar">
                                        <a class="btn btn-label-brand btn-bold m-l-15 update_custom_entry" data-entry-id="{{customFieldData.id}}" data-count="{{$index + 1}}" id="save_custom_entry">
                                            <i class="flaticon-edit"></i></a>
                                        <a class="btn btn-label-danger btn-bold delete_custom_entry_update" data-entry-id="{{customFieldData.id}}" data-count="{{$index + 1}}" id="delete_custom_entry_update">
                                            <i class="flaticon2-trash"></i></a>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label>Label name<span class="req">*</span></label>
                                    <input type="text" class="form-control custom_label0" id="custom_label" name="custom_label" placeholder="Enter Label Name" >

                                    <span class="form-text text-muted custom_label0-error error-span"></span>
                                </div>
                                <div class="col-md-2">

                                    <label>Value<span class="req">*</span></label>
                                    <input type="text" class="form-control custom_value0" aria-describedby="emailHelp" name="custom_value" id="custom_value" placeholder="Enter Value" >
                                    <span class="form-text text-muted custom_value0-error error-span"></span>
                                </div>
                                <div class="col-md-3 text-center">
                                    <label>Action</label>

                                    <div class="kt-subheader__toolbar">
                                        <a class="btn btn-label-brand btn-bold m-l-15 save_custom_entry" data-id="" data-count="0" id="save_custom_entry">
                                            <i class="flaticon2-check-mark"></i></a>
                                        <a class="btn btn-label-danger btn-bold delete_custom_entry" id="delete_custom_entry">
                                            <i class="flaticon2-trash"></i></a>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <input type="hidden" id="entry_count" ng-value="totalEntry">-->
                        <div class="form-group row ">

                            <div class="col-md-12 pt-12">

                                <div class="text-center">
                                    <button type="button" id="submit_edit_members_form" class="btn btn-brand" disabled>Save</button>
                                    <button type="button" class="btn btn-secondary" ng-click="goBack()">Cancel</button>
                                </div>
                            </div>


                        </div>



                    </div>
                </form>
                <!--end:: Widgets/Trends-->
            </div>

        </div>


    </div>

    <script type="text/javascript">


                var edit_member_app = angular.module('edit_member_app', []);
                edit_member_app.controller('edit_member_controller', ['$scope', '$http', '$compile', '$location', '$window', '$timeout', function ($scope, $http, $compile, $location, $window, $timeout) {

                $scope.pageLoad = function () {
                $scope.totalEntry = 0;
                        //$scope.generatePassword();

                        // $timeout(function () {
                        var url = $location.absUrl();
                        var member_id = url.substring(url.lastIndexOf('/') + 1);
                        if (member_id) {

                $http.get(base_url + 'members/getMemberData?id=' + member_id)
                        .success(function (response) {
                        console.log(response);
                                // console.log(response.member_details[0]);
                                profile_img = base_url + "attachments/profile_image/default.png";
                                if (response.member_details[0]['profile_picture'] != "null" && response.member_details[0]['profile_picture'] != "") {
                        profile_img = base_url + "attachments/profile_image/" + response.member_details[0]['profile_picture'];
                        }



                        var dobVal = "";
                                if (response.member_details[0]['dob'] != '0000-00-00' && response.member_details[0]['dob'] != '') {
                        dobVal = $scope.convertToFormDate(response.member_details[0]['dob']);
                        }
                        var member_since = "";
                                if (response.member_details[0]['member_since'] != '0000-00-00' && response.member_details[0]['member_since'] != '') {

                        member_since = $scope.convertToFormDate(response.member_details[0]['member_since']);
                        }
                        var last_subscription_year = "";
                                if (response.member_details[0]['last_subscription_year']) {
                        var last_subscription_yearGet = response.member_details[0]['last_subscription_year'];
                                var last_subscription_yearSplit = last_subscription_yearGet.split("-");
                                last_subscription_year = last_subscription_yearSplit[1] + "/" + last_subscription_yearSplit[2] + "/" + last_subscription_yearSplit[0];
                        }

                        $scope.profile_img_data = response.member_details[0]['profile_picture'];
                                $scope.userName = response.member_details[0]['username'];
                                $scope.password = response.member_details[0]['password'];
                                $scope.profileImg = profile_img;
                                $scope.memberName = response.member_details[0]['name'];
                                $scope.dobValue = dobVal;
                                $scope.lifeMember = response.member_details[0]['life_member'];
                                $scope.doorNo = response.member_details[0]['door_no'];
                                //$scope.streetVal = response.member_details[0]['street_name'];
                                $scope.streetHidden = response.member_details[0]['street_name'];
                                $scope.addressVal = response.member_details[0]['address'];
                                //$scope.residingCountry = response.member_details[0]['residing_country'];

                                $scope.countryHidden = response.member_details[0]['residing_country'];
                                //alert($scope.countryHidden);
                                $scope.qualificationVal = response.member_details[0]['qualification'];
                                $scope.occupationVal = response.member_details[0]['occupation'];
                                $scope.memberSince = member_since;
                                $scope.emailVal = response.member_details[0]['email'];
                                $scope.mobile_number = response.member_details[0]['mobile_number'];
                                $scope.landlineNo = response.member_details[0]['landline_number'];
                                $scope.lastSubscriptionYear = last_subscription_year;
                                $scope.lastSubscriptionAmt = response.member_details[0]['last_subscription_amount'];
                                $scope.statusVal = response.member_details[0]['status'];
                                //$scope.memberTypeId = response.member_details[0]['member_type_id'];
                                //$scope.positionId = response.member_details[0]['position_id'];
                                $scope.positionHidden = response.member_details[0]['position_id'];
                                $scope.memberTypeHidden = response.member_details[0]['member_type_id'];
                                $scope.userTypeHidden = response.member_details[0]['user_type_id'];
                                $scope.customField = response.dynamic_entry_member;
                                $timeout(function () {

                                KTFormWidgets.init();
                                }, 2000);
                                $scope.loadCountry();
                                $scope.loadMemberType();
                                $scope.loadPosition();
                                $scope.loadUserType();
                                $scope.loadStreet();
                                $('#submit_edit_members_form').attr("disabled", false);
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


                $scope.pwdCharArray = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I',
                        'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R',
                        'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i',
                        'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r',
                        's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
                        $scope.goBack = function () {

                        $window.location.href = base_url + "members";
                        }


                $scope.generatePassword = function () {

                $scope.password = "";
                        for (var i = 0; i < 6; i++) {

                $scope.temp = Math.floor(Math.random() * $scope.pwdCharArray.length);
                        $scope.password += $scope.pwdCharArray[$scope.temp];
                }
                };
                        $scope.addNewField = function () {
                        $scope.totalEntry = parseInt($scope.totalEntry) + 1;
                                var count = $scope.totalEntry;
                                var divElement = angular.element(document.querySelector('#customEntryDiv'));
                                var content = '<div class="form-group row"><div class="col-md-2"><label>Label name<span class="req">*</span></label><input type="text" class="form-control custom_label' + count + '" id="custom_label" name="custom_label" placeholder="Enter Label Name" ><span class="form-text text-muted custom_label' + count + '-error error-span"></span></div><div class="col-md-2"><label>Value<span class="req">*</span></label> <input type="text" class="form-control custom_value' + count + '" aria-describedby="emailHelp" name="custom_value" id="custom_value" placeholder="Enter Value" ><span class="form-text text-muted custom_value' + count + '-error error-span"></span></div><div class="col-md-3 text-center"><label>Action</label><div class="kt-subheader__toolbar"><a class="btn btn-label-brand btn-bold m-l-15 save_custom_entry" data-id="" data-count="' + count + '" id="save_custom_entry"><i class="flaticon2-check-mark"></i></a><a class="btn btn-label-danger btn-bold delete_custom_entry" id="delete_custom_entry"><i class="flaticon2-trash"></i></a></div></div> </div>';
                                var appendHtml = $compile('<custom-Entry>' + content + '</custom-entry>')($scope);
                                divElement.append(appendHtml);
                        }

                }]);
                var edit_member_div = document.getElementById('edit_member_div');
                //alert(dvSecond);
                angular.element(document).ready(function () {
        angular.bootstrap(edit_member_div, ['edit_member_app']);
        });
                $('#submit_edit_members_form').click(function (e) {
        e.preventDefault();
                var btn = $(this);
                var form = $(this).closest('form');
                form.validate({
                rules: {
                username: {
                required: true,
                },
//                        member_name: {
//                        required: true
//                        },
//                        door_no: {
//                        required: true
//                        },
//                        street: {
//                        required: true
//                        },
//                        address: {
//                        required: true
//                        },
//                        country: {
//                        required: true
//                        },
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
//                        status: {
//                        required: true
//                        },
                        member_type_id: {
                        //required: true
                        },
                        last_subscription_amount: {
                        min: 0,
                        },
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
                //if ($("#profile_img_value").val() == "" && profile_image.length <= 0) {
                //$("#profile_image").focus();
                // $(".profile_image-error").html("This field is required");
                //} else {

                btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
                var username = $("#username").val();
                var password = $("#password").val();
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

                //            var dob_split = dob_datepicker.split("/");
                //            var dob = dob_split[2] + "-" + dob_split[0] + "-" + dob_split[1];
                //            var member_since_split = member_since_date.split("/");
                //            var member_since = member_since_split[2] + "-" + member_since_split[0] + "-" + member_since_split[1];

                var dob = converToMysqlDate(dob_datepicker);
                var member_since = converToMysqlDate(member_since_date);
                var url = window.location.href;
                var member_id = url.substring(url.lastIndexOf('/') + 1);
                var formData = new FormData();
                formData.append("member_id", member_id);
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
                formData.append("position_id", position_id);
                formData.append("user_type_id", user_type_id);
                $.ajax({
                method: "POST",
                        url: base_url + "members/update_member_details",
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
                                "text": "Member has been successfully updated!",
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
                // }
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
                var div = "profile_picture_preview";
                if (files && files[0]) {
        readImage(files[0], '#profile_image', div);
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
                if ($.inArray(get_ext[0].toLowerCase(), exts) == - 1) {
        // alert("if");
        $(element).val('');
                $(".profile_image-error").append('Image format not allowed');
                setTimeout(function () {
                $('.profile_image-error').html('');
                }, 3000);
                default_src = $('.imagePreview').attr('default_src');
                $('.imagePreview').attr('src', default_src);
                error = 0;
        } else if (file.size > 5000000) {
        //alert("else if");
        $(".profile_image-error").append('Maximum size 5MB');
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


        $(document).on('click', '.save_custom_entry', function () {
        var this_obj = $(this);
                var count = $(this).attr('data-count');
                //alert(count);
                var custom_label = $('.custom_label' + count).val();
                var custom_value = $('.custom_value' + count).val();
                var url = window.location.href;
                var member_id = url.substring(url.lastIndexOf('/') + 1);
                var input_validate_error = 0;
                if (custom_label == "") {
        $(".custom_label" + count + "-error").html("This field is required");
                $(".custom_label" + count).addClass("is-invalid");
                input_validate_error = input_validate_error + 1;
                //return;
        } else {
        $(".custom_label" + count + "-error").html("");
                $(".custom_label" + count).removeClass("is-invalid");
        }
        if (custom_value == "") {
        $(".custom_value" + count + "-error").html("This field is required");
                $(".custom_value" + count).addClass("is-invalid");
                input_validate_error = input_validate_error + 1;
                //return;
        } else {
        $(".custom_value" + count + "-error").html("");
                $(".custom_value" + count).removeClass("is-invalid");
        }

        if (input_validate_error > 0) {
        return;
        }


        var dataString = "custom_label=" + custom_label + "&custom_value=" + custom_value + "&member_id=" + member_id;
                // console.log(dataString);
                $.ajax({
                method: "POST",
                        url: base_url + "members/add_custom_entry",
                        data: dataString,
                        error: function (data) {
                        console.log(data);
                        },
                        success: function (data) {
                        //console.log(data);
                        var myObj = JSON.parse(data);
                                console.log(myObj);
                                //return;
                                if (myObj.status == "1") {
                        swal.fire({
                        "title": "Success",
                                "text": "Custom entry added successfully!",
                                "type": "success",
                                "confirmButtonClass": "btn btn-secondary"
                        });
                                var last_update_count = $('.update_custom_entry:last').attr("data-count");
                                // alert(last_update_count);
                                if (typeof (last_update_count) == "undefined"){
                        last_update_count = 0;
                        }
                        var update_count = parseInt(last_update_count) + 1;
                                var this_data_count = this_obj.attr("data-count");
                                this_obj.find('i').attr("class", "flaticon-edit");
                                this_obj.removeClass("save_custom_entry");
                                this_obj.addClass("update_custom_entry");
                                this_obj.attr("data-entry-id", myObj.custom_entry_id);
                                this_obj.attr("data-count", update_count);
                                this_obj.parent().parent().parent().find(".delete_custom_entry").attr("data-entry-id", myObj.custom_entry_id);
                                this_obj.parent().parent().parent().find(".delete_custom_entry").attr("data-count", update_count);
                                this_obj.parent().parent().parent().find(".delete_custom_entry").addClass("delete_custom_entry_update");
                                this_obj.parent().parent().parent().find(".delete_custom_entry").removeClass("delete_custom_entry");
                                //alert(this_data_count);
                                //alert('for_year_commitment' + update_count);
                                //alert('for_year_commitment' + this_data_count);
                                //console.log(this_obj.parent().parent().parent().find('.for_year_commitment' + this_data_count));
                                //console.log('radio[name="paid' + this_data_count + '"]');
                                //console.log(this_obj.parent().parent().parent().find('radio[name="paid' + this_data_count + '"]'));
                                this_obj.parent().parent().parent().find('.custom_label' + this_data_count).addClass('custom_label_update' + update_count);
                                this_obj.parent().parent().parent().find('.custom_label_update' + update_count).removeClass('custom_label' + this_data_count);
                                this_obj.parent().parent().parent().find('.custom_value' + this_data_count).addClass('custom_value_update' + update_count);
                                this_obj.parent().parent().parent().find('.custom_value_update' + update_count).removeClass('custom_value' + this_data_count);
                        }
                        }
                });
        });
                $(document).on('click', '.delete_custom_entry', function () {
        var this_obj = $(this);
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
        this_obj.parent().parent().parent().remove();
        }
        });
        });
                $(document).on('click', '.update_custom_entry', function () {
        var count = $(this).attr('data-count');
                var entry_id = $(this).attr('data-entry-id');
                //alert(count);
                var custom_label = $('.custom_label_update' + count).val();
                var custom_value = $('.custom_value_update' + count).val();
                var input_validate_error = 0;
                var url = window.location.href;
                var member_id = url.substring(url.lastIndexOf('/') + 1);
                if (custom_label == "") {
        $(".custom_label" + count + "-error").html("This field is required");
                $(".custom_label" + count).addClass("is-invalid");
                input_validate_error = input_validate_error + 1;
                //return;
        } else {
        $(".custom_label" + count + "-error").html("");
                $(".custom_label" + count).removeClass("is-invalid");
        }

        if (custom_value == "") {
        $(".custom_value" + count + "-error").html("This field is required");
                $(".custom_value" + count).addClass("is-invalid");
                input_validate_error = input_validate_error + 1;
                //return;
        } else {
        $(".custom_value" + count + "-error").html("");
                $(".custom_value" + count).removeClass("is-invalid");
        }
        if (input_validate_error > 0) {
        return;
        }

        var dataString = "custom_label=" + custom_label + "&custom_value=" + custom_value + "&member_id=" + member_id + "&entry_id=" + entry_id;
                //console.log(dataString);
                $.ajax({
                method: "POST",
                        url: base_url + "members/update_custom_entry",
                        data: dataString,
                        error: function (data) {
                        console.log(data);
                        },
                        success: function (data) {
                        //console.log(data);
                        var myObj = JSON.parse(data);
                                console.log(myObj);
                                //return;
                                if (myObj.status == "1") {

                        swal.fire({
                        "title": "Success",
                                "text": "Custom entry updated successfully!",
                                "type": "success",
                                "confirmButtonClass": "btn btn-secondary"
                        });
                        }
                        }
                });
        });
                $(document).on('click', '.delete_custom_entry_update', function () {
        var this_obj = $(this);
                var custom_entry_id = $(this).attr('data-entry-id');
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
        var dataString = "entry_id=" + custom_entry_id;
                //console.log(dataString);
                $.ajax({
                method: "POST",
                        url: base_url + "members/delete_custom_entry_update",
                        data: dataString,
                        error: function (data) {
                        console.log(data);
                        },
                        success: function (data) {
                        //console.log(data);
                        if (data == "1") {
                        swal.fire(
                                'Deleted!',
                                'Commitment entry deleted.',
                                'success'
                                ).then(function () {
                        this_obj.parent().parent().parent().remove();
                        });
                        }
                        }
                });
        }
        });
        });
                $(document).on('keypress', '.validate_amount', function (event) {
        //console.log(event.which);
        //console.log(isNaN(String.fromCharCode(event.which)));
        if (event.which != 8 && isNaN(String.fromCharCode(event.which))) {
        event.preventDefault();
        }
        });
    </script>