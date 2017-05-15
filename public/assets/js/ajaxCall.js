$('#loginForm').on('submit',function(e){
   	$.ajax({
        type: 'post',
        url: $(this).attr('action'),
        data: $(this).serialize(),
        success: function () {
     		 alert('form was submitted');
    	}
    });
    e.preventDefault();
});
$('#RegistrationForm').on('submit',function(e){
	        $.ajax({
	            type: 'post',
	            url: $('#RegistrationForm').attr('action'),
	            data: $('#RegistrationForm').serialize(),
	            success: function () {
	         		 alert('form was submitted');
	        	}
	    });
	e.preventDefault();        
});	