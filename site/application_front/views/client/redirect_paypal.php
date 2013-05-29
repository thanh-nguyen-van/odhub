<form name="paypalFRM" method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr" target="_top"> 
    <input type="hidden" name="business" value="<?php echo $paypal_email;?>">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="return" value="<?php echo $award_success_link;?>?aword_id=<?php echo $aword_id; ?>">
    <input type="hidden" name="cancel_return" value="<?php echo $award_success_link;?>">
    <input type="hidden" name="notify_url" value="<?php echo $award_notify_link;?>?aword_id=<?php echo $aword_id ?>">
    <input type="hidden" name="lc" value="GB">
    <input type="hidden" name="image_url" value="http://projects.arcinfotec.com/odhub/odhub/site/public/images/logo.png">
    <input type="hidden" name="currency_code" value="EUR">
    <input type="hidden" name="item_name" value="<?php echo $project_data[0]->project_name;?>">
    <input type="hidden" name="item_number" value="<?php echo $project_data[0]->project_id;?>">
    <input type="hidden" name="cpp_cart_border_color" value="333333">
    <input type="hidden" name="cpp_headerback_color" value="333333">
    <input type="hidden" name="cpp_headerborder_color" value="333333">
    <input type="hidden" name="cpp_payflow_color" value="333333" />
    <input type="hidden" name="amount" id="amount" value="<?php echo $price;?>" />    
 </form>
 <script language="javascript">
 document.paypalFRM.submit();
 </script>