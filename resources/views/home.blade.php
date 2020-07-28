@extends('layouts.app')
@section('content')

<section id="member-list" class="py-5 bg-light text-center">
    <div class="container">
        <div class="row">
            <div class="col text-center" >
                <h1>Member List</h1>
                <hr class="w-25"><p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing
                elit. Dignissimos, vitae!</p>

                <!-- #region alert -->
                    @if(session()->has('pesan'))
                        <!-- alert update -->
                        @if(session()->has('pesan')=='update')
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data <b>{{session()->get('nama')}}</b> berhasil diubah
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <!-- alert delete -->
                        @if(session()->has('pesan')=='delete')
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data <b>{{session()->get('nama')}}</b> berhasil dihapus
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    @endif
                <!-- #endregion alert -->

                <!-- #region looping for show all user -->
                    <div class="card-columns">
                        @forelse ($users as $user)
                        <div class="card">
                            <!-- background profil -->
                            <img class="card-img-top" src="{{ asset('img/gambar'.$user->background_profil.'.jpg')}}" alt="gambar profil user">
                            <!-- profile picture -->
                            <div class="card-body">
                                <img src="{{ asset('storage/uploads/'.$user->gambar_profil)}}" alt="foto profil user" class="rounded-circle img-thumbnail">
                            
                            <!-- show name user -->
                            <h5 class="card-tittle">{{$user->nama}}</h5>
                            <!-- show bio user -->
                            <p class="card-text">
                                {{$user->bio_profil}}
                            </p>
                            <ul class="fa-ul text-left">
                                <li class="mb-2">
                                    <span class="fa-li"><i class="fas fa-lock"></i></span>
                                    Join in{{ date('F Y', strtotime($user->created_at)) }}
                                </li>

                                <li class="mb-2">
                                    <span class="fa-li"><i class="fas fa-briefcase"></i></span>
                                    {{($user->pekerjaan) }}
                                </li>

                                <li class="mb-2">
                                    <span class="fa-li"><i class="fas fa-home"></i></span>
                                    {{ ($user->kota) }}
                                </li>

                                <!-- <li class="mb-2">
                                    <span class="fa-li"><i class="fas fa-calender"></i></span>
                                    {{ ($user->tanggal_lahir) }}
                                </li> -->

                                <li class="mb-2">
                                    <span class="fa-li"><i class="fas fa-birthday-cake"></i></span>
                                    {{ date_diff(date_create($user->tanggal_lahir),date_create('now'))->y }} tahun
                                </li>

                                <li class="mb-2">
                                    <span class="fa-li"><i class="fas fa-envelope"></i></span>
                                    {{ ($user->email) }}
                                </li>
                            </ul>

                            @can('update',$user)
                                <div class="btn-action">
                                    <a href="{{url('/users/'.$user->id.'/edit')}}" class="btn btn-danger btn-hapus">Edit</a>
                            
                                    <button class="btn btn-danger btn-hapus" data-id="{{$user->id}}" data-toggle="modal" data-target="#DeleteModal">Hapus</button>
                                </div>
                            @endcan
                        </div>
                        </div>
                        @empty
                        <p>Tidak ada data</p>
                        @endforelse
                    </div>
                <!-- #endregion looping for show all user -->

<!-- #region modal delete confirmation -->
    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
    </button> -->

    <!-- Modal -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" id="deleteFrom" method="post">
            @csrf
            @method('DELETE')
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>apakah anda yakin akan menghapus data ini ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Ya, Hapus</button>
            </div>
        </div>
        </form>
    </div>      
</div>
<!-- #endregion modal delete confirmation -->
</div>
</div>
</div>
</section>
@endsection
