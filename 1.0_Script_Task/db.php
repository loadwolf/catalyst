<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "catalyst";
// $table = 'users';

function db_access_cleanse($password ){

    if($password == 'null'){return '';}elseif($password == ""){return '';}else {return $password;}
}
function create_datbase($servername, $username, $password, $dbname)
{

    // Create connection
    
    $conn = new mysqli($servername, $username, db_access_cleanse($password ));
   
  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        $result = 'fail';
    } else{

        // Create database
        $sql = "CREATE DATABASE $dbname ";
        if ($conn->query($sql) === TRUE) {
            notes( "Database created successfully");
            $result = 'success';
        } else {
            //echo "NOTE: " . $conn->error . '<br>';
            notes( "Database already exists");
            $result = 'success';

        }
        $conn->close();
    }
    
    return $result ;

    

}

function create_table($servername, $username, $password, $dbname)
{
    $conn2 = new mysqli($servername, $username, db_access_cleanse($password ), $dbname);  
    
    // sql to create table
    $sql = "
            CREATE TABLE IF NOT EXISTS users ( 
            name VARCHAR(30) NOT NULL,
            surname VARCHAR(30) NOT NULL,
            email VARCHAR(50) NOT NULL,
            UNIQUE KEY unique_email (email)
        )";

    if ($conn2->query($sql) === TRUE) {
        notes("Table already exists or was created successfully");
        $result = 'success';
    } else {
        notes(  $conn2->error. "<br>");
        $result = 'fail';
    }

    $conn2->close();
    return $result;
}



// take the details to be inserted to the database open connection and insert (optional)
function add_to_db($name, $surname, $email,$servername =  "localhost",$username, $password)
{
    $dbname = "catalyst";  
    $sql = "INSERT INTO users (`name`,`surname`, `email`) VALUES ('$name', '$surname', '$email')";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, db_access_cleanse($password ));
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $conn->prepare('SELECT * FROM users WHERE email=?');
        $stmt->bindParam(1, $email, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if(  $row)
        {
            notes("user email already exists in database \t".$name." ".$surname." - ".$email);
            $result = 'fail';
        }else{
        
            $conn->exec($sql);
            // echo "New record created successfully";
            $result = 'success';
            }
        }   
        catch(PDOException $e)
        {
        notes( $sql . "<br>" . $e->getMessage());
        $result = 'fail';
        }
        $conn = null;
    return $result;

}

