<div class="clear"></div>
<div class="brk-line"></div>
</header>
<section class="container">
  <div class="login-page">
    <h5>Login</h5>
      <div class="lgt-blue">
        <div class="dp-blue">
        <div class="login-im"><img src="<?php echo css_images_js_base_url();?>images/login-im.png" alt=""></div>
        <form action="<?php echo $signin_submit_link ?>" method="post">
         <div class="log-main">
          <h4>Login to OD hub</h4>
          <?php if(isset($errmsg) && $errmsg != "") { ?>
              <div class="msg failure"><?php echo $errmsg; ?></div>
          <?php }?>
		  <!--  Commented the code by Manish just removing the type of the clients.    -->
          <!--<div class="usrtpe">As a :</div>
          <div class="rd-btn">
            <input name="usertype" type="radio" value="Client" <?php //if(set_value('usertype') == 'Client' or set_value('usertype') == '') echo "checked" ?> />
          </div>
          <div class="usrtpe12">Client</div>
          <div class="rd-btn">
            <input name="usertype" type="radio" value="Professional" <?php //if(set_value('usertype') == 'Professional') echo "checked" ?> />
          </div>
          <div class="usrtpe12">Professional</div>-->
          
          <br /><br />
          
          <div><input type="text"	  name="username" id="username" value="<?php echo set_value('username') ?>" placeholder="User name . . ." class="input1" />
               <span>*</span><?php echo form_error('username') ?></div>
          <div><input type="password" name="password" id="password" value="<?php echo set_value('password') ?>" placeholder="* * * * * * * *" class="input1" />
          	   <span>*</span><?php echo form_error('password') ?></div>
          <div class="forgot" align="right"><a href="#">Did you forget your password ?</a></div>
          <div class="btn1"><input type="submit" class="buttn" value="Login"></div>
          <div class="btn1"><a href="<?php echo site_url('login/signup'); ?>" class="buttn">Sign up</a></div>
         </div>
        </form>
        <div class="clear"></div>
        </div>
      </div>
      <div align="center" class="shdw-im"><img src="<?php echo css_images_js_base_url();?>images/lgn_b.jpg" alt=""></div>
  </div> 
</section>
<div class="clear"></div>
