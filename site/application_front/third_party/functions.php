<?php
function pr($arr,$e=1)
{
	if(is_array($arr))
	{
		echo "<pre>";
		print_r($arr);
		echo "</pre>";		
	}
	else
	{
		echo "<br>Not an array...<br>";
		echo "<pre>";
		var_dump($arr);
		echo "</pre>";
	}
	if($e==1)
	{
		exit();
	}
	else
	{
		echo "<br>";
	}
		
}

function inputEscapeString($str,$Type='DB',$htmlEntitiesEncode = false)
{
	if($Type === 'DB')
	{
		if(get_magic_quotes_gpc()===0)
		{
			$str = addslashes($str);
		}
	}
	elseif($Type === 'FILE')
	{
		if(get_magic_quotes_gpc()===1)
		{
			$str = stripslashes($str);	
		}
	}
	else
	{
		$str = $str;
	}
	
	if($htmlEntitiesEncode === true)
	{
		$str = htmlentities($str,ENT_COMPAT,'UTF-8');
		//$str = htmlentities($str);
		//$str = htmlspecialchars($str);
	}
	return $str;
}

function outputEscapeString($str,$Type = 'INPUT', $htmlEntitiesDecode = false )
{
	
	if(get_magic_quotes_runtime()==1)
	{
		$str = stripslashes($str);	
	}
	
	if($htmlEntitiesDecode === true )
	{
		$str = html_entity_decode($str,ENT_COMPAT,'UTF-8');
	}
	elseif($Type == 'TEXTAREA')
	{
		$str = $str;
	}
	elseif($Type == 'HTML')
	{
		$str = nl2br($str);
	}
	else
	{
		$str = $str;
	}
	
	return ($str);
}
	
if ( ! function_exists('file_upload_absolute_path'))
{
	function file_upload_absolute_path()
	{
		$CI =& get_instance();
		return $CI->config->slash_item('file_upload_absolute_path');
	}
}

if ( ! function_exists('file_upload_base_url'))
{
	function file_upload_base_url()
	{
		$CI =& get_instance();
		return $CI->config->slash_item('file_upload_base_url');
	}
}

if ( ! function_exists('server_absolute_path'))
{
	function server_absolute_path()
	{
		$CI =& get_instance();
		return $CI->config->slash_item('server_absolute_path');
	}
}
if ( ! function_exists('front_base_url'))
{
	function front_base_url()
	{
		$CI =& get_instance();
		return $CI->config->slash_item('front_base_url');
	}
}
if ( ! function_exists('css_images_js_base_url'))
{
	function css_images_js_base_url()
	{
		$CI =& get_instance();
		return $CI->config->slash_item('css_images_js_base_url');
	}
}
//Create array from xml data 
function xml2array($domnode)
{
    $nodearray = array();
    $domnode = $domnode->firstChild;
    while (!is_null($domnode))
    {
        $currentnode = $domnode->nodeName;
        switch ($domnode->nodeType)
        {
            case XML_TEXT_NODE:
                if(!(trim($domnode->nodeValue) == "")) $nodearray['cdata'] = $domnode->nodeValue;
            break;
            case XML_ELEMENT_NODE:
                if ($domnode->hasAttributes() )
                {
                    $elementarray = array();
                    $attributes = $domnode->attributes;
                    foreach ($attributes as $index => $domobj)
                    {
                        $elementarray[$domobj->name] = $domobj->value;
                    }
                }
            break;
        }
        if ( $domnode->hasChildNodes() )
        {
            $nodearray[$currentnode][] = xml2array($domnode);
            if (isset($elementarray))
            {
                $currnodeindex = count($nodearray[$currentnode]) - 1;
                $nodearray[$currentnode][$currnodeindex]['@'] = $elementarray;
            }
        } else {
            if (isset($elementarray) && $domnode->nodeType != XML_TEXT_NODE)
            {
                $nodearray[$currentnode]['@'] = $elementarray;
            }
        }
        $domnode = $domnode->nextSibling;
    }
    return $nodearray;
}

function properDate($dt, $format = "d-m-Y")
{
	if($dt == '')
	{
		return $dt;
	}
	$dt1 =  date($format,strtotime($dt));
	return $dt1;
}

function properDateTime($dt, $format = "d-m-Y G:i")
{
	if($dt == '')
	{
		return $dt;
	}
	$dt1 =  date($format,strtotime($dt));
	return $dt1;
}
function properDate2Mysql($dt, $format = "Y-m-d")
{
	if($dt == '')
	{
		return $dt;
	}
	$dt1 =  date($format,strtotime($dt));
	return $dt1;
}
  function dateDiff($time1, $time2, $precision = 6) {
    // If not numeric then convert texts to unix timestamps
    if (!is_int($time1)) 
	{
      $time1 = strtotime($time1);
    }
    if (!is_int($time2)) 
	{
      $time2 = strtotime($time2);
    }
 
    // If time1 is bigger than time2
    // Then swap time1 and time2
    if ($time1 > $time2) {
      $ttime = $time1;
      $time1 = $time2;
      $time2 = $ttime;
    }
 
    // Set up intervals and diffs arrays
    $intervals = array('Year','Month','Day','Hour','Minute','Second');
    $diffs = array();
 
    // Loop thru all intervals
    foreach ($intervals as $interval) 
	{
      // Set default diff to 0
      $diffs[$interval] = 0;
      // Create temp time from time1 and interval
      $ttime = strtotime("+1 " . $interval, $time1);
      // Loop until temp time is smaller than time2
      while ($time2 >= $ttime) 
	  {
		$time1 = $ttime;
		$diffs[$interval]++;
		// Create new temp time from time1 and interval
		$ttime = strtotime("+1 " . $interval, $time1);
      }
    }
 
    $count = 0;
    $times = array();
    // Loop thru all diffs
    foreach ($diffs as $interval => $value) 
	{
      // Break if we have needed precission
      if ($count >= $precision) 
	  {
		break;
      }
      // Add value and interval 
      // if value is bigger than 0
		// Add s if value is not 1
		if ($value != 1) 
		{
		  $interval .= "s";
		}
		// Add value and interval to times array
		$times[] = $interval . ":&nbsp;" . $value."";
		$count++;
    }
 
    // Return string with times
    return implode(", ", $times);
  }
// location kolkata/mumbai
// 0 => Kolkata 
// 1 => Mumbai   
// admin email address
// testing mode option
if ( ! function_exists('properName'))
{
	function properName($fname,$lname)
        {
            return $fname.' '.substr($lname,0,1);
        }
}

 // --- check Pay release --- //
    function checkPayRelease($project_id,$client_id,$professional_id){
        return BASEPATH.'database/DB.php';
        //$db = DB('default', true);
        //$db->where(array('project_id'=>$project_id,'client_id'=>$client_id,'$professional_id'=>$professional_id,)); 
       //return $db->get('payrelese_history'); 
       //return $project_id; 
    }
    // --- check Pay release --- //
   

?>