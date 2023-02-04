
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
        <td colspan="7" align="center"><b>Subscription Report</b></td>
    </tr>

    <tr style="background-color:#e6e6ff;">
        <td><b>#</b></td>
        <td><b>Name</b></td>
        <td><b>Member Type</b></td>
        <td><b>Country</b></td>
        <td><b>Last Subscription Date</b></td>
        <td><b>Last Subscription Amount</b></td>
        <td><b>Subscription Due</b></td>
    </tr>

    <tbody>
        <?php $i=0;
        foreach($subscription_details as $subscription){
               $last_subscription_year = ($subscription['last_subscription_year'] != '') ? date('d/m/Y',strtotime($subscription['last_subscription_year'])) : '-';
               if($subscription['last_subscription_year'] == '' && $subscription['last_subscription_amount'] == '-'){
                   $last_due=$subscription['member_since'];
               }else{
                    $last_due=$subscription['last_subscription_year'];
               }
               if($last_due && $last_due != '0000-00-00'){
                    $split_date = explode('-',$last_due);
                    $converted_date =$split_date[0];
                    $current_year = date('Y');
                    if($current_year == $converted_date){
                        $due =  'No Due';
                    }else{
                        $due = $current_year - $converted_date; 
                        if($due > 1)
                            $due =  $due." Years";
                        else
                        $due =  $due. " Year";
                    }
                }else{
                    $due = 'No Due';
                }
            $i++;?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $subscription['name'];?></td>
            <td><?php echo $subscription['member_type_name'];?></td>
            <td><?php echo $subscription['countries_name'];?></td>
            <td><?php echo $last_subscription_year;?></td>
            <td><?php echo ($subscription['last_subscription_amount'] !='') ? $subscription['last_subscription_amount'] : '-';?></td>
            <td><?php echo $due;?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

