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
				<h1>Menu</h1>
			</div>
		</section>

		<div class="main-content has-widget" id="main-content">
			<div class="container">
				<div class="box-container">
					<div class="single-content popup-content">
						<div class="mainalert"></div>
						<div class="search-filter-form">
							<div class="row">
								<div class="column one-full">
									<p>
										<label for="searchAplikasi">Pilih Aplikasi</label>
										<span class="custom-chosen">
											<select id="searchAplikasi" name="searchAplikasi"></select>
										</span>
									</p>
								</div>
							</div>
							<p class="action" align="right">
								<input id="filter" value="Filter" class="button button-primary" type="button">
							</p>
						</div>
						<p>
							<button id="add" data-toggle="modal" data-target="#add-Menu" class="button button-primary" >Tambah Menu</button>
						</p>
						<table class="table zebra bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Nama Menu</th>
									<th>Alamat URL</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="dataListMenu">
								<tr id="iTemplateMenu" class="looptemplate">
									<td class="iNo"></td>
									<td class="iNamaMenu"></td>
									<td class="iLinkMenu"></td>
									<td class="iAction">
										<a class="up" title="Up">Up</a>
										<a class="down" title="Down">Down</a>
										<a data-toggle="modal" data-target="#add-Menu" class="editbutton icon-edit" title="Edit"></a>
										<a class="deletebutton icon-trash" title="Delete"></a>
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
	<div class="modal fade" id="add-Menu">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<span class="right close" data-dismiss="modal" aria-hidden="true">&#215;</span>
					<h2 class="modal-title">Tambah Menu</h2>
				</div>
				<form id="action">
					<div class="modal-body">
						<input type="hidden" id="idMenu" name="idMenu" placeholder="ID Menu">
						<p>
							<label for="namaAplikasi">Nama Aplikasi<span class="required">*</span></label>
							<input type="hidden" id="idAplikasi" name="idAplikasi" placeholder="ID Aplikasi">
							<span class="custom-chosen">
								<select readonly="readonly" id="namaAplikasi" name="namaAplikasi"></select>
							</span>
						</p>
						<p>
							<label for="namaMenu">Nama Menu<span class="required">*</span></label>
							<input type="text" id="namaMenu" name="namaMenu" placeholder="Nama Menu">
						</p>
						<p>
							<label for="linkMenu">Link Menu<span class="required">*</span></label>
							<input type="text" id="linkMenu" name="linkMenu" placeholder ="Link URL Menu">
						</p>
						<p>
							<label for="menuUtama">Menu Utama<span class="required">*</span></label>
							<span class="custom-chosen">
								<select id="menuUtama" name="menuUtama"></select>
							</span>
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
@endsection