<?php 
include '../app/views/user/layout/header.php';
?>
<main>
<form action="inserted" method="post">
<label for="name">Name:</label>
<input type="text" name="name" id="name"><br>
<label for="email">email:</label>
<input type="text" name="email" id="email"><br>
<label for="mobile_number">Mobile Number:</label>
<input type="text" name="mobile_number" id="mobile_number"><br>
<input type="submit" value="Submit">
</form>
</main>
<?php 
include '../app/views/user/layout/footer.php';
?>