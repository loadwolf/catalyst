<?php
require_once('options.php');
require_once('files.php');
require_once('main.php');
require_once('db.php');


// return the CLI options as array $options
$options = get_options($argv,$argc);




if($options['file'] != ''){
	notes("Processing CSV file"); 
	$data = open_file($options['file']);
	// var_dump($data);
	// var_dump($options);

	if($options['username'] == '' || $options['password'] == '' ){
		notes("Please check the -u  username and -p password for mysql database");
	}elseif(create_datbase($options['hostname'], $options['username'], $options['password'], 'catalyst') == 'fail'){
		notes("Could not create/access the Database  - Please check Mysql connection options -------------------------------------------------------");
	}elseif(create_table($options['hostname'], $options['username'], $options['password'], 'catalyst') == 'fail'){
		notes("Could not create/access the table  - Please check Mysql connection options -------------------------------------------------------");
	}else{
		main($data,$options);
	}
	

}else{
	//Check error messages - clarification needed 
		notes("No csv file specified"); 
		notes("Please add the option    --file nameofcsv.csv   from the CLI command line to enable");
}
notes('');
notes('END ================================================================================================');


