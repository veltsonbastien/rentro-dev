function submitForm() {		
		var data = $("signin-form").serialize();
		$.ajax({				
			type : 'POST',
			url  : 'signin.inc.php',
			data : data,
			beforeSend: function(){	
				$("#error").fadeOut();
				$("#signin-button-onpage").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Sending ...');
			},
			success : function(response){			
				if($.trim(response) === "1"){
					console.log('dddd');									
					$("#signin-button-onpage").html('Signing In ...');
					setTimeout(' window.location.href = "signin.php"; ',2000);
				} else {									
					$("#error").fadeIn(1000, function(){						
						$("#error").html(response).show();
					});
				}
			}
		});
		return false;
	}