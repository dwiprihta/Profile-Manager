@csrf
<form>
    <div class="form-groub">
        <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email')?? $user->email ?? '' }}" autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
    </div>
    
    {{--If this form used by register page, show the password form--}}
    @if ($tombol=="Daftar")
    <div class="form-groub">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control @error('passwword') is-invalid @enderror" value="{{ old('password') ?? $user->password ?? '' }}" autocomplete="new-password">
    </div>
    @error('password')
    <span class="invalid-feedbcak" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    @endif


</form>