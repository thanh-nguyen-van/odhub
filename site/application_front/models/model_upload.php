<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_upload extends CI_Model 
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	public function fileUpload(&$uploadFileData,$field,$config1)
	{
		$this->upload->set_config($config1);
	
		$r = $this->upload->do_upload($field,true);

		$uploadFileData[$field]			= $this->upload->file_name;
		$uploadFileData[$field.'_err']	= $this->upload->display_errors();

		return $r;
	}
        
    public function thumbnail($file_name,$dir)
	{
		$tag        		= '';
		$Twidth     		= '40';
		$Theight    		= '40';
		$uploaddir  		= file_upload_absolute_path().$dir.'/';
		$thumb_file_name  	= $file_name;
		$dest       		= $uploaddir.'thumb/'.$thumb_file_name;
		$src        		= $uploaddir.$file_name;
		$this->upload->create_thumbnail($dest,$src,$Twidth,$Theight,$tag);		
	}
        
    public function resized($file_name,$dir)
	{
		$tag        		= '';
		$Twidth     		= '100';
		$Theight    		= '100';
		$uploaddir  		= file_upload_absolute_path().$dir.'/';
		$thumb_file_name  	= $file_name;
		$dest       		= $uploaddir.'resized/'.$thumb_file_name;
		$src        		= $uploaddir.$file_name;
		$this->upload->create_thumbnail($dest,$src,$Twidth,$Theight,$tag);		
	}
	
}

/* End of file upload.php */
/* Location: ./application_front/controllers/upload.php */