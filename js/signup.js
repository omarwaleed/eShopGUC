$(document).ready(function() {
$("#register").click(function() {
var name = $("#name").val();
var email = $("#email").val();
var password = $("#password").val();
var cpassword = $("#cpassword").val();
if (name == '' || email == '' || password == '' || cpassword == '') {
alert("Please fill all fields");
} else if ((password.length) < 8) {
alert("Password should atleast 8 character in length");
} else if (!(password).match(cpassword)) {
alert("password dont match");
}
// } else {
// $.post("signup.php", {
// name: name,
// email: email,
// password: password
// }, function(data) {
// if (data == 'You have Successfully Registered') {
// $("form")[0].reset();
// }
// alert(data);
// });
// }
// });
// });
