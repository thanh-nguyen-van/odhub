<section class="second-sec-cont2">
        <div class="top-blue-sec">
          <div class="drop-dwn">
            <div id="dd" class="wrapper-dropdown-5" tabindex="1">My Proposals (<?php echo count($proposal_details);?>)
              <ul class="dropdown">
                <li><a href="#"><i class="icon-user"></i>Under Review </a></li>
                <li><a href="#"><i class="icon-cog"></i>Declined</a></li>
                <li><a href="#"><i class="icon-remove"></i> Accepted </a></li>
                <li><a href="#"><i class="icon-remove"></i> In Progress </a></li>
              </ul>
            </div>
          </div>
          <div class="clear"></div>
        </div>
        
        <?php
			foreach($proposal_details as $key=>$val){
				$professional_id = $val->ProfessionalId;
				$skillset = Project::getSkill($professional_id); 
				if($skillset == ""){
					$skillset = "none";	
				}
		?>		
		 <section class="proposalDiv-Total">
          <div class="left-logo"><img src="<?php echo css_images_js_base_url();?>images/left-logo.jpg" width="41" height="29" alt="" border="0"></div>
          <div class="cont-right">
            <h1><?php echo $val->fullname; ?></h1>
            <div class="clear"></div>
            <div class="flagDiv">
              <ul>
                <li><img src="<?php echo css_images_js_base_url();?>images/flag1.jpg" width="16" height="11" alt="" border="0"> <?php echo $val->StateName;?></li>
                <li class="last-li"><img src="images/building-icon.jpg" width="14" height="16" alt="" border="0"></li>
              </ul>
            </div>
            <div class="clear"></div>
            <?php 
			echo $val->proposal_description;
			?>
            <br />
            Skillset : <?php echo $skillset;?>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
          <div class="light-bord"></div>
        </section>		
				
		<?php		
			}
		?>
        <div class="clear"></div>
      </section>