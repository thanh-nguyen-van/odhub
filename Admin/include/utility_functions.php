<?php
/**
 * 
 * @param type $id - country id
 */
function getCountryNameById($id){
    $returnArray = array();
    
    $sql = "SELECT * FROM lm_custom_country WHERE c_country_id ='".$id."'";
    $countryRS = mysql_query($sql)or die(mysql_error());
    if(mysql_num_rows($countryRS)>0) {
        $rowCountry = mysql_fetch_array($countryRS);
        $returnArray['c_country_name'] = $rowCountry['c_country_name'];
        $returnArray['c_country_id'] = $rowCountry['c_country_id'];
    }
    
    
    return $returnArray;
    
}
?>
