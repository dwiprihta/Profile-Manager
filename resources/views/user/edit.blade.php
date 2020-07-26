@extends('layouts.app')

@section('content')

<!-- HEADER IMAGE -->
<header id="update-header" class="header-image text-white d-none d-md-block">
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

<div class="container my-5">
  <div class="row ">
    <div class="col-lg-8">
      <h1>Edit Data</h1>
      <hr>
      <form method="POST" action="{{ url('/users/'.$user->id) }}"
      enctype="multipart/form-data">
        @method('PATCH')
        @include('layouts.form',['tombol' => 'Update'])
      </form>
    </div>
  </div>
</div>

@endsection
