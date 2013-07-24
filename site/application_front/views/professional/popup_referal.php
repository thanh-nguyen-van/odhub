<html>
<head>
</head>
<body>
<?php
	
    if(isset($mail_send)){
	?>
<div> 
  <script> 
   alert("Mail is successfully send.");
   window.close();
   </script> 
</div>
<?php
	
	
		}
    ?>
    
<!--    
    <form name="form1" id="form1" method="post" action="<?php echo base_url().'professional/popUpEmail/'.$_GET['code'];?>">
  <input type="hidden" name="code" value="<?php echo $_GET['code']?>"
    
 
<table width="100%" cellspacing="4" cellpadding="0" border="0" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; background:#f0f0f0; border: solid 1px #ccc; border-radius:3px;">
    	
    	<tbody>
        <tr>
        	<td>To : </td>
        	<td>   
        <input type="text" name="to" id="to"  value="" style="width:250px; border: solid 1px #ccc; padding:5px; border-radius:3px;"/>
        
        <input type="hidden" name="pro_url" id="url"style="width:250px; border: solid 1px #ccc; padding:5px; border-radius:3px;"  value="<?php echo $this->config->base_url();?>login/prof_signup/?code=<? echo $_GET['code'];?>"/>
        
        <input type="hidden" name="client_url" id="url" style="width:250px; border: solid 1px #ccc; padding:5px; border-radius:3px;" value="<?php echo $this->config->base_url();?>login/signup/?code=<? echo $_GET['code'];?>"/>
        
        </td>
            
        </tr>
            <tr>
      <td>Subject : </td>
      <td><input type="text" name="subject" id="subject" style="width:250px; border: solid 1px #ccc; padding:5px; border-radius:3px;"/></td>
    </tr>
    
        <tr>
      <td>Content : </td>
      <td><textarea name="content" id="content" rows="5" cols="30" style="width:250px; border: solid 1px #ccc; padding:5px; border-radius:3px;"></textarea></td>
    </tr>
    
    
    
    <tr>
      <td>Refferal Type  : </td>
      <td><input type="radio" name="refferal_type" value="client" checked="checked" style="width:250px; border: solid 1px #ccc; padding:5px; border-radius:3px;">
        Client
        <input type="radio" name="refferal_type" value="professional" style="width:250px; border: solid 1px #ccc; padding:5px; border-radius:3px;">
        Professional </td>
    </tr>
    
    
    <tr>
      <td colspan="2" align="center"><input type="submit" name="send_message" id="send_message" value="Send Message" onClick="return validate();"style="background:#E4710A; border: none; padding:5px 10px; color:#fff;"/></td>
    </tr>
    

    </tbody></table>



   
  -->  
    
    
    
    
    
    
    
    
    
<form name="form1" id="form1" method="post" action="<?php echo base_url().'professional/popUpEmail/'.$_GET['code'];?>">
  <input type="hidden" name="code" value="<?php echo $_GET['code']?>">
    
  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="padding:5px; background:#fbfbfb;">
  
    <tr>
      <td>To : </td>
      <td>
      <input type="text" class="frm_inbox" name="to" id="to"  value=""/>
        <input type="hidden" name="pro_url" id="url"  value="<?php echo $this->config->base_url();?>login/prof_signup/?code=<? echo $_GET['code'];?>"/>
        <input type="hidden" class="frm_inbox" name="client_url" id="url"  value="<?php echo $this->config->base_url();?>login/signup/?code=<? echo $_GET['code'];?>"/>
        </td>
    </tr>
    
    
    
    
    <tr>
      <td>Subject : </td>
      <td><input type="text" name="subject" class="frm_inbox" id="subject"/></td>
    </tr>
    
    
    
    
    <tr>
      <td>Content : </td>
      <td><textarea name="content" id="content" rows="5" cols="30"></textarea></td>
    </tr>
    
    
    
    
    <tr>
      <td>Refferal Type  : </td>
      <td><input type="radio" name="refferal_type" value="client" checked="checked">
        Client
        <input type="radio" name="refferal_type" value="professional">
        Professional </td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="send_message" id="send_message" class="sbt-btn" value="Send Message" onClick="return validate();"/></td>
    </tr>
  </table>
</form>


</body>
<Script>
    function validate(){
        var to = document.getElementById("to").value;
        var subject = document.getElementById("subject").value;
        var content = document.getElementById("content").value;
        
        if(ValidateEmail(to)==false){
            alert('Please provide valid email id');
            return false;
        }
        
        else if(isempty(subject)==false){
            alert('Please provide valid subject');
            return false;
        }
        
        else if(isempty(content)==false){
            alert('Please provide  your content');
            return false;
        }
        else{
            //this.form.submit();
            return true
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
</html>