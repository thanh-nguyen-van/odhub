<?php
include('include/connect.php');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$sql = "SELECT * FROM `proposal` pr
left join lm_professionaldetail_tbl pf on pr.proposed_by = pf.ProfessionalId
left join project_details pd on pr.project_id = pd.project_id
left join lm_clientdetail_tbl cd on pd.post_by = cd.ClientId
where pr.project_id= '" . $_REQUEST['project_id'] . "'";

$qry = @mysql_query($sql);
$nr = @mysql_num_rows($qry);

if ($nr > 0) {
    ?>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #6d6d6d;">
        <tr>
            <td align="left" valign="middle" class="td-hd">No</td>
            <td align="left" valign="middle" class="td-hd">Project Name</td>
            <td align="left" valign="middle" class="td-hd">Client Name</td>
            <td align="left" valign="middle" class="td-hd">Professional</td>
            <td align="left" valign="middle" class="td-hd">Proposed Date</td>
            <td align="left" valign="middle" class="td-hd">Delivery date</td>
            <td align="left" valign="middle" class="td-hd">Action</td>
        </tr>
        <?php
        $i = 0;
        while ($f_sql = @mysql_fetch_array($qry)) {
            ?>
            <tr>
                <td align="left" valign="middle" class="td-hd"><?php echo++$i; ?></td>
                <td align="left" valign="middle" class="td-hd"><?php echo $f_sql['project_name']; ?></td>
                <td align="left" valign="middle" class="td-hd"><?php if ($f_sql['ClientFirstname'] != '' && $f_sql['ClientLastname'] != '') {
            echo $f_sql['ClientFirstname'] . " " . $f_sql['ClientLastname'];
        } else {
            $f_sql['ClientUsername'];
        } ?></td>
                <td align="left" valign="middle" class="td-hd"><?php echo $f_sql['ProfessionalFirstname'] . " " . $f_sql['ProfessionalLastname']; ?></td>
                <td align="left" valign="middle" class="td-hd"><?php echo date('Y-m-d', strtotime($f_sql['proposed_date'])); ?></td>
                <td align="left" valign="middle" class="td-hd"><?php echo date('Y-m-d', strtotime($f_sql['dalivery_date'])); ?></td>
                <td align="left" valign="middle" class="td-hd"><a href="view_bid.php?id=<?php echo $f_sql['proposal_id']; ?>"> View </a></td>
            </tr>
        <?php
    }
    ?>
    </table>
    <?php
} else {
    echo "No Bid Found";
}
?>
