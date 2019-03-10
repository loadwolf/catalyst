<?php
// Question allow O'sulivan or remoave for DB? 
// 
$file = fopen("users.csv","r");

$sql = []; 
while(! feof($file))
  {
    array_push($sql,fgetcsv($file));
    
  }

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


function clean($string) {  
    
   
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
 }

function capital_first($string)
{
    return ucfirst(clean($string));
}


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



for ($x = 1; $x < sizeof($sql)-1; $x++) {
    $line = $sql[$x];

    if(validate_email(strtolower($line[2])) != null)
    {
        $email = (validate_email(strtolower($line[2])));

        $name = (capital_first(strtolower($line[0])));

        $surname = (capital_first(strtolower($line[1])));
        //print($name." - ".$surname." - ".$email." - ".$x);
        //echo "<br>";
        add_to_db($name, $surname, $email);

    }else{
        //output to error file
    }

    
    
    
 
  
}
?>

