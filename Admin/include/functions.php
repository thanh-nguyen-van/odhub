<?php

function my_addslashes($str)
{
    if(get_magic_quotes_gpc()===0)
    {
            $str = addslashes($str);
    }
    return $str;
    
}

function my_stripslashes($str)
{
    if(get_magic_quotes_runtime()==1)
    {
            $str = stripslashes($str);	
    }
    return $str;
}
function mysq2ProperDate($date,$format='m/d/Y')
{
    return(date($format,  strtotime($date)));
}
function time2Properdate($time,$format='m/d/Y')
{
    return(date($format,  $time));
}
function properDate2Mysql($date,$format='Y-m-d')
{
    return date($format,  strtotime($date));
}
function showStatus($status)
{
    return ($status=='A'?'Active':'Inactive');
}
?>
