<?php

session_start();
//error_reporting(1);
error_reporting(E_ALL ^ E_NOTICE);
if ($_SERVER["HTTP_HOST"] == "localhost" || $_SERVER["HTTP_HOST"] == "192.168.1.61" || $_SERVER["HTTP_HOST"] == "192.168.1.50") 
{ // for local
    define("SERVERPATH", "http://" . $_SERVER['HTTP_HOST'] . "/odhub/Admin/");

    $siteURL = SERVERPATH;
    $mailURL = SERVERPATH;
    
    $publicURL=SERVERPATH.'public/';
} 
else if ($_SERVER["HTTP_HOST"] == "projects.arcinfotec.com") 
{ // for local
    define("SERVERPATH", "http://" . $_SERVER['HTTP_HOST'] . "/odhub/odhub/Admin/");

    $siteURL = SERVERPATH;

    $mailURL = SERVERPATH;
    $publicURL=SERVERPATH.'public/';
}
else 
{

    //$siteURL="http://exactllydigital.com/demo/reachlawyer_new";
    //$mailURL="http://exactllydigital.com/demo/reachlawyer_new";
}
$config['From_Mail'] = 'admin@odhub.com';
$config['From_Name'] = 'OD hub team';
$config['UPLOAD_PATH'] = $_SERVER['DOCUMENT_ROOT']."/odhub/upload/";
$config['UPLOAD_URL']="http://" .$_SERVER['HTTP_HOST']."/odhub/upload/";
$config['RESIZEDWIDTH']="988";
$config['RESIZEDHEIGHT']="415";
$config['THUMBWIDTH']="80";
$config['THUMBHEIGHT']="60";

?>