@extends('layouts.app')

@section('title', 'Thank you')

@section('content')

    <!-- Hero -->
    <section class="page-banner" style="background: #121619 url({{ asset('assets/images/AAA.jpg') }}) no-repeat center / cover ;with:100%;>
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="page-title">
                        <h1 class="page-headding">Order Complete</h1>
                        
                         <p style="color: #ffffff; " class="lead">Your order is complete</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="section-header bg-primary text-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 text-center">
                    <h1 class="display-2 mb-3">Order Complete</h1>
                    <p class="lead">Your order is complete</p>
                </div>
            </div>
        </div>
    </section> --}}
    <div class="section py-7 bg-soft">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                <h2>Thank you for your order</h2>
                    <p>Your order number is #{{$invoice_id}}</p>
                <a href="/" style="background-color: #fd9d3e; color:white " class="btn btn-lg">Go Home</a>
                </div>
            </div>
        </div>
    </div>
    
  
@endsection