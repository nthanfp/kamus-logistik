@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container my-4">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Kamus Logistik</h1>
                <p class="col-md-8 fs-4">Kamus Logistik adalah sebuah aplikasi kamus yang menyediakan daftar istilah-istilah yang umum digunakan dalam bidang logistik, termasuk definisi dan penjelasan singkatnya.</p>
                <a href="{{ route('list-indonesia') }}">
                    <button class="btn btn-primary btn-lg" type="button">Jelajah Kamus</button>
                </a>
            </div>
        </div>
    </div>
@endsection
