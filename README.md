# catalyst
# Readme file

/There may be some libraries that need to be installed via apt-get, pear or
composer. This is fine but these dependencies should be outlined in provided
install documentation. [.env]

// executed form the command line

// name =  user_upload.php 

// import csv file ["users.csv"]
// import data from CSV [name,surname,email[UNIQUE]]
// Name to first letter capital
// validate email function [errro =  STDOUT. ]
// Create Database called “users”   [ This will be defined as a Command Line directive below. ????]



CONFIRM USED 
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
