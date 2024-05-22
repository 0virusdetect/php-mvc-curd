<?php
require_once 'DatabaseHandler.php';
require_once 'StatementHandler.php';

class UserModel {
private $db;

public function __construct(DatabaseHandler $db) {
$this->db = $db;
}

public function create($name, $email, $mobile_number) {
// Fetch the maximum register_id from the register table
$stmt = $this->db->prepare("SELECT MAX(register_id) AS max_reg_id FROM register");
$stmtHandler = new StatementHandler($stmt);
$stmtHandler->execute();
$max_reg_id = $stmtHandler->fetchColumn();
$stmtHandler->closeCursor();

// Set the default value for $increment_id_2
$increment_id_2 = 237000;
// If max_reg_id is not null, set $increment_id_2 to the next available value
if ($max_reg_id !== null) {
$increment_id_2 = $max_reg_id + 1;
}
$status = 0; // Assuming a default value for status

// Prepare and execute the INSERT query
$sql = "INSERT INTO register (name, email, mobile_number, status, register_id) VALUES (?, ?, ?, ?, ?)";
$stmt = $this->db->prepare($sql);
$stmtHandler = new StatementHandler($stmt);
$stmtHandler->execute([$name, $email, $mobile_number, $status, $increment_id_2]);
}

public function show() {
$stmt = $this->db->prepare("SELECT * FROM register");
$stmtHandler = new StatementHandler($stmt);
$stmtHandler->execute();
return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function getRecordById($id) {
$stmt = $this->db->prepare("SELECT * FROM register WHERE id = ?");
$stmtHandler = new StatementHandler($stmt);
$stmtHandler->execute([$id]);
$record = $stmt->fetch(PDO::FETCH_ASSOC);
$stmtHandler->closeCursor();
return $record;
}

public function update($id, $name, $email, $mobile_number) {
$stmt = $this->db->prepare("UPDATE register SET name=?, email=?, mobile_number=? WHERE id=?");
$stmtHandler = new StatementHandler($stmt);
$stmtHandler->execute([$name, $email, $mobile_number, $id]);
}

public function delete($id) {
$stmt = $this->db->prepare("DELETE FROM register WHERE id=?");
$stmtHandler = new StatementHandler($stmt);
$stmtHandler->execute([$id]);
}

public function saveUser($username, $email, $mobile_number) {
$stmt = $this->db->prepare("INSERT INTO register (name, email, mobile_number) VALUES (?, ?, ?)");
$stmtHandler = new StatementHandler($stmt);
$stmtHandler->execute([$username, $email, $mobile_number]);
}

public function isUsernameExists($username) {
$stmt = $this->db->prepare("SELECT COUNT(*) AS count FROM register WHERE name = ?");
$stmtHandler = new StatementHandler($stmt);
$stmtHandler->execute([$username]);
$count = $stmtHandler->fetchColumn();
$stmtHandler->closeCursor();
return $count > 0;
}

public function isEmailExists($email) {
$stmt = $this->db->prepare("SELECT COUNT(*) AS count FROM register WHERE email = ?");
$stmtHandler = new StatementHandler($stmt);
$stmtHandler->execute([$email]);
$count = $stmtHandler->fetchColumn();
$stmtHandler->closeCursor();
return $count > 0;
}

public function isPasswordExists($mobile_number) {
$stmt = $this->db->prepare("SELECT COUNT(*) AS count FROM register WHERE mobile_number = ?");
$stmtHandler = new StatementHandler($stmt);
$stmtHandler->execute([$mobile_number]);
$count = $stmtHandler->fetchColumn();
$stmtHandler->closeCursor();
return $count > 0;
}

public function __destruct() {
// Assuming $this->db is the PDO instance
$this->db = null;
}
}
