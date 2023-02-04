<style>
    table tr td:nth-child(3){text-align:center;}
    table tr td:nth-child(4){text-align:right;}
    table tr td:nth-child(5){text-align:center;}
    table tr td:nth-child(6){text-align:center;}

</style>
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"  id="receipts_div" ng-app="receipts_app" ng-controller="receipts_controller" ng-init="loadReceiptsPage()" ng-cloak>
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">

                <h3 class="kt-subheader__title">
                    Receipts
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


            <div class="kt-subheader__main">
                <h4 class="kt-subheader__title">
                    Receipt Date
                </h4>
                <div class="kt-subheader__group" id="kt_subheader_search">
                    <form class="" id="kt_subheader_search_form">
                        <div class="kt-input-icon kt-input-icon--right kt-subheader__search">
                            <input type="text" class="form-control" placeholder="From Date" id="from_date">
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
                            <input type="text" class="form-control" placeholder="To Date" id="to_date">
                            <span class="kt-input-icon__icon kt-input-icon__icon--right">
                                <span>
                                    <i class="flaticon2-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="kt-subheader__toolbar" >
                    <a class="btn btn-label-brand btn-bold m-l-15" id="date_search" ng-click='dateSearch()'>
                        <i class="flaticon2-magnifier-tool"></i></a>
                    <a class="btn btn-label-danger btn-bold" id="reload" ng-click='reloadDT()'>
                        <i class="flaticon2-refresh-button"></i></a>
                </div>
            </div>
            <div class="kt-subheader__toolbar" id="add_btn_div" ng-if="isVisible">
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
                <a class="btn btn-label-brand btn-bold" ng-click='addReceipt()'>
                    <i class="flaticon2-plus"></i> Add New </a>
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
                <div class="receipts-datatable" id="ajax_data"></div>
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
                <img class="popup_profile_img" src="<?php echo base_url(); ?>attachments/profile_image/default.png" style="width:465px;height:auto;">
            </div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>-->
        </div>
    </div>
</div>
<div id="export_excel"></div>
<script>
    var receipts_app = angular.module('receipts_app', []);
    receipts_app.controller('receipts_controller', ['$scope', '$http', '$compile', '$location', '$window', function ($scope, $http, $compile, $location, $window) {

            $scope.loadReceiptsPage = function () {

                $http.get(base_url + 'users/getPermissions')
                        .success(function (response) {
                            console.log(response);
                            var modules_permission = response.modules;
                            $scope.isVisible = "false";

                            if (modules_permission['receipt']) {
                                if (modules_permission['receipt']['receipts']) {
                                    if (modules_permission['receipt']['receipts']['add'] == "1") {
                                        // alert("masters");
                                        $scope.isVisible = "true";
                                        // The == and != operators consider null equal to only null or undefined
                                    }
                                    if (modules_permission['receipt']['receipts']['edit'] == "1") {
                                        // alert("masters");
                                        $("#hasEdit").val("1");
                                        // The == and != operators consider null equal to only null or undefined
                                    }
                                    if (modules_permission['receipt']['receipts']['delete'] == "1") {
                                        // alert("masters");
                                        $("#hasDelete").val("1");
                                        // The == and != operators consider null equal to only null or undefined
                                    }

                                    receiptsDataTable.init();
                                    KTFormWidgets.init();
                                } else {
                                    $window.location.href = base_url + "dashboard";
                                }
                            } else {
                                $window.location.href = base_url + "dashboard";
                            }


                        })
            };
            $scope.addReceipt = function () {
                $window.location.href = base_url + "receipts/add";
            }

//            $scope.dateSearch = function () {
//
//                membersDataTable.reload();
//            }

            //demo();

        }]);
    var receipts_div = document.getElementById('receipts_div');
    //alert(dvSecond);
    angular.element(document).ready(function () {
        angular.bootstrap(receipts_div, ['receipts_app']);
    });
    var receiptsDataTable = function () {
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

            var datatable = $('.receipts-datatable').KTDatatable({
                // datasource definition
                data: {
                    type: 'remote',
                    method: 'POST',
                    source: {
                        read: {
                            //url: 'https://keenthemes.com/metronic/tools/preview/inc/api/datatables/demos/default.php',
                            url: base_url + 'receipts/getReceipts',
                            map: function (raw) {
                                //console.log(raw);
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

                            return '<span class="bold-name txt-tf-caps ">' + row.receipt_user_name + '</span>';
                        },
                    }, {
                        field: 'receipt_type_name',
                        title: 'Receipt For',
                    },
                    {
                        field: 'amount',
                        title: 'Amount',
                    },
                    {
                        field: 'receipt_date',
                        title: 'Receipt Date',
                        template: function (row) {
                            //console.log(row);
                            var receipt_dateGet = row.receipt_date;
                            var receipt_date = "-";
                            if (receipt_dateGet != '0000-00-00' && receipt_dateGet != "") {
                                var receipt_dateSplit = receipt_dateGet.split("-");
                                var receipt_date = receipt_dateSplit[2] + "/" + receipt_dateSplit[1] + "/" + receipt_dateSplit[0];
                            }

                            return  receipt_date;
                        },
                    },
//                    {
//                        field: 'profile_picture',
//                        title: 'Profile',
//                        width: 70,
//                        template: function (row) {
//                            //console.log(row);
//                            var profile_img = "default.png";
//                            if (row.profile_picture != "") {
//                                profile_img = row.profile_picture;
//                            }
//                            //alert("template");
//                            //console.log(row);
//                            var name = profile_img.substr(0, (profile_img.lastIndexOf('.')));
//                            //console.log(name);
//                            var extension = profile_img.substr((profile_img.lastIndexOf('.') + 1));
//                            //console.log(extension);
//
//                            var thumb_img = name + "_thumb" + "." + extension;
//
//                            return '<img class="kt-badge profile_img_popup pointer-div" title="Click to view" src="' + base_url + "attachments/profile_image/thumb/" + thumb_img + '" style="width:30px;height:30px;" data-toggle="modal" data-target="#profile_img_popup" data-id="' + row.member_id + '" data-link="' + base_url + "attachments/profile_image/" + profile_img + '">';
//                        },
//                    },
                    {
                        field: 'cancelled',
                        title: 'Cancelled',
                        // callback function support for column rendering
                        template: function (row) {
                            //console.log(row);
                            var status = {
                                1: {'title': 'Yes', 'class': ' btn-label-danger'},
                                0: {'title': 'No', 'class': ' btn-label-success'},
                            };
                            return '<span class="btn btn-bold btn-sm btn-font-sm ' + status[row.cancelled].class + '">' + status[row.cancelled].title + '</span>';
                        },
                    },	
                    {	
                        field: 'remarks',	
                        title: 'Remarks',
                        template: function (row) {
                            return (row.remarks == 'undefined') ? '-' : row.remarks;
                        },	
                    },{
                        field: 'Actions',
                        title: 'Actions',
                        sortable: false,
                        overflow: 'visible',
                        autoHide: false,
                        template: function (row) {
                            var hasEditPermission = $('#hasEdit').val();
                            var hasDeletePermission = $('#hasDelete').val();

                            var action = '\
                                                \
                                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md receipt_view" data-id="' + row.receipt_id + '" title="View details">\
                                                        <i class="kt-nav__link-icon flaticon-eye"></i>\
                                                </a>\
                                               \
                                        ';
                            if (hasEditPermission == "1") {
                                action += '\
                                    \
                                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md receipt_edit" data-id="' + row.receipt_id + '" ng-click="expenseTypeEdit()" title="Edit details">\
                                                        <i class="kt-nav__link-icon flaticon2-contract"></i>\
                                                </a>\
                                                \
                            ';
                            }
//                            if (hasDeletePermission == "1") {
//                                action += '\
//                                               \
//                                                 <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md receipt_delete" data-id="' + row.receipt_id + '" ng-click="expenseTypeDelete()" title="Delete">\
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
            $('#reload').on('click', function () {
                $("#from_date").val("");
                $("#to_date").val("");
                var value = {
                    generalSearch: "",
                }
                datatable.setDataSourceParam('query', value);
                datatable.load();
            });
            //$('#kt_form_status,#kt_form_type').selectpicker();

            $(document).on('click', '.receipt_delete', function () {
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
                            url: base_url + 'receipts/delete',
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
            $(document).on('click', '.profile_img_popup', function () {
                var id = $(this).attr('data-id');
                var src = $(this).attr("data-link");
                $(".popup_profile_img").attr("src", src);
                //alert(id);
//                $.ajax({
//                    url: base_url + 'members/getProfile_image',
//                    method: "POST",
//                    data: {id: id},
//                    success: function (data) {
//                        console.log(data);
//                        var obj = JSON.parse(data);
//                        console.log(obj);
//                        if (obj['has_img'] == '1') {
//                            //alert("yes");
//                            if (obj['name'][0]['profile_picture'] != "") {
//                                $(".popup_profile_img").attr("src", base_url + "attachments/profile_image/" + obj['name'][0]['profile_picture']);
//
//                            } else {
//                                $(".popup_profile_img").attr("src", base_url + "attachments/profile_image/default.png");
//                            }
//                        } else {
//                            $(".popup_profile_img").attr("src", base_url + "attachments/profile_image/default.png");
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
            $('#from_date').datepicker({
                todayHighlight: true,
                templates: {
                    leftArrow: '<i class="la la-angle-left"></i>',
                    rightArrow: '<i class="la la-angle-right"></i>'
                }
            });
            $('#to_date').datepicker({
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
    $(document).on('click', '.receipt_edit', function () {
        var receipt_id = $(this).attr("data-id");
        window.location.href = base_url + "receipts/edit/" + receipt_id;
    });
    $(document).on('click', '.receipt_view', function () {
        var receipt_id = $(this).attr("data-id");
        window.location.href = base_url + "receipts/view/" + receipt_id;
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
            name: "Receipts Report",
            filename: "Receipts-details",
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

        window.location.replace(base_url + 'receipts/receipts_report?search=' + arrStr);
    });
</script>