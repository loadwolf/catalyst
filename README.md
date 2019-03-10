# catalyst
# Readme file

## Question
## Do the emails that have extra spaces at end need to be cleansed or fail? (Front end validation issue) (currently cleansed)
## If the emails have ' in the name do they need  to be removed or replaced? (currently removed)
## What is the desired output for failed emails? csv || display onscreen || txt file? (currently none)

There may be some libraries that need to be installed via apt-get, pear or
composer. This is fine but these dependencies should be outlined in provided
install documentation. [.env]                       - N/A

 executed form the command line

 name =  user_upload.php 

import csv file ["users.csv"]                       - DONE
import data from CSV [name,surname,email[UNIQUE]]   - DONE
Name to first letter capital                        - DONE
validate email function [errro =  STDOUT. ]         - DONE
Create Database called “users”                       - DONE

[ This will be defined as a Command Line directive below. ????]

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
