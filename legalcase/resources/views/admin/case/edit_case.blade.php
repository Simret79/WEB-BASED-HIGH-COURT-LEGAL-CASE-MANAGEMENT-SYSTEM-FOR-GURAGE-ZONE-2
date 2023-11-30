@extends('admin.layout.app')
@section('title','Case Edit')


@section('content')

    <div class="page-title">
        <div class="title_left">
            <h3>Edit Case</h3>
        </div>

        <div class="title_right">
            <div class="form-group pull-right top_search">
                <a href="{{route('case-running.index')}}" class="btn btn-primary">Back</a>

            </div>
        </div>
    </div>
    <!------------------------------------------------ ROW 1-------------------------------------------- -->


    <form method="post" name="add_case" id="add_case" action="{{route('case-running.update',$case->id)}}" class="">


        @csrf()
        @method('patch')
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
                                        <option
                                            value="{{ $list->id}}" {{($list->id == $case->advo_client_id)?'selected':''}}>{{  $list->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <br><br>
                                <input type="radio" id="test1" name="position"
                                       value="Petitioner" {{(!empty($case) && $case->client_position=='Petitioner')?'checked':''}}>&nbsp;&nbsp;Petitioner
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" id="test2" name="position"
                                       value="Respondent" {{(!empty($case) && $case->client_position=='Respondent')?'checked':''}}>&nbsp;&nbsp;Respondent
                            </div>
                        </div>


                        <div class="repeater">
                            <div data-repeater-list="parties_detail">
                                @foreach($parties as $party)
                                    <div data-repeater-item>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="contct-info">
                                                    <div class="form-group">
                                                        <label class="discount_text position_name"></label>
                                                        <input type="text" id="party_name" name="party_name"
                                                               data-rule-required="true"
                                                               data-msg-required="Please enter name."
                                                               class="form-control" value="{{$party->party_name}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="contct-info">
                                                    <div class="form-group">
                                                        <label class="discount_text position_advo"></label>
                                                        <input type="text" id="party_advocate" name="party_advocate"
                                                               data-rule-required="true"
                                                               data-msg-required="Please enter advocate name."
                                                               class="form-control" value="{{$party->party_advocate}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="contct-info">
                                                    <div class="form-group">
                                                        <div class="case-margin-top-23"></div>

                                                        <button type="button" data-repeater-delete type="button"
                                                                class="btn btn-danger waves-effect waves-light"><i
                                                                class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                @endforeach
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
                                <input type="text" value="{{$case->case_number ?? ''}}" id="case_no" name="case_no"
                                       class="form-control">
                            </div>

                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Case Type <span class="text-danger">*</span></label>
                                <select class="form-control" id="case_type" name="case_type"
                                        onchange="getCaseSubType(this.value);">
                                    <option value="">Select case type</option>
                                    @foreach($caseTypes as $caseType)
                                        <option
                                            value="{{$caseType->id}}" {{(!empty($case) && $case->case_types==$caseType->id)?'selected':''}}>{{$caseType->case_type_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Case Sub Type <span class="text-danger"></span></label>
                                <select class="form-control" id="case_sub_type" name="case_sub_type">
                                    @foreach($caseSubTypes as $caseSubType)
                                        <option
                                            value="{{$caseSubType->id}}" {{(!empty($case) && $case->case_sub_type==$caseSubType->id)?'selected':''}}>{{$caseSubType->case_type_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Stage of Case <span class="text-danger">*</span></label>
                                <select class="form-control" id="case_status" name="case_status">
                                    <option value="">Select case status</option>
                                    @foreach($caseStatuses as $caseStatus)
                                        <option value="{{$caseStatus->id}}"
                                                myvalue="{{$caseStatus->case_status_name}}" {{(!empty($case) && $case->case_status==$caseStatus->id)?'selected':''}}>{{$caseStatus->case_status_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <br><br>
                                <input type="radio" id="test3" name="priority"
                                       value="High" {{(!empty($case) && $case->priority=='High')?'checked':''}}>&nbsp;&nbsp;High
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" id="test4" name="priority"
                                       value="Medium" {{(!empty($case) && $case->priority=='Medium')?'checked':''}}>&nbsp;&nbsp;Medium
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" id="test5" name="priority"
                                       value="Low" {{(!empty($case) && $case->priority=='Low')?'checked':''}}>&nbsp;&nbsp;Low
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Act <span class="text-danger">*</span></label>
                                <input type="text" id="act" name="act" class="form-control"
                                       value="{{$case->act ?? ''}}">
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Filing Number <span class="text-danger">*</span></label>
                                <input type="text" id="filing_number" name="filing_number" class="form-control"
                                       value="{{$case->filing_number}}">
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Filing date <span class="text-danger">*</span></label>
                                <input type="text" id="filing_date" name="filing_date"
                                       class="form-control datetimepickerfilingdate" readonly=""
                                       value="{{date($date_format_laravel,strtotime($case->filing_date))}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Registration Number <span class="text-danger">*</span></label>
                                <input type="text" id="registration_number" name="registration_number"
                                       class="form-control" value="{{$case->registration_number}}">
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Registration date <span class="text-danger">*</span></label>
                                <input type="text" id="filiregistration_dateng_date" name="registration_date"
                                       class="form-control datetimepickerregdate" readonly=""
                                       value="{{ date($date_format_laravel,strtotime($case->registration_date))}}">
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">First Hearing Date <span class="text-danger">*</span></label>
                                <input type="text" id="next_date" name="next_date"
                                       class="form-control datetimepickernextdate" readonly=""
                                       value="{{ date($date_format_laravel,strtotime($case->next_date))}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">CNR Number <span class="text-danger"></span></label>
                                <input type="text" value="{{$case->cnr_number}}" id="cnr_number" name="cnr_number"
                                       class="form-control">
                            </div>
                            <div class="col-md-9 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Description <span class="text-danger"></span></label>
                                <textarea id="description" name="description"
                                          class="form-control">{{$case->description ?? ''}}</textarea>
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
                                <input type="text" id="police_station" name="police_station" class="form-control"
                                       value="{{$case->police_station ?? ''}}">
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">FIR Number <span class="text-danger"></span></label>
                                <input type="text" value="{{$case->fir_number ?? ''}}" id="fir_number" name="fir_number"
                                       class="form-control">
                            </div>


                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">FIR Date <span class="text-danger"></span></label>
                                <input type="text" id="fir_date" name="fir_date"
                                       class="form-control datetimepickerregdate" readonly=""
                                       value="@php if($case->fir_date!=null){@endphp {{date($date_format_laravel,strtotime($case->fir_date))}} @php } @endphp">
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
                                <input type="text" value="{{$case->court_no ?? ''}}" id="court_no" name="court_no"
                                       class="form-control">
                            </div>

                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Court Type<span class="text-danger">*</span></label>
                                <select class="form-control" id="court_type" name="court_type"
                                        onchange="getCourt(this.value);">
                                    <option value="">Select court type</option>
                                    @foreach($courtTypes as $courtType)
                                        <option
                                            value="{{$courtType->id}}" {{(!empty($case) && $case->court_type==$courtType->id)?'selected':''}}>{{$courtType->court_type_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Court <span class="text-danger">*</span></label>
                                <select class="form-control" id="court_name"
                                        name="court_name"> @foreach($courts as $court)
                                        <option
                                            value="{{$court->id}}" {{(!empty($case) && $case->court==$court->id)?'selected':''}}>{{$court->court_name}}</option>
                                    @endforeach   </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Judge Type <span class="text-danger">*</span></label>
                                <select class="form-control select2" id="judge_type" name="judge_type">
                                    <option value="">Select judge type</option>
                                    @foreach($judges as $judge)
                                        <option
                                            value="{{$judge->id}}" {{(!empty($case) && $case->judge_type==$judge->id)?'selected':''}}>{{$judge->judge_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Judge Name <span class="text-danger"></span></label>
                                <input type="text" id="judge_name" name="judge_name" value="{{$case->judge_name ?? ''}}"
                                       class="form-control">
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">Remarks <span class="text-danger"></span></label>
                                <textarea id="remarks" name="remarks"
                                          class="form-control">{{$case->remark ?? ''}}</textarea>

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
                                        <option value="{{$val->id}}"

                                                @if(in_array($val->id, $user_ids))
                                                selected=""

                                            @endif
                                        >{{$val->first_name.' '.$val->last_name}}</option>
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
