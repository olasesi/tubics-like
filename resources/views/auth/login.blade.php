@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-6">
              
              @if(Session::has('failed'))
              <div class="alert alert-danger">
                  {{ Session::get('failed') }}
                  @php
                      Session::forget('failed');
                  @endphp
              </div>
              @endif
      

                <h2 class="">Let's get started</h2>
                <h4 class="">Sign in to manage your account & channels</h4>
                
                <div class="card mb-4">

                    <div class="card-body">

                        <form method="POST" action="">
                            @csrf

                            <div class="mb-3">
                                
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1" class="form-label">Email address</label>
                                    <input type="email" class="form-control @error('business_email') is-invalid @enderror"
                                    id="exampleFormControlSelect1" placeholder="Email address" name="business_email"
                                    value=" {{ old('business_email') }}" />

                                @error('business_email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                   
                                </div>
                                
                                <div class="mb-3">
                                    <label for="exampleFormControlPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="exampleFormControlPassword" placeholder="Password" name="business_email"
                                    value="" />

                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>

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
            </div>


        </div>
    </div>
@endsection
