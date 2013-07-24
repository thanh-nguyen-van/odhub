<?php
	$_SESSION['first_redirect'] = 1;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body onloadi="document.getElementById('login').submit();"> <!--onload="document.getElementById('').submit();"-->


<form action="<?php echo $this->config->base_url();?>../forum/ucp.php?mode=login" method="post" id="login">
	<input type="hidden" tabindex="1" name="username" id="username" size="25" value="<?php echo $prof_data['ProfessionalUsername'] ?>" />
	<input type="hidden" tabindex="2" name="password" id="password" size="25" value="<?php echo $prof_data['ProfessionalPassword'] ?>" />
    <input type="hidden" class="button1" value="Login" tabindex="6" name="login">
</form>

</body>
</html>