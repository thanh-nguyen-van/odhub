<?php
include('include/connect.php');

 $clientfirstname	= $_REQUEST['clientfirstname'];
 $clientlastname	= $_REQUEST['clientlastname'];
 $clientemail		= $_REQUEST['clientemail'];
 $clientaddress		= $_REQUEST['clientaddress'];
 $clientzipcode		= $_REQUEST['clientzipcode'];
 $clientdescription	= $_REQUEST['clientdescription'];
 $description		= @preg_replace("\r\n\r\n|\n\n|\r\r","<p>",$clientdescription);
 $description		= stripcslashes(@preg_replace("\r\n|\n|\r","<br/>",$description));
 $clientemail		= $_REQUEST['clientemail'];
 $state				= $_REQUEST['state'];
 $country			= $_REQUEST['country'];
 $clientid			= $_REQUEST['clientid'];

function username($strg)
{
	$invalid=0;
	$allowed="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	for($i=0; $i<strlen($strg); $i++)
	{
		for($x=0; $x<strlen($allowed); $x++)
		{
			if($strg[$i]==$allowed[$x])
			{	
				$invalid++;
			}
		}
        //DebugBreak();
		if($invalid==0)
		{
			return false;break;break;
		}
		$invalid=0;
	}
	return true;
}


function address($strg)
{
	$invalid=0;
	$allowed=" abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789~`!@#$%^&*()-+=|\{}[]:;?/<>,._.";
	for($i=0; $i<strlen($strg); $i++)
	{
		for($x=0; $x<strlen($allowed); $x++)
		{
			if($strg[$i]==$allowed[$x])
			{	
				$invalid++;
			}
		}
		if($invalid==0)
		{
			return false;break;break;
		}
		$invalid=0;
	}
	return true;
}

function zipcode($strg)
{
	$invalid=0;
	$allowed="0123456789";
	for($i=0; $i<strlen($strg); $i++)
	{
		for($x=0; $x<strlen($allowed); $x++)
		{
			if($strg[$i]==$allowed[$x])
			{	
				$invalid++;
			}
		}
		if($invalid==0)
		{
			return false;break;break;
		}
		$invalid=0;
	}
	return true;
}

if(($clientfirstname==" ") || (username($clientfirstname)==false) || (strlen($clientfirstname)<1))
{
	$clientfirstname_label="<font color=red>Please check this entry</font>";
	$set_for_correction=true;
}

if(($clientlastname==" ") || (username($clientlastname)==false) || (strlen($clientlastname)<1))
{
	$clientlastname_label="<font color=red>Please check this entry</font>";
	$set_for_correction=true;
}

if(($clientemail=="") || ( !preg_match("/^[^0-9][_A-Za-z0-9]+([.][A-z0-9_]+)*[@][A-Za-z0-9_]+([.][A-z0-9_]+)*[.][A-Za-z]{2,4}$/",$clientemail)))
{
	$clientemail_label="<font color=red>Please check this entry</font>";
	$set_for_correction=true;
}

if(address($clientaddress)==false)
{
	$clientaddress_label="<font color=red>Please Check the entry</font>";
	$set_for_correction=true;
}

if((zipcode($clientzipcode)==false) || (strlen($clientzipcode)<5) || (strlen($clientzipcode)>5))
{
	$clientzipcode_label="<font color=red>Please check your entered value</font>";
	$set_for_correction=true;
}

if(address($description)==false)
{
	$clientdescription_label="<font color=red>Please check your entered value</font>";
	$set_for_correction=true;
}

if(isset($set_for_correction)=="true")
{
	$err_msg="<font color=red>Please check the enteries in red color</font>";
	include('ClientAccountEdit.php');//?lawyerid=$lawyerid');
}
else
{
	if(isset($value1))	echo $value1;
	include('ClientAccountEditUpdate.php');
}
?>