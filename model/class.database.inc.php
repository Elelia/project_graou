<?php
class Database
{
	private static $bdd='mysql:dbname=graouprojet'; 
	private static $serveur='mysql:host=127.0.0.1';
	private static $port='3306';  		
    private static $user='root';    		
    private static $mdp='';		
	private static $monPdo;
    private static $monPdoGsb=null;

    private function __construct()
    {
    	Database::$monPdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=garouprojet', 'root', '');
		Database::$monPdo->query("SET CHARACTER SET utf8");
	}

	public function __destruct()
    {
		Database::$monPdo = null;
	}

    public static function getDatabase(){
		if(Database::$monPdoGsb==null)
		{
			Database::$monPdoGsb= new Database();
		}
		return Database::$monPdoGsb;  
	}

	public static function get_monPdo()
	{
		return Database::$monPdo;
	}
}
?>