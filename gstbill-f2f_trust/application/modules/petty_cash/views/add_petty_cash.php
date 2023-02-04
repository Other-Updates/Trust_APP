
<div class="kt-grid__item kt-grid__item--fluid kt-app__content"  id="add_petty_cash_div" ng-app="add_receipt_app" ng-controller="add_petty_cash_controller" ng-init="pageLoad()" ng-cloak>
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">

                <h3 class="kt-subheader__title">
                    Add Petty Cash
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
                                            <input type="text" class="form-control" name="transaction_date" id="transaction_date" placeholder="Select Date" ng-blur="checkOpeningBalance()">
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
                                            <option  ng-repeat="(key, expense_category_data) in expense_category" value="{{expense_category_data.id}}">{{expense_category_data.expense_category}}</option>
                                        </select>
                                        <span class="form-text text-muted expense_category-error error-span"></span>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Expense Type<span class="req">*</span></label>
                                        <div class="kt-radio-inline">
                                            <label class="kt-radio">
                                                <input type="radio" name="expense_type" value="1" ng-model="expenseType" checked> Fixed
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
                                        <textarea class="form-control" name="details" id="details" placeholder="Enter Details"></textarea>
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
                                                <input type="radio" name="transaction_type" value="2" ng-model="transactionType" checked> Cash out
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
                                    <button type="button" id="submit_add_petty_cash_form" class="btn btn-brand">Save</button>
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


    var add_petty_cash_app = angular.module('add_petty_cash_app', []);
    add_petty_cash_app.controller('add_petty_cash_controller', ['$scope', '$http', '$compile', '$location', '$window', '$timeout', function ($scope, $http, $compile, $location, $window, $timeout) {

            $scope.pageLoad = function () {

                $scope.loadExpenseCategory();
            }


            $scope.loadExpenseCategory = function () {
                $http.get(base_url + 'petty_cash/get_expense_category')
                        .success(function (data) {
                            $scope.expense_category = data.expense_category;
                            $scope.checkOpeningBalance();
                        })
            }

            $scope.checkOpeningBalance = function () {

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
                                     if($.trim(data.closing_balance)!='null' && $.trim(data.closing_balance)!='')
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
                }else {

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
            $scope.goBack = function () {

                $window.location.href = base_url + "petty_cash";

            }

            KTFormWidgets.init();
        }]);


    var add_petty_cash_div = document.getElementById('add_petty_cash_div');
    //alert(dvSecond);
    angular.element(document).ready(function () {
        angular.bootstrap(add_petty_cash_div, ['add_petty_cash_app']);
    });

    add_petty_cash_app.filter('convertDate', function () {
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

    $('#submit_add_petty_cash_form').click(function (e) {
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
            //console.log(validator.errorList);
            for (x in validator.errorList) {
                //console.log(validator.errorList[x]['element']);
                var el_id = validator.errorList[x]['element'].name;
                //console.log(validator.errorList[x]['element']);
                //console.log(el_id);
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

        var formData = new FormData();
        formData.append("transaction_date", transaction_date);
        formData.append("expense_category", expense_category);
        formData.append("details", details);
        formData.append("amount", amount);
        formData.append("expense_type", expense_type);
        formData.append("transaction_type", transaction_type);
        $.ajax({
            method: "POST",
            url: base_url + "petty_cash/add_new_petty_cash",
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
                        "text": "New petty cash has been successfully added!",
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