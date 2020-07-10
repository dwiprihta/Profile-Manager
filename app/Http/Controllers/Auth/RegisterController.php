<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            'kota'=>['sometimes','nullable','string','max:255'],
            'pekerjaan'=>['sometimes','nullable','string','max:255'],
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
