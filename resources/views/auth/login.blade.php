@extends('layouts.app')

@section('css', '/css/login.css')


@section('content')
        <div class="wrapper">
            <div class="title-text">
                <div class="title login">Login</div>
                <div class="title signup">Registrasi</div>
            </div>
            <div class="form-container">
                <div class="slide-controls">
                <input type="radio" name="slide" id="login" checked>
                <input type="radio" name="slide" id="signup">
                <label for="login" class="slide login">Login</label>
                <label for="signup" class="slide signup">Daftar</label>
                <div class="slider-tab"></div>
                </div>
                <div class="form-inner">
                <form method="POST" action="{{ route('login') }}" class="login">
                    @csrf

                    <pre>
                    </pre>
                    <div class="field">
                        <input id="email" type="email" placeholder="Masukan Email Anda" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="field">
                        <input id="password" type="password" placeholder="Masukan Password Anda" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror  
                    </div>
                    
                    @if (Route::has('password.request'))
                    <div class="pass-link"><a href="{{ route('password.request') }}">Lupa password?</a></div>
                    @endif
                    
                    
                    <div class="field btn">
                    <div class="btn-layer"></div>
                    <input type="submit" value="Login">
                    </div>


                    <div class="signup-link">Buat akun <a href="">Daftar sekarang</a></div>
                </form>


                <form method="POST" action="{{ route('register') }}" class="signup">
                @csrf
                    
                    <div class="field">
                    <input id="name" type="text" placeholder="Masukan Nama Anda" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    
                    <div class="field">
                    <input id="email" type="email" placeholder="Masukan Email Anda" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    <div class="field">
                    <input id="password" type="password" placeholder="Masukan Password Anda" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                    <div class="field">
                    <input id="password-confirm" type="password" placeholder="Ulangi Password Anda" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>


                    <div class="field btn">
                    <div class="btn-layer"></div>
                    <input type="submit" value="Daftar">
                    </div>


                    <div class="signup-link">Sudah punya akun? <a href="">Login</a></div>
                </form>
                </div>
            </div>
            </div>
    <script >
        const loginText = document.querySelector(".title-text .login");
      const loginForm = document.querySelector("form.login");
      const loginBtn = document.querySelector("label.login");
      const signupBtn = document.querySelector("label.signup");
      const signupLink = document.querySelector("form .signup-link a");
      signupBtn.onclick = (()=>{
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
      });
      loginBtn.onclick = (()=>{
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
      });
      signupLink.onclick = (()=>{
        signupBtn.click();
        return false;
      });
    </script>

@endsection
