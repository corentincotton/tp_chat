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
	$('form2#formulaire1').on('submit', function(e){
		e.preventDefault()

		data = {
			message : $('#message').val(),
			pseudo : $('#pseudo').val(),
			form : "formulaire1"
		}

		$.ajax({
			method : "POST",
			url : "pdo.php",
			data : data,
			success : function(res){
				$("#message").html(res)
			}
		})
	})
})
