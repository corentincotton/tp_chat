$(document).ready(function() {
  $("#nom, #prenom, #pseudo, #message").on('blur', function() {
		if ($(this).val() == "") {
			$(this).css("background", "black");
		}
		else {
		$(this).css("background", "white");
		}
	})


});
