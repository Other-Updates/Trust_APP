
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
        <td colspan="8" align="center"><b>Repayment Report</b></td>
    </tr>

    <tr style="background-color:#e6e6ff;">
        <td><b>#</b></td>
        <td><b>Application Number</b></td>
        <td><b>Student Name</b></td>
        <td><b>Application Date</b></td>
        <td><b>Course Completed Year</b></td>
        <td><b>Course Type</b></td>
        <td><b>Repayment Completed Year</b></td>
        <td><b>Repayment Amount</b></td>
        <td><b>Repayment Date</b></td>
    </tr>

    <tbody>
        <?php 
        $i=0;
        foreach($repayment_details as $repayment){
            $i++;
            ?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $repayment['application_number'];?></td>
            <td><?php echo $repayment['student_name'];?></td>
            <td><?php echo ($repayment['application_date']!=''&&$repayment['application_date']!='0000-00-00'?date('d-m-Y',strtotime($repayment['application_date'])):'-');?></td>
            <td><?php echo ($repayment['course_completed_year']!=''&&$repayment['course_completed_year']!='0000-00-00'?date('d-m-Y',strtotime($repayment['course_completed_year'])):'-');?></td>
            <td><?php echo $repayment['course_name'];?></td>
            <td><?php echo ($repayment['repayment_completed_year']!=''&&$repayment['repayment_completed_year']!='0000-00-00'?date('d-m-Y',strtotime($repayment['repayment_completed_year'])):'-');?></td>
            <td><?php echo $repayment['repayment_amount'];?></td>
            <td><?php echo ($repayment['repayment_date']!=''&&$repayment['repayment_date']!='0000-00-00'?date('d-m-Y',strtotime($repayment['repayment_date'])):'-');?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

