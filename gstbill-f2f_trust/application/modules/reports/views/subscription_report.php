<style>
    .kt-datatable__table tbody tr td:nth-child(6) span{text-align:right !important;}
    .kt-datatable__table tbody tr td:nth-child(5) span, .kt-datatable__table tbody tr td:nth-child(7) span{text-align:center !important;}
    .kt-checkbox {margin-bottom: 0rem; margin-right: 8px;}
</style>

<?php $theme_path = $this->config->item('theme_locations') . 'esms'; ?>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>-->
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"  id="report_div" ng-app="report_app" ng-controller="report_controller" ng-init="loadPage()" ng-cloak>
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">

                <h3 class="kt-subheader__title">
                    Subscription Report
                </h3>

                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <label class="kt-checkbox kt-checkbox--tick kt-checkbox--brand">
                    <input type="checkbox" name="all" value="all" checked> All
                    <span></span>
                </label>
                <div class="kt-subheader__group" id="kt_subheader_search">

                    <form class="kt-margin-l-20-mobile1" id="kt_subheader_search_form">
                        <div class="kt-input-icon kt-input-icon--right kt-subheader__search">
                            <select class="form-control" name="country" id="country" ng-model="countryVal" disabled>
                                <option value="">Select Country</option>
                                <option  ng-repeat="(key, country) in countries" value="{{country.id}}" ng-selected="{{country.id == countryHidden}}">{{country.countries_name}}</option>
                            </select>
                        </div>
                    </form>
                </div>
                &nbsp;

            </div>


            <div class="kt-subheader__main">
                <h4 class="kt-subheader__title">
                    Last subscription
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
                    <form class="kt-margin-l-5" id="kt_subheader_search_form">
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
                    <a class="btn btn-label-brand btn-bold m-l-5" id="search" ng-click='dateSearch()'>
                        <i class="flaticon2-magnifier-tool"></i></a>
                    <a class="btn btn-label-danger btn-bold" id="reload" ng-click='reloadDT()'>
                        <i class="flaticon2-refresh-button"></i></a>
                </div>

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
                                if (modules_permission['reports']['subscription_report']) {
                                    dataTable.init();
                                    KTFormWidgets.init();
                                    $scope.loadCountry();
                                } else {
                                    $window.location.href = base_url + "users/my_profile";
                                }
                            } else {
                                $window.location.href = base_url + "users/my_profile";
                            }


                        })
            };
            $scope.addMember = function () {
                $window.location.href = base_url + "members/add";
            }
            $scope.loadCountry = function () {
                $http.get(base_url + 'reports/subscription_report/get_country_list')
                        .success(function (data) {
                            //console.log(data);
                            $scope.countries = data.country;
                            // $scope.countryHidden = '99';

                        })
            }

        }]);
    var report_div = document.getElementById('report_div');
    //alert(dvSecond);
    angular.element(document).ready(function () {
        angular.bootstrap(report_div, ['report_app']);
    });
    var dataTable = function () {
        // Private functions

        // basic demo
        var demo = function () {

            var form_date = $("#from_date").val();
            var to_date = $("#to_date").val();
            var fromDate = form_date;
            if (form_date) {
               // fromDate = convertDate(form_date);
            }
            var toDate = to_date;
            if (to_date) {
                //toDate = convertDate(to_date);
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
                            url: base_url + 'reports/subscription_report/getSubscriptionReport',
                            map: function (raw) {
                                var indexNumber = 0;
                                if (typeof raw.data !== 'undefined') {
                                    var dataSet = raw.data;

                                    $.each(dataSet, function (key, value) {
                                        dataSet[key].indexNumber = parseInt(key) + 1;
                                    });
                                   // console.log(dataSet);
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
                        width: 50,
                        type: 'number',
                        selector: false,
                        textAlign: 'center',
                        template: function (row) {
                            return '<span class="">' + row.indexNumber + '</span>';
                        },
                    }, {
                        field: 'name',
                        title: 'Name',
                        template: function (row) {
                            //console.log(row);

                            return '<span class="bold-name txt-tf-caps ">' + row.name + '</span>';
                        },
                    }, {
                        field: 'member_type_name',
                        title: 'Member Type',
                    },
                    {
                        field: 'countries_name',
                        title: 'Country',
                        width: 80,
                    },
                    {
                        field: 'last_subscription_year',
                        title: 'Last Subscription Date',
                        width: 90,
                        template: function (row) {
                            var date = convertDateFormat(row.last_subscription_year);
                            return date;
                        },
                    },
                    {
                        field: 'last_subscription_amount',
                        title: 'Last Subscription Amount',
                    },
                    {
                        field: 'last_subscription_year_due',
                        title: 'Subscription Due',
                        width: 90,
                        template: function (row) {
                            if(row.last_subscription_year == null && row.last_subscription_amount == '-')
                                var due_year = row.member_since;
                            else
                                var due_year = row.last_subscription_year;
                            var due_year = findDueYears(due_year);
                            
                            if(due_year){
                                $due = '<span class="btn btn-bold btn-sm btn-font-sm  btn-label-success">'+due_year+ '</span>';
                            }else{
                                $due = '<span class="btn btn-bold btn-sm btn-font-sm  btn-label-danger">No due</span>';
                            }
                            return $due;
                        },
                    },  {
                        field: 'Link',
                        title: 'Profile Link',
                        sortable: false,
                        width: 90,
                        template: function (row) {

                            var profile_img='';
                            if (row.profile_picture != "null" && row.profile_picture != "") {
                                    profile_img = base_url + "attachments/profile_image/" + row.profile_picture;
                            } else {
                                profile_img = base_url + "attachments/profile_image/default.png";
                            }
                            var action = '\
                                                \
                                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md view" data-link="' + row.profile_link + '" title="Click to View Link">\
                                                        <i class="kt-nav__link-icon flaticon2-clip-symbol"></i><span class="hide">' + row.profile_link + '</span>\
                                                </a>\
                                               \
                                        ';
                                var image='<img width="50px" height="50px" title="Profile Image" src="'+profile_img+'"/>';
                            var action = "<a href='" + row.profile_link + "' class='view' target='_blank' data-link='" + row.profile_link + "'>" + image + "</a>";

                            return action;
                        },
                    }],
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
                var country = $("#country").val();
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
                    country: country
                }
                datatable.setDataSourceParam('query', value);
                datatable.load();
            });
            $('#reload').on('click', function () {
                $("#from_date").val("");
                $("#to_date").val("");
                $("#country").val("");
                $("#country").prop("disabled", true);
                $("#from_date").prop("disabled", true);
                $("#to_date").prop("disabled", true);
                $("input:checkbox").prop('checked',true);
                var value = {
                    generalSearch: ""
                }
                datatable.setDataSourceParam('query', value);
                datatable.load();
            });
            //$('#kt_form_status,#kt_form_type').selectpicker();

            $(document).on('change', 'input[name=all]', function () {
                if (this.checked) {
                    $("#country").prop("disabled", true);
                    $("#from_date").prop("disabled", true);
                    $("#to_date").prop("disabled", true);
                    $("#country").val("");
                    $("#from_date").val("");
                    $("#to_date").val("");
                    var value = {
                        all: true,
                    }
                    datatable.setDataSourceParam('query', value);
                    datatable.load();
                } else {
                    $("#country").prop("disabled", false);
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
    function convertDateFormat(dateVal) {	
        if(dateVal){	
            var split_date = dateVal.split("-");	
            var converted_date = split_date[2] + "/" + split_date[1] + "/" + split_date[0];	
            return converted_date;	
        }else{	
            return '-';	
        }	
    }	
    function findDueYears(dateVal){	
        if(dateVal && dateVal != '0000-00-00'){	
            var split_date = dateVal.split("-");	
            var converted_date =split_date[0];	
            var current_year = new Date().getFullYear();	
            if(current_year == converted_date){	
                return 0;	
            }else{	
                var due = parseInt(current_year) - parseInt(converted_date); 	
                if(due > 1)	
                    return due+" Years";	
                else	
                    return due + " Year";	
            }	
        }else{	
            return 0;	
        }	
    }



    var KTFormWidgets = function () {
        // Private functions
        var initWidgets = function () {
            $('#from_date').datepicker({
                todayHighlight: true,
                format: 'yyyy',
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
                    var lastDate = new Date(selectedYear, 11 + 1, 0);
                    var lastDay = lastDate.getDate();
                    //alert(lastDay);
                    $(this).datepicker('update', new Date(selectedYear, 11, 31));
                    //$(this).val(selectedYear);
                }
            });
            $('#to_date').datepicker({
                todayHighlight: true,
                format: 'yyyy',
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
        //console.log(tab);
        for (j = 0; j < tab.rows.length; j++)
        {
            //console.log(tab.rows[j]);
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
            name: "Subscription Report",
            filename: "Subscription-Report",
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
        var country = $("#country").val();
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
           // fromDate = convertDate(form_date);
        }
        var toDate = to_date;
        if (to_date) {
            //toDate = convertDate(to_date);
        }
        var arr = [];

        arr.push({'from': fromDate});
        arr.push({'to': toDate});
        arr.push({'country': country});
        arr.push({'all': all});
        arr.push({'type': type});
        var arrStr = JSON.stringify(arr);

        window.location.replace(base_url + 'reports/subscription_report/get_export_subscription_report?search=' + arrStr);
    });
</script>