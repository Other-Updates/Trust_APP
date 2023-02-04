<style>
    table tr td:nth-child(3){text-align:center;}
    table tr td:nth-child(5){text-align:center;}
    table tr td:nth-child(6){text-align:center;}
    table tr td:nth-child(7){text-align:center;}
    table tr td:nth-child(8){text-align:center;}
    table tr td:nth-child(9){text-align:center;}
    table tr td:nth-child(10){text-align:center;}
    .align-items-center{text-align:center;}
</style>
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"  id="sponsor_div" ng-app="sponsor_app" ng-controller="sponsor_controller" ng-init="loadSponsorPage()" ng-cloak>
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">

                <h3 class="kt-subheader__title">
                    Sponsors
                </h3>


                <span class="kt-subheader__separator kt-subheader__separator--v"></span>

                <div class="kt-subheader__group" id="kt_subheader_search">
                    <form class="kt-margin-l-20" id="kt_subheader_search_form">
                        <div class="kt-input-icon kt-input-icon--right kt-subheader__search">
                            <input type="text" class="form-control" placeholder="Search..." id="generalSearch">
                            <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                <span>
                                    <i class="flaticon2-magnifier-tool"></i>
                                </span>
                            </span>
                        </div>
                    </form>
                </div>
                &nbsp;



            </div>

            <!--
                        <div class="kt-subheader__main">
                            <h4 class="kt-subheader__title">
                                Last subscription
                            </h4>
                            <div class="kt-subheader__group" id="kt_subheader_search">
                                <form class="" id="kt_subheader_search_form">
                                    <div class="kt-input-icon kt-input-icon--right kt-subheader__search">
                                        <input type="text" class="form-control" placeholder="From date" id="from_date">
                                        <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                            <span>
                                                <i class="flaticon-calendar"></i>
                                            </span>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <div class="kt-subheader__group" id="kt_subheader_search">
                                <form class="kt-margin-l-20" id="kt_subheader_search_form">
                                    <div class="kt-input-icon kt-input-icon--right kt-subheader__search">
                                        <input type="text" class="form-control" placeholder="To date" id="to_date">
                                        <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                            <span>
                                                <i class="flaticon-calendar"></i>
                                            </span>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <h4 class="kt-subheader__title">
                                Paid status
                            </h4>
                            <div class="" id="kt_subheader_search">
                                <form class="" id="kt_subheader_search_form">
                                    <div class="kt-input-icon kt-input-icon--right kt-subheader__search">
                                        <select class="form-control" id="search_paid">
                                            <option value="">Select Paid Status</option>
                                            <option value="1">Pid</option>
                                            <option value="1">Paid</option>
                                            <option value="0">Not Paid</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="kt-subheader__toolbar" >
                                <a class="btn btn-label-brand btn-bold" id="date_search" ng-click='dateSearch()'>
                                    <i class="flaticon2-magnifier-tool"></i></a>
                                <a class="btn btn-label-danger btn-bold" id="reload" ng-click='reloadDT()'>
                                    <i class="flaticon2-refresh-button"></i></a>
                            </div>
                        </div>-->
            <div class="kt-subheader__toolbar" id="add_btn_div" >
                <div class="dropdown dropdown-inline">
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
                <button type="button" class="btn btn-label-brand btn-icon-sm" ng-if="isVisible" ng-click='addSponsor()'>
                    <i class="flaticon2-plus"></i> Add New
                </button>
                <!--<button type="button" class="btn btn-brand btn-icon-sm" ng-click="hiddenDiv = !hiddenDiv">
                    <i ng-class="{'flaticon-cancel' : hiddenDiv, 'flaticon-plus' : !hiddenDiv}"></i> Advanced search
                </button>-->
            </div>

        </div>
        <input type="hidden" id="hasEdit" value="0">
        <input type="hidden" id="hasDelete" value="0">
    </div>

    <div class="kt-portlet kt-portlet--mobile" ng-show="hiddenDiv">


        <div class="kt-portlet__body">
            <!--begin: Search Form -->
            <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                <div class="row ">
                    <div class="col-xl-12 order-2 order-xl-1">
                        <div class="row">
                            <div class="col-md-4">

                                <div class="kt-form__label">
                                    <label>For Year form:</label>
                                </div>



                                <div class="input-group">
                                    <input type="text" class="form-control" name="search_for_year_from" placeholder="Select For year from" id="for_year_from" aria-describedby="kt_datepicker-error" aria-invalid="false">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">

                                <div class="kt-form__label">
                                    <label>For Year to:</label>
                                </div>

                                <div class="input-group">
                                    <input type="text" class="form-control" name="search_for_year_to" placeholder="Select For year to" id="for_year_to" aria-describedby="kt_datepicker-error" aria-invalid="false">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">

                                <div class="kt-form__label">
                                    <label>Paid status:</label>
                                </div>
                                <div class="kt-form__control">
                                    <select class="form-control" id="search_paid">
                                        <option value="">Select Paid Status</option>
                                        <option value="1">Paid</option>
                                        <option value="0">Not Paid</option>
                                    </select>
                                </div>

                            </div>


                        </div>


                        <div class="row align-items-center">

                            <div class="col-md-12">

                                <div class="kt-form__label">
                                    <label></label>
                                </div>

                                <div class="kt-subheader__toolbar">
                                    <a class="btn btn-label-brand btn-bold m-l-15" id="advanced_search" ng-click="advancedSearch()">
                                        <i class="flaticon2-magnifier-tool"></i>Search</a>
                                    <a class="btn btn-label-danger btn-bold" id="reload" ng-click='reloadDT()'>
                                        <i class="flaticon2-refresh-button"></i>Clear</a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>		<!--end: Search Form -->
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
                <div class="scholarship-datatable" id="ajax_data"></div>
                <!--end: Datatable -->
            </div>
        </div>	</div>
    <!-- end:: Content -->
</div>

<div class="modal fade" id="profile_img_popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Profile Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body ">
                <img class="popup_profile_img" src="<?php echo base_url(); ?>attachments/scholar_profile_pictures/default.png" style="width:465px;height:auto;">
            </div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>-->
        </div>
    </div>
</div>
<div id="export_excel"></div>
<script>
    var sponsor_app = angular.module('sponsor_app', []);
    sponsor_app.controller('sponsor_controller', ['$scope', '$http', '$compile', '$location', '$window', function ($scope, $http, $compile, $location, $window) {

            $scope.loadSponsorPage = function () {

                $http.get(base_url + 'users/getPermissions')
                        .success(function (response) {
                            console.log(response);
                            var modules_permission = response.modules;
                            $scope.isVisible = "false";
                            if (modules_permission['sponsor']) {
                                if (modules_permission['sponsor']['sponsor']) {
                                    if (modules_permission['sponsor']['sponsor']['add'] == "1") {
                                        // alert("masters");
                                        $scope.isVisible = "true";
                                        // The == and != operators consider null equal to only null or undefined
                                    }
                                    if (modules_permission['sponsor']['sponsor']['edit'] == "1") {
                                        // alert("masters");
                                        $("#hasEdit").val("1");
                                        // The == and != operators consider null equal to only null or undefined
                                    }
                                    if (modules_permission['sponsor']['sponsor']['delete'] == "1") {
                                        // alert("masters");
                                        $("#hasDelete").val("1");
                                        // The == and != operators consider null equal to only null or undefined
                                    }
                                    scholarshipDataTable.init();
                                    KTFormWidgets.init();
                                } else {
                                    $window.location.href = base_url + "dashboard";
                                }
                            } else {
                                $window.location.href = base_url + "dashboard";
                            }


                        })

                $scope.loadCountry();

            };

            $scope.loadCountry = function () {
                $http.get(base_url + 'sponsors/get_country')
                        .success(function (data) {
                            //console.log(data);
                            $scope.country = data.country;
                        })
            }

            $scope.loadCourseType = function () {
                $http.get(base_url + 'scholarship/get_course_trpe')
                        .success(function (data) {

                            $scope.courseType = data.course_type;
                        })
            }

            $scope.addSponsor = function () {
                $window.location.href = base_url + "sponsors/add";
            }

            $scope.toggleAdvancedSearch = function () {

            }

            //demo();




        }]);
    var sponsor_div = document.getElementById('sponsor_div');
    //alert(dvSecond);
    angular.element(document).ready(function () {
        angular.bootstrap(sponsor_div, ['sponsor_app']);

    });



    var scholarshipDataTable = function () {
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

            var datatable = $('.scholarship-datatable').KTDatatable({
                // datasource definition
                data: {
                    type: 'remote',
                    method: 'POST',
                    source: {
                        read: {
                            //url: 'https://keenthemes.com/metronic/tools/preview/inc/api/datatables/demos/default.php',
                            url: base_url + 'sponsors/getSponsors',
                            map: function (raw) {
                                var indexNumber = 0;
                                if (typeof raw.data !== 'undefined') {
                                    var dataSet = raw.data;

                                    $.each(dataSet, function (key, value) {
                                        dataSet[key].indexNumber = parseInt(key) + 1;
                                    });
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
                // columns definition
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
                        field: 'sponsor_name',
                        title: 'Sponsor Name',
                        template: function (row) {
                            //console.log(row);

                            return '<span class="bold-name txt-tf-caps ">' + row.sponsor_name + '</span>';
                        },
                    },
                    {
                        field: 'profile_picture',
                        title: 'Profile',
                        template: function (row) {
                            //console.log(row);
                            var profile_img = "default.png";
                            if (row.profile_picture != "") {
                                profile_img = row.sponsor_id + "/" + row.profile_picture;
                            }
                            //alert("template");
                            //console.log(row);
                            var name = profile_img.substr(0, (profile_img.lastIndexOf('.')));
                            //console.log(name);
                            var extension = profile_img.substr((profile_img.lastIndexOf('.') + 1));
                            //console.log(extension);

                            var thumb_img = name + "_thumb" + "." + extension;
                            return '<img class="kt-badge profile_img_popup pointer-div" title="Click to view" src="' + base_url + "attachments/sponsors_profile_image/thumb/" + thumb_img + '"  style="width:30px;height:30px;" data-toggle="modal" data-target="#profile_img_popup" data-id="' + row.sponsor_id + '" data-link="' + base_url + "attachments/sponsors_profile_image/" + profile_img + '">';
                        },
                    },
//                    {
//                        field: 'street_name',
//                        title: 'Street Name',
//                        template: function (row) {
//                            //console.log(row);
//
//                            return '<span class="txt-tf-caps ">' + row.street_name + '</span>';
//                        },
//                    },
                    {
                        field: 'countries_name',
                        title: 'Country',
                        template: function (row) {
                            //console.log(row);

                            return '<span class="txt-tf-caps ">' + row.countries_name + '</span>';
                        },
                    },
//                    {
//                        field: 'for_year',
//                        title: 'For year',
//                        template: function (row) {
//                            //console.log(row);
//                            var for_yearGet = row.for_year;
//                            for_year = "";
//                            if (for_yearGet != '0000' && for_yearGet != "") {
//                                for_year = for_yearGet;
//                            } else {
//                                for_year = "-";
//                            }
//
//                            return  for_year;
//                        },
//                    },
                    {
                        field: 'mobile_no',
                        title: 'Mobile',
                    },
//                        {
//                        field: 'paid',
//                        title: 'Paid',
//                        template: function (row) {
//                            var paid = "0";
//                            if (row.paid == "1") {
//                                paid = "1";
//                            }
//                            var status = {
//                                1: {'title': 'Yes', 'class': 'btn-label-success'},
//                                0: {'title': 'No', 'class': 'btn-label-danger'},
//                            };
//                            return '<span class="btn btn-bold btn-sm btn-font-sm ' + status[paid].class + '">' + status[paid].title + '</span>';
//                        },
//                    },
//                    {
//                        field: 'status',
//                        title: 'Status',
//                        // callback function support for column rendering
//                        template: function (row) {
//                            //console.log(row);
//                            var status = {
//                                1: {'title': 'Active', 'class': ' btn-label-success'},
//                                0: {'title': 'Inactive', 'class': ' btn-label-danger'},
//                            };
//                            return '<span class="btn btn-bold btn-sm btn-font-sm ' + status[row.status].class + '">' + status[row.status].title + '</span>';
//                        },
//                    },
                    {
                        field: 'Actions',
                        title: 'Actions',
                        sortable: false,
                        width: 110,
                        overflow: 'visible',
                        autoHide: false,
                        template: function (row) {

                            var hasEdit = $("#hasEdit").val();
                            var hasDelete = $("#hasDelete").val();

                            var action = '\
                                                \
                                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md sponsor_view" data-id="' + row.sponsor_id + '"  title="View details">\
                                                        <i class="kt-nav__link-icon flaticon-eye"></i>\
                                                </a>\
                                        ';
                            if (hasEdit == "1") {
                                action += '\
                                                \
                                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md sponsor_edit" data-id="' + row.sponsor_id + '"  title="Edit details">\
                                                        <i class="kt-nav__link-icon flaticon2-contract"></i>\
                                                </a>\
                                        ';
                            }

//                            if (hasDelete == "1") {
//                                action += '\
//                                                 <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md sponsor_delete" data-id="' + row.sponsor_id + '" title="Delete">\
//                                                        <i class="kt-nav__link-icon flaticon2-trash"></i>\
//                                                </a>\
//                                                \
//                                        ';
//                            }

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

            $('#reload').on('click', function () {
                $("#for_year_from").val("");
                $("#for_year_to").val("");
                $("#generalSearch").val("");
                $("#search_paid").val("");
                var value = {
                    generalSearch: "",
                }
                datatable.setDataSourceParam('query', value);
                datatable.load();
            });

            $('#date_search').on('click', function () {
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
                var value = {
                    fromDate: fromDate,
                    toDate: toDate,
                }
                datatable.setDataSourceParam('query', value);
                datatable.load();
            });

            //$('#kt_form_status,#kt_form_type').selectpicker();

            $(document).on('click', '.sponsor_delete', function () {
                // var member_type_id = $(this).attr("data-id");
                //window.location.href = base_url + "users/user_types/delete/" + member_type_id;

                id = $(this).attr('data-id');
                //alert(id);

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

                        $.ajax({
                            url: base_url + 'sponsors/delete',
                            method: "POST",
                            data: {id: id},
                            success: function (data) {
                                // console.log(data);
                                if (data == '1') {
                                    swal.fire(
                                            'Deleted!',
                                            'Your file has been deleted.',
                                            'success'
                                            ).then(function () {
                                        //window.location = base_url + 'members';
                                        datatable.reload();
                                    });

                                }
                            }
                        });

                    }
                });

            });

            $(document).on('click', '#advanced_search', function () {
                var search_for_year_from = $("#for_year_from").val();
                var search_for_year_to = $("#for_year_to").val();
                var search_paid = $("#search_paid").val();
                var generalSearch = $("#generalSearch").val();
                var forYearFrom = "";
                if (search_for_year_from) {
                    forYearFrom = convertDate(search_for_year_from);
                }
                var forYearTo = "";
                if (search_for_year_to) {
                    forYearTo = convertDate(search_for_year_to);
                }

                var value = {
                    forYearFrom: forYearFrom,
                    forYearTo: forYearTo,
                    search_paid: search_paid,
                    generalSearch: generalSearch
                }
                datatable.setDataSourceParam('query', value);
                datatable.load();
            });

            $(document).on('click', '.profile_img_popup', function () {
                var id = $(this).attr('data-id');
                var src = $(this).attr("data-link");
                $(".popup_profile_img").attr("src", src);
                //alert(id);
//                $.ajax({
//                    url: base_url + 'scholarship/getProfile_image',
//                    method: "POST",
//                    data: {id: id},
//                    success: function (data) {
//                        console.log(data);
//                        var obj = JSON.parse(data);
//                        console.log(obj);
//                        if (obj['has_img'] == '1') {
//                            //alert("yes");
//                            if (obj['name'][0]['profile_picture'] != "") {
//                                $(".popup_profile_img").attr("src", base_url + "attachments/scholar_profile_pictures/" + id + "/" + obj['name'][0]['profile_picture']);
//                            } else {
//                                $(".popup_profile_img").attr("src", base_url + "attachments/scholar_profile_pictures/default.png");
//                            }
//                        } else {
//                            $(".popup_profile_img").attr("src", base_url + "attachments/scholar_profile_pictures/default.png");
//                        }
//                    }
//                });

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
            $('#for_year_from').datepicker({
                todayHighlight: true,
                templates: {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                }
            });
            $('#for_year_to').datepicker({
                todayHighlight: true,
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


    $(document).on('click', '.sponsor_edit', function () {
        var sponsor_id = $(this).attr("data-id");
        window.location.href = base_url + "sponsors/edit/" + sponsor_id;
    });

    $(document).on('click', '.sponsor_view', function () {
        var sponsor_id = $(this).attr("data-id");
        window.location.href = base_url + "sponsors/view/" + sponsor_id;
    });

    $(document).on('click', '.view_position_history', function () {
        var member_id = $(this).attr("data-id");
        window.location.href = base_url + "members/position_history/" + member_id;
    });
</script>

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

        //alert("excel fn");

        jq("#custom_export").table2excel({
            exclude: ".noExl",
            name: "Sponsors Report",
            filename: "Sponsors-details",
            fileext: ".xls",
            exclude_img: false,
            exclude_links: false,
            exclude_inputs: false
        });


    }

    jq(document).on('click', '#entire_data_export', function () {
        var arr = [];
        arr.push({'searchString': jq('#generalSearch').val()});
        var arrStr = JSON.stringify(arr);

        window.location.replace(base_url + 'sponsors/sponsor_report?search=' + arrStr);
    });
</script>