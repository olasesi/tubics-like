@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-6">
            <h2 class="">Start Your Free 14-Day Trial!</h2>
              <h5 class="">Full access. Cancel anytime.</h5>
            <div class="card mb-4">
              
              <div class="card-body">
                
                <form method="POST" action="{{ route('register') }}">
                    @csrf


                <fetch-channel></fetch-channel>
                
                <div class="mb-3">
                  <label for="exampleFormControlSelect1" class="form-label">What describes you best?</label>
                  <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="businessdesription">
                    <option selected>Please select</option>
                    <option value="1">I'm a creator</option>
                    <option value="2">I work for an agency</option>
                    <option value="3">I am managing a company channel</option>
                  </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">Enter your business email</label>
                    <input
                      type="email"
                      class="form-control"
                      id="exampleFormControlInput2"
                      placeholder="name@example.com"
                      name="businessemail"
                    />
                  </div>

                  <div class="form-check form-check-inline mt-3 mb-3">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" name="termsandconditions"/>
                    <label class="form-check-label" for="inlineCheckbox1">I accept the
                        <a href="" class="">Terms and Conditions</a>
                        and
                        <a href="" class="">Privacy Policy</a></label>
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
