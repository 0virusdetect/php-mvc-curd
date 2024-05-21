console.log('hello');

$(document).ready(function() {


$('#username').keyup(function() {
var username = $(this).val();
$.post('check_username', {username: username}, function(data) {
$('#username_message').html(data);
checkSubmitButton();
});
});

$('#email').keyup(function() {
var email = $(this).val();
$.post('check_email', {email: email}, function(data) {
$('#email_message').html(data);
checkSubmitButton();
});
});

function checkSubmitButton() {
if ($('#username_message').text().includes('username is already registered') || 
$('#email_message').text().includes('Email is already registered')) {
$('#submit_button').prop('disabled', true);
} else {
$('#submit_button').prop('disabled', false);
}
}
});

