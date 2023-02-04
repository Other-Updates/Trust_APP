

<div class="kt-grid__item kt-grid__item--fluid kt-app__content"  id="add_application_type_div" ng-app="add_application_type_div" ng-controller="add_application_type_controller" ng-cloak>

<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">

            <h3 class="kt-subheader__title">
                Add Application type
            </h3>

            <span class="kt-subheader__separator kt-subheader__separator--v"></span>


        </div>

    </div>
</div>

<div class="row hide" id="success_alert">
    <div class="col-xl-12">
        <div class="alert alert-outline-success fade show" role="alert">
            <div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
            <div class="alert-text">Successfully added new application type</div>

        </div>
    </div>
</div>
<div class="row hide" id="failed_alert">
    <div class="col-xl-12">
        <div class="alert alert-outline-danger fade show" role="alert">
            <div class="alert-icon"><i class="flaticon-questions-circular-button"></i></div>
            <div class="alert-text">Failed to add new application type</div>

        </div>
    </div>
</div>
<div class="row hide" id="warning_alert">
    <div class="col-xl-12">
        <div class="alert alert-outline-warning fade show" role="alert">
            <div class="alert-icon"><i class="flaticon-warning"></i></div>
            <div class="alert-text">Application type already exists</div>

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
                            <label>Application Type<span class="req">*</span></label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" name="application_type" id="application_type" placeholder="Enter Application Type">
                            <span class="form-text text-muted application_type-error error-span"></span>
                        </div>
                        <div class="col-md-6">
                            <label>Status<span class="req">*</span></label>
                            <select class="form-control" id="application_type_status" name="application_type_status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            <span class="form-text text-muted application_type_status-error error-span"></span>
                        </div>

                        <div class="col-md-12 pt-12">

                            <div class="text-center">
                                <button type="button" id="submit_add_application_type_form" class="btn btn-brand">Save</button>
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

var add_application_type_app = angular.module('add_application_type_app', []);
add_application_type_app.controller('add_application_type_controller', ['$scope', '$http', '$compile', '$location', '$window', function ($scope, $http, $compile, $location, $window) {

        $scope.goBack = function () {
            $window.location.href = base_url + "masters/application_type";
        }
    }]);
var add_application_type_div = document.getElementById('add_application_type_div');
//alert(dvSecond);
angular.element(document).ready(function () {
    angular.bootstrap(add_application_type_div, ['add_application_type_app']);
});



$('#submit_add_application_type_form').click(function (e) {
    e.preventDefault();
    var btn = $(this);
    var form = $(this).closest('form');

    form.validate({
        rules: {
            application_type: {
                required: true,
            },
            application_type_status: {
                required: true
            }
        }
    });

    if (!form.valid()) {
        var validator = form.validate();

        for (x in validator.errorList) {
            //console.log(validator.errorList[x]['element']);
            var error_span = (validator.errorList[x]['element'].name) + "-error";
            $("." + error_span).html(validator.errorList[x]['message']);
        }
        return;
    }
    $(".error-span").html("");
    btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
    var application_type = $("#application_type").val();
    var application_type_status = $("#application_type_status").val();
    var dataString = "application_type=" + application_type + "&application_type_status=" + application_type_status;

    $.ajax({
        method: "POST",
        url: base_url + "masters/application_type/add_application_type",
        data: dataString,
        cache: false,
        error: function (data) {
            console.log(data);
        },
        success: function (data) {

            var obj = JSON.parse(data);

            if (obj.status == "success") {
                $("#success_alert").removeClass("hide");
                setTimeout(function () {
                    window.location.href = base_url + "masters/application_type";
                }, 2000);


            } else if (obj.status == "applicationtype_exists") {
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