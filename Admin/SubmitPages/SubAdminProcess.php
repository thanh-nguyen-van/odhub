<? 
  require_once('../include/adminheader.php');
  require_once('../include/connect.php');
?>

<?php

 function random_pass()
  {
	$chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$res = "";
	for ($i = 0; $i < 10; $i++) {
			$res .= $chars[mt_rand(0, strlen($chars)-1)];
	}
	
	return $res;
  }
  
$password = random_pass();
  
$todo=trim($_REQUEST['todo']);
$msgAdd="New Record added successfully.";
$msgEdit="Record modified successfully.";
$msgDelete="Record Deleted Successfully.";
$msgMultiDelete=" Record(s) status changed successfully.";
$AddPage = "../SubAdminAdd.php";
$EditPage = "../SubAdminEdit.php";
$listPage = "../SubAdminList.php"; 

if($todo=="add")
{
	$_SESSION['fname1'] = $fname  = my_addslashes(trim($_REQUEST['fname']));
	$_SESSION['lname1'] = $lname  = my_addslashes(trim($_REQUEST['lname']));
	$_SESSION['email1'] = $email  = my_addslashes(trim($_REQUEST['email']));
	$_SESSION['status1'] = $status = my_addslashes(trim($_REQUEST['status']));
	
	if($fname == '')
		{
			$_SESSION['fname'] = 'This field is required';
			$url="Location:".$AddPage;
			header($url);
			exit();
		}
	if($lname == '')
		{
			$_SESSION['lname'] = 'This field is required';
			$url="Location:".$AddPage;
			header($url);
			exit();
		}
		
	$query="SELECT `AdminEmail` FROM ".$table['adminaccount']." WHERE `AdminEmail`='".$email."'";
	$result=mysql_query($query);
	$num_email = mysql_num_rows($result);
	
		if($email == '')
		{
			$_SESSION['email'] = 'This field is required';
			$url="Location:".$AddPage;
			header($url);
			exit();
		}
		if($num_email > 0)
		{
			$_SESSION['email'] = 'This email id is already exists';
			$url="Location:".$AddPage;
			header($url);exit();
		}
		
		
		
	$sql="INSERT INTO `".$table['adminaccount']."` SET
			 
			`FirstName`   =	'".$fname."',
			`LastName`        =	'".$lname."',
			`AdminUsername`     =	'".$email."',
			`AdminEmail`    =	'".$email."',
			`AdminPassword`     = '".$password."',
			`Status`     =	'".$status."' ";
			//die($sql);
			$insert=mysql_query($sql);
			if($insert)
				{
					//============= Send Mail =======================
					  $mailto	 = $email;
					  $from_mail = $config['From_Mail'];
					  $from_name = $config['From_Name'];
					  $replyto	 = "";
					  $subject	 = "Thanks for registration";
					  
					  $message	 = "Hi ".$fname.",  <br><br>";
					  $message  .= "Thank you for registering with us. Your Login Details as follows : -  <br>";
					  $message  .= "Username : ".$email."    <br>";
					  $message  .= "Password : ".$password."   <br><br>";						
					  $message  .= "Thanks, <br>";
					  $message  .= $config['From_Name'];			  
					  
					  $header	 = 'MIME-Version: 1.0' . "\r\n";
					  $header	.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					  $header	.= "From: ".$from_name." <".$from_mail.">" . "\r\n";
					  $header	.= 'Reply-To: '.$replyto.'' . "\r\n";
					  $header	.= 'X-Mailer: PHP/' . phpversion();
					  
					  @mail($mailto, $subject, $message, $header);
					//=============================================== 
					
					$_SESSION['msg'] = $msgAdd;
					unset($_SESSION['fname1']);
					unset($_SESSION['lname1']); 
					unset($_SESSION['email1']); 
					unset($_SESSION['status1']);
			        $url="Location:".$listPage;
			        header($url);
				}
}

if($todo == "edit")
{
    $AdminId = $_REQUEST['AdminId'];
	$Idemail = base64_decode($_REQUEST['Idemail']);
    $fname  = trim($_REQUEST['fname']);
	$lname  = trim($_REQUEST['lname']);
	$email  = trim($_REQUEST['email']);
	$status = trim($_REQUEST['status']);
	
	if($fname == '')
		{
			$_SESSION['fname'] = 'This field is required';
			$url="Location:".$EditPage."?AdminId=".$AdminId;
			header($url);exit();
		}
	if($lname == '')
		{
			$_SESSION['lname'] = 'This field is required';
			$url="Location:".$EditPage."?AdminId=".$AdminId;
			header($url);exit();
		}
		
	$query="SELECT `AdminEmail` FROM ".$table['adminaccount']." WHERE `AdminEmail`='".$email."'";
	$result=mysql_query($query);
	$result_email = mysql_fetch_array($result);
	$num_email = mysql_num_rows($result);
	
		if($email == '')
		{
			$_SESSION['email'] = 'This field is required';
			$url="Location:".$EditPage."?AdminId=".$AdminId;
			header($url);exit();
		}
		
		if($Idemail != $result_email['AdminEmail'])
		{
			if($num_email > 0)
			{
				$_SESSION['email'] = 'This email id is already exists';
				$url="Location:".$EditPage."?AdminId=".$AdminId;
				header($url);exit();
			}
		}
		
		
		
	$sql="UPDATE `".$table['adminaccount']."` SET
			 
			`FirstName`   =	'".$fname."',
			`LastName`        =	'".$lname."',
			`AdminUsername`     =	'".$email."',
			`AdminEmail`    =	'".$email."',
			`AdminPassword`     = '".$password."',
			`Status`     =	'".$status."' WHERE `AdminId`='".$AdminId."' ";
			//die($sql);
			$insert=mysql_query($sql);
			if($insert)
				{
					//============= Send Mail =======================
					  $mailto	 = $email;
					  $from_mail = $config['From_Mail'];
					  $from_name = $config['From_Name'];
					  $replyto	 = "";
					  $subject	 = "Update your Sub Admin account";
					  
					  $message	 = "Hi ".$fname.",  <br><br>";
					  $message  .= "Your Update Login Details as follows : -  <br>";
					  $message  .= "Username : ".$email."    <br>";
					  $message  .= "Password : ".$password."   <br><br>";						
					  $message  .= "Thanks, <br>";
					  $message  .= $config['From_Name'];			  
					  
					  $header	 = 'MIME-Version: 1.0' . "\r\n";
					  $header	.= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					  $header	.= "From: ".$from_name." <".$from_mail.">" . "\r\n";
					  $header	.= 'Reply-To: '.$replyto.'' . "\r\n";
					  $header	.= 'X-Mailer: PHP/' . phpversion();
					  
					  @mail($mailto, $subject, $message, $header);
					//=============================================== 
					
					$_SESSION['msg'] = $msgEdit;
			        $url="Location:".$listPage;
			        header($url);
				}
}

if($todo == "delete")
{
	$AdminId = $_REQUEST['AdminId'];
	$sql="DELETE FROM `".$table['adminaccount']."` WHERE `AdminId`='".$AdminId."' ";
	//die($sql);
	$delete = mysql_query($sql);
	if($delete)
		{
			$_SESSION['msg'] = $msgDelete;
			$url="Location:".$listPage;
			header($url);
		}
	
}


?>