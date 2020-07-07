@extends('layouts.app')

@section('content')

<!-- #Region Jumborton -->
    <header id="register-header" class="header-image text-white d-none d-md-block mb-5">
        <div class="header-overlay">
            <div class="container">
                <div class="row">
                <div class="col">
                <h1 class="display-1">Join our Community</h1>
                <p>Bergabunglah dengan salah satu blog komunitas terbaik
                di Indonesia</p>
                </div>
                </div>
            </div>
        </div>
    </header>
<!-- #Endregion Jumborton -->

<!-- #Region Form  -->
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @include('layouts.form',['tombol'=>'Daftar'])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- #Endegion Form -->
@endsection
