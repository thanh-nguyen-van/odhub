<?php
class Cms{
    
    public function get_page_content($condition)
    {
        $dataQuery="SELECT * FROM ".$GLOBALS['table']['staticpage']." $condition";
        $dataResult=mysql_query($dataQuery) or die($dataQuery);
        return $row=mysql_fetch_array($dataResult); 
    }
}

?>
