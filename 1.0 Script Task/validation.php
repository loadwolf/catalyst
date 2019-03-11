<?php
//Cleanse and validate email address - return blank if fails checks
function validate_email($email)
{
	
	$email =  preg_replace('/[^A-Za-z0-9\-@.]/', '', $email);
	//Cleanse accidental extra speaces and apostriphies

	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$email = null; 
	  }else{
		$email = filter_var($email, FILTER_VALIDATE_EMAIL);
		}
		if($email == null){
			notes( "\n		||		The following email could not be processed ".$email);
		}
		//return email blank and stop processing
		
	 return $email;
}

// Removes special chars.
function clean($string) {  
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); 
 }

function capital_first($string)
{
    return ucfirst(clean($string));
}