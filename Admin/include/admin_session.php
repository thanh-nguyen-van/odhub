<?
session_start();
if(($_SESSION['Usertype']!="Admin") || ($_SESSION['AdminId']==""))
{
	session_destroy();
	header('location:AdminLogin.php');
}
?>