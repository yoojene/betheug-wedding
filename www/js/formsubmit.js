$(function() {

	$('#submitForm').attr('disabled', 'disabled');


	$( "#message" ).blur(function() { // Tab out of message field
	if ($("#name").val().length > 0 && $("#email").val().length > 0 && $("#message").val().length > 0 && $("#formResp").text().length > 0){
		$('#submitForm').removeAttr('disabled');
	}
});




    $('#submitForm').click(function() {
      console.log('submitting form');

			var data = {
					name: $("#name").val(),
					email: $("#email").val(),
					message: $("#message").val(),
					response: $("#formResp").text()

			};

			console.log(data);

			$.ajax({
			    type: "POST",
					url: $(mailform).attr('action'),
			    data: data,

			}).done(function(){
						 $('.success').fadeIn(1000);
				});


  });
});
