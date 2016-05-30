$(function() {
    $('#submitForm').click(function() {
      console.log('submitting form');

			var data = {
			    name: $("#exampleInputName1").val(),
			    email: $("#exampleInputEmail1").val(),
			    message: $("#exampleInputMessage1").val()
			};

			console.log(data);

			$.ajax({
			    type: "POST",
			    // url: "/email.php",
					// crossDomain: true,
					url: $(mailform).attr('action'),
			    data: data,
			    // success: function(){
			    //     $('.success').fadeIn(1000);
			    // }
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


$(".btn-group > .btn").click(function(){
    $(this).addClass("active").siblings().removeClass("active");
});
