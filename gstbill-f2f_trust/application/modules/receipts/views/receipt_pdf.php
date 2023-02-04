

<?php

$theme_path = $this->config->item('theme_locations') . 'esms';

//echo $theme_path;

?>

<style type="text/css">



    table {border-collapse:collapse; width:100%; font-size:7px }

    table tr th{ text-align:center; border:1px solid #ddd; padding:5px 5px 5px 5px; vertical-align:middle;}

    table tr td { text-align:center; border:1px solid #ddd; padding:5px 5px 5px 5px; vertical-align:middle;}

    .pdf-f{font-weight:bold}

    .tblhead td{text-align:center;}
	
	.footer {position: fixed !important;bottom: 0 !important;font-size:7px !important; }

</style>

<div class="kt-grid__item kt-grid__item--fluid kt-app__content pdf-mar"  id="edit_receipt_div" ng-app="edit_receipt_app" ng-controller="edit_receipt_controller" ng-init="pageLoad()" ng-cloak>



    <table style="padding: 2px 2px;" row-style="page-break-inside:avoid;">



        <tr>

            <td colspan="5" align="center"><b>RECEIPT DETAILS</b></td>

        </tr>

        <tr>

            <td colspan="2" align="left">

                <b>Receipt No:</b> <?php echo $receipts[0]['receipt_no']; ?>

            </td>

            <td colspan="3" align="right">

                <b>Receipt Date:</b> <?php

                $receipt_date_split = explode("-", $receipts[0]['receipt_date']);

                echo $receipt_date_split[2] . "/" . $receipt_date_split[1] . "/" . $receipt_date_split[0];

                //echo $receipts[0]['receipt_date'];

                ?>

            </td>

        </tr>

        <tr align="center" class="tblhead" style="background-color:#e6e6ff;">
            <td width="20%"><b>Application Number</b></td>
            <td width="20%"><b>Name</b></td>

            <!--<td width="20%"><b>Profile Image</b></td>-->

            <td width ="20%"><b>Receipt For</b></td>

            <td width ="20%"><b>For Year</b></td>

            <td width ="20%"><b>Amount</b></td>

        </tr>

        <tbody>



            <tr>
                <td align="center">
                    <?php echo ($receipts[0]['receipt_type_id'] == 3) ? $scholarship_details[0]['scholarship_id'] : '-';?>
                </td>

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

                <td align="center">

                    <?php

                    if ($receipts[0]['receipt_type_id'] == "1") {

                        echo "Subscription";

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

                <td align="center">

                    <?php

                    if ($receipts[0]['for_year'] != '0000-00-00' && $receipts[0]['for_year'] != '') {

                        echo date('d-M-Y', strtotime($receipts[0]['for_year']));

                    } else {

                        echo "-";

                    }

                    //echo date('d-M-Y', strtotime($receipts[0]['receipt_date']));

                    ?>

                </td>

                <td align="right">

                    <?php echo number_format($receipts[0]['amount'], 2, '.', ',') ?>

                </td>

            </tr>



        </tbody>

        <tfoot>



            <tr>

                <td colspan="5" align="left">

                    <span class="pdf-f">Remarks : </span>

                    <?php echo ($receipts[0]['remarks'] !='undefined') ? $receipts[0]['remarks'] : '-'; ?>

                </td>

            </tr>

        </tfoot>

    </table>

</div>
<table width="100%" class="footer"><tbody><tr><td>This is computer generated receipt no signature required</td></tr></tbody></table>

