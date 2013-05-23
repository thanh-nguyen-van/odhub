<?php
	 session_start();
    // include('include/adminheader.php');
     include('include/connect.php');
     
	 $error = '0';
	 $msg 	= array();
	 
	 $skill 		= (isset($_REQUEST['skill']))?$_REQUEST['skill']:'';
     $project_name = $_REQUEST['title'];
     //$skill 	   = $_REQUEST['skill'];
     
     $description  = $_REQUEST['description'];
     $category     = $_REQUEST['project_category'];
     $location     = $_REQUEST['location'];
     $w9_status    = $_REQUEST['w9_status'];
     $job_type     = $_REQUEST['job_type'];
     $price        = $_REQUEST['price'];
     $project_id   = $_REQUEST['caseid'];
	 																							/////// Start of validation
	 if( $project_name == '')
	 {
		 $error 	   = '1';
		 $msg['title'] = "Title can not be left blank."; 
	 }
     if( $description == '')
	 {
		 $error 	   		 = '1';
		 $msg['description'] = "Description can not be left blank."; 
	 }
	 if( $category == '')
	 {
		 $error 	   			  = '1';
		 $msg['project_category'] = "Select a Category."; 
	 }
	 if( $location == '')
	 {
		 $error 	   	  = '1';
		 $msg['location'] = "State can not be left blank."; 
	 }
	 if( $w9_status == '')
	 {
		 $error 	   	   = '1';
		 $msg['w9_status'] = "Select a status."; 
	 }
	 if( $job_type == '')
	 {
		 $error 	   	  = '1';
		 $msg['job_type'] = "Job type can not be left blank."; 
	 }
	 if( $price == '')
	 {
		 $error 	   	  = '1';
		 $msg['price'] = "Price can not be left blank."; 
	 }
	 
	 if($skill == '')
	 {
		$error 	   	  	 = '1';
		$msg['skill'] = "Chose a skill.";  
	 }
	
	 																					// End of validation
	 if($error == '1')																	// Error checking
	 {
		 $_SESSION['error'] = '1';
		 $_SESSION['msg']	= $msg;
		 
		  /*echo $error."<pre>";
		  print_r($msg);
		  exit;*/
		 header("location: CaseEdit.php?caseid=".$project_id);
	 }
	 else																				// If no error occurred
	 {
																						 ////// updating project details table
		 
     	$sql_update_project_details = "update `project_details` set `project_name`='".escapeAndAddSlash($project_name)."',`project_description`='".
										escapeAndAddSlash($description)."',`project_category`='".escapeAndAddSlash($category)."',`state`='".
										escapeAndAddSlash($location)."',`w9_required`='".escapeAndAddSlash($w9_status)."',`job_type`='".
										escapeAndAddSlash($job_type)."',`start_price`='".escapeAndAddSlash($price)."' Where `project_id` = ".$project_id;
									
		mysql_query($sql_update_project_details);										
		 
		 																					/////// deleting related data from project skill map table 
		 
		 $sql_remove_skill = "delete from `project_skill_map` where `project_id`='".$project_id."'";
		 mysql_query($sql_remove_skill);
			  
		 
		 for($i=0;$i<count($skill);$i++){
			 $skill_map_values[$i] = "('".$project_id."','".$skill[$i]."')";     
		    }
		 
		 $skill_map_values = implode(', ',$skill_map_values);
		 
		 																					////// Inserting related data into project skill map table  
		 
		$sql_insert_skill = "INSERT INTO `project_skill_map`(`project_id`,`skill_id`) VALUES ".$skill_map_values; 
		 mysql_query($sql_insert_skill);
		 
		 
		 header("location: PostedProjects.php");
	 
	 }
	 
	 
	 function escapeAndAddSlash($value)
	 {
		 return addslashes(mysql_real_escape_string($value));
	 }
	 
	    
?>