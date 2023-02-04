<?php
$theme_path = $this->config->item('theme_locations') . 'esms';
?>
<!DOCTYPE html>
<html lang="en" >
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta charset="utf-8"/>
        <title><?php echo $this->config->item('site_title'); ?></title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">       <!--end::Fonts -->

        <link href="<?php echo $theme_path; ?>/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo $theme_path; ?>/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $theme_path; ?>/assets/plugins/custom/datatables/datatables.bundle.css" type="text/css" />
        <link href="<?php echo $theme_path; ?>/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $theme_path; ?>/assets/css/custom_style.css" rel="stylesheet" type="text/css" />

        <script src="<?php echo $theme_path; ?>/assets/js/angular.min.js"></script>
        <script type="text/javascript" src="<?php echo $theme_path; ?>/assets/js/jquery-1.8.2.js"></script>
        <script type="text/javascript" src="<?php echo $theme_path; ?>/assets/js/jquery-ui-1.10.3.min.js"></script>
        <link rel="shortcut icon" href="<?php echo $theme_path; ?>/assets/media/logos/favicon.png" />
        <link href="<?php echo $theme_path; ?>/assets/css/export.css" rel="stylesheet" type="text/css" />
        <script type='text/javascript' src='<?php echo $theme_path; ?>/assets/js/jquery.table2excel.min.js'></script>
        <script type="text/javascript">
            var base_url = '<?php echo $this->config->item('base_url'); ?>';
            //var ct_class = '<?php echo $this->router->class; ?>';
            //var ct_method = '<?php echo $this->router->method; ?>';
        </script>
        <style>
            .top-heading{
                left: 90px;
                position: absolute;
                color:#076dc1 !important;
                font-size:20px !important;}
            div .kt-dialog--loader{
                display:none !important;
            }

        </style>

    </head>
    <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-aside--minimize kt-page--loading"  >


        <div class="preloader" >
            <div class="pageloader"><img src="<?php echo $theme_path; ?>/assets/media/loader/loader.gif" alt="processing..."></div>
        </div>

        <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed " >
            <div class="kt-header-mobile__logo">
                <a href="<?php echo base_url(); ?>">
                    <img alt="Logo" src="<?php echo base_url(); ?>themes/esms/assets/media/logos/iqra1.png"/>
                </a>
            </div>
            <div class="kt-header-mobile__toolbar">
                <div class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></div>

                <div class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></div>
                <div class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></div>
            </div>
        </div>
        <!-- end:: Header Mobile -->
        <div class="kt-grid kt-grid--hor kt-grid--root">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
                <!-- begin:: Aside -->
                <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>

                <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
                    <!-- begin:: Aside Menu -->
                    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
                        <div
                            id="kt_aside_menu"
                            class="kt-aside-menu "
                            data-ktmenu-vertical="1"
                            data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500"
                            >

                            <ul id="user_menu_ul" class="kt-menu__nav " ng-app="menu_app" ng-controller="menu_controller" ng-init="loadMenu()" ng-cloak>

                            </ul>
                        </div>
                    </div>
                    <!-- end:: Aside Menu -->
                </div>
                <!-- end:: Aside -->
                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper"  ng-app="top_bar_app" ng-controller="top_bar_controller" ng-cloak>
                    <!-- begin:: Header -->
                    <div id="kt_header" class="kt-header kt-grid kt-grid--ver  kt-header--fixed " >
                        <!-- begin:: Aside -->
                        <div class="kt-header__brand kt-grid__item  " id="kt_header_brand">
                            <div class="kt-header__brand-logo">
                                <a href="<?php echo base_url(); ?>">
                                    <img alt="Logo" src="<?php echo base_url(); ?>themes/esms/assets/media/logos/iqra1.png" width="80%"/>
                                </a>
                            </div>
                        </div>
                        <!-- end:: Aside -->
                        <h3 class="kt-header__title kt-grid__item top-heading">
                            F2F TRUST EDUCATIONAL SOCIETY
                        </h3>

                        <!-- begin:: Header Topbar -->
                        <div class="kt-header__topbar">
                            <!--begin: Notifications -->

                            <!--<div class="kt-header__topbar-item dropdown">
                                <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                                    <span class="kt-header__topbar-icon kt-header__topbar-icon--success"><i class="flaticon2-bell-alarm-symbol"></i></span>
                                    <span class="kt-hidden kt-badge kt-badge--danger"></span>
                                </div>
                                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
                                    <form>

                                        <div class="kt-head kt-head--skin-dark kt-head--fit-x kt-head--fit-b" style="background-image: url(../../themes/metronic/theme/default/demo6/dist/assets/media/misc/bg-1.jpg)">
                                            <h3 class="kt-head__title">
                                                User Notifications
                                                &nbsp;
                                                <span class="btn btn-success btn-sm btn-bold btn-font-md">23 new</span>
                                            </h3>

                                            <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-success kt-notification-item-padding-x" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_notifications" role="tab" aria-selected="true">Alerts</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#topbar_notifications_events" role="tab" aria-selected="false">Events</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#topbar_notifications_logs" role="tab" aria-selected="false">Logs</a>
                                                </li>
                                            </ul>
                                        </div>


                                        <div class="tab-content">
                                            <div class="tab-pane active show" id="topbar_notifications_notifications" role="tabpanel">
                                                <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                                                    <a href="#" class="kt-notification__item">
                                                        <div class="kt-notification__item-icon">
                                                            <i class="flaticon2-line-chart kt-font-success"></i>
                                                        </div>
                                                        <div class="kt-notification__item-details">
                                                            <div class="kt-notification__item-title">
                                                                New order has been received
                                                            </div>
                                                            <div class="kt-notification__item-time">
                                                                2 hrs ago
                                                            </div>
                                                        </div>
                                                    </a>

                                                </div>
                                            </div>
                                            <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
                                                <div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                                                    <a href="#" class="kt-notification__item">
                                                        <div class="kt-notification__item-icon">
                                                            <i class="flaticon2-psd kt-font-success"></i>
                                                        </div>
                                                        <div class="kt-notification__item-details">
                                                            <div class="kt-notification__item-title">
                                                                New report has been received
                                                            </div>
                                                            <div class="kt-notification__item-time">
                                                                23 hrs ago
                                                            </div>
                                                        </div>
                                                    </a>

                                                </div>
                                            </div>
                                            <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
                                                <div class="kt-grid kt-grid--ver" style="min-height: 200px;">
                                                    <div class="kt-grid kt-grid--hor kt-grid__item kt-grid__item--fluid kt-grid__item--middle">
                                                        <div class="kt-grid__item kt-grid__item--middle kt-align-center">
                                                            All caught up!
                                                            <br>No new notifications.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>-->
                            <!--end: Notifications -->
                            <!--begin: User bar -->
                            <div class="kt-header__topbar-item kt-header__topbar-item--user">
                                <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                                    <span class="kt-hidden kt-header__topbar-welcome">Hi,</span>
                                    <span class="kt-hidden kt-header__topbar-username">Nick</span>
                                    <!--<img class="kt-hidden" alt="Pic" src="../../themes/metronic/theme/default/demo6/dist/assets/media/users/300_21.jpg"/>-->
                                    <span class="kt-header__topbar-icon kt-hidden-"><i class="flaticon2-user-outline-symbol"></i></span>
                                </div>
                                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">


                                    <!--begin: Navigation -->
                                    <div class="kt-notification">
                                        <a href="<?php echo base_url(); ?>users/my_profile" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <i class="flaticon2-calendar-3 kt-font-success"></i>
                                            </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title kt-font-bold">
                                                    My Profile
                                                </div>
                                                <div class="kt-notification__item-time">
                                                    Update profile details
                                                </div>
                                            </div>
                                        </a>
                                        <!--<a href="#" class="kt-notification__item">
                                            <div class="kt-notification__item-icon">
                                                <i class="flaticon2-mail kt-font-warning"></i>
                                            </div>
                                            <div class="kt-notification__item-details">
                                                <div class="kt-notification__item-title kt-font-bold">
                                                    My Messages
                                                </div>
                                                <div class="kt-notification__item-time">
                                                    Inbox and tasks
                                                </div>
                                            </div>
                                        </a>-->
                                        <div class="kt-notification__custom kt-space-between">
                                            <a href="#" class="btn btn-label btn-label-brand btn-sm btn-bold text-right" ng-click="logout()">Sign Out</a>
                                        </div>
                                    </div>
                                    <!--end: Navigation -->
                                </div>
                            </div>
                            <!--end: User bar -->
                        </div>
                        <!-- end:: Header Topbar -->
                    </div>
                    <!-- end:: Header -->
                    <div class="" id="kt_content">
                        <!-- begin:: Content -->
                        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                            <!--Begin::Dashboard 6-->
                            <?php echo $content; ?>
                            <!--End::Dashboard 6-->	</div>
                        <!-- end:: Content -->				</div>
                    <br>  <br>  <br>

                    <!-- begin:: Footer -->
                    <div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop"  id="kt_footer">
                        <div class="kt-container  kt-container--fluid ">
                            <div class="kt-footer__copyright">
                                2019&nbsp;&copy;&nbsp;<b>F2F Trust</b>,&nbsp;&nbsp;

                                <span class="right">Powered by <a href="https://f2fsolutions.co.in" target="_blank" class="kt-footer__menu-link kt-link"><b> F2F Solutions</b></a></span>

                            </div>
                        </div>
                    </div>
                    <!-- end:: Footer -->
                </div>
            </div>
        </div>

        <!-- end:: Page -->
        <!-- begin::Scrolltop -->
        <div id="kt_scrolltop" class="kt-scrolltop">
            <i class="fa fa-arrow-up"></i>
        </div>
        <!-- end::Scrolltop -->
        <!-- begin::Sticky Toolbar -->
        <!-- <ul class="kt-sticky-toolbar" style="margin-top: 30px;">
             <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--danger" id="kt_sticky_toolbar_chat_toggler" data-toggle="kt-tooltip" title="Chat Example" data-placement="left">
                 <a href="#" data-toggle="modal" data-target="#kt_chat_modal"><i class="flaticon2-chat-1"></i></a>
             </li>
         </ul>-->
        <!-- end::Sticky Toolbar -->



        <!--Begin:: Chat-->
        <div class="modal fade- modal-sticky-bottom-right" id="kt_chat_modal" role="dialog" data-backdrop="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="kt-chat">
                        <div class="kt-portlet kt-portlet--last">
                            <div class="kt-portlet__head">
                                <div class="kt-chat__head ">
                                    <div class="kt-chat__left">
                                        <div class="kt-chat__label">
                                            <a href="#" class="kt-chat__title">Jason Muller</a>
                                            <span class="kt-chat__status">
                                                <span class="kt-badge kt-badge--dot kt-badge--success"></span> Active
                                            </span>
                                        </div>
                                    </div>
                                    <div class="kt-chat__right">
                                        <div class="dropdown dropdown-inline">
                                            <button type="button" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="flaticon-more-1"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-md">
                                                <!--begin::Nav-->
                                                <ul class="kt-nav">
                                                    <li class="kt-nav__head">
                                                        Messaging
                                                        <i class="flaticon2-information" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more..."></i>
                                                    </li>
                                                    <li class="kt-nav__separator"></li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-group"></i>
                                                            <span class="kt-nav__link-text">New Group</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-open-text-book"></i>
                                                            <span class="kt-nav__link-text">Contacts</span>
                                                            <span class="kt-nav__link-badge">
                                                                <span class="kt-badge kt-badge--brand  kt-badge--rounded-">5</span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-bell-2"></i>
                                                            <span class="kt-nav__link-text">Calls</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-dashboard"></i>
                                                            <span class="kt-nav__link-text">Settings</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon flaticon2-protected"></i>
                                                            <span class="kt-nav__link-text">Help</span>
                                                        </a>
                                                    </li>
                                                    <li class="kt-nav__separator"></li>
                                                    <li class="kt-nav__foot">
                                                        <a class="btn btn-label-brand btn-bold btn-sm" href="#">Upgrade plan</a>
                                                        <a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">Learn more</a>
                                                    </li>
                                                </ul>
                                                <!--end::Nav-->
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-clean btn-sm btn-icon" data-dismiss="modal">
                                            <i class="flaticon2-cross"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__body">
                                <div class="kt-scroll kt-scroll--pull" data-height="410" data-mobile-height="300">
                                    <div class="kt-chat__messages kt-chat__messages--solid">
                                        <div class="kt-chat__message kt-chat__message--success">
                                            <div class="kt-chat__user">
                                                <span class="kt-media kt-media--circle kt-media--sm">
                                                    <!--<img src="<?php echo $theme_path; ?>/assets/media/users/100_12.jpg" alt="image">-->
                                                </span>
                                                <a href="#" class="kt-chat__username">Jason Muller</span></a>
                                                <span class="kt-chat__datetime">2 Hours</span>
                                            </div>
                                            <div class="kt-chat__text">
                                                How likely are you to recommend our company<br> to your friends and family?
                                            </div>
                                        </div>
                                        <div class="kt-chat__message kt-chat__message--right kt-chat__message--brand">
                                            <div class="kt-chat__user">
                                                <span class="kt-chat__datetime">30 Seconds</span>
                                                <a href="#" class="kt-chat__username">You</span></a>
                                                <span class="kt-media kt-media--circle kt-media--sm">
                                                    <img src="<?php echo $theme_path; ?>/assets/media/users/300_21.jpg" alt="image">
                                                </span>
                                            </div>
                                            <div class="kt-chat__text">
                                                Hey there, we’re just writing to let you know that you’ve<br> been subscribed to a repository on GitHub.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-portlet__foot">
                                <div class="kt-chat__input">
                                    <div class="kt-chat__editor">
                                        <textarea placeholder="Type here..." style="height: 50px"></textarea>
                                    </div>
                                    <div class="kt-chat__toolbar">
                                        <div class="kt_chat__tools">
                                            <a href="#"><i class="flaticon2-link"></i></a>
                                            <a href="#"><i class="flaticon2-photograph"></i></a>
                                            <a href="#"><i class="flaticon2-photo-camera"></i></a>
                                        </div>
                                        <div class="kt_chat__actions">
                                            <button type="button" class="btn btn-brand btn-md  btn-font-sm btn-upper btn-bold kt-chat__reply">reply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="message_model">


            <?php echo $popup; ?>

        </div>
    </body>
    <script>
        var app = angular.module('menu_app', []);
        app.controller('menu_controller', ['$scope', '$http', '$compile', '$location', '$window', function ($scope, $http, $compile, $location, $window) {

                $scope.loadMenu = function () {

                    $http.get(base_url + 'users/getPermissions')
                            .success(function (response) {

                                console.log(response);
                                // console.log(response.modules.dashboard.dashboard);

                                var queryResult = document.querySelector('#user_menu_ul');
                                var wrappedQueryResult = angular.element(queryResult);
                                var menu = "";
                                var main_menu_item = "";
                                var menu_icon = "";
                                var main_menu_name = "";

                                var menu_content = "";
                                //console.log(response.modules.dashboard.dashboard.all);

                                if (response.modules.length != 0) {
                                    if (typeof (response.modules.dashboard) !== 'undefined') {
                                        if (response.modules.dashboard.dashboard.all == "1") {
                                            menu_content += '<li class="kt-menu__item " aria-haspopup="true" ><a  href="' + base_url + "dashboard" + '" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-dashboard"></i><span class="kt-menu__link-text txt-tf-caps">Dashboard</span></a></li>';
                                        }
                                    }


                                    if (response.modules.masters) {
                                        if (response.modules.masters) {

                                            menu_content += '<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">';
                                            menu_content += '<a  href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-layers"></i><span class="kt-menu__link-text txt-tf-caps">Masters</span><span class="kt-menu__link-badge"></span><i class="kt-menu__ver-arrow la la-angle-right"></i> </a>';
                                            menu_content += '<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span><ul class="kt-menu__subnav"><li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true" ><span class="kt-menu__link"> <span class="kt-menu__link-text txt-tf-caps">Actions</span><span class="kt-menu__link-badge"><span class="kt-badge kt-badge--brand">2</span> </span> </span></li>';
                                        }
                                        if (response.modules.masters.course_type) {
                                            if (response.modules.masters.course_type.all == "1") {
                                                menu_content += '<li class="kt-menu__item">';
                                                menu_content += '<a href="' + base_url + 'masters/course_type' + '" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text txt-tf-caps">Course type</span></a>';
                                                menu_content += '</li>';
                                            }
                                        }

                                        if (response.modules.masters.member_type) {
                                            if (response.modules.masters.member_type.all == "1") {
                                                menu_content += '<li class="kt-menu__item">';
                                                menu_content += '<a href="' + base_url + 'masters/member_type' + '" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text txt-tf-caps">Member type</span></a>';
                                                menu_content += '</li>';
                                            }
                                        }

                                        if (response.modules.masters.receipt_type) {
                                            if (response.modules.masters.receipt_type.all == "1") {
                                                menu_content += '<li class="kt-menu__item">';
                                                menu_content += '<a href="' + base_url + 'masters/receipt_type' + '" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text txt-tf-caps">Receipt type</span></a>';
                                                menu_content += '</li>';
                                            }
                                        }
                                        if (response.modules.masters.expenses) {
                                            if (response.modules.masters.expenses.all == "1") {
                                                menu_content += '<li class="kt-menu__item">';

                                                menu_content += '<a href="' + base_url + 'masters/expenses' + '" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text txt-tf-caps">Expenses</span></a>';
                                                menu_content += '</li>';
                                            }
                                        }
                                        if (response.modules.masters.application_type) {
                                            if (response.modules.masters.application_type.all == "1") {
                                                menu_content += '<li class="kt-menu__item">';

                                                menu_content += '<a href="' + base_url + 'masters/application_type' + '" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text txt-tf-caps">Application Type</span></a>';
                                                menu_content += '</li>';
                                            }
                                        }
                                        if (response.modules.masters.user_types) {
                                            if (response.modules.masters.user_types.all == "1") {
                                                menu_content += '<li class="kt-menu__item">';

                                                menu_content += '<a href="' + base_url + 'masters/user_types' + '" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text txt-tf-caps">User Type</span></a>';
                                                menu_content += '</li>';
                                            }
                                        }
                                        if (response.modules.masters) {
                                            menu_content += '</ul></div></li>';
                                        }

                                    }

                                }
                                if (response.modules.general_info) {
                                    if (response.modules.general_info.general_info.all == "1") {
                                        menu_content += '<li class="kt-menu__item " aria-haspopup="true" ><a  href="' + base_url + "general_info" + '" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-information"></i><span class="kt-menu__link-text txt-tf-caps">General Info</span></a></li>';
                                    }
                                }

                                if (response.modules.members) {
                                    if (response.modules.members.members.all == "1") {
                                        menu_content += '<li class="kt-menu__item " aria-haspopup="true" ><a  href="' + base_url + "members" + '" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-users"></i><span class="kt-menu__link-text txt-tf-caps">Members</span></a></li>';
                                    }
                                }

                                if (response.modules.scholarship) {
                                    if (response.modules.scholarship.scholarship.all == "1") {
                                        menu_content += '<li class="kt-menu__item " aria-haspopup="true" ><a  href="' + base_url + "scholarship" + '" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-open-box"></i><span class="kt-menu__link-text txt-tf-caps">Scholarship</span></a></li>';
                                    }
                                }


                                if (response.modules.sponsor) {
                                    if (response.modules.sponsor.sponsor.all == "1") {
                                        menu_content += '<li class="kt-menu__item " aria-haspopup="true" ><a  href="' + base_url + "sponsors" + '" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-users"></i><span class="kt-menu__link-text txt-tf-caps">Sponsors</span></a></li>';
                                    }
                                }

                                if (response.modules.receipt) {
                                    if (response.modules.receipt.receipts.all == "1") {
                                        menu_content += '<li class="kt-menu__item " aria-haspopup="true" ><a  href="' + base_url + 'receipts" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-list-1"></i><span class="kt-menu__link-text txt-tf-caps">Receipt</span></a></li>';
                                    }
                                }

                                if (response.modules.petty_cash) {
                                    if (response.modules.petty_cash.petty_cash.all == "1") {
                                        menu_content += '<li class="kt-menu__item " aria-haspopup="true" ><a  href="' + base_url + 'petty_cash" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-piggy-bank"></i><span class="kt-menu__link-text txt-tf-caps">Petty cash</span></a></li>';
                                    }
                                }

                                if (response.modules.messageboard) {
                                    if (response.modules.messageboard.messageboard.all) {
                                        menu_content += '<li class="kt-menu__item " aria-haspopup="true" ><a  href="' + base_url + 'messageboard" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-multimedia-2"></i><span class="kt-menu__link-text txt-tf-caps">Messageboard</span></a></li>';
                                    }

                                }

                                if (response.modules.reports) {
                                    //if (response.modules.reports == "1") {
                                    // menu_content += '<li class="kt-menu__item " aria-haspopup="true" ><a  href="' + base_url + '" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-graphic"></i><span class="kt-menu__link-text txt-tf-caps">Reports</span></a></li>';


                                    menu_content += '<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">';
                                    menu_content += '<a  href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-graphic"></i><span class="kt-menu__link-text txt-tf-caps">Report</span><span class="kt-menu__link-badge"></span><i class="kt-menu__ver-arrow la la-angle-right"></i> </a>';
                                    menu_content += '<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span><ul class="kt-menu__subnav"><li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true" ><span class="kt-menu__link"> <span class="kt-menu__link-text txt-tf-caps">Actions</span><span class="kt-menu__link-badge"><span class="kt-badge kt-badge--brand">2</span> </span> </span></li>';


                                    // }
                                    if (response.modules.reports.subscription_report) {
                                        if (response.modules.reports.subscription_report.all == "1") {
                                            menu_content += '<li class="kt-menu__item">';
                                            menu_content += '<a href="' + base_url + 'reports/subscription_report' + '" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text txt-tf-caps">Subscription Report</span></a>';
                                            menu_content += '</li>';
                                        }
                                    }

                                    if (response.modules.reports.membership_report) {	
                                        if (response.modules.reports.membership_report.all == "1") {	
                                            menu_content += '<li class="kt-menu__item">';	
                                            menu_content += '<a href="' + base_url + 'reports/membership_report' + '" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text txt-tf-caps">Membership Report</span></a>';	
                                            menu_content += '</li>';	
                                        }	
                                    }

                                    if (response.modules.reports.sponsor_report) {
                                        if (response.modules.reports.sponsor_report.all == "1") {
                                            menu_content += '<li class="kt-menu__item">';
                                            menu_content += '<a href="' + base_url + 'reports/sponsor_report' + '" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text txt-tf-caps">Sponsor Commitment Report</span></a>';
                                            menu_content += '</li>';
                                        }
                                    }

                                    if (response.modules.reports.loan_report) {
                                        if (response.modules.reports.loan_report.all == "1") {
                                            menu_content += '<li class="kt-menu__item">';
                                            menu_content += '<a href="' + base_url + 'reports/loan_report' + '" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text txt-tf-caps">Loan Report</span></a>';
                                            menu_content += '</li>';
                                        }
                                    }

                                    if (response.modules.reports.repayment_report) {
                                        if (response.modules.reports.repayment_report.all == "1") {
                                            menu_content += '<li class="kt-menu__item">';
                                            menu_content += '<a href="' + base_url + 'reports/repayment_report' + '" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text txt-tf-caps">Repayment Report</span></a>';
                                            menu_content += '</li>';
                                        }
                                    }

                                    if (response.modules.reports.loan_repayment_summary_report) {
                                        if (response.modules.reports.loan_repayment_summary_report.all == "1") {
                                            menu_content += '<li class="kt-menu__item">';
                                            menu_content += '<a href="' + base_url + 'reports/loan_repayment_summary_report' + '" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text txt-tf-caps">Loan & Repayment Summary Report</span></a>';
                                            menu_content += '</li>';
                                        }
                                    }
                                }

                                //alert($("#is_new_user").val());


                                if (menu_content != "") {

                                    var newDirective = angular.element(menu_content);
                                    // kt-menu__item--active - Active menu class
                                    //console.log(element);
                                    wrappedQueryResult.append(newDirective);
                                    $compile(newDirective)($scope);
                                } else {
                                    $(".kt-aside").css("display", "none");
                                    $(".kt-aside--fixed.kt-aside--minimize .kt-wrapper").css("padding-left", "0px");
                                }

                                $(".preloader").fadeOut();
                            })
                };

            }]);



        var top_bar_app = angular.module('top_bar_app', []);
        top_bar_app.controller('top_bar_controller', ['$scope', '$http', '$compile', '$location', '$window', function ($scope, $http, $compile, $location, $window) {

                $scope.logout = function () {
                    $window.location.href = base_url + "users/logout";
                }
            }]);
        var kt_wrapper_div = document.getElementById('kt_wrapper');

        angular.element(document).ready(function () {
            angular.bootstrap(kt_wrapper_div, ['top_bar_app']);
        });


    </script>

    <script>
        var KTAppOptions = {"colors": {"state": {"brand": "#22b9ff", "light": "#ffffff", "dark": "#282a3c", "primary": "#5867dd", "success": "#34bfa3", "info": "#36a3f7", "warning": "#ffb822", "danger": "#fd3995"}, "base": {"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"], "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]}}};
    </script>
    <script src="<?php echo $theme_path; ?>/assets/plugins/global/plugins.bundle.js" type="text/javascript"></script>
    <script src="<?php echo $theme_path; ?>/assets/js/scripts.bundle.js" type="text/javascript"></script>
    <script src="<?php echo $theme_path; ?>/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript">
    </script>
    <script src="<?php echo $theme_path; ?>/assets/plugins/custom/gmaps/gmaps.js" type="text/javascript"></script>
    <script src="<?php echo $theme_path; ?>/assets/js/pages/dashboard.js" type="text/javascript"></script>
    <script src="<?php echo $theme_path; ?>/assets/plugins/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
    <script src="<?php echo $theme_path; ?>/assets/js/pages/components/extended/sweetalert2.js" type="text/javascript"></script>

<!--    <script src="https://www.google.com/jsapi" type="text/javascript"></script>-->
    <!--<script src="<?php echo $theme_path; ?>/assets/js/pages/components/charts/google-charts.js" type="text/javascript"></script>-->


    <!--<script src="<?php echo $theme_path; ?>/assets/js/amcharts.js" type="text/javascript"></script>
    <script src="<?php echo $theme_path; ?>/assets/js/serial.js" type="text/javascript"></script>
    <script src="<?php echo $theme_path; ?>/assets/js/radar.js" type="text/javascript"></script>
    <script src="<?php echo $theme_path; ?>/assets/js/pie.js" type="text/javascript"></script>
    <script src="<?php echo $theme_path; ?>/assets/js/pages/components/charts/amcharts/charts.js" type="text/javascript"></script>-->



    <!--<script src="<?php echo $theme_path; ?>/assets/js/animate.min.js.js" type="text/javascript"></script>-->
    <!--<script src="<?php echo $theme_path; ?>/assets/js/pages/components/charts/amcharts/charts.js" type="text/javascript"></script>-->

</html>
