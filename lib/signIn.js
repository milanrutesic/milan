$(document).ready(function() {
	// Submit sign in form
	$('#signInButton').on('click', function(event){
		signIn(event);
	});
});

function signIn(event) {
	
	var email = $("#email").val();
	var password = $("#password").val();
	if ('' != email && '' != password) {
		event.preventDefault();
		$.post("server/auth/login", { email: email, password:password }, function(data) {
			signInResponse(data);
		});
	}
}

function signInResponse(data) {
	var response = $.parseJSON(data);
	if (true == response.success) {
		if (1 == response.auth) {
			// sign in successful, redirect to application
			window.location = 'index.php';
		} else if (2 == response.auth) {
			// No access permission
			$(".error").html("You have no access permission");
			$(".error").removeClass("invisible");
			console.log(2);
		} else if (3 == response.auth) {
			console.log(3);
			// Wrong email or password
			$(".error").html("Wrong email or password");
			$(".error").removeClass("invisible");
		}
		
	}
}
