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
      

                <h2 class="">Let us prepare your account for you!</h2>
                
                <div class="card mb-4">

                    <div class="card-body">

                        <form method="POST" action="{{ route('user.saveprepare') }}">
                            @csrf

                            <div class="mb-3">
                                {{-- <div class="mb-3">
                                    <fetch-country></fetch-country>
                                </div> --}}
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1" class="form-label">Choose language of your channel</label>
                                   <fetch-language></fetch-language>
                                   
                                </div>
                                
                               <div class="mb-3">
                                    <label for="exampleFormControlSelect1" class="form-label"> Share up to 3 competitive YouTube channels [optional] </label>
                                   <multi-select></multi-select>
                                </div>

                            <div class="mb-3">
                                 <label for="exampleFormControlSelect1" class="form-label">Tell us about important keywords you want to rank for [optional]</label>
                                 <multi-tag></multi-tag>
                                 
                            </div> 

                            {{-- <example-component></example-component> --}}

                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Next') }}
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
