	<?php 
	
	if(isset($menu_content)) 
	if($menu_content['StaticPageId']==4){
	?>	
	<div class="in-right">
        <h2>Terms and condition</h2>
      	<div class="terms">
        	<h3>Terms of Service </h3>
            <p><? echo $menu_content['StaticPageText'];  ?></p>
        </div>
       
   </div>   
	<? 
	
	}else{
	?>
	<p><? echo $menu_content['StaticPageText'];  ?></p>
       <? }?>
</section>
<div class="clear"></div>
