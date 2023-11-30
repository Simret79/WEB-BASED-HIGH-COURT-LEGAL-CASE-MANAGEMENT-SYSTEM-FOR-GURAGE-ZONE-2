@extends('admin.layout.app')
@section('title','Add Expense')
@section('content')
    <link href="{{asset('assets/css/invoice_css.css') }}" rel="stylesheet">

    <form class="repeater" id="add_expense" name="add_expense" role="form" method="POST"
          action="{{route('expense.store')}}" autocomplete="off">

        @csrf
        <div class="page-title">
            <div class="title_left">
                <h3>Add Expense</h3>
            </div>

            <div class="title_right">
                <div class="form-group pull-right top_search">


                    <a href="{{ url('admin/expense') }}" class="btn btn-primary">Back</a>


                </div>
            </div>
        </div>
        <div class="x_panel">

            <div class="x_content">

                <section class="content invoice">

                    <div class="row"><br>
                        <div class="col-xs-12 invoice-header" align="center">
                            <h1>Expense</h1>
                        </div>


                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="row invoice-info">
                        <div class="col-sm-4">


                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="vendor">Vendor <span class="text-danger">*</span></label>
                                    <select class="form-control select2" name="vendor_id" id="vendor_id"
                                            onchange="getVendorBillingAddress(this.value);" data-rule-required="true">
                                        <option value="">Select Vendor</option>
                                        @foreach($vendors as $vendor)
                                            <option
                                                value="{{$vendor->id}}">@if($vendor->company_name!=''){{$vendor->company_name}}@elseif($vendor->first_name!=''){{$vendor->first_name.' '.$vendor->last_name}}@else
                                                    'N/A' @endif</option>
                                        @endforeach
                                    </select><br><br>
                                    <label for="billed_from">Billed From </label><br>

                                    <div class="show_vendor_detail">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                        </div>

                        <div class="col-sm-4 form-horizontal form-label-left">


                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-3 col-xs-12">Bill No: <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-7 col-sm-9 col-xs-12">
                                    <input type="text" placeholder="" class="form-control " id="inv_no" name="inv_no">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-3 col-xs-12">Bill Date: <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-7 col-sm-9 col-xs-12">
                                    <input type="text" placeholder="" class="form-control inc_Date" id="inv_date"
                                           name="inv_date">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-3 col-xs-12">Bill Due Date: <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-7 col-sm-9 col-xs-12">
                                    <input type="text" placeholder="" class="form-control due_Date" id="due_Date"
                                           name="due_Date">
                                </div>
                            </div>


                        </div>

                    </div>
                    <br><br>


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table tableInv" id="purchaseInvoice" data-repeater-list="group">
                                    <thead class="thead-inverse">
                                    <tr class="tbl_header_color dynamicRows">
                                        <th width="30%" class="text-center">
                                            Items
                                            <span class="text-danger">*</span>
                                        </th>
                                        <th width="" class="text-center">Description

                                        </th>
                                        <th width="10%" class="text-center">
                                            Qty
                                            <span class="text-danger">*</span>
                                        </th>
                                        <th width="10%" class="text-center">
                                            Rate
                                            <span class="text-danger">*</span>
                                        </th>
                                        <th class="hide with_tax" width="15%" class="text-center">Tax (%)</th>
                                        <th class="hide with_tax" width="10%" class="text-center">Tax (₹)</th>
                                        <th width="10%" class="text-center">Amount</th>
                                        <th width="5%" class="text-center">Action</th>
                                    </tr>
                                    </thead>


                                    <tbody>

                                    <tr data-repeater-item>
                                        <th width="30%" class="text-center">
                                            <select class="form-control sel categories_ids" name="categories_ids"
                                                    id="categories_ids" data-rule-required="true">
                                                <option value="">Select Category</option>
                                                @foreach($category as $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                @endforeach
                                            </select>
                                        <th width="" class="text-center">
                                            <input type="text" class="form-control" id="description" name="description"

                                            ></th>
                                        <th width="10%" class="text-center">
                                            <input type="text" class="form-control qty" id="qty" name="qty"
                                                   data-rule-required="true" maxlength="10"
                                                   onkeypress='return isNumber(event)'
                                            >
                                        </th>
                                        <th width="10%" class="text-center">
                                            <input type="text" class="form-control rate"
                                                   onkeypress='return isFloatsNumberKey(event)' id="rate" name="rate"
                                                   data-rule-required="true" maxlength="10"
                                            >
                                        </th>

                                        <th width="10%" class="text-center">
                                            <input type="text" class="form-control amount" id="amount" name="amount"
                                                   data-rule-required="true" readonly=""
                                            ></th>
                                        <th width="5%" class="text-center">

                                            <button type="button" data-repeater-delete type="button"
                                                    class="btn btn-danger waves-effect waves-light"><i
                                                    class="fa fa-trash-o" aria-hidden="true"></i></button>

                                        </th>
                                    </tr>

                                    </tbody>

                                    <br>


                                </table>


                            </div>
                            <br>
                            <button data-repeater-create type="button" value="Add New"
                                    class="btn btn-success waves-effect waves-light btn btn-success-edit" type="button">
                                <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add More
                            </button>

                            <div class="row">
                                <div class="col-sm-3">
                                    <div>
                                        <p class="text-danger">* Mandatory fields</p>
                                        <ul/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-7 col-md-7">
                                    <div class="contct-info">
                                        <div class="form-group">
                                            <label class="discount_text"> Note
                                            </label>
                                            <textarea class="form-control" id="note" name="note" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="pull-right col-md-5">
                                    <table class="table row-border dataTable no-footer" id="tab_logic_total">
                                        <tr>
                                            <th class="text-left expence-p-top-18">SubTotal</th>
                                            <td class="text-center">
                                                <input type="text" name="subTotal" class="form-control subTotalinv"
                                                       id="subTotal"
                                                       readonly=""
                                                >
                                            </td>
                                        </tr>
                                    </table>

                                    <table class="table row-border dataTable no-footer" id="tab_logic_total">
                                        <tr>
                                            <th class="text-center">
                                                <select id="tax" class="tax" name="tax" class="form-control">
                                                    <option MyTax="" value="">Select Tax</option>
                                                    @foreach($tax as $t)
                                                        <option MyTax="{{ $t->per }}"
                                                                value="{{ $t->id }}">{{ $t->name.' '.$t->per.'%'  }}</option>
                                                    @endforeach
                                                </select>
                                            </th>
                                            <td class="text-center">
                                                <input type="text" value="" name="taxVal"
                                                       class="form-control subTotalinv"
                                                       id="taxVal" readonly=""
                                                >
                                            </td>
                                        </tr>
                                    </table>

                                    <table class="table row-border dataTable no-footer" id="tab_logic_total">

                                        <tr>
                                            <th class="text-left expence-p-top-18">Total</th>
                                            <td class="text-center total-width-expence ">
                                                <input type="text" name="total"

                                                       class="form-control total-width-expence-border" id="grandTotal"
                                                       readonly="">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-9"></div>
                                <div class="col-md-3 text-center">
                                    <a href="{{ url('admin/invoice') }}" class="btn btn-danger"> Cancel</a>

                                    <button type="submit" name="btn_add_offer" class="btn_add_offer btn btn-success"><i
                                            class="fa fa-save" id="show_loader"></i>&nbsp;Save
                                    </button>

                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12 pull-right">
                                    <div id="msgemail" class="msgemail-expence"></div>
                                </div>
                            </div>
                            <br>
                            <br>

                        </div>
                    </div>

                </section>
            </div>
        </div>


    </form>

    <input type="hidden" name="expense_create"
           id="expense_create"
           value="{{ url('admin/expense-create') }}">

    <input type="hidden" name="getVendorDetailById"
           id="getVendorDetailById"
           value="{{ url('admin/getVendorDetailById')}}">

    <input type="hidden" name="date_format_datepiker"
           id="date_format_datepiker"
           value="{{$date_format_datepiker}}">

@endsection
@push('js')
    <script src="{{asset('assets/js/expense/expense-validation.js')}}"></script>
    <script src="{{asset('assets/admin/js/repeter/repeatercustome.js') }}"></script>
@endpush
