<?php
    var_dump($argc); //number of arguments passed 
    var_dump($argv); //the arguments passed
?>


--file [csv file name] – this is the name of the CSV to be parsed
• --create_table – this will cause the MySQL users table to be built (and no further
• action will be taken)
• --dry_run – this will be used with the --file directive in the instance that we want
to run the script but not insert into the DB. All other functions will be executed,
but the database won't be altered.
• -u – MySQL username
• -p – MySQL password
• -h – MySQL host
• --help – which will output the above list of directives with details.

<?php

for($i = 0; $i < $argc; $i++){
    //var_dump($argv);
    switch ($argv[$i]) {
        case '--create_table':
            # code...
            echo "--create_table = ".$argv[$i+1];
            break;
        case '--dry_run':
            # code...
            echo "--dry_run = TRUE";
            break;
        case '-u':
            # code...
            echo "--u = ".$argv[$i+1];
            break;
        case '-h':
            # code...
            echo "--h = ".$argv[$i+1];
            break;    
        case '--help':
            # code...
            echo "
            --file [csv file name] – this is the name of the CSV to be parsed
            • --create_table – this will cause the MySQL users table to be built (and no further
            • action will be taken)
            • --dry_run – this will be used with the --file directive in the instance that we want
            to run the script but not insert into the DB. All other functions will be executed,
            but the database won't be altered.
            • -u – MySQL username
            • -p – MySQL password
            • -h – MySQL host
            • --help – which will output the above list of directives with details.
            ";
            break;            
            
            
        default:
            # code...
            break;
    }
    print("\n");
}
