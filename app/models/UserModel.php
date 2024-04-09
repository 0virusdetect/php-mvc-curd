<?php
class UserModel {
private $db;

public function __construct() {
$this->db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($this->db->connect_error) {
die("Connection failed: " . $this->db->connect_error);
}
}
public function create($name, $email, $mobile_number) {
// Fetch the maximum register_id from the register table
$result = $this->db->query("SELECT MAX(register_id) AS max_reg_id FROM register");
$row = $result->fetch_assoc();
$max_reg_id = $row['max_reg_id'];
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
$stmt->bind_param("sssii", $name, $email, $mobile_number, $status, $increment_id_2);
$stmt->execute();
$stmt->close();
}



public function show() {
$result = $this->db->query("SELECT * FROM register");
return $result->fetch_all(MYSQLI_ASSOC);
}


public function getRecordById($id) {
$stmt = $this->db->prepare("SELECT * FROM register WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$record = $result->fetch_assoc();
$stmt->close();
return $record;
}

public function update($id, $name, $email, $mobile_number) {
$stmt = $this->db->prepare("UPDATE register SET name=?, email=?,mobile_number=? WHERE id=?");
$stmt->bind_param("sssi", $name, $email,$mobile_number, $id);
$stmt->execute();
$stmt->close();
}

public function delete($id) {
$stmt = $this->db->prepare("DELETE FROM register WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();
}


public function __destruct() {
$this->db->close();
}
}
