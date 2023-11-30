@extends('admin.layout.app')
@section('title','Payment')
@push('style')

@endpush
@section('content')

<div class="col-md-6 col-sm-6 col-xs-12">
  <div class="page-title">
  <div class="title_left">
    <h3>Payment</h3>
  </div>


</div>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>My Current Subscription</h2>
              
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table">
                    
                      <tbody>
                        <tr>
                         
                          <td style="border-top: none;">Plan</td>
                          <td style="border-top: none;">Monthly</td>
                         
                        </tr>
                        <tr>
                        
                          <td style="border-top: none;">Status</td>
                          <td style="border-top: none;">Active</td>
                 
                        </tr>
                          <tr>
                         
                          <td style="border-top: none;">I am paying</td>
                          <td style="border-top: none;"> 200.0</td>
                         
                        </tr>
                        <tr>
                        
                          <td style="border-top: none;">I started / renewed on</td>
                          <td style="border-top: none;">18-10-2018</td>
                 
                        </tr>
                         <tr>
                        
                          <td style="border-top: none;">It expires on</td>
                          <td style="border-top: none;">15-02-2019</td>
                 
                        </tr>
                   
                   
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>My Subscription History:</h2>
                 
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table">
                      <thead>
                        <tr>
                          <th>Plan Name</th>
                          <th>Total</th>
                          <th>Started on</th>
                          <th>Expired on</th>
                          <th>Billing DateTime</th>
                          <th>Payment ID</th>
                          <th>Transaction ID</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Monthly</td>
                          <td>200.0</td>
                          <td>18-10-2018</td>
                          <td>15-02-2019</td>
                           <td>17-10-2018 01:16:27</td>
                          <td>1111862292</td>
                          <td>02689d8fb0c4d5c90925</td>
                        </tr>
                     
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
@endsection
