<?php

// function to return the data fro mselected csv file
function open_file($file_name)
{
	$data = []; 	
	if (file_exists($file_name)) {
		//echo "The file $file_name exists";
			
			// users.csv
		$file = fopen($file_name,"r");
		
	
		while(! feof($file))
		  {
			array_push($data,fgetcsv($file));
			
			}
			
	} else {
		notes("The file $file_name does not exist, please check location or name");
	}
	return $data;
}