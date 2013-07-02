<html>
	<head>
    
    
    </head>
    <body>
    <?php
		if(isset($mail_send)){
	?>
    <script>
    alert("Message send successfully.");
	window.close();	
    </script>
    <?php
		}
    ?>
    <form name="form1" id="form1" method="post" action="">

    <input type="hidden" name="to" id="to" value="<?php echo $professional_details['ProfessionalEmail'];?>">
    <input type="hidden" name="proffessional_id" id="proffessional_id" value="<?php echo $professional_details['ProfessionalId'];?>">
    
    <table border="0" cellpadding="0" cellspacing="4" width="100%" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; background:#f0f0f0; border: solid 1px #ccc; border-radius:3px;">
    	
    	<tr>
        	<td>Subject : </td>
        	<td><input type="text" name="subject" id="subject" style="width:250px; border: solid 1px #ccc; padding:5px; border-radius:3px;" /></td>
        </tr>
        <tr>
        	<td valign="top">Content : </td>
        	<td>
            	<textarea name="content" id="content" rows="5" cols="" style="width:250px; border: solid 1px #ccc; padding:5px; border-radius:3px;" ></textarea>
            </td>
        </tr>
        <tr>
        	<td colspan="2" align="center"><input style="background:#E4710A; border: none; padding:5px 10px; color:#fff;" type="submit" name="send_message" id="send_message" value="Send Message" /></td>
        </tr>
    </table>
    </form>
    </body>
</html>