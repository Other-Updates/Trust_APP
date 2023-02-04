<style>
    table tr td:nth-child(3){text-align:center;}
</style>
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"  id="receipt_type_div" ng-app="receipt_type_app" ng-controller="receipt_type_controller" ng-init="loadReceiptTypePage()" ng-cloak>
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">

                <h3 class="kt-subheader__title">
                    Receipt Type
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
            </div>
            
            <div class="kt-subheader__toolbar" id="add_btn_div" ng-if="isVisible">
                <a class="btn btn-label-brand btn-bold" ng-click='addReceiptType()'>
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
                <div class="receipttype-datatable" id="ajax_data"></div>
                <!--end: Datatable -->
            </div>
        </div>	</div>
    <!-- end:: Content -->
</div>
<script>
    var receipt_type_app = angular.module('receipt_type_app', []);
    receipt_type_app.controller('receipt_type_controller', ['$scope', '$http', '$compile', '$location', '$window', function ($scope, $http, $compile, $location, $window) {

            $scope.loadReceiptTypePage = function () {

                $http.get(base_url + 'users/getPermissions')
                        .success(function (response) {

                            var modules_permission = response.modules;
                            $scope.isVisible = "false";
                            if (modules_permission['masters']) {
                                if (modules_permission['masters']['receipt_type']) {
                                    if (modules_permission['masters']['receipt_type']['add'] == "1") {
                                        // alert("masters");
                                        $scope.isVisible = "true";
                                        // The == and != operators consider null equal to only null or undefined
                                    }

                                    if (modules_permission['masters']['receipt_type']['edit'] == "1") {
                                        // alert("masters");
                                        $("#hasEdit").val("1");
                                        // The == and != operators consider null equal to only null or undefined
                                    }

                                    if (modules_permission['masters']['receipt_type']['delete'] == "1") {
                                        // alert("masters");
                                        $("#hasDelete").val("1");
                                        // The == and != operators consider null equal to only null or undefined
                                    }
                                    receiptTypeDataTable.init();
                                } else {
                                    $window.location.href = base_url + "dashboard";
                                }
                            } else {
                                $window.location.href = base_url + "dashboard";
                            }
                        })
            };
            $scope.addReceiptType = function () {
                $window.location.href = base_url + "masters/receipt_type/add";
            }

            $scope.memberTypeSettings = function () {
                alert("member setting");
            }

            $scope.memberTypeEdit = function () {
                alert("member edit");
            }





        }]);
    var receipt_type_div = document.getElementById('receipt_type_div');
    //alert(dvSecond);
    angular.element(document).ready(function () {
        angular.bootstrap(receipt_type_div, ['receipt_type_app']);
    });
    var receiptTypeDataTable = function () {
        // Private functions

        // basic demo
        var demo = function () {

            var datatable = $('.receipttype-datatable').KTDatatable({
                // datasource definition
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            //url: 'https://keenthemes.com/metronic/tools/preview/inc/api/datatables/demos/default.php',
                            url: base_url + 'masters/receipt_type/getReceiptType',
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
                        field: 'name',
                        title: 'Receipt Type',
                        template: function (row) {
                            //console.log(row);

                            return '<span class="bold-name txt-tf-caps">' + row.name + '</span>';
                        },
                    }, {
                        field: 'status',
                        title: 'Status',
                        // callback function support for column rendering
                        template: function (row) {
                            //console.log(row);
                            var status = {
                                1: {'title': 'Active', 'class': ' btn-label-success'},
                                0: {'title': 'Inactive', 'class': ' btn-label-danger'},
                            };
                            //alert("template");
                            //console.log(row);


                            return '<span class="btn btn-bold btn-sm btn-font-sm ' + status[row.status].class + '">' + status[row.status].title + '</span>';
                        },
                    }, {
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
                                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md receipt_type_view" data-id="' + row.id + '" title="View details">\
                                                        <i class="kt-nav__link-icon flaticon-eye"></i>\
                                                </a>\
                                        ';
                            if (hasEdit == "1") {
                                action += '\
                                                \
                                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md receipt_type_edit" data-id="' + row.id + '" title="Edit details">\
                                                        <i class="kt-nav__link-icon flaticon2-contract"></i>\
                                                </a>\
                                        ';
                            }
//
//                            if (hasDelete == "1") {
//                                action += '\
//                                               <a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md receipt_type_delete" data-id="' + row.id + '" ng-click="receiptTypeDelete()" title="Delete">\
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
            //$('#kt_form_status,#kt_form_type').selectpicker();
            $(document).on('click', '.receipt_type_delete', function () {
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
                    confirmButtonText: "Yes",
                    closeOnConfirm: false
                }).then(function (result) {
                    if (result.value) {

                        $.ajax({
                            url: base_url + 'masters/receipt_type/delete',
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
                                        //window.location = base_url + 'masters/receipt_type';
                                        datatable.reload();
                                    });
                                }
                            }
                        });
                    }
                });
            });
        };
        return {
            // public functions
            init: function () {
                demo();
            },
        };
    }();
    $(document).on('click', '.receipt_type_edit', function () {
        var receipt_type_id = $(this).attr("data-id");
        window.location.href = base_url + "masters/receipt_type/edit/" + receipt_type_id;
    });
    $(document).on('click', '.receipt_type_view', function () {
        var receipt_type_id = $(this).attr("data-id");
        window.location.href = base_url + "masters/receipt_type/view/" + receipt_type_id;
    });

</script>