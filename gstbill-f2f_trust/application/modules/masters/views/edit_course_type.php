

<div class="kt-grid__item kt-grid__item--fluid kt-app__content"  id="edit_course_type_div" ng-app="edit_course_type_app" ng-controller="edit_course_type_controller" ng-cloak ng-init="loadCourseTypeData()">
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">

                <h3 class="kt-subheader__title">
                    Edit course type
                </h3>

                <span class="kt-subheader__separator kt-subheader__separator--v"></span>


            </div>

        </div>
    </div>



    <div class="row hide" id="success_alert">
        <div class="col-xl-12">
            <div class="alert alert-outline-success fade show" role="alert">
                <div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
                <div class="alert-text">Successfully updated.</div>

            </div>
        </div>
    </div>
    <div class="row hide" id="failed_alert">
        <div class="col-xl-12">
            <div class="alert alert-outline-danger fade show" role="alert">
                <div class="alert-icon"><i class="flaticon-questions-circular-button"></i></div>
                <div class="alert-text">Failed to update</div>

            </div>
        </div>
    </div>
    <div class="row hide" id="warning_alert">
        <div class="col-xl-12">
            <div class="alert alert-outline-warning fade show" role="alert">
                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                <div class="alert-text">Course type already exists</div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <!--begin:: Widgets/Trends-->
            <div class="kt-portlet kt-portlet--head--noborder kt-portlet--height-fluid">

                <form class="kt-form kt-form--label-right">
                    <div class="kt-portlet__body">
                        <div class="form-group row ">
                            <div class="col-md-6">
                                <label>Course Type<span class="req">*</span></label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="course_type" id="course_type" placeholder="Enter Course Type" value="{{courseTypeName}}" required >
                                <span class="form-text text-muted course_type-error error-span"></span>
                            </div>
                            <div class="col-md-6">
                                <label>Status<span class="req">*</span></label>
                                <select class="form-control" id="course_type_status" name="course_type_status" ng-model="courseTypeStatus">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                <span class="form-text text-muted course_type_status-error error-span"></span>
                            </div>

                            <div class="col-md-12 pt-12">

                                <div class="text-center">
                                    <button type="button" id="submit_edit_course_type_form" class="btn btn-brand">Save</button>
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



    var edit_course_type_app = angular.module('edit_course_type_app', []);
    edit_course_type_app.controller('edit_course_type_controller', ['$scope', '$http', '$compile', '$location', '$window', function ($scope, $http, $compile, $location, $window) {
            $scope.loadCourseTypeData = function () {
                var url = $location.absUrl();
                var course_type_id = url.substring(url.lastIndexOf('/') + 1);

                if (course_type_id) {
                    $http.get(base_url + 'masters/course_type/getCourseTypeData?id=' + course_type_id)
                            .success(function (response) {

                                $scope.courseTypeName = response[0]['name'];
                                $scope.courseTypeStatus = response[0]['status'];
                            })
                }

            }
            $scope.goBack = function () {

                $window.location.href = base_url + "masters/course_type";

            }
        }]);
    var edit_course_type_div = document.getElementById('edit_course_type_div');

    angular.element(document).ready(function () {
        angular.bootstrap(edit_course_type_div, ['edit_course_type_app']);
    });
    $('#submit_edit_course_type_form').click(function (e) {
        e.preventDefault();
        var btn = $(this);
        var form = $(this).closest('form');
        form.validate({
            rules: {
                course_type: {
                    required: true,
                },
                course_type_status: {
                    required: true
                }
            }
        });
        if (!form.valid()) {
            var validator = form.validate();

            for (x in validator.errorList) {

                var error_span = (validator.errorList[x]['element'].name) + "-error";
                $("." + error_span).html(validator.errorList[x]['message']);
            }
            return;
        }
        $(".error-span").html("");
        btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
        var course_type = $("#course_type").val();
        var course_type_status = $("#course_type_status").val();
        var course_type_id = location.href.substring(location.href.lastIndexOf('/') + 1);
        //var dataString = "course_type=" + course_type + "&course_type_status=" + course_type_status + "&course_type_id=" + course_type_id;
        $.ajax({
            method: "POST",
            url: base_url + "masters/course_type/edit_course_type",
            data: {'course_type':course_type,'course_type_status':course_type_status,'course_type_id':course_type_id},
            cache: false,
            error: function (data) {
                console.log(data);
            },
            success: function (data) {

                var obj = JSON.parse(data);

                if (obj.status == "success") {
                    $("#success_alert").removeClass("hide");
                    setTimeout(function () {
                        window.location.href = base_url + "masters/course_type";
                    }, 2000);
                } else if (obj.status == "coursetype_exists") {
                    $("#warning_alert").removeClass("hide");
                    btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                    setTimeout(function () {
                        $("#warning_alert").addClass("hide");
                    }, 2000);
                } else {
                    $("#failed_alert").removeClass("hide");
                    setTimeout(function () {
                        $("#failed_alert").addClass("hide");
                    }, 2000);
                }
            }
        });
    });
</script>