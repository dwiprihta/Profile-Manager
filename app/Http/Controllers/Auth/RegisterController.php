<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        //menyatukan komponen tanggal
        $tanggal_lahir=$data["tahun"].str_pad($data["bulan"],2,0,STR_PAD_LEFT).
                        str_pad($data["tanggal"],2,0,STR_PAD_LEFT);

        //input penyatuan komponen agar tanggal_lahir bisa divalidaasi
        $data['tanggal_lahir']=$tanggal_lahir;

        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nama' => ['required', 'string', 'max:255'],
            'tanggal_lahir'=>['required','date','before:-10 years','after:-100 years'],
            'kota'=>['required','string','max:255'],
            'pekerjaan'=>['required','string','max:255'],
            'bio'=>['sometimes','nullable','string'],
            'foto'=>['sometimes','file','image','max:3000'],
            'bg'=>['required','integer','min:1','max:12'],   
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //satukan 3 komponen tanggal
        $tanggal_lahir=$data["tahun"].str_pad($data["bulan"],2,0,STR_PAD_LEFT).str_pad($data["tanggal"],2,0,STR_PAD_LEFT);

        //ambil request object untuk proses upload file
        $request=request();

        //proses upload gambar profil
        if($request->hasFile('foto')){

            //gunakan slug helper agar "nama" bisa dipakai sebagai bagian nama foto
            $slug = Str::slug($data['nama']);

            //ambil exstensi file asli
            $extFile=$request->foto->getClientOriginalExtension();

            //Generate nama gambar, gabungkan dengan "nama_timr()+ekstensifile
            $namaFile = $slug.'-'.time().".".$extFile;

            //proses upload simpan kedalam folder upload
            $request->foto->storeAS('public/uploads', $namaFile);
        }else{
            //jika user tidak mengupload gambar isi dengan gambar default
            $namaFile="default_profil.jpg";
        }

        //proses upload file gambar profil
        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nama' => $data['nama'],
            'tanggal_lahir'=>$tanggal_lahir,
            'pekerjaan'=>$data['kota'],
            'kota'=>$data['kota'],
            'bio_profil'=>$data['bio'],
            'gambar_profil'=>$namaFile,
            'background_profil'=>$data['bg'],  
        ]);
    }
}
