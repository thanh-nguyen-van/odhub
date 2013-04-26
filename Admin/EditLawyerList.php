<?

include('include/adminheader.php');
include('include/connect.php');

$lawyerid=$_REQUEST['lawyerid'];

                  


if($_REQUEST['update']=='Update'){
    $str_arr = array();
    
    foreach($_REQUEST as $key=>$val){
        if($key!='lawyerid' && $key!='update'){
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
            if($key != 'ProfessionalId'){
            
    ?>        
    <tr>
      <td>
         <?php
           echo $key;
         ?>
      </td>
      <td>
        <input type="text" name="<?php echo $key;?>" value="<?php echo $val;?>" size="50">
      </td>
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


<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>