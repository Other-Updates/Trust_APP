
<div class="kt-grid__item kt-grid__item--fluid kt-app__content"  id="edit_petty_cash_div" ng-app="edit_petty_cash_app" ng-controller="edit_petty_cash_controller" ng-init="pageLoad()" ng-cloak>
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">

                <h3 class="kt-subheader__title">
                    Edit Petty Cash
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
                            <div class="col-xl-12 col-lg-12 col-md-12" style="float:left;">
                                <div class="form-group row ">

                                    <div class="col-md-4">
                                        <label>Transaction Date<span class="req">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="transaction_date" id="transaction_date" placeholder="Select Date" ng-model="pettyCashDate" disabled>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar-check-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <span class="form-text text-muted transaction_date-error error-span"></span>
                                    </div>


                                    <div class="col-md-4">
                                        <label>Expense Category<span class="req">*</span></label>

                                        <select class="form-control" name="expense_category" id="expense_category" ng-model="expenseCategoryVal" ng-change="expenseCategory()">
                                            <option value="">Select Expense Category</option>
                                            <option  ng-repeat="(key, expense_category_data) in expense_category" value="{{expense_category_data.id}}" ng-selected="{{expense_category_data.id == expenseCategoryHidden}}">{{expense_category_data.expense_category}}</option>
                                        </select>
                                        <span class="form-text text-muted expense_category-error error-span"></span>
                                        <input type="hidden" name="expenseCategoryHidden" id="expenseCategoryHidden" ng-model="expenseCategoryHidden">
                                    </div>

                                    <div class="col-md-4">
                                        <label>Expense Type<span class="req">*</span></label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio">
                                                <input type="radio" name="expense_type" value="1" ng-model="expenseType"> Fixed
                                                <span></span>
                                            </label>
                                            <label class="kt-radio">
                                                <input type="radio" name="expense_type" value="2" ng-model="expenseType"> Variable
                                                <span></span>
                                            </label>
                                        </div>
                                        <span class="form-text text-muted expense_type-error error-span"></span>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Details</label>
                                        <textarea class="form-control" name="details" id="details" placeholder="Enter Details" ng-model="expenseDetails"></textarea>
                                        <span class="form-text text-muted details-error error-span"></span>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Amount<span class="req">*</span></label>
                                        <input type="text" class="form-control validate_amount" name="amount" id="amount" placeholder="Enter Amount" ng-model="amount">
                                        <span class="form-text text-muted amount-error error-span"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Transaction Type<span class="req">*</span></label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio">
                                                <input type="radio" name="transaction_type" value="1" ng-model="transactionType"> Cash in
                                                <span></span>
                                            </label>
                                            <label class="kt-radio">
                                                <input type="radio" name="transaction_type" value="2" ng-model="transactionType"> Cash out
                                                <span></span>
                                            </label>
                                        </div>
                                        <span class="form-text text-muted transaction_type-error error-span"></span>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="form-group row ">

                            <div class="col-md-12 pt-12">

                                <div class="text-center">
                                    <button type="button" id="submit_edit_petty_cash_form" class="btn btn-brand">Save</button>
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
    var edit_petty_cash_app = angular.module('edit_petty_cash_app', []);
    edit_petty_cash_app.controller('edit_petty_cash_controller', ['$scope', '$http', '$compile', '$location', '$window', '$timeout', function ($scope, $http, $compile, $location, $window, $timeout) {

            $scope.pageLoad = function () {
                var url = $location.absUrl();
                var petty_cash_id = url.substring(url.lastIndexOf('/') + 1);
                if (petty_cash_id) {
                    $http.get(base_url + 'petty_cash/getPettyCashData?id=' + petty_cash_id)
                            .success(function (response) {
                                console.log(response);
                                //return;
                                $scope.pettyCashDate = $scope.convertToFormDate(response.petty_cash[0]['date']);
                                $scope.expenseCategoryHidden = response.petty_cash[0]['expense_id'];
                                $scope.expenseType = response.petty_cash[0]['expense_type'];
                                $scope.expenseDetails = response.petty_cash[0]['details'];
                                $scope.transactionType = response.petty_cash[0]['transaction_type'];
                                var amount = 0;
                                if (response.petty_cash[0]['transaction_type'] == "1") {
                                    amount = response.petty_cash[0]['cash_in'];
                                } else {
                                    amount = response.petty_cash[0]['cash_out'];
                                }
                                $scope.amount = amount;

                                $scope.loadExpenseCategory();

                                if (response.petty_cash[0]['expense_id'] == "1") {
                                    //$scope.expenseCategoryVal = "1";
                                    $("#expense_category").prop("disabled", true);
                                    //$scope.expenseType = "1";
                                    $("input[name='expense_type']").prop("disabled", true);
                                    //$("#details").val("Opening balance");
                                    $("#details").prop("disabled", true);
                                    //$scope.transactionType = "1";
                                    $("input[name='transaction_type']").prop("disabled", true);
                                    $("#amount").prop("disabled", true);
                                    
                                }


                                setTimeout(function () {

                                    KTFormWidgets.init();
                                    if (response.petty_cash[0]['expense_id'] == "2") {

                                        $("input[name='expense_type']").prop("disabled", true);

                                        $("#details").prop("disabled", true);

                                        $("input[name='transaction_type']").prop("disabled", true);

                                        $("#amount").prop("disabled", true);
                                        $scope.updateClosingBalance();

                                    }
                                    $('#submit_edit_petty_cash_form').attr("disabled", false);
                                }, 100);

                            });
                }

            }

            $scope.loadExpenseCategory = function () {
                $http.get(base_url + 'petty_cash/get_expense_category')
                        .success(function (data) {
                            $scope.expense_category = data.expense_category;
                        })
            }

            $scope.expenseCategory = function () {
                if ($scope.expenseCategoryVal == "2") {
                    if ($("#transaction_date").val() != "") {
                        var transaction_date = converToMysqlDate($("#transaction_date").val());
                        $(".transaction_date-error").html("");
                        $("#transaction_date").removeClass("is-invalid");
                        var transaction_date = converToMysqlDate($("#transaction_date").val());
                        $http.get(base_url + 'petty_cash/check_closing_balance/' + transaction_date)
                                .success(function (data) {
                                    console.log(data);
                                    //return;

                                    //$("#expense_category").prop("disabled", true);
                                    $scope.expenseType = "1";
                                    $("input[name='expense_type']").prop("disabled", true);
                                    $("#details").val("Closing balance");
                                    $("#details").prop("disabled", true);
                                    $scope.transactionType = "1";
                                    $("input[name='transaction_type']").prop("disabled", true);
                                    $scope.amount = data.closing_balance;
                                    $("#amount").prop("disabled", true);
                                })
                    } else {
                        $(".transaction_date-error").html("Choose date");
                        $("#transaction_date").addClass("is-invalid");
                    }
                } else if ($scope.expenseCategoryVal == "1") {
                    if ($("#transaction_date").val() != "") {
                    var transaction_date = converToMysqlDate($("#transaction_date").val());
                    $(".transaction_date-error").html("");
                    $("#transaction_date").removeClass("is-invalid");
                    $http.get(base_url + 'petty_cash/check_opening_balance/' + transaction_date)
                            .success(function (data) {
                                console.log(data);
                                //return;
                                if (data.result == "no_opening_balance") {
                                    $scope.expenseCategoryVal = "1";
                                    $("#expense_category").prop("disabled", true);
                                    $scope.expenseType = "1";
                                    $("input[name='expense_type']").prop("disabled", true);
                                    $("#details").val("Opening balance");
                                    $("#details").prop("disabled", true);
                                     $("#amount").val(data.closing_balance);
                                     $("#amount").prop("disabled", true);
                                    $scope.transactionType = "1";
                                    $("input[name='transaction_type']").prop("disabled", true);
                                } else {
                                    $scope.expenseCategoryVal = "";
                                    $("#expense_category").prop("disabled", false);
                                    $("input[name='expense_type']").prop("disabled", false);
                                    $("#details").val("");
                                    $("#details").prop("disabled", false);
                                    $scope.transactionType = "";
                                    $("input[name='transaction_type']").prop("disabled", false);
                                    $("#amount").prop("disabled", false);
                                }
                            })
                } else {
                    $(".transaction_date-error").html("Choose date");
                    $("#transaction_date").addClass("is-invalid");
                }
                }
                 else {

                    $("#expense_category").prop("disabled", false);
                    $("input[name='expense_type']").prop("disabled", false);
                    $("#details").val("");
                    $("#details").prop("disabled", false);
                    $scope.transactionType = "";
                    $("input[name='transaction_type']").prop("disabled", false);
                    $scope.amount = "";
                    $("#amount").prop("disabled", false);
                }
            }

            $scope.updateClosingBalance = function () {
                //alert($("#transaction_date").val());
                if ($("#transaction_date").val() != "") {
                    var transaction_date = converToMysqlDate($("#transaction_date").val());
                    $(".transaction_date-error").html("");
                    $("#transaction_date").removeClass("is-invalid");
                    var transaction_date = converToMysqlDate($("#transaction_date").val());
                    $http.get(base_url + 'petty_cash/check_closing_balance/' + transaction_date)
                            .success(function (data) {
                                //console.log(data);
                                $scope.amount = data.closing_balance;
                            })
                } else {
                    $(".transaction_date-error").html("Choose date");
                    $("#transaction_date").addClass("is-invalid");
                }
            }

            $scope.convertToFormDate = function (date_val) {

                var dateSplit = date_val.split("-");
                var convertedDate = dateSplit[2] + "/" + dateSplit[1] + "/" + dateSplit[0];
                return convertedDate;
            }

            $scope.goBack = function () {

                $window.location.href = base_url + "petty_cash";

            }


        }]);


    var edit_petty_cash_div = document.getElementById('edit_petty_cash_div');
    //alert(dvSecond);
    angular.element(document).ready(function () {
        angular.bootstrap(edit_petty_cash_div, ['edit_petty_cash_app']);
    });

    edit_petty_cash_app.filter('convertDate', function () {
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

    $('#submit_edit_petty_cash_form').click(function (e) {
        e.preventDefault();
        var btn = $(this);
        var form = $(this).closest('form');
        form.validate({
            rules: {
                transaction_date: {
                    required: true,
                },
                expense_category: {
                    required: true,
                },
                transaction_type: {
                    required: true
                },
                amount: {
                    required: true
                },
                expense_type: {
                    required: true
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
        btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
        var transaction_date_datepicker = $("#transaction_date").val();
        var expense_category = $("#expense_category").val();
        var details = $("#details").val();
        var amount = $("#amount").val();
        var expense_type = $("input[name='expense_type']:checked").val();
        var transaction_type = $("input[name='transaction_type']:checked").val();

        var transaction_date = converToMysqlDate(transaction_date_datepicker);

        var url = window.location.href;
        var petty_cash_id = url.substring(url.lastIndexOf('/') + 1);

        var formData = new FormData();
        formData.append("petty_cash_id", petty_cash_id);
        formData.append("transaction_date", transaction_date);
        formData.append("expense_category", expense_category);
        formData.append("details", details);
        formData.append("amount", amount);
        formData.append("expense_type", expense_type);
        formData.append("transaction_type", transaction_type);
        $.ajax({
            method: "POST",
            url: base_url + "petty_cash/edit_petty_cash_details",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            error: function (data) {
                console.log(data);
            },
            success: function (data) {
                //console.log(data);
                btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                var obj = JSON.parse(data);
                //console.log(obj);
                $(".error-span").html("");
                if (obj.status == "success") {

                    swal.fire({
                        "title": "Success",
                        "text": "Petty cash has been updated successfully!",
                        "type": "success",
                        "confirmButtonClass": "btn btn-secondary"
                    }).then(function () {
                        window.location = base_url + 'petty_cash';
                    });


                } else if (obj.status == "no_sufficient_balance") {
                    $(".amount-error").html("Avalilable balance is &#8377; " + obj.balance);
                    $("#amount").addClass("is-invalid");
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
    });

    var KTFormWidgets = function () {
        // Private functions
        var initWidgets = function () {
            var date = new Date();
            var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
            $('#transaction_date').datepicker({
                todayHighlight: true,
                format: 'dd/mm/yyyy',
                templates: {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                }
            });

            $('#transaction_date').datepicker('setDate', today);

        }
        return {
            // public functions
            init: function () {
                initWidgets();
            }
        };
    }();

    function converToMysqlDate(date_val) {
        var date_split = date_val.split("/");
        var converted_date = date_split[2] + "-" + date_split[1] + "-" + date_split[0];
        return converted_date;
    }
    $(document).on('keypress', '.validate_amount', function (event) {
        //console.log(event.which);
        //console.log(isNaN(String.fromCharCode(event.which)));
        if (event.which != 8 && isNaN(String.fromCharCode(event.which))) {
            event.preventDefault();
        }
    });


</script>