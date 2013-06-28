<?php
/**
 * Custom state management module from admin section
 * 
 * @author Somak Kanjilal
 * @date 26/06/2013
 */
session_start();
error_reporting(false);
include('include/connect.php');

$customStateListingRS = mysql_query("SELECT * FROM lm_custom_state ORDER BY c_state_name");
require('include/utility_functions.php');

if(isset($_GET['mode']) && $_GET['mode']=='delete'){
    if(isset($_GET['sid']) && !empty($_GET['sid'])){
        $c_state_id = addslashes(trim($_GET['sid']));
        $deleteQuery = "DELETE FROM lm_custom_state WHERE c_state_id = $c_state_id";
        mysql_query($deleteQuery);
        if(mysql_affected_rows()>0){
            header('location:'.$_SERVER['PHP_SELF']);
        }
        
    }
}


include('include/adminheader.php');
?>

<h2>State Management</h2> 
<div style="text-align:right; margin-bottom:5px;">
    <input type="button" name="button" value=" Add " class="buttn" onclick="location.href='AddCustomState.php';" /></div>
<div class="wht-bg">
    <div align="center">&nbsp;
        <?php 
            if(isset($_SESSION['flash_msg']) && $_SESSION['flash_msg']=='inserted'){
                echo '<span style="color:green">State added successfully</span>';
                $_SESSION['flash_msg']='';
                unset($_SESSION['flash_msg']);
            }
            if(isset($_SESSION['flash_msg']) && $_SESSION['flash_msg']=='updated'){
                echo '<span style="color:green">State modified successfully</span>';
                $_SESSION['flash_msg']='';
                unset($_SESSION['flash_msg']);
            }
        ?>
    </div> 
    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #6d6d6d;">
        <tr>
            <td align="left" valign="middle" class="td-hd">State Name</td>
            <td align="left" valign="middle" class="td-hd">Country</td>
            <td align="left" valign="middle" class="td-hd">Created On</td>
            <td align="left" valign="middle" class="td-hd">Action</td>
        </tr>
        <?
        if(mysql_num_rows($customStateListingRS)>0){
            while ($stateRow = mysql_fetch_array($customStateListingRS)) {
                ?>
                <tr>
                    <td align="left" valign="middle" class="td-bor1">
                        <?php echo $stateRow['c_state_name'];?> 
                    </td>
                    <td align="left" valign="middle" class="td-bor1">
                        <?php 
                        $recordarr = getCountryNameById($stateRow['c_country_id']);
                        echo $recordarr['c_country_name'];
                        ?> 
                    </td>
                    <td align="left" valign="middle" class="td-bor1"><?php echo date('d/m/Y', strtotime($stateRow['created_date']));?></td>
                    <td align="left" valign="middle" class="td-bor1">
                        <a class="edit" onclick="window.location.href='EditCustomState.php?sid=<?php echo $stateRow['c_state_id'];?>'">Edit</a> |
                        <a class="edit" onclick="deleteitem(<?php echo $stateRow['c_state_id'];?>);">Delete</a>
                   </td>
                </tr>                
                <?php
            }
        }
        else{
            echo '<tr><td align="left" valign="middle" class="td-bor1">No records found</td></tr>';            
        }
        ?>
    </table>
</div>
<script>
function deleteitem(deleteId){
    
    var ans = confirm('Are you sure to delete the record ?');
    if(ans){
        window.location.href="CustomStateListing.php?mode=delete&sid="+deleteId;        
        return true;
    }
    else
        return false;
}  
</script>
 
<?php include('include/adminfooter.php'); ?>

