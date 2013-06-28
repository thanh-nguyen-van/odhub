<div class="clear"></div>
<div class="brk-line"></div>
</header>
<section class="container">

<?php $client = $this->input->get('professional_id');
		if($client!=''){ ?>
        
  <nav class="clearfix">
    <ul class="clearfix">
      <li><a href="<?php echo $this->config->base_url();?>professional/view_profile">Profile</a></li>
      <li><a href="<?php echo $this->config->base_url();?>professional/show_home">Account</a></li>
      <li class="last"><a href="<?php echo $this->config->base_url();?>project/aword_project">Projects</a></li>

    </ul>
    <a href="#" id="pull">Menu</a> </nav>
    <?php } ?>
    
  <div class="Total-Div-Box ">
    <div class="box-head5">
      <h1>Client Review   <span>OD Hub Previews = <? if(isset($average_review)) echo $average_review; else echo "0";?></span> </h1>
      <div class="clear"></div>
    </div>
    <div class="tableDiv7 proposals-c lowspace">
   
        <table width="100%" bgcolor="#0473ae" class="minhight">
          
          <tbody>
          
          
				<?
				$num=count($review_details);
				
				 for($i=0;$i<count($review_details);$i++){?>
            <tr>
             <td>
             <div class="total-reviewBox">
			  <p>Project Name : <span><? echo $review_details[$i]['project_name'];?></span></p>	
              <p>Description : <? echo $review_details[$i]['review'];?></p>    
              <p>Client : <span><? echo $review_details[$i]['client_name'];?></span></p> 
              </div> 
               <div class="total-reviewBoxR">
               <div class="date-Div"><? echo $review_details[$i]['rv_date'];?></div></div>
              
              
              
              		  
			 </td>
             
           </tr>
           
                      
           
                          
         <?}?>
          </tbody>
          
          <?php  if($num == 0) { ?>
          
          
           <tbody>
          
            <tr>
             <td style="text-align:center;font-size:12px;color:#F00;" height="30px;">No previews available.
             
              
              
              
              		  
			 </td>
             
           </tr>
           
                      
           
                          
         
          </tbody>
          
          <? } ?>
        </table>
    </div>
	
    
   
	
    <div class="clear"></div>
	</form>

  </div>
</section>
<div class="clear"></div>
