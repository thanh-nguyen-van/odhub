<?
$lawyerfirstname=$_REQUEST['lawyerfirstname'];
$lawyerlastname=$_REQUEST['lawyerlastname'];
$lawyerpassword=$_REQUEST['lawyerpassword'];
$confirmpass=$_REQUEST['confirmpass'];
$state=$_REQUEST['state'];
$lawyeraddress=$_REQUEST['lawyeraddress'];
$address=ereg_replace("\r\n\r\n|\n\n|\r\r","<p>",$lawyeraddress);
$address=stripcslashes(ereg_replace("\r\n|\n|\r","<br/>",$address));
$lawyerzipcode=$_REQUEST['lawyerzipcode'];
$lawyerdescription=$_REQUEST['lawyerdescription'];
$description=ereg_replace("\r\n\r\n|\n\n|\r\r","<p>",$lawyerdescription);
$description=stripcslashes(ereg_replace("\r\n|\n|\r","<br/>",$description));
$activationcode=$_REQUEST['activationcode'];
$lawyeremail=$_REQUEST['lawyeremail'];
$usertype=$_REQUEST['usertype'];
$expertise=$_REQUEST['expertise'];
$country=$_REQUEST['country'];
$lawyeryear=$_REQUEST['lawyeryear'];
$lawyeruniversity=$_REQUEST['lawyeruniversity'];
$lawyerdegree=$_REQUEST['lawyerdegree'];
$degree=ereg_replace("\r\n\r\n|\n\n|\r\r","<p>",$lawyerdegree);
$degree=stripcslashes(ereg_replace("\r\n|\n|\r","<br/>",$degree));
$lawyercharges=$_REQUEST['lawyercharges'];
$lawyerachievements=$_REQUEST['lawyerachievements'];
$achievements=ereg_replace("\r\n\r\n|\n\n|\r\r","<p>",$lawyerachievements);
$achievements=stripcslashes(ereg_replace("\r\n|\n|\r","<br/>",$achievements));
$lawyerspecialized=$_REQUEST['lawyerspecialized'];
$specialized=ereg_replace("\r\n\r\n|\n\n|\r\r","<p>",$lawyerspecialized);
$specialized=stripcslashes(ereg_replace("\r\n|\n|\r","<br/>",$specialized));
$lawyerkeyword=$_REQUEST['lawyerkeyword'];
$lawyerid=$_REQUEST['lawyerid'];


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
		if($invalid==0)
		{
			return false;break;break;
		}
		$invalid=0;
	}
	return true;
}

function password($strg)
{
	$invalid=0;
	$allowed="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
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

if(($lawyerfirstname==" ") || (username($lawyerfirstname)==false) || (strlen($lawyerfirstname)<1))
{
	$lawyerfirstname_label="<font color=red>Please check this entry</font>";
	$set_for_correction=true;
}

if(($lawyerlastname==" ") || (username($lawyerlastname)==false) || (strlen($lawyerlastname)<1))
{
	$lawyerlastname_label="<font color=red>Please check this entry</font>";
	$set_for_correction=true;
}

if($lawyerpassword==" ")
{
	$lawyerpassword_label="<font color=red>Plaese make a  entry</font>";
	$set_for_correction=true;
}

if($confirmpass=="")
{
	$confirmpass_label="<font color=red>Please make a entry</font>";
	$set_for_correction=true;
}

if($lawyerpassword!=" ")
{
	if((password($lawyerpassword)==false) || (strlen($lawyerpassword)<4) || (strlen($lawyerpassword)>10))
	{
		$lawyerpassword_label="<font color=red>Please check the entry</font>";
		$set_for_correction=true;
	}
}

if(strcmp($lawyerpassword, $confirmpass))
{
	$reenter_label="<font color=red>Your password enteries must match.Please enter them again.</font>";
	$set_for_correction=true;
}

if($expertise!="")
{
	foreach($expertise as $value)
	{
		$value1.=",".$value;
	}
	$lawarea=$value1.",";
}

if(address($address)==false)
{
	$lawyeraddress_label="<font color=red>Please Check the entry</font>";
	$set_for_correction=true;
}

if((zipcode($lawyerzipcode)==false) || (strlen($lawyerzipcode)<5) || (strlen($lawyerzipcode)>5))
{
	$lawyerzipcode_label="<font color=red>Please check your entered value</font>";
	$set_for_correction=true;
}

if(address($description)==false)
{
	$lawyerdescription_label="<font color=red>Please check your entered value</font>";
	$set_for_correction=true;
}

if($lawyeryear!="")
{
	if(zipcode($lawyeryear)==false)
	{
		$lawyeryear_label="<font color=red>Year should be integer value.</font>";
		$set_for_correction=true;
	}
}

if($lawyeruniversity!="")
{
	if(address($lawyeruniversity)==false)
	{
		$lawyeruniversity_label="<font color=red>Check the entred value.</font>";
		$set_for_correction=true;
	}
}

if($degree!="")
{
	if(address($degree)==false)
	{
		$lawyerdegree_label="<font color=red>Please check the entired value.</font>";
		$set_for_correction=true;
	}
}

if($specialized!="")
{
	if(address($specialized)==false)
	{
		$lawyerspecialized_label="<font color=red>Please check the entered value.</font>";
		$set_for_correction=true;
	}
}

if($lawyercharges!="")
{
	if(zipcode($lawyercharges)==false)
	{
		$lawyercharges_label="<font color=red>Year should be integer value.</font>";
		$set_for_correction=true;
	}
}

if($achievements!="")
{
	if(address($achievements)==false)
	{
		$lawyerachievements_label="<font color=red>Year should be integer value.</font>";
		$set_for_correction=true;
	}
}

if(($lawyeremail=="") || ( !preg_match("/^[^0-9][_A-Za-z0-9]+([.][A-z0-9_]+)*[@][A-Za-z0-9_]+([.][A-z0-9_]+)*[.][A-Za-z]{2,4}$/",$lawyeremail)))
{
	$lawyeremail_label="<font color=red>Check your entry</font>";
	$set_for_correction="true";
}

if($set_for_correction=="true")
{
	$err_msg="<font color=redPlease check the enteries in red color</font>";
	include('LawyerAccountEdit.php');
}

else
{
	include('LawyerAccountEditUpdate.php');
}
?>