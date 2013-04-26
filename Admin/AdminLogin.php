<?php 
include('include/connect.php');
include('include/setting.php');
include('include/header.php');
?>
<div class="clear"></div>
<div class="brk-line"></div>
</header>
<section class="container">
  <div class="login-page">
  <h5>Administrator</h5>
    	<div class="lgt-blue">
        	<div class="dp-blue">
            <div class="login-im"></div>
            <form action="LoginMessage.php" method="post">
                <input type="hidden" name="usertype" value="Admin" />
            	<div class="log-main">
                    <div><input type="text" name="username" onFocus="if (this.value == 'User name...') this.value='';" onBlur="if(this.value=='') this.value ='User name...'; else this.value=this.value;" value="User name..." class="input1"  /> </div>
                    <div><input type="password" name="password" onFocus="if (this.value == 'Password') this.value='';" onBlur="if (this.value == '') this.value ='Password'; else this.value=this.value;" value="Password" class="input1"  />  </div>
                	<div class="forgot" align="right"><a href="#">Did you forget your password ?</a></div>
                    <div class="btn1"><input type="submit" class="buttn" value="Login"></div>
                </div>
             </form>
                <div class="clear"></div>
            </div>
        </div>
        <div align="center" class="shdw-im"><img src="<?php echo $publicURL;?>images/lgn_b.jpg" alt=""></div>
    </div> 
</section>
<div class="clear"></div>

<?php include('include/footer.php');?>