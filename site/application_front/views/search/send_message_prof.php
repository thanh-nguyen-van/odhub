<html>
	<head>
    
    
    </head>
    <body>
    <?php
		if(isset($mail_send)){
	?>
    <div>
    Mail is successfully send.
    </div>
    <?php
		}
    ?>
    <form name="form1" id="form1" method="post" action="">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    	<tr>
        	<td>To : </td>
        	<td><input type="text" name="to" id="to" readonly="readonly" value="<?php echo $professional_details['ProfessionalEmail'];?>"/></td>
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
        	<td colspan="2" align="center"><input type="submit" name="send_message" id="send_message" value="Send Message" /></td>
        </tr>
    </table>
    </form>
    </body>
</html>