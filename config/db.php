<?php
    class ConnectDb {
    private static $instance;
    private $conn;

    private $host = '';
    private $user = '';
    private $pass = '';
    private $name = '';

    private function __construct()
    {
        try {
			$this->conn = new PDO("mysql:host={$this->host};
			dbname={$this->name}", $this->user,$this->pass,
			array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
		} catch(PDOException $e)
		{
		  echo $e->getMessage();                         
		}
    }

    public static function getInstance()
    {
        self::$instance = new self();
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }

    private function __clone() {}
    public function __wakeup() {}
    }
?>