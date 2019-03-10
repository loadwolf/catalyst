
CREATE DATABASE IF NOT EXISTS catalyst;
use catalyst;

CREATE TABLE IF NOT EXISTS users ( 
	name VARCHAR(30) NOT NULL,
	surname VARCHAR(30) NOT NULL,
	email VARCHAR(50) NOT NULL,
	UNIQUE KEY unique_email (email)
);

/* Weird no id for database - would put in to future proof
CREATE TABLE users (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	name VARCHAR(30) NOT NULL,
	surname VARCHAR(30) NOT NULL,
	email VARCHAR(50) NOT NULL,
	UNIQUE KEY unique_email (email)
); 
*/