@extends('layouts.app')

@section('title')

Universitas Pancasila

@endsection

@section('content')

<script type="text/javascript" src="./js/core/usermanagement/jabatan.js"></script>

	<div class="site-content" id="site-content">
		<section class="breadcrumb">
			<div class="container">
				<div class="wrap">
					<ul>
						<li><a href="{{ URL::to('/') }}">Home</a></li>
						<li>User Management</li>
						<li>Jabatan</li>
					</ul>
				</div>
			</div>
		</section>

		<section class="page-heading">
			<div class="container">
				<h1>Jabatan</h1>
			</div>
		</section>

		<div class="main-content has-widget" id="main-content">
			<div class="container">
				<div class="box-container">
					<div class="single-content popup-content">
						<div class="mainalert"></div>
						<div class="search-filter-form">
							<form id="search">
								<div class="row">
									<div class="column one-full">
										<p>
											<label for="searchLevelJabatan">Tingkat Jabatan</label>
											<span class="custom-chosen">
												<select id="searchLevelJabatan" name="searchLevelJabatan"></select>
											</span>
										</p>
										<p>
											<label for="searchNamajabatan">Nama Jabatan</label>
											<input type="text" id="searchNamajabatan" name="searchNamajabatan" placeholder="Nama Jabatan">
										</p>
									</div>
								</div>
								<p class="action" align="right">
									<input id="filter" value="Filter" class="button button-primary" type="button">
								</p>
							</form>
						</div>
						<p>
							<button id="add" data-toggle="modal" data-target="#add-Jabatan" class="button button-primary" >Tambah Jabatan</button>
							<a id="export" class="button button-primary" >Export to Excel</a>
						</p>
						<table class="table zebra bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Nama Jabatan</th>
									<th>Level Jabatan</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="dataListJabatan">
								<tr id="iTemplateJabatan" class="looptemplate">
									<td class="iNo"></td>
									<td class="iNamaJabatan"></td>
									<td class="iLevelJabatan"></td>
									<td class="iAction">
										<a data-toggle="modal" data-target="#add-Jabatan" class="editbutton icon-edit" title="Edit"></a>
										<!--<a class="deletebutton icon-trash" title="Delete"></a>-->
										<a data-toggle="modal" data-target="#add-Hak-Akses" class="hakAkses icon-widget-reference" title="Add Hak Akses" ></a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>					
				</div>
			</div>
		</div>
	</div>
	
	
	<!-- Modal -->			
	<div class="modal fade" id="add-Jabatan">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<span class="right close" data-dismiss="modal" aria-hidden="true">&#215;</span>
					<h2 class="modal-title">Tambah Jabatan</h2>
				</div>
				<form id="action">
					<div class="modal-body">
						<input type="hidden" id="idJabatan" name="idJabatan" placeholder="ID Jabatan">
						<p>
							<label for="namaAplikasi">Nama Jabatan Indonesia<span class="required">*</span></label>
							<input type="text" id="namaJabatanIndo" name="namaJabatanIndo" placeholder="Nama Jabatan Indonesia">
						</p>
						<p>
							<label for="namaJabatan">Nama Jabatan Inggris<span class="required">*</span></label>
							<input type="text" id="namaJabatanIng" name="namaJabatanIng" placeholder="Nama Jabatan Inggris">
						</p>
						<p>
							<label for="levelJabatan">Tingkat Jabatan<span class="required">*</span></label>
							<span class="custom-chosen">
								<select id="levelJabatan" name="levelJabatan"></select>
							</span>
						</p>
						<div class="row">
							<div class="column one-half">
								<p>
									<label for="">Level Jabatan Atasan<span class="required">*</span></label>
									<span class="custom-chosen">
										<select id="levelJabatanAtasan" name="levelJabatanAtasan"></select>
									</span>
								</p> 
							</div>
							<div class="column one-half">
								<p>
									<label for="">Jabatan Atasan<span class="required">*</span></label>
									<span class="custom-chosen">
										<select id="jabatan" name="jabatan"></select>
									</span>
								</p> 
							</div>
						</div>
					</div>
					<div class="modalalert"></div>
					<div class="modal-footer">
						<input type="submit" class="button button-primary" value="Save" />
						<input type="reset" class="button button-red" value="Reset" />                    
						<input type="button" class="button button-secondary" data-dismiss="modal" value="Close" />                    
					</div>
				</form>
			</div>
		</div>						
	</div>
	
	<!-- Modal Hak Akses -->			
	<div class="modal fade" id="add-Hak-Akses">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<span class="right close" data-dismiss="modal" aria-hidden="true">&#215;</span>
					<h2 class="modal-title">Hak Akses Aplikasi</h2>
				</div>
				<form id="actionHakAkses">
					<div class="modal-body">
						<input type="hidden" id="idJabatanForHakAkses" name="idJabatanHakAkses" placeholder="ID Jabatan">
						<p>
							<label for="namaJabatan">Nama Jabatan</label>
							<span type="text" id="namaJabatan"></span>
						</p>
						<p>
							<label for="levelJabatanText">Level Jabatan</label>
							<span type="text" id="levelJabatanText"></span>
						</p>
						<p>
							<label for="namaAplikasi">Nama Aplikasi</label>
							<span class="custom-chosen">
								<select id="namaAplikasi" name="namaAplikasi"></select>
							</span>
						</p>
						<p>
							<label for="namaAplikasi">Check All Menu</label>
							<input type="checkbox" id="all">
						</p>
						<table class="table zebra bordered">
							<thead>
								<tr>
									<th>Nama Menu</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="dataListMenu">
								<tr id="iTemplateMenu" class="looptemplate">
									<td class="iNamaMenu"></td>
									<td class="iAction">
										<input type="checkbox" class="menu"/>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="modalalert"></div>
					<div class="modal-footer">
						<input type="submit" class="button button-primary" value="Save" />
						<input type="reset" class="button button-red" value="Reset" />                    
						<input type="button" class="button button-secondary" data-dismiss="modal" value="Close" />                    
					</div>
				</form>
			</div>
		</div>						
	</div>
@endsection