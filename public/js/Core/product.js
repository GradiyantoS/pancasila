$(window).load(function() {  
	 $.ajax({
		url: 'product/show',
		type: 'GET',
		success: function(data) {
			console.log(data);
		}
	});
});