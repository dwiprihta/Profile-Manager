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
            <input type="password" id="password" name="password" class="form-control @error('passwword') is-invalid @enderror" value="{{ old('password') ?? $user->password ?? '' }}" autocomplete="new-password">
        
            @error('password')
            <span class="invalid-feedbcak" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-groub py-3">
            <label for="password-confirm">Password</label>
            <input type="password" id="password-confirm" name="password-confirm" class="form-control" autocomplete="new-password">
            @error('password-confirm')
            <span class="invalid-feedbcak" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            @endif
        </div>
     <!-- #Endregion If this form used by register page, show the password form -->

     <div class="form-groub py-3">
         <label for="nama">Nama</label>
         <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') ?? $user->nama ?? '' }}" autocomplete="nama">
         @error ('nama')
            <div class="invalid-feedbaclk">
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
                        <div class="invalid-feedbaclk">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
            </div>
        </div>

      <!-- #Endregion Grub TTL -->

     




</form>