@extends('layouts.app')

@section('content')

<!-- Hero -->
<!-- Shop Login -->
<section class="shop login section">
   
<style>
    body{
        background:url('/assets/images/hero-bg.jpg');
        
       }
       .btn-primary {
        color: white !important;
        background-color: orange !important;
        border-color: orange !important;
       }
       .btn-primary:hover{
        color: white !important;
        background-color: rgb(196, 128, 3) !important;
        border-color: orange !important;
       }
       .social{

        height: 50px;
        width: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px solid #eee;
        border-radius: 50%;
        margin-right: 10px; 
        cursor: pointer;
        }

        .social:hover{
        
        background-color: orange;
        border-color: orange;
        
        }
       .card{
        padding: 20px;
        color: #fff;
        margin-top: 5rem;
        backdrop-filter: blur(13px) saturate(124%);
        -webkit-backdrop-filter: blur(13px) saturate(124%);
        background-color: rgba(170, 170, 170, 32%);
        border-radius: 12px;
        border: 1px solid rgba(209, 213, 219, 0.3);

       }
       .card h5 {
        color: orange ;
        font-size: larger;
        font-weight: 900;
       }
       
       .card h1 {
        color: white ;
        font-weight: 900;
        text-align: center;
        padding-bottom: 20px;
       }

       
       .form-input{

position: relative;
margin-bottom: 10px;
margin-top: 10px;
}

.form-input i{

    position: absolute;
    font-size: 18px;
    top: 15px;
    left: 10px;
}

.form-control{

height: 50px;
background-color: #1c1e21;
text-indent: 24px;
font-size: 15px;


}

.form-control:focus{

background-color: #25272a;
box-shadow: none;
color: #fff;
border-color: orange;
}

    .shop.login .form .btn{
        margin-right:0;
    }
    /* .btn-facebook{
        background:#39579A;
    } */
    .btn-facebook:hover{
        background:#073088 !important;
    }
    .btn-github{
        background:#444444;
        color:white;
    }
    .btn-github:hover{
        background:black !important;
    }
    /* .btn-google{
        background:#ea4335;
        color:rgb(255, 255, 255);
    } */
    .btn-google:hover{
        background:rgb(243, 26, 26) !important;
    }
</style>

    <div class="container">
        <div class="row"> 
            <div class="col-lg-6 offset-lg-3 col-12">
                <div class="login-form">
                   
                    
                    <!-- Form -->
                    <form class="form" method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="container mt-5 mb-5">

                            <div class="row d-flex align-items-center justify-content-center">
                    
                                <div class="card px-5 py-5">
                                    <h2 style="color: #fff;">Login</h2>
                                     <p style="color: rgb(255, 255, 255);">Please register in order to checkout more quickly</p>
                                  <h1 style="color: orange;" class="mt-3">Welcome Back...hungry??? </h1>
                    
                        <div class="row">
                    
                            <div class="col-12">
                                <div class="form-input">
                                    {{-- <label>Your Email<span>*</span></label> --}}
                                    <i class="fa fa-envelope"></i>
                                    <input style="color:white"  id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Your Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                           
                            <div class="col-12">
                                <div class="form-input">
                                    
                                    <i class="fa fa-lock"></i>
                                    <input style="color:white" placeholder="Your Password" value="{{old('password')}}" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div  class="checkbox">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    {{-- <label style=" color: #fff" class="checkbox-inline" for="2"><input style="background-color: #fff;" name="news" id="2" type="checkbox">Remember me</label> --}}
                                </div>
                                <div class="form-group row mb-0">
                                    
                                </div>
                                <div class="form-group login-btn">
                                    <br>
                                    {{-- <div  class="col-md-8 offset-md-4">
                                        <button style="padding: 20px 680px" type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
    
                                    </div> --}}
                                    <button style="padding: 15px 220px" type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                    {{-- <button class="btn btn-primary mt-4 signup" type="submit">Login</button> --}}
                                    
                                    {{-- <div class="text-center mt-3">

                                        <span>Or continue with these social profile</span>
                                        
                                      </div>
                                    <div class="d-flex justify-content-center mt-4">
                                        
                                    <a  href="" class="social btn btn-facebook"><i class="ti-facebook"></i></a>
                                    
                                    <a  href="" class="social btn btn-google"><i class="fa fa-google"></i></a>
                                    </div> --}}
                                    <div class="text-center mt-4">
            
                                        @if (Route::has('password.request'))
                                        <a style="color:white" class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                        <a href="/register" style="font-size: 20px; color:orange" class="login text-decoration-none">Register</a>
                        
                                      </div>
                                </div>
                                
                            </div>
                        </div>
                                </div>
                              </div>
                        </div>
                        
                            
                    </form>
                    <!--/ End Form -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Login -->
{{-- <section class="bg-soft py-5">
    <div class="container">
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
 
@endsection
