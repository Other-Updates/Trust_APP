
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
        <td colspan="7" align="center"><b>Loan Report</b></td>
    </tr>

    <tr style="background-color:#e6e6ff;">
        <td><b>#</b></td>
        <td><b>Application Number</b></td>
        <td><b>Name</b></td>
        <td><b>Acadamic Year</b></td>
        <td><b>App. Date</b></td>
        <td><b>Course Type</b></td>
        <td><b>Course Completed Yr</b></td>
        <td><b>Total Received Amount</b></td>
        <td><b>Repayment Completed Yr</b></td>
    </tr>

    <tbody>
        <?php 
        $i=0;
        foreach($loan_details as $loan){
            $i++;
            ?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $loan['application_number'];?></td>
            <td><?php echo $loan['student_name'];?></td>
            <td><?php echo ($loan['for_year']!=null &&$loan['for_year']!='0000-00-00' && $loan['for_year']!='1970-01-01')?date('d-m-Y',strtotime($loan['for_year'])):'-';?></td>
            <td><?php echo ($loan['application_date']!=''&&$loan['application_date']!='0000-00-00'?date('d-m-Y',strtotime($loan['application_date'])):'-');?></td>
            <td><?php echo $loan['course_type_name'];?></td>
            <td><?php echo ($loan['course_completed_year']!=''&&$loan['course_completed_year']!='0000-00-00'?date('d-m-Y',strtotime($loan['course_completed_year'])):'-');?></td>
            <td><?php echo $loan['received_amount'];?></td>
            <td><?php echo ($loan['repayment_completed_year']!=''&&$loan['repayment_completed_year']!='0000-00-00'?date('d-m-Y',strtotime($loan['repayment_completed_year'])):'-');?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

