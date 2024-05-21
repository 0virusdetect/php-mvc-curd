<?php 
include '../app/views/user/layout/header.php';
?>
<main>
<form action="/signup" method="post">
<label for="username">Username:</label>
<input type="text" id="username" name="username" required>
<span id="username_message"></span><br>

<label for="email">Email:</label>
<input type="text" id="email" name="email" required>
<span id="email_message"></span><br>

<label for="password">Password:</label>
<input type="password" id="password" name="password" required><br>

<button id="submit_button" type="submit">Submit</button>

</form>
</main>
<?php 
include '../app/views/user/layout/footer.php';
?>
