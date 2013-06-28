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
        <form name="form1" id="form1" method="post" action="<?php echo base_url().'professional/popUpEmail?code='.$_GET['code'];?>">
            <input type="hidden" name="code" value="<?php echo $_GET['code']?>"
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style='padding:10px'>
    	<tr>
        	<td>To : </td>
        	<td><input type="text" name="to" id="to"  value=""/>
            <input type="hidden" name="url" id="url"  value="<?php echo $this->config->base_url();?>project/details/?projectid=<? echo $this->input->get('ProjectId');?>"/>
            
            </td>
        </tr>
    	<tr>
        	<td>Subject : </td>
        	<td><input type="text" name="subject" id="subject"/></td>
        </tr>
        <tr>
        	<td>Content : </td>
        	<td>
            	<textarea name="content" id="content" rows="5" cols="30"></textarea>
            </td>
        </tr>
        <tr>
        	<td colspan="2" align="center">
                <input type="submit" name="send_message" id="send_message" value="Send Message" onclick="validate();"/></td>
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