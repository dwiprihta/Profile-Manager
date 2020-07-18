@csrf
<form>
    <div class="form-groub py-3">
        <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email')?? $user->email ?? '' }}" autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
    </div>
    
    <!-- #Region If this form used by register page, show the password form -->
        @if ($tombol=="Daftar")
        <div class="form-groub py-3">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" autocomplete="new-password">
        
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-groub py-3">
            <label for="password-confirm">Password</label>
            <input type="password" id="password-confirm" name="password_confirmation" class="form-control" autocomplete="new-password">
        </div>
        @endif
     <!-- #Endregion If this form used by register page, show the password form -->

     <div class="form-groub py-3">
         <label for="nama">Nama</label>
         <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') ?? $user->nama ?? '' }}" autocomplete="nama">
         @error ('nama')
            <div class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </div>
         @enderror
      </div>


      <!-- #Region Grub TTL -->
        <div class="form-groub row py-3">
            <label for="tanggal" class="col-md-3 col-form-label text-md-left">Tanggal Lahir</label>
            <div class="col-md-12">

                    <input type="number" name="tanggal" id="tanggal" class="form-control col-md-4 d-inline @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal') ?? $user->tanggal ?? '' }}" Placeholder="dd">

                    @php
                        $namaBulan=["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","Sepember","Oktober","November","Desember"];
                    @endphp
                    <select name="bulan" id="bulan" class="custom-select col-md-4 d-inline @error('tanggal_lahir') is-invalid @enderror" style="vertical-align: baseline;">
                        @for ($i=0;$i < 12;$i++)
                            @if ($i+1 == (old('bulan') ?? $user->bulan ?? ''))
                                <option value="{{ $i+1 }}" selected>{{ $namaBulan[$i]}}</option>
                            @else
                                <option value="{{ $i+1 }}">{{ $namaBulan[$i]}}</option>
                            @endif
                        @endfor
                    </select>

                    <input type="number" name="tahun" id="tahun" class="form-control col-md-3 d-inline @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tahun') ?? $user->tahun ?? '' }}" Placeholder=yyyy>
                    @error ('tanggal_lahir')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
            </div>
        </div>

      <!-- #Endregion Grub TTL -->

      <div class="form-groub py-3">
          <label for="pekerjaan">Pekerjaan</label>
          <input type="text" id="pekerjaan" name="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" value="{{ old('pekerjaan') ?? $user->pekerjaan ?? '' }}" autocomplete="pekerjaan">
          @error ('pekerjaan')
          <div class="invalid-feedback" role="alert">
              <strong> {{ $message }}</strong>
          </div>
          @enderror
      </div>

      <div class="form-groub py-3">
          <label for="kota">Kota</label>
          <input type="text" id="kota" name="kota" class="form-control @error('kota') is-invalid @enderror" value="{{ old('kota') ?? $user->kota ?? '' }}" autocomplete="kota" placeholder="kota anda">
          @error('kota')
          <div class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </div>
          @enderror
      </div>

      <div class="form-groub py-3">
          <label for="bio">bio</label>
            <textarea id="bio" name="bio" class="form-control" placeholder="bio anda disini">
                {{ old('bio') ?? $user->bio ?? '' }}
            </textarea>
          @error('bio')
          <div class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </div>
          @enderror
      </div>

      <!-- <div class="form-groub py-3">
        <label for="gambar_profil">gambar_profil</label>
          <div class="custom-file">
          <input type="file" id="gambar_profil" nama="gambar_profil" accept="image/*" class="custom-file-input @error('gambar_profil') is-invalid @enderror">
          <label class="custom-file-label col-md-12" for="gambar_profil"
            onchange="$('#gambar_profil').val($(this).val());">
            {{ $user->gambar_profil ?? 'Pilih gambar...'}}
        </label>
        @error('gambar_profil')
        <div class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
        </div>
      </div> -->

      <div class="form-groub py-3">
        <label for="gambar_profil">gambar_profil</label>
          <div class="custom-file">
          <input type="file" id="gambar_profil" nama="gambar_profil" accept="image/*" class="custom-file-input @error('gambar_profil') is-invalid @enderror">
          <label class="custom-file-label col-md-12" for="gambar_profil"
            onchange="$('#gambar_profil').val($(this).val());">
            {{ $user->gambar_profil ?? 'Pilih gambar...'}}
        </label>
        @error('gambar_profil')
        <div class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
        </div>
      </div>

      <div class="form-groub py-3">
          <label for="bg">Background Profil</label>
          <select id="bg" name="bg" class="custom-select @error('bg') is-invalid @enderror">
                @for($i=1; $i<=12; $i++)
                    @if($i == (old('bg') ?? $user->bg ?? ''))
                        <option value="{{ $i }}" selected>{{ 'Gambar '.$i }}</option>
                    @else
                        <option value="{{ $i }}">{{ 'Gambar '.$i }}</option>
                    @endif
                @endfor
          </select>
          @error('gambar_profil')
        <div class="invalid-feedback" role="alert">
            <strong>{{ $gambar_profil }}</strong>
        </div>
        @enderror
        </div>

        <div class="my-2">
            @for($i=1;$i<=12;$i++)
                <div class="pilihan-background-profil"> 
                    <div class="overlay">{{ $i }}</div>
                    <img class="img-thumbnail" src="{{asset('img/gambar'.$i.'.jpg')}}" width="100px;">
                </div>
            @endfor
        </div><hr>

        <div class="form-groub py-4">
            <button type="submit" class="btn btn-primary">{{$tombol}}</button>
        </div>
</form>