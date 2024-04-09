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
<th>Action</th>
</tr>
<?php if (empty($data)): ?>
<tr>
<td colspan="4">No data found</td>
</tr>
<?php else: $i=1; ?>
<?php foreach ($data as $row): ?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['mobile_number']; ?></td>
<td>
<?php 
$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
// Encrypt the value of $row['id'] with the IV
$user_id_encrypted = openssl_encrypt($row['id'], 'aes-256-cbc', 'encryption_key', 0, $iv);
// Encode the encrypted value and IV to make them URL-safe
$user_id_encoded = urlencode(base64_encode($user_id_encrypted . '::' . $iv));
?>
<?php echo '<a href="deleted?id=' . $user_id_encoded . '">Delete</a>'; ?>
</td>
</tr>
<?php
$i++; endforeach; ?>
<?php endif; ?>
</table>
</main>
<?php 
include '../app/views/user/layout/footer.php';
?>