$(function() {
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
			    // url: "/email.php",
					// crossDomain: true,
					url: $(mailform).attr('action'),
			    data: data,
			    success: function(){
			        // $('.success').fadeIn(1000);
							alert('email sent!');
			    }
			});
/*
			$.post("email.php", {
					name: data.name,
					email: data.email,
					message: data.message,
					// contact1: contact
			}, function(data) {
		//$("#returnmessage").append(data); // Append returned message to message paragraph.
		console.log("Your Query has been received, We will contact you soon.");
		//$("#form")[0].reset(); // To reset form fields on success.

	}, function(error){
		console.error(error);


	});
*/

  });
});
