$(window).load(function() {
	var masterCurrentPage = 1;
	function refreshdata(page){
		if(typeof(page) === "undefined"){
			page = 1
		} else {
			page = page;
		}
		
		$.ajax({
			url: 'aplikasi/getAllData/'+page,
			type: 'GET',
			success: function(data) {
				if(data.response.data.length <= 0){
					$F.alertWarning('No Data Selected','.mainalert');
				} else {
					var c = $('#dataListAplikasi');
					var t = $('#iTemplateAplikasi');
					$('.datarowAplikasi').remove();
					for(var i = 0; i < data.response.data.length; i++){
						var item = data.response.data[i];
						var e = t.clone();
						e.removeClass('looptemplate').removeAttr('id').addClass('datarowAplikasi');
						$('.iNo', e).text(item.Num);
						$('.iNamaAplikasi', e).text(item.namaaplikasi);
						$('.iLinkAplikasi', e).text(item.linkaplikasi);
						$('.editbutton', e).attr('data-ids', item.idaplikasi);
						$('.deletebutton', e).attr('data-ids', item.idaplikasi);
						c.append(e);
						
						$('.editbutton', e).click(function(e) { //UPDATE DATA
							var id = $(this).attr('data-ids');
							$.ajax({
								type: "GET",
								url: 'aplikasi/getAllDataUpdate/'+id,
								dataType: 'JSON',
								success: function(data) {
									if(data.status === 'Error'){
										$('#add-aplikasi').modal('hide');
										$F.alertError(data.response[0].DescriptionReport,'.modalalert');
									} else if(data.status === 'Success'){
										$('#idAplikasi').val(data.response[0].idaplikasi);
										$('#namaAplikasi').val(data.response[0].namaaplikasi);
										$('#linkAplikasi').val(data.response[0].linkaplikasi);
									}									
								}
							});							
						});
					}
					
					$F.pagination({
						currentPage: page,
						dataCount: data.response.count[0].Count,
						perPage: data.response.perpage
					});
				}
			}
		}).done(function(){
            $('.paggings').click(function() {
                var id = $(this).attr('data-page');
                refreshdata(id);
				masterCurrentPage = id;
            });
        });
	}

	refreshdata(masterCurrentPage);	
	
	$("#add").click(function(){
		document.getElementById("action").reset();
	});
	
	$('#action').submit(function(e){
		e.preventDefault();
		var datasend = $("#action").serialize();
		$.ajax({
			url: 'aplikasi/action',
			type: 'POST',
			data: datasend,
			dataType: 'JSON',
			success: function(data) {
				if(data.status === 'Error'){
					$F.alertError(data.response[0].DescriptionReport,'.modalalert');
				} else if(data.status === 'Success'){
					$F.alertSuccess(data.response[0].DescriptionReport,'.mainalert');
					document.getElementById("action").reset();
					$('#add-aplikasi').modal('hide');
					refreshdata(masterCurrentPage);
					$(window).scrollTop(0);
				} else if(data.status === 'ErrorValidation'){
					var err = '';
					for(var field in data.response) {
						err += data.response[field] + '<br/>';
					}					
					$F.alertWarning(err,'.modalalert');
				}
			}
		});
	});
	
});