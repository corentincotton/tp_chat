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
$(function(){
				$('form#formulaire1').on('submit', function(e){
					e.preventDefault()

					data = {
						message : $('#message').val(),
						pseudo : $('#pseudo').val(),
						form : "form1"
					}

					$.ajax({
						method : "POST",
						url : "message.php",
						data : data,
						success : function(res){
							$("#msg").html(res)
						}
					})
*
				})
