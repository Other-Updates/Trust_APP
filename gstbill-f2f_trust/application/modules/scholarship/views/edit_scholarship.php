<?php
$theme_path = $this->config->item('theme_locations') . 'esms';
?>
<style>
	.supporting-doc .kt-avatar__holder-large { margin:0 auto;}
	.supporting-doc .kt-avatar .kt-avatar__upload {right: 25px;}
</style>
<div class="row hide" id="success_alert">
    <div class="col-xl-12">
        <div class="alert alert-outline-success fade show" role="alert">
            <div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
            <div class="alert-text">Successfully updated scholarship</div>

        </div>
    </div>
</div>
<div class="row hide" id="failed_alert">
    <div class="col-xl-12">
        <div class="alert alert-outline-danger fade show" role="alert">
            <div class="alert-icon"><i class="flaticon-questions-circular-button"></i></div>
            <div class="alert-text">Failed to update scholarship</div>

        </div>
    </div>
</div>
<div class="row hide" id="warning_alert">
    <div class="col-xl-12">
        <div class="alert alert-outline-warning fade show" role="alert">
            <div class="alert-icon"><i class="flaticon-warning"></i></div>
            <div class="alert-text" id="warning_msg_div"></div>

        </div>
    </div>
</div>

<div class="kt-grid__item kt-grid__item--fluid kt-app__content"  id="edit_scholarship_div" ng-app="edit_scholarship_app" ng-controller="edit_scholarship_controller" ng-init="pageLoad()" ng-cloak>
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">

                <h3 class="kt-subheader__title">
                    Edit Details of &nbsp;<span class="capitalize">{{studentName}}</span>
                </h3>

                <span class="kt-subheader__separator kt-subheader__separator--v"></span>


            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <!--begin:: Widgets/Trends-->
            <div class="kt-portlet kt-portlet--head--noborder kt-portlet--height-fluid">

                <form id="add_scholarship_form" class="kt-form kt-form--label-right">
                    <div class="kt-portlet__body">
                        <div class="form-group">

                        </div>
                        <div class="row">
                            <div class="col-xl-9 col-lg-9 col-md-9" style="float:left;">
                                <div class="form-group row ">

                                    <div class="col-md-4">
                                        <label>Application Date<span class="req">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="application_date" placeholder="Select date" id="application_date" aria-describedby="kt_datepicker-error" aria-invalid="false" ng-model="applicationDate">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar-check-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <span class="form-text text-muted application_date-error error-span"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Approved Amount<span class="req">*</span></label>
                                        <input type="text" class="form-control validate_amount" aria-describedby="emailHelp" name="approved_amount" id="approved_amount" placeholder="Enter Application Amount" ng-model="approvedAmount">
                                        <span class="form-text text-muted approved_amount-error error-span"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Approved Date<span class="req">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="approved_year" placeholder="Select Date" id="approved_year" aria-describedby="kt_datepicker-error" aria-invalid="false" ng-model="approvedYear">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="la la-calendar-check-o"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <span class="form-text text-muted approved_year-error error-span"></span>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Application Type<span class="req">*</span></label>

                                        <select class="form-control" name="application_type_id" id="application_type_id" ng-model="applicationTypeValue">
                                            <option value="">Select Application type</option>
                                            <option  ng-repeat="(key, applicationTypeData) in applicationType" value="{{applicationTypeData.id}}" ng-selected="{{applicationTypeData.id == applicationTypeHidden}}">{{applicationTypeData.name}}</option>
                                        </select>
                                        <span class="form-text text-muted application_type_id-error error-span"></span>
                                        <input type="hidden" ng-model="applicationTypeHidden">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Years Sponsored<span class="req">*</span></label>
                                        <input type="text" class="form-control" aria-describedby="emailHelp" name="years_sponsored" id="years_sponsored" placeholder="Enter Years Sponsored" ng-model="yearsSponsored">
                                        <!--<select class="form-control" name="years_sponsored" id="years_sponsored" ng-model="yearsSponsored">
                                            <option value="">Select year</option>
                                            <option value="1990">1990</option>
                                            <option value="1991">1991</option>
                                            <option value="1992">1992</option>
                                            <option value="1993">1993</option>
                                            <option value="1994">1994</option>
                                            <option value="1995">1995</option>
                                            <option value="1996">1996</option>
                                            <option value="1997">1997</option>
                                            <option value="1998">1998</option>
                                            <option value="1999">1999</option>
                                            <option value="2000">2000</option>
                                            <option value="2001">2001</option>
                                            <option value="2002">2002</option>
                                            <option value="2003">2003</option>
                                            <option value="2004">2004</option>
                                            <option value="2005">2005</option>
                                            <option value="2006">2006</option>
                                            <option value="2007">2007</option>
                                            <option value="2008">2008</option>
                                            <option value="2009">2009</option>
                                            <option value="2010">2010</option>
                                            <option value="2011">2011</option>
                                            <option value="2012">2012</option>
                                            <option value="2013">2013</option>
                                            <option value="2014">2014</option>
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                        </select>-->

                                        <span class="form-text text-muted years_sponsored-error error-span"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Student Name<span class="req">*</span></label>
                                        <input type="text" class="form-control" aria-describedby="emailHelp" name="student_name" id="student_name" placeholder="Enter Student Name" ng-model="studentName">
                                        <span class="form-text text-muted student_name-error error-span"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 cpl-md-3" style="float:left;">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label>Profile Picture<span class="req">*</span></label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_2">
                                            <div class="kt-avatar__holder imagePreview kt-avatar__holder-profile-image-large" id="profile_picture_preview" ng-style="{'background-image': 'url(' + profilePicture + ')'}"></div>
                                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Upload profile image">
                                                <i class="fa fa-pen"></i>
                                                <input type="file" name="profile_picture" id="profile_picture">
                                            </label>
                                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                                <i class="fa fa-times"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <input type="hidden" id="profile_image_data" ng-value="profileImgData">
                                    <span class="form-text text-muted profile_picture-error error-span"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">

                            <div class="col-md-3">
                                <label>Gender<span class="req">*</span></label>

                                <select class="form-control" name="gender_id" id="gender_id" ng-model="genderID">
                                    <option value="">Select Gender</option>
                                    <option  ng-repeat="(key, genderData) in genderValues" value="{{genderData.id}}" ng-selected="{{genderData.id == genderHidden}}">{{genderData.name}}</option>
                                </select>
                                <span class="form-text text-muted gender_id-error error-span"></span>
                                <input type="hidden" ng-model="genderHidden">
                            </div>
                            <div class="col-md-3">
                                <label>Date of Birth<span class="req">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="dob" placeholder="Select Date" id="dob_datepicker" aria-describedby="kt_datepicker-error" aria-invalid="false" ng-model="dobValue">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="form-text text-muted dob-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Email ID<span class="req">*</span></label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="email" id="email" placeholder="Enter Email ID" ng-model="emailId">
                                <span class="form-text text-muted email-error error-span"></span>
                            </div>


                            <div class="col-md-3">
                                <label>Mobile Number<span class="req">*</span></label>
                                <input type="text" class="form-control validate_amount" aria-describedby="emailHelp" name="mobile_no" id="mobile_no" placeholder="Enter Mobile Number" ng-model="mobileNo">
                                <span class="form-text text-muted mobile_no-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Landline Number</label>
                                <input type="text" class="form-control validate_amount" aria-describedby="emailHelp" name="landline_no" id="landline_no" placeholder="Enter Landline Number" ng-model="landlineNo">
                                <span class="form-text text-muted landline_no-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Door Number<span class="req">*</span></label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="door_no" id="door_no" placeholder="Enter Door Number" ng-model="doorNo">
                                <span class="form-text text-muted door_no-error error-span"></span>
                            </div>



                            <div class="col-md-3">
                                <label>Street<span class="req">*</span></label>
                                <!--<input type="text" class="form-control" aria-describedby="emailHelp" name="street" id="street" placeholder="Enter Street" ng-model="streetName">-->
                                <select class="form-control" name="street" id="street">
                                    <option value="">Select Street</option>
                                    <option  ng-repeat="(key, street) in streets" value="{{street.id}}" ng-selected="{{street.id == streetHidden}}">{{street.name}}</option>
                                </select>
                                <span class="form-text text-muted street-error error-span"></span>
                                <input type="hidden" ng-model="streetHidden">
                            </div>
                            <div class="col-md-3">
                                <label>Address<span class="req">*</span></label>
                                <textarea class="form-control" aria-describedby="emailHelp" name="address" id="address" placeholder="Enter Address" ng-model="addressVal"></textarea>
                                <span class="form-text text-muted address-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>College Name<span class="req">*</span></label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="college_name" id="college_name" placeholder="Enter College Name" ng-model="collegeName">
                                <span class="form-text text-muted college_name-error error-span"></span>
                            </div>


                            <div class="col-md-3">
                                <label>College Address<span class="req">*</span></label>
                                <textarea class="form-control" aria-describedby="emailHelp" name="college_address" id="college_address" placeholder="Enter College Address" ng-model="collegeAddress"></textarea>
                                <span class="form-text text-muted college_address-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Course Name<span class="req">*</span></label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="course_name" id="course_name" placeholder="Enter Course Name" ng-model="courseName">
                                <span class="form-text text-muted course_name-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Course Type<span class="req">*</span></label>

                                <select class="form-control" name="course_type_id" id="course_type_id" ng-model="courseTypeVal" >
                                    <option value="">Select Course Type</option>
                                    <option  ng-repeat="(key, courseTypeData) in courseType" value="{{courseTypeData.id}}" ng-selected="{{courseTypeData.id == courseTypeHidden}}">{{courseTypeData.name}}</option>
                                </select>
                                <span class="form-text text-muted course_type_id-error error-span"></span>
                                <input type="hidden" ng-model="courseTypeHidden">
                            </div>

                            <div class="col-md-3">
                                <label>Course Completed Year</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="course_completed_year" placeholder="Select Date" id="course_completed_year" aria-describedby="kt_datepicker-error" aria-invalid="false" ng-model="courseCompletedYear">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="form-text text-muted course_completed_year-error error-span"></span>
                            </div>

                            <div class="col-md-3">
                                <label>Has Repayment</label>
                                <div class="kt-radio-inline">
                                    <label class="kt-radio">
                                        <input type="radio" name="has_repayments" value="1" ng-model="hasRepayment"> Yes
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" name="has_repayments" value="0" ng-model="hasRepayment"> No
                                        <span></span>
                                    </label>
                                </div>
                                <span class="form-text text-muted has_repayments-error error-span"></span>
                            </div>

                            <div class="col-md-3">
                                <label>Payment on Hold</label>

                                <div class="kt-radio-inline">
                                    <label class="kt-radio">
                                        <input type="radio" name="payment_on_hold" value="1" ng-model="paymentOnHold"> Yes
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" name="payment_on_hold" value="0" ng-model="paymentOnHold"> No
                                        <span></span>
                                    </label>
                                </div>
                                <span class="form-text text-muted payment_on_hold-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Repayment Started Year</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="repayment_started_year" placeholder="Repayment Started Year" id="repayment_started_year" aria-describedby="kt_datepicker-error" aria-invalid="false" ng-model="repaymentStartYear" disabled>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="form-text text-muted repayment_started_year-error error-span"></span>
                            </div>

                            <div class="col-md-3">
                                <label>Repayment Completed Year</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="repayment_completed_year" placeholder="Select Date" id="repayment_completed_year" aria-describedby="kt_datepicker-error" aria-invalid="false" ng-model="repaymentCompletedYear">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="form-text text-muted repayment_completed_year-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <label>Zakaath Amount</label>
                                <input type="text" class="form-control validate_amount" aria-describedby="emailHelp" name="zakaath_amount" id="zakaath_amount" placeholder="Enter Zakaath Amount" ng-model="zakaathAmount" ng-blur="checkValidAmt()">
                                <span class="form-text text-muted zakaath_amount-error error-span">{{amtValid}}</span>
                                <input type="hidden" ng-model="zakaathAmountPrevious">
                            </div>
                            <!--                            <div class="col-md-3">
                                                            <label>Status</label>

                                                            <select class="form-control" id="status" name="status" ng-model="statusVal">
                                                                <option value="1">Active</option>
                                                                <option value="0">In Active</option>
                                                            </select>
                                                            <span class="form-text text-muted status-error error-span"></span>
                                                        </div>-->
                            <div class="col-md-3">
                                <label>Remark</label>
                                <textarea class="form-control large-txtarea" aria-describedby="emailHelp" name="remark" id="remark" placeholder="Enter Remark" ></textarea>
                                <span class="form-text text-muted college_address-error error-span"></span>
                            </div>
                            <div class="col-md-3">
                                <div class="col-md-12">
                                    <label>Scanned Copy of Application<span class="req">*</span></label>
                                    <label><span class="req">(Maximum File Size 5MB)</span></label>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group row">
                                <div class="col-md-5">
                                    <div class="kt-avatar kt-avatar--outline pointer-div" id="kt_user_avatar_2">

                                        <div class="kt-avatar__holder kt-avatar__holder-large imagePreview supporting_doc" id="scanned_application_preview" ng-show="((scanned_application_name).substring(scanned_application_name.lastIndexOf('.') + 1)) !== 'pdf'" style="background-image: url(<?php echo base_url(); ?>attachments/scanned_copy_of_application/{{scanned_scholarship_id}}/{{scanned_application_name}})" data-link="<?php echo base_url(); ?>attachments/scanned_copy_of_application/{{scanned_scholarship_id}}/{{scanned_application_name}}"></div>

                                        <!--<div class="kt-avatar__holder kt-avatar__holder-large imagePreview supporting_doc" id="scanned_application_preview"  style="background-image: url(<?php echo base_url(); ?>attachments/scanned_copy_of_application/{{scanned_scholarship_id}}/{{scanned_application_name}})" data-link="<?php echo base_url(); ?>attachments/scanned_copy_of_application/{{scanned_scholarship_id}}/{{scanned_application_name}}"></div>-->


                                        <div class="kt-avatar__holder kt-avatar__holder-large imagePreview scanned_application" id="scanned_application_preview" ng-if="((scanned_application_name).substring(scanned_application_name.lastIndexOf('.') + 1)) == 'pdf'" style="background-image: url(<?php echo $theme_path; ?>/assets/doc_icons/pdf.png)" data-link="<?php echo base_url(); ?>attachments/scanned_copy_of_application/{{scanned_scholarship_id}}/{{scanned_application_name}}"></div>

                                       <!-- <div class="kt-avatar__holder kt-avatar__holder-large imagePreview scanned_application" id="scanned_application_preview" ng-if="((scanned_application_name).substring(scanned_application_name.lastIndexOf('.') + 1)) !== 'pdf'" style="background-image: url(<?php echo base_url(); ?>attachments/scanned_copy_of_application/{{scanned_scholarship_id}}/{{scanned_application_name}})" data-link="<?php echo base_url(); ?>attachments/scanned_copy_of_application/{{scanned_scholarship_id}}/{{scanned_application_name}}"></div>-->




                                        <div class="kt-avatar__holder kt-avatar__holder-large imagePreview scanned_application" id="scanned_application_preview" ng-if="((scanned_application_name).substring(scanned_application_name.lastIndexOf('.') + 1)) == 'dpdf'" style="background-image: url(<?php echo base_url(); ?>attachments/scanned_copy_of_application/{{scanned_scholarship_id}}/{{scanned_application_name}})" data-link="<?php echo base_url(); ?>attachments/scanned_copy_of_application/{{scanned_scholarship_id}}/{{scanned_application_name}}"></div>


                                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Upload Scanned Copy of Application">
                                            <i class="fa fa-pen"></i>
                                            <input type="file" name="scanned_copy_of_application" id="scanned_copy_of_application">
                                        </label>
                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                            <i class="fa fa-times"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                <input type="hidden" id="scanned_copy_of_application_data" ng-value="scannedApplicationData">
                                <input type="text" id="scanned_copy_of_application_name"  Placeholder = "Application Name" class="form-control" ng-value="scannedApplicationName">
                                <span class="form-text text-muted scanned_copy_of_application-error error-span"></span>
                                <span class="form-text text-muted scanned_copy-info "></span>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">

                        </div>
                        <div class="kt-separator kt-separator--border-dashed"></div>
                        <!--<div class="form-group row ">
                            <div class="col-md-3">
                                <label>Add custom field</label>
                            </div>
                            <div class="col-md-9 ">
                                <div class="kt-uppy commit-btn" id="kt_uppy_5">
                                    <div class="kt-uppy__wrapper">
                                        <button type="button" class="btn btn-brand btn-icon-sm ng-scope" ng-click="addNewField()">
                                            <i class="flaticon2-plus"></i> Add Field
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="customEntryDiv">
                            <div class="form-group row" ng-repeat="(key, customFieldData) in customField">
                                <div class="col-md-2">
                                    <label>Label name<span class="req">*</span></label>
                                    <input type="text" class="form-control custom_label_update{{$index + 1}}" id="custom_label" name="custom_label" placeholder="Enter Label Name" value="{{customFieldData.label_name}}">
                                    <span class="form-text text-muted custom_label_update{{$index + 1}}-error error-span"></span>
                                </div>
                                <div class="col-md-2">
                                    <label>Value<span class="req">*</span></label>
                                    <input type="text" class="form-control custom_value_update{{$index + 1}}" aria-describedby="emailHelp" name="custom_value" id="custom_value" placeholder="Enter Value"  value="{{customFieldData.value}}">
                                    <span class="form-text text-muted custom_value_update{{$index + 1}}-error error-span"></span>
                                </div>
                                <div class="col-md-3 text-center">
                                    <label>Action</label>

                                    <div class="kt-subheader__toolbar">
                                        <a class="btn btn-label-brand btn-bold m-l-15 update_custom_entry" data-entry-id="{{customFieldData.id}}" data-count="{{$index + 1}}" id="save_custom_entry">
                                            <i class="flaticon-edit"></i></a>
                                        <a class="btn btn-label-danger btn-bold delete_custom_entry_update" data-entry-id="{{customFieldData.id}}" data-count="{{$index + 1}}" id="delete_custom_entry_update">
                                            <i class="flaticon2-trash"></i></a>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <label>Label name<span class="req">*</span></label>
                                    <input type="text" class="form-control custom_label0" id="custom_label" name="custom_label" placeholder="Enter Label Name" >

                                    <span class="form-text text-muted custom_label0-error error-span"></span>
                                </div>
                                <div class="col-md-2">

                                    <label>Value<span class="req">*</span></label>
                                    <input type="text" class="form-control custom_value0" aria-describedby="emailHelp" name="custom_value" id="custom_value" placeholder="Enter Value" >
                                    <span class="form-text text-muted custom_value0-error error-span"></span>
                                </div>
                                <div class="col-md-3 text-center">
                                    <label>Action</label>

                                    <div class="kt-subheader__toolbar">
                                        <a class="btn btn-label-brand btn-bold m-l-15 save_custom_entry" data-id="" data-count="0" id="save_custom_entry">
                                            <i class="flaticon2-check-mark"></i></a>
                                        <a class="btn btn-label-danger btn-bold delete_custom_entry" id="delete_custom_entry">
                                            <i class="flaticon2-trash"></i></a>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <input type="hidden" id="entry_count" ng-value="totalEntry">-->
                        <!--<div class="kt-separator kt-separator--border-dashed"></div>-->

                        <div class="kt-portlet ">

                            <div class="kt-portlet__body">
                                <!--begin::Accordion-->
                                <div class="accordion accordion-solid accordion-toggle-plus" id="accordionExample6">

                                    <div class="card">
                                        <div class="card-header" id="headingTwo6">
                                            <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseTwo6" aria-expanded="false" aria-controls="collapseTwo6">
                                                <i class="flaticon-notepad"></i> Remark(s)
                                            </div>
                                        </div>
                                        <div id="collapseTwo6" class="collapse" aria-labelledby="headingTwo6" data-parent="#accordionExample6">
                                            <div class="card-body">
                                                <div class="kt-widget2">
                                                    <div class="kt-widget2__item kt-widget2__item--primary" ng-repeat="(key, remarksData) in remarks">
                                                        <div class="kt-widget2__checkbox">

                                                        </div>
                                                        <div class="kt-widget2__info col-lg-12">
                                                            <div class="col-xl-12">
                                                                <div class="col-xl-8">
                                                                    <a href="#" class="kt-widget2__title">
                                                                        {{remarksData.remarks}}
                                                                    </a>
                                                                </div>
                                                                <div class="col-xl-4">
                                                                    <a href="#" class="kt-widget2__username">
                                                                        Created by {{remarksData.name}} on
                                                                        {{remarksData.created_date| convertDate}}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="kt-widget2__actions">

                                                        </div>
                                                    </div>
                                                    <div class="kt-widget2__item kt-widget2__item--primary" ng-show="!remarks.length">
                                                        <div class="kt-widget2__checkbox">

                                                        </div>
                                                        <div class="kt-widget2__info">
                                                            <a href="#" class="kt-widget2__title">
                                                                No remarks found.
                                                            </a>

                                                        </div>
                                                        <div class="kt-widget2__actions">

                                                        </div>
                                                    </div>
                                                    <!--<div class="kt-widget2__item kt-widget2__item--primary">
                                                        <div class="kt-widget2__checkbox">

                                                        </div>
                                                        <div class="kt-widget2__info">
                                                            <a href="#" class="kt-widget2__title">
                                                                Make Metronic Great  Again.Lorem Ipsum Amet
                                                            </a>

                                                        </div>
                                                        <div class="kt-widget2__actions">

                                                        </div>
                                                    </div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!--end::Accordion-->
                            </div>
                        </div>

                        <div class="form-group row ">



                            <div class="col-md-3">
                                <label>Supporting Documents<span class="req">*</span></label>
                                <label><span class="req">(Maximum File Size 5MB)</span></label>
                            </div>


                            <div class="col-md-9 txt-align-right">
                                <div class="kt-uppy" id="kt_uppy_5">
                                    <div class="kt-uppy__wrapper">
                                        <div class="uppy-Root uppy-FileInput-container">
                                            <input class="uppy-FileInput-input kt-uppy__input-control" type="file" name="supporting_documents" multiple="" id="supporting_documents" style="">
                                            <label class="kt-uppy__input-label btn btn-label-brand btn-bold btn-font-sm" for="supporting_documents">Add more files</label>
                                        </div>
                                        <span class="form-text text-muted supporting_documents-error error-span"></span>
                                        <span class="form-text text-muted supporting_documents-info "></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group  row" id="view_supporting_document_div">
                            <div class="ml-12 mb-12 supporting-doc" ng-repeat="(key, supporting_documentData) in supporting_document">
                                <div class="kt-avatar kt-avatar--outline pointer-div" id="kt_user_avatar_2" title="Click to download">
                                    <!--<div class="kt-avatar__holder kt-avatar__holder-large imagePreview" ng-style="'background-image: url(<?php echo base_url(); ?>attachments / supporting_documents/{{supporting_documentData.scholarship_details_id}}/{{supporting_documentData.document}})'"></div>-->
                                    <div class="kt-avatar__holder kt-avatar__holder-large imagePreview supporting_doc" ng-if="((supporting_documentData.document).substring(supporting_documentData.document.lastIndexOf('.') + 1)) == 'doc' || ((supporting_documentData.document).substring(supporting_documentData.document.lastIndexOf('.') + 1)) == 'docx' || ((supporting_documentData.document).substring(supporting_documentData.document.lastIndexOf('.') + 1)) == 'rtf' || ((supporting_documentData.document).substring(supporting_documentData.document.lastIndexOf('.') + 1)) == 'txt'" style="background-image: url(<?php echo $theme_path; ?>/assets/doc_icons/doc.png)" data-link="<?php echo base_url(); ?>attachments/supporting_documents/{{supporting_documentData.scholarship_details_id}}/{{supporting_documentData.document}}"></div>

                                    <div class="kt-avatar__holder kt-avatar__holder-large imagePreview supporting_doc" ng-if="((supporting_documentData.document).substring(supporting_documentData.document.lastIndexOf('.') + 1)) == 'xls' || ((supporting_documentData.document).substring(supporting_documentData.document.lastIndexOf('.') + 1)) == 'xlsx'" style="background-image: url(<?php echo $theme_path; ?>/assets/doc_icons/xls.png)" data-link="<?php echo base_url(); ?>attachments/supporting_documents/{{supporting_documentData.scholarship_details_id}}/{{supporting_documentData.document}}"></div>

                                    <div class="kt-avatar__holder kt-avatar__holder-large imagePreview supporting_doc" ng-if="((supporting_documentData.document).substring(supporting_documentData.document.lastIndexOf('.') + 1)) == 'csv'" style="background-image: url(<?php echo $theme_path; ?>/assets/doc_icons/csv.png)" data-link="<?php echo base_url(); ?>attachments/supporting_documents/{{supporting_documentData.scholarship_details_id}}/{{supporting_documentData.document}}"></div>
                                    <div class="kt-avatar__holder kt-avatar__holder-large imagePreview supporting_doc" ng-if="((supporting_documentData.document).substring(supporting_documentData.document.lastIndexOf('.') + 1)) == 'pdf'" style="background-image: url(<?php echo $theme_path; ?>/assets/doc_icons/pdf.png)" data-link="<?php echo base_url(); ?>attachments/supporting_documents/{{supporting_documentData.scholarship_details_id}}/{{supporting_documentData.document}}"></div>
                                    <div class="kt-avatar__holder kt-avatar__holder-large imagePreview supporting_doc" ng-if="((supporting_documentData.document).substring(supporting_documentData.document.lastIndexOf('.') + 1)) == 'ppt' || ((supporting_documentData.document).substring(supporting_documentData.document.lastIndexOf('.') + 1)) == 'pptx'" style="background-image: url(<?php echo $theme_path; ?>/assets/doc_icons/ppt.png)" data-link="<?php echo base_url(); ?>attachments/supporting_documents/{{supporting_documentData.scholarship_details_id}}/{{supporting_documentData.document}}"></div>

                                    <div class="kt-avatar__holder kt-avatar__holder-large imagePreview supporting_doc" ng-if="((supporting_documentData.document).substring(supporting_documentData.document.lastIndexOf('.') + 1)) !== 'ppt' && ((supporting_documentData.document).substring(supporting_documentData.document.lastIndexOf('.') + 1)) !== 'pptx' && ((supporting_documentData.document).substring(supporting_documentData.document.lastIndexOf('.') + 1)) !== 'doc' && ((supporting_documentData.document).substring(supporting_documentData.document.lastIndexOf('.') + 1)) !== 'docx' && ((supporting_documentData.document).substring(supporting_documentData.document.lastIndexOf('.') + 1)) !== 'rtf' && ((supporting_documentData.document).substring(supporting_documentData.document.lastIndexOf('.') + 1)) !== 'txt' && ((supporting_documentData.document).substring(supporting_documentData.document.lastIndexOf('.') + 1)) !== 'xls' && ((supporting_documentData.document).substring(supporting_documentData.document.lastIndexOf('.') + 1)) !== 'xlsx' && ((supporting_documentData.document).substring(supporting_documentData.document.lastIndexOf('.') + 1)) !== 'csv' && ((supporting_documentData.document).substring(supporting_documentData.document.lastIndexOf('.') + 1)) !== 'pdf' && ((supporting_documentData.document).substring(supporting_documentData.document.lastIndexOf('.') + 1)) !== 'ppt' && ((supporting_documentData.document).substring(supporting_documentData.document.lastIndexOf('.') + 1)) !== 'pptx'" style="background-image: url(<?php echo base_url(); ?>attachments/supporting_documents/{{supporting_documentData.scholarship_details_id}}/{{supporting_documentData.document}})" data-link="<?php echo base_url(); ?>attachments/supporting_documents/{{supporting_documentData.scholarship_details_id}}/{{supporting_documentData.document}}"></div>


                                    <!--<div class="kt-avatar__holder kt-avatar__holder-large imagePreview" style="background-image: url(<?php echo base_url(); ?>attachments/supporting_documents/{{supporting_documentData.scholarship_details_id}}/{{supporting_documentData.document}})"></div>-->
                                    <label class="kt-avatar__upload delete_supporting_doc" data-toggle="kt-tooltip" title="Delete document" data-id="{{supporting_documentData.id}}" data-original-title="Remove document" ng-click="deleteSupportingDoc($event)" >
                                        <i class="fa fa-times"></i>
                                    </label>
                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                        <i class="fa fa-times"></i>
                                    </span>
                                    <input type="hidden" class="supporting_documentid"  ng-value="{{supporting_documentData.id}}"  name="supporting_documentid[]">
                                    <input type="text" class="supporting_documentName form-control"   Placeholder = "Document Name" value="{{supporting_documentData.document_name}}"  name="supporting_documentName[]">
                                </div>

                            </div>


                        </div>

                    </div>

                    <div class="form-group row ">

                        <div class="col-md-12 pt-12">

                            <div class="text-center">
                                <button type="button" id="submit_edit_scholarship_form" class="btn btn-brand" disabled>Save</button>
                                <button type="button" class="btn btn-secondary" ng-click="goBack()">Back</button>
                            </div><br/>
                        </div>


                    </div>

                </form>


            </div>
            <!--end:: Widgets/Trends-->
        </div>

    </div>




    <script type="text/javascript">


                var edit_scholarship_app = angular.module('edit_scholarship_app', []);
                edit_scholarship_app.controller('edit_scholarship_controller', ['$scope', '$http', '$compile', '$location', '$window', '$timeout', function ($scope, $http, $compile, $location, $window, $timeout) {


                $scope.pageLoad = function () {

                $scope.totalEntry = 0;
                        // $timeout(function () {
                        var url = $location.absUrl();
                        var scholarship_id = url.substring(url.lastIndexOf('/') + 1);
                        if (scholarship_id) {

                $http.get(base_url + 'scholarship/getScholarshipData?id=' + scholarship_id)
                        .success(function (response) {
                        //console.log(response);
                        profile_img = base_url + "attachments/scholar_profile_pictures/default.png";
                                if (response['scholarship_details'][0]['profile_picture'] != "null" && response['scholarship_details'][0]['profile_picture'] != "") {
                        profile_img = base_url + "attachments/scholar_profile_pictures/" + response['scholarship_details'][0]['id'] + "/" + response['scholarship_details'][0]['profile_picture'];
                        }

                        scanned_application = base_url + "attachments/scanned_copy_of_application/default.png";
                                if (response['scholarship_details'][0]['scanned_copy_of_application'] != "null" && response['scholarship_details'][0]['scanned_copy_of_application'] != "") {
                        scanned_application = base_url + "attachments/scanned_copy_of_application/" + response['scholarship_details'][0]['id'] + "/" + response['scholarship_details'][0]['scanned_copy_of_application'];
                        }

                        var dobVal = "";
                                if (response['scholarship_details'][0]['dob']) {
                        var dobGet = response['scholarship_details'][0]['dob'];
                                var dobSplit = dobGet.split("-");
                                dobVal = dobSplit[1] + "/" + dobSplit[2] + "/" + dobSplit[0];
                        }
                        var application_date = "";
                                if (response['scholarship_details'][0]['application_date'] != '0000-00-00' && response['scholarship_details'][0]['application_date'] != '') {
                        var applicationDateGet = response['scholarship_details'][0]['application_date'];
                                var applicationDateSplit = applicationDateGet.split("-");
                                application_date = applicationDateSplit[1] + "/" + applicationDateSplit[2] + "/" + applicationDateSplit[0];
                        }

                        var approved_year = "";
                                if (response['scholarship_details'][0]['approved_year'] != '0000-00-00' && response['scholarship_details'][0]['approved_year'] != '') {
                        var approved_yearGet = response['scholarship_details'][0]['approved_year'];
                                var approved_yearSplit = approved_yearGet.split("-");
                                approved_year = approved_yearSplit[1] + "/" + approved_yearSplit[2] + "/" + approved_yearSplit[0];
                        }
                        var course_completed_year = "";
                                if (response['scholarship_details'][0]['course_completed_year'] != '0000-00-00' && response['scholarship_details'][0]['course_completed_year'] != '') {
                        var course_completed_yearGet = response['scholarship_details'][0]['course_completed_year'];
                                var course_completed_yearSplit = course_completed_yearGet.split("-");
                                course_completed_year = course_completed_yearSplit[1] + "/" + course_completed_yearSplit[2] + "/" + course_completed_yearSplit[0];
                        }

                        var repayment_start_year = "";
                                if (response['scholarship_details'][0]['repayment_start_year'] != '0000-00-00' && response['scholarship_details'][0]['repayment_start_year'] != '' && response['scholarship_details'][0]['repayment_start_year'] != null) {
                        var repayment_start_yearGet = response['scholarship_details'][0]['repayment_start_year'];
                                var repayment_start_yearSplit = repayment_start_yearGet.split("-");
                                repayment_start_year = repayment_start_yearSplit[1] + "/" + repayment_start_yearSplit[2] + "/" + repayment_start_yearSplit[0];
                        }

                        var repayment_completed_year = "";
                                if (response['scholarship_details'][0]['repayment_completed_year'] != '0000-00-00' && response['scholarship_details'][0]['repayment_completed_year'] != '' && response['scholarship_details'][0]['repayment_completed_year'] != 'null') {
                        var repayment_completed_yearGet = response['scholarship_details'][0]['repayment_completed_year'];
                                var repayment_completed_yearSplit = repayment_completed_yearGet.split("-");
                                repayment_completed_year = repayment_completed_yearSplit[1] + "/" + repayment_completed_yearSplit[2] + "/" + repayment_completed_yearSplit[0];
                        }
                        $scope.customField = response['dynamic_entry_scholarship'];
                                $scope.scanned_scholarship_id = response['scholarship_details'][0]['id'];
                                $scope.scanned_application_name = response['scholarship_details'][0]['scanned_copy_of_application'];
                                $scope.scannedApplication = scanned_application;
                                $scope.scannedApplicationData = response['scholarship_details'][0]['scanned_copy_of_application'];
                                $scope.scannedApplicationName = response['scholarship_details'][0]['scanned_copy_of_application_name'];
                                $scope.profileImgData = response['scholarship_details'][0]['profile_picture'];
                                $scope.applicationDate = application_date;
                                //$scope.password = response[0]['password'];
                                $scope.profilePicture = profile_img;
                                $scope.approvedAmount = response['scholarship_details'][0]['approved_amount'];
                                $scope.dobValue = dobVal;
                                $scope.approvedYear = approved_year;
                                //$scope.applicationTypeValue = response['scholarship_details'][0]['application_type_id'];
                                $scope.yearsSponsored = response['scholarship_details'][0]['years_sponsored'];
                                $scope.studentName = response['scholarship_details'][0]['student_name'];
                                $scope.genderID = response['scholarship_details'][0]['gender_id'];
                                $scope.emailId = response['scholarship_details'][0]['email'];
                                $scope.mobileNo = response['scholarship_details'][0]['mobile_no'];
                                $scope.landlineNo = response['scholarship_details'][0]['landline_no'];
                                $scope.doorNo = response['scholarship_details'][0]['doorno'];
                                //$scope.streetName = response['scholarship_details'][0]['street'];
                                $scope.streetHidden = response['scholarship_details'][0]['street'];
                                $scope.addressVal = response['scholarship_details'][0]['address'];
                                $scope.collegeName = response['scholarship_details'][0]['college_name'];
                                $scope.collegeAddress = response['scholarship_details'][0]['college_address'];
                                $scope.courseName = response['scholarship_details'][0]['course_name'];
                                $scope.courseTypeVal = response['scholarship_details'][0]['course_type_id'];
                                $scope.courseCompletedYear = course_completed_year;
                                $scope.hasRepayment = response['scholarship_details'][0]['has_repayments'];
                                $scope.paymentOnHold = response['scholarship_details'][0]['payment_on_hold'];
                                $scope.repaymentStartYear = repayment_start_year;
                                $scope.repaymentCompletedYear = repayment_completed_year;
                                $scope.zakaathAmount = response['scholarship_details'][0]['zakaath_amount'];
                                $scope.zakaathAmountPrevious = response['scholarship_details'][0]['zakaath_amount'];
                                //$scope.statusVal = response['scholarship_details'][0]['status'];
                                //var supporting_document = [];
                                //console.log(response['supporting_document']);
                                $scope.supporting_document = response['supporting_document'];
                                //console.log(response['supporting_document']);
                                $scope.remarks = response['remarks'];
                                console.log(response['remarks']);
                                $scope.applicationTypeHidden = response['scholarship_details'][0]['application_type_id'];
                                $scope.genderHidden = response['scholarship_details'][0]['gender_id'];
                                $scope.courseTypeHidden = response['scholarship_details'][0]['course_type_id'];
                                $timeout(function () {

                                KTFormWidgets.init();
                                }, 2000);
                                $scope.loadApplicationType();
                                $scope.loadGender();
                                $scope.loadCourseType();
                                $scope.loadStreet();
                                $('#submit_edit_scholarship_form').attr("disabled", false);
                        })
                }
                //}, 500);
                }

                $scope.loadStreet = function () {
                $http.get(base_url + 'scholarship/get_street_list')
                        .success(function (data) {
                        $scope.streets = data.street;
                        })
                }

                $scope.loadApplicationType = function () {
                $http.get(base_url + 'scholarship/get_application_type')
                        .success(function (data) {
                        //console.log(data);
                        $scope.applicationType = data.application_type;
                        })
                }

                $scope.loadGender = function () {
                $http.get(base_url + 'scholarship/get_gender')
                        .success(function (data) {

                        $scope.genderValues = data.gender;
                        })
                }
                $scope.loadCourseType = function () {
                $http.get(base_url + 'scholarship/get_course_type')
                        .success(function (data) {

                        $scope.courseType = data.course_type;
                        })
                }

//                $scope.checkValidAmt = function () {
//                var amount = $scope.zakaathAmount;
//                        //alert(amount);
//                        var url = $location.absUrl();
//                        var scholarship_id = url.substring(url.lastIndexOf('/') + 1);
//                        if (amount != 0 && amount != "") {
//                //alert("if");
//                $http.get(base_url + 'scholarship/checkZakaathAmtOnUpdate?amount=' + amount + "&scholarship_id=" + scholarship_id)
//                        .success(function (data) {
//                        //console.log(data);
//                        //var obj = data.zakaathamount_details;
//                        //console.log(obj);
//                        var zakaathamount = data.zakaathamount_details[0]['amount'];
//                                //console.log(zakaathamount);
//
//                                if (parseFloat(zakaathamount) < parseFloat(amount)) {
//                        //alert("if");
//                        $scope.zakaathAmount = 0;
//                                $scope.amtValid = "Amount exceeds!. Available amount is " + zakaathamount;
//                                $timeout(function () {
//                                $scope.amtValid = "";
//                                }, 5000);
//                        }
//
//                        })
//                }
//                }

                $scope.checkValidAmt = function () {
                var amount = $scope.zakaathAmount;
                        var previousAmount = $scope.zakaathAmountPrevious;
                        //var differenceAmount =
                        //alert(amount);
                        if (amount != 0 && amount != "") {
                //alert("if");

                if (parseFloat(amount) > parseFloat(previousAmount)) {
                diff_amt = parseFloat(amount) - parseFloat(previousAmount);
                        $http.get(base_url + 'scholarship/checkZakaathAmt?amount=' + diff_amt)
                        .success(function (data) {
                        //console.log(data);
                        //var obj = data.zakaathamount_details;
                        //console.log(obj);
                        var zakaathamount = data.zakaathamount_details[0]['amount'];
                                //console.log(zakaathamount);

                                if (parseFloat(zakaathamount) < parseFloat(diff_amt)) {
                        //alert("if");
                        $scope.zakaathAmount = previousAmount;
                                $scope.amtValid = "Amount exceeds!. Available amount is " + zakaathamount;
                                $timeout(function () {
                                $scope.amtValid = "";
                                }, 5000);
                        }

                        })
                }
                }
                }

                $scope.goBack = function () {

                $window.location.href = base_url + "scholarship";
                }

                $scope.deleteSupportingDoc = function (event) {

                var this_obj = angular.element(event.target);
                        var id = angular.element(event.currentTarget).attr("data-id");
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
                $http.get(base_url + 'scholarship/deleteSupportingDoc?id=' + id)
                        .success(function (response) {
                        console.log(response);
                                if (response == "1") {
                        this_obj.parent().parent().remove();
                        }
                        });
                }
                });
                }

                $scope.addNewField = function () {
                $scope.totalEntry = parseInt($scope.totalEntry) + 1;
                        var count = $scope.totalEntry;
                        var divElement = angular.element(document.querySelector('#customEntryDiv'));
                        var content = '<div class="form-group row"><div class="col-md-2"><label>Label name<span class="req">*</span></label><input type="text" class="form-control custom_label' + count + '" id="custom_label" name="custom_label" placeholder="Enter Label Name" ><span class="form-text text-muted custom_label' + count + '-error error-span"></span></div><div class="col-md-2"><label>Value<span class="req">*</span></label> <input type="text" class="form-control custom_value' + count + '" aria-describedby="emailHelp" name="custom_value" id="custom_value" placeholder="Enter Value" ><span class="form-text text-muted custom_value' + count + '-error error-span"></span></div><div class="col-md-3 text-center"><label>Action</label><div class="kt-subheader__toolbar"><a class="btn btn-label-brand btn-bold m-l-15 save_custom_entry" data-id="" data-count="' + count + '" id="save_custom_entry"><i class="flaticon2-check-mark"></i></a><a class="btn btn-label-danger btn-bold delete_custom_entry" id="delete_custom_entry"><i class="flaticon2-trash"></i></a></div></div> </div>';
                        var appendHtml = $compile('<custom-Entry>' + content + '</custom-entry>')($scope);
                        divElement.append(appendHtml);
                }



                //KTFormWidgets.init();
                //KTFormControls.init();
                }]);
                edit_scholarship_app.filter('convertDate', function () {
                return function (dateString) {
                // alert(dateString);
                if (dateString != '0000-00-00' && dateString != null) {
                var dateObject = new Date(dateString);
                        var date_val = dateObject.getDate() + '/' + (parseInt(dateObject.getMonth()) + 1) + '/' + dateObject.getFullYear();
                        return date_val;
                } else {
                return null;
                }
                };
                });
                var edit_scholarship_div = document.getElementById('edit_scholarship_div');
                //alert(dvSecond);
                angular.element(document).ready(function () {
        angular.bootstrap(edit_scholarship_div, ['edit_scholarship_app']);
        });
                var KTFormControls = function () {
                // Private functions

                var scholarshpFormSubmit = function () {
                $("#add_scholarship_form").validate({
                // define validation rules
                rules: {
                application_date: {
                required: true,
                },
                        application_type_id: {
                        required: true,
                        },
                        student_name: {
                        required: true,
                        },
                        profile_picture: {
                        required: true,
                        },
                        dob: {
                        required: true,
                        },
                        door_no: {
                        required: true,
                        },
                        street: {
                        required: true,
                        },
                        address: {
                        required: true,
                        },
                        gender_id: {
                        required: true,
                        },
                        mobile_no: {
                        required: true,
                                minlength: 10,
                                maxlength: 15,
                                number: true,
                        },
                        email: {
                        required: true,
                                email: true,
                        },
                        course_type_id: {
                        required: true,
                        },
                        college_name: {
                        required: true,
                        },
                        course_name: {
                        required: true,
                        },
                        college_address: {
                        required: true,
                        },
                        approved_amount: {
                        required: true,
                        },
                        years_sponsored: {
                        required: true,
                        },
                        approved_year: {
                        required: true,
                        },
                        scanned_copy_of_application: {
                        required: true,
                        },
                        supporting_documents: {
                        required: true,
                        },
                },
                        //display error alert on form submit

                        submitHandler: function (form) {
                        //form[0].submit(); // submit the form
                        alert("submit");
                        }
                });
                }


                return {
                // public functions
                init: function () {
                //scholarshpFormSubmit();
                }
                };
                }();
                $('#submit_edit_scholarship_form').click(function (e) {
        e.preventDefault();
                var btn = $(this);
                var form = $(this).closest('form');
                form.validate({
                rules: {
                application_date: {
                required: true,
                },
                        application_type_id: {
                        required: true,
                        },
                        student_name: {
                        required: true,
                        },
                        //                profile_picture: {
                        //                    required: true,
                        //                },
                        dob: {
                        required: true,
                        },
                        door_no: {
                        required: true,
                        },
                        street: {
                        required: true,
                        },
                        address: {
                        required: true,
                        },
                        gender_id: {
                        required: true,
                        },
                        mobile_no: {
                        required: true,
                                minlength: 10,
                                maxlength: 15,
                                number: true,
                        },
                        email: {
                        required: true,
                                email: true,
                        },
                        course_type_id: {
                        required: true,
                        },
                        college_name: {
                        required: true,
                        },
                        course_name: {
                        required: true,
                        },
                        college_address: {
                        required: true,
                        },
                        approved_amount: {
                        required: true,
                                number: true,
                        },
                        years_sponsored: {
                        required: true,
                        },
                        approved_year: {
                        required: true,
                        },
                        //                scanned_copy_of_application: {
                        //                    required: true,
                        //                },
                        //                supporting_documents: {
                        //                    required: true,
                        //                },
                }
                });
                if (!form.valid()) {
        $(".error-span").html("");
                var validator = form.validate();
                //console.log(validator.errorList);
                for (x in validator.errorList) {
        var el_id = validator.errorList[x]['element'].id;
                $("#" + el_id).addClass("is-invalid");
                var error_span = (validator.errorList[x]['element'].name) + "-error";
                $("." + error_span).html(validator.errorList[x]['message']);
        }

        return;
        }




        var profile_picture = $("#profile_picture")[0].files;
                if ($("#profile_image_data").val() == "" && profile_picture.length <= 0) {
        $("#profile_picture").focus();
                $(".profile_picture-error").html("This field is required");
                return;
        }

        var scanned_copy_of_application = $("#scanned_copy_of_application")[0].files;
                if ($("#scanned_copy_of_application_data").val() == "" && scanned_copy_of_application.length <= 0) {
        $("#scanned_copy_of_application").focus();
                $(".scanned_copy_of_application-error").html("This field is required");
                return;
        }


        $(".error-span").html("");
                btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
                var application_date_picker = $("#application_date").val();
                var approved_amount = $("#approved_amount").val();
                var approved_year_picker = $("#approved_year").val();
                var application_type_id = $("#application_type_id").val();
                var years_sponsored = $("#years_sponsored").val();
                var scanned_copy_of_application = $("#scanned_copy_of_application")[0].files;
                var scanned_copy_of_application_name = $("#scanned_copy_of_application_name").val();
                var student_name = $("#student_name").val();
                var gender_id = $("#gender_id").val();
                var profile_picture = $("#profile_picture")[0].files;
                var dob_datepicker = $("#dob_datepicker").val();
                var mobile_no = $("#mobile_no").val();
                var email = $("#email").val();
                var landline_no = $("#landline_no").val();
                var door_no = $("#door_no").val();
                var street = $("#street").val();
                var address = $("#address").val();
                var college_name = $("#college_name").val();
                var college_address = $("#college_address").val();
                var course_name = $("#course_name").val();
                var course_type_id = $("#course_type_id").val();
                var course_completed_year_picker = $("#course_completed_year").val();
                var has_repayments = $("input[name='has_repayments']:checked").val();
                var payment_on_hold = $("input[name='payment_on_hold']:checked").val();
                var repayment_completed_year_picker = $("#repayment_completed_year").val();
                var zakaath_amount = $("#zakaath_amount").val();
                //var status = $("#status").val();
                var remark = $("#remark").val();
                var supporting_documents = $("#supporting_documents")[0].files;
                var dob_split = dob_datepicker.split("/");
                var dob = dob_split[2] + "-" + dob_split[0] + "-" + dob_split[1];
                var application_date_split = application_date_picker.split("/");
                var application_date = application_date_split[2] + "-" + application_date_split[0] + "-" + application_date_split[1];
                var approved_year_split = approved_year_picker.split("/");
                var approved_year = approved_year_split[2] + "-" + approved_year_split[0] + "-" + approved_year_split[1];
                var course_completed_year_split = course_completed_year_picker.split("/");
                var course_completed_year = course_completed_year_split[2] + "-" + course_completed_year_split[0] + "-" + course_completed_year_split[1];
                var repayment_completed_year_split = repayment_completed_year_picker.split("/");
                var repayment_completed_year = repayment_completed_year_split[2] + "-" + repayment_completed_year_split[0] + "-" + repayment_completed_year_split[1];
                if (typeof (has_repayments) == 'undefined') {
        has_repayments = "0";
        }

        var url = window.location.href;
                var scholarship_id = url.substring(url.lastIndexOf('/') + 1);
                var formData = new FormData();
                var formData = new FormData();
                formData.append("scholarship_id", scholarship_id);
                formData.append("application_date", application_date);
                formData.append("approved_amount", approved_amount);
                formData.append("approved_year", approved_year);
                formData.append("application_type_id", application_type_id);
                formData.append("years_sponsored", years_sponsored);
                formData.append("student_name", student_name);
                formData.append("gender_id", gender_id);
                formData.append("dob", dob);
                formData.append("mobile_no", mobile_no);
                formData.append("email", email);
                formData.append("landline_no", landline_no);
                formData.append("door_no", door_no);
                formData.append("street", street);
                formData.append("address", address);
                formData.append("college_name", college_name);
                formData.append("college_address", college_address);
                formData.append("course_name", course_name);
                formData.append("course_type_id", course_type_id);
                formData.append("course_completed_year", course_completed_year);
                formData.append("has_repayments", has_repayments);
                formData.append("payment_on_hold", payment_on_hold);
                formData.append("repayment_completed_year", repayment_completed_year);
                formData.append("zakaath_amount", zakaath_amount);
                //formData.append("status", status);
                formData.append("scanned_copy_of_application", scanned_copy_of_application[0]);
                formData.append("scanned_copy_of_application_name", scanned_copy_of_application_name);
                formData.append("profile_picture", profile_picture[0]);
                formData.append("remark", remark);
                for (var i = 0; i < $("#supporting_documents").get(0).files.length; ++i) {
                    formData.append('supporting_documents[]', $("#supporting_documents").get(0).files[i]);
                }
                var supporting_documentName=[];
                var supporting_documentid=[];
                $('.supporting_documentName').each(function(){
                    supporting_documentName.push($(this).val());
                    supporting_documentid.push($(this).closest('div').find('.supporting_documentid').val());
                });
                formData.append("supporting_documentName",supporting_documentName);
                formData.append("supporting_documentid",supporting_documentid);
        $.ajax({
        method: "POST",
                url: base_url + "scholarship/edit_scholarship",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                error: function (data) {
                console.log(data);
                },
                success: function (data) {
                console.log(data);
                        var obj = JSON.parse(data);
                        //console.log(obj);
                        $(".error-span").html("");
                        if (obj.status == "success") {

                swal.fire({
                "title": "Success",
                        "text": "Scholarship has been successfully updated!",
                        "type": "success",
                        "confirmButtonClass": "btn btn-secondary"
                }).then(function () {
                window.location = base_url + 'scholarship';
                });
                        //                    if (obj.profile_image_status == "profile_image_update_failed") {
                        //                        btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                        //                        $("#profile_picture").focus();
                        //                        $(".profile_picture-error").html("Scanned copy of Application not updated");
                        //                    } else if (obj.profile_image_status == "none") {
                        //                        btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                        //                        $("#scanned_copy_of_application").focus();
                        //                        $(".scanned_copy_of_application-error").html("Failed to upload Scanned copy of Application");
                        //                    }
                        //                    if (obj.scanned_image_status == "scanned_image_update_failed") {
                        //                        btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                        //                        $("#scanned_copy_of_application").focus();
                        //                        $(".scanned_copy_of_application-error").html("Scanned copy of Application not updated");
                        //                    } else if (obj.scanned_image_status == "none") {
                        //                        btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                        //                        $("#scanned_copy_of_application").focus();
                        //                        $(".scanned_copy_of_application-error").html("Failed to upload Scanned copy of Application");
                        //                    } else {
                        //
                        //
                        //                    }


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
                $(document).on('click', '#dob_datepicker', function () {
        var val = $('#dob_datepicker').val();
                if (val == "") {
        $('#dob_datepicker').datepicker('setDate', new Date(1990, 00, 01));
        }
        });
                var KTFormWidgets = function () {
                // Private functions
                var initWidgets = function () {
                $('#application_date').datepicker({
                todayHighlight: true,
                        templates: {
                        leftArrow: '<i class="la la-angle-left"></i>',
                                rightArrow: '<i class="la la-angle-right"></i>'
                        }
                });
                        $('#approved_year').datepicker({
                todayHighlight: true,
                        templates: {
                        leftArrow: '<i class="la la-angle-left"></i>',
                                rightArrow: '<i class="la la-angle-right"></i>'
                        }
                });
                        $('#dob_datepicker').datepicker({
                todayHighlight: true,
                        templates: {
                        leftArrow: '<i class="la la-angle-left"></i>',
                                rightArrow: '<i class="la la-angle-right"></i>'
                        }
                });
                        $('#course_completed_year').datepicker({
                todayHighlight: true,
                        templates: {
                        leftArrow: '<i class="la la-angle-left"></i>',
                                rightArrow: '<i class="la la-angle-right"></i>'
                        }
                });
                        $('#repayment_completed_year').datepicker({
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
                $('#scanned_copy_of_application').on('change', function () {
                    $(".scanned_copy-info").html("");
        var files = this.files;
                var div = "scanned_application_preview";
                if (files && files[0]) {
        //readImage(files[0], '#scanned_copy_of_application', div);

        file = files[0];
                element = '#scanned_copy_of_application';
                //alert(files[0].size);
                error = 1;
                file_name = file.name;
                var exts = ['jpg', 'jpeg', 'png', 'svg', 'pdf', 'txt', 'xls', 'xlsx'];
                var get_ext = file_name.split('.');
                get_ext = get_ext.reverse();
                console.log(get_ext);
                if ($.inArray(get_ext[0].toLowerCase(), exts) == - 1) {
        $(element).val('');
                $(".scanned_copy_of_application-error").append('Image format not allowed');
                //console.log($("#" + div).parent().parent().parent().find(".error-span"));
                setTimeout(function () {
                //$("#" + div).parent().parent().parent().find(".error-span").html('');
                $(".scanned_copy_of_application-error").html('');
                }, 3000);
                default_src = $('#' + div).attr('default_src');
                $('#' + div).attr('src', default_src);
                error = 0;
        } else if (files[0].size > 5000000) {
        $(".scanned_copy_of_application-error").append('Maximum size 5MB');
                //console.log($("#" + div).parent().parent().parent().find(".error-span"));
                setTimeout(function () {
                //$("#" + div).parent().parent().parent().find(".error-span").html('');
                $(".scanned_copy_of_application-error").html('');
                }, 3000);
        } else {
                var reader = new FileReader();
                var image = new Image();
                reader.readAsDataURL(file);
                reader.onload = function (_file) {
                image.src = _file.target.result;
                        image.onload = function () {
                            $('.imagePreview').attr('src', _file.target.result);
                            $('#' + div).attr('style', "background-image: url(" + _file.target.result + ")");
                            $(element).closest('div.form-group').find('.error_msg').text('').slideUp('500');   
                        }
                }
        }

        }
        if (error.length > 0) {
            $(".scanned_copy_of_application-error").html(error);
        } else {

            $(".scanned_copy-info").html( "1 Scanned Copy selected");
        }
        });
                $('#profile_picture').on('change', function () {

        var files = this.files;
                var div = "profile_picture_preview";
                if (files && files[0]) {
        readImage(files[0], '#profile_picture', div);
        }
        });
                function readImage(file, element, div) {
                error = 1;
                        file_name = file.name;
                        var exts = ['jpg', 'jpeg', 'png', 'svg'];
                        var get_ext = file_name.split('.');
                        get_ext = get_ext.reverse();
                        if ($.inArray(get_ext[0].toLowerCase(), exts) == - 1) {
                $(element).val('');
                        $("#" + div).parent().parent().parent().find(".error-span").append('Image format not allowed');
                        //console.log($("#" + div).parent().parent().parent().find(".error-span"));
                        setTimeout(function () {
                        $("#" + div).parent().parent().parent().find(".error-span").html('');
                        }, 3000);
                        default_src = $('#' + div).attr('default_src');
                        $('#' + div).attr('src', default_src);
                        error = 0;
                } else if (file.size > 5000000) {
                $("#" + div).parent().parent().parent().find(".error-span").append('Maximum size 5MB');
                        //console.log($("#" + div).parent().parent().parent().find(".error-span"));
                        setTimeout(function () {
                        //$("#" + div).parent().parent().parent().find(".error-span").html('');
                        $("#" + div).parent().parent().parent().find(".error-span").html('');
                        }, 3000);
                } else {
                var reader = new FileReader();
                        var image = new Image();
                        reader.readAsDataURL(file);
                        reader.onload = function (_file) {
                        image.src = _file.target.result;
                                image.onload = function () {
                                width = this.width;
                                        height = this.height;
                                        if (width < 150 || height < 150) {
                                $("#img_error").append('Image resolution should be higher than 150x150');
                                        $(element).val('');
                                        default_src = $('#' + div).attr('default_src');
                                        $('#' + div).attr('src', default_src);
                                        error = 0;
                                } else {
                                //$('.imagePreview').attr('src', _file.target.result);
                                $('#' + div).attr('style', "background-image: url(" + _file.target.result + ")");
                                        $(element).closest('div.form-group').find('.error_msg').text('').slideUp('500');
                                }
                                }
                        }
                }
                return error;
                }


        $(document).on('change', '#supporting_documents', function () {
        $(".supporting_documents-error").html("");
                $(".supporting_documents-info").html("");
                var form = new FormData();
                var error = [];
                var validExtensions = ['jpg', 'gif', 'png', 'svg', 'doc', 'docx', 'rtf', 'xls', 'xlsx', 'csv', 'pdf', 'ppt', 'pptx', 'txt']; //array of valid extensions
                var doc_count = 0;
                for (var i = 0; i < $('#supporting_documents').get(0).files.length; ++i) {
        form.append('userfiles[]', $('#supporting_documents').get(0).files[i]);
                // console.log($('#supporting_documents').get(0).files[i]);
                var fileName = $('#supporting_documents').get(0).files[i].name;
                var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                if ($.inArray(fileNameExt, validExtensions) == - 1) {

        //($('#supporting_documents').get(0).files).splice(i, 1);
        //return false;
        error.push($('#supporting_documents').get(0).files[i].name + " - Invalid file type<br>");
        } else {
        if ($('#supporting_documents').get(0).files[i].size > 5000000) {
        error.push($('#supporting_documents').get(0).files[i].name + " - File size exceeds 5MB");
        } else {
        doc_count++;
        }
        }
        }
        console.log($('#supporting_documents').get(0).files);
                //console.log(error);
                if (error.length > 0) {

        $(".supporting_documents-error").html(error);
                $('#supporting_documents').val("");
                //console.log($('#supporting_documents').get(0).files);
                $(".supporting_documents-info").html("0 Document selected");
                setTimeout(function () {
                    $(".supporting_documents-error").html("");
                }, 5000);
        } else {

        $(".supporting_documents-info").html(doc_count + " Document(s) selected");
        }
        });
                $(document).on('click', '.supporting_doc', function () {

        file_path = $(this).attr("data-link");
                var link = document.createElement('a');
                link.download = name;
                link.href = file_path;
                link.click();
                link.remove();
        });
                $(document).on('click', '.scanned_application', function () {

        file_path = $(this).attr("data-link");
                var link = document.createElement('a');
                link.download = name;
                link.href = file_path;
                link.click();
                link.remove();
        });
                $(document).on('keypress', '.validate_amount', function (event) {
        //console.log(event.which);
        //console.log(isNaN(String.fromCharCode(event.which)));
        if (event.which != 8 && isNaN(String.fromCharCode(event.which))) {
        event.preventDefault();
        }
        });
                $(document).on('click', '.save_custom_entry', function () {
        var this_obj = $(this);
                var count = $(this).attr('data-count');
                //alert(count);
                var custom_label = $('.custom_label' + count).val();
                var custom_value = $('.custom_value' + count).val();
                var url = window.location.href;
                var scholarship_id = url.substring(url.lastIndexOf('/') + 1);
                var input_validate_error = 0;
                if (custom_label == "") {
        $(".custom_label" + count + "-error").html("This field is required");
                $(".custom_label" + count).addClass("is-invalid");
                input_validate_error = input_validate_error + 1;
                //return;
        } else {
        $(".custom_label" + count + "-error").html("");
                $(".custom_label" + count).removeClass("is-invalid");
        }
        if (custom_value == "") {
        $(".custom_value" + count + "-error").html("This field is required");
                $(".custom_value" + count).addClass("is-invalid");
                input_validate_error = input_validate_error + 1;
                //return;
        } else {
        $(".custom_value" + count + "-error").html("");
                $(".custom_value" + count).removeClass("is-invalid");
        }

        if (input_validate_error > 0) {
        return;
        }


        var dataString = "custom_label=" + custom_label + "&custom_value=" + custom_value + "&scholarship_id=" + scholarship_id;
                // console.log(dataString);
                $.ajax({
                method: "POST",
                        url: base_url + "scholarship/add_custom_entry",
                        data: dataString,
                        error: function (data) {
                        console.log(data);
                        },
                        success: function (data) {
                        //console.log(data);
                        var myObj = JSON.parse(data);
                                console.log(myObj);
                                //return;
                                if (myObj.status == "1") {
                        swal.fire({
                        "title": "Success",
                                "text": "Custom entry added successfully!",
                                "type": "success",
                                "confirmButtonClass": "btn btn-secondary"
                        });
                                var last_update_count = $('.update_custom_entry:last').attr("data-count");
                                // alert(last_update_count);
                                if (typeof (last_update_count) == "undefined"){
                        last_update_count = 0;
                        }
                        var update_count = parseInt(last_update_count) + 1;
                                var this_data_count = this_obj.attr("data-count");
                                this_obj.find('i').attr("class", "flaticon-edit");
                                this_obj.removeClass("save_custom_entry");
                                this_obj.addClass("update_custom_entry");
                                this_obj.attr("data-entry-id", myObj.custom_entry_id);
                                this_obj.attr("data-count", update_count);
                                this_obj.parent().parent().parent().find(".delete_custom_entry").attr("data-entry-id", myObj.custom_entry_id);
                                this_obj.parent().parent().parent().find(".delete_custom_entry").attr("data-count", update_count);
                                this_obj.parent().parent().parent().find(".delete_custom_entry").addClass("delete_custom_entry_update");
                                this_obj.parent().parent().parent().find(".delete_custom_entry").removeClass("delete_custom_entry");
                                this_obj.parent().parent().parent().find('.custom_label' + this_data_count).addClass('custom_label_update' + update_count);
                                this_obj.parent().parent().parent().find('.custom_label_update' + update_count).removeClass('custom_label' + this_data_count);
                                this_obj.parent().parent().parent().find('.custom_value' + this_data_count).addClass('custom_value_update' + update_count);
                                this_obj.parent().parent().parent().find('.custom_value_update' + update_count).removeClass('custom_value' + this_data_count);
                        }
                        }
                });
        });
                $(document).on('click', '.delete_custom_entry', function () {
        var this_obj = $(this);
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
        this_obj.parent().parent().parent().remove();
        }
        });
        });
                $(document).on('click', '.update_custom_entry', function () {
        var count = $(this).attr('data-count');
                var entry_id = $(this).attr('data-entry-id');
                //alert(count);
                var custom_label = $('.custom_label_update' + count).val();
                var custom_value = $('.custom_value_update' + count).val();
                var input_validate_error = 0;
                var url = window.location.href;
                var scholarship_id = url.substring(url.lastIndexOf('/') + 1);
                if (custom_label == "") {
        $(".custom_label" + count + "-error").html("This field is required");
                $(".custom_label" + count).addClass("is-invalid");
                input_validate_error = input_validate_error + 1;
                //return;
        } else {
        $(".custom_label" + count + "-error").html("");
                $(".custom_label" + count).removeClass("is-invalid");
        }

        if (custom_value == "") {
        $(".custom_value" + count + "-error").html("This field is required");
                $(".custom_value" + count).addClass("is-invalid");
                input_validate_error = input_validate_error + 1;
                //return;
        } else {
        $(".custom_value" + count + "-error").html("");
                $(".custom_value" + count).removeClass("is-invalid");
        }
        if (input_validate_error > 0) {
        return;
        }

        var dataString = "custom_label=" + custom_label + "&custom_value=" + custom_value + "&scholarship_id=" + scholarship_id + "&entry_id=" + entry_id;
                //console.log(dataString);
                $.ajax({
                method: "POST",
                        url: base_url + "scholarship/update_custom_entry",
                        data: dataString,
                        error: function (data) {
                        console.log(data);
                        },
                        success: function (data) {
                        //console.log(data);
                        var myObj = JSON.parse(data);
                                console.log(myObj);
                                //return;
                                if (myObj.status == "1") {

                        swal.fire({
                        "title": "Success",
                                "text": "Custom entry updated successfully!",
                                "type": "success",
                                "confirmButtonClass": "btn btn-secondary"
                        });
                        }
                        }
                });
        });
                $(document).on('click', '.delete_custom_entry_update', function () {
        var this_obj = $(this);
                var custom_entry_id = $(this).attr('data-entry-id');
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
        var dataString = "entry_id=" + custom_entry_id;
                //console.log(dataString);
                $.ajax({
                method: "POST",
                        url: base_url + "scholarship/delete_custom_entry_update",
                        data: dataString,
                        error: function (data) {
                        console.log(data);
                        },
                        success: function (data) {
                        //console.log(data);
                        if (data == "1") {
                        swal.fire(
                                'Deleted!',
                                'Commitment entry deleted.',
                                'success'
                                ).then(function () {
                        this_obj.parent().parent().parent().remove();
                        });
                        }
                        }
                });
        }
        });
        });
    </script>