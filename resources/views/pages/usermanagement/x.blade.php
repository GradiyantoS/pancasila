@extends('layouts.app')

@section('title')

Universitas Pancasila

@endsection

@section('content')

<script type="text/javascript" src="./js/core/usermanagement/menu.js"></script>

	<div class="site-content" id="site-content">
		<section class="breadcrumb">
			<div class="container">
				<div class="wrap">
					<ul>
						<li><a href="{{ URL::to('/') }}">Home</a></li>
						<li>User Management</li>
						<li>Menu</li>
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
						<div class="search-filter-form">
							<form id="search">
								<div class="row">
									<div class="column one-full">
										<p>
											<label>Nama Aplikasi</label>
											<input type="text" name="searchNamaAplikasi[]">
										</p>
									</div>
								</div>
								<p class="action" align="right">
									<input value="Filter" class="button button-primary" type="button">
								</p>
							</form>
						</div>
						<p>
							<button data-toggle="modal" data-target="#add-aplikasi" class="button button-primary" >Tambah Aplikasi</button>
						</p>
						<table class="zebra bordered">
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
									<a data-toggle="modal" href="#add-aplikasi" class="editbutton"></a>
									<a class="deletebutton"></a>
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
					<a class="right close" data-dismiss="modal" aria-hidden="true">&#215;</a>
					<h2 class="modal-title">Tambah Aplikasi</h2>
				</div>
				<form id="action">
					<div class="modal-body">
						<p>
							<label for="namaAplikasi">Nama Aplikasi<span class="required">*</span></label>
							<input type="text" id="namaAplikasi" name="namaAplikasi[]">
						</p>
						<p>
							<label for="linkAplikasi">Link Aplikasi<span class="required">*</span></label>
							<input type="text" id="linkAplikasi" name="linkAplikasi[]">
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