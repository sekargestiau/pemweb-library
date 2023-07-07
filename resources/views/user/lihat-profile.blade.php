@extends('layouts-user.main-ip')
@section('title','User Profile Library MCU')

    
    @section('container')
    <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
			<li><a href="{{url('home')}}">Dashboard</a></li>        
			<li>Profile</li>
        </ol>
        <!-- <h2>Inner Page</h2> -->

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <p>
        <div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<div>
						<h4>Profile Saya <a href="{{ url('profil') }}"></a></h4>
						</div>
						<div style="padding-top: 20px">
							<table class="table">
								<tbody><tr>
									<td class="my-td" style="width: 150px;">Nama Lengkap</td>
									<td class="my-td">:</td>
									<td class="my-td">
										<h5>{{ $user->name }}</h5>
									</td>
								</tr>

								<tr class="my-tr">
									<td class="my-td">Email</td>
									<td class="my-td">:</td>
									<td class="my-td">
										<h5>{{  $user->email}}</h5>
									</td>
								</tr>
							</tbody></table>
							<!-- </form> -->
						</div>
					</div>
				</div>
			</div>
		</div>
        </p>
      </div>
    </section>

  </main><!-- End #main -->
    @endsection