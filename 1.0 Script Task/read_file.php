<?php
// return the CLI options as array $options
include('test.php');

// function to return the data fro mselected csv file
function open_file($file_name)
{
	
	if (file_exists($file_name)) {
		echo "The file $file_name exists";
			
			// users.csv
		$file = fopen($file_name,"r");
		
		$data = []; 
		while(! feof($file))
		  {
			array_push($data,fgetcsv($file));
			
		  }
	} else {
		echo "The file $file_name does not exist, please check location or name";
	}
	return $data;
}


//Cleanse and validate email address - return blank if fails checks
function validate_email($email)
{
	$email =  preg_replace('/[^A-Za-z0-9\-@.]/', '', $email);
	//Cleanse accidental extra speaces and apostriphies
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$email = null; //| "email fail" ; 
	  }else{
		$email =filter_var($email, FILTER_VALIDATE_EMAIL) ;
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

// take the details to be inserted to the database open connection and insert (optional)
function add_to_db($name, $surname, $email)
{
    include('db.php');
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO users (`name`,`surname`, `email`)
        VALUES ('$name', '$surname', '$email')";
        // use exec() because no results are returned
        // echo "<br>";
        // print($sql);
        // echo "<br>";
        $conn->exec($sql);
        // echo "New record created successfully";
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }
    
    $conn = null;
   
}

function main($data,$options){
	for ($x = 1; $x < sizeof($data)-1; $x++) {
		$line = $data[$x];
		
		if(validate_email(strtolower($line[2])) != null)
		{
			$email = (validate_email(strtolower($line[2])));

			$name = (capital_first(strtolower($line[0])));

			$surname = (capital_first(strtolower($line[1])));
			//print($name." - ".$surname." - ".$email." - ".$x);
			//echo "<br>";
			
			if($options['_dry_run'] != 'y'){
				echo $option['dry_run'];
				//add_to_db($name, $surname, $email);
			}else{
				echo "option to insert disabled  add the CLI command  --dry_run  to enable";
			}
			
			

		}else{
			//output to error file
		}

		
		
		
	 
	  
	}
}
if($options['file'] != '')
{
		main(open_file($file_name),get_options($argv,$argc))
}else{
	echo "No csv file specified please add the option        --file nameofcsv.csv      from the CLI command line to enable";
}

?>

