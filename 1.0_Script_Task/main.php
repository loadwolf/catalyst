<?php
require_once('validation.php');
require_once('db.php');






function main($data,$options){
	//note telling user how to enable option
	
	for ($x = 1; $x < sizeof($data)-1; $x++) {
		$line = $data[$x];

		$email = (validate_email(strtolower($line[2])));
		$name = (capital_first(strtolower($line[0])));
		$surname = (capital_first(strtolower($line[1])));
		
		if($email != null)
		{			
			if($options['dry_run'] != 'y'){				
				$result = add_to_db($name, $surname, $email,$options['hostname'],$options['username'], $options['password']);
				if ($result == 'success' ){notes("user  [".$name." ".$surname."  ==  ".$email."] added ");}
			}else{
				notes("insert option disabled for [".$name." ".$surname."  ==  ".$email."] - entry not added ");				
			}		

		}else{
			
			
				warning("User data failed validation [".$name." ".$surname."  ==  ".$line[2]."] please check email");
		
		}
			
	}	  
}

