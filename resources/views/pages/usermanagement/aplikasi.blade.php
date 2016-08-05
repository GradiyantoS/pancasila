@extends('layouts.app')

@section('title')

Universitas Pancasila

@endsection

@section('content')

<script type="text/javascript" src="./js/core/usermanagement/aplikasi.js"></script>

	<div class="site-content" id="site-content">
		<section class="breadcrumb">
			<div class="container">
				<div class="wrap">
					<ul>
						<li><a href="{{ URL::to('/') }}">Home</a></li>
						<li>User Management</li>
						<li>Aplikasi</li>
					</ul>
				</div>
			</div>
		</section>

		<section class="page-heading">
			<div class="container">
				<h1>Aplikasi</h1>
			</div>
		</section>

		<div class="main-content has-widget" id="main-content">
			<div class="container">
				<div class="box-container">
					<div class="single-content popup-content">
						<div class="mainalert"></div>
						<p>
							<button id="add" data-toggle="modal" data-target="#add-aplikasi" class="button button-primary" >Tambah Aplikasi</button>
						</p>
						<table class="table zebra bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Nama Aplikasi</th>
									<th>Alamat URL</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="dataListAplikasi">
								<tr id="iTemplateAplikasi" class="looptemplate">
									<td class="iNo"></td>
									<td class="iNamaAplikasi"></td>
									<td class="iLinkAplikasi"></td>
									<td class="iAction">
										<a data-toggle="modal" data-target="#add-aplikasi" class="editbutton icon-edit" title="Edit"></a>
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
	<div class="modal fade" id="add-aplikasi">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<span class="right close" data-dismiss="modal" aria-hidden="true">&#215;</span>
					<h2 class="modal-title">Tambah Aplikasi</h2>
				</div>
				<form id="action">
					<div class="modal-body">
						<input type="hidden" id="idAplikasi" name="idAplikasi" placeholder="ID Aplikasi">
						<p>
							<label for="namaAplikasi">Nama Aplikasi<span class="required">*</span></label>
							<input type="text" id="namaAplikasi" name="namaAplikasi" placeholder="Nama Aplikasi">
						</p>
						<p>
							<label for="linkAplikasi">Link Aplikasi<span class="required">*</span></label>
							<input type="text" id="linkAplikasi" name="linkAplikasi" placeholder ="Link URL Aplikasi">
						</p> 
					</div>
					<div class="modalalert"></div>
					<div class="modal-footer">
						<input type="submit" class="button button-primary" value="Save" />
						<input type="button" class="button button-secondary" data-dismiss="modal" value="Close" />                    
					</div>
				</form>
			</div>
		</div>						
	</div>
@endsection