

<script language="javascript">
function contact_professional(ProfessionalId){
window.open("<?php echo $this->config->base_url();?>search/sendmessage/?ProfessionalId="+ProfessionalId,'sendmessage','height=200,width=350,top=200,left=400,toolbar=0,titlebar=0,resizable=0');
return false;
}
</script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>         
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script>
  $(function() {
    $( "#mydate" ).datepicker();
  });
</script>

<div class="clear"></div>
<div class="brk-line"></div>
</header>
<section class="container">
  <nav class="clearfix">
    <ul class="clearfix">
       
      <li><a href="<?php echo $this->config->base_url();?>client/show_home">My Home</a></li>
      <li class="last"><a href="<?php echo $this->config->base_url();?>client/project_list">My Projects</a></li>
	 <li class="rightalign"> <a href="<?php echo $this->config->base_url(); ?>client/edit_profile">My Account</a></li>
      
    </ul>
    <a href="#" id="pull">Menu</a> </nav>
   <form name="paypalFRM" method="post" action="<?php echo $award_submit_link;?>" target="_top"> 
    <input type="hidden" name="professionalid" id="professionalid" value="<?php echo $professionalid;?>" />
    <input type="hidden" name="proposalid" id="proposalid" value="<?php echo $proposalid?>" />
    <input type="hidden" name="projectid" id="projectid" value="<?php echo $projectid;?>" />
    
  <div class="Total-Div-Box">

	<div class="box-head1">
    	<h1><?php echo $project_data[0]->project_name;?></h1>
        <div class="clear"></div>
 	 </div>
 <div class="pay_area">
        	<div class="pay-block">
            	<span class="pay-name">Project Price :</span>
                <span class="pay-box"><input type="text" class="pay-input" name="amount" id="paypalamt"> </span>
            </div>
            <div class="pay-block">
            	<span class="pay-name">Delivery Date :</span>
                <span class="pay-box"> <input type="text" id="mydate" name="mydate" gldp-id="mydate" class="pay-input"/>
    <div gldp-el="mydate"
         style="width:260px; height:160px; position:absolute; top:70px; left:30px;">
    </div>
                
            </div>
            
            <div class="pay-block">
            	<span class="pay-name">Comment :</span>
                <span class="pay-box"><textarea class="pay-textarea" name="comment" id="comment"></textarea></span>
                
            </div>
            
            <div class="pay-block" align="center">
                <span class="pay-name">Payment Section</span>
            </div>
            
            <div class="pay-block">
                <span class="pay-name">First Name :</span>
                <span class="pay-box"><input type=text size=30 maxlength=32 name="firstname"></span>
                
            </div>
            
            <div class="pay-block">
                <span class="pay-name">Last Name :</span>
                <span class="pay-box"><input type=text size=30 maxlength=32 name="lastname"></span>
                
            </div>
            
            <div class="pay-block">
                <span class="pay-name">Card Type :</span>
                <span class="pay-box">
                <select name="creditCardType">
                    <option value="Visa">Visa</option>
                    <option value="MasterCard">MasterCard</option>
                    <option value="Discover">Discover</option>
                    <option value="Amex">American Express</option>
                </select>
                </span>
                
            </div>
            <div class="pay-block">
                <span class="pay-name">Card Number :</span>
                <span class="pay-box">
                <input type=text size=19 maxlength=19 name=creditCardNumber>
                </span>
                
            </div>
            <div class="pay-block">
                <span class="pay-name">Card Verification Number :</span>
                <span class="pay-box">
                <input type="text" name="cvv2Number" id="cvv2Number" >
                </span>
                
            </div>
            <div class="pay-block">
                <span class="pay-name">Expiration Date :</span>
                <span class="pay-box">
                <input type="text" name="expDateMonth" id="expDateMonth" size="2" maxlength="2">
                <input type="text" name="expDateYear" id="expDateYear" size="4" maxlength="4">
                </span>
                
            </div>
            
            
            
            
            
            <br>
            <div class="continue-btn"><input type="submit" name="PayNow" id="PayNow" value="AWARD NOW"></div><div class="clear"></div>
            
        </div>   



<div class="drop-shadow"><img src="images/drop-shadow.png"  height="11" alt="" border="0"></div>
</div>
	</form>
</section>
<div class="clear"></div>

