<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Modal Header</h4>
</div>
<form method="post" class="" id="form_case_imp" name="form_case_imp">
    <input type="hidden" id="id" name="id" value="{{$case->id}}">
    {{ csrf_field() }}
    <div class="modal-body">
        <div class="alert alert-danger change-cort-d" ></div>
        <div class="row">

            <div class="col-md-12">
                <div class="contct-info">
                    <div class="form-group">
                        <label class="discount_text">Case Priority <span class="text-danger">*</span></label>
                        <select class="form-control" id="priority" name="priority">
                            <option value="High" {{(!empty($case) && $case->priority=='High')?'selected':''}}>High
                            </option>
                            <option value="Medium"{{(!empty($case) && $case->priority=='Medium')?'selected':''}}>
                                Medium
                            </option>
                            <option value="Low" {{(!empty($case) && $case->priority=='Low')?'selected':''}}>Low</option>
                        </select>

                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="modal-footer">

        <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                class="ik ik-x"></i>Close
        </button>

        <button type="submit" name="case_status_btn" class="btn btn-success waves-effect waves-light">Save <i
                class="fa fa-spinner fa-spin hide" id="btn_loader"></i></button>

    </div>
</form>
<script src="{{asset('assets/js/case/change-priority-validation.js')}}"></script>
