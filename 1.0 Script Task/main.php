<?php
require_once('validation.php');
require_once('db.php');






function main($data,$options){
	//note telling user how to enable option
	
	for ($x = 1; $x < sizeof($data)-1; $x++) {
		$line = $data[$x];
		var_dump(validate_email(strtolower($line[2])));
		if(validate_email(strtolower($line[2])) != null)
		{
			$email = (validate_email(strtolower($line[2])));

			$name = (capital_first(strtolower($line[0])));

			$surname = (capital_first(strtolower($line[1])));
		
			notes('main2'.$email);
			if($options['dry_run'] != 'y'){				
				add_to_db($name, $surname, $email,$options['hostname'],$options['username'], $options['password']);
				notes("user  [".$name." ".$surname."  ==  ".$email."] added ");
			}else{
				notes("insert option disabled for [".$name." ".$surname."  ==  ".$email."] - entry not added ");				
			}		

		}else{
			notes('main error');
			//output to error file
		}	  
	}

	notes('-------------------------');
}