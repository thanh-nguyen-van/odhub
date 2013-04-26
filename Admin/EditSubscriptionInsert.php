<?include('include/adminheader.php');
include('include/connect.php');

$update_query="UPDATE  ".$table['subscription']."  SET SubscriptionType='$type', SubscriptionDuration=$duration, SubscriptionBids=$bids, SubscriptionAmount=$amount, SubscriptionCountry=$country  WHERE SubscriptionId=$subscriptionid";
$update_result=mysql_query($update_query);
?>
<table width="100%">
<tr>
	<td colspan="5"><h3>Edit Subscription</h3></td>
</tr>
<?
if($update_result)
{
	?>
	<tr>
		<td>Subscription successfully edited.</td>
	</tr>
	<?
}
else
{
	?>
	<tr>
		<td>Subscription is not edited.Try Again</td>
	</tr>
	<?
}
?>
</table>

<?mysql_close($connect);?>
<?include('include/adminfooter.php');?>