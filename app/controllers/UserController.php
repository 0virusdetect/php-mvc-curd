<?php
class UserController {
private $userModel;

public function __construct() {
require_once '../app/models/UserModel.php';
require_once '../public/index.php';
$this->userModel = new UserModel();
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


public function about() {        
// Pass data to the view
require_once '../app/views/user/about/index.php';
}

public function contact() {        
// Pass data to the view
require_once '../app/views/user/contact/index.php';
}

}
