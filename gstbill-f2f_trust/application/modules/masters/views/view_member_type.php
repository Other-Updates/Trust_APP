<div class="kt-grid__item kt-grid__item--fluid kt-app__content"  id="edit_course_type_div" ng-app="edit_course_type_app" ng-controller="edit_course_type_controller" ng-cloak ng-init="loadPage()">    <div class="kt-subheader   kt-grid__item" id="kt_subheader">        <div class="kt-container  kt-container--fluid ">            <div class="kt-subheader__main">                <h3 class="kt-subheader__title">                    View Member type                </h3>                <span class="kt-subheader__separator kt-subheader__separator--v"></span>            </div>        </div>    </div>    <div class="row hide" id="success_alert">        <div class="col-xl-12">            <div class="alert alert-outline-success fade show" role="alert">                <div class="alert-icon"><i class="flaticon2-check-mark"></i></div>                <div class="alert-text">Successfully updated.</div>            </div>        </div>    </div>    <div class="row hide" id="failed_alert">        <div class="col-xl-12">            <div class="alert alert-outline-danger fade show" role="alert">                <div class="alert-icon"><i class="flaticon-questions-circular-button"></i></div>                <div class="alert-text">Failed to update</div>            </div>        </div>    </div>    <div class="row hide" id="warning_alert">        <div class="col-xl-12">            <div class="alert alert-outline-warning fade show" role="alert">                <div class="alert-icon"><i class="flaticon-warning"></i></div>                <div class="alert-text">Member type already exists</div>            </div>        </div>    </div>    <div class="row">        <div class="col-xl-12">            <!--begin:: Widgets/Trends-->            <div class="kt-portlet kt-portlet--head--noborder kt-portlet--height-fluid">                <form class="kt-form kt-form--label-right">                    <div class="kt-portlet__body">                        <div class="form-group row ">                            <div class="col-md-6">                                <label>Member Type<span class="req">*</span></label>                                <input type="text" class="form-control" aria-describedby="emailHelp" name="member_type" id="member_type" placeholder="Enter Member Type" value="{{memberTypeName}}" required disabled>                                <span class="form-text text-muted member_type-error error-span"></span>                            </div>                            <div class="col-md-6">                                <label>Status<span class="req">*</span></label>                                <select class="form-control" id="member_type_status" name="member_type_status" ng-model="memberTypeStatus" disabled>                                    <option value="1">Active</option>                                    <option value="0">Inactive</option>                                </select>                                <span class="form-text text-muted member_type_status-error error-span"></span>                            </div>                            <div class="col-md-12 pt-12">                                <div class="text-center">                                    <button type="button" class="btn btn-secondary" ng-click="goBack()">Back</button>                                </div>                            </div>                        </div>                    </div>                </form>            </div>            <!--end:: Widgets/Trends-->        </div>    </div></div><script type="text/javascript">    var edit_course_type_app = angular.module('edit_course_type_app', []);    edit_course_type_app.controller('edit_course_type_controller', ['$scope', '$http', '$compile', '$location', '$window', function ($scope, $http, $compile, $location, $window) {            $scope.loadPage = function () {                var url = $location.absUrl();                var course_type_id = url.substring(url.lastIndexOf('/') + 1);                if (course_type_id) {                    $http.get(base_url + 'masters/member_type/getMemberTypeData?id=' + course_type_id)                            .success(function (response) {                                $scope.memberTypeName = response[0]['name'];                                $scope.memberTypeStatus = response[0]['status'];                            })                }            }            $scope.goBack = function () {                $window.location.href = base_url + "masters/member_type";            }        }]);    var edit_course_type_div = document.getElementById('edit_course_type_div');    angular.element(document).ready(function () {        angular.bootstrap(edit_course_type_div, ['edit_course_type_app']);    });</script>