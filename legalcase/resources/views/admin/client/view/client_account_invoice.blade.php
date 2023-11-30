@extends('admin.layout.app')
@section('title','Client View')
@section('content')
    <div class="row">
        <!-- Section Right Part Start -->
        <!-- Col-md-6 Start -->
        <div class="col-md-12">
            <div class="x_panel">
                <div class="right-part-bg-all">
                    <div class="ctzn-usrs">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="clearfix">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <a href="" title="Print invoice"><i class="fa fa-print fa-2x pull-right"
                                                                    aria-hidden="true"></i></a>
                                <a href=""><i class="fa fa-envelope-o fa-2x pull-right" aria-hidden="true"></i></a>
                                <div class="clearfix">
                                </div>
                            </div>
                        </div>
                        <h1 class="invoice-center">Invoice </h1>
                        <div class="row">
                            <div class="col-xs-12">

                                <div class="invoice-title">
                                    <h3 class="pull-right">Invoice No: INV-000015</h3>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <address>
                                            <div>

                                                <div class="discount_text">


                                                    <strong>Billed To:</strong>
                                                    Hasmukh December G

                                                    <br> <strong>Address: </strong>Rajkot ,Rajkot

                                                    <br> <strong>Mobile: </strong> 0789456132
                                                </div>
                                            </div>
                                        </address>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <address>
                                            <strong>Invoice Date:</strong> 01-01-2019<br>

                                            <strong>Invoice Due Date:</strong> 30-01-2019<br>
                                            <strong> Tax Type:</strong> Out Of Tax<br>

                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">

                                    </div>
                                    <div class="col-xs-6 text-right">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">

                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-condensed">
                                            <thead>
                                            <tr>
                                                <td class="text-center"><strong>No</strong></td>
                                                <td class="text-left"><strong>Description</strong></td>
                                                <td class="text-center" width="10%"><strong>HSN/SAC</strong></td>
                                                <td class="text-center" width="10%"><strong>Quantity</strong></td>
                                                <td class="text-center" width="10%"><strong>Rate</strong></td>
                                                <td class="text-center" width="10%"><strong>Amount</strong></td>
                                            </tr>
                                            </thead>
                                            <tbody>


                                            <tr>
                                                <td class="text-center">1</td>
                                                <td class="text-left">Test</td>
                                                <td class="text-center"></td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">88.39</td>
                                                <td class="text-center">88.39</td>
                                            </tr>


                                            </tbody>
                                        </table>


                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-7 col-md-7">
                            <div class="contct-info">
                                <div class="form-group">
                                    <label class="discount_text"> Note
                                    </label>
                                    <p>Testing only remarks</p>
                                </div>
                            </div>
                        </div>
                        <div class="pull-right col-md-4">

                            <table class="table row-border dataTable no-footer" id="tab_logic_total">

                                <tbody>
                                <tr>
                                    <td width="75%" align="right"><b class="invoce-font">SubTotal</b></td>
                                    <td width="25%" align="right"><b class="invoce-font">88.39</b></td>
                                </tr>


                                <tr>
                                    <td align="right"><b class="invoce-font">Total</b></td>
                                    <td align="right"><b class="invoce-font">88</b></td>
                                </tr>


                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
