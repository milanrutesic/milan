$(document).ready(function(){
	$("#editUserForm").validate({
		submitHandler: function(form) {
		    form.submit();
		},
		rules: {
		    name: {
		      required: true
		    }
  		},
  		messages: {
			confirmPassword: {
				equalTo: "Enter the same password as above"
			}
		}
	});
});