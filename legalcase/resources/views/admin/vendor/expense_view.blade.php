@extends('admin.layout.app')
@section('title','Vendor')
@section('content')

<div class="x_panel">
   
    <div class="x_content">

      <section class="content invoice">
       
        <div class="row"><br>
          <div class="col-xs-12 invoice-header" align="center">
            <h1>Expense</h1>
          </div>
        </div>
        
        <div class="row invoice-info">
          <div class="col-sm-6">
            <address><br>
              <strong>Billed From:</strong>
              <span>PGVCL</span>
              <br><strong>Address:</strong>
              <span>804,Rivera wave ,Abrama</span>
              <br><strong>Mobile:</strong>
              <span>1235649870</span>
            </address>
          </div>
          
          <div class="col-sm-6" align="right">
            <h1><small>Bill No: 000001</small></h1>
            <strong>Bill Date:</strong>
            <span>01-01-2019</span>
            <br><strong>Bill Due Date:</strong>
            <span>07-01-2019</span>
            <br><strong>Tax Type:</strong>
            <span>GST</span>
          </div>
         
        </div><br><br>
        
        <div class="row">
          <div class="col-xs-12 table">
              <div class="x_content">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th style="width: 15%;">Items</th>
                      <th style="width: 30%;">Description</th>
                      <th>Quantity</th>
                      <th>Rate</th>
                      <th>Tax (%)</th>
                      <th>Tax (Amt)</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Test</td>
                      <td>Testing items 1</td>
                      <td>1250</td>
                      <td>1200</td>
                      <td>28%</td>
                      <td>420,000.00</td>
                      <td>1500000</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Test</td>
                      <td>Testing items 2</td>
                      <td>1</td>
                      <td>1500</td>
                      <td>28%</td>
                      <td>420.00</td>
                      <td>1500</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Test</td>
                      <td>Testing items 3</td>
                      <td>5</td>
                      <td>500</td>
                      <td>12%</td>
                      <td>300.00</td>
                      <td>2500</td>
                    </tr>
                  </tbody>
                </table>
              </div>
          </div>
        </div>

        <div class="row">
                        
          <div class="col-xs-7">
          </div>
       
          <div class="col-xs-5">
           
            <div class="table-responsive">
              <table class="table" align="right" style="margin-right: 30px;"> 
                <tbody>
                  <tr style="font-size: 17px;">
                    <th style="width: 70%; text-align: right;">Subtotal</th>
                    <td align="right">$250.30</td>
                  </tr>
                  <tr>
                    <th style="text-align: right;">CGST @ 14% on 1501500</th>
                    <td align="right">210210.00</td>
                  </tr>
                  <tr>
                    <th style="text-align: right;">SGST @ 14% on 1501500</th>
                    <td align="right">210210.00</td>
                  </tr>
                  <tr>
                    <th style="text-align: right;">CGST @ 6% on 2500.00</th>
                    <td align="right">150.00</td>
                  </tr>
                  <tr>
                    <th style="text-align: right;">SGST @ 6% on 2500.00</th>
                    <td align="right">150.00</td>
                  </tr>
                  <tr style="font-size: 17px;">
                    <th style="text-align: right;">Total</th>
                    <td align="right">19,24,720</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
         
        </div>
     
      </section>
    </div>
</div>

@endsection