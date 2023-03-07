@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-6">



                <h2 class="">Let's get started</h2>
                <h4 class="">Sign in to manage your account & channels</h4>

                <div class="card mb-4">

                    <div class="card-body">

                        <form method="POST" action="{{ route('user.save') }}">
                            @csrf

                            @if (Session::has('failed'))
                                <div class="alert alert-danger">
                                    {{ Session::get('failed') }}
                                    @php
                                        Session::forget('failed');
                                    @endphp
                                </div>
                            @endif

                            <div class="mb-3">

                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1" class="form-label">Email address</label>
                                    <input type="email" class="form-control @error('business_email') is-invalid @enderror"
                                        id="exampleFormControlSelect1" placeholder="Email address" name="business_email"
                                        value="{{ old('business_email') }}" required />

                                    @error('business_email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="exampleFormControlPassword" placeholder="Password" name="business_email"
                                        required />
                                    <a href="auth-forgot-password-basic.html">
                                        <small>Forgot Password?</small>
                                    </a>

                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <p class="text-center">
                                <span> By continuing you accept our</span>
                                <a href="auth-register-basic.html">
                                    <span>Terms of Service</span>
                                </a>
                                <span> and </span>
                                <a href="auth-register-basic.html">
                                    <span>Privacy Policy.</span>
                                </a>
                            </p>



                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Sign in') }}
                                    </button>
                                </div>
                            </div>



                        </form>
                    </div>
                </div>
                <p class="text-center">

                    <a href="auth-register-basic.html">
                        <span>New to {{ config('app.name') }}?</span>
                    </a>
                </p>



            </div>


        </div>
    </div>
@endsection
