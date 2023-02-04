<style>
    table tr td:nth-child(3){text-align:center;}
    table tr td:nth-child(5){text-align:center;}
    table tr td:nth-child(6){text-align:center;}
    table tr td:nth-child(7){text-align:center;}
    table tr td:nth-child(8){text-align:center;}
    table tr td:nth-child(9){text-align:center;}
    table tr td:nth-child(10){text-align:center;}
    .kt-chat__messages{padding-left: 25px;
                       padding-right: 25px;
                       padding-top: 10px;}
    .kt-chat{width:80%; margin:0 auto;box-shadow: 0px 0px 13px 1px rgba(82, 63, 105, 0.18);
             background-color: #ffffff;}

    /*.kt-chat .kt-portlet{border: 2px solid #22b9ff; box-shadow: 0px 0px 13px 0px rgb(232, 248, 255);}*/
    .viewtxt-msg-right{margin-right:31px;margin-top:-34px;}
    .viewtxt-msg-left{margin-left:31px;margin-top:-34px;}
    .viewtxt-msg-right .kt-chat__text{padding: 1.1rem 1.7rem !important; margin-top: 0rem !important; margin-right:5px !important;}
    .viewtxt-msg-right .kt-chat__text p{margin-top: 0rem !important;
                                        margin-bottom: unset;}
    .viewtxt-msg-left .kt-chat__text{padding: 1.1rem 1.7rem !important; margin-top: 0rem !important; margin-left: 5px !important;}
    .kt-chat .kt-chat__input .kt-chat__editor textarea{border: 1px solid #e0e0e0 !important; padding: 9px;}
    .kt-chat .kt-chat__input .kt-chat__editor textarea{color: #111111!important;}
    .kt-chat .kt-chat__messages .kt-chat__message .kt-chat__user .kt-chat__datetime{font-size: 0.8rem;}
    .kt-chat .kt-chat__messages .kt-chat__message .kt-chat__user .kt-chat__username{font-size: 0.9rem;}
    .msglradjust{background-color:#f1f1f1;}
    .ng-binding{
        margin-top: 10px;}
    </style>
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"  id="messageboard_div" ng-app="messageboard_app" ng-controller="messageboard_controller" ng-init="loadPage()" ng-cloak>
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">

                <h3 class="kt-subheader__title">
                    View Message for "{{caption}}"
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                &nbsp;
            </div>


        </div>
        <!-- <div class="kt-subheader__toolbar" id="add_btn_div" >

             <button type="button" class="btn btn-label-brand btn-icon-sm" ng-click="hiddenDiv = !hiddenDiv">
                 <i ng-class="{'flaticon-cancel' : hiddenDiv, 'flaticon-eye' : !hiddenDiv}"></i> View
             </button>
         </div>-->


    </div>
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__body"  ng-show="hiddenDiv">
                <div class="kt-subheader__main message_div">



                </div>
            </div>
        </div>
    </div>
    <div class="kt-portlet dash_board" ng-if="messageCreator == thisMember">
        <div class="kt-portlet__body  kt-portlet__body--fit">
            <div class="row row-no-padding row-col-separator-lg">
                <div class="col-md-3 col-lg-3 col-xl-3 kt-iconbox--success kt-iconbox--animate-fast">
                    <!--begin::New Users-->
                    <div class="kt-widget24">
                        <div class="kt-widget24__details">
                            <div class="kt-widget24__info">
                                <h4 class="kt-widget24__title">
                                    Accepted
                                </h4>
                            </div>

                            <span class="kt-widget24__stats kt-font-success">
                                {{acceptCount}}
                            </span>
                        </div>


                    </div>
                    <!--end::New Users-->
                </div>


                <div class="col-md-3 col-lg-3 col-xl-3 kt-iconbox--danger kt-iconbox--animate-fast">
                    <!--begin::New Orders-->
                    <div class="kt-widget24 ">
                        <div class="kt-widget24__details ">
                            <div class="kt-widget24__info">
                                <h4 class="kt-widget24__title">
                                    Rejected
                                </h4>

                            </div>

                            <span class="kt-widget24__stats kt-font-danger">
                                {{rejectCount}}
                            </span>
                        </div>


                    </div>
                    <!--end::New Orders-->
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3  kt-iconbox--warning kt-iconbox--animate-fast">
                    <!--begin::New Feedbacks-->
                    <div class="kt-widget24">
                        <div class="kt-widget24__details">
                            <div class="kt-widget24__info">
                                <h4 class="kt-widget24__title">
                                    No response
                                </h4>
                            </div>

                            <span class="kt-widget24__stats kt-font-warning">
                                {{noresponseCount}}
                            </span>
                        </div>


                    </div>
                    <!--end::New Feedbacks-->
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3 kt-iconbox--info kt-iconbox--animate-fast">
                    <!--begin::Total Profit-->
                    <div class="kt-widget24">
                        <div class="kt-widget24__details">
                            <div class="kt-widget24__info">
                                <h4 class="kt-widget24__title">
                                    Total Messages Sent
                                </h4>
                            </div>

                            <span class="kt-widget24__stats kt-font-brand">
                                {{totalCount}}
                            </span>
                        </div>

                    </div>
                    <!--end::Total Profit-->
                </div>



            </div>
        </div>
    </div>
    <!-- begin:: Content -->

    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid msglradjust" >
        <div class="kt-portlet kt-portlet--mobile msglradjust">

            <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                <!-- begin:: Content -->
                <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                    <!--Begin::App-->
                    <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
                        <!--Begin:: App Aside Mobile Toggle-->
                        <button class="kt-app__aside-close" id="kt_chat_aside_close">
                            <i class="la la-close"></i>
                        </button>
                        <!--End:: App Aside Mobile Toggle-->

                        <!--Begin:: App Content-->

                        <div class="kt-grid__item kt-grid__item--fluid kt-app__content" id="kt_chat_content">
                            <div class="kt-chat">
                                <div class="kt-portlet kt-portlet--head-lg kt-portlet--last mt-4 mr-6">
                                    <div class="kt-portlet__head">
                                        <div class="kt-chat__head ">
                                            <div class="col-lg-12">
                                                <div class="" ng-bind-html="messageBoardMessage">
                                                    <!--<a href="#" class="kt-chat__title">Responses for "{{caption}}" message</a>-->
                                                    <!--<span class="kt-chat__status">
                                                        <span class="kt-badge kt-badge--dot kt-badge--success"></span>
                                                    </span>-->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="this_member_id" value="<?php echo $this->user_auth->get_user_id(); ?>">
                                    <input type="hidden"  ng-model="thisMember">
                                    <input type="hidden" id="messageboard_id">
                                    <input type="hidden" id="created_by">
                                    <input type="hidden" ng-model="messageCreator">

                                    <div class="kt-portlet__body">
                                        <div class="kt-scroll kt-scroll--pull" data-mobile-height="300">
                                            <div class="kt-chat__messages">

                                                <!--<div class="kt-chat__message" ng-repeat="(key, chatMessage) in memberMessages" ng-if="chatMessage.message != ''">
                                                    <div class="kt-chat__user">
                                                        <span class="kt-media kt-media--circle kt-media--sm" ng-if="chatMessage.receiver_id == thisMember">
                                                            <img src="<?php echo base_url(); ?>attachments/profile_image/{{chatMessage.receiver_profile_picture}}" alt="image">
                                                        </span>
                                                        <span class="kt-media kt-media--circle kt-media--sm" ng-if="chatMessage.sender_id == thisMember">
                                                            <img src="<?php echo base_url(); ?>attachments/profile_image/{{chatMessage.sender_profile_picture}}" alt="image">
                                                        </span>
                                                        <a href="#" class="kt-chat__username" ng-if="chatMessage.receiver_id == thisMember"><span>{{chatMessage.receiver_name}}</span></a>
                                                        <a href="#" class="kt-chat__username" ng-if="chatMessage.sender_profile_picture == thisMember"><span>You</span></a>
                                                        <span class="kt-chat__datetime">{{chatMessage.created_date}}</span>
                                                    </div>
                                                    <div class="kt-chat__text kt-bg-light-success" >
                                                        {{chatMessage.message}}
                                                    </div>
                                                </div>-->
                                                <!--<div class="kt-chat__message" ng-if="sourceMessageReceiver">
                                                    <div class="kt-chat__user col-lg-12">
                                                        <div class="">
                                                            <span class="kt-media kt-media--circle kt-media--sm">
                                                                <img src="<?php echo base_url(); ?>attachments/profile_image/{{creatorProfileImage}}" alt="image">
                                                            </span>
                                                        </div>
                                                        <div class="viewtxt-msg-left">
                                                            <div class=""><a href="#" class="kt-chat__username">{{messageboardCreatorName}}</a>
                                                                <span class="kt-chat__datetime">{{messageboardCreatedDate| convertDate}}</span></div>
                                                            <div class="kt-chat__text kt-bg-light-success" id="messageboard_message_received" ng-bind-html="messageBoardMessage">

                                                            </div>
                                                        </div>

                                                    </div>


                                                </div>
                                                <div class="kt-chat__message kt-chat__message--right" ng-if="sourceMessageSender">
                                                    <div class="kt-chat__user col-lg-12">
                                                        <div class="">
                                                            <span class="kt-media kt-media--circle kt-media--sm">
                                                                <img src="<?php echo base_url(); ?>attachments/profile_image/{{creatorProfileImage}}" alt="image">
                                                            </span>
                                                        </div>
                                                        <div class="viewtxt-msg-right">
                                                            <div class=""><span class="kt-chat__datetime">{{messageboardCreatedDate| convertDate}}</span>
                                                                <a href="#" class="kt-chat__username">You</a></div>
                                                            <div class="kt-chat__text kt-bg-light-brand" id="messageboard_message_sent" ng-bind-html="messageBoardMessage">

                                                            </div>
                                                        </div>

                                                    </div>


                                                </div>-->

                                                <div ng-repeat="(key, chatMessage) in memberMessages" ng-if="chatMessage.is_source_message == 0" >
                                                    <div class="kt-chat__message"  ng-if="chatMessage.receiver_id == thisMember">
                                                        <div class="kt-chat__user col-lg-12">
                                                            <div>
                                                                <span class="kt-media kt-media--circle kt-media--sm">
                                                                    <img src="<?php echo base_url(); ?>attachments/profile_image/{{chatMessage.sender_profile_picture}}" alt="image">
                                                                </span>
                                                            </div>
                                                            <div class="viewtxt-msg-left">
                                                                <div>
                                                                    <a href="#" class="kt-chat__username">{{chatMessage.receiver_name}}</span></a>
                                                                    <span class="kt-chat__datetime">{{chatMessage.created_date| convertDate}}</span>
                                                                </div>
                                                                <div class="kt-chat__text kt-bg-light-success">
                                                                    <span ng-if="chatMessage.acceptance_status == 1">Accepted : </span><span ng-if="chatMessage.acceptance_status == 2">Rejected : </span>{{chatMessage.message}}
                                                                    <input type="hidden" class="received_messages_id" value="{{chatMessage.id}}">
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="kt-chat__message kt-chat__message--right" ng-if="chatMessage.sender_id == thisMember">
                                                        <div class="kt-chat__user col-lg-12">
                                                            <div class="">
                                                                <span class="kt-media kt-media--circle kt-media--sm">
                                                                    <img src="<?php echo base_url(); ?>attachments/profile_image/{{chatMessage.sender_profile_picture}}" alt="image">
                                                                </span>
                                                            </div>
                                                            <div class="viewtxt-msg-right">
                                                                <div>
                                                                    <span class="kt-chat__datetime">{{chatMessage.created_date| convertDate}} </span>
                                                                    <a href="#" class="kt-chat__username">You</a>
                                                                </div>
                                                                <div class="kt-chat__text kt-bg-light-brand">
                                                                    <span ng-if="chatMessage.acceptance_status == 1">Accepted : </span><span ng-if="chatMessage.acceptance_status == 2">Rejected : </span>{{chatMessage.message}}
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>


                                                </div>
                                            </div>
                                        </div>

                                        <div class="kt-portlet__foot">
                                            <div class="kt-chat__input">
                                                <label>Reply message</label>
                                                <div class="kt-chat__editor">
                                                    <textarea id="reply_message" style="height: 50px" placeholder="Type here..."></textarea>
                                                    <span class="form-text text-muted reply_message-error error-span"></span>
                                                </div>
                                                <div class="kt-chat__toolbar">
                                                    <div class="kt_chat__tools">
                                                        <!--<a href="#"><i class="flaticon2-link"></i></a>
                                                        <a href="#"><i class="flaticon2-photograph"></i></a>
                                                        <a href="#"><i class="flaticon2-photo-camera"></i></a>-->
                                                    </div>
                                                    <div class="kt_chat__actions">
                                                        <button type="button" id="send_reply_message" class="btn btn-brand btn-md btn-upper btn-bold kt-chat__reply" >reply</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End:: App Content-->
                        </div>
                        <!--End::App-->
                    </div>
                    <!-- end:: Content -->
                    <div class="form-group row ">

                        <div class="col-md-12 pt-12">

                            <div class="text-center">

                                <button type="button" class="btn btn-info" ng-click="goBack()">Back</button>
                            </div>
                        </div>


                    </div>
                </div>



            </div>
        </div>
        <!-- end:: Content -->
    </div>


    <script>
        var messageboard_app = angular.module('messageboard_app', []);
        messageboard_app.controller('messageboard_controller', ['$scope', '$http', '$compile', '$location', '$window', '$sce', function ($scope, $http, $compile, $location, $window, $sce) {
                $scope.thisMember = $("#this_member_id").val();

                $scope.loadPage = function () {

                    $http.get(base_url + 'users/getPermissions')
                            .success(function (response) {
                                //console.log(response);
                                var modules_permission = response.modules;
                                $scope.isVisible = "false";
                                if (modules_permission['messageboard']) {
                                    if (modules_permission['messageboard']['messageboard']) {
                                        KTFormWidgets.init();
                                    } else {
                                        $window.location.href = base_url + "users/my_profile";
                                    }
                                } else {
                                    $window.location.href = base_url + "users/my_profile";
                                }


                            })

                    $scope.loadMessageBoardMessages();


                    $scope.memberName = "Welcome";
                    $scope.messageBoardMessage = "";

                };
                $scope.loadMessageBoardMessages = function () {
                    var url = $location.absUrl();
                    var messageboard_id = url.substring(url.lastIndexOf('/') + 1);
                    $http.get(base_url + 'messageboard/get_messageboard/' + messageboard_id)
                            .success(function (data) {
                                console.log(data);
                                $("#messageboard_id").val(data.messageboard[0]['id']);
                                $("#created_by").val(data.messageboard[0]['created_by']);
                                $scope.messageBoardMessage = $sce.trustAsHtml(data.messageboard[0]['message']);
                                $scope.messageBoardMessageReceived = $sce.trustAsHtml(data.messageboard[0]['message']);
                                //alert($scope.messageBoardMessage);
                                //$("#messageboard_message_received").html(data.messageboard[0]['message']);
                                //$("#messageboard_message_sent").html(data.messageboard[0]['message']);
                                $scope.messageCreator = data.messageboard[0]['created_by'];
                                $scope.messageboardCreatorName = data.messageboard[0]['creator_name'];
                                $scope.acceptCount = data.messageboard[0]['accept_count'];
                                $scope.rejectCount = data.messageboard[0]['reject_count'];
                                $scope.totalCount = data.messageboard[0]['total_count'];
                                $scope.caption = data.messageboard[0]['caption'];
                                $scope.noresponseCount = parseInt(data.messageboard[0]['total_count']) - (parseInt(data.messageboard[0]['accept_count']) + parseInt(data.messageboard[0]['reject_count']));
                                $scope.messageboardCreatedDate = data.messageboard[0]['created_date'];
                                $scope.creatorProfileImage = data.messageboard[0]['creator_profile_picture'];
                                //$(".message_div").html(data.messageboard[0]['message']);
                                $scope.loadMemberMessages();
                                $scope.updateViewStatus();
                            })
                }
                $scope.loadMemberMessages = function () {
                    var url = $location.absUrl();
                    var messageboard_id = url.substring(url.lastIndexOf('/') + 1);
                    $http.get(base_url + 'messageboard/get_member_messages/' + messageboard_id)
                            .success(function (data) {
                                console.log(data);
                                //alert("merber message");
                                $scope.memberMessages = data.view_messages;
                                //alert($scope.thisMember);
                                if ($scope.messageCreator == $scope.thisMember) {
                                    $scope.sourceMessageReceiver = false;
                                    $scope.sourceMessageSender = true;
                                } else {
                                    $scope.sourceMessageReceiver = true;
                                    $scope.sourceMessageSender = false;
                                }
                            })
                }

                $scope.updateViewStatus = function () {
                    //alert("sdbvs");

                    var url = $location.absUrl();
                    var messageboard_id = url.substring(url.lastIndexOf('/') + 1);
                    $http.get(base_url + 'messageboard/update_view_status_all/' + messageboard_id)
                            .success(function (data) {
                                console.log(data);
                                //return;
                                //alert("merber message");
                                //if (data.result == "success") {

                                //}
                            })
                }

                $scope.loadMemberType = function () {
                    $http.get(base_url + 'messageboard/get_member_type')
                            .success(function (data) {
                                //console.log(data);
                                $scope.memberType = data.member_type;
                            })
                }
                $scope.goBack = function () {
                    $window.location.href = base_url + "messageboard";
                }

                $scope.viewChat = function (messageReceivedId) {
                    //alert(messageReceivedId);
                    $http.get(base_url + 'messageboard/view_chat/' + messageReceivedId)
                            .success(function (data) {
                                //console.log(data);
                                //return;
                                //var obj = JSON.parse(data);
                                //console.log(data.users);
                                $scope.memberName = data.users[0]['username'];
                            })
                }
                //            $scope.replyMessage = function () {
                //
                //            }

            }]);
        var messageboard_div = document.getElementById('messageboard_div');
        //alert(dvSecond);
        angular.element(document).ready(function () {
            angular.bootstrap(messageboard_div, ['messageboard_app']);

        });

        messageboard_app.filter('convertDate', function () {
            return function (dateString) {

                if (dateString != '0000-00-00' && dateString != null) {
                    var time_split = dateString.split(" ");
                    //var time = time_split[1];
                    var time = time_split[1].split(":");
                    time_format = time[0] + ":" + time[1];
                    var dateObject = new Date(dateString);
                    //console.log(dateObject);
                    var date_val = dateObject.getDate() + '/' + (parseInt(dateObject.getMonth()) + 1) + '/' + dateObject.getFullYear() + " " + time_format;
                    return date_val;
                } else {
                    return null;
                }
            };
        });

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
        //    $(document).on('click', '.check_messages', function () {
        //        var message_received_id = $(this).attr("data-id");
        //        //alert(message_received_id);
        //        $.ajax({
        //            method:"POST",
        //            url: base_url+"messageboard/check_chat",
        //            dataString =
        //        });
        //    });
        $(document).on('click', '#send_reply_message', function () {
            //send_reply_message
            $("#send_reply_message").addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
            var reply_message = $("#reply_message").val();
            if (reply_message == "") {
                $(".reply_message-error").html("Please type message");
            } else {
                $(".reply_message-error").html("");
                var this_member_id = $("#this_member_id").val();
                var messageboard_id = $("#messageboard_id").val();
                var created_by = $("#created_by").val();
                var dataString = "this_member_id=" + this_member_id + "&messageboard_id=" + messageboard_id + "&created_by=" + created_by + "&reply_message=" + reply_message;
                //alert(dataString);
                $.ajax({
                    method: "POST",
                    url: base_url + "messageboard/send_reply_message",
                    data: dataString,
                    error: function (data) {
                        console.log(data);
                    },
                    success: function (data) {
                        console.log(data);
                        window.location.reload();
                    }
                });
            }
        });
    </script>