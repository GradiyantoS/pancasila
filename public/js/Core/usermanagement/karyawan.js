$(window).load(function() {
	var masterCurrentPage = 1;
	function filterStatus(){
		$.ajax({
			url: 'filter/getAllDataStatus',
			type: 'GET',
			success: function(data) {
				$("#searchStatus").empty().append('<option value="">Please Select</option>');
				for(var i = 0; i < data.response.length; i++){
					var item = data.response[i];
					var opt = $('<option></option>').attr('value', item.idstatus).text(item.namastatus);
					$("#searchStatus").append(opt);
					$('#searchStatus').chosen({width:'100%'});
					$('#searchStatus').trigger("chosen:updated");
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
			url: 'karyawan/getAllData',
			type: 'POST',
			data: datasearch,
			dataType: 'JSON',
			success: function(data) {
				if(data.response.data.length <= 0){
					$F.alertWarning('No Data Selected','.mainalert');
					$('.datarowKaryawan').remove();
				} else {
					var c = $('#dataListKaryawan');
					var t = $('#iTemplateKaryawan');
					$('.datarowKaryawan').remove();
					for(var i = 0; i < data.response.data.length; i++){
						var item = data.response.data[i];
						var e = t.clone();
						e.removeClass('looptemplate').removeAttr('id').addClass('datarowKaryawan');
						$('.iNoKaryawan', e).text(item.nokaryawan);
						$('.iNamaKaryawan', e).text(item.namakaryawan);
						$('.iEmail', e).text(item.email);
						$('.iStatus', e).text(item.namastatus);
						$('.profile', e).attr('data-ids', item.idkaryawan);
						$('.historyJabatan', e).attr('data-ids', item.idkaryawan);
						c.append(e);
						
						$('.profile', e).click(function(e) { //UPDATE DATA
							var id = $(this).attr('data-ids');
							$.ajax({
								type: "GET",
								url: 'karyawan/getAllDataUpdate/'+id,
								dataType: 'JSON',
								success: function(data) {
									if(data.status === 'Error'){
										$('#add-Karyawan').modal('hide');
										$F.alertError(data.response.data[0].DescriptionReport,'.mainalert');
									} else if(data.status === 'Success'){
										$('#idKaryawan').val(data.response.data[0].idkaryawan);
										$('#noKaryawan').val(data.response.data[0].nokaryawan);
										$('#namaKaryawan').val(data.response.data[0].namakaryawan);
										$('#tanggalLahir').val(data.response.data[0].tanggallahir);
										$('#email').val(data.response.data[0].email);
										$('#NIDN').val(data.response.data[0].NIDN);
									}									
								}
							});							
						});
						
						$('.historyJabatan', e).click(function(e) { //UPDATE DATA HAK AKSES
							var id = $(this).attr('data-ids');
							$.ajax({
								type: "GET",
								url: 'Karyawan/getAllDataUpdateHakAkses/'+id,
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
										$("#namaKaryawan").text(info.namaKaryawanind);
										$("#levelKaryawanText").text(info.namalevel);
										$("#namaAplikasi").val(info.idaplikasi);
										$('#namaAplikasi').chosen({width:'100%'});
										$('#namaAplikasi').trigger("chosen:updated");
										$('#idKaryawanForHakAkses').val(info.idKaryawan);
										
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
													url: 'Karyawan/getMenuChild/'+val,
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
	
	filterStatus();

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
	
	$("#levelKaryawanAtasan").change(function(){
		var val = $(this).val();
		$.ajax({
			url: 'filter/getAllDataKaryawan/'+val,
			type: 'GET',
			success: function(data) {
				$("#Karyawan").empty().append('<option value="">Please Select</option>');
				for(var i = 0; i < data.response.length; i++){
					var item = data.response[i];
					var opt = $('<option></option>').attr('value', item.idKaryawan).text(item.namaKaryawanind);
					$("#Karyawan").append(opt);
					$('#Karyawan').chosen({width:'100%'});
					$('#Karyawan').trigger("chosen:updated");
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
							url: 'Karyawan/getMenuChild/'+val,
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
	
	// Tambah Karyawan
	$("#add").click(function(){		
		var idAplikasi  = 0;		
		if($("#searchAplikasi").val() != ''){
			idAplikasi = $("#searchAplikasi").val();
		} else {
			idAplikasi = 0;
		}
		$("#idKaryawan").val('');
		document.getElementById("action").reset();
		$("#levelKaryawan").empty();
		$("#levelKaryawanAtasan").empty();
		$("#Karyawan").empty();
		$('#Karyawan').chosen({width:'100%'});
		$('#Karyawan').trigger("chosen:updated");
		$.ajax({
			url: 'filter/getAllDataLevelKaryawan',
			type: 'GET',
			success: function(data) {
				// aplikasi filter
				$("#levelKaryawan").empty().append('<option value="">Please Select</option>');
				
				for(var i = 0; i < data.response.length; i++){
					var item = data.response[i];
					var opt = $('<option></option>').attr('value', item.idlevelKaryawan).text(item.namalevel);
					$("#levelKaryawan").append(opt);					
				}
				
				$("#levelKaryawanAtasan").empty().append('<option value="">Please Select</option>');
				for(var i = 0; i < data.response.length; i++){
					var item = data.response[i];
					var opt = $('<option></option>').attr('value', item.idlevelKaryawan).text(item.namalevel);
					$("#levelKaryawanAtasan").append(opt);					
				}
			}
		}).done(function(){			
			$('#levelKaryawan').chosen({width:'100%'});
			$('#levelKaryawan').trigger("chosen:updated");
			$('#levelKaryawanAtasan').chosen({width:'100%'});
			$('#levelKaryawanAtasan').trigger("chosen:updated");
		});		
	});
	
	// Save action Karyawan
	$('#action').submit(function(e){
		e.preventDefault();
		var datasend = $("#action").serialize();
		$.ajax({
			url: 'karyawan/action',
			type: 'POST',
			data: datasend,
			dataType: 'JSON',
			success: function(data) {
				if(data.status === 'Error'){
					$F.alertError(data.response[0].DescriptionReport,'.modalalert');
				} else if(data.status === 'Success'){
					$F.alertSuccess(data.response[0].DescriptionReport,'.mainalert');
					document.getElementById("action").reset();
					$('#add-Karyawan').modal('hide');
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
	
	// Save action Karyawan
	$('#actionHakAkses').submit(function(e){
		e.preventDefault();
		var datasend = $("#actionHakAkses").serialize();
		$.ajax({
			url: 'Karyawan/actionHakAkses',
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