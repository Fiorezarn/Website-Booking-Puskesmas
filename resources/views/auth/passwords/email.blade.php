@extends('layouts.app')

@section('css', '/css/login.css')


@section('content')
        <div class="wrapper">
            <div class="title-text">
                <div class="title reset">Reset Password</div>
            </div>
            <div class="form-container">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <div class="form-inner">


                <form method="POST" action="{{ route('password.email') }} class="login">
                    @csrf

                    <pre>
                    </pre>
                    <div class="field">
                    <input id="email" type="email" placeholder="Masukan Email Anda"class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    
                    <div class="field btn">
                    <div class="btn-layer"></div>
                    <input type="submit" value="Send Reset Password">
                    </div>
                </form>
                </div>
            </div>
            </div>
@endsection
