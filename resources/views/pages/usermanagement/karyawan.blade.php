@extends('layouts.app')

@section('title')

Universitas Pancasila

@endsection

@section('content')

<script type="text/javascript" src="./js/core/usermanagement/karyawan.js"></script>

	<div class="site-content" id="site-content">
		<section class="breadcrumb">
			<div class="container">
				<div class="wrap">
					<ul>
						<li><a href="{{ URL::to('/') }}">Home</a></li>
						<li>User Management</li>
						<li>Karyawan</li>
					</ul>
				</div>
			</div>
		</section>

		<section class="page-heading">
			<div class="container">
				<h1>Karyawan</h1>
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
											<label for="searchStatus">Status</label>
											<span class="custom-chosen">
												<select id="searchStatus" name="searchStatus"></select>
											</span>
										</p>
										<p>
											<label for="searchNamaKaryawan">Nama Karyawan</label>
											<input type="text" id="searchNamaKaryawan" name="searchNamaKaryawan" placeholder="Nama Karyawan">
										</p>
									</div>
								</div>
								<p class="action" align="right">
									<input id="filter" value="Filter" class="button button-primary" type="button">
								</p>
							</form>
						</div>
						<p>
							<button id="add" data-toggle="modal" data-target="#add-Karyawan" class="button button-primary" >Tambah Karyawan</button>
							<a id="export" class="button button-primary" >Export to Excel</a>
						</p>
						<table class="table zebra bordered">
							<thead>
								<tr>
									<th>No Karyawan</th>
									<th>Nama Karyawan</th>
									<th>Email</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="dataListKaryawan">
								<tr id="iTemplateKaryawan" class="looptemplate">
									<td class="iNoKaryawan"></td>
									<td class="iNamaKaryawan"></td>
									<td class="iEmail"></td>
									<td class="iStatus"></td>
									<td class="iAction">
										<a data-toggle="modal" data-target="#add-Karyawan" class="button button-primary profile">Profil</a>
										<a data-toggle="modal" data-target="#add-Jabatan" class="button button-primary historyJabatan">Jabatan</a>
										<a class="editbutton icon-edit" title="Edit"></a>
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
	<div class="modal fade" id="add-Karyawan">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<span class="right close" data-dismiss="modal" aria-hidden="true">&#215;</span>
					<h2 class="modal-title">Tambah Data Karyawan</h2>
				</div>
				<form id="action">
					<div class="modal-body">
						<input type="hidden" id="idKaryawan" name="idKaryawan" placeholder="ID Karyawan">
						<p>
							<label for="noKaryawan">No Karyawan<span class="required">*</span></label>
							<input type="text" id="noKaryawan" name="noKaryawan" placeholder="No Karyawan">
						</p>
						<p>
							<label for="namaKaryawan">Nama Karyawan<span class="required">*</span></label>
							<input type="text" id="namaKaryawan" name="namaKaryawan" placeholder="Nama Karyawan">
						</p>
						<p>
							<label for="tanggalLahir">Tanggal Lahir<span class="required">*</span></label>
							<span class="custom-datepicker">
								<input type="text" id="tanggalLahir" name="tanggalLahir" class="tanggalLahir datepicker">
								<span class="icon-area"></span>
							</span>
						</p>
						<p>
							<label for="email">Email</label>
							<input type="text" id="email" name="email" placeholder="Email">
						</p>
						<p>
							<label for="NIDN">NIDN</label>
							<input type="text" id="NIDN" name="NIDN" placeholder="NIDN">
						</p>
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
	
	<!-- Jabatan -->			
	<div class="modal fade" id="add-Jabatan">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<span class="right close" data-dismiss="modal" aria-hidden="true">&#215;</span>
					<h2 class="modal-title">Histori Jabatan</h2>
					<button class="add right button button-primary">Tambah Jabatan</button>
				</div>
				<form id="actionHakAkses">
					<div class="modal-body">
						<input type="hidden" id="idKaryawanForHakAkses" name="idKaryawanHakAkses" placeholder="ID Karyawan">
						<p>
							<label for="noKaryawanJ">No Karyawan</label>
							<span type="text" id="noKaryawanJ"></span>
						</p>
						<p>
							<label for="namaKaryawanJ">Nama Karyawan</label>
							<span type="text" id="levelKaryawanText"></span>
						</p>						
						<table class="table zebra bordered">
							<thead>
								<tr>
									<th>Level Jabatan</th>
									<th>Nama Jabatan</th>
									<th>Data Akses</th>
									<th>Tanggal Mulai</th>
									<th>Tanggal Selesai</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="dataListHistoriJabatan">
								<tr id="iTemplateHistoriJabatan" class="looptemplate">
									<td class="iLeveljabatanHis"></td>
									<td class="iNamaJabatanHis"></td>
									<td class="iDataAksesHis"></td>
									<td class="iTanggalMulaiHis"></td>
									<td class="iTanggalSelesaiHis"></td>
									<td class="iAction">
										<a class="editbutton icon-edit" title="Edit"></a>
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