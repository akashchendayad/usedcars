$(document).ready(function () {

	changesection('3');
	

});



function edit(id)
{
	var data = 'id='+id;
	$.ajax({
	  type: "POST",
	  url: "car_edit",
	  data: data,
	  success: function(data){
		  alaert(data.car_id)
		

	   }
 });

}

function usernamechk() {
	
      var username=$('#username').val();
	  
	  if(username!='')
	  {
      var data = 'username='+username;
				  $.ajax({
					type: "POST",
					url: "usernamechk",
					data: data,
					success: function(data){
						
                      if(data.result===0)
					  {
				        $("#response").text('');
			            $("#response").text('Username Available');
				  
					  }
					else
					  {
					    $('#msg').css('display', 'block');
				$("#response").text('');
				$("#response").text('Username not Avaialable');
				$("#username").val('')
					  }

				     }
			   });
			   
	  }
	  else
	  {
	   $('#error_username').text('');
	  }
			   
	
  
}



function changesection(id) {
	$('#msg').css('display', 'none');
	var data = 'id=' + id;
	$.ajax({
		type: "POST",
		url: "get_sec_det",
		data: data,
		success: function (data) {
			$("#report_section").html('');
			$("#report_section").html(data.report);
			if (id == 3) {
				$(document).ready(function () {
					$('#tble_urldata').DataTable({
						"ajax": {
							url: "get_tbldata",
							type: 'GET'
						},
						pageLength: 5,
						lengthMenu: [5, 10, 20, 30, 50]

					});
				});
			}

		},
		error: function (jqXHR, exception) {
			var msg = '';
			if (jqXHR.status === 0) {
				msg = 'Not connect.\n Verify Network.';
			} else if (jqXHR.status == 404) {
				msg = 'Requested page not found. [404]';
			} else if (jqXHR.status == 500) {
				msg = 'Internal Server Error [500].';
			} else if (exception === 'parsererror') {
				msg = 'Requested JSON parse failed.';
			} else if (exception === 'timeout') {
				msg = 'Time out error.';
			} else if (exception === 'abort') {
				msg = 'Ajax request aborted.';
			} else {
				msg = 'Uncaught Error.\n' + jqXHR.responseText;
			}
			alert(msg);
		},
		
	});


}