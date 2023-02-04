
<?php
$theme_path = $this->config->item('theme_locations') . 'esms';
//echo $theme_path;
?>
<style type="text/css">
    table {border-collapse:collapse; width:100%; font-size:7px }
    table tr th{ text-align:center; border:1px solid #ddd; padding:5px 5px 5px 5px; vertical-align:middle;}
    table tr td { text-align:center; border:1px solid #ddd; padding:5px 5px 5px 5px; vertical-align:middle;}
    .pdf-f{font-weight:bold}
</style>
<div class="kt-grid__item kt-grid__item--fluid kt-app__content"  id="edit_receipt_div" ng-app="edit_receipt_app" ng-controller="edit_receipt_controller" ng-init="pageLoad()" ng-cloak>

    <table style="padding: 2px 2px;" row-style="page-break-inside:avoid;">

        <tr>
            <td colspan="5" align="center"><b>RECEIPT DETAILS</b></td>
        </tr>
        <tr>
            <td colspan="3">
                Receipt no: <?php echo $receipts[0]['receipt_no']; ?>
            </td>
            <td colspan="2">
                Receipt Date: <?php echo $receipts[0]['receipt_date']; ?>
            </td>
        </tr>
        <tr align="center" style="background-color:#e6e6ff;">
            <td width="20%"><b>Name</b></td>
            <td width="20%" align="left" ><b>Profile Image</b></td>
            <td width ="20%"><b>Receipt Type</b></td>
            <td width ="20%" align="right"><b>For Year</b></td>
            <td width ="20%"><b>Amount</b></td>
        </tr>
        <tbody>

            <tr>
                <td align="center">
                    <?php
                    if ($receipts[0]['receipt_type_id'] == "1") {

                        echo $users[0]['name'];
                    }
                    if ($receipts[0]['receipt_type_id'] == "2" || $receipts[0]['receipt_type_id'] == "5") {

                        echo $sponsor_details[0]['sponsor_name'];
                    }
                    if ($receipts[0]['receipt_type_id'] == "3" || $receipts[0]['receipt_type_id'] == "4") {

                        echo $scholarship_details[0]['student_name'];
                    }
                    ?>

                </td>
                <td align="left">

                    <?php
                    if ($receipts[0]['receipt_type_id'] == "1") {
                        $profile_img = base_url() . "attachments/profile_image/default.png";
                        if ($users[0]['profile_picture'] != "null" && $users[0]['profile_picture'] != "") {
                            $profile_img = base_url() . "attachments/profile_image/" . $users[0]['profile_picture'];
                        }
                    }
                    if ($receipts[0]['receipt_type_id'] == "2" || $receipts[0]['receipt_type_id'] == "5") {
                        $profile_img = base_url() . "attachments/sponsors_profile_image/default.png";
                        if ($sponsor_details[0]['profile_picture'] != "null" && $sponsor_details[0]['profile_picture'] != "") {
                            $profile_img = base_url() . "attachments/sponsors_profile_image/" . $sponsor_details[0]['id'] . "/" . $sponsor_details[0]['profile_picture'];
                        }
                    }
                    if ($receipts[0]['receipt_type_id'] == "3" || $receipts[0]['receipt_type_id'] == "4") {
                        $profile_img = base_url() . "attachments/scholar_profile_pictures/default.png";
                        if ($scholarship_details[0]['profile_picture'] != "null" && $scholarship_details[0]['profile_picture'] != "") {
                            $profile_img = base_url() . "attachments/scholar_profile_pictures/" . $scholarship_details[0]['id'] . "/" . $scholarship_details[0]['profile_picture'];
                        }
                    }
                    ?>
                    <img src="<?php echo $profile_img; ?>" class="kt-badge profile_img_popup pointer-div">
                </td>
                <td align="center">
                    <?php
                    if ($receipts[0]['receipt_type_id'] == "1") {
                        echo "Sponsors";
                    }
                    if ($receipts[0]['receipt_type_id'] == "2") {
                        echo "Donation";
                    }
                    if ($receipts[0]['receipt_type_id'] == "3") {
                        echo "Scholarship";
                    }
                    if ($receipts[0]['receipt_type_id'] == "4") {
                        echo "Repayment";
                    }
                    if ($receipts[0]['receipt_type_id'] == "5") {
                        echo "Zakaath";
                    }
                    ?>
                </td>
                <td align="right">
                    <?php echo date('d-M-Y', strtotime($receipts[0]['receipt_date'])); ?>
                </td>
                <td align="center">
                    <?php echo number_format($receipts[0]['amount'], 2, '.', ',') ?>
                </td>
            </tr>

        </tbody>
        <tfoot>

            <tr>
                <td colspan="5" align="left">
                    <span class="pdf-f">Remarks : </span>
                    <?php echo $receipts[0]['remarks']; ?>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
