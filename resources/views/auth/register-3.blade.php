@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-6">
                <h2 class="">Start Your Free 14-Day Trial!</h2>
                <h5 class="">Full access. Cancel anytime.</h5>

                {{-- @if (Session::has('failed'))
              <div class="errors mb-3">
                  {{ Session::get('failed') }}
                 @php
                      Session::forget('failed');
                  @endphp 
              </div>
              @endif  --}}

                <div class="card mb-4">

                    <div class="card-body">

                        <form method="POST" action="{{ route('user.create2') }}">
                            @csrf

                            <fetch-channel style=""></fetch-channel>
                            @error('youtube_channel')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">What describes you best?</label>
                                <select class="form-select @error('business_description') is-invalid @enderror"
                                    id="exampleFormControlSelect1" aria-label="Default select example"
                                    name="business_description">
                                    <option value="" selected>Please select</option>
                                    <option value="creator">I'm a creator</option>
                                    <option value="agency">I work for an agency</option>
                                    <option value="company">I am managing a company channel</option>
                                </select>
                                @error('business_description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput2" class="form-label">Enter your business email</label>
                                <input type="email" class="form-control @error('business_email') is-invalid @enderror"
                                    id="exampleFormControlInput2" placeholder="name@example.com" name="business_email"
                                    value=" {{ old('business_email') }}" />

                                @error('business_email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-check form-check-inline mt-3 mb-3">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="on"
                                    name="terms_and_conditions"
                                    {{ old('terms_and_conditions') == true ? 'checked' : '' }} />
                                <label class="form-check-label" for="inlineCheckbox1">I accept the
                                    <a href="" class="">Terms and Conditions</a>
                                    and
                                    <a href="" class="">Privacy Policy</a></label>
                                @error('terms_and_conditions')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

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
