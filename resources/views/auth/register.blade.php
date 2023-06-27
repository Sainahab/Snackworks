@extends('layouts.app')

@section('content')
<!-- Hero -->
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
                        <form class="form" method="post" action="{{ route('register') }}">
                            @csrf
                            <div class="container mt-5 mb-5 ">
    
                                <div class="row d-flex align-items-center justify-content-center">
                        
                                    <div class="card px-5 py-5">
                                        <h2 style="color: #fff;">Register</h2>
                                        <p style="color: #fff;">Please register in order to checkout more quickly</p>
                                                        <span class="circle"><i class="fa fa-check"></i></span>
                
                              <h5  class="mt-3">Join 100s of tangerois <br> and tourists from around the globe</h5>
                              <small style="color: #fff;" class="mt-2 text-muted">To eat at the best fast food snack in tanger and north of morocco</small>
                
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-input">
                                        {{-- <label>Your Email<span>*</span></label> --}}
                                        <i class="fa fa-user"></i>
                                        <input style="color:white" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                </div>
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
                                        <input style="color:white" placeholder="Your Password" value="{{old('password')}}" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                         @enderror
                                    </div>
                                    <div class="form-input">
                                        
                                        <i class="fa fa-lock"></i>
                                        <input style="color:white" placeholder="Confirme Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                       
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                
                                    <div class="form-group row mb-0">
                                        
                                    </div>
                                    <div class="form-group login-btn">
                                        <br>
                                        
                                        <button style="padding: 15px 220px" type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                           
                                        <div class="text-center mt-4">
                
                                            @if (Route::has('password.request'))
                                            <a style="color:white" class="btn btn-link" href="">
                                                {{ __('Not a member? ') }}
                                            </a>
                                        @endif
                                            <a href="/login" style="font-size: 20px; color:orange" class="login text-decoration-none">Login</a>
                            
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

{{-- <section class="bg-soft py-5">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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
