<?php
class DatabaseHandler {
private $pdo;

public function __construct($dsn, $username, $password) {
$this->pdo = new PDO($dsn, $username, $password);
$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

public function prepare($sql) {
return $this->pdo->prepare($sql);
}
}
?>
