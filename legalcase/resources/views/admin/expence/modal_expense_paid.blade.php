<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="Paymentmade">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Payment</h4>
            </div>
            <form method="post" class="" id="form_payment" name="form_payment">
                <input type="hidden" id="expence_id" name="expence_id" value="{{$expence_id ?? ''}}">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="alert alert-danger change-cort-d " ></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contct-info">
                                <div class="form-group">
                                    <label class="discount_text">Amount
                                        <er class="rest">*</er>
                                    </label>
                                    <input type="text" id="amount" name="amount" class="form-control" value=""
                                           autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="contct-info">
                                <div class="form-group">
                                    <label class="discount_text">Receipt date
                                        <er class="rest">*</er>
                                    </label>
                                    <input type="text" id="receive_date" name="receive_date" class="form-control date1"
                                           value="" autocomplete="off" readonly="">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="contct-info">
                                <div class="form-group">
                                    <label class="discount_text">Payment Method
                                        <er class="rest">*</er>
                                    </label>
                                    <select class="form-control select2" id="method" name="method">
                                        <option value="">Select Payment Method</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Net Banking">Net Banking</option>
                                        <option value="Other">Other</option>
                                    </select>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="contct-info">
                                <div class="form-group">
                                    <label class="discount_text">Referance number
                                        <er class="rest hide" id="show_star">*</er>
                                    </label>
                                    <input type="text" id="referance_number" name="referance_number"
                                           class="form-control " value="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row hide" id="show_cheque_date">
                        <div class="col-md-12">
                            <div class="contct-info">
                                <div class="form-group">
                                    <label class="discount_text">Cheque Date
                                        <er class="rest" class="" id="">*</er>
                                    </label>
                                    <input type="text" id="cheque_date" name="cheque_date" class="form-control "
                                           value="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="contct-info">
                                <div class="form-group">
                                    <label class="discount_text">Note
                                    </label>

                                    <textarea id="note" name="note" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" name="judge_type_btn" class="btn btn-success"><i
                            class="fa fa-spinner fa-spin hide" id="btn_loader"></i>&nbsp;Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<input type="hidden" name="date_format_datepiker"
       id="date_format_datepiker"
       value="{{$date_format_datepiker}}">
<input type="hidden" name="add_expense_payment"
       id="add_expense_payment"
       value="{{ url('admin/add_expense_payment') }}">

<script src="{{asset('assets/js/expense/expense-payment-mode.js')}}"></script>
