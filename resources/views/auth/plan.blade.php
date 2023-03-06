@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-6">
                <h2 class="">7 Days, &euro; 7. Full Access</h2>
                <h5 class="">Pick a plan to try all tools and features for 7 days</h5>

                <div class="card mb-4">

                    <div class="card-body">

                        <form method="POST" action="" onsubmit="event.preventDefault();">
                            @csrf

                            <div class="row gy-3">
                                    
                                <div class="col-md">
                                 
                                  <div class="form-check form-check-inline mt-3">
                                    <input class="form-check-input" type="radio" name="plan" id="startup" value="Startup" checked />
                                    <label class="form-check-label" for="startup">Startup</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input  class="form-check-input" type="radio" name="plan" id="standard" value="Standard"/>
                                    <label class="form-check-label" for="standard">Standard</label>
                                  </div>
                              
                                </div>
                              </div>




                              <div class="mt-3">
                                <!-- Button trigger modal -->
                                <button
                                  type="button"
                                  class="btn btn-primary"
                                  data-bs-toggle="modal"
                                  data-bs-target="#modalCenter"
                                >
                                  Continue
                                </button>
        
                                <form onsubmit="event.preventDefault();" id="paymentForm">
                                <!-- Modal -->
                                <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Your payment details</h5>
                                        <button
                                          type="button"
                                          class="btn-close"
                                          data-bs-dismiss="modal"
                                          aria-label="Close"
                                        ></button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="row">
                                          <div class="col mb-3">
                                            <label for="nameWithTitle" class="form-label">Email address</label>
                                            <input
                                            type="email" id="email-address" required 
                                              
                                              class="form-control"
                                              placeholder="Email address"
                                            />
                                          </div>
                                        </div>
                                        <div class="row g-2">
                                          <div class="col mb-0">
                                            
                                            <input type="hidden" value="100" id="amount" required class="form-control"/>
                                          </div>
                                          
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                          Close
                                        </button>
                                        <button type="submit" class="btn btn-primary" onclick="payWithPaystack()">
                                            {{ __('Continue') }}
                                        </button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </form>

                              </div>

                          

                           
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
    
@endsection

<script src="https://js.paystack.co/v1/inline.js"></script>


