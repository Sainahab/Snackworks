@extends('layouts.app')

@section('content')
<!-- Hero -->
{{-- <section class="section-header bg-primary text-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center">
                <h1 class="display-2 mb-3">Account</h1>
            </div>
        </div>
    </div>
</section> --}}
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
                   

                        <!-- Form -->
                     
                            <div class="container mt-5 mb-5">
    
                                <div class="row d-flex align-items-center justify-content-center">
                        
                                    <div class="card px-5 py-5">
                                        <h2 style="color: #fff;">{{ __('Verify Your Email Address') }}</h2>
                                         
                            <div class="row">
                               
                               
                                
                                
                                <div class="col-12">
                                 
                                    <div class="form-group row mb-0">
                                        
                                    </div>
                                    <div class="form-group login-btn">
                                        <br>
                                        @if (session('resent'))
                                        <div class="alert alert-success" role="alert">
                                            {{ __('A fresh verification link has been sent to your email address.') }}
                                        </div>
                                    @endif
                
                                    {{ __('Before proceeding, please check your email for a verification link.') }}
                                    {{ __('If you did not receive the email') }},
                                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('click here to request another') }}
                                        </button>
                                    </form>
                                       
                                    </div>
                                    
                                </div>
                            </div>
                                    </div>
                                  </div>
                            </div>
                            
                                
                       
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
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section> --}}
@endsection
