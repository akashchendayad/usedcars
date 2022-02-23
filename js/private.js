function edit(id)
{
	var data = 'id='+id;
	$.ajax({
	  type: "POST",
	  url: "car_edit",
	  data: data,
	  success: function(data){

        $('#car_id').val(data.car_id);
        $('#car_model').val(data.car_model);
        $('#manuf_year').val(data.manuf_year);
        $('#car_color').val(data.car_color);
        $('#car_mileage').val(data.car_mileage);

		 $('#myModal').modal('show');
		

	   }
 });

}


function del(id)
{
    var proceed = confirm("Are you sure you want to proceed?");
    if (proceed) {
	var data = 'id='+id;
	$.ajax({
	  type: "POST",
	  url: "car_del",
	  data: data,
	  success: function(data){
		alert("deleted")
        location.reload();
		

	   }
 });
}

}


function newentry()
{
	$('#myModalc').modal('show');
	
}

function save()
{

	let car_model=$('#car_model_save').val();
	let manuf_year=$('#manuf_year_save').val();
	let car_color=$('#car_color_save').val();
	let car_mileage=$('#car_mileage_save').val();
	var data = 'car_model='+car_model+'&manuf_year='+manuf_year+'&car_color='+car_color+'&car_mileage='+car_mileage;
	$.ajax({
	  type: "POST",
	  url: "save",
	  data: data,
	  success: function(data){
		alert("saved")
        location.reload();
		

	   }
 });

}

function update()
{

	let car_id=$('#car_id').val();
	let car_model=$('#car_model').val();
	let manuf_year=$('#manuf_year').val();
	let car_color=$('#car_color').val();
	let car_mileage=$('#car_mileage').val();
	var data = 'car_model='+car_model+'&manuf_year='+manuf_year+'&car_color='+car_color+'&car_mileage='+car_mileage+'&car_id='+car_id;
	$.ajax({
	  type: "POST",
	  url: "update",
	  data: data,
	  success: function(data){
        alert("updated")
        location.reload();
		

	   }
 });

}
