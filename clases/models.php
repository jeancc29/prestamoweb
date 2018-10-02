<?php

abstract class Model{
	private $dbh;
	private $stmt;

	public function __construct(){
		$serverName = "prestamoserver.database.windows.net";
		//$serverName = "paginaweb1.database.windows.net";
		$this->dbh = new PDO("sqlsrv:server=$serverName ; Database=prestamoDB", "jean29", "Jean06091929");
	}

	public function query($query){
		$this->stmt = $this->dbh->prepare($query);
	}

	public function bind($param, $value, $type = null){
		if(is_null($type)){
			switch (true) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_double($value):
					$type = PDO::PARAM_DOUBLE;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;

				default:
					$type = PDO::PARAM_STR;
					break;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}

	public function execute(){
		$this->stmt->execute();
	}

	public function resultSet(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function lastInsertId(){
		$this->dbh->lastInsertId();
	}
}


 ?>
