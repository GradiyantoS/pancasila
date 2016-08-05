$(window).load(function() {
	var masterCurrentPage = 1;
	function filterAplikasi(){
		$.ajax({
			url: 'filter/getAllDataAplikasi',
			type: 'GET',
			success: function(data) {
				$("#searchAplikasi").empty().append('<option value="">Please Select</option>');
				for(var i = 0; i < data.response.length; i++){
					var item = data.response[i];
					var opt = $('<option></option>').attr('value', item.idaplikasi).text(item.namaaplikasi);
					$("#searchAplikasi").append(opt);
					$('#searchAplikasi').chosen({width:'100%'});
					$('#searchAplikasi').trigger("chosen:updated");
				}
			}
		});
	}
	function refreshdata(aplikasi){
		if(aplikasi == ''){
			aplikasi = 0;
		} else {
			aplikasi = aplikasi;
		}
		$.ajax({
			url: 'menu/getAllData/'+aplikasi,
			type: 'GET',
			success: function(data) {
				if(data.response.data.length <= 0){
					$F.alertWarning('No Data Selected','.mainalert');
					$('.datarowMenu').remove();
				} else {
					var c = $('#dataListMenu');
					var t = $('#iTemplateMenu');
					$('.datarowMenu').remove();
					for(var i = 0; i < data.response.data.length; i++){
						var item = data.response.data[i];
						var e = t.clone();
						e.removeClass('looptemplate').removeAttr('id').addClass('datarowMenu');
						$('.iNo', e).text(i+1);
						var path = item.path2;
						var panjang = path.split('.').length;
						if(panjang > 1){
							var tab = '';
							for(var x = 0; x < panjang; x++){
								tab += '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
							}
							var fullNamaMenu = tab+item.namamenu;
							$('.iNamaMenu', e).html(fullNamaMenu);
						} else {
							$('.iNamaMenu', e).text(item.namamenu);
						}						
						$('.iLinkMenu', e).text(item.linkmenu);
						$('.up', e).attr('data-ids', item.idmenu);
						$('.down', e).attr('data-ids', item.idmenu);
						$('.editbutton', e).attr('data-ids', item.idmenu);
						$('.deletebutton', e).attr('data-ids', item.idmenu);
						c.append(e);
						
						$('.editbutton', e).click(function(e) { //UPDATE DATA
							var id = $(this).attr('data-ids');
							$.ajax({
								type: "GET",
								url: 'menu/getAllDataUpdate/'+id,
								dataType: 'JSON',
								success: function(data) {
									if(data.status === 'Error'){
										$('#add-Menu').modal('hide');
										$F.alertError(data.response.data[0].DescriptionReport,'.modalalert');
									} else if(data.status === 'Success'){
										// aplikasi filter
										$("#namaAplikasi").empty().append('<option value="">Please Select</option>');
										for(var i = 0; i < data.response.aplikasi.length; i++){
											var item = data.response.aplikasi[i];
											var opt = $('<option></option>').attr('value', item.idaplikasi).text(item.namaaplikasi);
											$("#namaAplikasi").append(opt);
										}
										
										// menu filter
										$("#menuUtama").empty().append('<option value="0">Menu Utama</option>');
										for(var i = 0; i < data.response.menu.length; i++){
											var item = data.response.menu[i];
											var opt = $('<option></option>').attr('value', item.idmenu).text(item.namamenu);
											$("#menuUtama").append(opt);
										}
										$('#idAplikasi').val(data.response.data[0].idaplikasi);
										$('#idMenu').val(data.response.data[0].idmenu);
										$('#namaMenu').val(data.response.data[0].namamenu);
										$('#linkMenu').val(data.response.data[0].linkmenu);
									}									
								}
							}).done(function(data){
								$("#namaAplikasi").val(data.response.data[0].idaplikasi);
								$('#namaAplikasi').chosen({width:'100%'});
								$('#namaAplikasi').prop('disabled', true).trigger("chosen:updated");
								$('#menuUtama').chosen({width:'100%'});								
								if(data.response.data[0].idparentmenu == null){
									var parent = 0;
								} else {
									var parent = data.response.data[0].idparentmenu;
								}
								$('#menuUtama').val(parent).trigger("chosen:updated");
							});							
						});
						
						$('.deletebutton', e).click(function(e) { //DELETE DATA
							var id = $(this).attr('data-ids');
							bootbox.confirm("Anda yakin akan menghapus Menu ?", function(result) {
								if(result === true){
									$.ajax({
										url: 'menu/delete/'+id,
										success: function(data) {
											if(data.status === 'Error'){
												$F.alertError(data.response[0].DescriptionReport,'.modalalert');
											} else if(data.status === 'Success'){
												$F.alertSuccess(data.response[0].DescriptionReport,'.mainalert');
												$(window).scrollTop(0);
												refreshdata(masterCurrentPage);
											} else if(data.status === 'ErrorValidation'){
												var err = '';
												for(var field in data.response) {
													err += data.response[field] + '<br/>';
												}					
												$F.alertWarning(err,'.modalalert');
											}
										}
									});	
								}
							});
						});
						
						$('.up', e).click(function(e) { //DELETE DATA
							var id = $(this).attr('data-ids');							
							$.ajax({
								url: 'menu/up/'+id,
								success: function(data) {
									if(data.status === 'Error'){
										$(window).scrollTop(0);
										$F.alertError(data.response[0].DescriptionReport,'.mainalert');
									} else if(data.status === 'Success'){
										$F.alertSuccess(data.response[0].DescriptionReport,'.mainalert');
										$(window).scrollTop(0);
										refreshdata(masterCurrentPage);
									} else if(data.status === 'ErrorValidation'){
										var err = '';
										for(var field in data.response) {
											err += data.response[field] + '<br/>';
										}					
										$F.alertWarning(err,'.mainalert');
									}
								}
							});	
						});
						
						$('.down', e).click(function(e) { //DELETE DATA
							var id = $(this).attr('data-ids');							
							$.ajax({
								url: 'menu/down/'+id,
								success: function(data) {
									if(data.status === 'Error'){
										$(window).scrollTop(0);
										$F.alertError(data.response[0].DescriptionReport,'.mainalert');
									} else if(data.status === 'Success'){
										$F.alertSuccess(data.response[0].DescriptionReport,'.mainalert');
										$(window).scrollTop(0);
										refreshdata(masterCurrentPage);
									} else if(data.status === 'ErrorValidation'){
										var err = '';
										for(var field in data.response) {
											err += data.response[field] + '<br/>';
										}					
										$F.alertWarning(err,'.mainalert');
									}
								}
							});	
						});
					}					
				}
			}
		});
	}
	
	filterAplikasi();

	$("#filter").click(function(){
		var val = $("#searchAplikasi").val();
		refreshdata(val);	
	});	
	
	$("#add").click(function(){		
		var idAplikasi  = 0;		
		if($("#searchAplikasi").val() != ''){
			idAplikasi = $("#searchAplikasi").val();
		} else {
			idAplikasi = 0;
		}
		$("#idMenu").val('');
		document.getElementById("action").reset();
		$.ajax({
			url: 'filter/filterInputMenu/'+idAplikasi,
			type: 'GET',
			success: function(data) {
				// aplikasi filter
				$("#namaAplikasi").empty().append('<option value="">Please Select</option>');
				for(var i = 0; i < data.response.aplikasi.length; i++){
					var item = data.response.aplikasi[i];
					var opt = $('<option></option>').attr('value', item.idaplikasi).text(item.namaaplikasi);
					$("#namaAplikasi").append(opt);
				}
				
				// menu filter
				$("#menuUtama").empty().append('<option value="0">Menu Utama</option>');
				for(var i = 0; i < data.response.menu.length; i++){
					var item = data.response.menu[i];
					var opt = $('<option></option>').attr('value', item.idaplikasi).text(item.namaaplikasi);
					$("#menuUtama").append(opt);
				}
			}
		}).done(function(){
			$("#idAplikasi").val($("#searchAplikasi").val());
			$("#namaAplikasi").val($("#searchAplikasi").val());
			$('#namaAplikasi').chosen({width:'100%'});
			$('#namaAplikasi').prop('disabled', true).trigger("chosen:updated");
			
			$('#menuUtama').chosen({width:'100%'});
			$('#menuUtama').val(0).trigger("chosen:updated");
		});		
	});
	
	$('#action').submit(function(e){
		e.preventDefault();
		var datasend = $("#action").serialize();
		datasend.namaAplikasi = $("#searchAplikasi").val();
		$.ajax({
			url: 'menu/action',
			type: 'POST',
			data: datasend,
			dataType: 'JSON',
			success: function(data) {
				if(data.status === 'Error'){
					$F.alertError(data.response[0].DescriptionReport,'.modalalert');
				} else if(data.status === 'Success'){
					$F.alertSuccess(data.response[0].DescriptionReport,'.mainalert');
					document.getElementById("action").reset();
					$('#add-Menu').modal('hide');
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