<?php

include('include/adminheader.php');
include('include/connect.php');

$lawyerid=$_REQUEST['lawyerid'];


                  


if(isset($_REQUEST['update'])=='Update'){
    $str_arr = array();
    //DebugBreak();
    foreach($_REQUEST as $key=>$val){
        if($key!='lawyerid' && $key!='update'){
			if($key=='ProfessionalJoindate')
				$str = "`".$key."`='".date("Y-m-d H:i:s", strtotime($val))."'";
            elseif($key == 'professional_skill'){
             $professional_skill = $_REQUEST['professional_skill'];   
             $sql_delete_skill = "delete from `professional_skill_map` where `professional_id` = '".$lawyerid."'";
             mysql_query($sql_delete_skill);
             
             foreach($professional_skill as $val){
                 $sql_insert_skill = "insert into `professional_skill_map` set `professional_id`='".$lawyerid."',`skill_id`='".$val."'";
                 mysql_query($sql_insert_skill);    
             }   
            }    
			else
          		$str = "`".$key."`='".$val."'";
          array_push($str_arr,$str);  
        }
    }   
   
   $update_str = implode(',',$str_arr);
   $update_sql = "update `".$table['professional_detail']."` set ".$update_str." where `ProfessionalId`='".$lawyerid."'";
   mysql_query($update_sql);   
    
}





if($lawyerid!="")
{
       $get_professional = "select * from `".$table['professional_detail']."` where `ProfessionalId`='$lawyerid'";
       $data = mysql_query($get_professional); 
       $data_arr = mysql_fetch_assoc($data);
}                        



//print_r($data_arr);

?>
<h2>Update Professional</h2>
<div class="wht-bg">
<form action="" name="form1" id="form1" method="post">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
    <?php
        foreach($data_arr as $key=>$val){
            if($key != 'ProfessionalId' && $key != 'referral_code' && $key != 'p_user'){
    ?>

    <tr>
      <?php if($key == 'ProfessionalJoindate'){ ?>
      <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
	  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
      <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
      <link rel="stylesheet" href="/resources/demos/style.css" />
      <script>
      $(function() {
      $( "#<?=$key?>" ).datepicker();
      });
      </script> 
      <td><?=substr($key,12)?></td>
      <td><input type="text" name="<?=$key?>" id="<?=$key?>" value="<?php echo date("m/d/Y", strtotime($val))?>" size="50"></td>
	  <?php }elseif($key == 'ProfessionalState'){ ?>
      <td><?=substr($key,12)?></td>
      <td>
        <select name="<?=$key?>" id="<?=$key?>">
            <option value="">--Select State--</option>
            <?php
                $state_query="SELECT * FROM ".$table['state']." ";
                $state_result=mysql_query($state_query);
                while($rs=mysql_fetch_array($state_result))
                {
                 ?><option value="<?=$rs['StateId']?>"<?php if($val==$rs['StateId']){echo "selected";}?>><?=$rs['StateName']?></option><?
                }
            ?>
        </select>
        </td>
	  <?php }elseif($key == 'ProfessionalCountry'){ ?>
      <td><?=substr($key,12)?></td>
      <td>
        <select name="<?=$key?>" id="<?=$key?>">
          <option value="">--Select--</option>
          <option value="USA" <?php if($val=="USA"){echo "selected";}?>>USA</option>
          <option value="Canada" <?php if($val=="Canada"){echo "selected";}?>>Canada</option>            
        </select>
        </td>
	  <?php }elseif($key == 's_professional_type_id'){ ?>
      <td>Type</td>
      <td>
        <select name="<?=$key?>" id="<?=$key?>">
          <option value="">--Select Type--</option>
          <?php
            $type_query  = "SELECT * FROM `s_professional_type`";
            $type_result = mysql_query($type_query);
            while($rs = mysql_fetch_array($type_result))
            {
             ?><option value="<?=$rs['s_professional_type_id']?>"<?php if($val==$rs['s_professional_type_id']){echo "selected";}?>><?=$rs['s_professional_type_val']?></option><?
            }
          ?>
        </select>
        </td>
	  <?php }elseif($key == 's_professional_looking_status_id'){ ?>
      <td>Looking Status</td>
      <td>
        <select name="<?=$key?>" id="<?=$key?>">
          <option value="">--Select Status--</option>
          <?php
            $status_query  = "SELECT * FROM `s_professional_looking_status`";
            $status_result = mysql_query($status_query);
            while($rs = mysql_fetch_array($status_result))
            {
             ?>
             <option value="<?=$rs['s_professional_looking_status_id']?>"<?php if($val==$rs['s_professional_looking_status_id']){echo "selected";}?>>
			  <?=$rs['s_professional_looking_status_val']?>
             </option>
			 <?
            }
          ?>
        </select>
        </td>
	  <?php }elseif($key == 's_professional_coaching_focus_id'){ ?>
      <td>Coaching Focus</td>
      <td>
        <select name="<?=$key?>" id="<?=$key?>">
          <option value="">--Select Focus--</option>
          <?php
            $status_query  = "SELECT * FROM `s_professional_coaching_focus`";
            $status_result = mysql_query($status_query);
            while($rs = mysql_fetch_array($status_result))
            {
             ?>
             <option value="<?=$rs['s_professional_coaching_focus_id']?>"<?php if($val==$rs['s_professional_coaching_focus_id']){echo "selected";}?>>
			  <?=$rs['s_professional_coaching_focus_val']?>
             </option>
			 <?
            }
          ?>
        </select>
        </td>
	  <?php }elseif($key == 's_professional_coaching_style_id'){ ?>
      <td>Coaching Style</td>
      <td>
        <select name="<?=$key?>" id="<?=$key?>">
          <option value="">--Select Style--</option>
          <?php
            $status_query  = "SELECT * FROM `s_professional_coaching_style`";
            $status_result = mysql_query($status_query);
            while($rs = mysql_fetch_array($status_result))
            {
             ?>
             <option value="<?=$rs['s_professional_coaching_style_id']?>"<?php if($val==$rs['s_professional_coaching_style_id']){echo "selected";}?>>
			  <?=$rs['s_professional_coaching_style_val']?>
             </option>
			 <?
            }
          ?>
        </select>
        </td>
	  <?php }elseif($key == 'professional_contract_charge'){ ?>
      <td>Contract Charge</td>
       <td><input type="text" name="<?=$key?>" id="<?=$key?>" value="<?php echo $val;?>" size="50"></td>
	  <?php }elseif($key == 'paypal_email'){ ?>
      <td>Paypal E-mail</td>
      
      <td><input type="text" name="<?=$key?>" id="<?=$key?>" value="<?php echo $val;?>" size="50"></td>
      <?php }elseif($key == 'referral_code'){ ?>
	  <?php }elseif($key == 'linkedin_url'){ ?>
      <td>LinkedIn URl</td>
      
      <td><input type="text" name="<?=$key?>" id="<?=$key?>" value="<?php echo $val;?>" size="50"></td>
      <?php }
	   elseif($key == 'company_logo'){ ?>
      <td>Company logo</td>
      
      <td><input type="text" name="<?=$key?>" id="<?=$key?>" value="<?php echo $val;?>" size="50"></td>
      <?php }
	  elseif($key == 'soft_credit_amount'){ ?>
      <td>Soft Credit Amount ( USD )</td>
      
      <td><input type="text" name="<?=$key?>" id="<?=$key?>" value="<?php echo $val;?>" size="50"></td>
      <?php }
	  elseif($key == 'referral_code'){ ?>
      <td>Referral Code</td>
      <td><input type="text" name="<?=$key?>" id="<?=$key?>" value="<?php echo $val;?>" size="50"></td>
      <?php }elseif($key == 'p_user'){ ?>
      <td>P User</td>
      <td><input type="text" name="<?=$key?>" id="<?=$key?>" value="<?php echo $val;?>" size="50"></td>
      <?php }
      elseif($key == 'ProfessionalSpecialization'){
          
          $selected_skills = array();
        $sql_get_skills = "select * from `professional_skill_map` where `professional_id` = '".$lawyerid."'";
        $rs_skills = mysql_query($sql_get_skills);
        
        while($rr = mysql_fetch_array($rs_skills)){
            $skill_id = $rr['skill_id'];
            array_push($selected_skills,$skill_id);    
            
        }
          
          
          $sql = "select * from `project_skill`";
          $rs = mysql_query($sql);
     ?>
     <td><?=substr($key,12)?></td>
     <td>
     <select name="professional_skill[]" size="3" id="professional_skill" multiple="multiple">     
      <?php  
          while($rr = mysql_fetch_array($rs)){
              $pr_skill_id = $rr['pr_skill_id'];
              $pr_skill_name =  $rr['skill_name'];
      ?>        
      <option value="<?php echo $pr_skill_id;?>" <?php if(in_array($pr_skill_id,$selected_skills)){echo "selected";}?>><?php echo $pr_skill_name;?></option>
      <?php        
          }
       ?>
       </select>
       </td>
      <?php    
      }
      else{ ?>
      <td><?=substr($key,12)?></td>
      <td><input type="text" name="<?=$key?>" id="<?=$key?>" value="<?php echo $val;?>" size="50"></td>
      <?php } ?> 
    </tr>
     <?php       
            }
        }
    ?>
   
   <tr>
      <td colspan="2" align="center"><input type="submit" name="update" value="Update"></td>            
   </tr> 
</table>
</form>
</div>


<? mysql_close($connect);?>
<? include('include/adminfooter.php');?>