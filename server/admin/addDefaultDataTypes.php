<?php
//Temporary script for adding default dataTypes to All Hotels in DB
$query = "SELECT * FROM dataTypes";
$result = $db->fetchAll($query);
print_r($result);

$queryHotels = "SELECT hotelId FROM hotels";
$resultHotels = $db->fetchAll($queryHotels);

foreach ($resultHotels as $hotel){
	set_time_limit(100);
	foreach ($result as $types){
		$defaultTypes = explode(',', $types['defaultTypes']);
		foreach($defaultTypes as $val){
			$data = array(
						'typeId' 	=> $types['id'],
						'hotelId' 	=> $hotel['hotelId'],
						'value'		=> $val
			);
			$db->insert('dataTypeDefinitions', $data);
		}
	}
}

//Temporary script for adding rooms to All Hotels in DB
print_r($result);

$queryHotels = "SELECT hotelId FROM hotels";
$resultHotels = $db->fetchAll($queryHotels);

foreach ($resultHotels as $hotel){
	set_time_limit(100);
	$query = "SELECT * FROM dataTypeDefinitions WHERE hotelId=".$hotel['hotelId']." AND typeId=3";
	$result = $db->fetchAll($query);
	foreach ($result as $types){
		for($i = 1; $i<13; $i++){
			$data = array(
					'typeDefinitionId' 	=> $types['id'],
					'hotelId' 	=> $hotel['hotelId'],
					'roomNameOrNumber'		=> '#' . $i
			);
			$db->insert('hotelRooms', $data);	
		}	
	}
}