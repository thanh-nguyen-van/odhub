<script>
function messagereply(receiverid){
window.open("<?=base_url('professional/sendmessage')?>/"+receiverid,'sendmessage','height=200,width=350,top=200,left=400,toolbar=0,titlebar=0,resizable=0');
return false;

}
</script>
<div class="container_message">
<h1>message list</h1>
<?
//print_r($message_data_set);

for($i=0;$i<count($message_data_set);$i++){
$client_details = $this->model_client->get_client_data($message_data_set[$i]['sender_id']);
$client_name = $client_details['ClientFirstname']." ".$client_details['ClientLastname'];
?>



<div class="total_Box_Div">


<div class="total_Left">
<p>Sender : </p>
<span><?=$client_name?></span>

<p>Subject : </p>

<span><?=$message_data_set[$i]['subject']?></span>
<p>Message : </p> 
<span><?=$message_data_set[$i]['message']?></span>


</div>

<div class="total_Right">
<p><?=$message_data_set[$i]['date']?></p>
</div>

<div class="clear"></div>

<div class="reply_Div"><a href = "<?=base_url('professional/MessageReply')?>" onclick="return messagereply(<?=$client_details['ClientId']?>)";>Reply</a></div>
<div class="clear"></div>
</div>




<?
}
?>
</div>