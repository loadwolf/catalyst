<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "catalyst";
// $table = 'users';

function db_access_cleanse($password ){

    if($password == 'null'){return '';}else {return $password;}
}
function create_datbase($servername, $username, $password, $dbname)
{

    // Create connection
    try{
        $conn = new mysqli($servername, $username, db_access_cleanse($password ));
    }
    catch(PDOException $e){

    }
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        $result = 'fail';
    } 

    // Create database
    $sql = "CREATE DATABASE $dbname ";
    if ($conn->query($sql) === TRUE) {
        notes( "Database created successfully");
        $result = 'success';
    } else {
        //echo "NOTE: " . $conn->error . '<br>';
        notes( "Database exists");
        $result = 'success';

    }
    $conn->close();
    notes('------------------------bd setup----------------------');
    return $result ;

    

}

// function create_table($servername, $username, $password, $dbname)
// {
//     $conn2 = new mysqli($servername, $username, db_access_cleanse($password ), $dbname);  
    
//     // sql to create table
//     $sql = "
//             CREATE TABLE IF NOT EXISTS users ( 
//             name VARCHAR(30) NOT NULL,
//             surname VARCHAR(30) NOT NULL,
//             email VARCHAR(50) NOT NULL,
//             UNIQUE KEY unique_email (email)
//         )";

//     if ($conn2->query($sql) === TRUE) {
//         //echo "Table MyGuests created successfully";
//     } else {
//         //echo "NOTE: " .  $conn2->error. '<br>';
//     }

//     $conn2->close();
// }



// take the details to be inserted to the database open connection and insert (optional)
function add_to_db($name, $surname, $email,$servername =  "localhost",$username, $password)
{
    $dbname = "catalyst";  
    $sql = "INSERT INTO users (`name`,`surname`, `email`) VALUES ('$name', '$surname', '$email')";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, db_access_cleanse($password ));
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // use exec() because no results are returned
        // echo "<br>";
        // print($sql);
        // echo "<br>";
        $conn->exec($sql);
        // echo "New record created successfully";
        }
    catch(PDOException $e)
        {
        notes( $sql . "<br>" . $e->getMessage());
        }
    
    $conn = null;
   
}

