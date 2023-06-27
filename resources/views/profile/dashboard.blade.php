@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

  <!-- Hero -->
  <section class="page-banner" style="background: #121619 url({{ asset('assets/images/blog-7.jpg') }}) no-repeat center / cover;">
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
	</section>
  {{-- <section class="bg-primary text-white pt-7 pb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center">
              <h1 class="display-2 mb-3">Dashboard</h1>
              <p class="lead">This is your dashboard</p>
            </div>
        </div>
    </div>
  </section> --}}

  <section class="section py-5 bg-soft">
    <div class="container">
      <div class="row justify-content-center">

        {{-- @include('partials.dashboardsidebar') --}}
        <div class="col-md-3">
            <div class="card border-light">
                <div class="card-body">
                    <ul class="list-unstyled">

                        <li style="list-style-type: none;"><a style="color:#fd9d3e" href="/dashboard">Dashboard</a></li>
                        <li style="list-style-type: none;"><a style="color:#fd9d3e" href="/dashboard/orders">View Orders</a></li>
                        <li style="list-style-type: none;"><a style="color:#fd9d3e" href="/dashboard/edit-info">Edit Info</a></li>
                        <li style="list-style-type: none;"><a style="color:#fd9d3e" href="/dashboard/edit-address">Edit Address</a></li>
                        <li style="list-style-type: none;"><a style="color:#fd9d3e" href="#" id="logout-btn2">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card border-light">
                <div style="color: #fd9d3e" class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                    @endif

                    This is your dashboard. You can edit your <a style="color: #fd9d3e" href="/dashboard/edit-info">details</a> or visit your <a style="color: #fd9d3e" href="/dashboard/orders">orders</a> from here.
                </div>
            </div>
        </div>
    </div>
    </div>
  </section>


@endsection
