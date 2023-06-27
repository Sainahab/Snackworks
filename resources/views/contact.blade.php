@extends('layouts.app')

@section('title', 'Contact')

@section('content')
  <!-- Hero -->
  <section class="page-banner" style="background: #121619 url({{ asset('assets/images/blog-7.jpg') }}) no-repeat center / cover;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="page-title">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="headding-part text-center pb-50">
                            <h1  class="page-headding">Contact Us</h1>
                            <p class="headding-sub">Your message is valuable to us. Write to us and we will get back to you.</p>
                            {{-- <h2 class="headding-title text-uppercase font-weight-bold">Our Menu</h2> --}}
                        </div>
                    </div>
                    {{-- <h1  class="page-headding">MENU</h1> --}}
                    {{-- <p style="color:white" class="lead">This is your dashboard</p> --}}
                </div>
            </div>
        </div>
    </div>

</section>

{{-- <section class="page-banner" style="background: #121619 url({{ asset('assets/images/blog-7.jpg') }}) no-repeat center / cover;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="page-title">
                    <h1  class="page-headding">Dashboard</h1>
                    <p style="color:white" class="lead">This is your dashboard</p>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<section class="contact ptb" id="FFcontact">
    <div class="container">
        <div class="contact-in">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-5">
                    <div class="contact-detail">
                        <h3 class="contact-head">Contact Details</h3>
                        <p class="contact-desc">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </p>
                        <ul>
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="javascript:void(0)">{{setting('contact.location')}}</a></li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:1234567890">{{setting('contact.phone')}}</a></li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#">{{setting('contact.email')}}</a></li>
                            <li>
                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                <a href="javascript:void(0)">
                                    <span>Mon - thurs - Sat :  <span>11.00 am - 05.00 am</span></span>
                                    <span>Friday : <span>14.00 am - 05.00 am</span></span>
                                    <span>Sunday :  <span class="footer-close">Closed</span></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-7">
                    <div class="leave">
                                @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                        @endif
                        <form action="{{route('contact.post')}}" method="post">
                            @csrf
                            <div class="messages"></div>
                            <div class="form-group">
                                <label class="form-label text-dark" style="font-size:20px;" for="firstNameLabel">Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="firstNameLabel" type="text"  name="name" required   class="form-control" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-label text-dark" style="font-size:20px;" for="lastNameLabel">Subject <span class="text-danger">*</span></label>
                                <input class="form-control" id="lastNameLabel" placeholder="Subject" type="text" name="subject" required class="form-control" placeholder="Subject *" required="required" data-error="subject is required.">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-label text-dark" style="font-size:20px;" for="EmailLabel">Email <span class="text-danger">*</span></label>

                                <input class="form-control" id="EmailLabel" placeholder="info@company.com *" type="email" name="email" required  class="form-control"  required="required" data-error="Valid email is required.">
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <label class="form-label text-dark" style="font-size:20px;" for="phonenumberLabel">How can we help you?<span class="text-danger">*</span></label>

                                <textarea class="form-control" placeholder="Hi, I would like to ..." id="message-2" rows="8"  name="message" required></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="text-center">
                                <button style="background-color: #fd9d3e;" type="submit" class="btn btn-secondary mt-4 animate-up-2"><span  class="mr-2"><i class="fas fa-paper-plane"></i></span >Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- <div class="section section-lg pt-0">
    <div class="container mt-n8 mt-lg-n13 z-2">
        <div class="row justify-content-center">
            <div class="col-12">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
                @endif
               <!-- Card -->
               <div class="card border-light shadow-soft p-2 p-md-4 p-lg-5">
                <div class="card-body">
                    <form action="{{route('contact.post')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label class="form-label text-dark" style="font-size:20px;" for="firstNameLabel">Name <span class="text-danger">*</span></label>
                                    <div class="input-group mb-4">
                                        <div  class="input-group-prepend">
                                            <span style="background-color: #fd9d3e;" class="input-group-text"><i style="color:white;" class="fas fa-user-alt"></i></span>
                                        </div>
                                        <input class="form-control" id="firstNameLabel" placeholder="John Doe" type="text"  name="name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label class="form-label text-dark" style="font-size:20px;" for="EmailLabel">Email <span class="text-danger">*</span></label>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span style="background-color: #fd9d3e;" class="input-group-text"><i style="color:white;" class="fas fa-envelope"></i></span>
                                        </div>
                                        <input class="form-control" id="EmailLabel" placeholder="johndoe@company.com" type="email" name="email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group">
                                    <label class="form-label text-dark" style="font-size:20px;" for="lastNameLabel">Subject <span class="text-danger">*</span></label>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span style="background-color: #fd9d3e;" class="input-group-text"><i style="color:white;" class="fas fa-file-alt"></i></span>
                                        </div>
                                        <input class="form-control" id="lastNameLabel" placeholder="Subject" type="text" name="subject" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <div class="form-group">
                                    <label class="form-label text-dark" style="font-size:20px;" for="phonenumberLabel">How can we help you?<span class="text-danger">*</span></label>
                                    <textarea class="form-control" placeholder="Hi, I would like to ..." id="message-2" rows="8"  name="message" required></textarea>
                                </div>
                                <div class="text-center">
                                    <button style="background-color: #fd9d3e;" type="submit" class="btn btn-secondary mt-4 animate-up-2"><span  class="mr-2"><i class="fas fa-paper-plane"></i></span >Send Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<div class="section section-lg pt-0 line-bottom-light">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 text-center px-4 mb-5 mb-lg-0">
                <div style="background-color:black" class="icon icon-sm icon-shape icon-shape-primary rounded mb-4">
                    <i style="color:#fd9d3e;" class="fas fa-envelope-open-text"></i>
                </div>
                <h5 class="mb-3" style="font-size:20px;">Email us</h5>

            <a style="color:#fd9d3e; font-size:25px;" class="font-weight-bold text">{{setting('contact.email')}}</a>
            </div>
            <div class="col-12 col-md-4 text-center px-4 mb-5 mb-lg-0">
                <div style="background-color:black" class="icon icon-sm icon-shape icon-shape-primary rounded mb-4">
                    <i style="color:#fd9d3e;" class="fas fa-phone-volume"></i>
                </div>
                <h5 class="mb-3"style="font-size:20px;">Call us</h5>

                <a style="color:#fd9d3e; font-size:25px;" class="font-weight-bold text">{{setting('contact.phone')}}</a>
            </div>
            <div class="col-12 col-md-4 text-center px-4">
                <div style="background-color:black" class="icon icon-sm icon-shape icon-shape-primary rounded mb-4">
                    <i style="color:#fd9d3e;" class="fas fa-map-marker-alt"></i>
                </div>
                <h5 class="mb-3" style="font-size:20px;">Location</h5>
                <a style="color:#fd9d3e; font-size:25px;" class="font-weight-bold text">{{setting('contact.location')}}</a>

            </div>
        </div>
    </div>
</div> --}}
	<!-- Map Section -->

    @include('sections.brand')
	<div class="map-section">
		<div id="myMap">
			<iframe class="map-shop" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3236.8407846849427!2d-5.811776288687919!3d35.77928717244136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0c7f4fdee5753b%3A0x45f439765e387698!2sSignworks%20%3A%20Creative%20Media!5e0!3m2!1sen!2sma!4v1670857675906!5m2!1sen!2sma" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		</div>
	</div>
	<!--/ End Map Section -->

@endsection


