@extends('layouts.app')

@section('title', 'Change info')

@section('content')

  <!-- Hero -->
  <section class="page-banner" style="background: #121619 url({{ asset('assets/images/blog-7.jpg') }}) no-repeat center / cover;">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12">
					<div class="page-title">
						<h1  class="page-headding">Edit info</h1>
						<p style="color:white" class="lead">Edit your information here</p>
					</div>
				</div>
			</div>
		</div>
	</section>
  {{-- <section class="bg-primary text-white pt-7 pb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center">
              <h1 class="display-2 mb-3">Edit info</h1>
              <p class="lead">Edit your information here</p>
            </div>
        </div>
    </div>
  </section> --}}

  <section class="section py-5 bg-soft">
    <div class="container">
      <div class="row justify-content-center">

        @include('partials.dashboardsidebar')

        <div class="col-md-8">
            <div class="card border-light">
                <div style="color:#fd9d3e;" class="card-header">Edit info</div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                      <div class="alert alert-success alert-block">
                          <button type="button" class="close" data-dismiss="alert">×</button>
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
                    <form action="{{route('profile.info')}}" method="post">
                      @csrf
                      <h6 style="color:#fd9d3e;" class="heading-small text mb-4">User information</h6>
                      <div class="pl-lg-4">
                        <div class="row">
                          <div class="col-lg-6">
                            <p>Leave any field empty to keep the same<p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="input-username">Name</label>
                              <input type="text" name="name" class="form-control" placeholder="{{auth()->user()->name}}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="input-username">phone</label>
                              {{-- <input type="tel" class="form-control" name="number" value="" id="number" id="phone" name="phone" maxlength="10" placeholder="0673545423" pattern="[0-9]{10}" required> --}}
                              <input type="tel" class="form-control"  value="" id="number" id="phone" name="phone" maxlength="10" placeholder="{{auth()->user()->phone}}" pattern="[0-9]{10}" required>
                              <p id="error" style="color: red; display: none;">Phone number should start with zero.</p>
                              {{-- <input type="text" name="phone" class="form-control" placeholder="{{auth()->user()->phone}}"> --}}
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="input-email">Email address</label>
                              <input type="email" name="email" class="form-control" placeholder="{{auth()->user()->email}}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label class="form-control-label" for="input-first-name">Password</label>
                              <input type="password" name="password" id="input-first-name" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <button style="background-color:#fd9d3e; color:white" type="submit" class="btn ">Save</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                    <hr class="my-4" />
                    <!-- Address -->
                    <h6 style="color:#fd9d3e;" class="heading-small text mb-4">Upload Avatar</h6>
                    <div class="pl-lg-4">
                      <div class="row">
                        <div class="col-md-12">

                            <form method="post" action="{{route('profile.avatar_remove')}}">
                              @csrf
                                @if(auth()->user()->avatar!='users/default.png')
                                  <img src="{{Voyager::image(auth()->user()->avatar)}}">
                                  <div class="row my-2">
                                    <div class="col-6">
                                      <button type="submit" class="btn btn-sm btn-danger">Remove Avatar</button>
                                    </div>
                                  </div>
                                @else
                                  <img src="{{Voyager::image(auth()->user()->avatar)}}">
                                @endif
                            </form>
                            <form id="myForm" method="post" action="{{route('profile.avatar')}}" enctype="multipart/form-data">
                              @csrf
                                <div class="row">
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" name="avatar">
                                        </div>
                                    </div>
                                  </div>
                                </div>

                              <div class="row">
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <button type="submit" class="btn " style="background-color:#fd9d3e; color:white">Upload avatar</button>
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
        </div>
    </div>
    </div>

    <script>
      document.getElementById("myForm").addEventListener("submit", function(event) {
        var numberInput = document.getElementById("number");
        var inputValue = numberInput.value;
        var errorText = document.getElementById("error");

        if (inputValue.length > 0 && inputValue.charAt(0) !== "0") {
          event.preventDefault(); // Prevent the form from being submitted
          errorText.style.display = "block";
        } else {
          errorText.style.display = "none";
        }
      });
    </script>

  </section>

@endsection

