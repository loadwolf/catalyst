#!/usr/bin/php
<?php
    //var_dump($argc); //number of arguments passed 
    //var_dump($argv); //the arguments passed
	
	//var_dump($argv);
function notes($notes)
{
	echo "\n		|| ".$notes;
}

function warning($notes)
{
	notes("ATTENTION NEEDED ");
	notes('      >>> '.$notes);
	notes('');
}

	
function get_options($argv,$argc){
	echo "
		||=====================================================================================================
		|| PROGRAM NOTES
		||=====================================================================================================";
	for($i = 0; $i < $argc; $i++){
	
	
		switch ($argv[$i]) {
			case '--file':
				# code...
			   // echo "--file = TRUE";
				$options['file'] = $argv[$i+1];
				break;
			case '--create_table':
				# code...
			   // echo "--create_table = ".$argv[$i+1];
				$options['create_table'] = 'y';
				break;
			case '--dry_run':
				# code...
			   // echo "--dry_run = TRUE";
			   $options['dry_run'] = 'y';

				break;
			case '-u':
				# code...
			   // echo "-u = ".$argv[$i+1];
			   $options['username']= $argv[$i+1];
				break;
			case '-p':
				# code...
				//echo "-p = ".$argv[$i+1];
				$options['password']= $argv[$i+1];
				break;
			case '-h':
				# code...
				//echo "-h = ".$argv[$i+1];
				$options['hostname'] = $argv[$i+1];
				break;    
			case '--help' :
				# code...
				echo "			
		||=====================================================================================================
		|| HELP
		||===================================================================================================== 
		||
		|| --file [csv file name] 	– this is the name of the CSV to be parsed
		|| --create_table 		– this will cause the MySQL users table to be built (and no further
		|| 				action will be taken)
		|| --dry_run 			– this will be used with the --file directive in the instance that we want
		||				to run the script but not insert into the DB. All other functions will be 
		||				executed, but the database won't be altered.
		||	
		|| -u – MySQL username
		|| -p – MySQL password		- For blank password put null (not advised for security reasons)
		|| -h – MySQL host
		||
		|| --help 			– which will output the above list of directives with details.
		||
		||  eg C:\>    php test.php --file test.csv --create_table users --dry_run -u root -p  -h localhost
		||=====================================================================================================";
				break;            
				
				
			default:
				# code...
				break;
		}
	}
	
	if(!isset($options['file'])) {

		$options['file'] = '';
	}else{
		//echo($options['file']);
	}
	

	if(!isset($options['create_table'])) {
		 $options['create_table'] = '';
	}else{
		//echo($options['create_table']);
	}

	if(!isset($options['dry_run'])) {
		 $options['dry_run'] = '';
		 
	}else{
		notes("remove the CLI command  --dry_run  to enable population of the database ");
		//echo($options['dry_run']);
	}
	if(!isset($options['user'])) {
		 $options['user'] = '';
	}else{
		//echo($options['user']);
	}

	if(!isset($options['password'])) {
		 $options['password'] = '';
	}else{
		//echo($options['password']);
	}

	if(!isset($options['hostname'])) {
		 $options['hostname'] = '';
	}else{
		//echo($options['hostname']);
	}
	
	return($options);
	
	
}





