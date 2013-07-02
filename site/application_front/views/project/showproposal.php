
<div class="brk-line"></div>

<section class="container">

<nav class="clearfix">
        <ul class="clearfix">
            <li><a href="<?php echo $this->config->base_url(); ?>professional/edit_profile">My Profile</a></li>
            <li><a href="<?php echo $this->config->base_url(); ?>professional/show_home">My Account</a></li>
            <li ><a href="<?php echo $this->config->base_url(); ?>project/aword_project">My Projects</a></li>
            <li ><a href="<?php echo $this->config->base_url(); ?>professional/invoice">Create Invoices</a></li>
			<li><a href="<?php echo $this->config->base_url(); ?>professional/review/">Realistic Previews</a></li>			
            <li class="last"><a target="_blank" href="<?php echo $this->config->base_url(); ?>../forum/">OD Hub Forums</a></li>
        </ul>
        <a href="#" id="pull">Menu</a> </nav>



<div class="total-h-Div">

	<div class="box_prop">
    	<h1>proposal preview</h1>
        
 <form id="form1" enctype="multipart/form-data" name="form1" method="post" action="<?=base_url('proposal/saveproposal/')?>">      
  <div class="bottom_Box">
        	<div class="tx-pr">Peoposal description : </div>
        <div class="tx-prR"><?=$proposal_data['proposal_description']?></div>
        
        <div class="clear"></div>
        

        

        	<div class="tx-pr">Peoposal Price : </div>
        <div class="tx-prR"><?=$proposal_data['price']?></div>
        
        <div class="clear"></div>
        
        
         
        

        	<div class="tx-pr">Deliver Date : </div>
        <div class="tx-prR"><?=$proposal_data['dalivery_date']?></div>
        
        <div class="clear"></div>
        
        
     
        

        	<div class="tx-pr">Peoposal description : </div>
        <div class="tx-prR"><?=$proposal_data['proposal_description']?></div>
        
        
        
        
<div class="clear"></div>
<input id="project_id" type="hidden" name="project_id" value="<?=$proposal_data['project_id']?>">
<input id="proposal_description" type="hidden" name="proposal_description" value="<?=$proposal_data['proposal_description']?>">
<input id="price" type="hidden" name="price" value="<?=$proposal_data['price']?>">
<input id="dalivery_date" type="hidden" name="dalivery_date" value="<?=$proposal_data['dalivery_date']?>">

    <div class="button_classTotal">
    
    <div class="submitDiv"><input type="submit" name="submit" value="submit"></div>
    <div class="cancelDiv"><a href="<?=base_url('project/details/?projectid=')?><?=$proposal_data['project_id']?>"> Cancel </a></div>
<div class="clear"></div>
</div>    
        <div class="clear"></div>
        </div>     
        
</form>
       
    </div>



</div>







</section>