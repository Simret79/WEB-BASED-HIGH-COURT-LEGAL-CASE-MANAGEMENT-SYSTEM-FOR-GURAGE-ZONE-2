@extends('admin.layout.app')
@section('title','Appointment')
@push('style')
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/admin/jquery-confirm-master/css/jquery-confirm.css')}}">

@endpush
@section('content')
    <div class="">

        @component('component.heading' , [

       'page_title' => 'Appointment',
       'action' => route('appointment.create') ,
       'text' => 'Add Appointment',
       'permission' => $adminHasPermition->can(['appointment_add'])
        ])
        @endcomponent

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

                    <div class="x_title">
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label for="date_from">From Date :</label>

                                <input type="text" class="form-control dateFrom" id="date_from" autocomplete="off"
                                       readonly="">

                            </div>

                            <div class="col-md-3 form-group">
                                <label for="date_to">To Date :</label>

                                <input type="text" class="form-control dateTo" id="date_to" autocomplete="off"
                                       readonly="">


                            </div>

                            <ul class="nav navbar-left panel_toolbox">

                                <br>
                                &nbsp;&nbsp;&nbsp;
                                <button class="btn btn-danger appointment-margin" type="button" id="btn_clear"
                                        name="btn_clear"
                                >Clear
                                </button>
                                <button type="submit" id="search" class="btn btn-success appointment-margin"><i
                                        class="fa fa-search"></i>&nbsp;Search
                                </button>
                            </ul>

                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <table id="Appointmentdatatable" class="table appointment_table"
                               data-url="{{ route('appointment.list') }}">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th width="40%">Client Name</th>
                                <th width="10%">Mobile</th>
                                <th width="10%;">Date</th>
                                <th>Time</th>
                                <th data-orderable="false">Status</th>
                                <th data-orderable="false">Action</th>
                            </tr>
                            </thead>


                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <input type="hidden" name="token-value"
           id="token-value"
           value="{{csrf_token()}}">
    <input type="hidden" name="date_format_datepiker"
           id="date_format_datepiker"
           value="{{$date_format_datepiker}}">
    <input type="hidden" name="common_change_state"
           id="common_change_state"
           value="{{url('common_change_state')}}">

@endsection

@push('js')
    <script type="text/javascript" src="{{asset('assets/admin/jquery-confirm-master/js/jquery-confirm.js')}}"></script>
    <script src="{{asset('assets/js/appointment/appointment-datatable.js')}}"></script>
@endpush
