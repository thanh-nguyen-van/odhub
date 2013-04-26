<? include('include/adminheader.php');
include('include/connect.php');
$msg = '';

if(isset($_REQUEST['change']) && $_REQUEST['change']>0){
	if(isset($_REQUEST['btnsubmit'])){
		$update_query = "UPDATE ".$table['bidfee']." SET BidType='".$_REQUEST['txtbidtype']."', ChargeAmountUSD=".$_REQUEST['txtamount']." WHERE BidFeeId=".$_REQUEST['change'];
		$update_result = mysql_query($update_query);
	}
	$str_bid = "SELECT * FROM ".$table['bidfee']." WHERE BidFeeId=".$_REQUEST['change'];
	$sel_bid = mysql_query($str_bid);
	if(mysql_num_rows($sel_bid) > 0){
		$arr_bid = mysql_fetch_array($sel_bid);	
	}
}

if(isset($_REQUEST['rem']) && $_REQUEST['rem']>0){
	$delete_query = "DELETE FROM ".$table['bidfee']." WHERE BidFeeId=".$_REQUEST['rem'];
	$delete_result = mysql_query($delete_query);
}

if(isset($_REQUEST['btnsubmit'])){
	$str_bidfee = "SELECT * FROM ".$table['bidfee']." WHERE BidType='".$_REQUEST['txtbidtype']."'";
	$sel_bidfee = mysql_query($str_bidfee);	
	if(mysql_num_rows($sel_bidfee) > 0){
		$msg = "This Bid Type already exists!";	
	}else{
		$ins_bidfee = "INSERT INTO ".$table['bidfee']." (BidType, ChargeAmountUSD) VALUE ('".$_REQUEST['txtbidtype']."', ".$_REQUEST['txtamount'].")";
		$ins_result = mysql_query($ins_bidfee);
	}
}
?>
<script value="text/javascript">
	function validateamt()
	{
		var amount=document.getElementById('txtamount').value;;
		if(isNaN(amount))
		{
			alert("Please enter a valid amount value");
			document.getElementById('txtamount').focus();
		}else{
			return true;	
		}
	}
	
	
</script>
<form action="" method="post" onsubmit="javascript:validateamt()">
<h2>Bid Fee Detail</h2>
<div class="wht-bg">
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="td-bor td-bor12">
			<tr>
				<td colspan="3"></td>
			</tr>
			<tr>
				<td style="height:5px" colspan="3"></td>
			</tr>
            <?php
            if(isset($msg) && $msg!=''){
			?>
            <tr>
				<td colspan="3"><?php echo $msg;?></td>
			</tr>
            <tr>
				<td style="height:5px" colspan="3"></td>
			</tr>
           <? } ?>
			<tr>
				<td>Bid Type : </td>
                <td>&nbsp;</td>
                <td><input type="text" name="txtbidtype" value="<?php echo ($arr_bid['BidType']!='' ? $arr_bid['BidType'] : $_REQUEST['txtbidtype']);?>" class="input12"></td>
			</tr>
			<tr>
				<td style="height:5px" colspan="3"></td>
			</tr>
            <tr>
				<td>Amount : </td>
                <td>&nbsp;</td>
                <td><input type="text" id="txtamount" name="txtamount" value="<?php echo ($arr_bid['ChargeAmountUSD']!='' ? $arr_bid['ChargeAmountUSD'] : $_REQUEST['txtamount']);?>" class="input12">(USD)</td>
			</tr>
			<tr>
				<td style="height:5px" colspan="3"></td>
			</tr>
            <tr>
				<td align="left" colspan="3"><input type="submit" name="btnsubmit" value="Submit" class="buttn"></td>
			</tr>
            <tr>
				<td style="height:5px" colspan="3"></td>
			</tr>
         </table>
</div>
</form>
<div class="wht-bg">   
   <table cellspacing="0" cellpadding="0" width="100%" style="padding-left:10px;" class="td-bor td-bor12">
			<tr>
				<td><b>#</b></td>
				<td><b>Bid Fee Name</b></td>
				<td><b>Amount(USD)</b></td>
                <td><b>Action</b></td>
			</tr>
			<tr>
				<td style="height:5px" colspan="4"></td>
			</tr>
			<?
			$str_bidfee = "SELECT * FROM ".$table['bidfee']."";
			$sel_bidfee = mysql_query($str_bidfee);
			if(mysql_num_rows($sel_bidfee) > 0){
				$i = 1;
				while($arr_bidfee = mysql_fetch_array($sel_bidfee)){
			?>
					<tr>
						<td><?php echo $i;?>.</td>
						<td><?php echo $arr_bidfee['BidType'];?></td>
						<td><?php echo $arr_bidfee['ChargeAmountUSD'];?></td>
                        <td><a href="ViewBidFeeDetail.php?change=<?php echo $arr_bidfee['BidFeeId'];?>" class="edit">Edit</a> | <a href="ViewBidFeeDetail.php?rem=<?php echo $arr_bidfee['BidFeeId'];?>" onclick="return confirm('Are you sure you want to remove it?')" class="edit">Delete</a></td>
					</tr>
					<tr>
						<td style="height:5px" colspan="4"></td>
					</tr>
				<?
				$i++;
				}
			}else{
			?>
            <tr>
				<td colspan="4">No record found!</td>
			</tr>
            <? } ?>
			<tr>
				<td style="height:5px" colspan="4"></td>
			</tr>
			
		</table>
</div>


<? mysql_close($connect);?>
<? include('include/adminfooter.php');?>