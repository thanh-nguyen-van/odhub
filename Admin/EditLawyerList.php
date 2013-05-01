<?php

include('include/adminheader.php');
include('include/connect.php');

$lawyerid=$_REQUEST['lawyerid'];

                  


if(isset($_REQUEST['update'])=='Update'){
    $str_arr = array();
    
    foreach($_REQUEST as $key=>$val){
        if($key!='lawyerid' && $key!='update'){
			if($key=='ProfessionalJoindate')
				$str = "`".$key."`='".date("Y-m-d H:i:s", strtotime($val))."'";
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
	  <?php }elseif($key == 's_professional_contract_charge'){ ?>
      <td>Contract Charge</td>
      <td><input type="text" name="<?=$key?>" id="<?=$key?>" value="<?php echo $val;?>" size="50"></td>
      <?php }elseif($key == 'referral_code'){ ?>
      <td>Referral Code</td>
      <td><input type="text" name="<?=$key?>" id="<?=$key?>" value="<?php echo $val;?>" size="50"></td>
      <?php }elseif($key == 'p_user'){ ?>
      <td>P User</td>
      <td><input type="text" name="<?=$key?>" id="<?=$key?>" value="<?php echo $val;?>" size="50"></td>
      <?php }else{ ?>
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