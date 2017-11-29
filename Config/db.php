<?php
class Db
{
    protected static $bdd = null;

    protected function __construct() { } // Constructeur en privé pour empecher l'instanciation.
    protected function __clone() { } // Méthode de clonage en privé aussi.

    function connect()
	{
		if (is_null(self::$bdd)) {//First connection

              try {
			    $dbhost = "localhost";
			    $dbuser = "root";
			    $dbpass = "root";
			    $dbname = "rush_MVC";

			    self::$bdd = new PDO("mysql:host=$dbhost;port=3306;dbname=$dbname", $dbuser, $dbpass);
			    // echo "Connection sucessful";

			  }

			  catch (PDOException $e){
			    echo "Error connection to DB\n";
			    die();
			  }
			return self::$bdd;//pas d'erreurs

            } else {
				return self::$bdd;//deja connecté
			}
	}//end function

}
Db::connect();



 ?>
