<?
include('../include/adminheader.php');
include('../include/connect.php');

if(isset($_FILES['upload'])){
	
	//echo "AAAAAAAA";exit;
  // ------ Process your file upload code -------
  		
        $filen = $_FILES['upload']['tmp_name']; 
		
		$document_root = $_SERVER['DOCUMENT_ROOT'].'/odhub/Upload/';
		//$document_root = './uploaded/';
		
        $con_images1 = $document_root.time().$_FILES['upload']['name'];
		$con_images = time().$_FILES['upload']['name'];
		
		//$con_images = $_FILES['upload']['name'];
        move_uploaded_file($filen, $con_images1 );
       $url = $config['UPLOAD_URL'].$con_images;

   $funcNum = $_GET['CKEditorFuncNum'] ;
   // Optional: instance name (might be used to load a specific configuration file or anything else).
   $CKEditor = $_GET['CKEditor'] ;
   // Optional: might be used to provide localized messages.
   $langCode = $_GET['langCode'] ;
    
   // Usually you will only assign something here if the file could not be uploaded.
   $message = '';
   echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
}
?>