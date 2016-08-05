$(window).load(function() {
	var masterCurrentPage = 1;
	function filterLevelJabatan(){
		$.ajax({
			url: 'filter/getAllDataLevelJabatan',
			type: 'GET',
			success: function(data) {
				$("#searchLevelJabatan").empty().append('<option value="0">All</option>');
				for(var i = 0; i < data.response.length; i++){
					var item = data.response[i];
					var opt = $('<option></option>').attr('value', item.idleveljabatan).text(item.namalevel);
					$("#searchLevelJabatan").append(opt);
					$('#searchLevelJabatan').chosen({width:'100%'});
					$('#searchLevelJabatan').trigger("chosen:updated");
				}
			}
		});
	}
	function refreshdata(page){
		if(typeof(page) === "undefined"){
			page = 1
		} else {
			page = page;
		}
		var datasearch = $("#search").serializeArray();
		datasearch.push({name: 'page', value: page});
		$.ajax({
			url: 'jabatan/getAllData',
			type: 'POST',
			data: datasearch,
			dataType: 'JSON',
			success: function(data) {
				if(data.response.data.length <= 0){
					$F.alertWarning('No Data Selected','.mainalert');
					$('.datarowJabatan').remove();
				} else {
					var c = $('#dataListJabatan');
					var t = $('#iTemplateJabatan');
					$('.datarowJabatan').remove();
					for(var i = 0; i < data.response.data.length; i++){
						var item = data.response.data[i];
						var e = t.clone();
						e.removeClass('looptemplate').removeAttr('id').addClass('datarowJabatan');
						$('.iNo', e).text(item.Num);
						$('.iNamaJabatan', e).text(item.namajabatanind);
						$('.iLevelJabatan', e).text(item.namalevel);
						$('.hakAkses', e).attr('data-ids', item.idjabatan);
						$('.editbutton', e).attr('data-ids', item.idjabatan);
						// $('.deletebutton', e).attr('data-ids', item.idjabatan);
						c.append(e);
						
						$('.editbutton', e).click(function(e) { //UPDATE DATA
							var id = $(this).attr('data-ids');
							$.ajax({
								type: "GET",
								url: 'jabatan/getAllDataUpdate/'+id,
								dataType: 'JSON',
								success: function(data) {
									if(data.status === 'Error'){
										$('#add-Jabatan').modal('hide');
										$F.alertError(data.response.data[0].DescriptionReport,'.modalalert');
									} else if(data.status === 'Success'){
										// Level Jabatan filter
										$("#levelJabatan").empty().append('<option value="">Please Select</option>');
										for(var i = 0; i < data.response.leveljabatan.length; i++){
											var item = data.response.leveljabatan[i];
											var opt = $('<option></option>').attr('value', item.idleveljabatan).text(item.namalevel);
											$("#levelJabatan").append(opt);
										}
										
										$("#levelJabatanAtasan").empty().append('<option value="">Please Select</option>');
										for(var i = 0; i < data.response.leveljabatan.length; i++){
											var item = data.response.leveljabatan[i];
											var opt = $('<option></option>').attr('value', item.idleveljabatan).text(item.namalevel);											
											$("#levelJabatanAtasan").append(opt);
										}
										
										// Jabatan filter
										$("#jabatan").empty().append('<option value="">Please Select</option>');
										for(var i = 0; i < data.response.jabatan.length; i++){
											var item = data.response.jabatan[i];
											var opt = $('<option></option>').attr('value', item.idjabatan).text(item.namajabatanind);
											$("#jabatan").append(opt);
										}
										
										$('#levelJabatan').val(data.response.data[0].idleveljabatan);
										$('#levelJabatanAtasan').val(data.response.data[0].idleveljabatanatasan);
										$('#jabatan').val(data.response.data[0].idjabatanatasan);
										$('#idJabatan').val(data.response.data[0].idjabatan);
										$('#namaJabatanIndo').val(data.response.data[0].namajabatanind);
										$('#namaJabatanIng').val(data.response.data[0].namajabataning);
									}									
								}
							}).done(function(data){
								$('#jabatan').chosen({width:'100%'});
								$('#jabatan').trigger("chosen:updated");
								$('#levelJabatan').chosen({width:'100%'});
								$('#levelJabatan').trigger("chosen:updated");
								$('#levelJabatanAtasan').chosen({width:'100%'});
								$('#levelJabatanAtasan').trigger("chosen:updated");
							});							
						});
						
						$('.hakAkses', e).click(function(e) { //UPDATE DATA HAK AKSES
							var id = $(this).attr('data-ids');
							$.ajax({
								type: "GET",
								url: 'jabatan/getAllDataUpdateHakAkses/'+id,
								dataType: 'JSON',
								success: function(data) {
									if(data.status === 'Error'){
										$('#add-Hak-Akses').modal('hide');
										$F.alertError(data.response.data[0].DescriptionReport,'.modalalert');
									} else if(data.status === 'Success'){
										// aplikasi filter
										$("#namaAplikasi").empty().append('<option value="0">Please Select</option>');
										for(var i = 0; i < data.response.aplikasi.length; i++){
											var item = data.response.aplikasi[i];
											var opt = $('<option></option>').attr('value', item.idaplikasi).text(item.namaaplikasi);
											$("#namaAplikasi").append(opt);
										}
										
										var info = data.response.data[0];
										$("#namaJabatan").text(info.namajabatanind);
										$("#levelJabatanText").text(info.namalevel);
										$("#namaAplikasi").val(info.idaplikasi);
										$('#namaAplikasi').chosen({width:'100%'});
										$('#namaAplikasi').trigger("chosen:updated");
										$('#idJabatanForHakAkses').val(info.idjabatan);
										
										// Menu Hak Akses
										
										var c = $('#dataListMenu');
										var t = $('#iTemplateMenu');
										$('.datarowMenu').remove();
										for(var i = 0; i < data.response.detail.length; i++){
											var item = data.response.detail[i];
											var e = t.clone();
											e.removeClass('looptemplate').removeAttr('id').addClass('datarowMenu');
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
											$('.menu', e).val(item.idmenu).attr("name", "menu[]").addClass(item.idmenu);
											if(item.CheckMenu != 0){
												$('.menu', e).prop("checked",true);
											} else {
												$('.menu', e).prop("checked",false);
											}
											
											$('.menu', e).click(function(){
												var val = $(this).val();
												var ck = 0;
												if($(this).is(':checked') === true){
													ck = 1;
												} else {
													ck = 0;
												}
												$.ajax({
													url: 'jabatan/getMenuChild/'+val,
													type: 'GET',
													success: function(data) {
														for(var i = 0; i < data.response.length; i++){
															var item = data.response[i];
															if(ck === 1){
																$('.'+item.idmenu).prop("checked",true);
															} else {
																$('.'+item.idmenu).prop("checked",false);
															}
														}
													}
												});
											});
											
											c.append(e);
										}
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
	
	filterLevelJabatan();

	$("#filter").click(function(){
		refreshdata(masterCurrentPage);	
	});	
	
	// check all menu
	$('#all').click(function(){
		if($(this).is(':checked') === true){
			$('.menu').prop("checked",true);
		} else {
			$('.menu').prop("checked",false);
		}
	});
	
	$("#levelJabatanAtasan").change(function(){
		var val = $(this).val();
		$.ajax({
			url: 'filter/getAllDataJabatan/'+val,
			type: 'GET',
			success: function(data) {
				$("#jabatan").empty().append('<option value="">Please Select</option>');
				for(var i = 0; i < data.response.length; i++){
					var item = data.response[i];
					var opt = $('<option></option>').attr('value', item.idjabatan).text(item.namajabatanind);
					$("#jabatan").append(opt);
					$('#jabatan').chosen({width:'100%'});
					$('#jabatan').trigger("chosen:updated");
				}
			}
		});
	});
	
	// Change aplikasi for menu
	$("#namaAplikasi").change(function(){
		var val = $(this).val();
		$.ajax({
			url: 'filter/filterInputMenu/'+val,
			type: 'GET',
			success: function(data) {
				// Menu Hak Akses
				
				var c = $('#dataListMenu');
				var t = $('#iTemplateMenu');
				$('.datarowMenu').remove();
				for(var i = 0; i < data.response.menu.length; i++){
					var item = data.response.menu[i];
					var e = t.clone();
					e.removeClass('looptemplate').removeAttr('id').addClass('datarowMenu');
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
					$('.menu', e).val(item.idmenu).attr("name", "menu[]").addClass(item.idmenu);
					
					$('.menu', e).click(function(){
						var val = $(this).val();
						var ck = 0;
						if($(this).is(':checked') === true){
							ck = 1;
						} else {
							ck = 0;
						}
						$.ajax({
							url: 'jabatan/getMenuChild/'+val,
							type: 'GET',
							success: function(data) {
								for(var i = 0; i < data.response.length; i++){
									var item = data.response[i];
									if(ck === 1){
										$('.'+item.idmenu).prop("checked",true);
									} else {
										$('.'+item.idmenu).prop("checked",false);
									}
								}
							}
						});
					});
					
					c.append(e);
				}
			}
		});
	});
	
	// Tambah Jabatan
	$("#add").click(function(){		
		var idAplikasi  = 0;		
		if($("#searchAplikasi").val() != ''){
			idAplikasi = $("#searchAplikasi").val();
		} else {
			idAplikasi = 0;
		}
		$("#idjabatan").val('');
		document.getElementById("action").reset();
		$("#levelJabatan").empty();
		$("#levelJabatanAtasan").empty();
		$("#jabatan").empty();
		$('#jabatan').chosen({width:'100%'});
		$('#jabatan').trigger("chosen:updated");
		$.ajax({
			url: 'filter/getAllDataLevelJabatan',
			type: 'GET',
			success: function(data) {
				// aplikasi filter
				$("#levelJabatan").empty().append('<option value="">Please Select</option>');
				
				for(var i = 0; i < data.response.length; i++){
					var item = data.response[i];
					var opt = $('<option></option>').attr('value', item.idleveljabatan).text(item.namalevel);
					$("#levelJabatan").append(opt);					
				}
				
				$("#levelJabatanAtasan").empty().append('<option value="">Please Select</option>');
				for(var i = 0; i < data.response.length; i++){
					var item = data.response[i];
					var opt = $('<option></option>').attr('value', item.idleveljabatan).text(item.namalevel);
					$("#levelJabatanAtasan").append(opt);					
				}
			}
		}).done(function(){			
			$('#levelJabatan').chosen({width:'100%'});
			$('#levelJabatan').trigger("chosen:updated");
			$('#levelJabatanAtasan').chosen({width:'100%'});
			$('#levelJabatanAtasan').trigger("chosen:updated");
		});		
	});
	
	// Save action Jabatan
	$('#action').submit(function(e){
		e.preventDefault();
		var datasend = $("#action").serialize();
		$.ajax({
			url: 'jabatan/action',
			type: 'POST',
			data: datasend,
			dataType: 'JSON',
			success: function(data) {
				if(data.status === 'Error'){
					$F.alertError(data.response[0].DescriptionReport,'.modalalert');
				} else if(data.status === 'Success'){
					$F.alertSuccess(data.response[0].DescriptionReport,'.mainalert');
					document.getElementById("action").reset();
					$('#add-Jabatan').modal('hide');
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
	
	// Save action Jabatan
	$('#actionHakAkses').submit(function(e){
		e.preventDefault();
		var datasend = $("#actionHakAkses").serialize();
		$.ajax({
			url: 'jabatan/actionHakAkses',
			type: 'POST',
			data: datasend,
			dataType: 'JSON',
			success: function(data) {
				if(data.status === 'Error'){
					$F.alertError(data.response[0].DescriptionReport,'.modalalert');
				} else if(data.status === 'Success'){
					$F.alertSuccess(data.response[0].DescriptionReport,'.mainalert');
					document.getElementById("actionHakAkses").reset();
					$('#add-Hak-Akses').modal('hide');
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