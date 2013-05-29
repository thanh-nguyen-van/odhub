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
      <li><a href="<?php echo $this->config->base_url();?>professional/show_home">Profile</a></li>
      <li><a href="<?php echo $this->config->base_url();?>professional/show_home">Account</a></li>
      <li><a href="<?php echo $this->config->base_url();?>project/">Projects</a></li>
      <li class="last"><a href="#">Realistic Previews</a></li>
    </ul>
    <a href="#" id="pull">Menu</a> </nav>
  <div class="Total-Div-Box-pro">
  
    <h1><?php /* --if condition added by manish--*/ if(isset($project_data[0]->project_name)){ echo $project_data[0]->project_name; } ?></h1>
    <div class="share"><a href="mailto:emailaddress">Share</a></div>
    <aside class="leftCol-pro">
    
    
    <?php
	//$this->index_left();   
	Project::project_head(); 
	?>
    
    <?php
	//$this->index_left();   
	Project::project_proposal(); 
	?>
      
      
      
      
      <div class="clear"></div>
    </aside>
    
    <?php
	//$this->index_left();   
	Project::project_proposal_post(); 
	?>
    
   
    
    
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
  <div class="drop-shadow-1"><img src="images/drop-shadow.png" alt="" width="839" height="11" border="0"></div>
</section>
<div class="clear"></div>
