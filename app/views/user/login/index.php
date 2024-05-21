<?php 
include '../app/views/user/layout/header.php';
?>
<main>
<form action="login_check" method="post">
<label for="email">Email:</label>
<input type="text" id="email" name="email" required><br><br>
<label for="password">Password:</label>
<input type="text" id="password" name="password" required><br><br>
<input type="submit" value="Login">
</form>
</main>
<?php 
include '../app/views/user/layout/footer.php';
?>