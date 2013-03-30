<?php

//MySQL and database configurations
//Host's name
$host = "localhost";
//User's login
$user = "root";
//User's password
$password = "";
//Database name
$dataBaseName = "messages";
//Table name
$tableName = "messages_list";
//Try connect to MySQL
mysql_connect($host, $user, $password)
               or die("Failed connection to MySQL.");
//Create database with name $dataBaseName
mysql_query("CREATE DATABASE IF NOT EXISTS " . $dataBaseName .  
        " CHARACTER SET utf8 COLLATE utf8_general_ci")
        or die("Can't create database.");
//Select BD
mysql_select_db($dataBaseName) 
            or die("Database is unavailable.");
//Create table with name $tableName and fields: id, name, full_text, short_text,
//creatin_date, editing_date
mysql_query("CREATE TABLE IF NOT EXISTS " . $tableName . 
        "(
            id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30),
            full_text TEXT,
            short_text VARCHAR(30),
            creating_date DATETIME,
            editing_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )")
        or die("Cant't create table." . mysql_error());

?>
