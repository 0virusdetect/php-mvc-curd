<?php
require_once '../app/models/DatabaseHandler.php';
require_once '../public/index.php';

class UserController {
private $userModel;

public function __construct() {

// Database DSN
$dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;

// Create an instance of DatabaseHandler with appropriate database credentials
$dbHandler = new DatabaseHandler($dsn, DB_USER, DB_PASSWORD);

// Create user model instance and pass database handler to its constructor
require_once '../app/models/UserModel.php';
$this->userModel = new UserModel($dbHandler);
}

public function showMessageCard($message, $duration) {
$html = "<div class='message-card' style='position: fixed; bottom: 20px; left: 50%; transform: translateX(-50%); padding: 10px 20px; background-color: rgba(0, 0, 0, 0.7); color: #fff; border-radius: 5px; z-index: 9999;'>$message</div>";
echo $html;
echo "<script>
setTimeout(function() {
document.querySelector('.message-card').style.display = 'none';
}, $duration);
</script>";
}
public function index() {        
// Pass data to the view
require_once '../app/views/user/index/index.php';
}

public function insert() {        
require_once '../app/views/user/insert/index.php';
}
public function inserted() {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
ob_start();
$name = $_POST["name"];
$email = $_POST["email"];
$mobile_number = $_POST["mobile_number"];
$this->userModel->create($name, $email, $mobile_number);

// Assuming $this->showMessageCard("Inserted Successfully", 1000) doesn't output anything
$this->showMessageCard("Inserted Successfully", 1000);

// Send headers after all output
header("Refresh: 1; URL=display");

// Flush the output buffer and send it to the browser
ob_end_flush();
exit; // Stop script execution here
} else {
echo "Form data is not submitted.";
}
}


public function display() {
$data = $this->userModel->show();
require_once '../app/views/user/display/index.php';
}

public function edit() {
$data = $this->userModel->show();
require_once '../app/views/user/edit/index.php';
}
public function edit_display() {
$id = $_POST['id'];
$record = $this->userModel->getRecordById($id);
require_once '../app/views/user/edit_display/index.php';
}
public function edit_final() {
ob_start();
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$mobile_number = $_POST['mobile_number'];
$this->userModel->update($id, $name, $email, $mobile_number);
$this->showMessageCard("Updated Successfully", 1000);
header("Refresh: 1; URL=edit");
ob_end_flush();
}

public function delete() {
$data = $this->userModel->show();
require_once '../app/views/user/delete/index.php';
}
public function deleted() {
ob_start();
$id = $_POST['id'];
$this->userModel->delete($id);
$this->showMessageCard("Deleted Successfully", 1000);
header("Refresh: 1; URL=delete");
ob_end_flush();
}
public function signup() {        
require_once '../app/views/user/signup/index.php';
}
public function signupinserted() {
// Ensure you're using the instance created in the constructor
$username = $_POST['username'];
$email = $_POST['email'];
$mobile_number = $_POST['password'];
header("location:login");
// Use $this->userModel instead of creating a new instance
$this->userModel->saveUser($username, $email, $mobile_number);
// Redirect to some success page or show a success message
}
public function check_username() {        
$username = $_POST['username'];
if ($this->userModel->isUsernameExists($username)) {
echo '<span style="color: red;">username is already registered</span>';
} else {
echo '<span style="color: green;">Email is available</span>';
}
}
public function check_email() {        
$email = $_POST['email'];
if ($this->userModel->isEmailExists($email)) {
echo '<span style="color: red;">Email is already registered</span>';
} else {
echo '<span style="color: green;">Email is available</span>';
}
}

public function login() {        
require_once '../app/views/user/login/index.php';
}
public function login_check() {  
session_start();      
$email = $_POST['email'];
$password = $_POST['password'];
if ($this->userModel->isEmailExists($email) && $this->userModel->isPasswordExists($password)) {
$_SESSION['email'] = $email;
header('Location: admin');

exit;
} else {
// Display JavaScript alert and redirect using window.location
echo "<script>alert('Credentials not found'); window.location='/login';</script>";
exit;
}
}
public function admin() {        
require_once '../app/views/admin/index.php';
}
public function logout() {        
require_once '../app/views/admin/logout.php';
}

}
?>
