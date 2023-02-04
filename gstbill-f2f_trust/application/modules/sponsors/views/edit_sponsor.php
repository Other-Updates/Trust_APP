<style>
    .commit-btn{float:right;}
    #commitmentEntryDiv{border: 1px solid #f3f3f3; padding: 10px;margin-top:5px; background: #f3f3f3;border-radius: 4px;}
</style>
    <div class="kt-grid__item kt-grid__item--fluid kt-app__content"  id="edit_sponsor_div" ng-app="edit_sponsor_app" ng-controller="edit_sponsor_controller" ng-init="pageLoad()" ng-cloak>
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">

                <h3 class="kt-subheader__title">
                    Edit Details of &nbsp;<span class="capitalize">{{sponsorName}}</span>
                </h3>

                <span class="kt-subheader__separator kt-subheader__separator--v"></span>


            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <!--begin:: Widgets/Trends-->
            <div class="kt-portlet kt-portlet--head--noborder kt-portlet--height-fluid">

                <form id="edit_sponsor_form" class="kt-form kt-form--label-right">
                    <div class="kt-portlet__body">
                        <div class="row">
                            <div class="col-xl-9 col-lg-9 col-md-9" style="float:left;">
                                <div class="form-group row ">

                                    <div class="col-md-4">
                                        <label>Sponsor Name<span class="req">*</span></label>
                                        <input type="text" class="form-control" aria-describedby="emailHelp" name="sponsor_name" id="sponsor_name" placeholder="Enter Sponsor Name" ng-model="sponsorName">
                                        <span class="form-text text-muted sponsor_name-error error-span"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Gender<span class="req">*</span></label>

                                        <select class="form-control" name="gender_id" id="gender_id" ng-model="genderID">
                                            <option value="">Select Gender</option>
                                            <option  ng-repeat="(key, genderData) in genderValues" value="{{genderData.id}}" ng-selected="{{genderData.id == genderHidden}}">{{genderData.name}}</option>
                                        </select>
                                        <span class="form-text text-muted gender_id-error error-span"></span>
                                        <input type="hidden" ng-model="genderHidden">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Door No<span class="req">*</span></label>
                                        <input type="text" class="form-control" aria-describedby="emailHelp" name="door_no" id="door_no" placeholder="Enter Door No" ng-model="doorNo">
                                        <span class="form-text text-muted door_no-error error-span"></span>
                                    </div>


                                    <div class="col-md-4">
                                        <label>Street<span class="req">*</span></label>
                                        <!--<input type="text" class="form-control" aria-describedby="emailHelp" name="street" id="street" placeholder="Enter Street" ng-model="streetName">-->
                                        <select class="form-control" name="street" id="street">
                                            <option value="">Select Street</option>
                                            <option  ng-repeat="(key, street) in streets" value="{{street.id}}" ng-selected="{{street.id == streetHidden}}">{{street.name}}</option>
                                        </select>
                                        <span class="form-text text-muted street-error error-span"></span>
                                        <input type="hidden" ng-model="streetHidden">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Address<span class="req">*</span></label>
                                        <textarea class="form-control" aria-describedby="emailHelp" name="address" id="address" placeholder="Enter Address" ng-model="addressVal"></textarea>
                                        <span class="form-text text-muted address-error error-span"></span>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Residing country<span class="req">*</span></label>

                                        <select class="form-control" name="residing_country" id="residing_country" ng-model="residingCountry">
                                            <option value="">Select Country</option>
                                            <option  ng-repeat="(key, countryData) in country" value="{{countryData.id}}" ng-selected="{{countryData.id == countryHidden}}">{{countryData.countries_name}}</option>
                                        </select>
                                        <span class="form-text text-muted residing_country-error error-span"></span>
                                        <input type="hidden" ng-model="countryHidden">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 cpl-md-3" style="float:left;">
                                <div class="col-md-12">
                                    <div class="col-md-8">
                                        <label>Profile Picture<span class="req">*</span></label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_2">
                                            <div class="kt-avatar__holder imagePreview kt-avatar__holder-profile-image-large" id="profile_picture_preview" ng-style="{'background-image': 'url(' + profilePicture + ')'}"></div>
                                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change profile image">
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

                                <label>Landline Number</label>
                                <input type="text" class="form-control validate_amount" aria-describedby="emailHelp" name="landline_no" id="landline_no" placeholder="Enter Landline Number" ng-model="landlineNo">
                                <span class="form-text text-muted landline_no-error error-span"></span>
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

                            <!--<div class="col-md-3">

                                <label>Commitment</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="commitment" id="commitment" placeholder="Enter Commitment" ng-model="commitment">
                                <span class="form-text text-muted commitment-error error-span"></span>
                            </div>-->
                            <!--<div class="col-md-3">
                                <label>For year<span class="req">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="for_year" placeholder="Select date" id="for_year" aria-describedby="kt_datepicker-error" aria-invalid="false" ng-model="forYear">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <span class="form-text text-muted for_year-error error-span"></span>
                            </div>-->
                            <!-- <div class="col-md-3">
                                 <label>Paid</label>
                                 <div class="kt-radio-inline">
                                     <label class="kt-radio">
                                         <input type="radio" name="paid" value="1" ng-model="paid"> Yes
                                         <span></span>
                                     </label>
                                     <label class="kt-radio">
                                         <input type="radio" name="paid" value="0" ng-model="paid" checked> No
                                         <span></span>
                                     </label>
                                 </div>
                                 <span class="form-text text-muted paid-error error-span"></span>
                             </div>

                             <div class="col-md-3">

                                 <label>Total Commitment Amount<span class="req">*</span></label>
                                 <input type="text" class="form-control" aria-describedby="emailHelp" name="amount" id="amount" placeholder="Enter Amount" ng-model="amount">
                                 <span class="form-text text-muted amount-error error-span"></span>
                             </div>-->
                            <!--<div class="col-md-3">
                                <label>Status<span class="req">*</span></label>

                                <select class="form-control" id="status" name="status"  ng-model="statusVal">
                                    <option value="1">Active</option>
                                    <option value="0">In Active</option>
                                </select>
                                <span class="form-text text-muted status-error error-span"></span>
                            </div>-->
                            <input type="hidden" id="status" name="status" value="1">

                        </div>
                        <div class="kt-separator kt-separator--border-dashed"></div>
                        <!-- <div class="form-group row ">

                             <div class="col-md-3">
                                 <label>Add custom field</label>
                             </div>

                             <div class="col-md-9 ">
                                 <div class="kt-uppy" id="kt_uppy_5">
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
                         <input type="hidden" id="entry_count" ng-value="totalDynamicEntry">-->
                        <!--<div class="kt-separator kt-separator--border-dashed"></div>-->

                        <div class="form-group row " style="margin-top:11px;">

                            <div class="col-md-9">
                                <label style="margin-top:11px;">Sponsorship Commitments</label>
                            </div>
                            <div class="col-md-3">
                                <div class="kt-uppy commit-btn" id="kt_uppy_5">
                                    <div class="kt-uppy__wrapper">
                                        <button type="button" class="btn btn-brand btn-icon-sm ng-scope" ng-click="addNewCommitment()">
                                            <i class="flaticon2-plus"></i> Add Commitment Entry
                                        </button>

                                    </div>
                                </div>
                            </div>

                        </div>



                        <div id="commitmentEntryDiv" class="{{sponsorCommitments.length>0?'':'ng-hide'}}">

                            <div class="form-group row" ng-repeat="(key, sponsorCommitmentsData) in sponsorCommitments">
                                <div class="col-md-2">
                                    <label>For Year<span class="req">*</span></label>
                                    <input type="text" class="form-control for_year for_year_commitment_update{{$index + 1}}" aria-describedby="emailHelp" id="for_year_commitment" name="for_year_commitment" placeholder="Select Year" value="{{sponsorCommitmentsData.for_year| convertDate}}">
                                    <!--<select class="form-control for_year_commitment_update{{$index + 1}}" id="for_year_commitment" name="for_year_commitment"  >
                                        <option value="">Select year</option>
                                        <option value="1990" ng-selected="{{sponsorCommitmentsData.for_year == '1990'}}">1990</option>
                                        <option value="1991" ng-selected="{{sponsorCommitmentsData.for_year == '1991'}}">1991</option>
                                        <option value="1992" ng-selected="{{sponsorCommitmentsData.for_year == '1992'}}">1992</option>
                                        <option value="1993" ng-selected="{{sponsorCommitmentsData.for_year == '1993'}}">1993</option>
                                        <option value="1994" ng-selected="{{sponsorCommitmentsData.for_year == '1994'}}">1994</option>
                                        <option value="1995" ng-selected="{{sponsorCommitmentsData.for_year == '1995'}}">1995</option>
                                        <option value="1996" ng-selected="{{sponsorCommitmentsData.for_year == '1996'}}">1996</option>
                                        <option value="1997" ng-selected="{{sponsorCommitmentsData.for_year == '1997'}}">1997</option>
                                        <option value="1998" ng-selected="{{sponsorCommitmentsData.for_year == '1998'}}">1998</option>
                                        <option value="1999" ng-selected="{{sponsorCommitmentsData.for_year == '1999'}}">1999</option>
                                        <option value="2000" ng-selected="{{sponsorCommitmentsData.for_year == '2000'}}">2000</option>
                                        <option value="2001" ng-selected="{{sponsorCommitmentsData.for_year == '2001'}}">2001</option>
                                        <option value="2002" ng-selected="{{sponsorCommitmentsData.for_year == '2002'}}">2002</option>
                                        <option value="2003" ng-selected="{{sponsorCommitmentsData.for_year == '2003'}}">2003</option>
                                        <option value="2004" ng-selected="{{sponsorCommitmentsData.for_year == '2004'}}">2004</option>
                                        <option value="2005" ng-selected="{{sponsorCommitmentsData.for_year == '2005'}}">2005</option>
                                        <option value="2006" ng-selected="{{sponsorCommitmentsData.for_year == '2006'}}">2006</option>
                                        <option value="2007" ng-selected="{{sponsorCommitmentsData.for_year == '2007'}}">2007</option>
                                        <option value="2008" ng-selected="{{sponsorCommitmentsData.for_year == '2008'}}">2008</option>
                                        <option value="2009" ng-selected="{{sponsorCommitmentsData.for_year == '2009'}}">2009</option>
                                        <option value="2010" ng-selected="{{sponsorCommitmentsData.for_year == '2010'}}">2010</option>
                                        <option value="2011" ng-selected="{{sponsorCommitmentsData.for_year == '2011'}}">2011</option>
                                        <option value="2012" ng-selected="{{sponsorCommitmentsData.for_year == '2012'}}">2012</option>
                                        <option value="2013" ng-selected="{{sponsorCommitmentsData.for_year == '2013'}}">2013</option>
                                        <option value="2014" ng-selected="{{sponsorCommitmentsData.for_year == '2014'}}">2014</option>
                                        <option value="2015" ng-selected="{{sponsorCommitmentsData.for_year == '2015'}}">2015</option>
                                        <option value="2016" ng-selected="{{sponsorCommitmentsData.for_year == '2016'}}">2016</option>
                                        <option value="2017" ng-selected="{{sponsorCommitmentsData.for_year == '2017'}}">2017</option>
                                        <option value="2018" ng-selected="{{sponsorCommitmentsData.for_year == '2018'}}">2018</option>
                                        <option value="2019" ng-selected="{{sponsorCommitmentsData.for_year == '2019'}}">2019</option>
                                        <option value="2020" ng-selected="{{sponsorCommitmentsData.for_year == '2020'}}">2020</option>
                                        <option value="2021" ng-selected="{{sponsorCommitmentsData.for_year == '2021'}}">2021</option>
                                        <option value="2022" ng-selected="{{sponsorCommitmentsData.for_year == '2022'}}">2022</option>
                                        <option value="2023" ng-selected="{{sponsorCommitmentsData.for_year == '2023'}}">2023</option>
                                        <option value="2024" ng-selected="{{sponsorCommitmentsData.for_year == '2024'}}">2024</option>
                                        <option value="2025" ng-selected="{{sponsorCommitmentsData.for_year == '2025'}}">2025</option>
                                        <option value="2026" ng-selected="{{sponsorCommitmentsData.for_year == '2026'}}">2026</option>
                                        <option value="2027" ng-selected="{{sponsorCommitmentsData.for_year == '2027'}}">2027</option>
                                        <option value="2028" ng-selected="{{sponsorCommitmentsData.for_year == '2028'}}">2028</option>
                                        <option value="2029" ng-selected="{{sponsorCommitmentsData.for_year == '2029'}}">2029</option>
                                        <option value="2030" ng-selected="{{sponsorCommitmentsData.for_year == '2030'}}">2030</option>
                                    </select>-->
                                    <span class="form-text text-muted for_year_commitment{{$index + 1}}-error error-span"></span>
                                </div>
                                <div class="col-md-2">

                                    <label>Commitment Amount<span class="req">*</span></label>
                                    <input type="text" class="form-control amount_commitment_update{{$index + 1}} validate_amount" aria-describedby="emailHelp" name="amount_commitment" id="amount_commitment" placeholder="Enter Amount" ng-value="{{sponsorCommitmentsData.amount}}">
                                    <span class="form-text text-muted amount_commitment{{$index + 1}}-error error-span"></span>
                                </div>
                                <!--<div class="col-md-2">
                                    <label>Paid date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control paid_date_commitment paid_date_commitment_update{{$index}}" name="paid_date_commitment" placeholder="Select date" id="paid_date_commitment" value="{{sponsorCommitmentsData.paid_date| convertDate}}" >
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <span class="form-text text-muted paid_date_commitment0-error error-span"></span>
                                </div>-->

                                <div class="col-md-2">
                                    <label>Paid</label>
                                    <div class="kt-radio-inline">
                                        <label class="kt-radio">
                                            <input type="radio" name="paid_update{{$index + 1}}" value="1" ng-model="sponsorCommitmentsData.paid" disabled> Yes
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" name="paid_update{{$index + 1}}" value="0" ng-model="sponsorCommitmentsData.paid" disabled> No
                                            <span></span>
                                        </label>
                                    </div>
                                    <span class="form-text text-muted paid{{$index + 1}}-error error-span"></span>
                                </div>

                                <div class="col-md-2">
                                    <label>Receipt No.</label>

                                    <!--<select class="form-control receipt_no_commitment_update{{$index + 1}}" id="receipt_no_commitment" name="receipt_no_commitment" >
                                        <option value="">Select Receipt No</option>

                                        <option  ng-repeat="(key, sponsorReceiptData) in sponsorReceipt" value="{{sponsorReceiptData.id}}" ng-selected="{{sponsorReceiptData.id == sponsorCommitmentsData.receipt_no}}">{{sponsorReceiptData.receipt_no}}</option>
                                    </select>-->
                                    <input type="text" id="receipt_no_commitment" name="receipt_no_commitment" class="form-control receipt_no_commitment_update{{$index + 1}}" ng-model="sponsorCommitmentsData.r_no" readonly>
                                    <span class="form-text text-muted receipt_no_commitment{{$index + 1}}-error error-span"></span>
                                </div>
                                <div class="col-md-2">	
                                    <label>Remarks</label>	
                                    <input type="text" id="remarks_commitment" name="remarks_commitment" class="form-control remarks_commitment_update{{$index + 1}}" ng-model="sponsorCommitmentsData.remarks">	
                                    <span class="form-text text-muted remarks_commitment{{$index + 1}}-error error-span"></span>	
                                </div>
                                <div class="col-md-2 text-center">
                                    <label>Action</label>

                                    <div class="kt-subheader__toolbar" >
                                        <a class="btn btn-label-brand btn-bold m-l-15 update_commitment" data-commitment-id="{{sponsorCommitmentsData.id}}" data-count="{{$index + 1}}" id="save_commitment">
                                            <i class="flaticon-edit"></i></a>
                                        <a class="btn btn-label-danger btn-bold delete_commitment_update" data-commitment-id="{{sponsorCommitmentsData.id}}" data-count="{{$index + 1}}" data-commitment-id="{{sponsorCommitmentsData.id}}" id="delete_commitment" >
                                            <i class="flaticon2-trash"></i></a>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="form-group row">
                                <div class="col-md-2">
                                    <label>For Year<span class="req">*</span></label>
                                    <input type="text" class="form-control for_year for_year_commitment0" id="for_year_commitment" name="for_year_commitment" placeholder="Select For Year" >
                                   
                                    <span class="form-text text-muted for_year_commitment0-error error-span"></span>
                                </div>
                                <div class="col-md-2">

                                    <label>Commitment Amount<span class="req">*</span></label>
                                    <input type="text" class="form-control amount_commitment0 validate_amount" aria-describedby="emailHelp" name="amount_commitment" id="amount_commitment" placeholder="Enter Amount" >
                                    <span class="form-text text-muted amount_commitment0-error error-span"></span>
                                </div>
                               
                                <div class="col-md-2">
                                    <label>Paid</label>
                                    <div class="kt-radio-inline">
                                        <label class="kt-radio">
                                            <input type="radio" name="paid0" value="1" disabled> Yes
                                            <span></span>
                                        </label>
                                        <label class="kt-radio">
                                            <input type="radio" name="paid0" value="0" checked disabled> No
                                            <span></span>
                                        </label>
                                    </div>
                                    <span class="form-text text-muted paid0-error error-span"></span>
                                </div>

                                <div class="col-md-3">
                                    <label>Receipt No.</label>

                                 
                                    <input type="text" class="form-control receipt_no_commitment0" id="receipt_no_commitment" name="receipt_no_commitment" readonly>
                                    <span class="form-text text-muted receipt_no_commitment0-error error-span"></span>
                                </div>
                                <div class="col-md-3">	
                                    <label>Remarks</label>	
                                    <input type="text" class="form-control remarks_commitment0" id="remarks_commitment" name="remarks_commitment">	
                                    <span class="form-text text-muted remarks_commitment0-error error-span"></span>	
                                </div>
                                <div class="col-md-3 text-center">
                                    <label>Action</label>

                                    <div class="kt-subheader__toolbar" >
                                        <a class="btn btn-label-brand btn-bold m-l-15 save_commitment" data-id="" data-count="0" id="save_commitment">
                                            <i class="flaticon2-check-mark"></i></a>
                                        <a class="btn btn-label-danger btn-bold delete_commitment" id="delete_commitment" >
                                            <i class="flaticon2-trash"></i></a>
                                    </div>
                                </div>
                            </div> -->
                        </div>

                        <input type="hidden" id="entry_count" ng-value="totalEntry">


                        <div class="form-group row ">

                            <div class="col-md-12 pt-12">

                                <div class="text-center">
                                    <button type="button" id="submit_edit_sponsor_form" class="btn btn-brand" disabled>Save</button>
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




    <script type="text/javascript">


                var edit_sponsor_app = angular.module('edit_sponsor_app', []);
                edit_sponsor_app.controller('edit_sponsor_controller', ['$scope', '$http', '$compile', '$location', '$window', '$timeout', function ($scope, $http, $compile, $location, $window, $timeout) {


                $scope.pageLoad = function () {
                $scope.totalDynamicEntry = 0;
                        $scope.totalEntry = 0;
                        //$timeout(function () {
                        var url = $location.absUrl();
                        var sponsor_id = url.substring(url.lastIndexOf('/') + 1);
                        if (sponsor_id) {

                $http.get(base_url + 'sponsors/getSponsorData?id=' + sponsor_id)
                        .success(function (response) {
                        console.log(response);
                                profile_img = base_url + "attachments/sponsors_profile_image/default.png";
                                if (response['sponsor_details'][0]['profile_picture'] != "null" && response['sponsor_details'][0]['profile_picture'] != "") {
                        profile_img = base_url + "attachments/sponsors_profile_image/" + response['sponsor_details'][0]['id'] + "/" + response['sponsor_details'][0]['profile_picture'];
                        }



                        var for_year = "";
                                if (response['sponsor_details'][0]['for_year'] != '0000-00-00' && response['sponsor_details'][0]['for_year'] != '') {
                        var forYearGet = response['sponsor_details'][0]['for_year'];
                                var forYearSplit = forYearGet.split("-");
                                for_year = forYearSplit[1] + "/" + forYearSplit[2] + "/" + forYearSplit[0];
                        }

                        $scope.customField = response['dynamic_entry_sponsor'];
                                $scope.sponsorCommitments = response['sponsor_commitments'];
                                $scope.sponsorReceipt = response['sponsor_receipts'];
                                $scope.profileImgData = response['sponsor_details'][0]['profile_picture'];
                                $scope.profilePicture = profile_img;
                                $scope.sponsorName = response['sponsor_details'][0]['sponsor_name'];
                                //$scope.genderID = response['sponsor_details'][0]['gender_id'];
                                $scope.genderHidden = response['sponsor_details'][0]['gender_id'];
                                $scope.emailId = response['sponsor_details'][0]['email'];
                                $scope.mobileNo = response['sponsor_details'][0]['mobile_no'];
                                $scope.landlineNo = response['sponsor_details'][0]['landline_no'];
                                $scope.doorNo = response['sponsor_details'][0]['door_no'];
                                //$scope.streetName = response['sponsor_details'][0]['street_name'];
                                $scope.streetHidden = response['sponsor_details'][0]['street_name'];
                                $scope.addressVal = response['sponsor_details'][0]['address'];
                                // $scope.residingCountry = response['sponsor_details'][0]['residing_country'];
                                $scope.countryHidden = response['sponsor_details'][0]['residing_country'];
                                //$scope.commitment = response['sponsor_details'][0]['commitment'];
                                //$scope.forYear = for_year;
                                //$scope.paid = response['sponsor_details'][0]['paid'];
                                //$scope.amount = response['sponsor_details'][0]['amount'];
                                $scope.statusVal = response['sponsor_details'][0]['status'];
                                $timeout(function () {

                                KTFormWidgets.init();
                                }, 2000);
                                $scope.loadCountry();
                                $scope.loadGender();
                                $scope.loadStreet();
                                $('#submit_edit_sponsor_form').attr("disabled", false);
                        })
                }
                //}, 500);
                }



                $scope.loadCountry = function () {
                $http.get(base_url + 'sponsors/get_country')
                        .success(function (data) {
                        //console.log(data);
                        $scope.country = data.country;
                        })
                }
                $scope.loadStreet = function () {
                $http.get(base_url + 'sponsors/get_street_list')
                        .success(function (data) {
                        $scope.streets = data.street;
                        })
                }

                $scope.loadGender = function () {
                $http.get(base_url + 'scholarship/get_gender')
                        .success(function (data) {

                        $scope.genderValues = data.gender;
                        })
                }

                $scope.addNewCommitment = function () {

                $scope.totalDynamicEntry = parseInt($scope.totalDynamicEntry) + 1;
                        var count = $scope.totalDynamicEntry;
                        var divElement = angular.element(document.querySelector('#commitmentEntryDiv'));
                        var receipt_option = "";
                        var url = $location.absUrl();
                        var sponsor_id = url.substring(url.lastIndexOf('/') + 1);
                        $http.get(base_url + 'sponsors/get_receipt_details?sponsor_id=' + sponsor_id)
                        .success(function (data) {
                        console.log(data);
                                //receipt_option =
                                var obj = data.sponsor_details;
                                for (x in obj) {
                        //console.log(obj[x]);
                        receipt_option += '<option value="' + obj[x].id + '">' + obj[x].receipt_no + '</option>';
                        }
                        //var content = '<div class="form-group row"><div class="col-md-2"><label>For year<span class="req">*</span></label><input class="form-control for_year for_year_commitment' + count + '" id="for_year_commitment" name="for_year_commitment"  placeholder="Select For Year"><span class="form-text text-muted for_year_commitment' + count + '-error error-span"></span></div><div class="col-md-2"><label>Amount<span class="req">*</span></label><input type="text" class="form-control amount_commitment' + count + ' validate_amount" aria-describedby="emailHelp" name="amount_commitment" id="amount_commitment" placeholder="Enter Amount" > <span class="form-text text-muted amount_commitment' + count + '-error error-span"></span></div><div class="col-md-2"><label>Paid</label><div class="kt-radio-inline"> <label class="kt-radio"><input type="radio" name="paid' + count + '" value="1" > Yes<span></span></label><label class="kt-radio"><input type="radio" name="paid' + count + '" value="0"  checked> No<span></span></label></div> <span class="form-text text-muted paid' + count + '-error error-span"></span></div><div class="col-md-3"><label>Receipt No.</label><select class="form-control receipt_no_commitment' + count + '" id="receipt_no_commitment" name="receipt_no_commitment"  ><option value="">Select Receipt No</option>' + receipt_option + '</select><span class="form-text text-muted receipt_no_commitment' + count + '-error error-span"></span></div><div class="col-md-3 text-center"> <label>Action</label><div class="kt-subheader__toolbar" ><a class="btn btn-label-brand btn-bold m-l-15 save_commitment" data-count="' + count + '" id="save_commitment"><i class="flaticon2-check-mark"></i></a><a class="btn btn-label-danger btn-bold delete_commitment" data-count="' + count + '" id="delete_commitment" ><i class="flaticon2-trash"></i></a></div> </div> </div>';
                         var content = '<div class="form-group row"><div class="col-md-2"><label>For year<span class="req">*</span></label><input class="form-control for_year for_year_commitment' + count + '" id="for_year_commitment" name="for_year_commitment"  placeholder="Select For Year"><span class="form-text text-muted for_year_commitment' + count + '-error error-span"></span></div><div class="col-md-2"><label>Amount<span class="req">*</span></label><input type="text" class="form-control amount_commitment' + count + ' validate_amount" aria-describedby="emailHelp" name="amount_commitment" id="amount_commitment" placeholder="Enter Amount" > <span class="form-text text-muted amount_commitment' + count + '-error error-span"></span></div><div class="col-md-2"><label>Paid</label><div class="kt-radio-inline"> <label class="kt-radio"><input type="radio" name="paid' + count + '" value="1" disabled> Yes<span></span></label><label class="kt-radio"><input type="radio" name="paid' + count + '" value="0"  checked disabled> No<span></span></label></div> <span class="form-text text-muted paid' + count + '-error error-span"></span></div><div class="col-md-2"><label>Receipt No.</label><input type="text" class="form-control receipt_no_commitment' + count + '" id="receipt_no_commitment" name="receipt_no_commitment"  readonly><span class="form-text text-muted receipt_no_commitment' + count + '-error error-span"></span></div><div class="col-md-2"><label>Remarks</label><input type="text" class="form-control remarks_commitment' + count + '" id="remarks_commitment" name="remarks_commitment"><span class="form-text text-muted remarks_commitment' + count + '-error error-span"></span></div><div class="col-md-2 text-center"> <label>Action</label><div class="kt-subheader__toolbar" ><a class="btn btn-label-success btn-bold m-l-15 save_commitment" data-count="' + count + '" id="save_commitment"><i class="flaticon2-check-mark"></i></a> <a class="btn btn-label-danger btn-bold delete_commitment" data-count="' + count + '" id="delete_commitment" ><i class="flaticon2-trash"></i></a></div> </div> </div>';
                                var appendHtml = $compile('<commitment-Entry>' + content + '</commitment-entry>')($scope);
                                divElement.append(appendHtml);
                                KTFormWidgets_datepicker.init();
                        })
                        $("#commitmentEntryDiv").removeClass('ng-hide');




                }

                $scope.saveCommitment = function (count) {
                alert("save");
                        foryear = "forYearCommitment" + count;
                        alert($scope.forYearCommitment + count);
                }

                $scope.goBack = function () {

                $window.location.href = base_url + "sponsors";
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
                        //console.log(response);
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
                var edit_sponsor_div = document.getElementById('edit_sponsor_div');
                //alert(dvSecond);
                angular.element(document).ready(function () {
        angular.bootstrap(edit_sponsor_div, ['edit_sponsor_app']);
        });
                edit_sponsor_app.filter('convertDate', function () {
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
                $('#submit_edit_sponsor_form').click(function (e) {
        e.preventDefault();
                var btn = $(this);
                var form = $(this).closest('form');
                form.validate({
                rules: {
                sponsor_name: {
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
                        residing_country: {
                        required: true,
                        },
//                        for_year: {
//                        required: true,
//                        },
//                        paid: {
//                        required: true,
//                        },
//                        amount: {
//                        required: true,
//                                number: true,
//                        },
                        status: {
                        required: true,
                        },
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
        $(".error-span").html("");
                btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
                var sponsor_name = $("#sponsor_name").val();
                var gender_id = $("#gender_id").val();
                var profile_picture = $("#profile_picture")[0].files;
                var mobile_no = $("#mobile_no").val();
                var email = $("#email").val();
                var landline_no = $("#landline_no").val();
                var door_no = $("#door_no").val();
                var street = $("#street").val();
                var address = $("#address").val();
                var residing_country = $("#residing_country").val();
                //var commitment = $("#commitment").val();
                //var paid = $("input[name='paid']:checked").val();
                // var amount = $("#amount").val();
                var status = $("#status").val();
//                var for_year_value = $("#for_year").val();
//                var for_year_split = for_year_value.split("/");
//                var for_year = for_year_split[2] + "-" + for_year_split[0] + "-" + for_year_split[1];
//                if (typeof (paid) == 'undefined') {
//        paid = "0";
//        }

                var url = window.location.href;
                var sponsor_id = url.substring(url.lastIndexOf('/') + 1);
                var formData = new FormData();
                formData.append("sponsor_id", sponsor_id);
                formData.append("sponsor_name", sponsor_name);
                formData.append("gender_id", gender_id);
                formData.append("mobile_no", mobile_no);
                formData.append("email", email);
                formData.append("landline_no", landline_no);
                formData.append("door_no", door_no);
                formData.append("street", street);
                formData.append("address", address);
                formData.append("residing_country", residing_country);
                //formData.append("commitment", commitment);
                //formData.append("paid", paid);
                //formData.append("amount", amount);
                //formData.append("for_year", for_year);
                formData.append("status", status);
                formData.append("profile_picture", profile_picture[0]);
                $.ajax({
                method: "POST",
                        url: base_url + "sponsors/edit_sponsor",
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
                                "text": "Sponsor has been successfully updated!",
                                "type": "success",
                                "confirmButtonClass": "btn btn-secondary"
                        }).then(function () {
                        window.location = base_url + 'sponsors';
                        });
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
                $('.for_year').datepicker({
                format: 'dd/mm/yyyy',
                        todayHighlight: true,
                        viewMode: "months",
                        minViewMode: "months",
                        templates: {
                        leftArrow: '<i class="la la-angle-left"></i>',
                                rightArrow: '<i class="la la-angle-right"></i>'
                        },
                }).on('changeDate', function (ev, date) {
                //alert(date);
                var selectedDate = $(this).datepicker('getDate');
                        // alert(selectedDate); return;
                        if (selectedDate != null){
                var selectedMonth = selectedDate.getMonth();
                        var selectedYear = selectedDate.getFullYear();
                        var lastDate = new Date(selectedYear, selectedMonth + 1, 0);
                        var lastDay = lastDate.getDate();
                        //alert(lastDay);
                        $(this).datepicker('update', new Date(selectedYear, selectedMonth, lastDay));
                }
                });
                        $('.paid_date_commitment').datepicker({
                todayHighlight: true,
                        format: 'dd/mm/yyyy',
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
//                $(document).on('blur click', '.for_year', function () {
//        var date = $(this).val();
//                if (date != "") {
//        var selectedDate = $(this).datepicker('getDate');
//                //alert(selectedDate);
//                if (selectedDate != null){
//        var selectedMonth = selectedDate.getMonth();
//                var selectedYear = selectedDate.getFullYear();
//                var lastDate = new Date(selectedYear, selectedMonth + 1, 0);
//                var lastDay = lastDate.getDate();
//                //alert(lastDay);
//                $(this).datepicker('setDate', new Date(selectedYear, selectedMonth, lastDay));
//        }
//        }
//        });
                var KTFormWidgets_datepicker = function () {
                // Private functions
                var initWidgets = function () {
                $('.paid_date_commitment').datepicker({
                todayHighlight: true,
                        format: 'dd/mm/yyyy',
                        templates: {
                        leftArrow: '<i class="la la-angle-left"></i>',
                                rightArrow: '<i class="la la-angle-right"></i>'
                        }
                });
                        $('.for_year').datepicker({
                format: 'dd/mm/yyyy',
                        todayHighlight: true,
                        viewMode: "months",
                        minViewMode: "months",
                        templates: {
                        leftArrow: '<i class="la la-angle-left"></i>',
                                rightArrow: '<i class="la la-angle-right"></i>'
                        },
                }).on('changeDate', function (ev, date) {
                //alert(date);
                var selectedDate = $(this).datepicker('getDate');
                        // alert(selectedDate); return;
                        if (selectedDate != null){
                var selectedMonth = selectedDate.getMonth();
                        var selectedYear = selectedDate.getFullYear();
                        var lastDate = new Date(selectedYear, selectedMonth + 1, 0);
                        var lastDay = lastDate.getDate();
                        //alert(lastDay);
                        $(this).datepicker('update', new Date(selectedYear, selectedMonth, lastDay));
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
                $("#" + div).parent().parent().parent().find(".error-span").append('Maximum size 2MB');
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

        $(document).on('click', '.save_commitment', function () {
                var this_obj = $(this);
                var count = $(this).attr('data-count');
                //alert(count);
                var for_year = $('.for_year_commitment' + count).val();
                var amount = $('.amount_commitment' + count).val();
                //var paid_date = $('.paid_date_commitment' + count).val();
                var paid = $("input[name='paid" + count + "']:checked").val();
                var receipt_no = $('.receipt_no_commitment' + count).val();
                var remarks= $('.remarks_commitment' + count).val();
                var url = window.location.href;
                var sponsor_id = url.substring(url.lastIndexOf('/') + 1);
                var input_validate_error = 0;
                if (for_year == "") {
                $(".for_year_commitment" + count + "-error").html("This field is required");
                        $(".for_year_commitment" + count).addClass("is-invalid");
                        input_validate_error = input_validate_error + 1;
                        //return;
                } else {
                $(".for_year_commitment" + count + "-error").html("");
                        $(".for_year_commitment" + count).removeClass("is-invalid");
                }
                if (amount == "") {
                $(".amount_commitment" + count + "-error").html("This field is required");
                        $(".amount_commitment" + count).addClass("is-invalid");
                        input_validate_error = input_validate_error + 1;
                        //return;
                } else {
                $(".amount_commitment" + count + "-error").html("");
                        $(".amount_commitment" + count).removeClass("is-invalid");
                        var value = amount.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
                        var intRegex = /^\d+$/;
                        if (!intRegex.test(value)) {
                $(".amount_commitment" + count + "-error").html("Please enter valid amount");
                        $(".amount_commitment" + count).addClass("is-invalid");
                        input_validate_error = input_validate_error + 1;
                        //return;
                } else {
                $(".amount_commitment" + count + "-error").html("");
                        $(".amount_commitment" + count).removeClass("is-invalid");
                }
                }

                if (input_validate_error > 0) {
                return;
                }
                if (typeof (paid) == "undefined" || paid == "") {
                paid = "0";
                }

        //        if (paid_date != "") {
        //        paid_date = converToMysqlDate(paid_date);
        //        }

                if (input_validate_error == 0) {
                        var commitment_id = $(this).attr('data-commitment-id');
                        for_year = converToMysqlDate(for_year);
                        var dataString = "for_year=" + for_year +  "&remarks=" + remarks + "&sponsor_id=" + sponsor_id+ "&commitment_id=" + commitment_id;               //console.log(dataString);
                        
                        $.ajax({
                                method: "POST",
                                url: base_url + "sponsors/validate_commitment",
                                data: dataString,
                                error: function (data) {
                                console.log(data);
                                },
                                success: function (data) {
                                //console.log(data);
                                var myObj = JSON.parse(data);
                                        console.log(myObj);
                                        if (myObj.status == "1") {
                                                input_validate_error = input_validate_error + 1;
                                                swal.fire(
                                                "Warning",
                                                "Commitment entry Already Exists!",
                                                "warning",
                                                "btn btn-secondary"
                                                ).then(function () {
                                                        this_obj.closest('.ng-scope').find("#remarks_commitment").val('');
                                                });
                                        
                                                return;
                                        }
                                        else{
                                                var dataString = "for_year=" + for_year + "&amount=" + amount + "&paid=" + paid + "&receipt_no=" + receipt_no + "&remarks=" + remarks + "&sponsor_id=" + sponsor_id;                //console.log(dataString);
                                                add_commitment(dataString,this_obj);
                                        }
                                }
                        });
                }
           
        });
        $(document).on('click', '.update_commitment', function () {
                var _this = $(this);
                var count = $(this).attr('data-count');
                var commitment_id = $(this).attr('data-commitment-id');
                //alert(count);
                var for_year = $('.for_year_commitment_update' + count).val();
                var amount = $('.amount_commitment_update' + count).val();
                //var paid_date = $('.paid_date_commitment_update' + count).val();
                var paid = $("input[name='paid_update" + count + "']:checked").val();
                var receipt_no = $('.receipt_no_commitment_update' + count).val();
                var remarks = $('.remarks_commitment_update' + count).val();
                var url = window.location.href;
                var sponsor_id = url.substring(url.lastIndexOf('/') + 1);
                if (for_year == "") {
                $(".for_year_commitment" + count + "-error").html("This field is required");
                        return;
                } else {
                $(".for_year_commitment" + count + "-error").html("");
                }
                if (amount == "") {
                $(".amount_commitment" + count + "-error").html("This field is required");
                        return;
                } else {
                $(".amount_commitment" + count + "-error").html("");
                        var value = amount.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
                        var intRegex = /^\d+$/;
                        if (!intRegex.test(value)) {
                $(".amount_commitment" + count + "-error").html("Please enter valid amount");
                        return;
                } else {
                $(".amount_commitment" + count + "-error").html("");
                }
                }
                if (typeof (paid) == "undefined" || paid == "") {
                paid = "0";     
                }

        //        if (paid_date != "") {
        //        paid_date = converToMysqlDate(paid_date);
        //        }
                var commitment_id = $(this).attr('data-commitment-id');
                for_year = converToMysqlDate(for_year);
                var dataString = "for_year=" + for_year +  "&remarks=" + remarks + "&sponsor_id=" + sponsor_id+ "&commitment_id=" + commitment_id;               //console.log(dataString);
                
                $.ajax({
                        method: "POST",
                        url: base_url + "sponsors/validate_commitment",
                        data: dataString,
                        error: function (data) {
                        console.log(data);
                        },
                        success: function (data) {
                        //console.log(data);
                        var myObj = JSON.parse(data);
                                console.log(myObj);
                                if (myObj.status == "1") {
                                        swal.fire(
                                                "Warning",
                                                "Commitment entry Already Exists!",
                                                "warning",
                                                "btn btn-secondary"
                                        ).then(function () {
                                                _this.closest('.ng-scope').find("#remarks_commitment").val('');
                                        });
                                
                                return;
                                }
                                else{
                                        var dataString = "for_year=" + for_year + "&amount=" + amount + "&paid=" + paid + "&receipt_no=" + receipt_no + "&remarks=" + remarks + "&sponsor_id=" + sponsor_id + "&commitment_id=" + commitment_id;
                                        update_commitment(dataString);
                                }
                        }
                });
        });
                $(document).on('click', '.delete_commitment_update', function () {
        var this_obj = $(this);
                var commitment_id = $(this).attr('data-commitment-id');
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
        var dataString = "commitment_id=" + commitment_id;
                console.log(dataString);
                $.ajax({
                method: "POST",
                        url: base_url + "sponsors/delete_commitment",
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
                $(document).on('click', '.delete_commitment', function () {
        var this_obj = $(this);
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
        this_obj.parent().parent().parent().remove();
        }
        });
        });
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
                //$('.validate_amount').keypress(function (event) {
//        //console.log(event.which);
//        //console.log(isNaN(String.fromCharCode(event.which)));
//        if (event.which != 8 && isNaN(String.fromCharCode(event.which))) {
//        event.preventDefault();
//        }
//        });

                $(document).on('click', '.save_custom_entry', function () {
        var this_obj = $(this);
                var count = $(this).attr('data-count');
                //alert(count);
                var custom_label = $('.custom_label' + count).val();
                var custom_value = $('.custom_value' + count).val();
                var url = window.location.href;
                var sponsor_id = url.substring(url.lastIndexOf('/') + 1);
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


        var dataString = "custom_label=" + custom_label + "&custom_value=" + custom_value + "&sponsor_id=" + sponsor_id;
                // console.log(dataString);
                $.ajax({
                method: "POST",
                        url: base_url + "sponsors/add_custom_entry",
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
                var sponsor_id = url.substring(url.lastIndexOf('/') + 1);
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

        var dataString = "custom_label=" + custom_label + "&custom_value=" + custom_value + "&sponsor_id=" + sponsor_id + "&entry_id=" + entry_id;
                //console.log(dataString);
                $.ajax({
                method: "POST",
                        url: base_url + "sponsors/update_custom_entry",
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
                        url: base_url + "sponsors/delete_custom_entry_update",
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
                $(document).on('keypress', '.validate_amount', function (event) {
        //console.log(event.which);
        //console.log(isNaN(String.fromCharCode(event.which)));
        if (event.which != 8 && isNaN(String.fromCharCode(event.which))) {
        event.preventDefault();
        }
        });
        function update_commitment(dataString){
                $.ajax({
                method: "POST",
                        url: base_url + "sponsors/update_commitment",
                        data: dataString,
                        error: function (data) {
                        console.log(data);
                        },
                        success: function (data) {
                        //console.log(data);
                        if (data == "1") {
                        swal.fire({
                        "title": "Success",
                                "text": "Commitment entry updated successfully!",
                                "type": "success",
                                "confirmButtonClass": "btn btn-secondary"
                        });
                        }
                        }
                });
        }

        function add_commitment(dataString,this_obj){
                $.ajax({
                method: "POST",
                url: base_url + "sponsors/add_commitment",
                data: dataString,
                error: function (data) {
                console.log(data);
                },
                success: function (data) {
                //console.log(data);
                var myObj = JSON.parse(data);
                        console.log(myObj);
                        if (myObj.status == "1") {
                swal.fire({
                "title": "Success",
                        "text": "Commitment entry added successfully!",
                        "type": "success",
                        "confirmButtonClass": "btn btn-secondary"
                });
                        var last_update_count = $('.update_commitment:last').attr("data-count");
                        // alert(last_update_count);
                        if (typeof (last_update_count) == "undefined"){
                last_update_count = 0;
                }
                var update_count = parseInt(last_update_count) + 1;
                        var this_data_count = this_obj.attr("data-count");
                        this_obj.find('i').attr("class", "flaticon-edit");
                        this_obj.removeClass("save_commitment");
                        this_obj.addClass("update_commitment");
                        this_obj.attr("data-commitment-id", myObj.commitment_id);
                        this_obj.attr("data-count", update_count);
                        this_obj.parent().parent().parent().find('.delete_commitment').attr("data-commitment-id", myObj.commitment_id);
                        this_obj.parent().parent().parent().find('.delete_commitment').attr("data-count", update_count);
                        this_obj.parent().parent().parent().find('.delete_commitment').addClass("delete_commitment_update");
                        this_obj.parent().parent().parent().find('.delete_commitment').removeClass("delete_commitment");
                        //alert(this_data_count);
                        //alert('for_year_commitment' + update_count);
                        //alert('for_year_commitment' + this_data_count);
                        //console.log(this_obj.parent().parent().parent().find('.for_year_commitment' + this_data_count));
                        //console.log('radio[name="paid' + this_data_count + '"]');
                        //console.log(this_obj.parent().parent().parent().find('radio[name="paid' + this_data_count + '"]'));
                        this_obj.parent().parent().parent().find('.for_year_commitment' + this_data_count).addClass('for_year_commitment_update' + update_count);
                        this_obj.parent().parent().parent().find('.for_year_commitment_update' + update_count).removeClass('for_year_commitment' + this_data_count);
                        this_obj.parent().parent().parent().find('.amount_commitment' + this_data_count).addClass('amount_commitment_update' + update_count);
                        this_obj.parent().parent().parent().find('.amount_commitment_update' + update_count).removeClass('amount_commitment' + this_data_count);
                        this_obj.parent().parent().parent().find('input[type="radio"][name="paid' + this_data_count + '"]').attr('name', "paid_update" + update_count);
                        this_obj.parent().parent().parent().find('.receipt_no_commitment' + this_data_count).addClass('receipt_no_commitment_update' + update_count);
                        this_obj.parent().parent().parent().find('.receipt_no_commitment_update' + update_count).removeClass('receipt_no_commitment' + this_data_count);
                        this_obj.parent().parent().parent().find('.remarks_commitment' + this_data_count).addClass('remarks_commitment_update' + update_count);	
                        this_obj.parent().parent().parent().find('.remarks_commitment_update' + update_count).removeClass('remarks_commitment' + this_data_count);
                }
                }
        });
        }
        
    </script>
