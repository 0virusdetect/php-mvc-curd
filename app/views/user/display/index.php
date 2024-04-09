<?php 
include '../app/views/user/layout/header.php';
?>
<main>
<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Mobile Number</th>
</tr>
<?php if (empty($data)): ?>
<tr>
<td colspan="4">No data found</td>
</tr>
<?php else: 
$i=1; ?>
<?php foreach ($data as $row): ?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['mobile_number']; ?></td>
</tr>
<?php
$i++;
endforeach; ?>
<?php endif; ?>
</table>
</main>
<?php 
include '../app/views/user/layout/footer.php';
?>