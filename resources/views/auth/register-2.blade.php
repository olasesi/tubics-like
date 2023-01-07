@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-6">
                <h2 class="">Verify your email address</h2>
                <p class="">We just emailed a six-digit code to
                    <b>{{ Cookie::get('business_email') }}</b>
                    
                   
                </p>
                <div class="card mb-4">

                    <div class="card-body">

                        <form method="POST" action="">
                            @csrf

                            <div class="mb-3">

                                <input type="text" class="form-control" id="exampleFormControlInput2"
                                    placeholder="000000" name="emailcode" />

                                <input type="hidden" class="form-control" id="exampleFormControlInput3" name="business_email"
                                    value="{{ Cookie::get('business_email') }}" />


                                <input type="hidden" class="form-control" id="exampleFormControlInput4" name="youtube_channel"
                                    value="{{ Cookie::get('youtube_channel') }}" />

                                <input type="hidden" class="form-control" id="exampleFormControlInput5" name="business_description"
                                    value="{{ Cookie::get('business_description') }}" />

                                <input type="hidden" class="form-control" id="exampleFormControlInput6" name="on"
                                    value="{{ Cookie::get('terms_and_conditions') }}" />
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
