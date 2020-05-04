<?php

include_once "dbh.inc.php";
/*
$query = "CREATE TABLE branches(
	Id SMALLINT(5) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	Branch VARCHAR(30) UNIQUE NOT NULL,
	Pic VARCHAR(100),
	Status ENUM('Enabled','Disabled'),
	RegisteredOn TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

mysqli_query($conn,$query) or die("Oops! something went wrong");

$query = "CREATE TABLE leaders(
	Id SMALLINT(5) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	Name VARCHAR(30) NOT NULL,
	Gender ENUM ('Female','Male'),
	Email VARCHAR(30) UNIQUE NOT NULL,
	Mobile CHAR(10) NOT NULL,
	Roll VARCHAR(20) UNIQUE NOT NULL,
	Branch VARCHAR(30) NOT NULL,
	Pic VARCHAR(100),
	RegisteredOn TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

mysqli_query($conn,$query) or die("Oops! something went wrong");


$query = "CREATE TABLE votes(
	Id SMALLINT(5) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	Secret_code VARCHAR(30) UNIQUE NOT NULL,
	Branch VARCHAR(30) NOT NULL,
	Choice1 VARCHAR(30) NOT NULL,
	Choice2 VARCHAR(30) NOT NULL,
	Choice3 VARCHAR(30) NOT NULL,
	SubmittedOn TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

mysqli_query($conn,$query) or die("Oops! something went wrong");

$query = "CREATE TABLE secret_key(
	Id SMALLINT(5) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	Secret_code VARCHAR(30) UNIQUE NOT NULL,
	Status ENUM ('0','1')
)";

mysqli_query($conn,$query) or die("Oops! something went wrong");
*/
?>