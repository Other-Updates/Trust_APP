<style>
    table tbody tr td:nth-child(1){text-align:center;}
    table tbody tr td:nth-child(2){text-align:center;}
    table tbody tr td:nth-child(3){text-align:right;}
    table tbody tr td:nth-child(4){text-align:center;}	
    table tbody tr td:nth-child(5){text-align:right;}	
    table tbody tr td:nth-child(6){text-align:center;}
    .kt-checkbox {margin-bottom: 0rem; margin-right: 8px;}

    .kt-widget24 .kt-widget24__details{position:relative; z-index:9;}
</style>

<?php $theme_path = $this->config->item('theme_locations') . 'esms'; ?>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>-->
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"  id="report_div" ng-app="report_app" ng-controller="report_controller" ng-init="loadPage()" ng-cloak>
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">

                <h3 class="kt-subheader__title">
                    Loan Report
                </h3>

                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <label class="kt-checkbox kt-checkbox--tick kt-checkbox--brand">
                    <input type="checkbox" name="all" value="all" checked> All
                    <span></span>
                </label>
                <div class="kt-subheader__group" id="kt_subheader_search">

                    <form class="kt-margin-l-20-mobile1" id="kt_subheader_search_form">
                        <div class="kt-input-icon kt-input-icon--right kt-subheader__search">
                            <select class="form-control" name="course_type" id="course_type"  disabled>
                                <option value="">Select Course Type</option>
                                <option  ng-repeat="(key, courseTypeData) in courseType" value="{{courseTypeData.id}}">{{courseTypeData.name}}</option>
                            </select>
                        </div>
                    </form>
                </div>
                &nbsp;

            </div>


            <div class="kt-subheader__main">
                <h4 class="kt-subheader__title">
                    Receipt Year
                </h4>
                <div class="kt-subheader__group" id="kt_subheader_search">
                    <form class="" id="kt_subheader_search_form">
                        <div class="kt-input-icon kt-input-icon--right kt-subheader__search">
                            <input type="text" class="form-control" placeholder="From Year" id="from_date" disabled>
                            <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                <span>
                                    <i class="flaticon2-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="kt-subheader__group" id="kt_subheader_search">
                    <form class="kt-margin-l-20" id="kt_subheader_search_form">
                        <div class="kt-input-icon kt-input-icon--right kt-subheader__search">
                            <input type="text" class="form-control" placeholder="To Year" id="to_date" disabled>
                            <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                <span>
                                    <i class="flaticon2-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </form>
                </div>

                <div class="kt-subheader__toolbar" >
                    <a class="btn btn-label-brand btn-bold m-l-15" id="search" ng-click='dateSearch()'>
                        <i class="flaticon2-magnifier-tool"></i></a>
                    <a class="btn btn-label-danger btn-bold" id="reload" ng-click='reloadDT()'>
                        <i class="flaticon2-refresh-button"></i></a>
                </div>
            </div>
            <div class="kt-subheader__main">
                <div class="dropdown dropdown-inline">
                    <button type="button" class="btn btn-danger btn-icon-sm" id="download_pdf" aria-haspopup="true" aria-expanded="false">
                        <i class="la la-file-pdf-o"></i> PDF
                    </button>
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
            </div>


        </div>
        <input type="hidden" id="hasEdit" value="0">
        <input type="hidden" id="hasDelete" value="0">
    </div>


    <div class="kt-portlet__body  kt-portlet__body--fit">
        <div class="row row-no-padding row-col-separator-lg">

            <div class="col-md-6 col-lg-6 col-xl-6 kt-iconbox--info kt-iconbox--animate-fast">
                <div class="kt-widget24">
                    <div class="kt-widget24__details">
                        <div class="kt-widget24__info">
                            <h4 class="kt-widget24__title">
                                Total Loan Amount
                            </h4>
                        </div>
                        <span class="kt-widget24__stats kt-font-brand" id="scholarshipsTotalAmount">
                            &#8377;  0
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6 kt-iconbox--danger kt-iconbox--animate-fast">
                <div class="kt-widget24">
                    <div class="kt-widget24__details">
                        <div class="kt-widget24__info">
                            <h4 class="kt-widget24__title">
                                Total Repayment Amount
                            </h4>
                        </div>
                        <span class="kt-widget24__stats kt-font-danger" id="repaymentRepaymentAmount">
                            &#8377; 0
                        </span>
                    </div>
                </div>
            </div>
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
                <div class="report-datatable" id="ajax_data"></div>
                <!--end: Datatable -->
            </div>
        </div>	</div>
    <!-- end:: Content -->
</div>

<div id="export_excel"></div>
<script>
    var report_app = angular.module('report_app', []);
    report_app.controller('report_controller', ['$scope', '$http', '$compile', '$location', '$window', function ($scope, $http, $compile, $location, $window) {

            $scope.loadPage = function () {

                $http.get(base_url + 'users/getPermissions')
                        .success(function (response) {
                            //console.log(response);
                            var modules_permission = response.modules;
                            $scope.isVisible = "false";

                            if (modules_permission['reports']) {
                                if (modules_permission['reports']['loan_repayment_summary_report']) {

                                    dataTable.init();
                                    KTFormWidgets.init();
                                    $scope.loadCourseType();
                                    loadTotalAmount();
                                } else {
                                    //$window.location.href = base_url + "dashboard";
                                }
                            } else {
                                //$window.location.href = base_url + "dashboard";
                            }


                        })
            };

            $scope.loadCourseType = function () {
                $http.get(base_url + 'reports/loan_report/get_course_type')
                        .success(function (data) {

                            $scope.courseType = data.course_type;
                        })
            }

        }]);
    var report_div = document.getElementById('report_div');
    //alert(dvSecond);
    angular.element(document).ready(function () {
        angular.bootstrap(report_div, ['report_app']);
    });

    function loadTotalAmount() {
        var all = "";
        if ($('input[name=all]').prop("checked")) {
            all = true;
        } else {
            all = false;
        }
        var form_date = $("#from_date").val();
        var to_date = $("#to_date").val();
        var course_type = $("#course_type").val();

        var fromDate = form_date;
        if (form_date) {
            //fromDate = convertDate(form_date);
        }
        var toDate = to_date;
        if (to_date) {
            //toDate = convertDate(to_date);
        }

        var dataString = "fromDate=" + fromDate + "&toDate=" + toDate + "&course_type=" + course_type + "&all=" + all;

        $.ajax({
            method: "POST",
            url: base_url + "reports/loan_repayment_summary_report/get_total_amounts",
            data: dataString,
            error: function (data) {
                console.log(data);
            },
            success: function (data) {
                //console.log(data);
                var obj = JSON.parse(data);
                //console.log(obj.totalAmount[0]['scholarshipTotal']);
                var scholarship_total = 0;
                if (obj.totalAmount[0]['scholarshipTotal'] != null) {
                    scholarship_total = obj.totalAmount[0]['scholarshipTotal'];
                }
                var repayment_total = 0;
                if (obj.totalAmount[0]['repaymentTotal'] != null) {
                    repayment_total = obj.totalAmount[0]['repaymentTotal'];
                }
                $("#scholarshipsTotalAmount").html(" &#8377; " + scholarship_total);
                $("#repaymentRepaymentAmount").html(" &#8377; " + repayment_total);
            }
        });
    }

    var dataTable = function () {
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

            var datatable = $('.report-datatable').KTDatatable({
                // datasource definition
                data: {
                    type: 'remote',
                    method: 'POST',
                    source: {
                        read: {
                            //url: 'https://keenthemes.com/metronic/tools/preview/inc/api/datatables/demos/default.php',
                            url: base_url + 'reports/loan_repayment_summary_report/getLoanRepaymentSummaryReport',
                            map: function (raw) {
                                var indexNumber = 0;
                                if (typeof raw.data !== 'undefined') {
                                    var dataSet = raw.data;

                                    $.each(dataSet, function (key, value) {
                                        dataSet[key].indexNumber = parseInt(key) + 1;
                                    });
                                    //console.log(dataSet);
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
                columns: [
                    {
                        field: 'indexNumber',
                        title: '#',
                        sortable: 'asc',
                        width: 10,
                        type: 'number',
                        selector: false,
                        textAlign: 'center',
                        template: function (row) {
                            return '<span class="">' + row.indexNumber + '</span>';
                        },
                    }, {
                        field: 'receipt_year',
                        title: 'Year',
                        template: function (row) {
                            //console.log(row);

                            return '<span class="bold-name txt-tf-caps ">' + row.receipt_year + '</span>';
                        },
                    },
                    {
                        field: 'scholarshipTotal',
                        title: 'Total Loan Amt (&#8377;)',
                    },
                    {
                        field: 'no_of_application',
                        title: 'No of Application',
                        
                    },
                    {
                        field: 'repaymentTotal',
                        title: 'Total Repayment Amt (&#8377;)',
                    },
                    {
                        field: 'no_of_repayment_application',
                        title: 'No Of Repayment Application',
                    },
                ],
                // fnRowCallback: function (nRow, aData, iDisplayIndex) {
                //alert("rows");
                //alert(iDisplayIndex);
                //$("td:nth-child(1)", nRow).html(iDisplayIndex + 1);
                //return nRow;
                //}
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
            $('#search').on('click', function () {
                var form_date = $("#from_date").val();
                var to_date = $("#to_date").val();
                var course_type = $("#course_type").val();

                var fromDate = form_date;
                if (form_date) {
                    //fromDate = convertDate(form_date);
                }
                var toDate = to_date;
                if (to_date) {
                    //toDate = convertDate(to_date);
                }

                var value = {
                    fromDate: fromDate,
                    toDate: toDate,
                    course_type: course_type,
                }
                datatable.setDataSourceParam('query', value);
                datatable.load();
                loadTotalAmount();
            });
            $('#reload').on('click', function () {
                $("#from_date").val("");
                $("#to_date").val("");
                $("#course_type").val("");
                $("#country").prop("disabled", true);
                $("#from_date").prop("disabled", true);
                $("#to_date").prop("disabled", true);
                $("#course_type,#from_date,#to_date").prop("disabled", true);
                $("input:checkbox").prop('checked',true);
                var value = {
                    generalSearch: "",
                }
                datatable.setDataSourceParam('query', value);
                datatable.load();
                loadTotalAmount();
                
            });
            //$('#kt_form_status,#kt_form_type').selectpicker();

            $(document).on('change', 'input[name=all]', function () {
                if (this.checked) {
                    $("#course_type").prop("disabled", true);
                    $("#from_date").prop("disabled", true);
                    $("#to_date").prop("disabled", true);
                    $("#course_type").val("");
                    $("#from_date").val("");
                    $("#to_date").val("");
                    var value = {
                        all: true,
                    }
                    datatable.setDataSourceParam('query', value);
                    datatable.load();
                    loadTotalAmount();
                } else {
                    $("#course_type").prop("disabled", false);
                    $("#from_date").prop("disabled", false);
                    $("#to_date").prop("disabled", false);
                }
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
        var converted_date = split_date[2] + "-" + split_date[0] + "-" + split_date[1];
        return converted_date;
    }



    var KTFormWidgets = function () {
        // Private functions
        var initWidgets = function () {
            $('#from_date').datepicker({
                todayHighlight: true,
                format :'yyyy',
                viewMode: "years",
                minViewMode: "years",
                templates: {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                }
            }).on('changeDate', function (ev, date) {
                //alert(date);
                var selectedDate = $(this).datepicker('getDate');
                // alert(selectedDate); return;
                if (selectedDate != null) {
                    var selectedMonth = selectedDate.getMonth();
                    var selectedYear = selectedDate.getFullYear();
                    var lastDate = new Date(selectedYear, 1 + 1, 0);
                    var lastDay = lastDate.getDate();
                    //alert(lastDay);
                    $(this).datepicker('update', new Date(selectedYear, 0, 31));
                    //$(this).val(selectedYear);
                }
            });
            $('#to_date').datepicker({
                todayHighlight: true,
                viewMode: "years",
                minViewMode: "years",
                format :'yyyy',
                templates: {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                }
            }).on('changeDate', function (ev, date) {
                //alert(date);
                var selectedDate = $(this).datepicker('getDate');
                // alert(selectedDate); return;
                if (selectedDate != null) {
                    var selectedMonth = selectedDate.getMonth();
                    var selectedYear = selectedDate.getFullYear();
                    var lastDate = new Date(selectedYear, 11 + 1, 0);
                    var lastDay = lastDate.getDate();
                    //alert(lastDay);
                    $(this).datepicker('update', new Date(selectedYear, 11, 31));
                    //$(this).val(selectedYear);
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
    $(document).on('click', '.member_edit', function () {
        var member_id = $(this).attr("data-id");
        window.location.href = base_url + "members/edit/" + member_id;
    });
    $(document).on('click', '.view', function (e) {
        e.preventDefault();
        var link = $(this).attr("data-link");
        window.open(link);
    });
    $(document).on('click', '.view_position_history', function () {
        var member_id = $(this).attr("data-id");
        window.location.href = base_url + "members/position_history/" + member_id;
    });


</script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
 dev URL
<script src="https://rawgit.com/unconditional/jquery-table2excel/master/src/jquery.table2excel.js"></script>-->
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

        var scholarshipsTotalAmount = document.getElementById("scholarshipsTotalAmount").innerHTML;
        var repaymentRepaymentAmount = document.getElementById("repaymentRepaymentAmount").innerHTML;
        tab_text = tab_text + "<tr><td>Total Loan Amount</td><td>" + scholarshipsTotalAmount + "</td><td>Total Repayment Amount</td><td>" + repaymentRepaymentAmount + "</td></tr>";
        //alert(jq("#scholarshipsTotalAmount").html());
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

        jq("#custom_export").table2excel({
            exclude: ".noExl",
            name: "Loan and Repayment Summary Report",
            filename: "Loan-and-Repayment-Summary-Report",
            fileext: ".xls",
            exclude_img: false,
            exclude_links: false,
            exclude_inputs: false
        });


    }

    jq(document).on('click', '#entire_data_export,#download_pdf', function () {
        //alert("sjdhfjk");
        //alert(base_url);
        if($(this).attr('id')=='download_pdf'){	
            var type = 'pdf';	
        }else{	
            var type = 'excel';	
        }
        var form_date = $("#from_date").val();
        var to_date = $("#to_date").val();
        var course_type = $("#course_type").val();
        var all = "";
        //alert($("input[name=all]").prop("checked"));
        //return;
        if ($("input[name=all]").prop("checked")) {
            all = true;
        } else {
            all = false;
        }
        var fromDate = form_date;
        if (form_date) {
            //fromDate = convertDate(form_date);
        }
        var toDate = to_date;
        if (to_date) {
            //toDate = convertDate(to_date);
        }

        var arr = [];

        arr.push({'from': fromDate});
        arr.push({'to': toDate});
        arr.push({'course_type': course_type});
        arr.push({'all': all});
        arr.push({'type': type});
        var arrStr = JSON.stringify(arr);

        window.location.replace(base_url + 'reports/loan_repayment_summary_report/get_export_loan_repayment_summary_report?search=' + arrStr);
    });
</script>