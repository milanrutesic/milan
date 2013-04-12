
/**
 * @description: Display status result during 5 seconds 
 * 
 * @author: Alef <alef@alefos.com>
 */

var helpers = {
	displayStatusMsg: function (msg) {
		helpers.hideLoader();
		$("#statusMsg").html(msg);
		//set position
		$("#statusMsg").position({
		    my: "center",
		    at: "center",
		    of: "#statusMsgContainer"
		});
		$("#statusMsg").addClass( "visible", 1000, "easeOutSine");
		setTimeout( function(){
			$("#statusMsg").removeClass("visible", 1000)
		}, 5000 );
	},

	displayLoader: function() {
		$("#progressbar").addClass( "visible", 1000, "easeOutSine");
		
		//set position
		$("#progressbar").position({
		    my: "center",
		    at: "center",
		    of: "#statusMsgContainer"
		});
		
		$( "#progressbar" ).progressbar({
			value: false
		});
	},

	hideLoader: function () {
		$("#progressbar").removeClass( "visible", 1000, "easeOutSine");
	}
}
