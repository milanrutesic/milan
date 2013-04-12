$(document).ready(function(){
	$("#addNewUserForm").validate({
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
		    },
		    name: {
		      required: true
		    },
		    confirmPassword: {
		      required: true
		    }
  		},
  		messages: {
			confirmPassword: {
				equalTo: "Enter the same password as above"
			}, 
			email: {
				remote: jQuery.format("{0} is already in use")
			}
		}
	});
});