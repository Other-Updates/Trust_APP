
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
</style>
<table style="padding: 2px 2px;" row-style="page-break-inside:avoid;">
    <tr>
        <td colspan="6" align="center"><b>Loan And Repayment Summary Report</b></td>
    </tr>
    <tr>
        <td colspan="2"><b>Total Loan Amount</b></td>
        <td><?php echo $total[0]['scholarshipTotal'];?></td>
        <td colspan="2"><b>Total Repayment Amount</b></td>
        <td><?php echo $total[0]['repaymentTotal'];?></td>
    </tr>
</table>
<table style="padding: 2px 2px;" row-style="page-break-inside:avoid;">
    <tr style="background-color:#e6e6ff;">
        <td><b>#</b></td>
        <td><b>Year</b></td>
        <td><b>Total Loan Amount</b></td>
        <td><b>No Of Application</b></td>
        <td><b>Total Repayment Amount</b></td>
        <td><b>No Of Repayment Application</b></td>
    </tr>

    <tbody>
        <?php 
        $i=0;
        foreach($loan_and_repayment_details as $data){ 
            $i++;
        ?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $data['receipt_year'];?></td>
            <td><?php echo $data['scholarshipTotal'];?></td>
            <td><?php echo $data['no_of_application'];?></td>
            <td><?php echo $data['repaymentTotal'];?></td>
            <td><?php echo $data['no_of_repayment_application'];?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

