<?php
/**
 * Custom country management module from admin section
 * 
 * @author Somak Kanjilal
 * @date 26/06/2013
 */
session_start();
error_reporting(false);
include('include/connect.php');

$customCountryListingRS = mysql_query("SELECT * FROM lm_custom_country ORDER BY c_country_name");

if(isset($_GET['mode']) && $_GET['mode']=='delete'){
    if(isset($_GET['cid']) && !empty($_GET['cid'])){
        $c_country_id = addslashes(trim($_GET['cid']));
        $deleteQuery = "DELETE FROM lm_custom_country WHERE c_country_id = $c_country_id";
        mysql_query($deleteQuery);
        if(mysql_affected_rows()>0){
            header('location:'.$_SERVER['PHP_SELF']);
        }
        
    }
}
if(isset($_POST['page_action']) && $_POST['page_action']=='ajax_edit') {
    $c_country_name = trim($_POST['c_country_name']);
    
    $c_country_id = 0;
    
    $c_country_id = trim($_POST['c_country_id']);
    
    if(empty($c_country_name)){
        echo $msg ='Please provide country name';
        exit();
    }
    else{
        $c_country_name = addslashes(strip_tags($c_country_name));
        
        $c_country_name = mysql_real_escape_string($c_country_name);
        
        $updateSQL = "UPDATE lm_custom_country SET c_country_name='".$c_country_name."' WHERE c_country_id = ".$c_country_id;
        
        $updateRS = mysql_query($updateSQL)or die(mysql_error());
        
        if(mysql_affected_rows()<=0)
            $msg = 'Sorry unable to update';
        
    }
    
    if(!empty($msg))
        echo $msg;
    
    exit();
    
}
include('include/adminheader.php');
?>

<h2>Country Management</h2> 
<div style="text-align:right; margin-bottom:5px;">
    <input type="button" name="button" value=" Add " class="buttn" onclick="location.href='AddCustomCountry.php';" /></div>
<div class="wht-bg">
    <div align="center">&nbsp;
        <?php 
            if(isset($_SESSION['flash_msg']) && $_SESSION['flash_msg']=='inserted'){
                echo '<span style="color:green">Country added successfully</span>';
                $_SESSION['flash_msg']='';
                unset($_SESSION['flash_msg']);
            }
        ?>
    </div> 
    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #6d6d6d;">
        <tr>
            <td align="left" valign="middle" class="td-hd">Country Name</td>
            <td align="left" valign="middle" class="td-hd">Created On</td>
            <td align="left" valign="middle" class="td-hd">Action</td>
        </tr>
        <?
        if(mysql_num_rows($customCountryListingRS)>0){
            while ($countryRow = mysql_fetch_array($customCountryListingRS)) {
                ?>
                <tr>
                    <td align="left" valign="middle" class="td-bor1">
                        <span id="editBox_<?php echo $countryRow['c_country_id'];?>"><?php echo $countryRow['c_country_name'];?></span>
                    </td>
                    <td align="left" valign="middle" class="td-bor1"><?php echo date('d/m/Y', strtotime($countryRow['created_date']));?></td>
                    <td align="left" valign="middle" class="td-bor1">
                        <a class="edit" onclick="editBox(<?php echo $countryRow['c_country_id'];?>);">Edit</a> |
                        <a class="edit" onclick="deleteitem(<?php echo $countryRow['c_country_id'];?>);">Delete</a>
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
        window.location.href="CustomCountryListing.php?mode=delete&cid="+deleteId;        
        return true;
    }
    else
        return false;
}  
    
function editBox(recordId){
    countryName = $("#editBox_"+recordId).html();
    $("#editBox_"+recordId).html('');
    $("#editBox_"+recordId).html('<input type="text" id="c_country_name_'+recordId+'" name="c_country_name" value="'+countryName+'">');
   // $("#editBox_"+recordId).html('<input type="text" idname="c_country_name" value="'+countryName+'">');
    $("#editBox_"+recordId).append('&nbsp;&nbsp;<span style="background:#E5E5E5;padding:5px;" onclick="inlineEdit('+recordId+')">Ok</span>');
}

function inlineEdit(recordId){
    var idOfRecord = "c_country_name_"+recordId;
    var valueOfRecord = $("#"+idOfRecord).val();
    $.ajax({
        url: "",
        type: "POST",
        data: {page_action : 'ajax_edit', c_country_name : valueOfRecord, c_country_id : recordId},
        dataType: "html",
        success: function(msg) {
            if(msg==''){           
                var htmlString = valueOfRecord              
                $("#editBox_"+recordId).html('');
                $("#editBox_"+recordId).html(htmlString);
                alert('Successfully updated');
            } 
            else
                alert(msg);
        }
    });
    
    
}
</script>
 
<?php include('include/adminfooter.php'); ?>