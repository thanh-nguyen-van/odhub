<?php
class MY_Upload extends CI_Upload
{
  
  	var $optional	= TRUE;

	function __construct()
	{
		parent::__construct();
	}  	
  	
	function set_config($props = array())
	{
		
		if (count($props) > 0)
		{
			$this->initialize($props);
		}
		
		log_message('debug', "Upload Class Initialized");
	}
 	
	
	function initialize($config = array())
	{
		$defaults = array(
							'max_size'			=> 0,
							'max_width'			=> 0,
							'max_height'		=> 0,
							'max_filename'		=> 0,
							'allowed_types'		=> "",
							'file_temp'			=> "",
							'file_name'			=> "",
							'orig_name'			=> "",
							'file_type'			=> "",
							'file_size'			=> "",
							'file_ext'			=> "",
							'upload_path'		=> "",
							'overwrite'			=> FALSE,
							'encrypt_name'		=> FALSE,
							'is_image'			=> FALSE,
							'image_width'		=> '',
							'image_height'		=> '',
							'image_type'		=> '',
							'image_size_str'	=> '',
							'error_msg'			=> array(),
							'mimes'				=> array(),
							'remove_spaces'		=> TRUE,
							'xss_clean'			=> FALSE,
							'temp_prefix'		=> "temp_file_",
							'optional'			=> TRUE
						);	
	
	
		foreach ($defaults as $key => $val)
		{
			if (isset($config[$key]))
			{
				$method = 'set_'.$key;
				if (method_exists($this, $method))
				{
					$this->$method($config[$key]);
				}
				else
				{
					$this->$key = $config[$key];
				}			
			}
			else
			{
				$this->$key = $val;
			}
		}
	}
	
	
	function do_upload($field = 'userfile',$isTimestamp = false,$fname = "")
	{
		// Is $_FILES[$field] set? If not, no reason to continue.
		if ( ! isset($_FILES[$field]))
		{
			$this->set_error('upload_no_file_selected');
			return FALSE;
		}
		
		
		
		// Is the upload path valid?
		if ( ! $this->validate_upload_path())
		{
			// errors will already be set by validate_upload_path() so just return FALSE
			return FALSE;
		}
		
		
		
		
		// Was the file able to be uploaded? If not, determine the reason why.
		if ( ! is_uploaded_file($_FILES[$field]['tmp_name']))
		{
			
			$error = ( ! isset($_FILES[$field]['error'])) ? 4 : $_FILES[$field]['error'];

			switch($error)
			{
				case 1:	// UPLOAD_ERR_INI_SIZE
					$this->set_error('upload_file_exceeds_limit');
					break;
				case 2: // UPLOAD_ERR_FORM_SIZE
					$this->set_error('upload_file_exceeds_form_limit');
					break;
				case 3: // UPLOAD_ERR_PARTIAL
				   $this->set_error('upload_file_partial');
					break;
				case 4: // UPLOAD_ERR_NO_FILE
				   
				   if($this->optional)
				   {
				   		return true;
				   }
				   
				   $this->set_error('upload_no_file_selected');
				   break;
				
				
				case 6: // UPLOAD_ERR_NO_TMP_DIR
					$this->set_error('upload_no_temp_directory');
					break;
				case 7: // UPLOAD_ERR_CANT_WRITE
					$this->set_error('upload_unable_to_write_file');
					break;
				case 8: // UPLOAD_ERR_EXTENSION
					$this->set_error('upload_stopped_by_extension');
					break;
				default :   $this->set_error('upload_no_file_selected');
					break;
			}

			return FALSE;
		}
		
		
		// Set the uploaded data as class variables
		$this->file_temp = $_FILES[$field]['tmp_name'];		
		
		$this->file_name = $this->_prep_filename($_FILES[$field]['name']);
		
		if($isTimestamp)
		{
			$parts		= explode('.', $_FILES[$field]['name']);
			$ext		= array_pop($parts);
			$filename	= array_shift($parts);
			$this->file_name = $filename."_".time().".".$ext;
		}
		
		if($fname <> "")
		{
			$this->file_name = $fname;
		}
		
		$this->file_size = $_FILES[$field]['size'];		
		$this->file_type = preg_replace("/^(.+?);.*$/", "\\1", $_FILES[$field]['type']);
		
		
		$this->file_type = strtolower($this->file_type);
		$this->file_ext	 = $this->get_extension($_FILES[$field]['name']);
		
		// Convert the file size to kilobytes
		if ($this->file_size > 0)
		{
			$this->file_size = round($this->file_size/1024, 2);
		}

		// Is the file type allowed to be uploaded?
		if ( ! $this->is_allowed_filetype($field))
		{
			$this->set_error('upload_invalid_filetype');
			return FALSE;
		}
		
		// Is the file size within the allowed maximum?
		if ( ! $this->is_allowed_filesize())
		{
			$this->set_error('upload_invalid_filesize');
			return FALSE;
		}



		// Are the image dimensions within the allowed size?
		// Note: This can fail if the server has an open_basdir restriction.
		if ( ! $this->is_allowed_dimensions())
		{
			$this->set_error('upload_invalid_dimensions');
			return FALSE;
		}

		// Sanitize the file name for security
		$this->file_name = $this->clean_file_name($this->file_name);
		
		// Truncate the file name if it's too long
		if ($this->max_filename > 0)
		{
			$this->file_name = $this->limit_filename_length($this->file_name, $this->max_filename);
		}

		// Remove white spaces in the name
		if ($this->remove_spaces == TRUE)
		{
			$this->file_name = preg_replace("/\s+/", "_", $this->file_name);
		}

		/*
		 * Validate the file name
		 * This function appends an number onto the end of
		 * the file if one with the same name already exists.
		 * If it returns false there was a problem.
		 */
		$this->orig_name = $this->file_name;

		if ($this->overwrite == FALSE)
		{
			$this->file_name = $this->set_filename($this->upload_path, $this->file_name);
			
			if ($this->file_name === FALSE)
			{
				return FALSE;
			}
		}

		
		
		/*
		 * Move the file to the final destination
		 * To deal with different server configurations
		 * we'll attempt to use copy() first.  If that fails
		 * we'll use move_uploaded_file().  One of the two should
		 * reliably work in most environments
		 */
		if ( ! @copy($this->file_temp, $this->upload_path.$this->file_name))
		{
			if ( ! move_uploaded_file($this->file_temp, $this->upload_path.$this->file_name))
			{
				 $this->set_error('upload_destination_error');
				 return FALSE;
			}
		}
		
		
		/*
		 * Run the file through the XSS hacking filter
		 * This helps prevent malicious code from being
		 * embedded within a file.  Scripts can easily
		 * be disguised as images or other file types.
		 */
		if ($this->xss_clean == TRUE)
		{
			$this->do_xss_clean();
		}


		
		/*
		 * Set the finalized image dimensions
		 * This sets the image width/height (assuming the
		 * file was an image).  We use this information
		 * in the "data" function.
		 */
		$this->set_image_properties($this->upload_path.$this->file_name);
		
		return TRUE;
	}
	
	
	function is_allowed_filetype($field)
	{
		if (count($this->allowed_types) == 0 OR ! is_array($this->allowed_types))
		{
			$this->set_error('upload_no_file_types');
			return FALSE;
		}

		$image_types = array('gif', 'jpg', 'jpeg', 'png', 'jpe' );

		foreach ($this->allowed_types as $val)
		{
			$mime = $this->mimes_types(strtolower($val));
			
			if(isset($_FILES[$field]['name']))
			{
				$filename = strtolower($_FILES[$field]['name']) ; 
				$exts = explode(".",$filename) ; 
				if(!is_array($exts))
					return false;
				$n = count($exts)-1;
				$exts1 = strtolower($exts[$n]);
			}

			
			if(isset($_FILES[$field]['name']))
			{
				$filename = strtolower($_FILES[$field]['name']) ; 
				$exts = explode(".",$filename) ; 
				if(!is_array($exts))
					return false;
				$n = count($exts)-1;
				$exts1 = strtolower($exts[$n]);
			}
			
			// Images get some additional checks
			if(isset($exts1))
			{
				if(in_array($exts1, $image_types))
				{
					if (in_array($val, $image_types))
					{
						$imgSize = @getimagesize($this->file_temp);
						 
						if ($imgSize === FALSE)
						{
							return FALSE;
						}
					}
				}
			}

			if (is_array($mime))
			{	
				if (in_array($this->file_type, $mime, TRUE))
				{
					return TRUE;
				}
			}
			else
			{
				if ($mime == $this->file_type)
				{
					return TRUE;
				}	
			}		
		}
		
		return FALSE;
	}
	
	
	function create_thumbnail($filethumb,$file,$Twidth,$Theight,$tag)
	{
		
		$objBMP= load_class('phpthumb_bmp');
		$objPhpThumb= load_class('phpthumb_functions');
		
		list($width,$height,$type,$attr)=getimagesize($file);
		switch($type)
		{
			case 1:
				$img = imagecreatefromgif($file);
			break;
			case 2:
				$img=imagecreatefromjpeg($file);
			break;
			case 3:
				$img=imagecreatefrompng($file);
			break;
			case 6:
				$img=$objBMP->phpthumb_bmpfile2gd($file);
			break;
		}
		if($tag == "width") //width contraint
		{
			$Theight=round(($height/$width)*$Twidth);
		}
		elseif($tag == "height") //height constraint
		{
			$Twidth=round(($width/$height)*$Theight);
		}
		else
		{
			if($width > $height)
				$Theight=round(($height/$width)*$Twidth);
			else
				$Twidth=round(($width/$height)*$Theight);
		}
		$thumb=imagecreatetruecolor($Twidth,$Theight);
		
		if(imagecopyresampled($thumb,$img,0,0,0,0,$Twidth,$Theight,$width,$height))
		{
			
			switch($type)
			{
				case 1:
					imagegif($thumb,$filethumb);
				break;
				case 2:
					imagejpeg($thumb,$filethumb);
				break;
				case 3:
					imagepng($thumb,$filethumb);
				break;
				case 6:
					
					$data = $objBMP->GD2BMPstring($thumb);
					$fp = fopen($filethumb,"wb");
					fwrite($fp,$data);
					fclose($fp);
					
				break;
			}
			chmod($filethumb,0666);
			return true;
		}
	}
		
}
?>
