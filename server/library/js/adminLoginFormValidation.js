$(document).ready(function(){
	$("#loginForm").validate({
		submitHandler: function(form) {
		    form.submit();
		},
		rules: {
		    email: {
		      required: true,
		      email: true
		    },
		    password: {
		      required: true
		    }
  		}
	});
});