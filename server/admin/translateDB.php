<?php

$dbTranslationsPath = $config->rootPath . 'library/php/dbTranslations/';
$messages = array();
$tablesAndFieldsForTranslation = array(
	'0' => array(
				'table' => 'resources',
				'field' => 'name'
				),
	'1' => array(
				'table' => 'countries',
				'field' => 'name'
				),
	'2' => array(
				'table' => 'propertyType',
				'field' => 'name'
				),
	'3' => array(
				'table' => 'ammenities',
				'field' => 'name'
				),
	'4' => array(
				'table' => 'payments',
				'field' => 'status'
				),
	'5' => array(
				'table' => 'dataTypes',
				'field' => 'name'
				),
	'6' => array(
				'table' => 'reservations',
				'field' => 'status',
				'enum_options_translation' => true
				)
);

foreach($tablesAndFieldsForTranslation as $a){	
	$content = '<?php ';
	if(true === $a['enum_options_translation']){
	    //translate only enum options of the field of ENUM type
	    $query = "SHOW COLUMNS FROM " . $a['table'] . " LIKE  '" . $a['field'] . "'";
	    $result = $db->fetchAll($query);
	    $type = $result[0]['Type'];
	    $defaultValues = str_ireplace('enum(', '', $type);
	    $defaultValues = str_ireplace(')', '', $defaultValues);
	    $defaultValues = trim(str_ireplace("'", '', $defaultValues));
	    $arrayOfDefaultVal = explode(',', $defaultValues);
	    foreach($arrayOfDefaultVal as $b){
	        $content .= '$lang->translate("' . $b . '");';
	    }
	} else {
    	$query = "SELECT " . $a['field'] . " FROM " . $a['table'];
    	$result = $db->fetchAll($query);
    	foreach($result as $b){
    		$content .= '$lang->translate("' . $b[$a['field']] . '");';
    	}
	}
	$content .= ' ?>';
	$fp = fopen($dbTranslationsPath . $a['table'] . '_' . $a['field'] . '.php', 'w+');
	if(fputs($fp, $content)){
		$messages[] = 'Table "' . $a['table'] . '", field "' . $a['field'] . '" translated!';
	} else {
		$messages[] = '<span style="color: red;">Table "' . $a['table'] . '", field "' . $a['field'] . '" translation error!</span>';
	}
	fclose($fp);	
}
$smarty->assign('messages', $messages);
?>