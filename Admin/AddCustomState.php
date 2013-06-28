<?php
/**
 * Custom State management module from admin section
 * 
 * @author Somak Kanjilal
 * @date 26/06/2013
 */
session_start();
error_reporting(E_ALL);

include('include/connect.php');

$customCountryListingRS = mysql_query("SELECT * FROM lm_custom_country ORDER BY c_country_name")or die(mysql_error());


$msg='';
if(isset($_POST['page_action'])){
     
    if(isset($_POST['c_state_name'])) {
        $c_state_name = trim($_POST['c_state_name']);
        
        $c_country_id = trim($_POST['c_country_id']);
        
        if(empty($c_state_name)){
            $msg ='<div style="color:red;padding:2px;margin:2px;">Please provide state name</div>';
        }
        else {
            $c_state_name = addslashes(strip_tags($c_state_name));
            
            $c_state_name = mysql_real_escape_string($c_state_name);
            
            $c_country_id = mysql_real_escape_string($c_country_id);
                          
            $insertSQL = "INSERT INTO lm_custom_state (c_country_id, c_state_name) VALUES('".$c_country_id."','".$c_state_name."')";
            
            $insertQuery = mysql_query($insertSQL)or die(mysql_error());
            
            $insertedId = mysql_insert_id();
            if($insertedId>0){
                $_SESSION['flash_msg'] = 'inserted';
                header('location:CustomStateListing.php');
                exit();
            }
             
            
        }//end of first else
    }
}
include('include/adminheader.php');
?>

<h2>Add State</h2> 
<?php
    if(mysql_num_rows($customCountryListingRS)<=0){ ?>
    <div class="wht-bg">   
    <div style="text-align:right; margin-bottom:5px;"> 
       Please add any country frome here - <input type="button" name="button" value="Add Country" class="buttn" onclick="location.href='CustomCountryListing.php';" />
       </div>
    </div>
<?php
    }else{
?>
<div style="text-align:right; margin-bottom:5px;">
    <input type="button" name="button" value="Back To Listing" class="buttn" onclick="location.href='CustomStateListing.php';" />
</div>
<div class="wht-bg">
    
    <form action="" method="POST" name="frmAddState">
        <input type="hidden" name="page_action" value="add" />
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
            <tr>
                <td colspan="2" align="center">&nbsp;<?php echo $msg;?></td>
                
            </tr>
            
            <tr>
                <td>Country Name :</td>
                <td>
                      
                    <select name="c_country_id" id="c_country_id" style="width:145px;">                         
                        <?php
                        while ($countryRow = mysql_fetch_array($customCountryListingRS)) { ?>
                            <option value="<?php echo $countryRow['c_country_id']?>">
                                <?php echo $countryRow['c_country_name'];?>
                            </option>
                        <?php 
                        }
                        ?>                        
                    </select>
                </td>
            </tr>
            
            <tr>
                <td>State Name :</td>
                <td><input type="text" name="c_state_name" value="<?php if(isset($_POST['c_state_name'])) echo stripslashes($_POST['c_state_name']);else echo '';?>" ></td>
            </tr>
            <tr>
                <td style="padding:10px 0px;">
                   <input type="submit" name="submit" value="Add" class="buttn">&nbsp;&nbsp;&nbsp; 
                   <input type="button" name="cancel" value="Cancel" class="buttn" onclick="location.href='CustomStateListing.php';" />
                </td>
            </tr>
        </table>
    </form>
</div>
<?php
    }
?>
 
<?php include('include/adminfooter.php'); ?>