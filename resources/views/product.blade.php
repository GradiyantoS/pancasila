@extends('layouts.app')

@section('title')

Universitas Pancasila

@endsection

@section('content')

<script type="text/javascript" src="./js/core/product.js"></script>

	<div class="site-content" id="site-content">
		<section class="breadcrumb">
			<div class="container">
				<div class="wrap">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Documentation</a></li>
						<li>Forms</li>
					</ul>
				</div>
			</div>
		</section>

		<section class="page-heading">
			<div class="container">
				<h1>Form</h1>
			</div>
		</section>

		<div class="main-content has-widget" id="main-content">
			<div class="container">
				<div class="box-container">
					<div class="single-content popup-content" id="target-id">
                        <span class="alert is-error">
                            Form is error.
                        </span>
                        <span class="alert is-success">
                            Form has been saved.
                        </span>
                        <span class="alert is-warning">
                            All field required.
                        </span>
						<form>
							<p>
								<label>Username<span class="required">*</span></label>
								<input type="text" name="input[]">
							</p>
							<p>
								<label>Password</label>
								<input type="password" name="input[]">
							</p>
							<p>
								<label>Date of Birth</label>
								<span class="custom-datepicker">
									<input type="text" name="input[]" class="datepicker">
									<span class="icon-area"></span>
								</span>
							</p>
                            <p>
                                <label>Choose Time</label>
                                <span class="custom-timepicker">
                                    <input type="text" name="input[]" class="timepicker">
									<span class="icon-area"></span>
                                </span>
                            </p>
                            <p>
                                <label>Choose DateTime</label>
                                <span class="custom-datetimepicker">
                                    <input type="text" name="input[]" class="datetimepicker">
									<span class="icon-area"></span>
                                </span>
                            </p>
							<p>
								<label>Photo Profile</label>
								<span class="custom-uploader">
									<input type="text" readonly="readonly" class="field-temporary">
									<input type="file" name="input[]" class="upload-area">
									<span class="icon-area"></span>
								</span>
							</p>
							<p>
								<label>Country</label>
								<span class="custom-combobox">
									<select name="input[]">
										<option value="1">A</option>
										<option value="2">B</option>
										<option value="3">C</option>
										<option value="4">D</option>
									</select>
								</span>
							</p>
							<p>
								<label>About You</label>
								<textarea name="input[]" rows="5"></textarea>
							</p>
							<p>
								<label>Gender</label>
								<span class="group-radiobutton">
									<span class="custom-radiobutton">
										<input type="radio" name="input[]" id="male">
										<label class="label" for="male">Male</label>
									</span>
									<span class="custom-radiobutton">
										<input type="radio" name="input[]" id="female">
										<label class="label" for="female">Male</label>
									</span>
								</span>
							</p>
							<p>
								<span class="custom-checkbox">
									<input type="checkbox" name="input[]" id="check">
									<label class="label" for="check">Check me out</label>
								</span>
							</p>
							<p>
								<input type="reset" name="action[]" value="Cancel" class="button button-secondary">
								<input type="submit" name="action[]" value="Save" class="button button-primary">
								<button class="button button-primary">Button</button>
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection