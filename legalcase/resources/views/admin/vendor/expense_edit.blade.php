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
          <div class="col-sm-4">
            <div class="row">
              <div class="col-md-6 form-group">
                 <label for="vendor">Vendor <span class="text-danger">*</span></label>
                  <select class="form-control">
                    <option>Select Vendor</option>
                    <option>PGVCL</option>
                    <option>Fname Lname</option>
                  </select><br>
                  <label for="billed_from">Billed From <span class="text-danger">*</span></label><br>
                  <p>PGVCL</p>
                  <p>804,Rivera wave</p>
                  <p>1235649870</p>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
          </div>
          
          <div class="col-sm-4 form-horizontal form-label-left" >
            
                <div class="form-group">
                  <label class="control-label col-md-5 col-sm-3 col-xs-12">Bill No: <span class="text-danger">*</span></label>
                  <div class="col-md-7 col-sm-9 col-xs-12">
                    <input type="text" placeholder="" class="form-control">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-md-5 col-sm-3 col-xs-12">Bill Date: <span class="text-danger">*</span></label>
                  <div class="col-md-7 col-sm-9 col-xs-12">
                    <input type="text" placeholder="" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-5 col-sm-3 col-xs-12">Bill Due Date: <span class="text-danger">*</span></label>
                  <div class="col-md-7 col-sm-9 col-xs-12">
                    <input type="text" placeholder="" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-5 col-sm-3 col-xs-12">Tax Type: <span class="text-danger">*</span></label>
                  <div class="col-md-7 col-sm-9 col-xs-12">
                    <p>IGST</p>
                  </div>
                </div>
          </div>
         
        </div><br><br>
      
        <div class="row">
          <div class="col-xs-12 table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 20%;">Items</th>
                    <th style="width: 20%;">Description </th>
                    <th style="width: 10%;">Qty</th>
                    <th style="width: 15%;">Rate</th>
                    <th style="width: 15%;">Tax(%)</th>
                    <th style="width: 10%;">Tax(₹)</th>
                    <th style="width: 20%;">Amount</th>
                    <th style="width: 10%;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <select class="form-control">
                        <option>Select Category</option>
                        <option>Test</option>
                      </select>
                    </td>
                    <td>
                      <input type="text" placeholder="" value="test" class="form-control">
                    </td>
                    <td>
                      <input type="text" placeholder="" value="1" class="form-control">
                    </td>
                    <td>
                      <input type="text" placeholder="" value="500" class="form-control">
                    </td>
                    <td>
                      <select class="form-control">
                        <option>IGST 0%</option>
                        <option>IGST 28%</option>
                        <option>IGST 18%</option>
                        <option>IGST 12%</option>
                        <option>IGST 5%</option>
                      </select>
                    </td>
                    <td>
                      <label>90</label>
                    </td>
                    <td>
                      <input type="text" placeholder="" class="form-control" value="500" readonly>
                    </td>
                    <td>
                     <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <select class="form-control">
                        <option>Select Category</option>
                        <option>Test</option>
                      </select>
                    </td>
                    <td>
                      <input type="text" placeholder="" value="test" class="form-control">
                    </td>
                    <td>
                      <input type="text" placeholder="" value="1" class="form-control">
                    </td>
                    <td>
                      <input type="text" placeholder="" value="1000" class="form-control">
                    </td>
                    <td>
                      <select class="form-control">
                        <option>IGST 0%</option>
                        <option>IGST 28%</option>
                        <option>IGST 18%</option>
                        <option>IGST 12%</option>
                        <option>IGST 5%</option>
                      </select>
                    </td>
                    <td>
                      <label>120.00</label>
                    </td>
                    <td>
                      <input type="text" placeholder="" class="form-control" value="1000" readonly>
                    </td>
                    <td>
                     <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="8">
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Add More</button>
                    </td>
                  </tr>
                </tbody>
              </table>
              <p style="color: red;">* Mandatory fields</p>
          </div>
         
        </div>

        <div class="row">
                        
          <div class="col-xs-7">
            <label for="note">Note</label>
            <textarea class="form-control" rows="3" placeholder=""></textarea>
          </div>
       
          <div class="col-xs-5">
           
            <div class="table-responsive">
              <table class="table" align="right" style="margin-right: 30px;"> 
                <tbody>
                  <tr style="font-size: 17px;">
                    <th style="width: 70%; text-align: right;">Subtotal</th>
                    <td align="right">1500</td>
                  </tr>
                  <tr>
                    <th style="text-align: right;">IGST @ 30 % on 210</th>
                    <td align="right">210</td>
                  </tr>
                  <tr style="font-size: 17px;">
                    <th style="text-align: right;">Total</th>
                    <td align="right"><input type="text" placeholder="" class="form-control" value="1000" readonly style="text-align: right;"></td>
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