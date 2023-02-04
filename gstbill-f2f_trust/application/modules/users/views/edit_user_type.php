<div class="kt-grid__item kt-grid__item--fluid kt-app__content"  id="edit_member_type_div" ng-app="edit_member_type_app" ng-controller="edit_member_type_controller" ng-cloak ng-init="loadMemberTypeData()">    <div class="kt-subheader   kt-grid__item" id="kt_subheader">        <div class="kt-container  kt-container--fluid ">            <div class="kt-subheader__main">                <h3 class="kt-subheader__title">                    Edit Member type                </h3>                <span class="kt-subheader__separator kt-subheader__separator--v"></span>            </div>        </div>    </div>    <div class="row hide" id="success_alert">        <div class="col-xl-12">            <div class="alert alert-outline-success fade show" role="alert">                <div class="alert-icon"><i class="flaticon2-check-mark"></i></div>                <div class="alert-text">Successfully updated.</div>            </div>        </div>    </div>    <div class="row hide" id="failed_alert">        <div class="col-xl-12">            <div class="alert alert-outline-danger fade show" role="alert">                <div class="alert-icon"><i class="flaticon-questions-circular-button"></i></div>                <div class="alert-text">Failed to update</div>            </div>        </div>    </div>    <div class="row hide" id="warning_alert">        <div class="col-xl-12">            <div class="alert alert-outline-warning fade show" role="alert">                <div class="alert-icon"><i class="flaticon-warning"></i></div>                <div class="alert-text">Member type already exists</div>            </div>        </div>    </div>    <div class="row">        <div class="col-xl-12">            <!--begin:: Widgets/Trends-->            <div class="kt-portlet kt-portlet--head--noborder kt-portlet--height-fluid">                <form class="kt-form kt-form--label-right">                    <div class="kt-portlet__body">                        <div class="form-group row ">                            <div class="col-md-6">                                <label>Member Type<span class="req">*</span></label>                                <input type="text" class="form-control" aria-describedby="emailHelp" name="member_type" id="member_type" placeholder="Enter Member Type" value="{{memberTypeName}}">                                <span class="form-text text-muted member_type-error error-span"></span>                            </div>                            <div class="col-md-6">                                <label>Status<span class="req">*</span></label>                                <select class="form-control" id="member_type_status" name="member_type_status" ng-model="memberTypeStatus">                                    <option value="1">Active</option>                                    <option value="0">Inactive</option>                                </select>                                <span class="form-text text-muted member_type_status-error error-span"></span>                            </div>                            <div class="col-md-12 pt-12">                                <div class="text-center">                                    <button type="button" id="submit_edit_member_type_form" class="btn btn-brand">Save</button>                                    <button type="button" class="btn btn-secondary" ng-click="goBack()">Back</button>                                </div>                            </div>                        </div>                    </div>                </form>            </div>            <!--end:: Widgets/Trends-->        </div>    </div></div><script type="text/javascript">//    $(document).ready(function () {//        $('#user_type_name').on('keyup blur', function () {//            current_user_type_name = $('#current_user_type_name').val();//            new_user_type_name = $('#user_type_name').val();//            if (new_user_type_name != current_user_type_name) {//                if ($.trim($(this).val()) != '') {//                    $.ajax({//                        type: 'POST',//                        data: {user_type_name: $.trim($('#user_type_name').val()), id: $('#user_type_id').val()},//                        url: '<?php echo base_url(); ?>users/user_types/is_user_type_available/',//                        success: function (data) {//                            if (data == 'yes') {//                                $('#user_type_name').closest('div.form-group').find('.error_msg').text('This User Type Name is not available').slideDown('500').css('display', 'inline-block');//                            } else {//                                $('#user_type_name').closest('div.form-group').find('.error_msg').text('').slideUp('500');//                            }//                        }//                    });//                }//            }//        });//        $('.submit').click(function () {//            m = 0;//            $('.required').each(function () {//                this_val = $.trim($(this).val());//                this_id = $(this).attr('id');//                this_ele = $(this);//                if (this_val == '') {//                    $(this).closest('div.form-group').find('.error_msg').text('This field is required').slideDown('500').css('display', 'inline-block');//                    m++;//                } else {//                    $(this).closest('div.form-group').find('.error_msg').text('').slideUp('500');//                }//            });//            if (m == 0) {//                current_user_type_name = $('#current_user_type_name').val();//                new_user_type_name = $('#user_type_name').val();//                if (new_user_type_name != current_user_type_name) {//                    $.ajax({//                        type: 'POST',//                        async: false,//                        data: {user_type_name: $.trim($('#user_type_name').val()), id: $('#user_type_id').val()},//                        url: '<?php echo base_url(); ?>users/user_types/is_user_type_available/',//                        success: function (data) {//                            if (data == 'yes') {//                                $('#user_type_name').closest('div.form-group').find('.error_msg').text('This User Type Name is not available').slideDown('500').css('display', 'inline-block');//                                m++;//                            } else {//                                $('#user_type_name').closest('div.form-group').find('.error_msg').text('').slideUp('500');//                            }//                        }//                    });//                }//            }//            if (m > 0)//                return false;//        });//    });    var edit_member_type_app = angular.module('edit_member_type_app', []);    edit_member_type_app.controller('edit_member_type_controller', ['$scope', '$http', '$compile', '$location', '$window', function ($scope, $http, $compile, $location, $window) {            $scope.loadMemberTypeData = function () {                var url = $location.absUrl();                var member_type_id = url.substring(url.lastIndexOf('/') + 1);                if (member_type_id) {                    $http.get(base_url + 'users/user_types/getMemberTypeData?id=' + member_type_id)                            .success(function (response) {                                console.log(response);                                $scope.memberTypeName = response[0]['member_type_name'];                                $scope.memberTypeStatus = response[0]['status'];                            })                }            }            $scope.goBack = function () {                $window.location.href = base_url + "users/user_types";            }        }]);    var dvSecond = document.getElementById('edit_member_type_div');    //alert(dvSecond);    angular.element(document).ready(function () {        angular.bootstrap(dvSecond, ['edit_member_type_app']);    });    $('#submit_edit_member_type_form').click(function (e) {        e.preventDefault();        var btn = $(this);        var form = $(this).closest('form');        form.validate({            rules: {                member_type: {                    required: true,                },                member_type_status: {                    required: true                }            }        });        if (!form.valid()) {            var validator = form.validate();            //console.log(validator.errorList);            for (x in validator.errorList) {                //console.log(validator.errorList[x]['element']);                var error_span = (validator.errorList[x]['element'].name) + "-error";                $("." + error_span).html(validator.errorList[x]['message']);            }//            setTimeout(function () {//                $(".error-span").html("");//            }, 2000);            return;        }        $(".error-span").html("");        btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);        var member_type = $("#member_type").val();        var member_type_status = $("#member_type_status").val();        var member_type_id = location.href.substring(location.href.lastIndexOf('/') + 1);        var dataString = "member_type=" + member_type + "&member_type_status=" + member_type_status + "&member_type_id=" + member_type_id;        $.ajax({            method: "POST",            url: base_url + "users/user_types/edit_member_type",            data: dataString,            cache: false,            error: function (data) {                console.log(data);            },            success: function (data) {                console.log(data);                var obj = JSON.parse(data);//                console.log(obj);                if (obj.status == "success") {                    $("#success_alert").removeClass("hide");                    setTimeout(function () {                        window.location.href = base_url + "users/user_types";                    }, 2000);                } else if (obj.status == "membertype_exists") {                    $("#warning_alert").removeClass("hide");                    btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);                    setTimeout(function () {                        $("#warning_alert").addClass("hide");                    }, 2000);                } else {                    $("#failed_alert").removeClass("hide");                    setTimeout(function () {                        $("#failed_alert").addClass("hide");                    }, 2000);                }            }        });    });</script>