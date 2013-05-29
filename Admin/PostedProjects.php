<?php
include('include/adminheader.php');
include('include/connect.php');

if (isset($_REQUEST['caseid'])) {
    $caseid = $_REQUEST['caseid'];
    if ($caseid != "") {
        //$delete_query="UPDATE ".$table['case']." SET CaseStatus=5 WHERE CaseId=$caseid";
        $new_status = 'D';

        if ($_REQUEST['action_type'] == 'Activate') {
            $new_status = 'A';
        } else {
            $new_status = 'D';
        }
        $delete_query = "UPDATE `project_details` SET project_status='$new_status' WHERE `project_id`=$caseid";


        $delete_result = mysql_query($delete_query);
        ?><meta http-equiv="REFRESH" content="0;url=PostedProjects.php"><?php
    }
}

$project_query = "select `p_d`.`project_id`,`p_d`.`project_name`,`p_d`.`post_by`,(select count(*) from `proposal` `p` where `p`.`project_id` = `p_d`.`project_id`) `bids`,
date_format(`p_d`.`post_date`,'%Y-%m-%d') `post_date`,if(`p_d`.`project_status`='A','Active',if(`p_d`.`project_status`='I','Inactive','Deleted')) `status`,concat(`l_c_t`.`ClientFirstname`,' ',`l_c_t`.`ClientLastname`) `fullname`
from `project_details` `p_d` left join `lm_clientdetail_tbl` `l_c_t` on `l_c_t`.`ClientId` = `p_d`.`post_by`  group by `p_d`.`project_id` order by `post_date` desc;";



//$project_query="SELECT * FROM ".$table['case']." AS C, ".$table['clientdetail']." AS Cd, ".$table['casestatus']." AS Cs WHERE C.CaseClientId=Cd.ClientId And C.CaseStatus=Cs.StatusValue AND (Cs.StatusValue=1 OR Cs.StatusValue=2) ORDER BY CaseTitle  ";
$project_result = mysql_query($project_query);
$i = 1;
?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script language="javascript" type="text/javascript">
    $(function() {
        $("#dialog").dialog({
            autoOpen: false,
            width: "1000px",
            show: {
                effect: "blind",
                duration: 1000
            },
            hide: {
                effect: "explode",
                duration: 1000
            },
        });

        $(".opener").click(function() {
            var projectId = $(this).attr("alt");
            $("#project_id").val(projectId);
            $.ajax({
                url: "fetch_bid.php",
                type: "post",
                data: "project_id=" + projectId,
                success: function(data) {
                    //alert(data); 
                    $("#dialog").html(data);
                    $("#dialog").dialog("open");

                },
                error: function() {
                    alert("failure");
                    $("#result").html('there is error while submit');
                }
            });


        });
    });
</script>
<h2>Posted Projects</h2>

<div class="wht-bg">
    <div id="dialog" title="Bid Details" ></div>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #6d6d6d;">
        <tr>
            <td align="left" valign="middle" class="td-hd">No</td>
            <td align="left" valign="middle" class="td-hd">Project Name</td>
            <td align="left" valign="middle" class="td-hd">Clientname</td>
            <td align="left" valign="middle" class="td-hd">Bids</td>
            <td align="left" valign="middle" class="td-hd">Expiry Date</td>
            <td align="left" valign="middle" class="td-hd">Status</td>
            <td align="left" valign="middle" class="td-hd">Action</td>
        </tr>
        <?php
        while ($rproject = mysql_fetch_array($project_result)) {
            $action_2nd = ($rproject['status'] == 'Deleted') ? "Activate" : "Deactivate";
            ?>
            <tr>
                <td align="left" valign="middle" class="td-bor1"><? echo $i++; ?>.</td>
                <td align="left" valign="middle" class="td-bor1"><a href="<? echo $siteURL; ?>/CaseDetail.php?caseid=<? echo $rproject['project_id']; ?>" target="_blank"><? echo $rproject['project_name']; ?></a></td>
                <td align="left" valign="middle" class="td-bor1"><? echo $rproject['fullname']; ?></td>
                <td align="left" valign="middle" class="td-bor1">
                    <a href="#" class="opener" alt="<? echo $rproject['project_id']; ?>"> <?php echo $rproject['bids']; ?> </a>

                </td>
                <td align="left" valign="middle" class="td-bor1"><? echo $rproject['post_date']; ?></td>
                <td align="left" valign="middle" class="td-bor1"><?php if ($rproject['status'] == 'Deleted')
            echo"<font color='#FF0000'>Inactive</font>";
        else
            echo "<font color='#006C00'>" . $rproject['status'] . "</font>";
        ?></td>
                <td align="left" valign="middle" class="td-bor1">
                    <a href="CaseEdit.php?caseid=<?php echo $rproject['project_id']; ?>" class="edit">Edit</a> | 
                    <a href="PostedProjects.php?caseid=<?php echo $rproject['project_id']; ?>&action_type=<?php echo $action_2nd; ?>"
                       onclick="return confirm('Are you sure you  wanna to <?= $action_2nd ?>  it?')" class="edit"><?= $action_2nd ?></a></td>
            </tr>
    <?
}
?>
    </table>
    <input type="hidden" name="project_id" id="project_id" value="">
</div>

<? mysql_close($connect); ?>
<? include('include/adminfooter.php'); ?>