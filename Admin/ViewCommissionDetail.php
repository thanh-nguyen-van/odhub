<?
include('include/adminheader.php');
include('include/connect.php');

$count=0;
$result=$_REQUEST['msg'];
$commission_query="SELECT * FROM ".$table['commission']."";
$commission_result=mysql_query($commission_query);
while($row=mysql_fetch_array($commission_result))
{
	$commissionid_list.=$row['CommissionId'].",";
	$commissionname_list.=$row['CommissionFor'].",";
	$commissionamt_list.=$row['CommissionAmount'].",";
}

$commissionid=explode(",",$commissionid_list);
$commissionname=explode(",",$commissionname_list);
$commissionamt=explode(",",$commissionamt_list);
?>
<script value="text/javascript">
	function validateamt(i)
	{
		var amount=document.getElementById('commissionamt_'+i).value;;
		if(isNaN(amount))
		{
			alert("Please enter a valid amount value");
		}
	}
	document.getElementById('commissionamt_'+i).focus();
	
</script>

<form action="ViewCommissionDetailInsert.php" method="post">
  <h2>Commission Settings</h2>
  <div class="wht-bg">
    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
      <tr>
        <td style="height:5px"></td>
      </tr>
      <tr>
        <td><?php if($result=="1"){echo "<font color=red>Successfully Updated</font>";}?></td>
      </tr>
      <tr>
        <td style="height:5px"></td>
      </tr>
      <tr>
        <td><b>For</b></td>
        <td><b>Commission</b></td>
      </tr>
      <tr>
        <td style="height:5px"></td>
      </tr>
      <?php for($i=0; $commissionid[$i]!=""; $i++){ ++$count; ?>
      <tr> 
        <td><?=$commissionname[$i]?></td><input type="hidden" name="commissionid_<?=$i?>" value="<?=$commissionid[$i]?>">
        <td><input type="text" name="commissionamt_<?=$i?>" id="commissionamt_<?=$i?>" value="<?=$commissionamt[$i]?>" onkeyup="validateamt(<?=$i?>)"> %</td>
      </tr>
      <tr>
        <td style="height:5px"></td>
      </tr>
      <?php } ?>
      <tr>
        <td style="height:5px"></td>
      </tr>
      <tr>
        <input type="hidden" name="count" value="<?php echo $count;?>">
        <td><input type="submit" name="submit" value="Update" class="buttn"></td>
      </tr>
      <tr>
        <td style="height:5px"></td>
      </tr>
    </table>
  </div>
</form>
<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>