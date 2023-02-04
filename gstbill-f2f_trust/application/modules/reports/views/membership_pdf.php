
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
        <td colspan="10" align="center"><b>Membership Report</b></td>
    </tr>

    <tr style="background-color:#e6e6ff;">
        <td><b>#</b></td>
        <td><b>Name</b></td>
        <td><b>Member Type</b></td>
        <td><b>Type Of Membership</b></td>
      <!--  <td><b>Position</b></td> -->
      <td><b>Member Since</b></td>
        <td><b>Country</b></td>
        <td><b>Email ID</b></td>
        <td><b>Mobile Number</b></td>
        <td><b>Last Subscription Year</b></td>
        <td><b>Status</b></td>
    </tr>

    <tbody>
        <?php $i=0;
        foreach($membership_details as $membership){
            $i++;
            $status=$membership['status']=='1'?'Active':($membership['status']=='2'?'Died':'In Active');
            $member_since = '-';
            if($membership['member_since'] && $membership['member_since'] != null && $membership['member_since'] != '0000-00-00'){
                $member_since = date('d/m/Y',strtotime($membership['member_since']));
            }
            ?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $membership['name'];?></td>
            <td><?php echo $membership['member_type_name'];?></td>
            <td><?php echo $membership['type_of_membership'];?></td>
           <!-- <td><?php echo $membership['position_name'];?></td> -->
           <td><?php echo $member_since;?></td> 
            <td><?php echo $membership['countries_name'];?></td>
            <td><?php echo $membership['email'];?></td>
            <td><?php echo $membership['mobile_number'];?></td>
            <td><?php echo ($membership['last_subscription_year']!=''&&$membership['last_subscription_year']!='0000-00-00'?date('d-m-Y',strtotime($membership['last_subscription_year'])):'-');?></td>
            <td><?php echo $status;?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

