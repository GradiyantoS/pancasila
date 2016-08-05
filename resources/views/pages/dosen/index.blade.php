@extends('layouts.app')

@section('title', 'Universitas Pancasila - Dosen')

@section('content')
    <div class="site-content" id="site-content">
        <section class="user-content">
            <div class="container">
                <div class="row">
                    <div class="column two-thirds">
                        <section class="user-profile">
                            <div class="thumbnail">
								<span class="avatar">
									<img src="images/statics/avatar.png" alt="">
								</span>
                            </div>
                            <div class="details">
                                <div class="field">
                                    <h2 class="student-name">User Nicename</h2>
                                    <span class="position">Lorem ipsum dolor sit amet.</span>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="column one-third opposite">
                        <section class="user-role">
                            <div class="wrap">
                                <div class="field">
                                    <span class="label">Login As</span>
                                    <span class="component">
										<span class="login-role" id="login-role">
											<select name="login-role">
												<option value="Lecturer">Lecturer</option>
												<option value="Staff">Staff</option>
											</select>
										</span>
									</span>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>

        <section class="agenda-navigation">
            <div class="container">
                <div class="heading">
                    <i class="icon-calendar"></i>
                    <span class="label">Next Agenda</span>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav prev-button"></a>
                    <a href="#" class="nav next-button"></a>
                </div>
                <div class="agenda-content">
                    <ul>
                        <li>
							<span class="wrap">
								<span class="label">Monday</span>
								<span class="label">27 Jan 2014</span>
							</span>
                        </li>
                        <li>
							<span class="wrap">
								<span class="label">11.20 PM</span>
								<span class="label">13.00 PM</span>
							</span>
                        </li>
                        <li>
							<span class="wrap">
								<span class="label">Anggrek Campus</span>
								<span class="label">Room 601</span>
							</span>
                        </li>
                        <li>
							<span class="wrap">
								<span class="label">Interview I</span>
								<span class="label">Lecturer School of Design</span>
							</span>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <div class="main-content has-widget" id="main-content">
            <div class="container">
                <div class="widget-parent" id="widget-parent">
                    <div class="row">
                        @include('pages.dosen.status')
                        @include('pages.dosen.jenjang_jabatan_akademik')
                        @include('pages.dosen.sertifikasi')
                        @include('pages.dosen.prestasi')
                        @include('pages.dosen.jenjang_pendidikan_terakhir')
                        @include('pages.dosen.jenis')
                        @include('pages.dosen.profil_jenis_kelamin')
                        @include('pages.dosen.usia')
                        @include('pages.dosen.ketaatan_pelaksanaan_tridarma')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
