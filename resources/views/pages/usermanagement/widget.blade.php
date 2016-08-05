@extends('layouts.app')

@section('title')

Universitas Pancasila

@endsection

@section('content')

<script type="text/javascript" src="./js/core/usermanagement/Widget.js"></script>

	<div class="site-content" id="site-content">
		<section class="breadcrumb">
			<div class="container">
				<div class="wrap">
					<ul>
						<li><a href="{{ URL::to('/') }}">Home</a></li>
						<li>User Management</li>
						<li>Widget</li>
					</ul>
				</div>
			</div>
		</section>

		<section class="page-heading">
			<div class="container">
				<h1>Widget</h1>
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
										<label for="searchMenu">Pilih Menu</label>
										<span class="custom-chosen">
											<select id="searchMenu" name="searchMenu"></select>
										</span>
									</p>
								</div>
							</div>
							<p class="action" align="right">
								<input id="filter" value="Filter" class="button button-primary" type="button">
							</p>
						</div>
						<p>
							<button id="add" data-toggle="modal" data-target="#add-Widget" class="button button-primary" >Tambah Widget</button>
						</p>
						<table class="table zebra bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Nama Menu</th>
									<th>Nama Widget</th>
									<th>Parameter</th>
									<th>Parameter Name</th>
									<th>Active</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="dataListWidget">
								<tr id="iTemplateWidget" class="looptemplate">
									<td class="iNo"></td>
									<td class="iNamaMenu"></td>
									<td class="iNamaWidget"></td>
									<td class="iParameter"><input type="checkbox" disabled class="ckParameter"></td>
									<td class="iParameterName"></td>
									<td class="iActive"><input type="checkbox" disabled class="ckActive"></td>
									<td class="iAction">										
										<a data-toggle="modal" data-target="#add-Widget" class="editbutton icon-edit" title="Edit"></a>
										<a class="up" title="Up">Up</a>
										<a class="down" title="Down">Down</a>
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
	<div class="modal fade" id="add-Widget">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<span class="right close" data-dismiss="modal" aria-hidden="true">&#215;</span>
					<h2 class="modal-title">Tambah Widget</h2>
				</div>
				<form id="action">
					<div class="modal-body">
						<input type="hidden" id="idWidget" name="idWidget" placeholder="ID Widget">
						<p>
							<label for="namaMenu">Nama Menu</label>
							<input type="hidden" id="idWidget" name="idWidget" placeholder="ID idWidget">
							<span class="custom-chosen">
								<select readonly="readonly" id="namaMenu" name="namaMenu"></select>
							</span>
						</p>
						<p>
							<label for="namaWidget">Nama Widget</label>
							<input type="text" id="namaWidget" name="namaWidget" placeholder="Nama Widget">
						</p>
						<p>
							<label for="parameter">Parameter</label>
							<input type="checkbox" id="parameter" name="parameter" value="1">
						</p>
						<p>
							<label for="namaParameter">Nama Parameter</label>
							<input type="text" id="namaParameter" name="namaParameter" placeholder="Nama Parameter">
						</p>
						<p>
							<label for="active">Active<</label>
							<input type="checkbox" id="active" name="active" value="1">
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