<?php

if($_SERVER["HTTP_HOST"]=="localhost" || $_SERVER["HTTP_HOST"]=="192.168.1.61" || $_SERVER["HTTP_HOST"]=="192.168.1.50") // for local
{		

    $db='odhub';
    $connect=mysql_connect("localhost", "root", "");
    
        mysql_select_db($db,$connect);



}

else if($_SERVER["HTTP_HOST"]=="projects.arcinfotec.com") // for local
{



           $connect=mysql_connect("localhost", "arcinfo_odhub", "3iAW57TcMOIn");

                $db=mysql_select_db("arcinfo_odhub",$connect);

}

	

else
{

        //$siteURL="http://exactllydigital.com/demo/reachlawyer_new";

        //$mailURL="http://exactllydigital.com/demo/reachlawyer_new";

}

require_once('var.inc.php');
require_once('cms.class.php');
require_once('class.image-resize.php');
require_once('functions.php');


?>