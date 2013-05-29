<?php
include('include/adminheader.php');
include('include/connect.php');

$proposal_id = $_REQUEST['id'];

$bid_sql = "SELECT * FROM `proposal` pr
left join lm_professionaldetail_tbl pf on pr.proposed_by = pf.ProfessionalId
left join project_details pd on pr.project_id = pd.project_id
left join lm_clientdetail_tbl cd on pd.post_by = cd.ClientId
where pr.proposal_id= '" . $proposal_id . "'";

$bis_qry = @mysql_query($bid_sql);
$nr_bid_qry = @mysql_num_rows($bis_qry);
?><h2>Proposal Details </h2> 
<div class="wht-bg" style="min-height: 400px;">

    <?php
    if ($nr_bid_qry <> 0) {
        while ($f_proposal = @mysql_fetch_array($bis_qry)) {
            ?>
            <table width="80%" cellspacing="0" cellpadding="0" border="0" align="center">
                <tr class="<?php echo $cls; ?>">
                    <td width="20%" align="right"></td>
                    <td width="3%" align="center">&nbsp;</td>
                    <td width="77%"></td>
                </tr>
                <tr class="<?php echo $cls2; ?>" height="5"><td colspan="3"></td></tr>
                <tr class="<?php echo $cls; ?>">
                    <td width="20%" align="right">Project Name</td>
                    <td width="3%" align="center">:</td>
                    <td width="77%"><?php echo $f_proposal['project_name']; ?></td>
                </tr>
                <tr class="<?php echo $cls2; ?>" height="5"><td colspan="3"></td></tr>
                <tr class="<?php echo $cls; ?>">
                    <td width="20%" align="right">Client Name</td>
                    <td width="3%" align="center">:</td>
                    <td width="77%"><?php echo $f_proposal['ClientFirstname'] . " " . $f_proposal['ClientLastname']; ?></td>
                </tr>
                <tr class="<?php echo $cls2; ?>" height="5"><td colspan="3"></td></tr>
                <tr class="<?php echo $cls; ?>">
                    <td width="20%" align="right">Proposal by</td>
                    <td width="3%" align="center">:</td>
                    <td width="77%">
        <?php echo $f_proposal['ProfessionalFirstname'] . " " . $f_proposal['ProfessionalLastname']; ?>
                        on <?php echo date('Y-m-d', strtotime($f_proposal['proposed_date'])); ?>
                    </td>
                </tr>
                <tr class="<?php echo $cls2; ?>" height="5"><td colspan="3"></td></tr>
                <tr class="<?php echo $cls; ?>">
                    <td width="20%" align="right">Proposed price</td>
                    <td width="3%" align="center">:</td>
                    <td width="77%"><?php echo $f_proposal['price']; ?> USD</td>
                </tr>
                <tr class="<?php echo $cls2; ?>" height="5"><td colspan="3"></td></tr>
                <tr class="<?php echo $cls; ?>">
                    <td width="20%" align="right">Proposal Description</td>
                    <td width="3%" align="center">:</td>
                    <td width="77%"><?php echo $f_proposal['project_name']; ?></td>
                </tr>
                <tr class="<?php echo $cls2; ?>" height="5"><td colspan="3"></td></tr>
                <tr class="<?php echo $cls; ?>">
                    <td width="20%" align="right">Attachment</td>
                    <td width="3%" align="center">:</td>
                    <td width="77%"><?php echo $f_proposal['project_name']; ?></td>
                </tr>
                <tr class="<?php echo $cls2; ?>" height="5"><td colspan="3"></td></tr>
                <tr class="<?php echo $cls; ?>">
                    <td width="20%" align="right">Delivery date</td>
                    <td width="3%" align="center">:</td>
                    <td width="77%"><?php echo date('Y-m-d', strtotime($f_proposal['dalivery_date'])); ?></td>
                </tr>
                <tr class="<?php echo $cls2; ?>" height="5"><td colspan="3"></td></tr>               
                <tr class="<?php echo $cls; ?>">
                    <td width="20%" align="right"></td>
                    <td width="3%" align="center"></td>
                    <td width="77%"><input type="button" name="button_name1" id="button_name1" onclick="window.location.href = 'PostedProjects.php'" value="Back" ></td>
                </tr>
                <tr class="<?php echo $cls2; ?>" height="5"><td colspan="3"></td></tr>               
            </table>
        <?php
        }
    } else {
        echo 'Proposal Not found';
        ?><input type="button" name="button_name1" id="button_name1" onclick="window.location.href = 'PostedProjects.php'" value="Back" ><?php
}
    ?>
</div>

<? mysql_close($connect); ?>
<? include('include/adminfooter.php'); ?>