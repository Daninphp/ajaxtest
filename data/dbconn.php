<?php

class Konekcija
{
	public $conn;
	private static $instance;

	private $username = "danin.dragosavac";
	private $password = "52VuED6dLUT2N4oKPnf84anbqk6hnDwV";
	private $dbname = "danindragosavac";
	private $host = "localhost";

	private function __construct()
	{

		$this->conn = new PDO('mysql:host='. $this->host .';dbname='. $this->dbname .'', $this->username, $this->password);
	}


	public static function getInstance()
	{
		if (!self::$instance) {
			self::$instance = new self;
		}
		return self::$instance;
	}
}