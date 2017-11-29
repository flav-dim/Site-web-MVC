<?php

// CONNECTION A LA BASE DE DONNEES ! 


const ERROR_LOG_FILE = "errors.log";

class DatabaseConnection
{
	private static $bdd = null;

	private $dbhost;
	private $dbuser;
	private $dbpass;
	private $dbname;


	function Connect()
	{
		if (is_null(self::$bdd))
			{
			  try {
			    $dbhost = "127.0.0.1";
			    $dbuser = "root";
			    $dbpass = "Flavdimart94";
			    $dbname = "todo_php";

			    self::$bdd = new PDO("mysql:host=$dbhost;port=3306;dbname=$dbname", $dbuser, $dbpass);
			    echo "Connection sucessful";
			  } 
			  catch (PDOException $e)
			  {
			    echo "Error connection to DB\n";
			    error_log($e, 3 , "ERROR_LOG_FILE") . "\n";
			    die();
			  }
			  return self::$bdd;
			}
			else 
			{
				return self::$bdd;
			}
	}

}

DatabaseConnection::Connect();