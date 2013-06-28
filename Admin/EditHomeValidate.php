<? include('include/connect.php');
ob_start();
$title=mysql_real_escape_string(stripslashes(trim($_REQUEST['title'])));
$content=mysql_real_escape_string(stripslashes(trim($_REQUEST['content'])));
$home_id=$_REQUEST['home_id'];


    if(($title==""))
			{
				$title_label="<font color=red>Check your entry.</font>";
				$set_for_correction=true;
			}

   else
		   {
				$set_for_correction=false;  
		   }

	if(($content==""))
			{
				$content_label="<font color=red>Check your entry.</font>";
				$set_for_correction=true;
			}

    else
			{
			     $set_for_correction=false;  
			}
	if($set_for_correction=="true")
		{
		  include('EditHome.php');
	    }
	else
		{
			include('EditHomeInsert.php');
			header("Location: EditHome.php?home_id=$home_id");	
	        exit;
		}
?>

