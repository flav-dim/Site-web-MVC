<?php
class Db
{
    private static $bdd = null;

    private function __construct() { } // Constructeur en privé pour empecher l'instanciation.
    private function __clone() { } // Méthode de clonage en privé aussi.

    function connect()
	{
		if (is_null(self::$bdd)) {//First connection

              try {
			    $dbhost = "localhost";
			    $dbuser = "root";
			    $dbpass = "root";
			    $dbname = "rush_MVC";

			    self::$bdd = new PDO("mysql:host=$dbhost;port=3306;dbname=$dbname", $dbuser, $dbpass);
			    echo "Connection sucessful";

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
$db = Db::connect();









 ?>
