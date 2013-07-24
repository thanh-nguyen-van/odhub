<script type="text/javascript">
	$(function(){
		$('.adv_btn').click(function(){
      $("#result").html('');
			$(this).animate({left:'-50px'}, 500);
			$('#div2').animate({left:'0'},500);
			})
			
			$('.fd_close').click(function(){
			$('.adv_btn').animate({left:'0'}, 500);
			$('#div2').animate({left:'-600px'},500);
			})
		})

</script>
<script type="text/javascript">

    function validate(){

        var name = document.getElementById("feedback_name").value;

        var mail = document.getElementById("feedback_email").value;
       
        var message = document.getElementById("feedback_message").value;
       
        
        if(isempty(name)==false){
            alert('Please provide valid Name');
            return false;
        }
        
        else if(ValidateEmail(mail)==false){
            alert('Please provide valid email id');
            return false;
        }
        
        else if(isempty(message)==false){
            alert('Please provide  your Message');
            return false;
        }
        else{
                

                  /* stop form from submitting normally */
                  //event.preventDefault();

                  /*clear result div*/
                   $("#result").html('');

                    /* get some values from elements on the page: */
                     var values = $(feedback_form).serialize();

                      /* Send the data using post and put the results in a div */
                        $.ajax({
                          url: "<?php echo base_url('home/submit_feedback');?>",
                          type: "post",
                          data: values,
                          success: function(){
                               $("#result").html('Submitted successfully');
                               document.forms["feedback_form"].reset();
                               
                               $('.adv_btn').delay(1000).animate({left:'0'}, 500);
                               $('#div2').delay(1000).animate({left:'-600px'},500);

                          },
                          error:function(){
                              $("#result").html('Internal server error.');
                          }   
                        }); 
                      
        }
        
        
    }
    
    function isempty(str){
        
        if(str.replace(/\s/g,"") == ""){
            return false
        }
        else
            return true;
    }
    
    function ValidateEmail(mail)   
    {  
     if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))  
      {  
        return (true)  
      }  
        return (false)  
    } 
     
   
</script>

<header>
<div class="top-header_bg">
  <div class="fdbk"> <a name="div2" href="javascript:;" class="adv_btn"  onmousedown="toggleDiv('div2');">
   <img src="<?php echo css_images_js_base_url();?>images/fdbk.png" name="Image17" width="56" height="196" border="0"> 
 </a>
    <div id="div2">
        <div id="result" style="color:green; font-size:15px;text-align:center;padding:5px 5px 5px 5px;"></div>
    	<div class="fd_heading">Give Feedback</div>

    	<div class="fd_close"><img src="<?php echo css_images_js_base_url();?>images/close.png" name="Image17"></div>
		<form action="<?php echo base_url('home/submit_feedback');?>" method="post" name="feedback_form" id="feedback_form">
      <div class="fd_block">
        <div class="fd_name">Name :</div>
        <div class="fd_box">
          <input type="text" name="feedback_name" id="feedback_name" class="fd_name" placeholder="Type Your Name" />
        </div>
      </div>
      <div class="fd_block">
        <div class="fd_name">Email :</div>
        <div class="fd_box">
          <input type="text" name="feedback_email" id= "feedback_email" class="fd_name" placeholder="Type Your Email" />
        </div>
      </div>
      <div class="fd_block">
        <div class="fd_name">Message :</div>
        <div class="fd_box">
          <textarea placeholder="Your Message" name="feedback_message" id="feedback_message"></textarea>
        </div>
      </div>
      
      <div class="fd_block">
      	<div class="fd_name">&nbsp;</div>
        <div class="fd_box"><span class="sbt-btn"><input type="button" value="Submit" onClick="return validate();" /></span></div>
		</form>
      </div>
    </div>
  </div>
  <div class="nd-hlp"><a href="<?=base_url('static_content/learnmore/NeedHelp')?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image18','','<?php echo css_images_js_base_url();?>images/nd-hlp-h.png',1)"><img src="<?php echo css_images_js_base_url();?>images/nd-hlp.png" name="Image18" width="69" height="227" border="0"></a></div>
  <div class="container">
    <div class="top-left-sign">
      <?php if(isset($_SESSION[USER_SESSION_ID]) and $_SESSION[USER_SESSION_ID] != ""){ ?>
      <?php
				if(isset($_SESSION['user_session_type'])){
					if($_SESSION['user_session_type'] == "Professional"){
					?>
      <span>Welcome <?php echo $_SESSION[USER_SESSION_FULLNAME] ?>, <a href="<?php echo site_url('professional/show_home'); ?>">My Account</a></span>
      <?php	
					}
					if($_SESSION['user_session_type'] == "Client"){
					?>
      <span>Welcome <?php echo $_SESSION[USER_SESSION_FULLNAME] ?>, <a href="<?php echo site_url('client/show_home'); ?>">My Account</a></span>
      <?php	
					}
					
				}
			?>
      <?php }else{ ?>
      <span><a href="<?php echo site_url('login/signup'); ?>">Sign  up</a></span> for  a  free  account  today
      <?php } ?>
    </div>
    <?php
		if(isset($_SESSION['user_session_type'])){
		$user_session_type = $_SESSION['user_session_type'];
		}
		else{
			$user_session_type = "";
		}
		?>
    <nav class="main-menu">
      <ul>
        <li><a href="<?php echo site_url('home/index'); ?>">Home</a></li>
        <li><a href="<?php if(isset($content_menu['howit_works'])) echo site_url('static_content/index/'.$content_menu['howit_works']['StaticPageId']); ?>">
          <?php if(isset($content_menu['howit_works']['StaticPageName'])) echo $content_menu['howit_works']['StaticPageName'] ?>
          </a></li>
        <li><a href="<?php echo site_url('static_content/learnmore/Client'); ?>">For Clients</a></li>
        <li><a href="<?php echo site_url('static_content/learnmore/Professional'); ?>">For OD Professionals</a></li>
        <li class="sign-in">
          <?php if(isset($_SESSION[USER_SESSION_ID]) and $_SESSION[USER_SESSION_ID] != ""){ ?>
          <a href="<?php echo site_url('login/signout'); ?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image15','','<?php echo css_images_js_base_url();?>images/logout-h.jpg',1)"><img src="<?php echo css_images_js_base_url();?>images/logout.jpg" name="Image15" width="66" height="24" border="0"></a></li>
        <?php }else{ ?>
        <a href="<?php echo site_url('login/signin'); ?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image15','','<?php echo css_images_js_base_url();?>images/sign-h.jpg',1)"><img src="<?php echo css_images_js_base_url();?>images/sign.jpg" name="Image15" width="66" height="24" border="0"></a>
        </li>
        <?php } ?>
      </ul>
    </nav>
  </div>
  <div class="clear"></div>
</div>
<div class="container">
  <div class="logo"><a href="<?php echo site_url('home/index'); ?>"><img src="<?php echo css_images_js_base_url();?>images/logo.png" alt="" border="0"></a></div>
  <div class="realize">
    <h4>Realize your full potential</h4>
    <div class="b-line" align="right"><img src="<?php echo css_images_js_base_url();?>images/b-line.jpg" alt=""></div>
    <? if(isset($_SESSION['Usertype']) && ($_SESSION['Usertype'] != '' || $_SESSION['Usertype'] == 'admin')){
			
			
			
			 ?>
    <div class="rlze-right"><a href="<?php echo site_url('login/signin'); ?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image22','','<?php echo css_images_js_base_url();?>images/s-icon1-h.png',1)"><img src="<?php echo css_images_js_base_url();?>images/s-icon1.png" alt="" name="Image22" width="24" height="30" border="0"></a><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image23','','<?php echo css_images_js_base_url();?>images/s-icon2-h.png',1)"> <img src="<?php echo css_images_js_base_url();?>images/s-icon2.png" alt="" name="Image23" width="24" height="30" border="0"></a><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image24','','<?php echo css_images_js_base_url();?>images/s-icon3-h.png',1)"><img src="<?php echo css_images_js_base_url();?>images/s-icon3.png" alt="" name="Image24" width="24" height="30" border="0"></a></div>
    <? } ?>
  </div>
  <div class="clear"></div>
</div>
<div class="clear"></div>
