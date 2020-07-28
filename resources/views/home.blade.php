@extends('layouts.app')

@section('content')

<!-- SLIDER -->
<header id="main-slide">
<div id="mySlide" class="carousel slide carousel-fade" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#mySlide" data-slide-to="0" class="active"></li>
    <li data-target="#mySlide" data-slide-to="1"></li>
    <li data-target="#mySlide" data-slide-to="2"></li>
    <li data-target="#mySlide" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner text-white">
    <div class="carousel-item active" id="slide1">
      <div class="container">
        <div class="d-none d-md-block">
          <h1 class="display-1 bg-info px-4 pb-2 d-inline-block">
            Get<strong> Inspired</strong>
          </h1>
          <br>
          <p class="bg-dark px-2 pb-1 d-inline-block">Lorem ipsum dolor, sit
            amet consectetur adipisicing elit. Aut cumque molestias asperiores
            ipsam officiis? Doloremque.</p>
        </div>
      </div>
    </div>
    <div class="carousel-item" id="slide2">
      <div class="container">
        <div class="d-none d-md-block text-right">
          <h1 class="display-1 bg-dark px-4 pb-2 d-inline-block">
            Take<strong> Action</strong>
          </h1>
          <br>
          <p class="bg-info px-2 pb-1 d-inline-block">Lorem ipsum dolor, sit
            amet consectetur adipisicing elit. Aut cumque molestias asperiores
            ipsam officiis? Doloremque.</p>
        </div>
      </div>
    </div>
    <div class="carousel-item" id="slide3">
      <div class="container">
        <div class="d-none d-md-block">
          <h1 class="display-1 bg-info px-4 pb-2 d-inline-block">
            Be<strong> Social</strong>
          </h1>
          <br>
          <p class="bg-dark px-2 pb-1 d-inline-block">Lorem ipsum dolor, sit
            amet consectetur adipisicing elit. Aut cumque molestias asperiores
            ipsam officiis? Doloremque.</p>
        </div>
      </div>
    </div>
    <div class="carousel-item" id="slide4">
      <div class="container">
        <div class="d-none d-md-block text-right">
          <h1 class="display-1 bg-dark px-4 pb-2 d-inline-block">
            Find<strong> Stories</strong>
          </h1>
          <br>
          <p class="bg-info px-2 pb-1 d-inline-block">Lorem ipsum dolor, sit
            amet consectetur adipisicing elit. Aut cumque molestias asperiores
            ipsam officiis? Doloremque.</p>
        </div>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#mySlide" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#mySlide" data-slide="next">
    <span class="carousel-control-next-icon"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</header>

<!-- MEMBER LIST -->
<section id="member-list" class="py-5 bg-light text-center">
  <div class="container">
    <div class="row">
      <div class="col text-center" >
        <h1>Member List</h1>
        <hr class="w-25">
        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing
          elit. Dignissimos, vitae!</p>

          {{-- Untuk flash message --}}
          @if(session()->has('pesan'))
            @if(session()->get('pesan')== 'update')
            <div class="alert alert-success alert-dismissible w-50 mx-auto
                       fade show">
              Data <b>{{session()->get('nama')}}</b> berhasil di update
              <button type="button" class="close" data-dismiss="alert">
                  <span>&times;</span>
              </button>
            </div>
            @endif
            @if(session()->get('pesan')== 'delete')
            <div class="alert alert-danger alert-dismissible w-50 mx-auto
                       fade show">
              Data <b>{{session()->get('nama')}}</b> sudah dihapus
              <button type="button" class="close" data-dismiss="alert">
                  <span>&times;</span>
              </button>
            </div>
            @endif
          @endif

      </div>
    </div>

    {{-- Proses looping untuk menampilkan semua user --}}
    <div class="card-columns">
      @forelse ($users as $user)
        <div class="card">
          <img class="card-img-top"
               src="{{ asset('img/gambar'.$user->background_profil.'.jpg')}}">
          <div class="card-body">
            <img src="{{ asset('storage/uploads/'.$user->gambar_profil)}}"
                 class="rounded-circle img-thumbnail">
            <h5 class="card-title">{{$user->nama}}</h5>
            <p class="card-text">"{{$user->bio_profil  ?? '. . .'}}"</p>
            <ul class="fa-ul text-left">
              <li class="mb-2">
                <span class="fa-li"><i class="far fa-clock"></i></span>
                Join in {{ date('F Y', strtotime($user->created_at)) }}
              </li>
              <li class="mb-2">
                <span class="fa-li"><i class="fas fa-briefcase"></i></span>
                {{$user->pekerjaan ?? '. . .'}}
              </li>
              <li class="mb-2">
                <span class="fa-li"><i class="fas fa-home"></i></span>
                {{$user->kota  ?? '. . .'}}
              </li>
              <li class="mb-2">
                <span class="fa-li"><i class="fas fa-birthday-cake"></i></span>
                {{ date_diff(date_create($user->tanggal_lahir ),
                   date_create('now'))->y }} tahun
              </li>
              <li class="mb-2">
                <span class="fa-li"><i class="fas fa-envelope"></i></span>
                {{$user->email}}
              </li>
            </ul>
            {{-- Tombol edit & hapus hanya untuk user sendiri atau admin --}}
            {{-- Ini menggunakan laravel policy --}}
            @can('update', $user)
            <div class="btn-action">
              <a href="{{ url('/users/'.$user->id.'/edit')}}"
                 class="btn btn-primary d-inline-block">Edit</a>
              <button class="btn btn-danger btn-hapus" data-id="{{$user->id}}"
                data-toggle="modal" data-target="#DeleteModal">Hapus</button>
            </div>
            @endcan
          </div>
        </div>
      @empty
        <p>Tidak ada data...</p>
      @endforelse
    </div>
  </div>
</section>

{{-- Modal untuk konfirmasi proses delete --}}

<div id="DeleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog ">
  <!-- Modal content-->
    <form action="" id="deleteForm" method="post">
    @csrf
    @method('DELETE')
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center">Konfirmasi</h4>
        <button type="button" class="close" data-dismiss="modal">
        &times;</button>
      </div>
      <div class="modal-body">
        <p class="text-center">Anda yakin akan menghapus User ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">
            Cancel</button>
        <button type="submit" class="btn btn-danger" data-dismiss="modal">
            Ya, Hapus</button>
      </div>
    </div>
    </form>
  </div>
</div>

@endsection
