$('document').ready(function(){
	var arr = []
	$("#city").keyup(function(){
		console.log('ready')
		$.ajax({
			url: "cityresponse.php",
			type: 'get',
			data:{
				cityget: $('#city').val()
			},
			dataType: "json",
			success: function(data){
			for(var i in data){
				arr.push(data[i].city+", "+data[i].region)
			}
			console.log(arr);//Returns first item in cities array

			}
		})
	});
	
	$("#city").typeahead({ source:arr });
	
})


