<?php

class Database {
	private $dbString = "mysql:host=188.226.199.194;dbname=sort";
	private $login = "root";
	private $password = "root";

	private static $instance = null;
	public $pdo;

	public static function getInstance() {
		if (self::$instance == null) {
			self::$instance = new Database();
		}
		return (self::$instance);
	}

	private function __construct($throwError = true) {
		$this->pdo = new PDO($this->dbString, $this->login, $this->password);

		if ($throwError && self::$instance) {
			$this->instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
	}
}

?>
