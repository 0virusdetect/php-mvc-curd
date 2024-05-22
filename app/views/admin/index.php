<?php
session_start();

// Check if user is logged in
if(!isset($_SESSION['email'])) {
// Redirect back to login page if user is not logged in
header('Location:index');
exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Homepage</title>
</head>
<body>
<h2>Welcome <?php echo $_SESSION['email']; ?>!</h2>
<p>This is the homepage.</p>
<p><a href="logout">Logout</a></p>
</body>
</html>
