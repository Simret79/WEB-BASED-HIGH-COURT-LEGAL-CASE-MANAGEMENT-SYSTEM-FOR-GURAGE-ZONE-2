@extends('admin.layout.app')
@section('title','Case Create')


@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>Add Case</h3>
        </div>

        <div class="title_right">
            <div class="form-group pull-right top_search">
                <a href="{{route('case-running.index')}}" class="btn btn-primary">Back</a>

            </div>
        </div>
    </div>
    <!------------------------------------------------ ROW 1-------------------------------------------- -->


    <form method="post" name="add_case" id="add_case" action="{{route('case-running.store')}}" class="">
        @csrf()
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Client Detail</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
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

                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Client <span class="text-danger">*</span></label>
                                <select class="form-control" name="client_name" id="client_name">
                                    <option value="">Select client</option>
                                    @foreach($client_list as $list)
                                        <option value="{{ $list->id}}">{{  $list->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <br><br>
                                <input type="radio" id="test1" name="position" value="Petitioner" checked>&nbsp;&nbsp;Petitioner
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" id="test2" name="position" value="Respondent">&nbsp;&nbsp;Respondent
                            </div>
                        </div>


                        <div class="repeater">
                            <div data-repeater-list="parties_detail">
                                <div data-repeater-item>
                                    <div class="row">

                                        <div class="col-md-6">


                                            <div class="form-group">
                                                <label class="discount_text "> <b class="position_name">Respondent
                                                        Name </b><span class="text-danger">*</span></label>
                                                <input type="text" id="party_name" name="party_name"
                                                       data-rule-required="true" data-msg-required="Please enter name."
                                                       class="form-control">
                                            </div>


                                        </div>

                                        <div class="col-md-5">

                                            <div class="form-group">
                                                <label class="discount_text "><b class="position_advo">Respondent
                                                        Advocate</b><span class="text-danger">*</span></label>
                                                <input type="text" id="party_advocate" name="party_advocate"
                                                       data-rule-required="true"
                                                       data-msg-required="Please enter advocate name."
                                                       class="form-control">
                                            </div>


                                        </div>

                                        <div class="col-md-1">

                                            <div class="form-group">

                                                <div class="case-margin-top-23"></div>
                                                <button type="button" data-repeater-delete type="button"
                                                        class="btn btn-danger waves-effect waves-light"><i
                                                        class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </div>


                                        </div>


                                    </div>

                                    <br>
                                </div>
                            </div>
                            <button data-repeater-create type="button" value="Add New"
                                    class="btn btn-success waves-effect waves-light btn btn-success-edit" type="button">
                                <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add More
                            </button>
                        </div>


                    </div>
                </div>

            </div>

        </div>
        <!------------------------------------------------------- End ROw --------------------------------------------->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Case Detail</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="row">

                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Case No <span class="text-danger">*</span></label>
                                <input type="text" id="case_no" name="case_no" class="form-control">
                            </div>

                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Case Type <span class="text-danger">*</span></label>
                                <select class="form-control" id="case_type" name="case_type"
                                        onchange="getCaseSubType(this.value);">
                                    <option value="">Select case type</option>
                                    @foreach($caseTypes as $caseType)
                                        <option value="{{$caseType->id}}">{{$caseType->case_type_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Case Sub Type <span class="text-danger"></span></label>
                                <select class="form-control" id="case_sub_type" name="case_sub_type"></select>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Stage of Case <span class="text-danger">*</span></label>
                                <select class="form-control" id="case_status" name="case_status">
                                    <option value="">Select case status</option>
                                    @foreach($caseStatuses as $caseStatus)
                                        <option value="{{$caseStatus->id}}">{{$caseStatus->case_status_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <br><br>
                                <input type="radio" id="test3" name="priority" value="High">&nbsp;&nbsp;High &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" id="test4" name="priority" value="Medium" checked>&nbsp;&nbsp;Medium
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" id="test5" name="priority" value="Low">&nbsp;&nbsp;Low
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Act <span class="text-danger">*</span></label>
                                <input type="text" id="act" name="act" class="form-control">
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Filing Number <span class="text-danger">*</span></label>
                                <input type="text" id="filing_number" name="filing_number" class="form-control">
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Filing date <span class="text-danger">*</span></label>
                                <input type="text" id="filing_date" name="filing_date"
                                       class="form-control datetimepickerfilingdate" readonly="">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Registration Number <span class="text-danger">*</span></label>
                                <input type="text" id="registration_number" name="registration_number"
                                       class="form-control">
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Registration date <span class="text-danger">*</span></label>
                                <input type="text" id="filiregistration_dateng_date" name="registration_date"
                                       class="form-control datetimepickerregdate" readonly="">
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">First Hearing Date <span class="text-danger">*</span></label>
                                <input type="text" id="next_date" name="next_date"
                                       class="form-control datetimepickernextdate" readonly="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">CNR Number <span class="text-danger"></span></label>
                                <input type="text" id="cnr_number" name="cnr_number" class="form-control">
                            </div>
                            <div class="col-md-9 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Description <span class="text-danger"></span></label>
                                <textarea id="description" name="description" class="form-control"></textarea>
                            </div>
                        </div>


                    </div>
                </div>

            </div>

        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>FIR Details</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="row">

                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Police Station <span class="text-danger"></span></label>
                                <input type="text" id="police_station" name="police_station" class="form-control">
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">FIR Number <span class="text-danger"></span></label>
                                <input type="text" id="fir_number" name="fir_number" class="form-control">
                            </div>


                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">FIR Date <span class="text-danger"></span></label>
                                <input type="text" id="fir_date" name="fir_date"
                                       class="form-control datetimepickerregdate" readonly="">
                            </div>
                        </div>


                    </div>
                </div>

            </div>

        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Court Detail</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Court no <span class="text-danger">*</span></label>
                                <input type="text" id="court_no" name="court_no" class="form-control">
                            </div>

                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Court Type<span class="text-danger">*</span></label>
                                <select class="form-control" id="court_type" name="court_type"
                                        onchange="getCourt(this.value);">
                                    <option value="">Select court type</option>
                                    @foreach($courtTypes as $courtType)
                                        <option value="{{$courtType->id}}">{{$courtType->court_type_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Court <span class="text-danger">*</span></label>
                                <select class="form-control" id="court_name" name="court_name"></select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Judge Type <span class="text-danger">*</span></label>
                                <select class="form-control select2" id="judge_type" name="judge_type">
                                    <option value="">Select judge type</option>
                                    @foreach($judges as $judge)
                                        <option value="{{$judge->id}}">{{$judge->judge_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Judge Name <span class="text-danger"></span></label>
                                <input type="text" id="judge_name" name="judge_name" class="form-control">
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Remarks <span class="text-danger"></span></label>
                                <textarea id="remarks" name="remarks" class="form-control"></textarea>

                            </div>
                        </div>


                    </div>
                </div>

            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Task Assign</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="row">


                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Users</label>
                                <select multiple class="form-control" id="assigned_to" name="assigned_to[]">
                                    @foreach($users as $key=>$val)
                                        <option value="{{$val->id}}">{{$val->first_name.' '.$val->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>


                    </div>
                </div>

            </div>


            <div class="form-group pull-right">
                <div class="col-md-12 col-sm-6 col-xs-12">


                    <a class="btn btn-danger" href="{{route('case-running.index')}}">Cancel</a>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save" id="show_loader"></i>&nbsp;Save
                    </button>
                </div>

            </div>
            <br>

        </div>
    </form>
    <input type="hidden" name="date_format_datepiker"
           id="date_format_datepiker"
           value="{{$date_format_datepiker}}">

    <input type="hidden" name="getCaseSubType"
           id="getCaseSubType"
           value="{{ url('getCaseSubType')}}">

    <input type="hidden" name="getCourt"
           id="getCourt"
           value="{{ url('getCourt')}}">
@endsection

@push('js')

    <script src="{{asset('assets/js/case/case-add-validation.js')}}"></script>
    <script src="{{asset('assets/admin/js/repeter/repeater.js') }}"></script>

@endpush
