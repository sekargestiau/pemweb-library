@extends('layouts-admin.main-login')
@section('title','Login Admin SeminarKu')

    
@section('container')
<section class="vh-100">
        <div class="container py-5 h-100">
          <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                <h2>Login To Your Account</h2>
                <br>
                <!-- Alert Sukses Registrasi -->
                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <!-- Alert Gagal Login -->
                @if(session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-outline mb-4">
                    <label class="form-label" for="email">Email address</label>
                  <input type="email" id="email" class="form-control form-control-lg" name="email" autofocus required/>
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                  </span> 
                  @enderror               
                </div>
      
                
                <div class="form-outline mb-4">
                <label class="form-label" for="password">Password</label>
                  <input type="password" id="password" class="form-control form-control-lg" name="password" required />
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div>
                <button type="submit" class="btn btn-primary btn-lg btn-block" style="width:100%;">Sign in</button>
                </div>
                
                <br>
                <div class="text-center">
                    <p>If you Doesn't Have an Account <a href="{{ route('register') }}">Sign Up !</a></p>
                    
                  </div>
      
              </form>
            </div>
          </div>
        </div>
      </section>
@endsection