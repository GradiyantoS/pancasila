@extends('layouts.app')

@section('title', 'Universitas Pancasila - Dosen Dashboard')

@section('content')
    <div class="site-content" id="site-content">
        @include('layouts.user_content')

        @include('layouts.agenda_navigation')

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
