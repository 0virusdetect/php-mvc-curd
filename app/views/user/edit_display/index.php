<?php 
include '../app/views/user/layout/header.php';
?>
<main>
<h2>Edit Record</h2>
<form action="edit_final" method="post">
<input type="hidden" name="id" value="<?php echo $record['id']; ?>">
<label for="name">Name:</label>
<input type="text" name="name" id="name" value="<?php echo $record['name']; ?>"><br>
<label for="email">Email:</label>
<input type="text" name="email" id="email" value="<?php echo $record['email']; ?>"><br>
<label for="mobile_number">mobile_number:</label>
<input type="text" name="mobile_number" id="mobile_number" value="<?php echo $record['mobile_number']; ?>"><br>
<input type="submit" value="Update">
</form>
</main>
<?php 
include '../app/views/user/layout/footer.php';
?>