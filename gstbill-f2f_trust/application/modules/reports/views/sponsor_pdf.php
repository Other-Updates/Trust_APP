
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
        <td colspan="9" align="center"><b>Sponsor Report</b></td>
    </tr>

    <tr style="background-color:#e6e6ff;">
        <td><b>#</b></td>
        <td><b>Sponser Name</b></td>
        <td><b>Mobile Number</b></td>
        <td><b>Email ID</b></td>
        <td><b>Country</b></td>
        <td><b>Overall Amount Due</b></td>
        <td><b>Last Commitment Year</b></td>
        <td><b>Last Commitment Amount</b></td>
        <td><b>Commitment Due For</b></td>
        <td><b>Commitment Due Amount</b></td>
    </tr>

    <tbody>
        <?php
        $i=0;
         foreach($sponsor_details as $sponsor){
             $i++;
        ?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $sponsor['sponsor_name'];?></td>
            <td><?php echo $sponsor['mobile_no'];?></td>
            <td><?php echo $sponsor['email'];?></td>
            <td><?php echo $sponsor['countries_name'];?></td>
            <td><?php echo $sponsor['sponsor_full_amount'];?></td>
            <td><?php echo ($sponsor['last_commitment_year']!='No Commitments'?date('d-m-Y',strtotime($sponsor['last_commitment_year'])):$sponsor['last_commitment_year']);?></td>
            <td><?php echo $sponsor['last_commitment_amount'];?></td>
            <td><?php echo $sponsor['commitment_due_for'];?></td>
            <td><?php echo $sponsor['commitment_due_amount'];?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

