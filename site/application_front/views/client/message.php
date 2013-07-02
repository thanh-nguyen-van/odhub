<script>
function messagereply(receiverid){
window.open("<?=base_url('search/sendmessage/?ProfessionalId=')?>"+receiverid,'sendmessage','height=200,width=350,top=200,left=400,toolbar=0,titlebar=0,resizable=0');
return false;

}
</script>
<div class="container_message">
<h1>message list</h1>
<?

for($i=0;$i<count($message_data_set);$i++){

$professional_details = $this->model_professional->get_professional_data($message_data_set[$i]['sender_id']);
$professional_name = $professional_details['ProfessionalFirstname']." ".$professional_details['ProfessionalLastname'];
?>
<div class="total_Box_Div">

<div class="total_Left">

<p>Sender : </p>
<span> <?=$professional_name?></span>
<p>Subject : </p>
<span><?=$message_data_set[$i]['subject']?></span>
<p>Message : </p> <span><?=$message_data_set[$i]['message']?></span>
</div>

<div class="total_Right">
<p><?=$message_data_set[$i]['date']?></p>
</div>

<div class="clear"></div>
<div class="reply_Div"><a href = "#" onclick="return messagereply(<?=$professional_details['ProfessionalId']?>)";>Reply</a></div>
<div class="clear"></div>
</div>
<?
}
?></div>




